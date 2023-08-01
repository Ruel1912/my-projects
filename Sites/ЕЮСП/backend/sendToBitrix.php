<?php


$fio =  $_POST['fio'];
$phone = $_POST['phone'];
$message = isset($_POST['message']) ? $_POST['message'] : null;
$commentary = "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>" ;
if ($message != null) {
    foreach ($message as $key => $val) {
        $commentary .= "$key: $val" . "<br>";
    }
}

//делает curl запросы к Битрикс24
function CurlBitrix24($method, $arData=array()){

$queryUrl = "https://eusp.bitrix24.ru/rest/1/ja5g0kapn6cg9z8m/".$method;
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
CURLOPT_POSTFIELDS => http_build_query($arData),
));
if(!empty($arData)){
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($arData));
}
$result = curl_exec($curl);
curl_close($curl);
return json_decode($result,true);
}

$arFields = array(
"NAME" => $fio,
"PHONE" => array(array("VALUE" => $phone, "VALUE_TYPE" => "WORK")),
"COMMENTS" => $commentary,
"SOURCE_ID" => 'eusp_site',
"SOURCE_DESCRIPTION" => "Сайт ЕЮСП"
);

//выполняем запрос
$result = CurlBitrix24('crm.lead.add', array(
'fields' => $arFields,
'params' => array("REGISTER_SONET_EVENT" => "Y")
));

if ($result) {
echo "success";
} else {
echo "Ошибка Bitrix: " . $result['error'];
}

?>