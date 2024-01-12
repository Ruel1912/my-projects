<?php


namespace frontend\models;


use backend\models\SystemProps;
use common\models\User;

/**
 * Class Bitrix
 * @package frontend\models
 * @property User $user
 * @property integer $id
 */

class Bitrix
{

    const OAUTH_GET_DEAL = "https://uspravozashitnik.ru/site/bitrix-app";
//    const DEFAULT_URL = "https://pravozashitnik.bitrix24.ru/rest/1/uuk0292ywe7hgsz1";
//    const DEFAULT_URL = "https://pravozashitnik.bitrix24.ru/rest/1665/2jkxvat278eg7cfw";
    const DEFAULT_URL = "https://pravozashitnik.bitrix24.ru/rest/21351/6rqoze0pieb76rf0";
    const OAUTH_URL = "https://pravozashitnik.bitrix24.ru/rest";
    const METHOD_FILE_ADD = "/crm.deal.update";
    const METHOD_BATCH = "/batch";
    const METHOD_FIND_CONTACT = "/crm.duplicate.findbycomm";
    const METHOD_FIND_DEAL = "/crm.deal.list";
    const METHOD_TIMELINE = "/crm.timeline.comment.add";
    const METHOD_ADD_CONTACT = "/crm.contact.add";

    public $id;
    public $user;
    public $auth;

    public function get__auth() {
        $props = SystemProps::findOne(['property' => 'auth']);
        if (!empty($props))
            $this->auth = $props->value;
    }

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function use__method($method, $array, $url = self::DEFAULT_URL) {
        $link = $url . $method;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $link,
            CURLOPT_POSTFIELDS => http_build_query($array),
        ));
        $result2 = curl_exec($curl);
        if(!$result2) {
            $response['error'] = curl_error($curl).' ('.curl_errno($curl).') ';
        } else
            $response['bitrix'] = json_decode($result2, true);
        curl_close($curl);
        return $response;
    }

    public function upload__file($data) {
        return $this->use__method(self::METHOD_FILE_ADD, $data);
    }

    public function batch($data, $url = self::DEFAULT_URL) {
        return $this->use__method(self::METHOD_BATCH, $data, $url);
    }

    public function set__user($user) {
        $this->user = $user;
    }

    public function sync() {
        $search = [
            'type' => 'PHONE',
            'values' => [$this->user->username],
            'entity_type' => 'CONTACT',
        ];
        $response = null;
        $contactArray = $this->use__method(self::METHOD_FIND_CONTACT, $search);
        if (!empty($contactArray['bitrix'])) {
            $contacts = $contactArray['bitrix']['result']['CONTACT'];
            $lastID = $contacts[count($contacts) - 1];
            $filter = [
                'filter' => [
                    'CONTACT_ID' => $lastID,
                    'CATEGORY_ID' => "1",
                ],
                'start' => -1,
                'order' => ['id' => 'desc']
            ];
            $response = $this->use__method(self::METHOD_FIND_DEAL, $filter);
        }
        return $response;
    }

    #https://pravozashitnik.bitrix24.ru/bitrix/components/bitrix/crm.deal.show/show_file.php?auth=226226610056db4800518b7000000681000003e5165197c08b21749c4552140d737f30&ownerId=119&fieldName=UF_CRM_1629801994228&dynamic=Y&fileId=29089
    public function get__deal ($id) {
        $link = self::OAUTH_GET_DEAL . "?id={$id}";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $link,
        ));
        $result2 = curl_exec($curl);
        if(!$result2) {
            $response['error'] = curl_error($curl).' ('.curl_errno($curl).') ';
        } else
            $response['bitrix'] = json_decode($result2, true);
        curl_close($curl);
        return $response;
    }

    public function get__download__headers($url) {
        return $headers = get_headers($url, 1);
    }

    public function download__bitrix__file($url) {
        $headers = $this::get__download__headers($url);
        if (ob_get_length())
            ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $headers['Content-Type']);
        header('Content-Disposition: ' . $headers['Content-Disposition']);
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . $headers['Content-Length']);
        if ($fd = fopen($url, 'rb')) {
            while (!feof($fd)) {
                print fread($fd, 1024);
            }
            fclose($fd);
        }
        exit;
    }

    public static function new__contact__signup($fio, $phone) {
        $bitrix = new Bitrix();
        $date = new \DateTime();
        $date->setTimestamp(time());
        $search = [
            'type' => 'PHONE',
            'values' => [$phone],
            'entity_type' => 'CONTACT',
        ];
        $response = null;
        $findDuplicate = $bitrix->use__method(self::METHOD_FIND_CONTACT, $search);
        if (!empty($findDuplicate) && !empty($findDuplicate['bitrix'])) {
            $dubData = $findDuplicate['bitrix'];
            if (!empty($dubData['result']['CONTACT'])) {
                $conts = $dubData['result']['CONTACT'];
                $contId = $conts[count($conts) - 1];
            }
        }
        if (!empty($contId)) {
            $cmd = [
                'find' => 'crm.contact.get?id=' . $contId,
//                'activity' => 'crm.activity.add?' . http_build_query([
//                        'fields' => [
//                            "OWNER_ID" => '$result[find][ID]',
//                            'TYPE_ID' => 2,
//                            "SOURCE_ID" => 35,
//                            'OWNER_TYPE_ID' => 3,
//                            "COMMUNICATIONS" => [[ 'VALUE' => $phone, 'ENTITY_ID' => '$result[find][ID]', "ENTITY_TYPE_ID" => 3]],
//                            "SUBJECT" => "Регистрация в ЛК",
//                            "DESCRIPTION" => "Клиент прошел регистрацию в ЛК. Согласовать тарифный план",
//                            "START_TIME" => $date->format("Y-m-d H:i:sP"),
//                            "END_TIME" => $date->modify('+1 hour')->format("Y-m-d H:i:sP"),
//                            "COMPLETED" => "N",
//                            "PRIORITY" => 3,
//                            "RESPONSIBLE_ID" => '$result[find][ASSIGNED_BY_ID]',
//                            "DESCRIPTION_TYPE" => 3,
//                            "DIRECTION" => 2,
//                        ]
//                    ])
            ];
            $batch = ['halt' => 0, 'cmd' => $cmd];
            usleep(250000);
            $val = $bitrix->batch($batch);
        } else {
            $cmd = [
                'new' => 'crm.contact.add?' . http_build_query([
                        'fields' => [
                            'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => "WORK"]],
                            'TITLE' => $fio,
                            "NAME" => $fio,
                            "SOURCE_ID" => 35,
                            "COMMENTS",
                        ],
                        'params' => ['REGISTER_SONET_EVENT' => 'Y']
                    ]),
                'find' => 'crm.contact.get?id=$result[new]',
//                'activity' => 'crm.activity.add?' . http_build_query([
//                        'fields' => [
//                            "OWNER_ID" => '$result[find][ID]',
//                            'TYPE_ID' => 2,
//                            "SOURCE_ID" => 35,
//                            'OWNER_TYPE_ID' => 3,
//                            "COMMUNICATIONS" => [[ 'VALUE' => $phone, 'ENTITY_ID' => '$result[find][ID]', "ENTITY_TYPE_ID" => 3]],
//                            "SUBJECT" => "Регистрация в ЛК",
//                            "DESCRIPTION" => "Клиент прошел регистрацию в ЛК. Согласовать тарифный план",
//                            "START_TIME" => $date->format("Y-m-d H:i:sP"),
//                            "END_TIME" => $date->modify('+1 hour')->format("Y-m-d H:i:sP"),
//                            "COMPLETED" => "N",
//                            "PRIORITY" => 3,
//                            "RESPONSIBLE_ID" => '$result[find][ASSIGNED_BY_ID]',
//                            "DESCRIPTION_TYPE" => 3,
//                            "DIRECTION" => 2,
//                        ]
//                    ])
            ];
            $batch = ['halt' => 0, 'cmd' => $cmd];
            usleep(250000);
            $val = $bitrix->batch($batch);
        }
        return $val;
    }

}