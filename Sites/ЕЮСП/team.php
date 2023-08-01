<!DOCTYPE html>
<html lang="ru">
<?php $page = "home" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/team.css">
<link rel="stylesheet" href="/css/main-mobile.css">
<link rel="stylesheet" href="/css/swiper.css">

<title>Наша команда</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="team inter gerb">
            <div class="container">
                <h2 class="title">Наша команда <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg>
                </h2>
                <div class="team__items">
                    <h3 class="team__title">Руководитель компании</h3>
                    <div class="swiper-container" id="jud">
                        <div class="swiper-wrapper">
                            <div class="team__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Березин В.jpg" alt="Фото руководителя компании">
                                </div>
                                <div class="team__content">
                                    <h3>Березин Виктор Евгеньевич</h3>
                                    <h5>Руководитель компании</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team__items">
                    <h3 class="team__title">Партнеры</h3>
                    <div class="swiper-container" id="partner">
                        <div class="swiper-wrapper">
                            <?php for($i = 0; $i < 2; $i++): ?>
                            <div class="team__item partner__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Данилов Д.jpg" alt="Фото партнера">
                                </div>
                                <div class="team__content">
                                    <h3>Данилов Дмитрий Валерьевич</h3>
                                    <h5>Финансовый управляющий</h5>
                                </div>
                            </div>
                            <div class="team__item partner__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Зинченко М.jpg" alt="Фото партнера">
                                </div>
                                <div class="team__content">
                                    <h3>Зинченко Максим Дмитриевич</h3>
                                    <h5>Юрист по гражданскому праву</h5>
                                </div>
                            </div>
                            <div class="team__item partner__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Пилипчук В.jpg" alt="Фото партнера">
                                </div>
                                <div class="team__content">
                                    <h3>Пилипчук Виталий Сергеевич</h3>
                                    <h5>Юрист по гражданскому праву</h5>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                        <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                fill="none" viewBox="0 0 46 46">
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.75 22.999h34.5m0 0L26.833 9.582M40.25 22.999 26.833 36.415" />
                            </svg></div>
                    </div>
                </div>
                <div class="team__items">
                    <h3 class="team__title">Юридический отдел</h3>
                    <div class="swiper-container" id="jud">
                        <div class="swiper-wrapper">
                            <?php for($i = 0; $i < 2; $i++): ?>
                            <div class="team__item jud__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Медникова А.jpg" alt="Фото регионального руководителя">
                                </div>
                                <div class="team__content">
                                    <h3>Медникова Анна Александровна</h3>
                                    <h5>Региональный руководитель,<br> старший юрист</h5>
                                </div>
                            </div>
                            <div class="team__item jud__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Салюкова О.jpg" alt="Фото юриста">
                                </div>
                                <div class="team__content">
                                    <h3>Салюкова Ольга Борисовна</h3>
                                    <h5>Юрист по банкротству</h5>
                                </div>
                            </div>
                            <div class="team__item jud__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Булкрун О.jpg" alt="Фото юриста">
                                </div>
                                <div class="team__content">
                                    <h3>Булкрун Ольга Сергеевна</h3>
                                    <h5>Юрист по банкротству</h5>
                                </div>
                            </div>
                            <div class="team__item jud__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Галашева С.jpg" alt="Фото юриста">
                                </div>
                                <div class="team__content">
                                    <h3>Галашева Сабина Набиевна</h3>
                                    <h5>Юрист по гражданскому праву</h5>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                        <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                fill="none" viewBox="0 0 46 46">
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.75 22.999h34.5m0 0L26.833 9.582M40.25 22.999 26.833 36.415" />
                            </svg></div>
                    </div>
                </div>
                <div class="team__items">
                    <h3 class="team__title">Правовые эксперты</h3>
                    <div class="swiper-container" id="expert">
                        <div class="swiper-wrapper">
                            <?php for($i = 0; $i < 2; $i++): ?>
                            <div class="team__item expert__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Малыхина А.jpg" alt="Фото эксперта">
                                </div>
                                <div class="team__content">
                                    <h3>Малыхина Александра Вадимовна</h3>
                                    <h5>Финансово - Правовой эксперт</h5>
                                </div>
                            </div>
                            <div class="team__item expert__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Звездина И.jpg" alt="Фото эксперта">
                                </div>
                                <div class="team__content">
                                    <h3>Звездина Инга Валерьевна</h3>
                                    <h5>Финансово - Правовой эксперт</h5>
                                </div>
                            </div>
                            <div class="team__item expert__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Стрекаловская К.jpg" alt="Фото эксперта">
                                </div>
                                <div class="team__content">
                                    <h3>Стрекаловская Ксения Андреевна</h3>
                                    <h5>Финансово - Правовой эксперт</h5>
                                </div>
                            </div>
                            <div class="team__item expert__item swiper-slide">
                                <div class="team__image">
                                    <img src="/images/team/Тураева Ш.jpg" alt="Фото эксперта">
                                </div>
                                <div class="team__content">
                                    <h3>Тураева Шаня Усмоновна</h3>
                                    <h5>Финансово - Правовой эксперт</h5>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"
                                fill="none" viewBox="0 0 46 46">
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.75 22.999h34.5m0 0L26.833 9.582M40.25 22.999 26.833 36.415" />
                            </svg></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/swiper.js"></script>
    <script src="/js/slider.js"></script>
</body>


</html>