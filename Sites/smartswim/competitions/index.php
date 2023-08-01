<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $competitions = $conn->query("SELECT * FROM competitions");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
    <meta name="description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:url" content="https://smartswim.ru/competitions">
    <meta property="og:title" content="Соревнования по плаванию">
    <meta property="og:description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title>Соревнования по плаванию</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="competitions.css">

</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="promo">
            <div class="container">
                <h1 class="promo__title title">Соревнования</h1>
                <div class="breadcrumbs">
                    <a href="/main" class="breadcrumbs__link">Главная</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e"></path>
                        </svg>
                    </span>
                    <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">Соревнования</a>
                </div>
                <div class="promo__items">
                    <?php while ($competition = mysqli_fetch_assoc($competitions)) : ?>
                    <div class="promo__item">
                        <img src="/uploads/competitions/<?= $competition["image"] ?>" alt="<?= $competition["title"] ?>"
                            class="promo__image">
                        <h2 class="promo__item_title"><?= $competition["title"] ?></h2>
                        <h3 class="promo__sub-title"><?= $competition["sub-title"] ?></h3>
                        <a class="promo__link" href="competition/?url=<?= $competition["url"] ?>">Далее</a>
                    </div>
                    <?php endwhile; ?>
                    <div class="promo__item">
                        <img src="/images/competitions01.jpg" alt="Итоги прошедшиих соревнований" class="promo__image">
                        <h2 class="promo__item_title">Итоги прошедшиих соревнований</h2>
                        <a class="promo__link" href="competition/last-competition.php">Далее</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>