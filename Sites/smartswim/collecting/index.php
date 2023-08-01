<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $collecting = $conn->query("SELECT * FROM collecting");
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
    <meta name="description" content="Тренировочные сборы SmartSwim">
    <!-- <meta property="og:url" content="https://smartswim.ru/collecting"> -->
    <meta property="og:title" content="Школа плавания SmartSwim">
    <meta property="og:description" content="Тренировочные сборы SmartSwim">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>Тренировочные сборы</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="collecting.css">

</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="promo">
            <div class="container">
                <h1 class="promo__title title">Предстоящие сборы по плаванию на 2022-2023 год</h1>
                <div class="breadcrumbs">
                    <a href="/main" class="breadcrumbs__link">Главная</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e"></path>
                        </svg>
                    </span>
                    <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">Сборы</a>
                </div>
                <div class="promo__items">
                    <?php foreach($collecting as $collect): ?>
                    <div class="promo__item">
                        <a class="promo__link" href="view.php?id=<?= $collect['id'] ?>" class="promo__link"></a>
                        <img src="/uploads/collecting/collecting<?= $collect["image"] ?>" alt="<?= $collect["title"] ?>"
                            class="promo__image">
                        <h2 class="promo__item_title"><?= $collect["title"] ?></h2>
                        <p class="promo__item-sub-title"><?= $collect["content"] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="info">
            <div class="container">
                <h2 class="info__title title">SmartSwimCamp</h2>
                <p class="info__text">
                    Команда SmartSwimTeam организует сборы по плаванию для детей и взрослых в летние, зимние каникулы с
                    различным уровнем подготовленности. Принять участие может спортсмен с разрядом выше 2 юн. и
                    возрастом от 9 до 17 лет.
                    Наши тренеры являются высококвалифицированными специалистами и имеют большой опыт работы.<br>
                    На наших сборах собирается от 15 до 40 человек в зависимости от инфраструктуры спортивной базы. У
                    каждого тренера занимается группа от 10 до 15 человек. Спортсмены делятся на группы по уровням
                    подготовленности вне зависимости от возраста. Помимо тренировок и турниров организуем насыщенную
                    программу: экскурсии, лекции, мотивирующие беседы и мастер-классы.
                </p>
                <p class="info__text">
                    Команда SmartSwim организовала более 50 сборов по России и Белоруссии. К нам приезжают спортсмены из
                    разных городов России: Волгограда, Воронеж, Москва, Московская область, Санкт-Петербург,
                    Ленинградская область, Евпатория, Казань, Калуга, Красноярск, Надым, Новосибирск, Омск, Псков,
                    Ростов-на-Дону, Рязань, Ульяновск, Ханты-Мансийск и других городов.
                </p>
                <p class="info__text">Побывав однажды - Ваше представление о сборах изменится навсегда.</p>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>