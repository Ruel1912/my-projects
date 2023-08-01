<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $collect_id = $_GET['id'];
 $collecting = mysqli_fetch_assoc($conn->query("SELECT * FROM collecting WHERE id = $collect_id"));
 $collecting_info = mysqli_fetch_assoc($conn->query("SELECT * FROM collecting__info WHERE collect_id = $collect_id"));
 $collecting_address = $collecting_info['address'];
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
    <meta name="description" content="Тренировочные сборы SmartSwim">
    <meta property="og:title" content="<?= $collecting['title'] ?>">
    <meta property="og:description" content="Тренировочные сборы SmartSwim">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title><?= $collecting['title'] ?></title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="/competitions/competition/competition.css">
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="/components/form.css">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43c7d40c-9664-49e7-8f66-559af6978c14&lang=ru_RU"></script>
    <script>
    var address = "<?=  $collecting_address ?>";
    ymaps.ready(init);

    function init() {
        var geocoder = ymaps.geocode(address);
        geocoder.then(
            function(res) {
                var location = res.geoObjects.get(0).geometry.getCoordinates();
                var map = new ymaps.Map('map', {
                    center: location,
                    zoom: 17,
                    controls: ['zoomControl']
                });

                map.behaviors.disable('scrollZoom');
                var placemark = new ymaps.Placemark(location);
                map.geoObjects.add(placemark);
            },
            function(err) {
                console.error(err);
            }
        );
    }
    </script>

</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="promo">
            <div class="container">
                <h1 class="promo__title title">Сборы</h1>
                <div class="breadcrumbs">
                    <a href="/collecting" class="breadcrumbs__link">Сборы</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e"></path>
                        </svg>
                    </span>
                    <a href="javascript:void(0)"
                        class="breadcrumbs__link breadcrumbs__link_active"><?= $collecting_info['breadcrumb'] ?></a>
                </div>
            </div>
        </section>
        <section class="banner">
            <div class="container">
                <div class="promo__content">
                    <img src="/uploads/collecting/banner/<?= $collecting_info["image"] ?>"
                        alt="<?= $collecting_info["title"] ?>" class="promo__image">
                    <h2 class="promo__title title"><?= $collecting_info["title"] ?></h2>
                    <h3 class="promo__sub-title"><?= $collecting_info["date"] ?> <?= date("Y") ?></h3>
                </div>
            </div>
        </section>
        <section class="participation">
            <?php 
                $participation = $collecting_info['participation'];
                list($age, $experience, $last) = explode('|', $participation);
            ?>
            <div class="container">
                <h1 class="participation__title title">Условия участия</h1>
                <div class="participation__items">
                    <div class="participation__item">
                        <span><?= $age ?></span>
                        <p>возраст</p>
                    </div>
                    <div class="participation__item">
                        <span><?= $experience ?></span>
                        <p>уровень подготовки</p>
                    </div>
                </div>
                <div class="participation__placemark">
                    <span>Успейте записаться на сбор!</span>
                </div>
                <div class="participation__last"><?= $last ?></div>
                <?php if($last != "Мест нет" && $last != "Запись закрыта"): ?>
                <a href="#form" class="participation__link button">Забронировать место</a>
                <?php endif; ?>
            </div>
        </section>
        <!-- <section class="timetable">
            <div class="container">
                <h1 class="timetable__title title">расписание</h1>
                <div class="timetable__items">
                    <div class="timetable__time">
                        <span>7:15</span>
                        <span>8:00</span>
                        <span>10:00</span>
                        <span>12:30</span>
                        <span>14:00</span>
                        <span>16:00</span>
                        <span>18:00</span>
                        <span>19:30</span>
                        <span>20:30</span>



                    </div>
                    <div class="timetable__image">
                        <div> <img src="/images/timetable/pineapple.png" alt="Еда"></div>
                        <div> <img src="/images/timetable/snorkel.png" alt="Тренировка"></div>
                        <div> <img src="/images/timetable/dumbbell.png" alt="Тренажерный зал"></div>
                        <div> <img src="/images/timetable/pineapple.png" alt="Еда"></div>
                        <div> <img src="/images/timetable/clock.png" alt="Часы"></div>
                        <div> <img src="/images/timetable/snorkel.png" alt="Тренировка"></div>
                        <div> <img src="/images/timetable/people.png" alt="Растяжка"></div>
                        <div> <img src="/images/timetable/pineapple.png" alt="Еда"></div>
                        <div> <img src="/images/timetable/clock.png" alt="Растяжка"></div>

                    </div>
                    <div class="timetable__desc">
                        <p>Завтрак</p>
                        <p>Тренировка в бассейне</p>
                        <p>Сухое плавание</p>
                        <p>Обед</p>
                        <p>Отдых</p>
                        <p>Тренировка в бассейне</p>
                        <p>Растяжка для пловцов</p>
                        <p>Ужин</p>
                        <p>Отдых,растяжка, мотивационные, беседы, совместные мероприятия</p>
                    </div>
                </div>
                <h1 class="timetable__title title">расписание</h1>
                <h2 class="timetable__sub-title">тренировки в день заеда и отъезда</h2>
                <div class="timetable__line">
                    <div class="timetable__item">
                        <span>10:00</span>
                        <p>Бассейн</p>
                    </div>
                    <div class="timetable__item">
                        <span>16:00</span>
                        <p>Сухое плавание</p>
                    </div>
                    <div class="timetable__item">
                        <span>17:00</span>
                        <p>Бассейн</p>
                    </div>
                    <div class="timetable__item">
                        <span>20:30</span>
                        <p>Гибкость</p>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="program participation">
            <div class="container">
                <h1 class="participation__title title">Программа сбора</h1>
                <h2 class="program__sub-title">Мы будем уделять внимание:</h2>
                <div class="participation__items">
                    <div class="participation__item">
                        <span>Технике плавания</span>
                    </div>
                    <div class="participation__item">
                        <span>Дыханию</span>
                    </div>
                    <div class="participation__item">
                        <span>Развитию силы</span>
                    </div>
                    <div class="participation__item">
                        <span>Скорости</span>
                    </div>
                </div>

                <div class="participation__last">Отработаем такие важные элементы как СТАРТЫ и
                    ПОВОРОТЫ, проведем контрольные ТЕСТЫ</div>

                <div class="participation__placemark">
                    <span>Каждый день Вас ждет что – то новое, полезное и интересное !</span>
                </div>

                <div class="program__images">
                    <div class="program__image">
                        <img src="/uploads/collecting/example01.jpg" alt="Фото">
                    </div>
                    <div class="program__image">
                        <img src="/uploads/collecting/example02.jpg" alt="Фото">
                    </div>
                    <div class="program__image">
                        <img src="/uploads/collecting/example03.jpg" alt="Фото">
                    </div>
                </div>
            </div>
        </section>
        <section class="map">
            <div id="map" style="height: 600px;">
                <div class="map__marker"><?= $collecting_address ?></div>
            </div>
        </section>
        <section class="price">
            <div class="container">
                <div class="price__content">
                    <h1 class="price__title title">Стоимость сбора <span><?= $collecting_info['price'] ?> ₽</span></h1>
                    <a href="#form" class="button">Записаться</a>
                </div>
            </div>
        </section>
        <section class="include">
            <div class="container">
                <h1 class="include__title title">В стоимость включено:</h1>
                <div class="include__items">
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Тренировки в бассейне и зале</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Мастер-классы</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Тестирование спортсменов</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Индивидуальные рекомендации каждому спортсмену</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Проживание в 2-местных номерах с удобствами</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Посещение бани</span>
                    </div>
                    <div class="include__item">
                        <img src="/images/check.svg" alt="✓">
                        <span>Шведский стол</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="form-box">
            <div class="container" data-where="Сборы. <?= $collecting_info["title"] ?> <?= $collecting_info["date"] ?>">
                <h2 class="form__title title" id="form"><span>Чтобы стать лучше,
                        остался один шаг</span></h2>
                <h3 class="form__sub-title">Заполните форму, мы свяжемся
                    с вами в ближайшее время!</h3>
                <?php require($_SERVER['DOCUMENT_ROOT']."/components/form.php") ?>
            </div>
        </section>

    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/checkForm.js"></script>
    <script src="/js/sendForm.js"></script>
</body>

</html>