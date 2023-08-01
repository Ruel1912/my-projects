<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    require_once("role.php");

    $user_id = $_SESSION['user_id'];
    $check_user_result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($check_user_result);

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
    <title>Мои сборы</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/collecting/collecting.css">
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
                                <a href="collecting.php" class="active"><label>Сборы</label></a>
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

                        <a href="index.php" class="nav__settings">Управление профилем</a>
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
                            <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">Мои
                                сборы</a>
                        </div>
                        <h1 class="profile__title title">Мои сборы</h1>
                        <?php if(mysqli_num_rows($children) != 0): ?>
                        <div class="data__items">
                            <?php foreach($children as $child): ?>
                            <?php
                                if ($role == "родитель") {
                                    $child_id = $child['id'];
                                } else if ($role == "тренер") {
                                    $child_id = $child['student_id'];
                                    $child = mysqli_fetch_assoc($conn->query("SELECT * FROM users WHERE role = 'ученик' AND id = $child_id"));
                                } else {
                                    $child_id = $user_id;
                                }
                                ?>
                            <div class="data__item">
                                <?php if(isset($heading)): ?>
                                <h2 class="data__title"><?= $heading ?> <?= $child['firstname'] ?>
                                    <?= $child['lastname'] ?></h2>
                                <?php endif; ?>
                                <?php $user_collecting = $conn->query(sprintf("SELECT * FROM users__collecting WHERE user_id = %s", $child_id));?>
                                <?php if(mysqli_num_rows($user_collecting) == 0): ?>
                                <p class="profile__text">Вы еще не записаны на сборы. <a href="/collecting">Выбрать</a>
                                </p>
                                <?php else: ?>
                                <div class="promo__items">
                                    <?php foreach($user_collecting as $user_collect): ?>
                                    <?php $collect_id =  $user_collect['collecting_id']; ?>
                                    <?php $collect = mysqli_fetch_assoc($conn->query("SELECT * FROM collecting WHERE id = $collect_id")); ?>
                                    <div class="promo__item">
                                        <a class="promo__link" href="/collecting/view.php?id=<?= $collect['id'] ?>"
                                            class="promo__link"></a>
                                        <img src="/uploads/collecting/collecting<?= $collect["image"] ?>"
                                            alt="<?= $collect["title"] ?>" class="promo__image">
                                        <h2 class="promo__item_title"><?= $collect["title"] ?></h2>
                                        <p class="promo__item-sub-title"><?= $collect["content"] ?></p>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>



            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>