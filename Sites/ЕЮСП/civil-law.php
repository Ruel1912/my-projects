<!DOCTYPE html>
<html lang="ru">
<?php $page = "service" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/service.css">
<link rel="stylesheet" href="/css/main-mobile.css">

<title>Услуги по гражданскому праву</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="service inter civil">
            <div class="container">
                <h2 class="title">
                    <p>Услуги по <span></span> праву</p> <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg>
                </h2>
                <div class="filter">
                    <div class="close-filter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 36 36">
                            <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="m7.5 7.5 21 21m-21 0 21-21"></path>
                        </svg>
                    </div>
                    <span data-id="civil" class="filter__item">Гражданское</span>
                    <span data-id="housing" class="filter__item">Жилищное</span>
                    <span data-id="pension" class="filter__item">Пенсионное</span>
                    <span data-id="family" class="filter__item">Семейное</span>
                    <span data-id="labor" class="filter__item">Трудовое</span>
                </div>
                <div class="filter-mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="none" viewBox="0 0 29 29">
                        <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                            stroke-width="1.5"
                            d="M9.86 8.035h9.268c.773 0 1.402.628 1.402 1.402v1.546c0 .568-.35 1.27-.701 1.62l-3.02 2.67c-.424.35-.702 1.051-.702 1.62v3.02c0 .423-.278.979-.628 1.196l-.979.617c-.918.568-2.175-.073-2.175-1.197v-3.721c0-.496-.278-1.124-.568-1.474l-2.67-2.816c-.35-.338-.628-.979-.628-1.402V9.51c0-.846.628-1.474 1.401-1.474Z" />
                        <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.875 26.583h7.25c6.041 0 8.458-2.417 8.458-8.459v-7.25c0-6.041-2.416-8.458-8.458-8.458h-7.25c-6.042 0-8.459 2.417-8.459 8.458v7.25c0 6.042 2.417 8.459 8.459 8.459Z" />
                    </svg>
                    <p>Фильтр</p>
                </div>
                <div class="service__items">
                    <div class="service__item" id="civil">
                        <div class="service__content">
                            <div class="service__header">
                                <h4>Гражданское</h4>
                                <p>Мы помогаем в решении следующих вопросов:</p>
                            </div>
                            <div class="service__body">
                                <ul class="service__list">
                                    <li>
                                        <p>Подготавливаем договоры купли-продажи, залога, мены и пр.;</p>
                                    </li>
                                    <li>
                                        <p>Решаем вопросы по наследственному праву;</p>
                                    </li>
                                    <li>
                                        <p>Проводим правовую оценку договоров;</p>
                                    </li>
                                    <li>
                                        <p>Ведем претензионную работу;</p>
                                    </li>
                                    <li>
                                        <p>Занимаемся иными работами.</p>
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
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/08.jpg" alt="Гражданское право">
                        </div>
                    </div>
                    <div class="service__item" id="housing">
                        <div class="service__content">
                            <div class="service__header">
                                <h4>Жилищное</h4>
                                <p>Мы помогаем в решении следующих вопросов:</p>
                            </div>
                            <div class="service__body">
                                <ul class="service__list">
                                    <li>
                                        <p>Подготавливаем договора купли- продажи объекта (-ов) недвижимости;</p>
                                    </li>
                                    <li>
                                        <p>Пишем претензии по оказанию услуг ненадлежащего качества, не оказания услуг
                                            ЖКХ;</p>
                                    </li>
                                    <li>
                                        <p>Занимаемся иными вопросами.</p>
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
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/09.jpg" alt="Жлищное право">
                        </div>
                    </div>
                    <div class="service__item" id="pension">
                        <div class="service__content">
                            <div class="service__header">
                                <h4>Пенсионное</h4>
                                <p>Мы помогаем в решении следующих вопросов по:</p>
                            </div>
                            <div class="service__body">
                                <ul class="service__list">
                                    <li>
                                        <p>Взысканию оплаты проезда к месту отдыха и обратно;</p>
                                    </li>
                                    <li>
                                        <p>Перерасчёту стажа;</p>
                                    </li>
                                    <li>
                                        <p>Включению в стаж;</p>
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
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/10.jpg" alt="Пенсинное право">
                        </div>
                    </div>
                    <div class="service__item" id="family">
                        <div class="service__content">
                            <div class="service__header">
                                <h4>Семейное</h4>
                                <p>Мы помогаем в решении следующих вопросов по:</p>
                            </div>
                            <div class="service__body">
                                <ul class="service__list">
                                    <li>
                                        <p>Расторжению брака;</p>
                                    </li>
                                    <li>
                                        <p>Разделу совместно нажитого имущества;</p>
                                    </li>
                                    <li>
                                        <p>Взысканию алиментов: на содержание детей, супруга, нетрудоспособных
                                            родителей;</p>
                                    </li>
                                    <li>
                                        <p>Другим сиутациям.</p>
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
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/11.jpg" alt="Семейное право">
                        </div>
                    </div>
                    <div class="service__item" id="labor">
                        <div class="service__content">
                            <div class="service__header">
                                <h4>Трудовое</h4>
                                <p>Мы помогаем в решении следующих вопросов:</p>
                            </div>
                            <div class="service__body">
                                <ul class="service__list">
                                    <li>
                                        <p>Занимаемся анализом трудовых договоров;</p>
                                    </li>
                                    <li>
                                        <p>Вещаем вопросы по взысканию задолженности по заработной плате; </p>
                                    </li>
                                    <li>
                                        <p>Занимаемся иными вопросами.</p>
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
                            </div>
                        </div>
                        <div class="service__image">
                            <img src="/images/sevice/12.jpg" alt="Трудовое право">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/filter.js"></script>
    <script src="/js/calendar.js"></script>
    <script src="/js/select.js"></script>
</body>


</html>