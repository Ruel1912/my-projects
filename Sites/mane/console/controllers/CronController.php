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


}