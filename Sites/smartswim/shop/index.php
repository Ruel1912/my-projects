<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $categories = $conn->query("SELECT * FROM shop__category WHERE parent_id IS NULL;");
 $products = $conn->query("SELECT * FROM shop__product");

 if (isset($_GET['category'])) {
    $category = $_GET['category'];
    if ($category != 'all') {
        $category_id = mysqli_fetch_assoc($conn->query("SELECT id FROM shop__category WHERE title = '$category'"))['id'];
        $products_categories = $conn->query("SELECT * FROM `shop__category` WHERE id = $category_id OR parent_id = $category_id;");
        foreach($products_categories as $product_category) {
            $product_id = $product_category['id'];
            if (mysqli_num_rows( $conn->query("SELECT * FROM shop__product WHERE category_id = $product_id")) > 0) {
                $products = $conn->query("SELECT * FROM shop__product WHERE category_id = $product_id");
            }
        }
    } else {
        $products = $conn->query("SELECT * FROM shop__product");
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="shop">
            <div class="container">
                <div class="shop__inner">
                    <aside>
                        <h1 class="search__title title"><a href="/shop">Магазин</a></h1>
                        <div class="shop__nav-mobile swiper-container">
                            <div class="swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="7"
                                    height="10" fill="none" viewBox="0 0 7 10">
                                    <g clip-path="url(#a)">
                                        <path fill="#878787"
                                            d="M5.156 0 6.3 1.123 2.59 4.762 6.3 8.4 5.156 9.524.3 4.762 5.156 0Z" />
                                    </g>
                                    <defs>
                                        <clipPath id="a">
                                            <path fill="#fff" d="M0 0h7v10H0z" transform="matrix(-1 0 0 1 7 0)" />
                                        </clipPath>
                                    </defs>
                                </svg></div>
                            <div class="swiper-wrapper">
                                <?php foreach($categories as $category): ?>
                                <?php $category_id = $category['id']; ?>
                                <?php $subcategories = $conn->query("SELECT * FROM shop__category WHERE parent_id = $category_id;"); ?>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)" class="accordion__title"><?= $category['title']?></a>
                                </div>
                                <?php endforeach; ?>
                                <a href="?category=all" class="other">Прочее</a>
                            </div>
                            <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="7"
                                    height="10" fill="none" viewBox="0 0 7 10">
                                    <g clip-path="url(#a)">
                                        <path fill="#878787"
                                            d="M1.844 0 .7 1.123l3.71 3.639L.7 8.4l1.145 1.123L6.7 4.762 1.844 0Z" />
                                    </g>
                                    <defs>
                                        <clipPath id="a">
                                            <path fill="#fff" d="M0 0h7v10H0z" />
                                        </clipPath>
                                    </defs>
                                </svg></div>
                        </div>
                        <nav class="shop__nav">
                            <?php foreach($categories as $category): ?>
                            <?php $category_id = $category['id']; ?>
                            <?php $subcategories = $conn->query("SELECT * FROM shop__category WHERE parent_id = $category_id;"); ?>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <a href="?category=<?= $category['title']?>"
                                        class="accordion__title"><?= $category['title']?></a>
                                    <?php if (mysqli_num_rows($subcategories) > 0): ?>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                            viewBox="0 0 15 16" fill="none">
                                            <g clip-path="url(#clip0_18_446)">
                                                <path
                                                    d="M15 5.26871L13.2312 3.5L7.5 9.23123L1.76877 3.5L-7.73128e-08 5.26871L7.5 12.7687L15 5.26871Z"
                                                    fill="var(--text)" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_18_446">
                                                    <rect width="15" height="15" fill="white"
                                                        transform="translate(15 0.5) rotate(90)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (mysqli_num_rows($subcategories) > 0): ?>
                                <div class="accordion__content">
                                    <?php foreach ($subcategories as $subcategory): ?>
                                    <a href="?category=<?= $subcategory['title']?>"><?= $subcategory['title'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            <a href="?category=all" class="other">Прочее</a>
                        </nav>
                    </aside>

                    <div class="shop__content">
                        <div class="search__row">
                            <div class="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18"
                                    fill="none">
                                    <g clip-path="url(#clip0_73_6614)">
                                        <path
                                            d="M16.7917 16.2901L12.5637 12.0621C13.7158 10.6529 14.2823 8.8548 14.146 7.03967C14.0096 5.22455 13.1808 3.53128 11.8309 2.3101C10.4811 1.08893 8.71357 0.433284 6.8939 0.478781C5.07422 0.524279 3.34165 1.26744 2.05454 2.55454C0.767439 3.84165 0.024279 5.57422 -0.0212186 7.3939C-0.0667161 9.21357 0.58893 10.9811 1.8101 12.3309C3.03128 13.6808 4.72455 14.5096 6.53967 14.646C8.3548 14.7823 10.1529 14.2158 11.5621 13.0637L15.7901 17.2917C15.9237 17.4207 16.1026 17.4921 16.2884 17.4905C16.4741 17.4889 16.6517 17.4144 16.7831 17.2831C16.9144 17.1517 16.9889 16.9741 16.9905 16.7884C16.9921 16.6026 16.9207 16.4237 16.7917 16.2901ZM7.08257 13.2492C5.96181 13.2492 4.86622 12.9169 3.93434 12.2942C3.00246 11.6716 2.27615 10.7866 1.84725 9.75111C1.41835 8.71566 1.30614 7.57628 1.52479 6.47706C1.74343 5.37783 2.28313 4.36813 3.07563 3.57563C3.86813 2.78313 4.87783 2.24343 5.97706 2.02479C7.07628 1.80614 8.21566 1.91835 9.25111 2.34725C10.2866 2.77615 11.1716 3.50246 11.7942 4.43434C12.4169 5.36622 12.7492 6.46181 12.7492 7.58257C12.7475 9.08494 12.15 10.5253 11.0876 11.5876C10.0253 12.65 8.58494 13.2475 7.08257 13.2492Z"
                                            fill="#4E4E4E"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_73_6614">
                                            <rect width="17" height="17" fill="white" transform="translate(0 0.5)">
                                            </rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <input type="text" name="search" autofocus placeholder="Поиск">
                            </div>
                        </div>
                        <div class="cards" id="cards">
                            <?php for($i = 0; $i < 6; $i++): ?>
                            <?php foreach($products as $product): ?>

                            <div class="card">
                                <div class="card__header">
                                    <img src="/uploads/shop/<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                                </div>
                                <div class="card__body">
                                    <p class="card__title"><?= $product['title'] ?></p>
                                    <div class="card__control <?= isset($product['new-price']) ? "sale" : "" ?> ">
                                        <div class="price">
                                            <span class="card__price"><?= $product['price'] ?> ₽</span>
                                            <?php if(isset($product['new-price'])): ?>
                                            <span class="card__new-price"><?= $product['new-price'] ?> ₽</span>
                                            <?php endif; ?>
                                        </div>
                                        <a href="product.php?id=<?= $product['id'] ?>" class="card__link">
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
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="search-product.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="/js/slider.js"></script>
</body>

</html>