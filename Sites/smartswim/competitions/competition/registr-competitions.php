<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $calendar_id = $_GET['id'];
 $competition_calendar = mysqli_fetch_assoc($conn->query("SELECT * FROM competitions__calendar WHERE id = $calendar_id"));
 $competition_id = $competition_calendar['competition_id'];
 $competition = mysqli_fetch_assoc($conn->query("SELECT * FROM competitions WHERE id = $competition_id"));
 $competition_documents = mysqli_fetch_assoc($conn->query("SELECT * FROM competitions__document WHERE competition_calendar_id = $calendar_id"));
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
    <meta property="og:title"
        content="Регистрация с положением <?= $competition['title'] ?> <?= $competition_calendar['marker'] ?>">
    <meta property="og:description" content="Соревнования SmartSwim для детей и взрослых ">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <title>Регистрация с положением <?= $competition['title'] ?> <?= $competition_calendar['marker'] ?></title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="/main/main.css">
    <link rel="stylesheet" media="(max-width: 1200px)" href="/main/main-mobile.css">
    <link rel="stylesheet" href="competition.css">
    <link rel="stylesheet" href="register-competition.css">
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
                    <a href="index.php?url=<?= $competition['title'] ?>"
                        class="breadcrumbs__link"><?= $competition['title'] ?></a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill=" #8e8e8e"></path>
                        </svg>
                    </span>
                    <a href="javascript:void(0)" class="breadcrumbs__link breadcrumbs__link_active">Регистрация</a>
                </div>
                <h2 class="promo__sub-title">Проход на соревнования ТОЛЬКО по справке и Согласии на
                    обработку персональных данных.</h2>
                <a class="promo__link" href="/main/documents?name=Обработка конфиденциальности">
                    Согласие на обработку персональных данных спортсмена
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_36_1081)">
                            <path d="M4.76871 0.5L3 2.26877L8.73123 8L3 13.7312L4.76871 15.5L12.2687 8L4.76871 0.5Z"
                                fill="var(--orange)" />
                        </g>
                        <defs>
                            <clipPath id="clip0_36_1081">
                                <rect width="15" height="15" fill="white" transform="translate(0 0.5)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="about__cards">
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/1.png" alt="Положение">
                        </div>
                        <a href="<?= $competition['regulation'] ?>" class="about__link"></a>
                        <p class="about__text">Положение</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/2.png" alt="Регламент">
                        </div>
                        <?php if(isset($competition_documents['reglament'])): ?>
                        <a href="<?= $competition_documents['reglament'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Регламент</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/3.png" alt="Заявочный протокол">
                        </div>
                        <?php if(isset($competition_documents['app_protocol'])): ?>
                        <a href="<?= $competition_documents['app_protocol'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Заявочный протокол</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/4.png" alt="Стартовый протокол">
                        </div>
                        <?php if(isset($competition_documents['start_protocol'])): ?>
                        <a href="<?= $competition_documents['start_protocol'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Стартовый протокол</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/5.png" alt="Результаты">
                        </div>
                        <?php if(isset($competition_documents['result'])): ?>
                        <a href="<?= $competition_documents['result'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Результаты</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/6.png" alt="Общий зачет">
                        </div>
                        <?php if(isset($competition_documents['com_test'])): ?>
                        <a href="<?= $competition_documents['com_test'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Общий зачет</p>
                    </div>
                    <div class="about__card">
                        <div class="about__image">
                            <img src="/images/registr/7.png" alt="Фото">
                        </div>
                        <?php if(isset($competition_documents['photo'])): ?>
                        <a href="<?= $competition_documents['photo'] ?>" class="about__link"></a>
                        <?php endif; ?>
                        <p class="about__text">Фото</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="info">
            <div class="container">
                <h1 class="info__title promo__title title">Как подать заявку ?</h1>
                <h2 class="info__sub-title">Регистрация участников на соревнования:</h2>
                <ul class="info__list">
                    <li>открывается не менее чем за 21 календарный день до начала соревнований;</li>
                    <li>закрывается не менее чем за 3 календарных дня до начала соревнований.</li>
                </ul>
            </div>
        </section>
        <section class="faq">
            <div class="container">
                <div class="faq__items">
                    <div class="faq__item">
                        <div class="faq__accordions">
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Личное участие</p>
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
                                    <ol>
                                        <li>Заполнить форму регистрации.</li>
                                        <li>Выбрать количество дистанций: максимальное количество 3.</li>
                                        <li>Загрузить в форму регистрации документы для допуска на соревнование.</li>
                                        <li>Оплатить.</li>
                                    </ol>
                                    <br>
                                    <ul>
                                        <li>
                                            В случае отсутствия документа(ов) для допуска на соревнование, можно дослать
                                            на почту <a href="mailto:SmartSwimCup@yandex.ru">SmartSwimCup@yandex.ru</a>
                                        </li>
                                    </ul>
                                    <br>
                                    Остались вопросы? В разделе <a
                                        href="index.php?url=<?= $competition['title'] ?>#faq">Часто задаваемые
                                        вопросы</a>
                                    можно найти
                                    ответы почти на все
                                    вопросы.
                                    <br><br>
                                    Не нашли ответа на свой вопрос? Напишите <a
                                        href="mailto:SmartSwimCup@yandex.ru">нам</a> или свяжитесь с нами <a
                                        href="tel:+7 977 419 86 30">+7 977 419 86 30</a>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Групповое участие</p>
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
                                    <ol>
                                        <li>Заполнить заявку. ЗАЯВКА ПРИНИМАЕТСЯ ТОЛЬКО В ФОРМАТЕ WORD.</li>
                                        <li>Если есть участники, которые принимают участие как в 2, так в 3 дистанциях,
                                            заполнить 2 заявки - одна форма для участников 1 или 2 дистанции, вторая -
                                            для
                                            участников 3 дистанции.</li>
                                        <li>Загрузить в форму регистрации заявку, в формате WORD, и документы для
                                            допуска на
                                            соревнование.</li>
                                        <li>Оплатить, выбрав количество участников, нажав "плюс".</li>
                                    </ol>
                                    <br>
                                    <ul>
                                        <li>
                                            В случае отсутствия документа(ов) для допуска на соревнование, можно дослать
                                            на почту <a href="mailto:SmartSwimCup@yandex.ru">SmartSwimCup@yandex.ru</a>
                                        </li>
                                    </ul>
                                    <br>
                                    Остались вопросы? В разделе <a
                                        href="index.php?url=<?= $competition['title'] ?>#faq">Часто задаваемые
                                        вопросы</a>
                                    можно найти
                                    ответы почти на все
                                    вопросы.
                                    <br><br>
                                    Не нашли ответа на свой вопрос? Напишите <a
                                        href="mailto:SmartSwimCup@yandex.ru">нам</a> или свяжитесь с нами <a
                                        href="tel:+7 977 419 86 30">+7 977 419 86 30</a>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__header">
                                    <p class="accordion__title">Эстафета</p>
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
                                    Регламент проведения комбинированной смешанной эстафеты 4 по 50 м:
                                    <br><br>
                                    Четыре участника команды поочерёдно плывут дистанцию разным стилем.
                                    <br>
                                    Порядок комбинированной эстафеты:
                                    <ul>
                                        <li>50 м на спине</li>
                                        <li>50 м брасс</li>
                                        <li>50 м баттерфляй</li>
                                        <li>50 м вольный стиль</li>
                                    </ul>
                                    <br><br>
                                    В составе эстафеты должно быть 2 девушки и 2 юноши.
                                    <br><br>
                                    Возраст спортсменов
                                    <ul>
                                        <li>2013- 2010 г.р.</li>
                                        <li>2009 - 2004 г.р.</li>
                                    </ul>
                                    <br><br>
                                    Бланк заявки с фамилиями спортсмена подаётся в секретариат не позднее начала
                                    соревнований/ сессии.
                                    <br><br>
                                    Для предварительной заявки необходимо заполнить
                                    <ol>
                                        <li>Название команды - поле СПОРТКЛУБ</li>
                                        <li>Заявочное время</li>
                                        <li>Email</li>
                                        <li>Телефон</li>
                                    </ol>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>