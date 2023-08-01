<?php


	$fio =  $_POST['fio'];
    $phone = $_POST['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $region = $_POST['region'];
    $message = isset($_POST['message']) ? $_POST['message'] : null;
    $commentary = "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>" ;
    if ($message != null) {
        $commentary .= "Сообщение: " . $message . "<br>";
    }
    // здесь могут быть прочие поля
    // $commentary .= "...<br>";
    $queryString = $_POST['query_string'];
    parse_str($queryString, $query);
    $utm_source = $query['utm_source'] ?? null;
    $utm_campaign = $query['utm_campaign'] ?? null;


    /*ДАННЫЕ*/
    $curloptURL = 'https://api.myforce.ru/bitrix.lead.add';
    $data = [

        'department' => 'seller',

        'name' => $fio ?? 'Без имени', # указываем ФИО всегда, если нет ставим "Без имени"

        'phone' => $phone ?? null, # указываем полученный телефон с формы

        'phone2' => '' ?? null, # указываем второй полученный телефон с формы, если есть

        'phone_messenger' => $phone ?? null, # указываем телефон с мессенджером, если есть

        'email' => $email ?? null, # указываем email, если есть

        'city' => $region, # указываем РЕГИОН обязательно

        'city_real' => $city ?? null, # указываем город, если есть

        'utm_source' => $utm_source ?? '', # указываем UTM метку всегда, если нет, то ставим null

        'utm_campaign' => $utm_campaign ?? '', # указываем UTM метку всегда, если нет, то ставим null

        'commentary' => $commentary ?? '', # указываем город, сумму и прочие поля, которые берем с формы,
        # также указываем IP пользователя и сайт откуда лид, поле обязательное

        'category' => 18, # числовое значение категории, можно узнать у админа

        'typeOfService' => 1718,

        'stage' => 'C18:NEW', # заполняется следующим образом: пишется АНГЛИЙСКАЯ БУКВА "С" и
        # ставится номер категории, который ты указал в "category" - C104 затем ставится двоеточие и в 99% случаев нужно будет ставить NEW. Иногда, когда тебя попросят, чтобы лид падал на другую стадию - ты должен будешь поменять NEW на то, что тебе скинут

        'source_bitrix' => '107', # источник из Битрикс24; 102 - для sale

        'source_real' => 'telphy.ru', # сайт или инфа откуда лид пришел

    ];
    /*ДАННЫЕ*/

    // /*ОТПРАВКА*/
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $curloptURL,
        CURLOPT_POSTFIELDS => http_build_query($data),
    ));
    $response = curl_exec($curl);

    // /*ОТПРАВКА*/
    echo !$response ? "CURL ERROR: " . curl_error($curl) : "success"; # здесь ответ сервера
    curl_close($curl); 