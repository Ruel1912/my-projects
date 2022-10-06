<?php
    $name = $_POST['Name'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('d.m.Y H:i:s');
    $message = "$name [\n\tIP => $ip\n\tDate => $date\n]\n\n";
    file_put_contents('logs.txt', $message, FILE_APPEND);
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>logs</title>
</head>
<body style="">
<p>Привет, <?=$name?></p>
<p>Твой IP: <?=$ip?></p>
<p>Сейчас: <?=$date?></p>
</body>
</html>




