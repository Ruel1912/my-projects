<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
$competitions = $conn->query("SELECT * FROM competitions"); 
$years = $conn->query("SELECT * FROM competitions__year ORDER BY year DESC");
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
    <meta name="description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:url" content="https://smartswim.ru/competitions">
    <meta property="og:title" content="Соревнования по плаванию">
    <meta property="og:description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title>Прошедшие соревнования</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="last-competition.css">

</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="promo">
            <div class="container">
                <h1 class="promo__title title">Соревнования</h1>
                <div class="breadcrumbs">
                    <a href="/competitions" class="breadcrumbs__link">Соревнования</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e"></path>
                        </svg>
                    </span>
                    <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">ПРОШЕДШИЕ
                        СОРЕВНОВАНИЯ</a>
                </div>
            </div>
        </section>
        <section class="calendar">
            <div class="container">
                <div class="calendar__content">
                    <?php foreach($years as $year): ?>
                    <?php foreach($competitions as $competition): ?>
                    <div class="calendar__competition">
                        <h2 class="calendar__title title">Прошедшие соревнования <?= $competition['url'] ?>
                            <br> по плаванию в <?= $year['year'] ?> году
                        </h2>
                        <?php
                            $competition_id = $competition['id'];
                            $current_year = $year['year'];
                            $competition_orders = $conn->query("SELECT * FROM competitions__calendar WHERE competition_id = $competition_id AND year_id = $current_year LIMIT 7;");
                                ?>
                        <div class="calendar__items">
                            <?php foreach($competition_orders as $competition_order): ?>
                            <?php if(isset($competition_order['total_protocol'])): ?>
                            <a href="<?= $competition_order['total_protocol'] ?>"
                                class="calendar__item"><?= $competition_order['date'] ?> <?= $current_year ?></a>
                            <?php else: ?>
                            <div class="calendar__item"><?= $competition_order['date'] ?> <?= $current_year ?></div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="photos">
            <div class="container">
                <div class="photo__swiper swiper-container">
                    <div class="swiper-wrapper">
                        <div class="photos__slide swiper-slide">
                            <img src="/images/last-competitions/01.jpg" alt="фото победителей соревнований">
                        </div>
                        <div class="photos__slide swiper-slide">
                            <img src="/images/last-competitions/02.jpg" alt="фото победителей соревнований">
                        </div>
                        <div class="photos__slide swiper-slide">
                            <img src="/images/last-competitions/03.jpg" alt="фото победителей соревнований">
                        </div>
                        <div class="photos__slide swiper-slide">
                            <img src="/images/last-competitions/04.jpg" alt="фото победителей соревнований">
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="/js/slider.js"></script>

</body>

</html>