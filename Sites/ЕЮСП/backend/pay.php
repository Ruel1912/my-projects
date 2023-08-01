<?php
    $TerminalKey = '1604571377643DEMO';
    $Password = "";
    $fio = isset($_POST['name']) ? $_POST['name'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $amount = isset($_POST['message']['Сумма платежа']) ? $_POST['message']['Сумма платежа'] : null;
    $type = isset($_POST['message']['Способ оплаты']) ? $_POST['message']['Способ оплаты'] : null;
    
    $data = array(
        "TerminalKey" => $TerminalKey,
        "Amount" => $amount * 100,
        "OrderId" => time(),
        "PayType" => 'O',
        "SuccessURL" => "https://еюсп.рф/payment.php?response=success",
        "FailURL" => "https://еюсп.рф/payment.php?response=fail",
        "DATA" => [
            "Name" => $fio,
            "Phone" => $phone,
        ]
    );

    $ch = curl_init('https://securepay.tinkoff.ru/v2/Init');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE)); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res = curl_exec($ch);
    curl_close($ch);
    
    $res = json_decode($res, true);
    $PaymentId = $res["PaymentId"];
    
    if ($type == "По номеру карты") {
        if (!empty($res['PaymentURL'])) {
            header('Location: ' . $res['PaymentURL'], true, 301);
            exit();							
        }
    } else {  
        // Формирование подписи:
        $hash_data = array(
        	'TerminalKey' => $TerminalKey,
        	'PaymentId'   => $PaymentId,
        	'Password'    => $Password,
        );	

        ksort($hash_data);
        $hash = implode('', $hash_data);
        $hash = hash('sha256', $hash);

        $data = array(
            "TerminalKey" => $TerminalKey,
            "PaymentId" => $PaymentId,
            "Token" => $hash,
        );
        $ch = curl_init('https://securepay.tinkoff.ru/v2/GetQr');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        
        $res = json_decode($res, true);

        if (!empty($res['Data'])) {
            header('Location: /payment.php?qr=' . $res['Data']);
            exit();							
        }      
    }
  