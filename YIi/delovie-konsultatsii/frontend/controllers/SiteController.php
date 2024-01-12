<?php

namespace frontend\controllers;

use frontend\models\Services;
use frontend\models\Reviews;
use frontend\models\Cases;
use Yii;
use yii\data\Pagination;
use yii\web\Response;
use yii\web\Controller;
/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actionIndex()
    {
        $services = Services::find()->orderBy(['id' => SORT_DESC])->all();
        $reviews = Reviews::find()->orderBy(['id' => SORT_ASC])->limit(2)->all();
        return $this->render('index', [
            'services' => $services,
            'reviews' => $reviews,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about', []);
    }

    public function actionPolicy()
    {
        return $this->render('policy', []);
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

   
    public function actionSupport()
    {
        return $this->render('support');
    }

    public function actionCase($page = 1)
    {
        $page_size = 10;
        $query = Cases::getDb()->cache(function () { return Cases::find()->asArray()->orderBy('id desc');},3600);
        $pages = new Pagination([
            'totalCount' => $query->count(),
             'pageSize' => $page_size,
             'forcePageParam' => false,
             'pageSizeParam' => false
            ]);
        $cases = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('case', [
                'cases' => $cases,
                'pages' => $pages,
            ]);
    }

    public function actionReview($page = 1)
    {   
        $page_size = 10;
        $query = Reviews::getDb()->cache(function () { return Reviews::find()->asArray()->orderBy('id desc');},3600);
        $pages = new Pagination([
            'totalCount' => $query->count(),
             'pageSize' => $page_size,
             'forcePageParam' => false,
             'pageSizeParam' => false
            ]);
        $reviews = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('review', [
                'reviews' => $reviews,
                'pages' => $pages,
            ]);
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionSendForm() {
    Yii::$app->response->format = Response::FORMAT_JSON;
    if (!empty($_POST)){
	    $fio =  $_POST['fio'];
        $phone = $_POST['phone'];
        $region = $_POST['region'] ?? "Не определен";
        $message = isset($_POST['message']) ? $_POST['message'] : null;
        $commentary = "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>" ;
        if ($message != null) {
            foreach ($message as $k => $v) {
                $commentary .= "$k: " . $v . "<br>";
            }
        }
        // здесь могут быть прочие поля
        // $commentary .= "...<br>";
        $queryString = $_POST['query_string'];
        parse_str($queryString, $query);
        $utm_source = $query['utm_source'] ?? null;
        $utm_campaign = $query['utm_campaign'] ?? null;

        $arFields = [
            'fields' => [
                "NAME" => $fio,
                "PHONE" => [["VALUE" => $phone, "VALUE_TYPE" => "WORK"]],
                "COMMENTS" => $commentary,
                "SOURCE_ID" => 'WEB',
                "SOURCE_DESCRIPTION" => "Сайт долг-списать.online",
            ],
        ];

        $queryUrl = "https://delkons.bitrix24.ru/rest/1/sds00ugcd9e8hyou/crm.lead.add";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_CONNECTTIMEOUT => 4,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => http_build_query($arFields),
        ));
        
        $response = curl_exec($curl);

        $response = (!$response) ? json_encode(['type' => 'error', 'code' => 'curl', 'message' => curl_error($curl)], JSON_UNESCAPED_UNICODE) : json_encode(['type' => 'success']);
        curl_close($curl);
    } else $response = ['type' => 'error', 'message' => 'Нет данных'];
    
    return $response;
    }
}