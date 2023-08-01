<?php
 session_start();
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
 $product_id = $_GET['id'];
 $product = mysqli_fetch_assoc($conn->query("SELECT * FROM shop__product WHERE id = $product_id"));
 $sizes = $conn->query("SELECT * FROM shop__size WHERE product_id = $product_id");

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($user_id)) {
        $size = $_POST['size'];
        $size_id = mysqli_fetch_assoc($conn->query("SELECT * FROM shop__size WHERE product_id = $product_id AND title = '$size'"))['id'];
        $product_trash = $conn->query("SELECT * FROM users__trash WHERE user_id = $user_id AND size_id = $size_id AND trash_id = $product_id");
        if (mysqli_num_rows($product_trash) > 0) {
            $product_trash_count = mysqli_fetch_assoc($product_trash)['count'] + 1;
            $conn->query("UPDATE users__trash SET count = $product_trash_count WHERE user_id = $user_id AND trash_id = $product_id AND size_id = $size_id");
        } else {
            $conn->query("INSERT INTO users__trash(user_id, trash_id, size_id) VALUES ($user_id, $product_id, $size_id)");
        }
    } else {
        header("Location: /profile");
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
    <meta name="google-site-verification" content="lmm1PKa548QuGWucxihb6_YSIHYI2S4HlIitqscXxOQ">
    <meta name="yandex-verification" content="ef19dc9ff54bb0ed">
    <meta name="description"
        content="Добро пожаловать в интернет-магазин Smartswim! Широкий выбор товаров для плавания и бассейна: купальники, плавки, очки, шапочки и аксессуары!">
    <meta property="og:url" content="https://smartswim.ru/shop">
    <meta property="og:title" content="Магазин SmartSwim">
    <meta property="og:description"
        content="Добро пожаловать в интернет-магазин Smartswim! Широкий выбор товаров для плавания и бассейна: купальники, плавки, очки, шапочки и аксессуары! ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>Магазин SmartSwim</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="shop">
            <div class="container">
                <div class="shop__content">
                    <h1 class="search__title title">Магазин</h1>
                    <div class="breadcrumbs">
                        <a href="/shop" class="breadcrumbs__link">Магазин</a>
                        <span class="breadcrumb__divider">
                            <svg width="10" height="15" viewBox="0 0 10 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                    fill=" #8e8e8e"></path>
                            </svg>
                        </span>
                        <a href="javascript:void(0)"
                            class="breadcrumbs__link breadcrumbs__link_active"><?= $product['title'] ?></a>
                    </div>
                    <div class="shop__inner">
                        <div class="prouct__image">
                            <img src="/uploads/shop/<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                        </div>
                        <form method="post" action="" class="product__info">

                            <h2 class="product__title"><?= $product['title'] ?></h2>
                            <div class="product__list">

                                <?php if(isset($product['county'])): ?>
                                <div class="product__row">
                                    <span>Страна-изготовитель</span>
                                    <span><?= $product['country'] ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($product['color'])): ?>
                                <div class="product__row">
                                    <span>Цвет</span>
                                    <span><?= $product['color'] ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($product['gender'])): ?>
                                <div class="product__row">
                                    <span>Пол</span>
                                    <span><?= $product['gender'] ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($product['material'])): ?>
                                <div class="product__row">
                                    <span>Материал</span>
                                    <span><?= $product['material'] ?></span>
                                </div>
                                <?php endif; ?>

                                <!-- <div class="product__row">
                                    <span>Выберите размер</span>
                                    <span class="product__row_size">Таблица размеров</span>
                                </div> -->
                                <div class="product__row">
                                    <?php if(mysqli_num_rows($sizes) > 0): ?>
                                    <select name="size" class="product__size">
                                        <?php foreach($sizes as $size): ?>
                                        <option value="<?= $size['title'] ?>"><?= $size['title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="product__control <?= isset($product['new-price']) ? "sale" : "" ?>">
                                <div class="price">
                                    <span class="card__price"><?= $product['price'] ?> ₽</span>
                                    <?php if(isset($product['new-price'])): ?>
                                    <span class="card__new-price"><?= $product['new-price'] ?> ₽</span>
                                    <?php endif; ?>
                                </div>
                                <?php if(isset($user_id)): ?>
                                <?php  $isFavourite = mysqli_num_rows($conn->query("SELECT * FROM users__favourite WHERE user_id = $user_id AND favourite_id = $product_id")); ?>
                                <div class="prdouct__heart">
                                    <svg class="<?= $isFavourite > 0 ? "fill" : "" ?>"
                                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                        fill="none">
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
                                <?php endif; ?>
                                <button class="product__button send-button">Купить</button>
                            </div>
                        </form>
                    </div>
                    <div class="product__description">
                        <h3>Описание</h3>
                        <p><?= $product['description']?></p>
                    </div>
                    <?php if(isset($product['info-size'])): ?>
                    <div class="product__description">
                        <h3>Информация о размерах</h3>
                        <p><?= $product['info-size']?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="favourite.js"></script>
</body>

</html>