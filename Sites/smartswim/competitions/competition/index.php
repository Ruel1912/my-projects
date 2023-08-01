<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $competition_name = $_GET['url'];
 $year = date("Y");
$competitions = $conn->query("SELECT * FROM competitions WHERE url = '$competition_name'"); 
$competition_address = mysqli_fetch_assoc($competitions)['address'];
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
    <meta property="og:title" content="Соревнования по плаванию <?= ucfirst($competition_name) ?>">
    <meta name="description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title>Соревнования по плаванию <?= ucfirst($competition_name) ?></title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43c7d40c-9664-49e7-8f66-559af6978c14&lang=ru_RU"></script>
    <script>
    var address = "<?= $competition_address ?>";
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
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="competition.css">
    <link rel="stylesheet" href="/components/form.css">
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
                    <a href="javascript:void(0)"
                        class="breadcrumbs__link breadcrumbs__link_active"><?= $competition_name ?> <?= $year ?></a>
                </div>
            </div>
        </section>
        <?php foreach($competitions as $competition): ?>
        <section class="banner">
            <div class="container">
                <div class="promo__content">
                    <img src="/uploads/competitions/<?= $competition["image"] ?>" alt="<?= $competition["title"] ?>"
                        class="promo__image">
                    <h3 class="promo__prev-title"><?= $competition["prev-title"] ?></h3>
                    <h2 class="promo__title title"><?= $competition["url"] ?> <?= $year ?></h2>
                    <h3 class="promo__sub-title"><?= $competition["description"] ?></h3>
                </div>
            </div>
        </section>
        <section class="calendar">
            <div class="container">
                <h2 class="calendar__title title">Календарь соревнований</h2>
                <?php
                    $competition_id = $competition['id'];
                    $competitions_dates = $conn->query("SELECT * FROM competitions__calendar WHERE competition_id = $competition_id AND year_id = $year");
                 ?>
                <div class="calendar__items">
                    <?php foreach($competitions_dates as $competitions_date): ?>
                    <div class="calendar__item">
                        <img src="/uploads/competitions/<?= $competition["image"] ?>" alt="<?= $competition["title"] ?>"
                            class="promo__image">
                        <div class="calendar__item__header">
                            <span><?= $competitions_date['marker'] ?></span>
                            <a href="registr-competitions.php?id=<?= $competitions_date['id'] ?>">
                                Подробнее
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_36_1081)">
                                        <path
                                            d="M4.76871 0.5L3 2.26877L8.73123 8L3 13.7312L4.76871 15.5L12.2687 8L4.76871 0.5Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_36_1081">
                                            <rect width="15" height="15" fill="white" transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <?php
                            $competition_calendar_id = $competitions_date['id'];
                            $competition_lists = $conn->query("SELECT * FROM competitions__list WHERE calendar_id = $competition_calendar_id"); 
                        ?>
                        <div class="calendar__item__body">
                            <div class="calendar__item_distance">
                                <?php foreach($competition_lists as $competition_list): ?>
                                <?php if(isset($competition_list['distance'])): ?>
                                <span><?= $competition_list['distance'] ?></span>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="calendar__item_description">
                                <?php foreach($competition_lists as $competition_list): ?>
                                <?php if(isset($competition_list['description'])): ?>
                                <span><?= $competition_list['description'] ?></span>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php if(isset($competition_list['line'])): ?>
                        <p class="calendar__line"><?= $competition_list['line'] ?></p>
                        <?php endif; ?>
                        <div class="calendar__item__footer">
                            <span><?= $competitions_date['date'] ?> <?= $competitions_date['year_id'] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="map">
            <h2 class="map__title title">Место проведения соревнований</h2>
            <div id="map" style="height: 600px;">
                <div class="map__marker"><?= $competition_address ?></div>
            </div>
        </section>
        <section class="faq" id="faq">
            <div class="container">
                <h2 class="faq__title title">Часто задаваемые вопросы по соревнованиям</h2>
                <div class="faq__items">
                    <div class="faq__item">
                        <h3 class="faq__item__title">Общие вопросы</h3>
                        <div class="faq__accordions">
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Как подать заявку на соревнования?</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Прием заявок начинается за тридцать дней до старта предстоящего этапа. Заявки
                                    подаются как Лично, так и Групповые. Для допуска на соревнование необходимо
                                    направить документы:
                                    <br><br>
                                    <ul>
                                        <li>паспорт или свидетельство о рождении;</li>
                                        <li>Медицинскую заявку, заверенную печатью физкультурного диспансера и подписью
                                            врача,
                                            подписью представителя команды или медицинскую справку о допуске к
                                            соревнованиям,
                                            подписанную врачом по лечебной физкультуре или врачом по спортивной медицине
                                            и
                                            заверенная печатью медицинской организации, если спортсмен заявлен лично;
                                        </li>
                                        <li> действующий страховой полис на спортсмена, покрывающий события, которые
                                            могут
                                            возникнуть при участии в соревнованиях по плаванию;</li>
                                        <li>Согласие на обработку персональных данных спортсмена для соревнований.
                                            Скачать можно
                                            в разделе ДОКУМЕНТЫ.</li>
                                    </ul>
                                    <br>
                                    Документы для допуска на соревнование, можно дослать на почту
                                    <a href="mailto:SmartSwimCup@yandex.ru.">SmartSwimCup@yandex.ru.</a>
                                    <br><br>
                                    Заявка Личное участие:
                                    <ol>
                                        <li>Заполнить форму регистрации.</li>
                                        <li>Выбрать количество дистанций: максимальное количество 3.</li>
                                        <li>Загрузить в форму регистрации документы для допуска на соревнование.</li>
                                        <li>Оплатить.</li>
                                    </ol>
                                    <br>
                                    В случае отсутствия документа / ов для допуска на соревнование, можно дослать на
                                    почту <a href="mailto:SmartSwimCup@yandex.ru.">SmartSwimCup@yandex.ru.</a>
                                    <br><br>
                                    Заявка Групповое участие:
                                    <ol>
                                        <li>Заполнить <a href="#form">заявку</a>. ЗАЯВКА ПРИНИМАЕТСЯ ТОЛЬКО В ФОРМАТЕ
                                            WORD.
                                        </li>
                                        <li>Если есть участники, которые принимают участие как в 2, так в 3 дистанциях,
                                            заполнить 2 <a href="#form">заявки</a> - одна форма для участников 1 или 2
                                            дистанции,
                                            вторая -
                                            для
                                            участников 3 дистанции.</li>
                                        <li>Загрузить в форму регистрации заявку, в формате WORD, и документы для
                                            допуска на
                                            соревнование.</li>
                                        <li>Оплатить, выбрав количество участников, нажав "плюс".</li>
                                    </ol>
                                    <br>
                                    В случае отсутствия документа / ов для допуска на соревнование, можно дослать на
                                    почту <a href="mailto:SmartSwimCup@yandex.ru.">SmartSwimCup@yandex.ru.</a>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Можно скорректировать заявку после ее принятия?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Изменение данных возможно до окончания приема заявок, т.е. за 7 (семь) дней до
                                    начала соревнования.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Когда и как осуществляется проход участников на
                                        соревнования?</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Проход на соревнования осуществляется за 15 минут до начала разминки, согласно
                                    положению соревнований. Время может быть изменено. <br><br>

                                    Проход участников на соревнование осуществляется при предъявлении ТОЛЬКО ОРИГИНАЛА
                                    медицинской заявки/медицинскую справку или КОПИЮ справки из диспансера и Согласии на
                                    обработку персональных данных.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Как осуществляется проход зрителей?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Соревнования проводятся - БЕЗ ЗРИТЕЛЕЙ
                                    <br><br>
                                    В холл спортивного комплекса допускаются ТОЛЬКО спортсмены-участники, при
                                    предъявлении ОРИГИНАЛА МЕДИЦИНСКОЙ СПРАВКИ, и представители команд, если заявка
                                    групповая. <br>
                                    Вход в спорткомплекс ТОЛЬКО в средствах индивидуальной защиты (маска и перчатки).
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Я могу пройти с ребенком / детьми вместе?
                                        Он/ они впервые принимают участие в соревнованиях.
                                        Ребенок / дети заплыв не пропустит(ят)</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Пройти с ребенком / детьми нельзя, т.к. соревнования проходят без зрителей.
                                    <br><br>
                                    Если спортсмен впервые принимает участие в соревнованиях, а также, чтобы не
                                    пропустить свой заплыв, следует:
                                    <br><br>
                                    <ul>
                                        <li>Заранее ознакомиться и найти себя в Стартовом протоколе, в котором указан
                                            номер
                                            заплыва и дорожки. Протокол также размещается в местах проведения
                                            Соревнования;
                                        </li>
                                        <li>На Соревновании найти место формирование заплывов;
                                        </li>
                                        <li>На месте формирования заплывов следовать указаниям Судьи, который вызывает
                                            участников на заплыв.</li>
                                        <li>В случае пропуска своего заплыва участнику может обратиться к Судьям или
                                            секретариат.</li>
                                    </ul>
                                    <br><br>
                                    Главное! Одной из целью Соревнования является приобретение спортсменами
                                    соревновательного опыта, а также повышение спортивного мастерства. В случае неудачи,
                                    а неудачи бывают у всех, разрушенных надежд, невыполнения разряда и тому подобное,
                                    сделать анализ над ошибками и работать дальше.
                                    <br><br>
                                    ПЛАВАНИЕ ЛЮБИТ ЦЕЛЕУСТРЕМЛЕННЫХ!
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Где оставить ценные вещи?</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Организаторы Соревнования и администрация спортивного комплекса не несут
                                    ответственности за ценные вещи, поэтому мы советуем оставить у представителя
                                    участника соревнования, то чем вы дорожите.

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">
                        <h3 class="faq__item__title">Документы. Протоколы. Разряд.</h3>
                        <div class="faq__accordions">
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Есть оригинал справки (мед допуска) хранится в
                                        спортшколе,
                                        можно принести копию?</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Можно.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Как выглядит справка для участия в соревнованиях и что
                                        в ней должно быть указано?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Примеры справок: если лично, <a href="">Справка</a>, если из спортшколы, <a
                                        href="">Справка СШ</a>.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Где и когда можно посмотреть Положение, Регламент о
                                        соревнованиях, Заявочный, Стартовый и Итоговый протоколы?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Всю информацию можно найти на странице Соревнования <a
                                        href="./index.php?url=smartSwimCup">SmartSwimCup</a>
                                    <br><br>
                                    <ul>
                                        <li>Заявочный протокол публикуется за 3 (три) дня до начала соревнования.</li>
                                        <li>Стартовый протокол публикуется за 8 (восемь) часов до начала соревнования.
                                        </li>
                                        <li>Итоговый протокол публикуется после окончания соревнования в этот же день.
                                            Общие</li>
                                    </ul>
                                    <br><br>
                                    Итоговые протоколы можно посмотреть в разделе “Прошедшие соревнования”.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Возможно ли довести документы непосредственно
                                        на соревнования?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Нет.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Если спортсмен заявлен вольным стилем, можно проплыть
                                        другим стилем плавания?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Согласно Положению / Регламента Квалификационного Первенствапо плаванию - на
                                    дистанциях вольным стилем пловцу разрешается плыть любыми способами.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Если в Программе соревнования есть дистанция, например
                                        50 м вольный стиль, участник проплыл, например, на
                                        спине и выполнил разряд, ему присвоят разряд в соответствии
                                        с нормативами на спине?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Нет.Разряд будет присвоен в соответствии с Программой соревнования, т.е. в
                                    соответствии с нормативами вольного стиля.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">
                        <h3 class="faq__item__title">Оплата. Сроки. Возврат.</h3>
                        <div class="faq__accordions">
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Оплата Стартового взноса за каждую дистанцию?</p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Принять участие можно в 2 или 3 дистанциях.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Можно сделать возврат Стартового взноса?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">

                                    Да, можно.
                                    <br><br>
                                    Возврат стартового взноса осуществляется до публикации Заявочного протокола.
                                    Информацию направить на электронную почту SmartSwimCup@yandex.ru:
                                    <br><br>
                                    <ul>
                                        <li>Заявление на возврат;</li>
                                        <li>Скан паспорта (2-я страница с разворотом);</li>
                                        <li>Документальное подтверждение.</li>
                                    </ul>
                                    <br><br>
                                    Сумма возврата стартового взноса осуществляется за вычетом понесенных расходов
                                    организатором. Возврат осуществляется в течении 30 дней с момента подачи заявления.
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Можно перенести Стартовый взнос на следующее
                                        Соревнование ?
                                    </p>
                                    <div class="accordion__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            viewBox="0 0 50 50" fill="none">
                                            <circle cx="25" cy="25" r="24.5" stroke="white" />
                                            <path
                                                d="M11.666 23.1569H22.9979V11.666H26.3342V23.1569H37.666V26.1222H26.3342V37.666H22.9979V26.1222H11.666V23.1569Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__content">
                                    Да, можно.
                                    <br><br>
                                    Стартовый взнос можно перенести на другую дату соревнования не позднее публикации
                                    Заявочного протокола. Стартовый взнос должен быть реализован в период действующего
                                    текущего Положения / Регламента.
                                    <br><br>
                                    Перенести можно 1 (один) раз.
                                    <br><br>
                                    P.S. Крайний срок переноса Стартового взноса - предпоследний этап соревнований,
                                    действующего текущего Положения / Регламента.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endforeach; ?>
        <section class="form-box">
            <div class="container" data-where="Соревнования <?= $competition_name ?>">
                <h2 class="form__title title" id="form"><span>Остались вопросы?</span></h2>
                <h3 class="form__sub-title">Заполните форму, мы свяжемся
                    с вами в ближайшее время!</h3>
                <?php require($_SERVER['DOCUMENT_ROOT']."/components/form.php") ?>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/sendForm.js"></script>
    <script src="/js/checkForm.js"></script>

</body>

</html>