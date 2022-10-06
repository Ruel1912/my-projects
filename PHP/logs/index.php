<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            font-family: sans-serif;
            align-items: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        p {
            margin: 10px;
        }
        input {
            border-radius: 10px;
            display: block;
            width: 150px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Сегодня ты узнаешь свой IP адрес и текущую дату</h1>
<form action="log.php" method="post">
    <h2>Представься, путник:</h2>
    <p><input required type="text" name="Name" placeholder="Твоё имя"></p>
    <p><input type="submit" value="Узнать"></p>
</form>
</body>
</html>