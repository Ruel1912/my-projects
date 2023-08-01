<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    require "scripts/add_doc.php";
    require_once("role.php");

    $user_id = $_SESSION['user_id'];
    $user = mysqli_fetch_assoc($conn->query("SELECT * FROM users WHERE id='$user_id'"));
    $role = $user['role'];

    // Проверяем, что пользователь авторизован
    if (!isset($_SESSION['user_id'])) {
        // Перенаправляем пользователя на страницу авторизации
        header('Location: login.php');
        exit();
    }
    
    // Обрабатываем нажатие кнопки "Выход"
    if (isset($_POST['logout'])) {
        // Удаляем данные из сессии
        session_unset();
        session_destroy();
    
        // Перенаправляем пользователя на страницу авторизации
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $patronymic = $_POST['patronymic'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Проверка, что пользователь с таким email не существует
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        if (mysqli_num_rows($check_email_result) > 0) {
            $info = 'Пользователь с таким email уже существует';
        }
        if (empty($info)) {
            $adding_child_sql = "INSERT INTO users (firstname, lastname, patronymic, birthdate, phone, email, password, role, parent_id)
         VALUES ('$firstname', '$lastname', '$patronymic', '$birthdate', '$phone', '$email', '$password', 'ученик', $user_id)";
            $adding_child = $conn->query($adding_child_sql);
            if ($adding_child) {
                $child_id = mysqli_fetch_assoc($conn->query("SELECT * FROM users WHERE parent_id = $user_id ORDER BY id DESC LIMIT 1;"))['id'];
                $conn->query("INSERT INTO users__document(user_id) VALUES ($child_id)");
                addDocument($conn, $child_id);
            }
        } else {
            echo $info;
        }
    }

    if (isset($_POST['user_id'])) {
        $student_id = $_POST['user_id'];
        $student = $conn->query("SELECT * FROM users WHERE id = $student_id");
        if (mysqli_num_rows($student) > 0) {
            echo "Такой ученик уже записан в команду";
        } else {
            $add_student = $conn->query("INSERT INTO coaches__students (coach_id, student_id) VALUES ($user_id, $student_id)");
            if ($add_student) {
                header("Location: index.php");
            } else {
                echo "Ошибка добавления ученика";
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
    <title><?= $user['firstname'] ?> <?= $user['lastname'] ?></title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/components/form.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="profile">
            <div class="container">
                <div class="profile__wrapper">
                    <aside>
                        <div class="profile__photo">
                            <img src="<?= $user['photo'] ? '/uploads/users/avatars/'. $user_id . '/' . $user['photo'] : '/images/user-placeholder.svg' ?>"
                                alt="Profile photo">
                        </div>
                        <div class="profile__name">
                            <p><?= $user['firstname'] ?></p>
                            <p><?= $user['lastname'] ?></p>
                        </div>
                        <nav class="profile__nav">
                            <div class="nav__competition">
                                <a href="competition.php"><label>Соревнования</label></a>
                                <a href="collecting.php"><label>Сборы</label></a>
                            </div>
                            <div class="nav__shop">
                                <a href="favourite.php">
                                    <label>Избранное</label>
                                    <?php if($user_favourite_count != 0): ?>
                                    <span>(<?= $user_favourite_count ?>)</span>
                                    <?php endif; ?>
                                </a>

                                <a href="trash.php">
                                    <label>Корзина</label>
                                    <?php if($user_trash_count != 0): ?>
                                    <span>(<?= $user_trash_count ?>)</span>
                                    <?php endif; ?>
                                </a>
                                <a href="order.php">
                                    <label>Заказы</label>
                                    <?php if($user_order_count != 0): ?>
                                    <span>(<?= $user_order_count ?>)</span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </nav>

                        <a href="index.php" class="nav__settings active">Управление профилем</a>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" name="logout" value="1">
                            <button class="nav__exit" type="submit">Выйти</button>
                        </form>
                    </aside>
                    <div class="profile__content">
                        <div class="breadcrumbs">
                            <a href="/profile" class="breadcrumbs__link">Личный кабинет</a>
                            <span class="breadcrumb__divider">
                                <svg width="10" height="15" viewBox="0 0 10 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                        fill=" #8e8e8e"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0)"
                                class="breadcrumbs__link breadcrumbs__link_active">Управление</a>
                        </div>
                        <h1 class="profile__title title">Управление профилем</h1>
                        <div class="add">
                            <a href="index.php" class="back">Назад</a>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php if($user['role'] == "родитель"):   ?>
                                <h2 class="add__title title">Добавить ребенка</h2>
                                <div>
                                    <label for="firstname">Имя</label>
                                    <input type="text" class="form-input" placeholder="Имя" name="firstname"
                                        id="firstname" required pattern="[А-Яа-яЁё\s]+">
                                </div>
                                <div>
                                    <label for="lastname">Фамилия</label>
                                    <input type="text" class="form-input" placeholder="Фамилия" name="lastname"
                                        id="lastname" required pattern="[А-Яа-яЁё\s]+">
                                </div>
                                <div>
                                    <label for="patronymic">Отчество</label>
                                    <input type="text" class="form-input" placeholder="Отчество" name="patronymic"
                                        id="patronymic" required pattern="[А-Яа-яЁё\s]+">
                                </div>
                                <div>
                                    <label for="birthdate">Дата рождения</label>
                                    <input type="date" class="form-input" placeholder="Дата рождения" name="birthdate"
                                        id="birthdate" required>
                                </div>
                                <div>
                                    <label for="phone">Номер телефона</label>
                                    <input type="tel" name="phone" class="form-input phone" placeholder="Номер телефона"
                                        required="">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" class="form-input" placeholder="Email" name="email" id="email"
                                        required>
                                </div>
                                <div>
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-input" placeholder="Придумайте пароль"
                                        name="password" id="password" required>
                                </div>
                                <div class="files">
                                    <div class="file">
                                        <span>Свидетельство о рождении / паспорт ребенка </span>
                                        <button type="button">
                                            <label for="passport">Добавить</label>
                                        </button>
                                        <input style="display: none" type="file" name="passport" id="passport"
                                            accept=".jpg, .jpeg, .png, .gif, application/pdf">
                                    </div>
                                    <div class="file">
                                        <span>Страховка ребенка </span>
                                        <button type="button">
                                            <label for="insurance">Добавить</label>
                                        </button>
                                        <input style="display: none" type="file" name="insurance" id="insurance"
                                            accept=".jpg, .jpeg, .png, .gif, application/pdf">
                                    </div>
                                    <div class="file">
                                        <span>Мед отпуск </span>
                                        <button type="button">
                                            <label for="medical">Добавить</label>
                                        </button>
                                        <input style="display: none" type="file" name="medical" id="medical"
                                            accept=".jpg, .jpeg, .png, .gif, application/pdf">
                                    </div>
                                </div>
                                <input type="hidden" name="role" value="ученик">
                                <button type="submit" class="send-button">Готово</button>
                                <?php elseif($user['role'] == "тренер"): ?>
                                <?php $students = $conn->query("SELECT * FROM users WHERE role = 'ученик'"); ?>
                                <h2 class="add__title title coach">Добавить ученика</h2>
                                <div class="add__search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18"
                                        fill="none">
                                        <g clip-path="url(#clip0_73_6614)">
                                            <path
                                                d="M16.7917 16.2901L12.5637 12.0621C13.7158 10.6529 14.2823 8.8548 14.146 7.03967C14.0096 5.22455 13.1808 3.53128 11.8309 2.3101C10.4811 1.08893 8.71357 0.433284 6.8939 0.478781C5.07422 0.524279 3.34165 1.26744 2.05454 2.55454C0.767439 3.84165 0.024279 5.57422 -0.0212186 7.3939C-0.0667161 9.21357 0.58893 10.9811 1.8101 12.3309C3.03128 13.6808 4.72455 14.5096 6.53967 14.646C8.3548 14.7823 10.1529 14.2158 11.5621 13.0637L15.7901 17.2917C15.9237 17.4207 16.1026 17.4921 16.2884 17.4905C16.4741 17.4889 16.6517 17.4144 16.7831 17.2831C16.9144 17.1517 16.9889 16.9741 16.9905 16.7884C16.9921 16.6026 16.9207 16.4237 16.7917 16.2901ZM7.08257 13.2492C5.96181 13.2492 4.86622 12.9169 3.93434 12.2942C3.00246 11.6716 2.27615 10.7866 1.84725 9.75111C1.41835 8.71566 1.30614 7.57628 1.52479 6.47706C1.74343 5.37783 2.28313 4.36813 3.07563 3.57563C3.86813 2.78313 4.87783 2.24343 5.97706 2.02479C7.07628 1.80614 8.21566 1.91835 9.25111 2.34725C10.2866 2.77615 11.1716 3.50246 11.7942 4.43434C12.4169 5.36622 12.7492 6.46181 12.7492 7.58257C12.7475 9.08494 12.15 10.5253 11.0876 11.5876C10.0253 12.65 8.58494 13.2475 7.08257 13.2492Z"
                                                fill="#4E4E4E" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_73_6614">
                                                <rect width="17" height="17" fill="white"
                                                    transform="translate(0 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <input type="text" name="search" placeholder="Поиск">
                                </div>
                                <div class="search-results"></div>
                                <input type="hidden" name="user_id" class="user_id">
                                <button class="button" type="submit">Готово</button>
                                <?php endif; ?>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="file.js"></script>
    <script src="search-student.js"></script>
</body>

</html>