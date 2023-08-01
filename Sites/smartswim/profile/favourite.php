<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    require_once("role.php");

    $user_id = $_SESSION['user_id'];
    $check_user_result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($check_user_result);
    $user_products = $conn->query("SELECT * FROM users__favourite WHERE user_id = $user_id");

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
    <title>Избранное</title>
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
                                <a href="favourite.php" class="active">
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
                            <a href="javascript:void(0)"
                                class="breadcrumbs__link breadcrumbs__link_active">Избранное</a>
                        </div>
                        <h1 class="profile__title title">Избранное</h1>
                        <div class="data__items">
                            <div class="data__item">
                                <?php if(mysqli_num_rows($user_products) > 0): ?>
                                <div class="favourite cards">
                                    <?php foreach($user_products as $user_product): ?>
                                    <?php $product_id = $user_product['favourite_id'] ?>
                                    <?php $product = mysqli_fetch_assoc($conn->query("SELECT * FROM shop__product WHERE id=$product_id")) ?>
                                    <div class="card">
                                        <div class="card__header">
                                            <img src="/uploads/shop/<?= $product['image'] ?>"
                                                alt="<?= $product['title'] ?>">
                                        </div>
                                        <div class="card__body">
                                            <div class="card__body_row">
                                                <p class="card__title"><?= $product['title'] ?></p>
                                                <?php  $isFavourite = mysqli_num_rows($conn->query("SELECT * FROM users__favourite WHERE user_id = $user_id AND favourite_id = $product_id")); ?>
                                                <div class="prdouct__heart">
                                                    <svg class="<?= $isFavourite > 0 ? "fill" : "" ?>"
                                                        xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        viewBox="0 0 30 30" fill="none">
                                                        <g clip-path="url(#clip0_56_382)">
                                                            <path
                                                                d="M13.6858 5.99762L14.9982 8.36879L16.3106 5.99762C16.8645 4.9969 17.6727 4.16004 18.6534 3.57157C19.6216 2.99066 20.7242 2.6721 21.8525 2.64689C23.6838 2.73809 25.407 3.54435 26.6507 4.8933C27.9044 6.25313 28.569 8.0539 28.4993 9.90218L28.4982 9.93045V9.95874C28.4982 11.6874 27.7913 13.6094 26.5696 15.6074C25.3574 17.5897 23.7114 19.5286 22.0084 21.2607C18.9063 24.4155 15.737 26.7623 14.9985 27.296C14.2531 26.7564 11.087 24.4111 7.98808 21.2597C6.28503 19.5278 4.63901 17.5891 3.42687 15.607C2.20518 13.6092 1.49824 11.6874 1.49824 9.95874V9.93045L1.49717 9.90218C1.42743 8.0539 2.09203 6.25313 3.34577 4.8933C4.58948 3.54435 6.31266 2.73809 8.144 2.64689C9.27229 2.6721 10.3749 2.99066 11.343 3.57157C12.3238 4.16004 13.132 4.99689 13.6858 5.99762Z"
                                                                stroke="white" stroke-width="3" />
                                                            <path
                                                                d="M13.6858 5.99762L14.9982 8.36879L16.3106 5.99762C16.8645 4.9969 17.6727 4.16004 18.6534 3.57157C19.6216 2.99066 20.7242 2.6721 21.8525 2.64689C23.6838 2.73809 25.407 3.54435 26.6507 4.8933C27.9044 6.25313 28.569 8.0539 28.4993 9.90218L28.4982 9.93045V9.95874C28.4982 11.6874 27.7913 13.6094 26.5696 15.6074C25.3574 17.5897 23.7114 19.5286 22.0084 21.2607C18.9063 24.4155 15.737 26.7623 14.9985 27.296C14.2531 26.7564 11.087 24.4111 7.98808 21.2597C6.28503 19.5278 4.63901 17.5891 3.42687 15.607C2.20518 13.6092 1.49824 11.6874 1.49824 9.95874V9.93045L1.49717 9.90218C1.42743 8.0539 2.09203 6.25313 3.34577 4.8933C4.58948 3.54435 6.31266 2.73809 8.144 2.64689C9.27229 2.6721 10.3749 2.99066 11.343 3.57157C12.3238 4.16004 13.132 4.99689 13.6858 5.99762Z"
                                                                stroke="#094979" stroke-width="3" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_56_382">
                                                                <rect width="30" height="30" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                                                </div>
                                            </div>

                                            <div
                                                class="card__control <?= isset($product['new-price']) ? "sale" : "" ?> ">
                                                <div class="price">
                                                    <span class="card__price"><?= $product['price'] ?> ₽</span>
                                                    <?php if(isset($product['new-price'])): ?>
                                                    <span class="card__new-price"><?= $product['new-price'] ?> ₽</span>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="/shop/product.php?id=<?= $product['id'] ?>" class="card__link">
                                                    <span>Подробнее</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 15 15" fill="none">
                                                        <path
                                                            d="M4.76871 0L3 1.76877L8.73123 7.5L3 13.2312L4.76871 15L12.2687 7.5L4.76871 0Z"
                                                            fill="white" />
                                                        <path
                                                            d="M4.76871 0L3 1.76877L8.73123 7.5L3 13.2312L4.76871 15L12.2687 7.5L4.76871 0Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <?php else: ?>
                                <p class="profile__text">В избранном ещё нет товаров. <a href="/shop">Перейти в
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
    <script src="/shop/favourite.js"></script>
</body>

</html>