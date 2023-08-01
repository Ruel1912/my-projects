<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    require_once("role.php");

    $user_id = $_SESSION['user_id'];
    $check_user_result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($check_user_result);
    $user_products = $conn->query("SELECT * FROM users__order WHERE user_id = $user_id ORDER BY date DESC");
    $prevDate = '';

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

    $months = [
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря',
    ];
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
    <title>Заказы</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/shop/shop.css">
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
                                <a href="order.php" class="active">
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
                            <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">Заказы</a>
                        </div>
                        <h1 class="profile__title title">Заказы</h1>
                        <div class="data__items">
                            <div class="data__item">
                                <?php if(mysqli_num_rows($user_products) > 0): ?>
                                <div class="trash">
                                    <?php foreach($user_products as $user_product): ?>
                                    <?php $product_id = $user_product['order_id'];
                                            $product = mysqli_fetch_assoc($conn->query("SELECT * FROM shop__product WHERE id=$product_id"));   
                                            $size_id =  $user_product['size_id'];   
                                            $size = mysqli_fetch_assoc($conn->query("SELECT * FROM shop__size WHERE id=$size_id"))['title'];  
                                            $orderDate = date('d', strtotime($user_product['date'])) . " " .
                                            $months[date('n', strtotime($user_product['date']))] . " " . date('Y', strtotime($user_product['date'])) 
                                    ?>

                                    <?php if($orderDate != $prevDate): ?>
                                    <p class="order__date">
                                        <?= $orderDate ?> год
                                    </p>
                                    <?php endif; ?>
                                    <div class="trash__row">
                                        <div class="trash__inner">
                                            <div class="card__header">
                                                <img src="/uploads/shop/<?= $product['image'] ?>"
                                                    alt="<?= $product['title'] ?>">
                                            </div>
                                            <div class="trash__info">
                                                <p class="card__title"><?= $product['title'] ?>(<?= $size ?>)</p>
                                                <div class="card__control">
                                                    <div class="price">
                                                        <?php if(isset($product['new-price'])): ?>
                                                        <span class="card__price"><?= $product['new-price'] ?> ₽ x
                                                            <?= $user_product['count'] ?>
                                                        </span>
                                                        <?php else: ?>
                                                        <span class="card__price"><?= $product['price'] ?> ₽ x
                                                            <?= $user_product['count'] ?>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $prevDate = $orderDate ?>
                                    <?php endforeach;?>
                                </div>


                                <?php else: ?>
                                <p class="profile__text">Вы ещё ничего не заказывали. <a href="/shop">Перейти в
                                        магазин</a>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>