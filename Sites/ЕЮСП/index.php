<!DOCTYPE html>
<html lang="ru">
<?php $page = "home" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/swiper.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/main-mobile.css">
<title>Единая юридическая служба помощи</title>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const welcomeBanner = document.getElementById('welcome-banner');
    if (!localStorage.getItem('functionExecuted')) {
        welcomeBanner.classList.add('show-banner');
        const body = document.body;
        body.classList.add("hidden");
        setTimeout(() => {
            welcomeBanner.classList.remove('show-banner');
            body.classList.remove("hidden");
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }, 2000);
        localStorage.setItem('functionExecuted', 'true');
    }
})
</script>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="promo">
            <div class="swiper-container" id="autoplay-slider">
                <div class="swiper-wrapper">
                    <?php $bannerNumber = (date('n') - 1) % 3 + 1; ?>
                    <?php if($bannerNumber == 1): ?>
                    <div class="swiper-slide">
                        <div class="banners banner1-1 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Банкротство <br> «под ключ»</h1>
                                        <h3 class="promo__sub-title">Судебное и через МФЦ.</h3>
                                        <button class="button promo__button button_white open-modal"
                                            data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="#fff"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img src="/images/banner/promo1-1-decor.png" alt="декор">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner1-2 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Списание долгов <br> «под ключ»</h1>
                                        <h3 class="promo__sub-title">Решение любых правовых вопросах во всех отраслях
                                            права</h3>
                                        <button class="button promo__button button_white open-modal"
                                            data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="#fff"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner1-3 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Списание долгов <br> «под ключ»</h1>
                                        <h3 class="promo__sub-title">Решение любых правовых вопросах во всех отраслях
                                            права</h3>
                                        <button class="button promo__button button_white open-modal"
                                            data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="#fff"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif($bannerNumber == 2): ?>
                    <div class="swiper-slide">
                        <div class="banners banner2-1 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <img src="/images/banner/promo2-1-decor.svg" alt="декор">
                                    <div class="promo__info">
                                        <h1 class="promo__title">10.000 рублей <br> в подарок</h1>
                                        <h3 class="promo__sub-title">Приведи друга и получи 10.000 рублей на списание
                                            долгов</h3>
                                        <button class="button promo__button open-modal" data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="var(--primary)"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner2-2 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">10.000 рублей <br> в подарок</h1>
                                        <h3 class="promo__sub-title">Приведи друга и получи 10.000 рублей на списание
                                            долгов</h3>
                                        <button class="button promo__button button_white open-modal"
                                            data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="#fff"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img src="/images/banner/promo2-2-decor.png" alt="декор">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner2-3 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <img src="/images/banner/promo2-3.jpg" alt="декор">
                                    <div class="promo__info">
                                        <h1 class="promo__title">10.000 рублей <br> в подарок</h1>
                                        <h3 class="promo__sub-title">Приведи друга и получи 10.000 рублей на списание
                                            долгов</h3>
                                        <button class="button promo__button button_white open-modal"
                                            data-modal="main"><span>Оставить
                                                заявку</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="#fff"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif($bannerNumber == 3): ?>
                    <div class="swiper-slide">
                        <div class="banners banner3-1 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Бесплатная <br> консультация</h1>
                                        <h3 class="promo__sub-title">Не знаете с чего начать? На бесплатной консультации
                                            ответим на все вопросы абсолютно бесплатно</h3>
                                        <button class="button promo__button open-modal"
                                            data-modal="main"><span>Узнать</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="var(--primary)"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img src="/images/banner/promo3-1-decor.png" alt="декор">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner3-2 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Бесплатная <br> консультация</h1>
                                        <h3 class="promo__sub-title">Не знаете с чего начать? На бесплатной консультации
                                            ответим на все вопросы абсолютно бесплатно</h3>
                                        <button class="button promo__button open-modal"
                                            data-modal="main"><span>Узнать</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="var(--primary)"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banners banner3-3 inter">
                            <div class="container">
                                <div class="promo__inner">
                                    <div class="promo__info">
                                        <h1 class="promo__title">Бесплатная <br> консультация</h1>
                                        <h3 class="promo__sub-title">Не знаете с чего начать? На бесплатной консультации
                                            ответим на все вопросы абсолютно бесплатно</h3>
                                        <button class="button promo__button open-modal"
                                            data-modal="main"><span>Узнать</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                                viewBox="0 0 89 16">
                                                <path fill="var(--primary)"
                                                    d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img src="/images/banner/promo3-3-decor.png" alt="декор">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section class="features inter gerb" id="features">
            <div class="container">
                <h2 class="title">Наши преимущества <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>
                <div class="features__items">
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="43" fill="none"
                                viewBox="0 0 41 43">
                                <path fill="#fff"
                                    d="m5.237 24.834 14.76-12.254 19.41 17.073L26.033 41.3c-2.64 2.3-6.962 2.26-9.653-.083L5.85 33.028c-2.695-2.347-2.74-6.108-.612-8.194Z" />
                                <path fill="#fff"
                                    d="M19.09 17.64c1.347 1.174 3.53 1.174 4.877 0L34.87 8.147c1.348-1.173 1.348-3.073 0-4.247-1.347-1.173-3.53-1.173-4.877 0L19.09 13.393c-1.348 1.174-1.348 3.075 0 4.248Z" />
                                <path fill="#fff"
                                    d="M22.19 23.4c1.348 1.173 3.53 1.173 4.878 0l4.877-4.247c1.347-1.173 1.347-3.073 0-4.247-1.346-1.172-3.53-1.173-4.877 0l-4.878 4.247c-1.346 1.173-1.346 3.074 0 4.247Z" />
                                <path fill="#fff"
                                    d="M26.232 28.36c1.347 1.173 3.53 1.173 4.878 0l4.877-4.248c1.347-1.173 1.347-3.073 0-4.247-1.346-1.172-3.53-1.173-4.877 0l-4.878 4.248c-1.347 1.172-1.347 3.074 0 4.247Zm3.445 5.505c1.347 1.173 3.529 1.173 4.877 0l4.877-4.247c1.348-1.173 1.348-3.073 0-4.247-1.346-1.172-3.53-1.173-4.877 0l-4.877 4.247c-1.346 1.173-1.346 3.074 0 4.247ZM3.736 20.343c-.085-1.384-.61-2.781-1.439-3.976L.484 13.762c-.357-.508-.27-1.153.202-1.564l.549-.478c1.448-1.261 4.038-.684 5.09.231l1.131.985c2.3 2.002 4.192 4.291 5.087 6.997l2.25 5.015L3.74 28.691l-.004-8.348Z" />
                                <path fill="#0F73E7"
                                    d="m27.215 14.798-3.251 2.83c-.449.39-.45 1.024 0 1.416.45.391 1.177.39 1.625 0l1.626-4.246Zm4.055 4.949-3.252 2.83c-.448.391-.45 1.025 0 1.416.45.392 1.177.39 1.626 0l1.625-4.246Zm3.285 5.623-3.25 2.83c-.449.39-.45 1.024 0 1.416.449.391 1.177.39 1.625 0l1.625-4.246Z" />
                                <path fill="#fff"
                                    d="M14.059 8.008c-.635 0-1.15-.449-1.15-1.001V1c.001-.552.515-1 1.151-1 .634 0 1.15.448 1.15 1.001v6.006c0 .552-.516 1-1.15 1Zm5.739.998c-.294 0-.588-.098-.813-.293-.449-.391-.449-1.024 0-1.415l4.599-4.004a1.272 1.272 0 0 1 1.625 0c.45.391.45 1.024 0 1.415l-4.598 4.004a1.239 1.239 0 0 1-.813.293Zm-11.482 0c-.294 0-.588-.098-.812-.293L2.905 4.709c-.449-.391-.449-1.024 0-1.415a1.272 1.272 0 0 1 1.626 0l4.598 4.004c.45.391.45 1.024 0 1.415a1.239 1.239 0 0 1-.813.293Z" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3>Сервис под ключ</h3>
                            <p>Юридическое сопровождение клиента от момента заключения договора до успешного
                                освобождения от задолженности.</p>
                        </div>
                    </div>
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="none"
                                viewBox="0 0 44 44">
                                <path fill="#fff"
                                    d="M6.097 23.833V7.741l3.5-.275c3.048-.24 6.04-.972 8.863-2.17l3.84-1.63 3.842 1.63a28.383 28.383 0 0 0 8.864 2.17l3.5.275v16.092c0 9.113-7.256 16.5-16.205 16.5-8.95 0-16.204-7.387-16.204-16.5Z" />
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m15.099 22 4.5 4.583L29.503 16.5" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3>Гарантия</h3>
                            <p>Гарантия освобождения от задолженности зафиксирована в договоре.</p>
                        </div>
                    </div>
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" fill="none"
                                viewBox="0 0 41 40">
                                <path fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M32.236 18.333H9.002a3.326 3.326 0 0 0-3.32 3.334v11.666a3.326 3.326 0 0 0 3.32 3.334h23.234a3.326 3.326 0 0 0 3.32-3.334V21.667a3.326 3.326 0 0 0-3.32-3.334Z" />
                                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M12.321 18.333v-6.666c0-4.603 3.716-8.334 8.298-8.334 4.583 0 8.298 3.731 8.298 8.333v6.667" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3> Сохранность</h3>
                            <p>Сохранение имущества и дохода на законных основаниях.</p>
                        </div>
                    </div>
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="none"
                                viewBox="0 0 43 43">
                                <path fill="#fff"
                                    d="m6.29 3.583 6.52.236c1.373.05 2.592.917 3.118 2.22l1.928 4.769a3.68 3.68 0 0 1-.321 3.375l-2.47 3.8c1.462 2.1 5.44 7.021 9.652 9.901l3.14-1.933a3.434 3.434 0 0 1 2.657-.405l6.244 1.6c1.66.427 2.78 2.02 2.648 3.77l-.4 5.345c-.142 1.875-1.677 3.347-3.5 3.135C11.454 36.6-2.652 3.583 6.29 3.583Z" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3> Спокойствие</h3>
                            <p>Работа с коллекторами, со службами взыскания кредитных организаций, а также с Федеральной
                                службой
                                судебных приставов. </p>
                        </div>
                    </div>
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="58" height="46" fill="none"
                                viewBox="0 0 58 46">
                                <path fill="#fff"
                                    d="m17.178 20.386 8.226-14.514c1.138-2.01 4.195-3.047 6.675-2.02 3.858 1.599 3.084 3.097 3.084 12.504h14.565c3.149 0 5.557 2.202 5.078 4.643L51.25 39.133c-.386 1.966-2.542 3.417-5.079 3.417H17.178m0-22.164V42.55Zm0 0H9.471c-2.838 0-5.139 1.804-5.139 4.03V38.52c0 2.226 2.3 4.03 5.139 4.03h7.707" />
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m17.178 20.386 8.226-14.514c1.138-2.01 4.195-3.047 6.675-2.02 3.858 1.599 3.084 3.097 3.084 12.504h14.565c3.149 0 5.557 2.202 5.078 4.643L51.25 39.133c-.386 1.966-2.542 3.417-5.079 3.417H17.178m0-22.164V42.55m0-22.164H9.471c-2.838 0-5.139 1.804-5.139 4.03V38.52c0 2.226 2.3 4.03 5.139 4.03h7.707" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3> Комфорт</h3>
                            <p> Индивидуальный подход к каждому клиенту, удобное расположение уютных и чистых офисов,
                                дистанционное
                                сопровождение клиента.</p>
                        </div>
                    </div>
                    <div class="features__item">
                        <div class="features__item_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" fill="none"
                                viewBox="0 0 51 51">
                                <path fill="#fff"
                                    d="M38.25 4.25h-25.5a2.125 2.125 0 0 0-2.125 2.125V46.75l5.313-4.25 4.25 4.25L25.5 42.5l5.313 4.25 4.25-4.25 5.312 4.25V6.375A2.125 2.125 0 0 0 38.25 4.25Z" />
                                <path stroke="#0F73E7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.125 12.75h12.75m-12.75 8.5h12.75m-12.75 8.5h2.125" />
                            </svg>
                        </div>
                        <div class="features__item__content">
                            <h3>Беспроцентная рассрочка </h3>
                            <p>Беспроцентная рассрочка оплаты по договору.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="servcies">
            <div class="container">
                <h2 class="title">Услуги <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16" fill="none"
                        viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>

                <div class="services__items">
                    <div class="service__item">
                        <a href="crash.php#jud"></a>
                        <img src="/images/services/services01.jpg" alt="Судебное банкротство">
                        <p>Судебное банкротство <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.984 12H20.89m0 0-6.963-7m6.963 7-6.963 7" />
                            </svg></p>
                    </div>
                    <div class="service__item">
                        <a href="dolgi.php"></a><img src="/images/services/services02.jpg"
                            alt="Работа по имеющейся задолженности и сохранению дохода">
                        <p>Работа по имеющейся задолженности и сохранению дохода <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.984 12H20.89m0 0-6.963-7m6.963 7-6.963 7" />
                            </svg></p>
                    </div>
                    <div class="service__item">
                        <a href="crash.php"></a><img src="/images/services/services03.jpg" alt="Банкротство">
                        <p>Банкротство <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.984 12H20.89m0 0-6.963-7m6.963 7-6.963 7" />
                            </svg></p>
                    </div>
                    <div class="service__item">
                        <a href="civil-law.php#civil"></a><img src="/images/services/services04.jpg"
                            alt="Услуги по гражданскому праву">
                        <p>Услуги по гражданскому праву <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.984 12H20.89m0 0-6.963-7m6.963 7-6.963 7" />
                            </svg></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback">
            <div class="feedback__inner">
                <div class="container">
                    <div class="feedback__content">
                        <form action="" method="post" class="form" novalidate>
                            <h2 class="form__title">Оставьте заявку</h2>
                            <div class="form__row">
                                <input oninput="validate(this)" type="text" name="fio" class="form-input"
                                    placeholder="Имя" required minlength="2" maxlength="50">
                            </div>
                            <div class="form__row">
                                <input onchange="validate(this)" type="tel" name="phone" class="form-input phone"
                                    placeholder="Номер телефона" required>

                            </div>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input checked type="radio" name="message['Куда позвонить']"
                                        value="Звонок правового эксперта">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Звонок правового эксперта</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message['Куда позвонить']" value="Сообщение в мессенджер">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Сообщение в мессенджер</span>
                                </label>
                            </div>
                            <button class="button promo__button"><span>Отправить</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="89" height="16" fill="none"
                                    viewBox="0 0 89 16">
                                    <path fill="var(--primary)"
                                        d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z">
                                    </path>
                                </svg>
                            </button>
                            <label class="custom-checkbox checkbox">
                                <input type="checkbox">
                                <span class="checkbox-icon"></span>
                                <span class="checkbox-label">Я даю согласие на обработку персональных данных в
                                    соответсивии
                                    с <a target="_blank" href="/documents/policy.docx">Политикой конфиденциальности</a></span>
                            </label>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <section class="result inter">
            <div class="container">
                <h2 class="title">Наши результаты <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>
                <div class="result__table">
                    <div class="result__row">
                        <span>Сумма списания</span>
                        <span>№ дела</span>
                        <span>ФИО</span>
                        <span>Дата списания</span>
                        <span>Ознакомиться с делом</span>
                    </div>
                    <div class="result__row">
                        <span>541 799 руб. 25 коп</span>
                        <span>А05-14652/2021</span>
                        <span>Крапивин В.А.</span>
                        <span>17.10.2022</span>
                        <a
                            href="https://kad.arbitr.ru/Document/Pdf/9d79b6ea-5b97-4e9c-b5d9-5dd5f73f8029/8b50c25c-bbc3-44f0-8944-3793b86ab749/A05-14652-2021_20221017_Opredelenie.pdf?isAddStamp=True"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16">
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.988 14.667h7.978c.734 0 1.33-.597 1.33-1.334v-6.78c0-.354-.14-.693-.39-.943L9.031 1.724c-.25-.25-.587-.39-.94-.39H3.988c-.734 0-1.33.596-1.33 1.333v10.666c0 .737.596 1.334 1.33 1.334Z" />
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.642 1.667V6h3.989m-7.313 5.333H9.97M5.318 8.667H9.97M5.318 6h.665" />
                            </svg>Смотреть документ</a>
                    </div>
                    <div class="result__row">
                        <span>824 528 руб. 51 коп</span>
                        <span> А05-8899/2021</span>
                        <span> Голубев И.В.</span>
                        <span> 01.09.2022</span>
                        <a
                            href="https://kad.arbitr.ru/Document/Pdf/e62bfc09-ae66-4e32-88d6-6b193c88c75c/3d429a17-c0a2-4f12-97b6-144530199c39/A05-8899-2021_20220901_Opredelenie.pdf?isAddStamp=True"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16">
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.988 14.667h7.978c.734 0 1.33-.597 1.33-1.334v-6.78c0-.354-.14-.693-.39-.943L9.031 1.724c-.25-.25-.587-.39-.94-.39H3.988c-.734 0-1.33.596-1.33 1.333v10.666c0 .737.596 1.334 1.33 1.334Z" />
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.642 1.667V6h3.989m-7.313 5.333H9.97M5.318 8.667H9.97M5.318 6h.665" />
                            </svg>Смотреть документ</a>
                    </div>
                    <div class="result__row">
                        <span>1 595 461 руб. 71 коп</span>
                        <span>А05-12259/2021</span>
                        <span>Владимирова О.Н.</span>
                        <span>31.05.2022</span>
                        <a
                            href="https://kad.arbitr.ru/Document/Pdf/1a166ec4-a022-49e2-8ce0-64f3037e2c3d/00d61d4d-1c82-4c44-a2a8-ddb14e6d06b6/A05-12259-2021_20220531_Opredelenie.pdf?isAddStamp=True"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16">
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.988 14.667h7.978c.734 0 1.33-.597 1.33-1.334v-6.78c0-.354-.14-.693-.39-.943L9.031 1.724c-.25-.25-.587-.39-.94-.39H3.988c-.734 0-1.33.596-1.33 1.333v10.666c0 .737.596 1.334 1.33 1.334Z" />
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.642 1.667V6h3.989m-7.313 5.333H9.97M5.318 8.667H9.97M5.318 6h.665" />
                            </svg>Смотреть документ</a>
                    </div>
                    <div class="result__row">
                        <span>25 803 896 руб. 72 коп</span>
                        <span>А05-6937/2021</span>
                        <span>Шестакова Н.Н.</span>
                        <span>17.01.2022</span>
                        <a
                            href="https://kad.arbitr.ru/Document/Pdf/a579079a-2c85-4cfc-ba61-d041d93f017b/adbbc1a3-4858-4a1a-b305-fa769e92ecad/A05-6937-2021_20220117_Opredelenie.pdf?isAddStamp=True"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16">
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.988 14.667h7.978c.734 0 1.33-.597 1.33-1.334v-6.78c0-.354-.14-.693-.39-.943L9.031 1.724c-.25-.25-.587-.39-.94-.39H3.988c-.734 0-1.33.596-1.33 1.333v10.666c0 .737.596 1.334 1.33 1.334Z" />
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.642 1.667V6h3.989m-7.313 5.333H9.97M5.318 8.667H9.97M5.318 6h.665" />
                            </svg>Смотреть документ</a>
                    </div>
                    <div class="result__row">
                        <span>2 289 982 руб. 09 коп</span>
                        <span>А05-6991/2021</span>
                        <span>Кудреватый О.С</span>
                        <span>15.12.2021</span>
                        <a
                            href="https://kad.arbitr.ru/Document/Pdf/a487b883-b8f1-4ff7-b9b4-1b108c23a937/67c818b3-9b1c-40f9-b5f8-3bf2f78f73b9/A05-6991-2021_20211215_Opredelenie.pdf?isAddStamp=True"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16">
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.988 14.667h7.978c.734 0 1.33-.597 1.33-1.334v-6.78c0-.354-.14-.693-.39-.943L9.031 1.724c-.25-.25-.587-.39-.94-.39H3.988c-.734 0-1.33.596-1.33 1.333v10.666c0 .737.596 1.334 1.33 1.334Z" />
                                <path stroke="#1B2026" stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.642 1.667V6h3.989m-7.313 5.333H9.97M5.318 8.667H9.97M5.318 6h.665" />
                            </svg>Смотреть документ</a>
                    </div>
                </div>
                <a href="/results.php" class="more">Посмотреть больше</a>
            </div>
        </section>
        <section class="quiz inter">
            <div class="container">
                <h2 class="title">Какой вид списания долгов <br> подходит именно в вашей ситуации? <svg
                        xmlns="http://www.w3.org/2000/svg" width="135" height="16" fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg></h2>
                <div class="quiz__inner">
                    <form class="quiz__items form">
                        <div class="quiz__item quiz__active">
                            <h4>Вопрос 1 из 6</h4>
                            <h3>1. Какая у вас общая сумма долга?
                                (включая все обязательства по кредитам, займам, долгам по налогам и ЖКХ) <br> <span class="variant-desc">Выберите один из вариантов.</span></h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Сумма долга]" value="До 150 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">До 150 000 руб.</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Сумма долга]"
                                        value="От 150 000 руб. до 300 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">От 150 000 руб. до 300 000 руб.</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Сумма долга]"
                                        value="От 300 000 руб. до 500 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">От 300 000 руб. до 500 000 руб.</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Сумма долга]"
                                        value="От 500 000 руб. до 1 000 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">От 500 000 руб. до 1 000 000 руб.</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Сумма долга]" value="Более 1 000 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Более 1 000 000 руб.
                                    </span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button" disabled><span class="next">Далее</span></button>
                            </div>
                        </div>
                        <div class="quiz__item">
                            <h4>Вопрос 2 из 6</h4>
                            <h3>2. Имеются ли у Вас просрочки хотя бы по одному из Ваших финансовых обязательств? <br> <span class="variant-desc">Выберите один из вариантов.</span></h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Имеются ли у Вас просрочки]"
                                        value="Не имеется, все плачу вовремя">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Не имеется, все плачу вовремя</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Имеются ли у Вас просрочки]"
                                        value="Не имеется, но в текущем или следующем месяце будет первая просрочка">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Не имеется, но в текущем или следующем месяце будет
                                        первая просрочка</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Имеются ли у Вас просрочки]"
                                        value="Просрочка есть 1 месяц">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Просрочка есть 1 месяц</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Имеются ли у Вас просрочки]"
                                        value="Просрочки есть более 1 месяца">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Просрочки есть более 1 месяца</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Имеются ли у Вас просрочки]"
                                        value="Просрочки есть более 1 года">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Просрочки есть более 1 года</span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class=" back">Назад</span></button>
                                <button type="button" class="button" disabled><span class="next">Далее</span></button>
                            </div>
                        </div>

                        <div class="quiz__item">
                            <h4>Вопрос 3 из 6</h4>
                            <h3>3. Беспокоят ли Вас / Ваших родственников службы взыскания / коллекторы? <br> <span class="variant-desc">Выберите один из вариантов.</span></h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Беспокоят ли службы взыскания / коллекторы]"
                                        value="Не беспокоят">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Не беспокоят</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Беспокоят ли службы взыскания / коллекторы]"
                                        value="Беспокоят, но мне все равно">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Беспокоят, но мне все равно</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[Беспокоят ли службы взыскания / коллекторы]"
                                        value="Беспокоят, и это мне не приятно">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Беспокоят, и это мне не приятно</span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class=" back">Назад</span></button>
                                <button type="button" class="button" disabled><span class="next">Далее</span></button>
                            </div>
                        </div>

                        <div class="quiz__item">
                            <h4>Вопрос 4 из 6</h4>
                            <h3>4. Какая сумма Вашего официального дохода? <br> <span class="variant-desc">Выберите один из вариантов.</span></h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[сумма официального дохода]"
                                        value="Не имею официального дохода">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Не имею официального дохода</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[сумма официального дохода]"
                                        value="Официальный доход ниже прожиточного минимума">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Официальный доход ниже прожиточного минимума</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[сумма официального дохода]"
                                        value="Официальный доход равен или выше прожиточного минимума, но не более 50 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Официальный доход равен или выше прожиточного минимума,
                                        <br>но не более 50 000 руб.</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="radio" name="message[сумма официального дохода]"
                                        value="Официальный доход выше 50 000 руб.">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Официальный доход выше 50 000 руб.</span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class=" back">Назад</span></button>
                                <button type="button" class="button" disabled><span class="next">Далее</span></button>
                            </div>
                        </div>
                        <div class="quiz__item">
                            <h4>Вопрос 5 из 6</h4>
                            <h3>5. Какое имущество, подлежащее обязательной государственной регистрации, у Вас имеется? <br> <span class="variant-desc">Выберите несколько вариантов.</span>
                            </h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid" name="message[Какое имеется имущество]"
                                        value="Имущество отсутствует">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Имущество отсутствует</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid" name="message[Какое имеется имущество]"
                                        value="Единственное жилье">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Единственное жилье</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid" name="message[Какое имеется имущество]"
                                        value="Недвижимость кроме единственного жилья (квартира, дача, земельный участок, гараж, лодка)">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Недвижимость кроме единственного жилья (квартира, дача,
                                        земельный участок, гараж, лодка)</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid" name="message[Какое имеется имущество]"
                                        value="Движимое имущество (автомобиль, прицеп, сельхозтехника)">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Движимое имущество (автомобиль, прицеп,
                                        сельхозтехника)</span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class=" back">Назад</span></button>
                                <button type="button" class="button"><span class="next">Далее</span></button>
                            </div>
                        </div>
                        <div class="quiz__item">
                            <h4>Вопрос 6 из 6</h4>
                            <h3>6. Имеется ли у Вас имущество, находящееся в ипотеке или залоге? <br> <span class="variant-desc">Выберите несколько вариантов.</span></h3>
                            <div class="radios">
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid"
                                        name="message[Имущество, находящееся в ипотеке или залоге]"
                                        value="Имуществ в ипотеке и залоге отсутствует">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Имущество в ипотеке и залоге отсутствует</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid"
                                        name="message[Имущество, находящееся в ипотеке или залоге]"
                                        value="Имеется ипотека">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Имеется ипотека</span>
                                </label>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="no-valid"
                                        name="message[Имущество, находящееся в ипотеке или залоге]"
                                        value="Имеется залог">
                                    <span class="checkbox-icon"></span>
                                    <span class="checkbox-label">Имеется залог</span>
                                </label>
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class=" back">Назад</span></button>
                                <button type="button" class="button"><span class="next">Далее</span></button>
                            </div>
                        </div>
                        <div class="quiz__item">
                            <h3>Оставьте свои контакты для ответа эксперта по списанию долгов.</h3>
                            <div class="form__row">
                                <input onchange="validate(this)" type="tel" name="phone" class="form-input phone"
                                    placeholder="Номер телефона" required="">
                            </div>
                            <div class="form__row">
                                <input oninput="validate(this)" type="text" name="fio" class="form-input"
                                    placeholder="Имя" required="" minlength="2" maxlength="50">
                            </div>
                            <div class="control">
                                <button type="button" class="button"><span class="back">Назад</span></button>
                                <button type="submit" disabled class="button"><span class="next">Определить</span></button>
                            </div>
                        </div>
                    </form>

                    <!-- <p class="quiz-slogan"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="46" fill="none" viewBox="0 0 13 46">
                            <path fill="#0F73E7"
                                d="M.37.57h12.25L9.61 32.84H3.38L.37.57Zm.7 35.77h10.92V46H1.07v-9.66Z" />
                        </svg>
                        Включая суммы долга по всем займам, кредитам, долгам по ЖКХ и налогам</p> -->
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <section class="loader" id="welcome-banner">
        <?php if(intval(date("m")) % 2 == 0): ?>
        <div class="loader__inner loader__inner_2">
            <h2 class="mulish">Добро пожаловать!</h2>
        </div>
        <?php else: ?>
        <div class="loader__inner loader__inner_1">
            <h2 class="mulish">Добро <br> пожаловать!</h2>
            <img src="/images/banner/loader1-decor.svg" alt="декор">
        </div>
        <?php endif; ?>
    </section>
    <script src="/libs/swiper.js"></script>
    <script src="/js/slider.js"></script>
    <script src="/js/quiz.js"></script>
    <script src="/js/timer.js"></script>
</body>


</html>