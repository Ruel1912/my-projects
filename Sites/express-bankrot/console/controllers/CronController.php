<?php

namespace console\controllers;


use backend\models\DownloadUrls;
use backend\models\Stages;
use backend\models\SystemProps;
use backend\models\TextStages;
use backend\models\UserModel;
use backend\models\UserStages;
use common\models\User;
use frontend\models\Bitrix;
use yii\console\Controller;

class CronController extends Controller
{

    public function actionSync()
    {
        $query = User::find()->where(['deal_id' => 0]);
        $offset = 50;
        $limit = (clone $query)->count();
        for ($i = 0; $i < $limit; $i += $offset) {
            $users = $query->limit(50)->offset($i)->all();
            if (!empty($users)) {
                $cmd = [];
                foreach ($users as $item) {
                    $cmd[$item->id] = 'crm.duplicate.findbycomm?' . http_build_query([
                            'type' => 'PHONE',
                            'values' => [$item->username],
                            'entity_type' => 'CONTACT',
                        ]);
                }
                $batch = [
                    'halt' => 0,
                    'cmd' => $cmd
                ];
                $bitrix = new Bitrix();
                $contactBatchResult = $bitrix->use__method($bitrix::METHOD_BATCH, $batch);
                if (!empty($contactBatchResult['bitrix']['result']['result'])) {
                    $contactsArray = $contactBatchResult['bitrix']['result']['result'];
                    $cmd = [];
                    foreach ($contactsArray as $key => $item) {
                        if (!empty($item['CONTACT'])) {
                            $lastID = $item['CONTACT'][count($item['CONTACT']) - 1];
                            $filter = [
                                'filter' => [
                                    'CONTACT_ID' => $lastID,
                                    'CATEGORY_ID' => "5",
                                ],
                                'start' => -1,
                                'order' => ['id' => 'desc']
                            ];
                            $cmd[$key] = "crm.deal.list?" . http_build_query($filter);
                        }
                    }
                    $batch = [
                        'halt' => 0,
                        'cmd' => $cmd
                    ];
                    $deals = $bitrix->use__method($bitrix::METHOD_BATCH, $batch);
                    if (!empty($deals['bitrix']['result']['result'])) {
                        $stages = Stages::find()->asArray()->all();
                        $stageAssigned = [];
                        foreach ($stages as $item)
                            $stageAssigned[$item['status']] = $item;
                        $user_deals = $deals['bitrix']['result']['result'];
                        foreach ($user_deals as $key => $item) {
                            $user = User::findOne($key);
                            $user->deal_id = $item[0]['ID'];
                            $user->stage_id = $item[0]['STAGE_ID'];
                            $user->update();
                            $userStage = new UserStages();
                            $userStage->stage_id = $item[0]['STAGE_ID'];
                            $userStage->user_id = $user->id;
                            $userStage->deployments = $stageAssigned[$item[0]['STAGE_ID']]['files_accept'];
                            $userStage->passed = 0;
                            $userStage->sort = $stageAssigned[$item[0]['STAGE_ID']]['id'];
                            $userStage->deployment_passed = 0;
                            $userStage->current_stage = 1;
                            $userStage->save();
                        }
                    }
                }
            }
            usleep(250000);
        }
    }

    public function actionGetNewAuth()
    {
        $tries = 0;
        while (1) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => "https://uspravozashitnik.ru/site/bitrix-app?auth=1",
            ]);
            curl_exec($ch);
            /*curl_setopt($ch, CURLOPT_URL, 'https://m76937.hostde31.fornex.host/derunov/settings.json');*/
            $json = file_get_contents('/var/www/u1220299/data/www/uspravozashitnik.ru/frontend/models/settings.json');
            $data = json_decode($json, 1);
            if (!empty($data['access_token']) || $tries > 10) {
                if ($tries > 10)
                    file_put_contents('cron_errors.log', "ОШИБКА ПОЛУЧЕНИЯ НОВОГО КЛЮЧА АВТОРИЗАЦИИ" . PHP_EOL, FILE_APPEND);
                else {
                    $prop = SystemProps::findOne(['property' => 'auth']);
                    if (empty($prop))
                        $prop = new SystemProps();
                    $prop->value = $data['access_token'];
                    $prop->property = 'auth';
                    if (empty($prop->id))
                        $prop->save();
                    else
                        $prop->update();
                }
                break;
            }
            $tries++;
            usleep(500000);
        }
        return $this->stdout($prop->value . PHP_EOL);
    }

    public function actionSyncProcessing()
    {
        $query = UserModel::find()->where(['!=', 'deal_id', 0]);
        $offset = 50;
        $limit = (clone $query)->count();
        for ($i = 0; $i < $limit; $i += $offset) {
            $users = $query->limit(50)->offset($i)->all();
            if (!empty($users)) {
                $idents = [];
                foreach ($users as $item)
                    $idents[$item->id] = $item;
                $bitrix = new Bitrix();
                $bitrix->get__auth();
                $cmd = [];
                foreach ($idents as $item) {
                    $cmd[$item->id] = "crm.deal.get?" . http_build_query([
                            'id' => $item->deal_id,
                            'select' => [
                                'STAGE_ID',
                                'ID',
                                'UF_CRM_1629801994228', # файлы оплата публикаций
                                'UF_CRM_1629802024287', # файлы подготовка к завершению
                                'UF_CRM_1629802038983', # текст оплата публикаций
                                'UF_CRM_1629802054342', # текст подготовка к завершению
                            ]
                        ]);
                }
                $batch = [
                    'halt' => 0,
                    'cmd' => $cmd,
                    'auth' => $bitrix->auth
                ];
                $response = $bitrix->batch($batch, Bitrix::OAUTH_URL);
                if (!empty($response['bitrix']['result']['result'])) {
                    $downloadStages = UserStages::$needSync;
                    $downloadAssignation = [
                        'C5:13' => 'UF_CRM_1629801994228',
                        'C5:16' => 'UF_CRM_1629802024287',
                    ];
                    $textAssign = [
                        'C5:13' => 'UF_CRM_1629802038983',
                        'C5:16' => 'UF_CRM_1629802054342',
                    ];
                    $deals = $response['bitrix']['result']['result'];
                    $stages = Stages::find()->asArray()->all();
                    $stageAssigned = [];
                    foreach ($stages as $item)
                        $stageAssigned[$item['status']] = $item;
                    foreach ($deals as $key => $deal) {
                        if ($idents[$key]->stage_id !== $deal['STAGE_ID']) {
                            $uStages = UserStages::findOne(['stage_id' => $idents[$key]->stage_id, 'user_id' => $idents[$key]->id]);
                            if (!empty($uStages)) {
                                $uStages->current_stage = 0;
                                $uStages->passed = 1;
                                $uStages->update();
                            }
                            $userStage = UserStages::findOne(['stage_id' => $deal['STAGE_ID'], 'user_id' => $idents[$key]->id]);
                            if (empty($userStage)) {
                                $userStage = new UserStages();
                                $userStage->stage_id = $deal['STAGE_ID'];
                                $userStage->user_id = $idents[$key]->id;
                            }
                            $userStage->deployments = $stageAssigned[$deal['STAGE_ID']]['files_accept'];
                            $userStage->passed = 0;
                            $userStage->sort = $stageAssigned[$deal['STAGE_ID']]['id'];
                            $userStage->deployment_passed = 0;
                            $userStage->current_stage = 1;
                            if (empty($userStage->id))
                                $userStage->save();
                            else
                                $userStage->update();
                            $idents[$key]->stage_id = $deal['STAGE_ID'];
                            $idents[$key]->update();
                        } else {
                            $userStage = UserStages::findOne(['stage_id' => $deal['STAGE_ID'], 'user_id' => $idents[$key]->id]);
                            if (empty($userStage)) {
                                $userStage = new UserStages();
                                $userStage->stage_id = $deal['STAGE_ID'];
                                $userStage->user_id = $idents[$key]->id;
                                $userStage->deployments = $stageAssigned[$deal['STAGE_ID']]['files_accept'];
                                $userStage->passed = 0;
                                $userStage->sort = $stageAssigned[$deal['STAGE_ID']]['id'];
                                $userStage->deployment_passed = 0;
                                $userStage->current_stage = 1;
                                $userStage->save();
                            }
                        }
                        if (in_array($deal['STAGE_ID'], $downloadStages)) {
                            if (!empty($deal['UF_CRM_1629801994228']) || !empty($deal['UF_CRM_1629802024287'])) {
                                $downloads = DownloadUrls::findOne(['user_id' => $idents[$key]->id, 'stage_id' => $deal['STAGE_ID'], 'deal_id' => $deal['ID']]);
                                if (empty($downloads)) {
                                    $downloads = new DownloadUrls();
                                    $downloads->deal_id = $deal['ID'];
                                    $downloads->stage_id = $deal['STAGE_ID'];
                                    $downloads->user_id = $idents[$key]->id;
                                }
                                $downloads->urls = json_encode($deal[$downloadAssignation[$deal['STAGE_ID']]], JSON_UNESCAPED_UNICODE);
                                if (empty($downloads->id))
                                    $downloads->save();
                                else
                                    $downloads->update();
                            }
                            if (!empty($deal['UF_CRM_1629802038983']) || !empty($deal['UF_CRM_1629802054342'])) {
                                $text = TextStages::findOne(['user_id' => $idents[$key]->id, 'stage_id' => $deal['STAGE_ID'], 'deal_id' => $deal['ID']]);
                                if (empty($text)) {
                                    $text = new TextStages();
                                    $text->deal_id = $deal['ID'];
                                    $text->stage_id = $deal['STAGE_ID'];
                                    $text->user_id = $idents[$key]->id;
                                }
                                $text->text = $deal[$textAssign[$deal['STAGE_ID']]];
                                if (empty($text->id))
                                    $text->save();
                                else
                                    $text->update();
                            }
                        }
                    }
                }
            }
            usleep(250000);
        }
    }

    public function actionFillStages()
    {
        $stages = [
            [
                'name' => 'Юрист утвержден',
                'small_desc' => 'К вашему делу прикреплен юрист',
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => 'С36:NEW',
                'days' => null,
                'is_bankruptcy' => 0
            ],
            [
                'name' => "Идет работа по договору ФС",
                'small_desc' => 'В данный момент идет работа по договору финансового сопровождения',
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:PREPARATION",
                'days' => null,
                'is_bankruptcy' => 0
            ],
            [
                'name' => "Заморозка",
                'small_desc' => 'Процедура приостановлена. Для получения более подробной информации, свяжитесь с юристом',
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:PREPAYMENT_INVOIC",
                'days' => null,
                'is_bankruptcy' => 0
            ],
            [
                'name' => "Запрос компании на расторжение",
                'small_desc' => 'Процедура приостановлена. Для получения более подробной информации, свяжитесь с юристом',
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:EXECUTING",
                'days' => null,
                'is_bankruptcy' => 0
            ],
            [
                'name' => "Договор ФС завершен",
                'small_desc' => 'Работы по договору окончены. Для получения более подробной информации, свяжитесь с юристом',
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 1,
                'status' => "C36:FINAL_INVOICE",
                'days' => null,
                'is_bankruptcy' => 0
            ],
            [
                'name' => "Назначение юриста",
                'small_desc' => 'Процесс назначения юриста и рассмотрения вашего дела',
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => "C36:1",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Юрист назначен",
                'small_desc' => 'К вашему делу прикреплен юрист',
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => "C36:2",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Клиент утвержден",
                'small_desc' => 'Формирование и согласование стратегии работы, выбор способа взаимодействия',
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => "C36:3",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Сбор документов",
                'small_desc' => "Подробный аудит анкеты банкрота, формирование стратегии списания долгов, согласование стратегии с клиентом. Создание базы документов клиента, сбор запросов из гос.инстанций",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:4",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Документы собраны",
                'small_desc' => "Проверка актуальности загруженных документов",
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => "C36:5",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Проверка искового заявления",
                'small_desc' => "Сформировано исковое заявление",
                'need_to_do' => 0,
                'files_provide' => 0,
                'files_accept' => 0,
                'status' => "C36:6",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Заявление подано в суд",
                'small_desc' => "Заявление о признании банкротом и списании задолженности отправлено в Арбитражный суд",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:6",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Заявление подано в суд",
                'small_desc' => "Заявление о признании банкротом и списании задолженности отправлено в Арбитражный суд",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:7",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Заявление оставлено без движения",
                'small_desc' => "Ваше дело оставлено без движения. Для получения более подробной информации, свяжитесь с юристом",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:8",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Заявление принято судом и назначено первое судебное заседание",
                'small_desc' => "Заседание по вашему делу назначено",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:9",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Вынесен первый судебный акт",
                'small_desc' => "Вынесен первый судебный акт, введена процедура, свяжитесь с юристом",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:10",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Заморозка",
                'small_desc' => "Процедура приостановлена. Для получения более подробной информации, свяжитесь с юристом",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:11",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Запрос Компании на расторжение",
                'small_desc' => "Процедура приостановлена. Для получения более подробной информации, свяжитесь с юристом",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:12",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Первичные публикации",
                'small_desc' => "Информация о вашем банкротстве опубликована в официальных источниках: ЕФРСБ и газете \"Коммерсантъ\". С этого момента ваши счета во всех банках автоматически  заблокированы, для получения денежных средств со счета необходимо связаться со специалистом компании",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:20",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Первичные уведомления",
                'small_desc' => "Вам и вашим кредиторам направлены уведомления о вашем банкротстве",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:21",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Вторичные уведомления",
                'small_desc' => "Государственные органы уведомлены о вашем банкротстве. С этого момента судебные приставы обязаны приостановить любые принудительные взыскания.",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:22",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Работа с имуществом",
                'small_desc' => "Финансовым управляющим направлены запросы в целях выявления вашего имущества и сделок ",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:23",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Проведение собрания кредиторов в форме заочного голосования",
                'small_desc' => "Вашим кредиторам предложено исследовать вашу платежеспособность на собрании кредиторов. Кредиторы имеют право предложить план реструктуризации долгов",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:24",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Продление РД / Отложение СЗ",
                'small_desc' => "Суду не хватило времени для проведения всех необходимых мероприятий и соблюдения всех необходимых  процессуальных сроков. Ваше судебное заседание по результатам проведения процедуры отложено.",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:25",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Отчет по результатам РД",
                'small_desc' => "Судебное заседание по рассмотрению результатов реструктуризации долгов назначено, Финансовым управляющим готовится завершение процедуры",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:26",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Первичные публикации",
                'small_desc' => "Информация о вашем банкротстве опубликована в официальных источниках: ЕФРСБ и газете \"Коммерсантъ\". С этого момента ваши счета во всех банках автоматически  заблокированы, Для получения денежных средств со счета необходимо связаться со специалистом компании",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:27",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Первичные уведомления",
                'small_desc' => "Вам и вашим кредиторам направлены уведомления о вашем банкротстве",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:28",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Вторичные уведомления",
                'small_desc' => "Государственные органы уведомлены о вашем банкротстве. С этого момента судебные приставы обязаны приостановить любые принудительные взыскания",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:29",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Работа с имуществом",
                'small_desc' => "Финансовым управляющим направлены запросы в целях выявления вашего имущества и сделок",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:30",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Торги",
                'small_desc' => "Финансовый управляющий приступает к оценке вашего имущества для его продажи. Реализация имущества будет осуществлена в соответствии с законом о банкротстве - на торгах",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:31",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Продление процедуры",
                'small_desc' => "Суду и финансовому управляющему не хватило времени для проведения всех необходимых мероприятий и соблюдения всех необходимых  процессуальных сроков. Ваше судебное заседание по результатам проведения процедуры отложено",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:32",
                'days' => null,
                'is_bankruptcy' => 1
            ],
            [
                'name' => "Отчет",
                'small_desc' => "Судебное заседание по рассмотрению результатов реализации имущества назначено, финансовым управляющим готовится завершение процедуры",
                'need_to_do' => '1',
                'files_provide' => 1,
                'files_accept' => 1,
                'status' => "C36:33",
                'days' => null,
                'is_bankruptcy' => 1
            ],
        ];
        foreach ($stages as $item) {
            $s = new Stages();
            $s->load($item, '');
            $s->save();
        }
    }


}