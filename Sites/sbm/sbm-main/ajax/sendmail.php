<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';

    $username = htmlentities($_POST['username']);
    $phone = htmlentities($_POST['phone']);
    $email = htmlentities($_POST['email']);

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'ajax/language/');
    $mail->IsHTML(true);
    $mail->setFrom("sub-pravo@mail.ru", $username);
    $mail->addAddress("sub-pravo@mail.ru");
    $mail->Subject = "Заявка с сайта SBM-право";

    $mail->Body = "<p><b>Имя:</b> $username</p><p><b>Телефон:</b> $phone</p><p><b>Email: </b>$email</p>";


    if ($mail->send()) {
        $message = "Данные отправлены";
    } else {
        $message ="Ошибка";
    }

    $res = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($res);