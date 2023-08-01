<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    // Получаем данные из POST-запроса
    $name = isset($_POST['fio']) ? trim($_POST['fio']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $region = isset($_POST['region']) ? trim($_POST['region']) : '';
    $host_email = "veselmikhail04@yandex.ru";
    $output = "";

    if (!empty($name)) {
        $output .= "<p><b>Имя:</b> " . $name . "</p>";
    }

    if (!empty($phone)) {
        $output .= "<p><b>Телефон:</b> " . $phone . "</p>";
    }

    if (!empty($region)) {
        $output .= "<p><b>Регион:</b> " . $region . "</p>";
    }

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', '/ajax/language/');
    $mail->IsHTML(true);
    $mail->setFrom($host_email, $name);
    $mail->addAddress($host_email);
    $mail->Subject = "Заявка с сайта";
    $mail->Body = "$output";
    
    if ($mail->send()) {
        $message = "success";
    } else {
        $message ="error";
    }

    echo $message;