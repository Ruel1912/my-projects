<?php

namespace frontend\controllers;

use backend\models\Anketa;
use backend\models\DownloadUrls;
use backend\models\MessageTiket;
use backend\models\Notice;
use backend\models\Stages;
use backend\models\Tariff;
use backend\models\TextStages;
use backend\models\Tikets;
use backend\models\UserFiles;
use backend\models\UserModel;
use backend\models\UserPayments;
use backend\models\UserStages;
use common\models\User;
use frontend\models\Bitrix;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Cabinet controller
 */
class CabinetController extends Controller
{
    public $layout = 'cabinetmain';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?',],
                    ],
                    [
//                        'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * index.php
     *
     * @return mixed
     */

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
//            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
//            return $this->goHome();
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    public function actionGetAttachedFile($id, $index) {
        $uid = Yii::$app->getUser()->getId();
        $downloads = DownloadUrls::findOne(['id' => $id, 'user_id' => $uid]);
        if (!empty($downloads)) {
            $files = json_decode($downloads->urls, 1);
            $bitrix = new Bitrix();
            $bitrix->download__bitrix__file("https://pravozashitnik.bitrix24.ru{$files[$index]['downloadUrl']}");
        } else
            return Yii::$app->response->redirect('index');
    }

    /*Главная*/
    public function actionIndex()
    {
        $user = UserModel::findOne(Yii::$app->getUser()->getId());
        $docs = UserFiles::find()->where(['user_id' => $user->id])->count();
        $payments = UserPayments::find()->where(['user_id' => $user->id, 'status' => 0])
            ->andWhere('CURDATE() > date_exp')
            ->count();
        $currentStage = UserStages::findOne(['user_id' => $user->id, 'current_stage' => 1]);
        $getData = [];
        if (in_array($user->stage_id, UserStages::$needSync)) {
            $downloads = DownloadUrls::findOne(['stage_id' => $user->stage_id, 'deal_id' => $user->deal_id, 'user_id' => $user->id]);
            $text = TextStages::findOne(['stage_id' => $user->stage_id, 'deal_id' => $user->deal_id, 'user_id' => $user->id]);
            $getData = [
                'files' => $downloads,
                'text' => $text,
            ];
        }
        return $this->render('index', [
            'user' => $user,
            'docs' => $docs,
            'payments' => $payments,
            'deal' => $getData,
            'current' => $currentStage
        ]);
    }

    /*Оплата*/
    public function actionPayment()
    {
        $user = UserModel::findOne(Yii::$app->getUser()->getId());
        $payments = UserPayments::find()->where(['user_id' => $user->id, 'status' => 0])
            ->andWhere('CURDATE() > date_exp')
            ->count();
        $paymentsTotal = UserPayments::find()
            ->where(['user_id' => $user->id])
            ->andWhere(['status' => 1])
            ->count();
        if (!empty($user->tariff_id))
            $tariff = Tariff::findOne($user->tariff_id);
        $totalPayments = UserPayments::find()
            ->where(['user_id' => $user->id])
            ->andWhere(['AND', ['status' => 1], ['is not', 'val', null]])
            ->orderBy('id desc')
            ->select('status, SUM(val) AS user_sum')
            ->asArray()
            ->one();
        $nextPay = UserPayments::find()->where(['user_id' => $user->id])
            ->andWhere('CURDATE() < date_exp')
            ->orderBy('id desc')
            ->asArray()
            ->one();
        return $this->render('payment', [
            'user' => $user,
            'payments' => $payments,
            'next' => $nextPay,
            'total' => $paymentsTotal,
            'tariff' => $tariff ?? "{}",
            'totalPay' => $totalPayments
        ]);
    }

    public function actionReferal() {
        return $this->render('referal', ['']);
    }

    /*Документы*/
    public function actionDocs()
    {
        $id = Yii::$app->getUser()->getId();
        $files = UserFiles::find()->where(['user_id' => $id])->asArray()->all();
        return $this->render('docs', ['files' => $files]);
    }

    public function actionSentFile() {
        $permitted = UserFiles::$docsPermitted;
        $allowedTypes = UserFiles::$docTypes;
        $g = $_GET;
        if (!empty($_POST['type']) && in_array($_POST['type'], $permitted) && !empty($_FILES['files'])) {
            $user = UserModel::findOne(Yii::$app->getUser()->getId());
            if (!empty($g['u']) && !empty($g['s']) && !empty($g['d'])) {
                if ($g['u'] == $user->id && $g['d'] == $user->deal_id) {
                    $stageUser = UserStages::findOne(['id' => $g['s'], 'user_id' => $g['u']]);
                } else
                    return Yii::$app->response->redirect('index');
            }
            $upload = $_FILES['files'];
            if ($upload['size'] > UserFiles::MAX_FILE_SIZE) {
                Yii::$app->session->setFlash('error', 'Превышен максимальный размер файла - 5 МБ.');
                return Yii::$app->response->redirect('docs');
            }
            $ext = pathinfo($upload['name'], PATHINFO_EXTENSION);
            if (!isset($allowedTypes[$_POST['type']]) || !in_array($ext, $allowedTypes[$_POST['type']])) {
                Yii::$app->session->setFlash('error', 'Загружен недопустимый формат документа');
                return Yii::$app->response->redirect('docs');
            }
            $array = [
                'fields' => [
                    "ENTITY_ID" => "$user->contact_id",
                    "ENTITY_TYPE" => "contact",
                    "COMMENT" => "Пользователь загрузил документ - {$_POST['type']}",
                    "FILES" => ['fileData' => ["{$_POST['type']}.{$ext}", base64_encode(file_get_contents($upload['tmp_name']))]],
                ]
            ];
            $queryData2 = [
                'fields' => [
                    "UF_CRM_1645699268045" => ['fileData'=>["{$_POST['type']}.{$ext}", base64_encode(file_get_contents($upload['tmp_name']))]]
                ],
                "id" => $user->contact_id,
            ];
            $batch = [
                'halt' =>  0,
                'cmd' =>  [
                    'comment' => 'crm.timeline.comment.add?' . http_build_query($array),
                    'deal' => 'crm.contact.update?' . http_build_query($queryData2)
                ]
            ];
            $bitrix = new Bitrix($user->id);
            $response = $bitrix->batch($batch);
            if (!empty($response['bitrix']) && empty($response['bitrix']['result']['result']['result_error'])) {
                $docs = new UserFiles();
                $docs->user_id = $user->id;
                $docs->type = $_POST['type'];
                $docs->link = "{$_POST['type']}.{$ext}";
                if ($docs->save()) {
                    if (empty($stageUser))
                        return Yii::$app->response->redirect('docs');
                    else {
                        $stageUser->deployment_passed = 1;
                        $stageUser->update();
                        return Yii::$app->response->redirect('index');
                    }
                }
                else {
                    Yii::$app->session->setFlash('error', 'Ошибка сохранения информации');
                    return Yii::$app->response->redirect('docs');
                }
            } else {
                file_put_contents('error-bitrix.log', $response . PHP_EOL, FILE_APPEND);
                Yii::$app->session->setFlash('error', 'Ошибка передачи документов. Пожалуйста, повторите попытку позже');
                return Yii::$app->response->redirect('docs');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Файл не был отправлен или указан неизвестный тип файла');
            return Yii::$app->response->redirect('docs');
        }
    }

    /*Этапы процедуры*/
    public function actionStaps()
    {
        $id = Yii::$app->getUser()->getId();
        $userStages = UserStages::find()->where(['user_id' => $id])->orderBy('sort asc')->asArray()->all();
        $user = UserModel::findOne($id);
        $currentStage = UserStages::findOne(['user_id' => $id, 'current_stage' => 1]);
        $getData = [];
        if (in_array($user->stage_id, UserStages::$needSync)) {
            $downloads = DownloadUrls::findOne(['stage_id' => $user->stage_id, 'deal_id' => $user->deal_id, 'user_id' => $user->id]);
            $text = TextStages::findOne(['stage_id' => $user->stage_id, 'deal_id' => $user->deal_id, 'user_id' => $user->id]);
            $getData = [
                'files' => $downloads,
                'text' => $text,
            ];
        }
        return $this->render('staps', [
            'userStages' => $userStages,
            'user' => $user,
            'deal' => $getData,
            'current' => $currentStage
        ]);
    }

    /*Настройки*/
    public function actionSettings()
    {
        $id = Yii::$app->getUser()->getId();
        $user = UserModel::find()->where(['id' => $id])->one();
        $notice = Notice::findOne(['user_id' => $id]);
        if (!empty($notice)){
            $params = json_decode($notice->notice_params, true);
        }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => '']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => '']);
        $this->view->registerMetaTag(['property' => 'og:title', 'content' => '']);
        $this->view->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '']);
        $this->view->registerMetaTag(['property' => 'og:url', 'content' => '']);
        $this->view->registerMetaTag(['property' => 'og:description', 'content' => '']);
        return $this->render('settings', [
            'user' => $user,
            'params' => $params ?? "{}",
        ]);
    }
    public function actionFioRegion()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty($_POST['fio']) && !empty($_POST['region'])){
            $user = UserModel::findOne(['id' => Yii::$app->getUser()->getId()]);
            if (!empty($user)){
                $user->fio = $_POST['fio'];
                $user->region = $_POST['region'];
                if ($user->update() !== false){
                    $rsp = ['status' => 'success'];
                } else $rsp = ['status' => 'error', 'message' => 'Обновление не удалось'];
            } else $rsp = ['status' => 'error', 'message' => 'Пользователь не найден'];
        } else $rsp = ['status' => 'error', 'message' => 'Заполните все необходимые поля'];
        return $rsp;
    }

    public function actionEmailChange()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = UserModel::findOne(['id' => Yii::$app->getUser()->getId()]);
        $old_email = $model->email;

        if (!empty($_POST['email'])){
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
                return ['status' => 'error', 'message' => 'Не корректный Email'];
            }
            $user = UserModel::find()
                ->where(['email' => $old_email])
                ->andWhere(['!=', 'id', $model->id])
                ->one();
            if (!empty($user)){
                return ['status' => 'error', 'message' => 'Такой email уже существует'];
            } else {
                $model->email = $_POST['email'];
                if ($model->update() !== false){
                    return ['status' => 'success'];
                } return ['status' => 'error', 'message' => 'Произошла ошибка на сервере'];
            }
        } return ['status' => 'error', 'message' => 'Email не может быть пустой'];
    }

    public function actionChangePass()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = User::find()->where(['id' => Yii::$app->getUser()->getId()])->one();
        if (empty($model)){
            return ['status' => 'error', 'message' => 'Пользователь'];
        }
        if(!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['confirm'])){
            $check = $model->validatePassword($_POST['old']);
            if ($check){
                if ($_POST['new'] === $_POST['confirm']){
                    $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['new']);
                    if ($model->validate()){
                        if ($model->update() !== false){
                            return ['status' => 'success'];
                        } return ['status' => 'error', 'message' => 'Ошибка сохранения данных'];
                    } return ['status' => 'error', 'message' => $model->errors];
                } return ['status' => 'error', 'message' => 'Пароли должны совпадать'];
            } return ['status' => 'error', 'message' => $check];
        } return ['status' => 'error', 'message' => 'Заполните все поля'];
    }

    public function actionNotice()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = User::findOne(['id' => Yii::$app->getUser()->getId()]);
        $post = $_POST['notice'];
        $json = [];
        foreach ($post as $k => $v){
            $json[$k] = $v;
        }
        if (!empty($model)){
            $notice = Notice::findOne(['user_id' => $model->id]);
            if (!empty($notice)){
                $notice->user_id = $model->id;
                $notice->notice_params = json_encode($json);
                if ($notice->update() !== false){
                    return ['status' => 'success'];
                } return ['status' => 'error', 'message' => 'Ошибка сохранения данных'];
            } else {
                $notice = new Notice();
                $notice->user_id = $model->id;
                $notice->notice_params = json_encode($json);
                if ($notice->save()){
                    return ['status' => 'success'];
                } return ['status' => 'error', 'message' => 'Ошибка сохранения данных'];
            }
        } return ['status' => 'error', 'message' => 'Пользователь не найден'];
    }

    /*Тех.Поддержка*/
    public function actionHelp()
    {
        $user = Yii::$app->getUser()->getId();
        if (!empty($user)){
            if (!empty($_POST['name'])){
                $tiket = Tikets::find()->where(['user_id' => $user, 'status' => Tikets::STATUS_OPENED])->orderBy('id desc')->one();
                if (empty($tiket)){
                    $tiket = new Tikets();
                    $tiket->user_id = $user;
                    $tiket->status = Tikets::STATUS_OPENED;
                    if ($tiket->save()){
                        $rsp = ['status' => 'success'];
                    } else $rsp = ['status' => 'error', 'message' => 'Возникла ошибка при отправке сообщения'];
                } else $rsp = ['status' => 'error', 'message' => 'У вас уже есть открытый диалог'];
            }
            $tiket = Tikets::find()->where(['user_id' => $user, 'status' => Tikets::STATUS_OPENED])->orderBy('id desc')->one();
        } else $rsp = ['status' => 'error', 'message' => 'Пользователь не найден'];
        return $this->render('help', [
            'rsp' => $rsp ?? null,
            'tiket' => $tiket,
        ]);
    }

    public function actionSendMessageHelp()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty($_POST['tiketId']) && !empty($_POST['message'])){
            $msg = $_POST['message'];
            $user = Yii::$app->getUser()->getId();
            if (!empty($user)){
                $dialog = Tikets::find()->where(['user_id' => $user, 'status' => Tikets::STATUS_OPENED])->select('id')->orderBy('id desc')->one();
                if (!empty($dialog)){
                    $message = new MessageTiket();
                    $message->tiket_id = (int)$_POST['tiketId'];
                    $message->user_id = $user;
                    $message->message = $msg;
                    $message->isSupport = 0;
                    $message->validate();
                    if ($message->save()){
                        $rsp = ['status' => 'success'];
                    } else $rsp = ['status' => 'error', 'message' => 'Ошибка на сервере'];
                } else $rsp = ['status' => 'error', 'message' => 'Такого диалога нет'];
            } else $rsp = ['status' => 'error', 'message' => 'Пользователь не найден'];
        } else $rsp = ['status' => 'error', 'message' => 'Нет сообщения'];
        return $rsp;
    }
    /*Тех.Поддержка*/
    public function actionSendJurForm()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty($_POST['quest'])){
            $user = UserModel::findOne(['id' => Yii::$app->getUser()->getId()]);
            if (!empty($user)){
                $date = new \DateTime();
                $date->setTimestamp(time());
                $bitrix = new Bitrix();
                $cmd = [
                    'deal' => 'crm.deal.get?id=' . $user->deal_id,
                    'find' => 'crm.contact.get?id=$result[deal][CONTACT_ID]',
                    'activity' => 'crm.activity.add?' . http_build_query([
                        'fields' => [
                            "OWNER_ID" => '$result[deal][ID]',
                            'TYPE_ID' => 2,
                            'OWNER_TYPE_ID' => 2,
                            "COMMUNICATIONS" => [[ 'VALUE' => '$result[find][PHONE][0][VALUE]', 'ENTITY_ID' => '$result[find][ID]', "ENTITY_TYPE_ID" => 3]],
                            "SUBJECT" => "Обратный звонок",
                            "DESCRIPTION" => "Пользователь заказал обратный звонок по вопросу: {$_POST['quest']}",
                            "START_TIME" => $date->format("Y-m-d H:i:sP"),
                            "END_TIME" => $date->modify('+1 hour')->format("Y-m-d H:i:sP"),
                            "COMPLETED" => "N",
                            "PRIORITY" => 3,
                            "RESPONSIBLE_ID" => '$result[deal][ASSIGNED_BY_ID]',
                            "DESCRIPTION_TYPE" => 3,
                            "DIRECTION" => 2,
                        ]
                    ])
                ];
                $batch = ['halt' => 0, 'cmd' => $cmd];
                usleep(250000);
                $response = $bitrix->batch($batch);
            } else $response = ['status' => 'error', 'message' => 'Пользователь не найден'];
        } else $response = ['status' => 'error', 'message' => 'Не выбран не один вариант'];
        return $response;
    }

    /*public function actionTest() {
        $user = UserModel::findOne(['id' => Yii::$app->getUser()->getId()]);
        $date = new \DateTime();
        $date->setTimestamp(time());
        $bitrix = new Bitrix();
        $cmd = [
            'deal' => 'crm.deal.get?id=' . $user->deal_id,
            'find' => 'crm.contact.get?id=$result[deal][CONTACT_ID]',
            'activity' => 'crm.activity.add?' . http_build_query([
                    'fields' => [
                        "OWNER_ID" => '$result[deal][ID]',
                        'TYPE_ID' => 2,
                        'OWNER_TYPE_ID' => 2,
                        "COMMUNICATIONS" => [[ 'VALUE' => '$result[find][PHONE][0][VALUE]', 'ENTITY_ID' => '$result[find][ID]', "ENTITY_TYPE_ID" => 3]],
                        "SUBJECT" => "Обратный звонок",
                        "DESCRIPTION" => "Пользователь заказал обратный звонок по вопросу: Тест",
                        "START_TIME" => $date->format("Y-m-d H:i:sP"),
                        "END_TIME" => $date->modify('+1 hour')->format("Y-m-d H:i:sP"),
                        "COMPLETED" => "N",
                        "PRIORITY" => 3,
                        "RESPONSIBLE_ID" => '$result[deal][ASSIGNED_BY_ID]',
                        "DESCRIPTION_TYPE" => 3,
                        "DIRECTION" => 2,
                    ]
                ])
        ];
        $batch = ['halt' => 0, 'cmd' => $cmd];
        usleep(250000);
        $val = $bitrix->batch($batch);
        die(print_r($val));
    }*/

    public function actionCfs2()
    {
        if (!empty($_SESSION['anketa_token']) || !empty($_COOKIE['anketa_token'])) {
            $anketa = Anketa::findOne(['cookie_token' => !empty($_SESSION['anketa_token']) ? $_SESSION['anketa_token'] : $_COOKIE['anketa_token']]);
            if (!empty($anketa)) {
                foreach ($anketa as $key => $item) {
                    $anketa->$key = str_replace('\"', '', $item);
                }
                $createdObject = new \stdClass();
                $createdObject->system_info = new \stdClass();
                $createdObject->system_info->email = !empty($anketa->email) ? Html::encode($anketa->email) : null;
                $createdObject->system_info->fio = !empty($anketa->fio) ? Html::encode($anketa->fio) : null;
                $createdObject->system_info->phone = !empty($anketa->phone) ? Html::encode($anketa->phone) : null;
                $createdObject->system_info->city = !empty($anketa->city) ? Html::encode($anketa->city) : null;
                $createdObject->system_info->token = !empty($anketa->cookie_token) ? $anketa->cookie_token : null;
                $createdObject->client_param = 'der_custom';
                $restricted = ['id', 'date', 'phone', 'email', 'city', 'cookie_token', 'fio', 'client_param', 'confirmed_status'];
                foreach ($anketa as $key => $item)
                    if (!in_array($key, $restricted)) {
                        $createdObject->$key = new \stdClass();
                        $createdObject->$key = !empty($item) ? json_decode($item) : null;
                    }
            }
            $createdObject = json_encode($createdObject);
        }
        return $this->render('cfs2', ['anketa' => $createdObject ?? null, 'user' => UserModel::findOne(Yii::$app->getUser()->getId())]);
    }

    public function actionObjectAnalysis()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty($_REQUEST['object'])) {
            $points = 0;
            $credit = 0;
            $json = json_decode($_REQUEST['object']);

            /*доходы*/
            if (!empty($json->credit_debt)) {
                foreach ($json->credit_debt as $item) {
                    if (is_numeric($item->summ))
                        $credit += $item->summ;
                }
            }
            if (!empty($json->other_debt)) {
                foreach ($json->other_debt as $item) {
                    if (is_numeric($item->summ))
                        $credit += $item->summ;
                }
            }
            if (!empty($json->incoming_money)) {
                $summ = 0;
                if (!empty($json->incoming_money->chosen)) {
                    foreach ($json->incoming_money->chosen as $key => $item) {
                        if ($item->type !== "Иные выплаты" && is_numeric($item->additional->summ))
                            $summ += $item->additional->summ;
                    }
                } else
                    $summ = !empty($json->incoming_money->totalSumm) ? $json->incoming_money->totalSumm : 0;
                if (!empty($json->dependents) && $json->dependents->main === 'Есть')
                    $newsumm = $summ - 12000 * $json->dependents->additional < 0 ? 0 : $summ - 12000 * $json->dependents->additional;
                else
                    $newsumm = $summ;
                if ($credit / 36 > $newsumm) {
                    $response['incoming_money'] = [
                        'message' => 'Ваши доходы не превышают платеж реструктуризации.',
                        'bankruptcy_chance' => 'Высокий',
                        'debt_restruct' => 'Низкий',
                    ];
                    $points += 10;
                } else {
                    $response['incoming_money'] = [
                        'message' => 'Ваши доходы больше, чем платеж реструктуризации.',
                        'bankruptcy_chance' => 'Низкий - Нужны подготовительные работы (обратитесь к юристу)',
                        'debt_restruct' => 'Высокий (необходимо снизить сумму доходов)',
                    ];
                    $points += 3;
                }
            } else {
                $response['incoming_money'] = [
                    'message' => 'У Вас нет официальных источников дохода.',
                    'bankruptcy_chance' => 'Высокий',
                    'debt_restruct' => 'Низкий',
                ];
                $points += 10;
            }
            /*доходы*/

            /*имущество*/
            if (!empty($json->property) && !empty($json->property->mine)) {
                $countPropRegistered = 0;
                $haveHouse = false;
                foreach ($json->property->mine as $item) {
                    if ($item->type === 'Квартира' || $item->type === 'Частный дом') {
                        $haveHouse = true;
                        if ($item->registered === true)
                            $countPropRegistered++;
                    }
                }
                if (count($json->property->mine) > $countPropRegistered) {
                    $response['property'] = [
                        'message' => 'У Вас есть имущество, которое может быть продано на торгах по банкротству. Необходимо получить консультацию, как избежать продажи и защитить имущество!',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    if (!$haveHouse)
                        $response['property']['message'] .= "Вы прописаны не в собственном жилье, а значит это не единственное место пригодное для жизни! Ваше имущество могут продать на торгах при банкротстве – СРОЧНО ПРОПИШИТЕСЬ В СОБСТВЕННОЙ КВАРТИРЕ (это наложит запрет на продажу)";
                    $points += 1;
                } else {
                    $response['property'] = [
                        'message' => 'У Вас нет недвижимости и другого имущества, которое может быть реализовано при банкротстве! Это замечательно.',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 10;
                }
            } else {
                $response['property'] = [
                    'message' => 'У Вас нет недвижимости и другого имущества, которое может быть реализовано при банкротстве! Это замечательно.',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 10;
            }
            /*имущество*/

            /*сделки*/
            if (empty($json->deals)) {
                $response['deals'] = [
                    'message' => 'У Вас не было сделок за последние 3 года, а значит и нечего оспаривать. Вздохните спокойно!',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 10;
            } else {
                $zz = 0;
                foreach ($json->deals as $item) {
                    if ((int)date('Y') - $item->year <= 3)
                        $zz++;
                }
                if ($zz > 0) {
                    $response['deals'] = [
                        'message' => 'Вы совершали сделки за последние три года! Нужно получить консультацию у юриста о том, как защитить их от оспаривания!',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 3;
                } else {
                    $response['deals'] = [
                        'message' => 'У Вас не было сделок за последние 3 года, а значит и нечего оспаривать. Вздохните спокойно!',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 10;
                }
            }
            /*сделки*/

            /*брак*/
            if (!empty($json->marital_status) && ($json->marital_status->main !== "Не женат (не замужем) / Вдовец (вдова)" || $json->marital_status->main !== "Не женат (не замужем)")) {
                if ($json->marital_status->main === 'Разведен (разведена)') {
                    if (!empty($json->marital_status->additional) && (int)date("Y") - $json->marital_status->additional > 3) {
                        $response['marital_status'] = [
                            'message' => 'Вы развелись более 3 лет назад! А значит даже при отсутствие деления имущества при разводе, у Вас уже нет семейного имущества! Все хорошо!',
                            'bankruptcy_chance' => null,
                            'debt_restruct' => null,
                        ];
                        $points += 10;
                    } else {
                        if (!empty($json->marital_status->division) && $json->marital_status->division === 'Был раздел имущества') {
                            $response['marital_status'] = [
                                'message' => 'У вас было деление имущества при разводе! Это хорошо!',
                                'bankruptcy_chance' => null,
                                'debt_restruct' => null,
                            ];
                            $points += 10;
                        } else {
                            $partnerProp = 0;
                            $exPartnerProp = 0;
                            if (!empty($json->property->partner)) {
                                foreach ($json->property->partner as $item)
                                    if ((int)date("Y") - $item->year <= 3)
                                        $partnerProp++;
                            }
                            if (!empty($json->property->ex_partner)) {
                                foreach ($json->property->ex_partner as $item)
                                    if ((int)date("Y") - $item->year <= 3)
                                        $exPartnerProp++;
                            }
                            if ($partnerProp || $exPartnerProp) {
                                $response['marital_status'] = [
                                    'message' => 'У Вас есть семейное имущество, купленное в браке за последние 3 года! Его могут продать на торгах. Срочно обсудите с юристом, как защитить это имущество от реализации!',
                                    'bankruptcy_chance' => null,
                                    'debt_restruct' => null,
                                ];
                                $points += 3;
                            } else {
                                $response['marital_status'] = [
                                    'message' => 'У Вас нет семейного имущества, купленного в браке! Это очень хорошо!',
                                    'bankruptcy_chance' => null,
                                    'debt_restruct' => null,
                                ];
                                $points += 10;
                            }
                        }
                    }
                } else {
                    $partnerProp = 0;
                    $exPartnerProp = 0;
                    if (!empty($json->property->partner)) {
                        foreach ($json->property->partner as $item)
                            if ((int)date("Y") - $item->year <= 3)
                                $partnerProp++;
                    }
                    if (!empty($json->property->ex_partner)) {
                        foreach ($json->property->ex_partner as $item)
                            if ((int)date("Y") - $item->year <= 3)
                                $exPartnerProp++;
                    }
                    if ($partnerProp || $exPartnerProp) {
                        $response['marital_status'] = [
                            'message' => 'У Вас есть семейное имущество, купленное в браке за последние 3 года! Его могут продать на торгах. Срочно обсудите с юристом, как защитить это имущество от реализации!',
                            'bankruptcy_chance' => null,
                            'debt_restruct' => null,
                        ];
                        $points += 3;
                    } else {
                        $response['marital_status'] = [
                            'message' => 'У Вас нет семейного имущества, купленного в браке! Это очень хорошо!',
                            'bankruptcy_chance' => null,
                            'debt_restruct' => null,
                        ];
                        $points += 10;
                    }
                }
            } else {
                $response['marital_status'] = [
                    'message' => 'Вы никогда не состояли в браке, а значит и нет совместного имущества! Это облегчит процедуру!',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 10;
            }
            /*брак*/


            /*ип*/
            if (!empty($json->additional_audit_info->individual_enterpreneur) && $json->additional_audit_info->individual_enterpreneur->main === 'ДА') {
                $response['individual_enterpreneur'] = [
                    'message' => 'Вы индивидуальный предприниматель, а значит процедура будет для Вас сложнее',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 3;
            } else {
                $response['individual_enterpreneur'] = [
                    'message' => 'Вы не индивидуальный предприниматель, процедура будет проще',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 5;
            }
            /*ип*/

            /*военный*/
            if (!empty($json->status_soc)) {
                if (in_array('Военнослужащий', $json->status_soc)) {
                    $response['status_soc'] = [
                        'message' => 'Вы военный – это группа риска при банкротстве. Нужна консультация с юристом',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 4;
                } else {
                    $response['status_soc'] = [
                        'message' => "Ваш статус <b>{$json->status_soc[0]}</b> - препятствий к банкротству нет",
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 5;
                }
            } else {
                $response['status_soc'] = [
                    'message' => 'Статус не указан. Нужна консультация с юристом',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 4;
            }
            /*военный*/

            /*просрочки по кредитам*/
            if (!empty($json->credit_debt)) {
                $pros = 0;
                $notAllowed = ['Нет просрочки', '1 месяц', '2 месяца'];
                foreach ($json->credit_debt as $item) {
                    if (!in_array($item->latePayment, $notAllowed))
                        $pros++;
                }
                if ($pros === count($json->credit_debt)) {
                    $response['credit_debt'] = [
                        'message' => 'У Вас большие просрочки – это позволяет подать на банкротство с высоким шансом!',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 5;
                } else {
                    $response['credit_debt'] = [
                        'message' => 'По некоторым кредитам просрочки менее 3 месяцев. Банкротство возможно со средним шансом. Уточните у юриста детали!',
                        'bankruptcy_chance' => null,
                        'debt_restruct' => null,
                    ];
                    $points += 2;
                }
            } else {
                $response['credit_debt'] = [
                    'message' => 'По некоторым кредитам просрочки менее 3 месяцев. Банкротство возможно со средним шансом. Уточните у юриста детали!',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 2;
            }
            /*просрочки по кредитам*/

            /*ООО и АО*/
            if (!empty($json->additional_audit_info->LLC_capital) && $json->additional_audit_info->LLC_capital->main === 'ДА') {
                $response['LLC_capital'] = [
                    'message' => 'Вы участник общества – это усложняет процедуру. Нужна консультация с юристом',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 1;
            } else {
                $response['LLC_capital'] = [
                    'message' => 'Вы не являетесь участником АО или ООО – это хорошо!',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 5;
            }
            /*ООО и АО*/

            /*дебиторка*/
            if (!empty($json->additional_audit_info->receivables) && $json->additional_audit_info->receivables->main === 'ДА') {
                $response['receivables'] = [
                    'message' => 'У Вас есть право требовать долги у других. Это усложняет процедуру. Уточните у юриста, как быть с этим',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 1;
            } else {
                $response['receivables'] = [
                    'message' => 'У Вас нет текущих прав требования долга к третьим лицам. Это упрощает процедуру!',
                    'bankruptcy_chance' => null,
                    'debt_restruct' => null,
                ];
                $points += 5;
            }
            /*дебиторка*/

            /*долги*/
            $totalDebtSumm = 0;
            if (!empty($json->other_debt)) {
                foreach ($json->other_debt as $item) {
                    switch ($item->type) {
                        case "Алименты":
                            $response['debts']['notAllowed'][] = "Долги по алиментам не списываются при банкротстве!";
                            break;
                        case "Задолженность по причинению вреда здоровью, материального ущерба, морального вреда":
                            $response['debts']['notAllowed'][] = "Компенсация материального вреда и причиненного ущерба не списывается при банкротства!";
                            break;
                        case "Субсидиарная ответственность по долгам юр.лица":
                            $response['debts']['notAllowed'][] = "Субсидиарная ответственность не списывается при банкротстве!";
                            break;
                        default:
                            if (is_numeric($item->summ))
                                $totalDebtSumm += $item->summ;
                            break;
                    }
                }
            }
            if (!empty($json->credit_debt)) {
                foreach ($json->credit_debt as $item)
                    if (is_numeric($item->summ))
                        $totalDebtSumm += $item->summ;
            }
            if (!empty($json->property->mine)) {
                if (count($json->property->mine) > 1 || (count($json->property->mine) === 1 && $json->property->mine[0]->registered !== true) || $response['marital_status']['message'] === 'У Вас есть семейное имущество, купленное в браке за последние 3 года! Его могут продать на торгах. Срочно обсудите с юристом, как защитить это имущество от реализации!') {
                    $response['debts']['addtext'] = 'Вам не подходит упрощенная (внесудебная) процедура банкротства. Вы можете подать в на общих условиях через Арбитражный Суд!';
                    if ($totalDebtSumm > 300000) {
                        $response['debts']['lasttext'] = 'Отлично! Сумма долга подходит для подачи заявления на банкротство!';
                        $points += 6;
                    } else {
                        $response['debts']['lasttext'] = 'Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!';
                        $points += 2;
                    }
                } else {
                    if ($totalDebtSumm > 700000) {
                        $response['debts']['lasttext'] = 'Отлично! Сумма долга подходит для подачи заявления на банкротство!';
                        $response['debts']['addtext'] = 'У Вас очень большие долги. Ваша процедура банкротства будет в стандартном формате через Арбитражный Суд';
                        $points += 6;
                    } else {
                        $response['debts']['lasttext'] = 'Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!';
                        $response['debts']['addtext'] = 'Вам подходит упрощенное (внесудебное) банкротство! Это замечательно! Но нужно уточнить у юриста!';
                        $points += 10;
                    }
                }
            } else {
                if ($response['marital_status']['message'] === 'У Вас есть семейное имущество, купленное в браке за последние 3 года! Его могут продать на торгах. Срочно обсудите с юристом, как защитить это имущество от реализации!') {
                    $response['debts']['addtext'] = 'Вам не подходит упрощенная (внесудебная) процедура банкротства. Вы можете подать в на общих условиях через Арбитражный Суд!';
                    if ($totalDebtSumm > 300000) {
                        $response['debts']['lasttext'] = 'Отлично! Сумма долга подходит для подачи заявления на банкротство!';
                        $points += 6;
                    } else {
                        $response['debts']['lasttext'] = 'Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!';
                        $points += 2;
                    }
                } else {
                    if ($totalDebtSumm > 700000) {
                        $response['debts']['lasttext'] = 'Отлично! Сумма долга подходит для подачи заявления на банкротство!';
                        $response['debts']['addtext'] = 'У Вас очень большие долги. Ваша процедура банкротства будет в стандартном формате через Арбитражный Суд';
                        $points += 6;
                    } else {
                        $response['debts']['lasttext'] = 'Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!';
                        $response['debts']['addtext'] = 'Вам подходит упрощенное (внесудебное) банкротство! Это замечательно! Но нужно уточнить у юриста!';
                        $points += 10;
                    }
                }
            }
            /*долги*/
            $points = $points - 7 <= 10 ? $points : $points - 7;
            if ($points <= 35) {
                $commentary = "<p>Вы набрали {$points} балов. Это ОЧЕНЬ НИЗКИЙ банкротный рейтинг!</p>";
                $commentary .= "<p>Шанс на успех при самостоятельном банкротстве минимальный.</p>";
                $commentary .= "<p>Если Вы подадите на банкротство БЕЗ ПОДГОТОВКИ, то точно навредите себе! Обязательно проконсультируйтесь с юристом</p>";
                $commentary .= "<p>Вероятность списания долга: Низкая (без вмешательства экспертов)</p>";
            } elseif ($points >= 36 && $points <= 50) {
                $commentary = "<p>Вы набрали {$points} балов. Это НИЗКИЙ банкротный рейтинг!</p>";
                $commentary .= "<p>Шанс на успех при самостоятельном банкротстве ниже среднего.</p>";
                $commentary .= "<p>Если Вы подадите на банкротство БЕЗ ПОДГОТОВКИ, то могут быть негативные последствия. Обязательно уточнить у специалиста, как правильно подготовится к процедуре и списать долги без рисков</p>";
                $commentary .= "<p>Вероятность списания долга: Средняя (без вмешательства экспертов)</p>";
            } elseif ($points >= 51 && $points <= 65) {
                $commentary = "<p>Вы набрали {$points} балов. Это СРЕДНИЙ банкротный рейтинг!</p>";
                $commentary .= "<p>Шанс на успех при самостоятельном банкротстве не самый лучший.</p>";
                $commentary .= "<p>Мы рекомендуем провести консультацию с юристом и обсудить спорные моменты перед подачей. Могут быть негативные последствия.</p>";
                $commentary .= "<p>Вероятность списания долга: Высокая</p>";
            } else {
                $commentary = "<p>Вы набрали {$points} балов. Этот показатель ВЫШЕ СРЕДНЕГО по банкротному рейтингу!</p>";
                $commentary .= "<p>Шанс на успех при самостоятельном банкротстве присутствует, но не рискуйте.</p>";
                $commentary .= "<p>Уточните у юриста, как грамотно решить спорные нюансы и подавайте на банкротство!</p>";
                $commentary .= "<p>Вероятность списания долга: Очень высокая</p>";
            }
            $response['points'] = $points;
            $response['commentary'] = $commentary;
            return ['status' => 'success', 'data' => $response];
        } else
            return ['status' => 'error', 'reason' => 'Анализируемый объект пуст'];
    }

    public function actionComposeData()
    {
        if (Yii::$app->request->isAjax && !empty($_REQUEST['data'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $message = "";
            $data = json_decode($_REQUEST['data']);
            if (!empty($data->system_info)) {
                $fio = !empty($data->system_info->fio) ? $data->system_info->fio : null;
                $phone = !empty($data->system_info->phone) ? $data->system_info->phone : null;
                $city = !empty($data->system_info->city) ? $data->system_info->city : null;
                $email = !empty($data->system_info->email) ? $data->system_info->email : null;
            } else {
                $fio = null;
                $phone = null;
                $city = null;
                $email = null;
            }
            $message = '<br>ДАННЫЕ АНКЕТЫ<br><br>';
            $message .= !empty($fio) ? "ФИО: $fio" : 'ФИО не указано';
            $message .= "<br><br>";
            $message .= !empty($phone) ? "Телефон: $phone" : 'Телефон не указан';
            $message .= "<br><br>";
            $message .= !empty($email) ? "Email: $email" : 'Email не указан';
            $message .= "<br><br>";
            $message .= !empty($city) ? "Город: $city" : 'Город не указан';
            $message .= "<br><br>";
            $bitrix_data = [
                'soc' => "",
                'work' => "",
                'marital' => "",
                'criminal' => "",
                'depends' => "",
                'disabil' => "",
                'credit' => "",
                'other_debts' => "",
                'audit_info' => "",
                'income' => "",
                'property' => "",
                'deals' => "",
                'rationale' => "",
            ];
            $bitrix_data['city'] = $city;
            if (!empty($data->status_soc)) {
                $message .= 'Социальный статус: ';
                foreach ($data->status_soc as $item) {
                    $message .= $item . ", ";
                    $bitrix_data['soc'] .= $item . ", ";
                }
            } else
                $message .= 'Социальный статус: не указан';
            $message .= "<br><br>";

            if (!empty($data->work_place)) {
                $message .= 'Информация о месте работы: ';
                foreach ($data->work_place as $item) {
                    $message .= $item . ', ';
                    $bitrix_data['work'] .= $item . ", ";
                }
            } else
                $message .= 'Информация о месте работы: нет / не указана';
            $message .= '<br><br>';

            if (!empty($data->marital_status)) {
                $message .= 'Семейное положение: ';
                foreach ($data->marital_status as $item) {
                    if (!empty($item)) {
                        $message .= $item . ', ';
                        $bitrix_data['marital'] .= $item . ", ";
                    }
                }
            } else
                $message .= 'Семейное положение: не указано';
            $message .= '<br><br>';

            if (!empty($data->criminal_record)) {
                $message .= 'Судимости: ';
                if (!empty($data->criminal_record->main)) {
                    $message .= $data->criminal_record->main;
                    $bitrix_data['criminal'] .= $data->criminal_record->main;
                }
                if ($data->criminal_record->main === 'Да' && !empty($data->criminal_record->additional)) {
                    foreach ($data->criminal_record->additional as $item) {
                        $message .= ', ' . $item;
                        $bitrix_data['criminal'] .= ', ' . $item;
                    }
                }
            } else
                $message .= 'Судимости: нет';
            $message .= '<br><br>';

            if (!empty($data->dependents)) {
                $message .= 'Иждивенцы и дети: ';
                if (!empty($data->dependents->main)) {
                    $message .= $data->dependents->main;
                    $bitrix_data['depends'] .= $data->dependents->main;
                }
                if ($data->dependents->main === 'Есть' && !empty($data->dependents->additional)) {
                    $message .= ', ' . $data->dependents->additional;
                    $bitrix_data['depends'] .= ', ' . $data->dependents->additional;
                }
            } else
                $message .= 'Иждивенцы и дети: нет';
            $message .= '<br><br>';

            if (!empty($data->disability)) {
                $message .= 'Инвалидность: ';
                if (!empty($data->disability->main)) {
                    $message .= $data->disability->main;
                    $bitrix_data['disabil'] .= $data->disability->main;
                }
                if ($data->disability->main === 'Есть' && !empty($data->disability->additional)) {
                    $message .= ', указанная группа - ' . $data->disability->additional;
                    $bitrix_data['disabil'] .= ', указанная группа - ' . $data->disability->additional;
                }
            } else
                $message .= 'Инвалидность: нет';
            $message .= '<br><br>';

            $totalSumm = 0;
            $totalOstatok = 0;

            if (!empty($data->credit_debt)) {
                $message .= 'Данные о кредиторах: ';
                foreach ($data->credit_debt as $key => $item) {
                    $prch = $item->poruch ? 'есть' : 'нет';
                    $message .= "<br>" . ((int)$key + 1) . ") " . "Кредитор: {$item->creditor}, Год: {$item->year}, Сумма: {$item->summ}, Платеж в месяц: {$item->monthly}, Тип кредита: {$item->type}, Просрочки: {$item->latePayment}, Остаток: {$item->ostatok}, Поручитель: $prch";
                    $bitrix_data['credit'] .= "\r\n" . ((int)$key + 1) . ") " . "Кредитор: {$item->creditor}, Год: {$item->year}, Сумма: {$item->summ}, Платеж в месяц: {$item->monthly}, Тип кредита: {$item->type}, Просрочки: {$item->latePayment} , Остаток: {$item->ostatok}, Поручитель: $prch";
                    $totalSumm += (int)$item->summ;
                    $totalOstatok += (int)$item->ostatok;
                }
            } else
                $message .= 'Данные о кредиторах: не указаны';
            $message .= '<br><br>';

            if (!empty($data->other_debt)) {
                $message .= 'Прочие долги: ';
                foreach ($data->other_debt as $key => $item) {
                    $message .= "<br>" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Сумма: {$item->summ},  Комментарий: {$item->commentary}";
                    $bitrix_data['other_debts'] .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Сумма: {$item->summ},  Комментарий: {$item->commentary}";
                    $totalSumm += (int)$item->summ;
                }
            } else
                $message .= 'Прочие долги: отсутствуют / не указаны';
            $message .= '<br><br>';

            $msg = '';
            if (!empty($data->additional_audit_info)) {
                $msg .= 'Прочая информация для аудита: ';
                $counts = 1;
                if (!empty($data->additional_audit_info->court_decision)) {
                    if (!empty($data->additional_audit_info->court_decision->main)) {
                        if ($data->additional_audit_info->court_decision->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Решения судов: ДА";
                            if (!empty($data->additional_audit_info->court_decision->additional)) {
                                foreach ($data->additional_audit_info->court_decision->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Решение № {$item->court_decision_number}, Дата: {$item->court_decision_date}, Сумма: {$item->court_decision_summ}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Решения судов: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Решения судов: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Решения судов: НЕТ";
                }
                if (!empty($data->additional_audit_info->executive_proceedings)) {
                    if (!empty($data->additional_audit_info->executive_proceedings->main)) {
                        if ($data->additional_audit_info->executive_proceedings->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Исполнительные производства: ДА";
                            if (!empty($data->additional_audit_info->executive_proceedings->additional)) {
                                foreach ($data->additional_audit_info->executive_proceedings->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Номер производства: {$item->executive_proceedings_number}, Дата: {$item->executive_proceedings_date}, Сумма: {$item->executive_proceedings_summ}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Исполнительные производства: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Исполнительные производства: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Исполнительные производства: НЕТ";
                }
                if (!empty($data->additional_audit_info->debits)) {
                    if (!empty($data->additional_audit_info->debits->main)) {
                        if ($data->additional_audit_info->debits->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Безакцептное списание средств: ДА";
                            if (!empty($data->additional_audit_info->debits->additional)) {
                                foreach ($data->additional_audit_info->debits->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Организация: {$item->debits_organisation}, Сумма: {$item->debits_summ}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Безакцептное списание средств: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Безакцептное списание средств: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Безакцептное списание средств: НЕТ";
                }
                if (!empty($data->additional_audit_info->arests)) {
                    if (!empty($data->additional_audit_info->arests->main)) {
                        if ($data->additional_audit_info->arests->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Аресты имущества: ДА";
                            if (!empty($data->additional_audit_info->arests->additional)) {
                                foreach ($data->additional_audit_info->arests->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Причина: {$item->arests_reason}, Имущество: {$item->arests_type}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Аресты имущества: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Аресты имущества: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Аресты имущества: НЕТ";
                }
                if (!empty($data->additional_audit_info->LLC_capital)) {
                    if (!empty($data->additional_audit_info->LLC_capital->main)) {
                        if ($data->additional_audit_info->LLC_capital->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Доля в уставном капитале: ДА";
                            if (!empty($data->additional_audit_info->LLC_capital->additional)) {
                                foreach ($data->additional_audit_info->LLC_capital->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Тип: {$item->LLC_capital_type}, Доля: {$item->LLC_capital_percent}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Доля в уставном капитале: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Доля в уставном капитале: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Доля в уставном капитале: НЕТ";
                }
                if (!empty($data->additional_audit_info->individual_enterpreneur)) {
                    if (!empty($data->additional_audit_info->individual_enterpreneur->main)) {
                        if ($data->additional_audit_info->individual_enterpreneur->main === 'ДА') {
                            $msg .= "\r\n" . ($counts++) . ") Зарегистрирован ИП: ДА";
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Зарегистрирован ИП: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Зарегистрирован ИП: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Зарегистрирован ИП: НЕТ";
                }
                if (!empty($data->additional_audit_info->official_income)) {
                    if (!empty($data->additional_audit_info->official_income->main)) {
                        if ($data->additional_audit_info->official_income->main === 'НЕТ' || $data->additional_audit_info->official_income->main === 'НЕ УВЕРЕН') {
                            $msg .= "\r\n" . ($counts++) . ") Официальный источник дохода: НЕТ / НЕ УВЕРЕН";
                            if (!empty($data->additional_audit_info->official_income->additional))
                                $msg .= ", дохода нет с {$data->additional_audit_info->official_income->additional}";
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Официальный источник дохода: ДА";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Официальный источник дохода: ДА";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Официальный источник дохода: ДА";
                }
                if (!empty($data->additional_audit_info->receivables)) {
                    if (!empty($data->additional_audit_info->receivables->main)) {
                        if ($data->additional_audit_info->receivables->main === 'ДА') {
                            $msg .= "\r\n" . ($counts) . ") Дебиторская задолженность: ДА";
                            if (!empty($data->additional_audit_info->receivables->additional)) {
                                foreach ($data->additional_audit_info->receivables->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Кто должен: {$item->receivables_debtor}, Сумма: {$item->receivables_summ}";
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts++) . ") Дебиторская задолженность: НЕТ";
                        }
                    } else {
                        $msg .= "\r\n" . ($counts++) . ") Дебиторская задолженность: НЕТ";
                    }
                } else {
                    $msg .= "\r\n" . ($counts++) . ") Дебиторская задолженность: НЕТ";
                }
                if (!empty($data->additional_audit_info->housing)) {
                    if (!empty($data->additional_audit_info->housing->main)) {
                        if ($data->additional_audit_info->housing->main === 'СОБСТВЕННОЕ') {
                            $msg .= "\r\n" . ($counts) . ") Жилье: СОБСТВЕННОЕ";
                            if (!empty($data->additional_audit_info->housing->additional)) {
                                foreach ($data->additional_audit_info->housing->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Год приобретения: {$item->year}, Цена: {$item->price}, Прописан в нем: " . $item->registered ? 'да' : 'нет';
                                }
                            }
                            $counts++;
                        } else {
                            $msg .= "\r\n" . ($counts) . ") Жилье: АРЕНДОВАННОЕ";
                            if (!empty($data->additional_audit_info->housing->additional)) {
                                foreach ($data->additional_audit_info->housing->additional as $key => $item) {
                                    $msg .= "\r\n{$counts}." . ((int)$key + 1) . " Арендная плата: {$item->rent}";
                                }
                            }
                            $counts++;
                        }
                    }
                }
            } else
                $msg .= 'Прочая информация для аудита: не указана';
            $message .= nl2br($msg);
            $bitrix_data['audit_info'] .= $msg;
            $message .= '<br><br>';

            $dohodu = '';
            if (!empty($data->incoming_money) && !empty($data->incoming_money->chosen)) {
                $dohodu .= 'Доходы: ';
                foreach ($data->incoming_money->chosen as $key => $item) {
                    $dohodu .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, ";
                    if (!empty($item->additional)) {
                        if (!empty($item->additional->onCard) && !empty($item->additional->bank))
                            $dohodu .= "получаю на карту банка {$item->additional->bank}, ";
                        if (!empty($item->additional->summ))
                            $dohodu .= "сумма - {$item->additional->summ}, ";
                        if (!empty($item->additional->descriptiom))
                            $dohodu .= "описание - {$item->additional->descriptiom}, ";
                    }
                }
                $dohodu .= !empty($data->incoming_money->totalSumm) ? "\r\nОбщая сумма доходов: {$data->incoming_money->totalSumm}" : '';
            } else
                $dohodu .= 'Доходы: отсутствуют / не указаны';
            $message .= nl2br($dohodu);
            $bitrix_data['income'] .= $dohodu;
            $message .= '<br><br>';

            $imm = '';
            if (!empty($data->property)) {
                if (!empty($data->property->mine)) {
                    $imm .= 'Мое имущество: ';
                    foreach ($data->property->mine as $key => $item) {
                        $imm .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Цена: {$item->price},  Год: {$item->year}";
                        if (!empty($item->registered))
                            $imm .= ", прописан в нем";
                        if (!empty($item->type_auto))
                            $imm .= ", тип автомобильного средства - {$item->type_auto}";
                        if (!empty($item->type_document))
                            $imm .= ", тип ценной бумаги - {$item->type_document}";
                        if (!empty($item->commentary))
                            $imm .= ", комментарий - {$item->commentary}";
                    }
                } else
                    $imm .= 'Мое имущество: отсутствуют / не указано';
                $imm .= "\r\n\r\n";

                if (!empty($data->property->partner)) {
                    $imm .= 'Имущество супруги(-а): ';
                    foreach ($data->property->partner as $key => $item) {
                        $imm .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Цена: {$item->price},  Год: {$item->year}";
                        if (!empty($item->registered))
                            $imm .= ", прописан в нем";
                        if (!empty($item->type_auto))
                            $imm .= ", тип автомобильного средства - {$item->type_auto}";
                        if (!empty($item->type_document))
                            $imm .= ", тип ценной бумаги - {$item->type_document}";
                        if (!empty($item->commentary))
                            $imm .= ", комментарий - {$item->commentary}";
                    }
                } else
                    $imm .= 'Имущество супруги(-а): отсутствует / не указано';
                $imm .= "\r\n\r\n";

                if (!empty($data->property->ex_partner)) {
                    $imm .= 'Имущество бывшей(-его) супруги(-а): ';
                    foreach ($data->property->ex_partner as $key => $item) {
                        $imm .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Цена: {$item->price},  Год: {$item->year}";
                        if (!empty($item->registered))
                            $imm .= ", прописан в нем";
                        if (!empty($item->type_auto))
                            $imm .= ", тип автомобильного средства - {$item->type_auto}";
                        if (!empty($item->type_document))
                            $imm .= ", тип ценной бумаги - {$item->type_document}";
                        if (!empty($item->commentary))
                            $imm .= ", комментарий - {$item->commentary}";
                    }
                } else
                    $imm .= 'Имущество бывшей(-его) супруги(-а): отсутствует / не указано';
                $imm .= "\r\n\r\n";
            }
            $message .= nl2br($imm);
            $bitrix_data['property'] .= $imm;

            if (!empty($data->deals)) {
                $message .= 'Данные о сделках: ';
                foreach ($data->deals as $key => $item) {
                    $message .= "<br>" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Предмет сделки: {$item->propertyType}, Сумма: {$item->summ}, Год: {$item->year}";
                    $bitrix_data['deals'] .= "\r\n" . ((int)$key + 1) . ") " . "Тип: {$item->type}, Предмет сделки: {$item->propertyType}, Сумма: {$item->summ}, Год: {$item->year}";
                }
            } else
                $message .= 'Данные о сделках: не указаны';
            $message .= '<br><br>';

            if (!empty($data->rationale)) {
                $message .= "Обоснование: {$data->rationale}";
                $bitrix_data['rationale'] .= "$data->rationale";
            } else
                $message .= 'Обоснование: не указано';
            $message .= '<br><br>';

            $message .= "Банкротный рейтинг: {$_POST['rating']}";

            if (empty($data->client_param) && !empty($data->system_info->client_param))
                $data->client_param = $data->system_info->client_param;

            if ($data->client_param === 'der_custom') {
                $ch = curl_init();
                $phoneFind = preg_replace('/[^\d]+/', '', $phone);
                $url = Bitrix::DEFAULT_URL . '/crm.duplicate.findbycomm?' . http_build_query([
                    'type' => 'PHONE',
                    'values' => [$phoneFind],
                    'entity_type' => 'CONTACT',
                ]);
                curl_setopt_array($ch, array(
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HEADER => 0,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                ));
                $rsp0 = curl_exec($ch);
                curl_close($ch);
                usleep(500000);
                $jsonContact = json_decode($rsp0, 1);
                if (!empty($jsonContact['result']) && !empty($jsonContact['result']['CONTACT'])) {
                    $cnt = $jsonContact['result']['CONTACT'];
                    $contactID = $cnt[count($cnt) - 1];
                } else {
                    $ch = curl_init();
                    $url = Bitrix::DEFAULT_URL . '/crm.contact.add?' . http_build_query([
                            'fields' => [
                                'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => "WORK"]],
                                'TITLE' => $fio,
                                "NAME" => $fio,
                                "COMMENTS",
                            ],
                            'params' => ['REGISTER_SONET_EVENT' => 'Y']
                        ]);
                    curl_setopt_array($ch, array(
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_HEADER => 0,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => $url,
                    ));
                    $rsp1 = curl_exec($ch);
                    curl_close($ch);
                    usleep(500000);
                    $jsonContact2 = json_decode($rsp1, 1);
                    if (!empty($jsonContact2['result']))
                        $contactID = $jsonContact2['result'];
                }
                $nameArray = explode(' ', trim($fio));
                $queryProc = $this::checkDealExistByPhonePrv($phone);

                if (!empty($queryProc)) {
                    $id = $queryProc['ID'];
                    $curl = curl_init();
                    $array = array(
                        "COMMENTS" => "<br>anketa_pravozashitnik",
                        "CONTACT_ID" => $needId ?? null,
                        "UF_CRM_1602082251" => $email,
                        //"UF_CRM_1602082230" => $phone,
                        "UF_CRM_5F65E100ADB7A" => $fio,
                        'UF_CRM_5F7DDD52C6B24' => $bitrix_data['city'],
                        'UF_CRM_5EBAB74788F6F' => $bitrix_data['soc'],
                        'UF_CRM_5EBAB747D8AFC' => $bitrix_data['marital'],
                        'UF_CRM_1588944311173' => $bitrix_data['criminal'],
                        'UF_CRM_5EBAB7483347D' => $bitrix_data['depends'],
                        'UF_CRM_5EBAB7485670F' => $bitrix_data['disabil'],
                        'UF_CRM_1588944359190' => $bitrix_data['credit'],
                        'UF_CRM_5EBAB748A0884' => $bitrix_data['other_debts'],
                        'UF_CRM_1588944387336' => $bitrix_data['audit_info'],
                        'UF_CRM_1588944397848' => $bitrix_data['income'],
                        'UF_CRM_1588944628269' => $bitrix_data['property'],
                        'UF_CRM_5EBAB7495C9B4' => $bitrix_data['deals'],
                        'UF_CRM_1588944677666' => $bitrix_data['rationale'],
                        'UF_CRM_5EC13D30D3CCE' => $data->ready_to_pay ? 'Да' : 'Нет',
                        'UF_CRM_5F8363218482A' => $totalSumm,
                        'UF_CRM_5F89C0F462375' => $totalOstatok,
                        "STAGE_ID" => "C1:1",
                    );
                    $queryUrl = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0/crm.deal.update";
                    $queryData = http_build_query(array(
                        'id' => $id,
                        'fields' => $array,
                        'params' => ["REGISTER_SONET_EVENT" => "Y"],
                    ));
                    curl_setopt_array($curl, array(
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_POST => 1,
                        CURLOPT_HEADER => 0,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => $queryUrl,
                        CURLOPT_POSTFIELDS => $queryData,
                    ));
                    $result2 = curl_exec($curl);
                    $result = json_decode($result2);
                    usleep(250000);
                    $queryUrls = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0/crm.automation.trigger?code=s0nbg&target=DEAL_{$id}";
                    curl_setopt_array($curl, array(
                        CURLOPT_SSL_VERIFYPEER => 0,
//                        CURLOPT_POST => 1,
                        CURLOPT_HEADER => 0,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => $queryUrls,
//                        CURLOPT_POSTFIELDS => $queryData,
                    ));
                    $result3 = curl_exec($curl);
                    $resultS = json_decode($result3);
                } else {
                    $curl = curl_init();
                    $array = array(
                        "COMMENTS" => "<br>anketa_pravozashitnik",
                        "UF_CRM_1602082251" => $email,
                        'CONTACT_ID' => $contactID ?? null,
                        "UF_CRM_1602082230" => $phone,
                        "UF_CRM_5F65E100ADB7A" => $fio,
                        'UF_CRM_5F7DDD52C6B24' => $bitrix_data['city'],
                        'UF_CRM_5EBAB74788F6F' => $bitrix_data['soc'],
                        'UF_CRM_5EBAB747D8AFC' => $bitrix_data['marital'],
                        'UF_CRM_1588944311173' => $bitrix_data['criminal'],
                        'UF_CRM_5EBAB7483347D' => $bitrix_data['depends'],
                        'UF_CRM_5EBAB7485670F' => $bitrix_data['disabil'],
                        'UF_CRM_1588944359190' => $bitrix_data['credit'],
                        'UF_CRM_5EBAB748A0884' => $bitrix_data['other_debts'],
                        'UF_CRM_1588944387336' => $bitrix_data['audit_info'],
                        'UF_CRM_1588944397848' => $bitrix_data['income'],
                        'UF_CRM_1588944628269' => $bitrix_data['property'],
                        'UF_CRM_5EBAB7495C9B4' => $bitrix_data['deals'],
                        'UF_CRM_1588944677666' => $bitrix_data['rationale'],
                        'UF_CRM_5EC13D30D3CCE' => $data->ready_to_pay ? 'Да' : 'Нет',
                        'UF_CRM_5F8363218482A' => $totalSumm,
                        'UF_CRM_5F89C0F462375' => $totalOstatok,
                        "TITLE" => $fio,
                        "STAGE_ID" => "C1:1",
                        "CATEGORY_ID" => "1",
                    );
                    $queryUrl = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0/crm.deal.add";
                    $queryData = http_build_query(array(
                        'fields' => $array,
                        'params' => ["REGISTER_SONET_EVENT" => "Y"]
                    ));
                    curl_setopt_array($curl, array(
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_POST => 1,
                        CURLOPT_HEADER => 0,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => $queryUrl,
                        CURLOPT_POSTFIELDS => $queryData,
                    ));
                    $result2 = curl_exec($curl);
                    $result = json_decode($result2);
                }
            }
            $user = UserModel::findOne(Yii::$app->getUser()->getId());
            if (!empty($user)) {
                if (!empty($_COOKIE['anketa_token']))
                    $anketa = Anketa::findOne(['cookie_token' => $_COOKIE['anketa_token']]);
                if (!empty($anketa)) {
                    $user->anketa_id = $anketa->id;
                    $user->update();
                }
            }
            return ['status' => 'success'];

        } else return $this->goHome();
    }

    public static function checkDealExistByPhonePrv($phone) {
        $curl = curl_init();
        $phone = preg_replace('/[^\d]+/', '', $phone);
        $phone1 = (string)$phone;
        $phone2 = (string)$phone;
        $phone1[0] = 7;
        $phone2[0] = 8;

        $queryUrl = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0/crm.deal.list?filter[UF_CRM_1602082230]={$phone1}&start=-1&filter[CATEGORY_ID]=1";
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
        ));
        $result2 = curl_exec($curl);
        $response = json_decode($result2, 1);
        $x1 = !empty($response['result']) ? $response['result'][count($response['result']) - 1] : null;

        sleep(1);

        $queryUrl = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0/crm.deal.list?filter[UF_CRM_1602082230]={$phone2}&start=-1&filter[CATEGORY_ID]=1";
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
        ));
        $result2 = curl_exec($curl);
        $response = json_decode($result2, 1);
        $x2 = !empty($response['result']) ? $response['result'][count($response['result']) - 1] : null;

        curl_close($curl);
        if (!empty($x1))
            return $x1;
        elseif (!empty($x2))
            return $x2;
        else
            return null;
    }

    public function actionAnketaFunction()
    {
        function fillObject($object, $anketa, $hash, $update = false)
        {
            $object->cookie_token = $hash;
            $object->email = !empty($anketa->system_info->email) ? $anketa->system_info->email : null;
            $object->fio = !empty($anketa->system_info->fio) ? $anketa->system_info->fio : null;
            $object->phone = !empty($anketa->system_info->phone) ? $anketa->system_info->phone : null;
            $object->city = !empty($anketa->system_info->city) ? $anketa->system_info->city : null;
            foreach ($anketa as $key => $item)
                if ($key !== "system_info")
                    $object->$key = !empty($item) ? json_encode($item, JSON_UNESCAPED_UNICODE) : null;
            if (!empty($_GET['client_param']))
                $object->client_param = $_GET['client_param'];
            else
                $object->client_param = !empty($anketa->system_info->client_param) ? $anketa->system_info->client_param : null;
            if ($object->validate()) {
                $rsp = $update ? $object->update() : $object->save();
                return $rsp;
            }
            else
                return false;
        }

        $this->layout = false;
        if (!empty($_SESSION['anketa_token']))
            $hash = $_SESSION['anketa_token'];
        elseif (!empty($_COOKIE['anketa_token']))
            $hash = $_COOKIE['anketa_token'];
        else
            $hash = null;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax || Yii::$app->request->isPost) {
            if (!empty($_POST) && !empty($_POST['data']) && empty($_POST['email'])) {
                $anketa = json_decode($_POST['data']);
                if (!empty($anketa->system_info) && !empty($anketa->system_info->phone)) {
                    if (!empty($hash)) {
                        $data = Anketa::findOne(['cookie_token' => $hash, 'confirmed_status' => 0]);
                        if (!empty($data)) {
                            if (fillObject($data, $anketa, $hash, true) !== false) {
                                $_SESSION['object'] = $anketa;
                                return ['status' => 'success', 'object' => $data];
                            } else
                                return ['status' => 'error', 'reason' => 'Ошибка сохранения данных.'];
                        } else {
                            $hash = md5("{$anketa->system_info->phone}::" . time());
                            $_SESSION['anketa_token'] = $hash;
                            setcookie("anketa_token", $hash, time() + (60 * 60 * 24 * 2), "/", 'uspravozashitnik.ru');
                            $data = new Anketa();
                            if (fillObject($data, $anketa, $hash) !== false) {
//                                if (!empty($data->client_param)) {
//                                    $alias = new AnketaAlias();
//                                    $alias->anketa_id = $data->id;
//                                    $alias->client_param = $data->client_param;
//                                    $alias->save();
//                                }
                                $_SESSION['object'] = $anketa;
                                return ['status' => 'success', 'object' => $data];
                            } else
                                return ['status' => 'error', 'reason' => 'Ошибка сохранения данных.'];
                        }
                    } else {
                        $hash = md5("{$anketa->system_info->phone}::" . time());
                        $_SESSION['anketa_token'] = $hash;
                        setcookie("anketa_token", $hash, time() + (60 * 60 * 24 * 2), "/", 'uspravozashitnik.ru');
                        $data = new Anketa();
                        if (fillObject($data, $anketa, $hash) !== false) {
                            $_SESSION['object'] = $anketa;
                            if (!empty($data->client_param)) {
//                                $alias = new AnketaAlias();
//                                $alias->anketa_id = $data->id;
//                                $alias->client_param = $data->client_param;
//                                $alias->save();
                            }
                            return ['status' => 'success', 'object' => $data];
                        } else
                            return ['status' => 'error', 'reason' => 'Ошибка сохранения данных.'];
                    }
                } else
                    return ['status' => 'error', 'Номер телефона не указан.'];
            } else
                return ['status' => 'error', 'Неизвестный формат данных.'];
        } else
            return ['status' => 'error', 'Неизвестный формат запроса.'];
    }


}