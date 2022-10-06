<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<form action="#" method="post" name="form">
    <div>
        <p><span>*</span>Логин</p>
        <div class="icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/1024px-User_font_awesome.svg.png"
                 alt="Иконка">
            <input  tabindex="1" type="text" name="login" required>
        </div>
    </div>
    <div>
        <p><span>*</span>Пароль</p>
        <div class="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png"
                 alt="замок">
            <input tabindex="2" type="password" name="password" value="" required>
        </div>
    </div>
    <div>
        <p><span>*</span>Повторение пароля</p>
        <div class="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png"
                 alt="замок">
            <input tabindex="3" type="password" name="repeatPassword" value="" required>
        </div>
    </div>
    <div style="height: 60px;">
        <p><span>*</span>Пол</p>
        <p><input checked tabindex="4" type="radio" name="gender" value="man"> Мужской</p>
        <p><input tabindex="4" type="radio" name="gender" value="woman"> Женский</p>
    </div>
    <div>
        <p><span>*</span>Имя пользователя (ФИО)</p>
        <input tabindex="5" type="text" name="FIO" style="margin-left: 14%;" required>
    </div>
    <div>
        <p>Email</p>
        <div class="icon">
            <img src="https://static.tildacdn.com/tild3864-6434-4361-b739-373763663936/email_object.png">
            <input tabindex="6" type="email" name="mail">
        </div>
    </div>
    <div>
        <p>Телефон</p>
        <div class="icon">
            <img src="https://img.icons8.com/ios/344/phone-ringing--v2.png" style="margin: 0%; padding: 0%;" alt="трубка">
            <input tabindex="7" type="tel" name="phone" style="margin-top: 8px;">
        </div>

    </div>
    <div>
        <p><span>*</span>Фото</p>
        <input tabindex="8" type="file" name="photo" alt="Фотография пользователя" required>
    </div>
    <div>
        <p><span>*</span>Дата рождения</p>
        <input tabindex="9" type="date" name="dayBirthday" required>
    </div>
    <button type="submit" tabindex="9" onclick="checkPassword()">Подтвердить регистрацию</button>
</form>
</body>
</html>