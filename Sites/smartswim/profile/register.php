<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $patronymic = $_POST['patronymic'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];
        $role = $_POST['role'];
        if ($password == $password_repeat) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $info = "Пароли не совпадают";
        }
        // Проверка, что пользователь с таким email не существует
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        if (mysqli_num_rows($check_email_result) > 0) {
            $info = 'Пользователь с таким email уже существует';
        }

        if (empty($info)) {
            // Добавление пользователя в базу данных
            $insert_user_query = "INSERT INTO users (firstname, lastname, patronymic, birthdate, phone, email, password, role)
            VALUES ('$firstname', '$lastname', '$patronymic', '$birthdate', '$phone', '$email', '$password', '$role')";
            if (mysqli_query($conn, $insert_user_query)) {
                header("Location: login.php");
            } else {
                echo 'Ошибка: ' . mysqli_error($conn);
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/favicon/site.webmanifest" />
    <meta name="description" content="Личный кабинет Smartswim">
    <meta property="og:title" content="<?= $user['firstname'] ?> <?= $user['lastname'] ?>">
    <meta property="og:description" content="Личный кабинет Smartswim">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/components/form.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="form">
            <div class="container">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <?php if(isset($info)): ?>
                    <p class="form__info"><?= $info ?></p>
                    <?php endif; ?>
                    <h1 class="form__title title"><span>Регистрация</span></h1>
                    <div>
                        <label for="firstname">Имя</label>
                        <input type="text" class="form-input" placeholder="Ваше имя" name="firstname" id="firstname"
                            required pattern="[А-Яа-яЁё\s]+">
                    </div>
                    <div>
                        <label for="lastname">Фамилия</label>
                        <input type="text" class="form-input" placeholder="Ваша фамилия" name="lastname" id="lastname"
                            required pattern="[А-Яа-яЁё\s]+">
                    </div>
                    <div>
                        <label for="patronymic">Отчество</label>
                        <input type="text" class="form-input" placeholder="Ваше отчество" name="patronymic"
                            id="patronymic" required pattern="[А-Яа-яЁё\s]+">
                    </div>
                    <div>
                        <label for="birthdate">Дата рождения</label>
                        <input type="date" class="form-input" placeholder="Ваша дата рождения" name="birthdate"
                            id="birthdate" required>
                    </div>
                    <div>
                        <label for="phone">Номер телефона</label>
                        <input type="tel" name="phone" class="form-input phone" placeholder="Ваш номер телефона"
                            required="">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" class="form-input" placeholder="Ваш Email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Пароль</label>
                        <input type="password" class="form-input" placeholder="Придумайте пароль" name="password"
                            id="password" required>
                    </div>
                    <div>
                        <label for="password_repeat">Повторите пароль</label>
                        <input type="password" class="form-input" placeholder="Повторите пароль" name="password_repeat"
                            id="password_repeat" required>
                    </div>
                    <div class="form__roles">
                        <label class="custom-checkbox">
                            <input type="radio" name="role" value="родитель" class="form-agree" required>
                            <span class="checkbox-icon"></span>
                            <span class="checkbox-label">родитель</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="radio" name="role" value="тренер" class="form-agree" required>
                            <span class="checkbox-icon"></span>
                            <span class="checkbox-label">тренер</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="radio" name="role" value="ученик" class="form-agree" required>
                            <span class="checkbox-icon"></span>
                            <span class="checkbox-label">ученик</span>
                        </label>

                    </div>
                    <button type="submit" class="send-button">Регистрирация</button>
                    <a class="form__login__link" href="login.php">Уже есть аккаунт</a>
                    <p class="form__policy">
                        Нажимая на кнопку, вы даете согласие на обработку персональных
                        данных и соглашаетесь c
                        <a href="/main/documents?name=Обработка конфиденциальности">Политикой конфиденциальности</a>.
                    </p>
                </form>

            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>