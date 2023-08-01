<!DOCTYPE html>
<html lang="ru">
<?php $page = "service" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/service.css">
<link rel="stylesheet" href="/css/main-mobile.css">

<title>Банкротство</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="service inter gerb">
            <div class="container">
                <h2 class="title">банкротство <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>
                <div class="service__items">
                    <div class="service__item" id="mfc">
                        <div class="service__content">
                            <div class="service__header">
                                <h3>Упрощенное банкротство через МФЦ*</h3>
                            </div>
                            <div class="service__body">
                                <p>Внесудебное банкротство – списание долга через МФЦ без участия суда.</p>
                                <h4>Данная услуга подходит, если:</h4>
                                <ul class="service__list">
                                    <li>
                                        <p>Ваша сумма долга от 50 000 руб. до 500 000 руб.;</p>
                                    </li>
                                    <li>
                                        <p>Есть хотя бы одно оконченное исполнительное производство на основании 229-ФЗ
                                            «Об исполнительном производстве» <br> по п. 4 ч. 1 ст. 46;</p>
                                    </li>
                                    <li>
                                        <p>Нет открытых исполнительных производств;</p>
                                    </li>
                                    <li>
                                        <p>Нет имущества, подлежащего обязательной государственной регистрации, кроме
                                            единственного жилья;</p>
                                    </li>
                                    <li>
                                        <p>Отсутствует доход, либо доход ниже прожиточного минимума по категории
                                            физических лиц в регионе регистрации.</p>
                                    </li>
                                </ul>





                            </div>
                            <div class="service__footer">
                                <button class="button open-modal" data-modal="service">
                                    <span>Оставить заявку</span> <svg xmlns="http://www.w3.org/2000/svg" width="89"
                                        height="16" fill="none" viewBox="0 0 89 16">
                                        <path fill="#0F73E7"
                                            d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z" />
                                    </svg>
                                </button>
                                <p class="service__notice">*Доход рассматривается за 3 месяца. Пенсионеры попадают под
                                    данную процедуру, если сумма пенсионных и иных выплат менее прожиточного минимума
                                </p>
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/02.jpg" alt="Банкротство через МФЦ">
                        </div>
                    </div>
                    <div class="service__item" id="jud">
                        <div class="service__content">
                            <div class="service__header">
                                <h3>Судебное банкротство</h3>
                            </div>
                            <div class="service__body">
                                <p>Судебное банкротство – процедура признания арбитражным судом исполнять финансовые
                                    обязательства и вести расчеты с кредиторами.</p>
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
                            <img src="/images/sevice/03.jpg" alt="Судебное банкротство">
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