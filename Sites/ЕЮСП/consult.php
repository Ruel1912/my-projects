<!DOCTYPE html>
<html lang="ru">
<?php $page = "service" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/service.css">
<link rel="stylesheet" href="/css/main-mobile.css">

<title>Консультация</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="service inter gerb">
            <div class="container">
                <h2 class="title">Консультация <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>
                <div class="service__items">
                    <div class="service__item consult">
                        <div class="service__content">
                            <div class="service__header">
                                <h3>Первичная консультация физического лица/индивидуального предпринимателя по правовым
                                    вопросам в рамках гражданского права с выдачей рекомендаций по их решению</h3>
                            </div>
                            <div class="service__body">
                                <p>На этапе консультации мы разберем Вашу ситуацию и найдем к ней подходящие варианты
                                    решений.</p>
                                <p>Цена: <span>Бесплатно</span></p>
                            </div>
                            <div class="service__footer">
                                <button class="button open-modal" data-modal="service">
                                    <span>Оставить заявку</span> <svg xmlns="http://www.w3.org/2000/svg" width="89"
                                        height="16" fill="none" viewBox="0 0 89 16">
                                        <path fill="#0F73E7"
                                            d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/01.jpg" alt="Консультация">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/calendar.js"></script>
    <script src="/js/select.js"></script>
</body>


</html>