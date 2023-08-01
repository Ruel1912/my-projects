<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $feedbacks = $conn->query("SELECT * FROM feedbacks");
 $articles = $conn->query("SELECT * FROM collecting");
 $coaches = $conn->query("SELECT * FROM coaches");
 
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
    <meta name="description" content="Школа плавания SmartSwim для детей и взрослых ">
    <meta property="og:url" content="https://smartswim.ru">
    <meta property="og:title" content="Школа плавания SmartSwim">
    <meta property="og:description" content="Школа плавания SmartSwim для детей и взрослых ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>Школа плавания SmartSwim</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" media="(max-width: 1200px)" href="main-mobile.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">

        <section class="promo" id="promo">
            <video class="promo__video" oncontextmenu="return false;" autoplay muted loop>
                <source src="./main.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="promo__wrapper">

                <div class="promo__content">
                    <h1 class="promo__title">Школа плавания SmartSwim</h1>
                    <p class="promo__text">Присоединяйтесь к существующим и формирующимся группам по плаванию</p>
                </div>
                <div class="promo__control">
                    <div class="button call open-modal">
                        <button>Обратный звонок </button>
                    </div>
                </div>

            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <h2 class="about__title title">Почему нас выбирают</h2>
                <div class="about__cards">
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about01.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">Квалифицированные специалисты</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about02.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">9 лет успешной
                            работы</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about03.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">Проведение соревнований с присуждением разрядов</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about04.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">Программы тренировок
                            для всех возрастов и
                            уровней подготовки</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about05.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">Индивидуальный подход к каждому</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/about/about06.svg" alt="about-illustartion">
                        </div>
                        <p class="about__text">Регулярные тренировочные сборы</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback" id="feedback">
            <div class="container">
                <h2 class="feedback__title title">Отзывы клиентов</h2>
                <div class="feedback__slider">
                    <div class="feedback__swiper swiper-container">
                        <div class="swiper-wrapper">
                            <?php while ($row = mysqli_fetch_assoc($feedbacks)) : ?>
                            <div class="feedback__slide swiper-slide">
                                <div class="slide__inner">
                                    <div class="feedback__header">
                                        <div class="feedback__image"><img
                                                src="/uploads/feedbacks/<?= htmlspecialchars($row['image']) ?>"
                                                alt="avatar">
                                        </div>
                                        <h3 class="feedback__name"><?= htmlspecialchars($row['name']) ?></h3>
                                    </div>
                                    <p class="feedback__content"><?= htmlspecialchars($row['content']) ?></p>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <!-- <div class="feedback__link flat-button button"><a href="">Все отзывы <svg xmlns="http://www.w3.org/2000/svg"
                        width="6" height="10" viewBox="0 0 6 10" fill="none">
                        <path d="M1.14496 0.5L0 1.56126L3.71005 5L0 8.43874L1.14496 9.5L6 5L1.14496 0.5Z"
                            fill="white" />
                    </svg></a>
            </div> -->
            </div>
        </section>
        <section class="articles" id="articles">

            <h2 class="articles__title title">Статьи</h2>
            <div class="articles__swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php while ($row = mysqli_fetch_assoc($articles)) : ?>
                    <div class="articles__slide swiper-slide">
                        <a href="/collecting/view.php?id=<?= $row['id'] ?>" class="article__link"></a>
                        <div class="articles__image">
                            <img src="/uploads/collecting/collecting<?= htmlspecialchars($row['image']) ?>"
                                alt="article">
                        </div>
                        <div class="article__content">
                            <h3 class="article__header">
                                <?= htmlspecialchars($row['title']) ?>
                            </h3>

                            <p class="article__text">
                                <?= htmlspecialchars(mb_substr(strip_tags($row['content']), 0, 300)) ?>
                            </p>
                            <p class="article__text article__text_tablet">
                                <?= htmlspecialchars(mb_substr(strip_tags($row['content']), 0, 200)) ?>
                            </p>
                            <p class="article__text article__text_mobile">
                                <?= htmlspecialchars(mb_substr(strip_tags($row['content']), 0, 100)) ?>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>
        <section class="documents" id="documents">
            <div class="container">
                <h2 class="documents__title title">Документы</h2>
                <div class="document__items">
                    <div class="document__line first__line">
                        <div class="document button"><a href="documents?name=Публичная оферта">Публичная оферта</a>
                        </div>
                        <div class="document button"><a href="documents?name=Публичная оферта соревнований">Публичная
                                оферта соревнований</a></div>
                        <div class="document button"><a href="documents?name=Способы оплаты">Способы оплаты</a></div>
                    </div>
                    <div class="document__line">
                        <div class="document button"><a href="documents?name=Обработка конфиденциальности">Согласие на
                                обработку конфиденциальности
                                данных</a>
                        </div>
                        <div class="document button"><a href="documents?name=Политика конфиденциальности">Политика
                                конфиденциальности</a></div>
                    </div>

                </div>
                <h2 class="documents__title title">Согласие на обработку персональных данных для соревнований</h2>
                <div class="document__items">
                    <div class="document__line">
                        <div class="document button"><a target="_blank" href="documents/согласие18+.pdf">Согласие на
                                обработку персональных данных спортсмена (для лиц
                                старше 18
                                лет)</a></div>
                        <div class="document button">
                            <a target="_blank" href="documents/согласие.pdf">Согласие на обработку персональных данных
                                спортсмена (для лиц
                                младше 18
                                лет)</a>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section class="coaches">
            <div class="container">
                <h2 class="coaches__title title">Наши специалисты</h2>
                <div class="coaches__swiper swiper-container">
                    <div class="swiper-wrapper">
                        <?php while ($row = mysqli_fetch_assoc($coaches)) : ?>
                        <div class="coaches__slide articles__slide swiper-slide">
                            <a href="schedule?name=<?= $row['name'] ?>" class="article__link"></a>
                            <div class="coaches__image articles__image">
                                <img src="/uploads/coaches/<?= htmlspecialchars($row['image']) ?>" alt="avatar">
                            </div>
                            <div class="coaches__content article__content">
                                <h3 class="coaches__header article__header">
                                    <?= htmlspecialchars($row['name']) ?>
                                </h3>
                                <p class="coaches__row">
                                    Опыт работы:<span><?= $row['experience'] ?></span>
                                </p>
                                <p class="coaches__row">
                                    Образование:<span><?= $row['education'] ?></span>
                                </p>
                                <p class="coaches__row achievements">
                                    Спортивные достижения:<span><?= $row['achievements'] ?></span>
                                </p>
                                <div class="coach__leads">
                                    <p>Что ведет:</p>
                                    <div class="coaches__services">
                                        <?php 
                                        $coach_id = $row['id'];
                                        $services = $conn->query("SELECT * FROM coaches__services WHERE coaches_id = $coach_id");
                                        ?>
                                        <?php foreach($services as $service): ?>
                                        <li class="service"><?= $service['service'] ?></li>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>

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
    <script src="/js/checkForm.js"></script>
    <script src="/js/sendForm.js"></script>

</body>

</html>