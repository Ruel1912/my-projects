<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check_user_result = $conn->query("SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check_user_result) == 1) {
            $user = mysqli_fetch_assoc($check_user_result);
            if (password_verify($password, $user['password'])) {
                // Пароль совпадает, сохраняем user_id в сессии
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php');
                exit;
            } else {
                $info = 'Неправильный пароль';
            }
        } else {
            $info = 'Пользователь с таким email не найден';
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
    <title>Авторизация</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/components/form.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="form">
            <div class="container">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <?php if(isset($info)): ?>
                    <p class="form__info"><?= $info ?></p>
                    <?php endif; ?>
                    <h1 class="form__title title"><span>Вход</span></h1>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" class="form-input" placeholder="Ваш Email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Пароль</label>
                        <input type="password" class="form-input" placeholder="Введите пароль" name="password"
                            id="password" required>
                    </div>
                    <button type="submit" class="send-button">Войти</button>
                    <a class="form__login__link" href="register.php">Зарегистрироваться</a>
                </form>

            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>