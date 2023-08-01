<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    $name = $_GET['name'];
    $schedule = $conn->query("SELECT * FROM coaches__schedule WHERE name = '$name'");
    $names = $conn->query("SELECT DISTINCT name FROM coaches__schedule ORDER BY name");
    $services = $conn->query("SELECT DISTINCT service FROM coaches__schedule ORDER BY service");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/favicon/site.webmanifest" />
    <title>Расписание специалиста</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="schedule.css">
    <link rel="stylesheet" href="/components/form.css">

</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="schedule">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="/main" class="breadcrumbs__link">Главная</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e" />
                        </svg>
                    </span>
                    <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active"><?= $name ?></a>
                </div>

            </div>
        </section>
        <section class="banner">Расписание специалиста</section>
        <section class="schedule-table">
            <div class="container">
                <?php if(mysqli_num_rows($schedule)): ?>
                <div class="table__control">
                    <div class="accordion age">
                        <div class="accordion__header">
                            <p data-default="Любой возраст" class="accordion__title"></p>
                            <span class="accordion__arrow"> &#9660;</span>
                        </div>
                        <div class="accordion__content">
                            <span class="accordion__title selected" data-value="">Любой возраст</span>
                            <span class="accordion__title" data-value="4-5">4-5 лет</span>
                            <span class="accordion__title" data-value="6-7">6-7 лет</span>
                            <span class="accordion__title" data-value="8-9">8-9 лет</span>
                            <span class="accordion__title" data-value="10-11">10-11 лет</span>
                            <span class="accordion__title" data-value="12-13">12-13 лет</span>
                            <span class="accordion__title" data-value="14-15">14-15 лет</span>
                            <span class="accordion__title" data-value="16-17">16-17 лет</span>
                            <span class="accordion__title" data-value="18">18 лет и старше</span>
                        </div>
                    </div>
                    <div class="accordion name">
                        <div class="accordion__header">
                            <p data-default="Любой специалист" class="accordion__title"></p>
                            <span class="accordion__arrow"> &#9660;</span>
                        </div>
                        <div class="accordion__content">
                            <span class="accordion__title selected" data-value="">Любой специалист</span>
                            <?php foreach($names as $name): ?>
                            <span class="accordion__title" data-value="<?= $name['name'] ?>"><?= $name['name'] ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="accordion day">
                        <div class="accordion__header">
                            <p data-default="Любой день" class="accordion__title"></p>
                            <span class="accordion__arrow"> &#9660;</span>
                        </div>
                        <div class="accordion__content">
                            <span class="accordion__title selected" data-value="">Любой день</span>
                            <span class="accordion__title" data-value="Пн">Понедельник</span>
                            <span class="accordion__title" data-value="Вт">Вторник</span>
                            <span class="accordion__title" data-value="Ср">Среда</span>
                            <span class="accordion__title" data-value="Чт">Четверг</span>
                            <span class="accordion__title" data-value="Пт">Пятница</span>
                            <span class="accordion__title" data-value="Сб">Суббота</span>
                            <span class="accordion__title" data-value="Вс">Воскресенье</span>
                        </div>
                    </div>
                    <div class="accordion service">
                        <div class="accordion__header">
                            <p data-default="Любая программа" class="accordion__title"></p>
                            <span class="accordion__arrow"> &#9660;</span>
                        </div>
                        <div class="accordion__content">
                            <span class="accordion__title selected" data-value="">Любая программа</span>
                            <?php foreach($services as $service): ?>
                            <span class="accordion__title"
                                data-value="<?= $service['service'] ?>"><?= $service['service'] ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="table__reset">&#10006;</button>
                </div>
                <div class="table" id="table-coaches">
                    <div class="table__header">
                        <div>Специалист</div>
                        <div>Группа</div>
                        <div>Услуга</div>
                        <div>Возраст</div>
                        <div>День, время</div>
                    </div>
                    <?php while ($row = mysqli_fetch_assoc($schedule)) : ?>
                    <div class="table__row">
                        <div><?= $row['name']?></div>
                        <div><?= $row['team']?></div>
                        <div><?= $row['service']?></div>
                        <div><?= $row['age']?> лет</div>
                        <div>
                            <span><?= $row['day']?></span>
                            <span><?= $row['time']?></span>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <p align="center"><b>Нет информации о расписании тренера</b></p>
                <?php endif; ?>

            </div>
        </section>
        <section class="form-box">
            <div class="container" data-where="Расписание">
                <h2 class="form__title title">Для записи на тренировку <span>заполните форму</span></h2>
                <?php require($_SERVER['DOCUMENT_ROOT']."/components/form.php") ?>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/sendForm.js"></script>
    <script src="/js/checkForm.js"></script>
    <script src="filter.js"></script>
</body>

</html>