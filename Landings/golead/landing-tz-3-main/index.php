<?php
    $queryString = $_SERVER['QUERY_STRING'];
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['qs'])) {
        $_SESSION['qs'] = $_SERVER['QUERY_STRING'];
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Качественные заявки на банкротство физических лиц с проверкой контакт-центра и заменой брака от экосистемы MYFORCE" />
    <meta name="keywords" content="лиды на банкротство, заявки на банкротство, клиенты на банкротство" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta property="og:title" content="Заявки на банкротство физических лиц">
    <meta property="og:description"
        content="Качественные заявки на банкротство физических лиц с проверкой контакт-центра и заменой брака от экосистемы MYFORCE">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="manifest" href="assets/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>Заявки на банкротство физических лиц</title>
    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5">
    </script>
    <script defer="defer" src="main.js"></script>
    <link href="main.css" rel="stylesheet" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        for (var j = 0; j < document.scripts.length; j++) {
            if (document.scripts[j].src === r) {
                return;
            }
        }
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
            k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(92547615, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/92547615" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <a href="/" class="header__logo"><svg width="136" height="21" viewBox="0 0 136 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_112_393)">
                            <path
                                d="M0.698208 19.9437C0.512018 19.9437 0.344449 19.8781 0.195498 19.7471C0.0651663 19.5973 0 19.4287 0 19.2414V0.983142C0 0.77715 0.0651663 0.608612 0.195498 0.477527C0.344449 0.346441 0.512018 0.280899 0.698208 0.280899H3.71447C4.16131 0.280899 4.48715 0.486891 4.69196 0.898874L9.60734 9.74714L14.5227 0.898874C14.7275 0.486891 15.0534 0.280899 15.5002 0.280899H18.4886C18.6934 0.280899 18.8609 0.346441 18.9913 0.477527C19.1402 0.608612 19.2147 0.77715 19.2147 0.983142V19.2414C19.2147 19.4474 19.1402 19.616 18.9913 19.7471C18.8609 19.8781 18.6934 19.9437 18.4886 19.9437H15.1651C14.9603 19.9437 14.7834 19.8781 14.6344 19.7471C14.5041 19.616 14.4389 19.4474 14.4389 19.2414V8.7078L11.311 14.5786C11.0689 15.0093 10.7431 15.2246 10.3335 15.2246H8.88121C8.63916 15.2246 8.44366 15.1684 8.2947 15.0561C8.14576 14.9437 8.01544 14.7845 7.9037 14.5786L4.74782 8.7078V19.2414C4.74782 19.4287 4.68265 19.5973 4.55231 19.7471C4.42198 19.8781 4.25441 19.9437 4.0496 19.9437H0.698208Z"
                                fill="#FFFFFF" />
                            <path
                                d="M29.4119 19.9437C29.2257 19.9437 29.0582 19.8781 28.9094 19.7471C28.7789 19.5973 28.7137 19.4287 28.7137 19.2414V13.2022L22.2344 1.17977C22.1785 1.01123 22.1506 0.908235 22.1506 0.870784C22.1506 0.720972 22.2066 0.589885 22.3182 0.477527C22.4484 0.346441 22.5974 0.280899 22.765 0.280899H26.256C26.6285 0.280899 26.9544 0.477527 27.2336 0.870784L31.2273 8.11792L35.2489 0.870784C35.4724 0.477527 35.7983 0.280899 36.2265 0.280899H39.7175C39.8851 0.280899 40.0248 0.346441 40.1365 0.477527C40.2481 0.589885 40.3041 0.720972 40.3041 0.870784C40.3041 0.964416 40.2855 1.06741 40.2481 1.17977L33.7688 13.2022V19.2414C33.7688 19.4474 33.6943 19.616 33.5453 19.7471C33.4151 19.8781 33.2475 19.9437 33.0426 19.9437H29.4119Z"
                                fill="#FFFFFF" />
                            <path
                                d="M43.9532 19.9437C43.767 19.9437 43.5994 19.8781 43.4506 19.7471C43.3202 19.5973 43.255 19.4287 43.255 19.2414V0.983142C43.255 0.77715 43.3202 0.608612 43.4506 0.477527C43.5994 0.346441 43.767 0.280899 43.9532 0.280899H56.8003C57.005 0.280899 57.1726 0.346441 57.303 0.477527C57.4333 0.608612 57.4985 0.77715 57.4985 0.983142V3.8202C57.4985 4.00746 57.4333 4.17601 57.303 4.32581C57.1726 4.4569 57.005 4.52245 56.8003 4.52245H48.1704V8.65162H56.2417C56.4466 8.65162 56.6142 8.72654 56.7444 8.87634C56.8748 9.00743 56.94 9.17598 56.94 9.38196V12.1909C56.94 12.3782 56.8748 12.5467 56.7444 12.6965C56.6142 12.8276 56.4466 12.8932 56.2417 12.8932H48.1704V19.2414C48.1704 19.4474 48.1052 19.616 47.975 19.7471C47.8445 19.8781 47.677 19.9437 47.4722 19.9437H43.9532Z"
                                fill="#FFFFFF" />
                            <path
                                d="M68.9291 20.2246C66.3038 20.2246 64.237 19.5785 62.729 18.2864C61.2209 16.9943 60.4203 15.0935 60.3271 12.5842C60.3085 12.0411 60.2992 11.2359 60.2992 10.1685C60.2992 9.08234 60.3085 8.26773 60.3271 7.72468C60.4203 5.25278 61.2301 3.35204 62.7569 2.02246C64.3022 0.674154 66.3598 0 68.9291 0C71.4985 0 73.5558 0.674154 75.1013 2.02246C76.6466 3.35204 77.4565 5.25278 77.531 7.72468C77.5683 8.8108 77.5869 9.62539 77.5869 10.1685C77.5869 10.6928 77.5683 11.498 77.531 12.5842C77.4379 15.0935 76.6374 16.9943 75.1292 18.2864C73.621 19.5785 71.5544 20.2246 68.9291 20.2246ZM68.9291 16.1797C69.9531 16.1797 70.7629 15.8707 71.3587 15.2527C71.9733 14.6347 72.2992 13.689 72.3363 12.4156C72.3735 11.3295 72.3923 10.5617 72.3923 10.1123C72.3923 9.62539 72.3735 8.85762 72.3363 7.80894C72.2992 6.53553 71.9733 5.58985 71.3587 4.97188C70.7444 4.3539 69.9346 4.04492 68.9291 4.04492C67.9237 4.04492 67.1136 4.3539 66.4993 4.97188C65.9035 5.58985 65.5776 6.53553 65.5219 7.80894C65.5031 8.33327 65.4938 9.10106 65.4938 10.1123C65.4938 11.1048 65.5031 11.8726 65.5219 12.4156C65.5776 13.689 65.9035 14.6347 66.4993 15.2527C67.0951 15.8707 67.9051 16.1797 68.9291 16.1797Z"
                                fill="#FFFFFF" />
                            <path
                                d="M82.0809 19.9437C81.8947 19.9437 81.7271 19.8781 81.5781 19.7471C81.4479 19.5973 81.3827 19.4287 81.3827 19.2414V0.983142C81.3827 0.77715 81.4479 0.608612 81.5781 0.477527C81.7271 0.346441 81.8947 0.280899 82.0809 0.280899H89.6775C92.1164 0.280899 94.0156 0.842693 95.3748 1.96628C96.7526 3.07115 97.4414 4.64417 97.4414 6.68534C97.4414 7.9962 97.1343 9.11043 96.5198 10.028C95.9054 10.9456 95.0582 11.6479 93.9783 12.1348L97.8044 19.0448C97.8604 19.1572 97.8882 19.2602 97.8882 19.3538C97.8882 19.5036 97.8232 19.6441 97.6928 19.7751C97.5811 19.8875 97.4507 19.9437 97.3019 19.9437H93.5874C93.0473 19.9437 92.6657 19.6909 92.4422 19.1853L89.2585 13.0055H86.4097V19.2414C86.4097 19.4474 86.3352 19.616 86.1864 19.7471C86.056 19.8781 85.8884 19.9437 85.6837 19.9437H82.0809ZM89.6215 9.0168C90.478 9.0168 91.1297 8.8108 91.5765 8.39882C92.0233 7.96812 92.2468 7.37824 92.2468 6.62917C92.2468 5.88011 92.0233 5.29024 91.5765 4.85952C91.1483 4.41008 90.4966 4.18538 89.6215 4.18538H86.4097V9.0168H89.6215Z"
                                fill="#FFFFFF" />
                            <path
                                d="M109.185 20.2246C106.522 20.2246 104.437 19.5785 102.929 18.2864C101.439 16.9755 100.648 15.0842 100.555 12.6123C100.536 12.1067 100.527 11.2827 100.527 10.1404C100.527 8.97934 100.536 8.13666 100.555 7.61231C100.648 5.17786 101.458 3.30521 102.985 1.99437C104.511 0.664788 106.578 0 109.185 0C110.823 0 112.294 0.280897 113.597 0.842692C114.901 1.38576 115.925 2.17226 116.669 3.20223C117.433 4.21346 117.824 5.40258 117.842 6.76962V6.8258C117.842 6.9756 117.777 7.10669 117.647 7.21906C117.535 7.31269 117.405 7.3595 117.256 7.3595H113.486C113.244 7.3595 113.057 7.31269 112.927 7.21906C112.797 7.10669 112.685 6.91006 112.592 6.62916C112.331 5.67411 111.922 5.00932 111.363 4.63479C110.804 4.24155 110.069 4.04492 109.157 4.04492C106.96 4.04492 105.824 5.28087 105.749 7.75276C105.731 8.25838 105.721 9.03552 105.721 10.0842C105.721 11.1329 105.731 11.9288 105.749 12.4718C105.824 14.9437 106.96 16.1797 109.157 16.1797C110.069 16.1797 110.814 15.983 111.391 15.5898C111.968 15.1778 112.368 14.513 112.592 13.5954C112.666 13.3145 112.769 13.1273 112.899 13.0336C113.029 12.9213 113.225 12.8651 113.486 12.8651H117.256C117.423 12.8651 117.563 12.9213 117.675 13.0336C117.805 13.146 117.861 13.2864 117.842 13.455C117.824 14.822 117.433 16.0205 116.669 17.0504C115.925 18.0617 114.901 18.8482 113.597 19.41C112.294 19.9531 110.823 20.2246 109.185 20.2246Z"
                                fill="#FFFFFF" />
                            <path
                                d="M122.036 19.9437C121.85 19.9437 121.682 19.8781 121.533 19.7471C121.403 19.5973 121.338 19.4287 121.338 19.2414V0.983142C121.338 0.77715 121.403 0.608612 121.533 0.477527C121.682 0.346441 121.85 0.280899 122.036 0.280899H135.078C135.283 0.280899 135.451 0.346441 135.581 0.477527C135.712 0.608612 135.777 0.77715 135.777 0.983142V3.62357C135.777 3.81083 135.712 3.97937 135.581 4.12918C135.451 4.26027 135.283 4.32581 135.078 4.32581H126.169V8.11792H134.464C134.669 8.11792 134.836 8.19284 134.967 8.34264C135.097 8.47373 135.162 8.64228 135.162 8.84826V11.2921C135.162 11.4793 135.097 11.6479 134.967 11.7977C134.836 11.9288 134.669 11.9943 134.464 11.9943H126.169V15.8988H135.302C135.507 15.8988 135.674 15.9643 135.805 16.0954C135.935 16.2265 136 16.395 136 16.601V19.2414C136 19.4287 135.935 19.5973 135.805 19.7471C135.674 19.8781 135.507 19.9437 135.302 19.9437H122.036Z"
                                fill="#FFFFFF" />
                        </g>
                        <defs>
                            <clipPath id="clip0_112_393">
                                <rect width="136" height="20.2246" fill="white" />
                            </clipPath>
                        </defs>
                    </svg></a>
                <nav class="header__nav nav__mobile">
                    <a href="#getting">Получение лидов на БФЛ</a>
                    <a href="#reviews">Отзывы</a> <a href="#packets">Цены на лиды</a>
                    <a href="#test">Тест лидов</a>
                </nav>
                <button class="header__cta cta open-modal">
                    Получить тест-пакет
                </button>
                <div class="burger"><span></span> <span></span> <span></span></div>
            </div>
        </div>
    </header>
    <main>
        <section class="promo">
            <div class="container">
                <div class="promo__wrap">
                    <div class="promo__content">
                        <h1 class="promo__title title">
                            Заявки на <span>банкротство физических лиц</span>
                        </h1>
                        <ul class="promo__list">
                            <li class="promo__item">
                                <p class="promo__text">
                                    <span>Myforce</span>- целевые клиенты для вашего бизнеса по
                                    банкротству.
                                </p>
                            </li>
                            <li class="promo__item">
                                <p class="promo__text">Работаем по всей России</p>
                            </li>
                            <li class="promo__item">
                                <p class="promo__text">
                                    Наша команда занимается успешной лидогенерацией более 7 лет!
                                </p>
                            </li>
                        </ul>
                        <button class="promo__cta cta open-modal">
                            Получить тест-пакет
                        </button>
                    </div>
                    <img class="promo__image" src="assets/promo.svg" alt />
                    <img class="promo__mobile" src="assets/promo-mobile.svg" alt />
                </div>
            </div>
        </section>
        <section class="getting" id="getting">
            <div class="container">
                <h2 class="getting__title title">
                    Как мы получаем <span>лиды на банкротство</span>
                </h2>
                <div class="getting__banner">
                    <p class="getting__label">Клиент оставляет заявку на сайте</p>
                    <svg width="121" height="29" viewBox="0 0 121 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M62.3013 10.8428L61.4072 12.0473L62.3013 10.8428ZM121 16L104.173 11.8949L109.031 28.5201L121 16ZM4.73272 20.3706L5.57059 19.1265L3.08223 17.4507L2.24436 18.6949L4.73272 20.3706ZM6.09146 14.0239L5.0445 15.0981L7.19286 17.192L8.23983 16.1179L6.09146 14.0239ZM12.3981 12.406L13.5806 11.4832L11.7349 9.11808L10.5524 10.0409L12.3981 12.406ZM15.4812 6.67245L14.1921 7.43934L15.7259 10.0176L17.015 9.25072L15.4812 6.67245ZM21.9874 6.70657L23.3641 6.11119L22.1734 3.35763L20.7966 3.95301L21.9874 6.70657ZM26.4346 1.95439L24.9896 2.35691L25.7946 5.24688L27.2396 4.84436L26.4346 1.95439ZM32.6913 3.74244L34.1795 3.55446L33.8036 0.578113L32.3154 0.76609L32.6913 3.74244ZM38.31 0.468523L36.8105 0.427742L36.729 3.42663L38.2284 3.46741L38.31 0.468523ZM43.7472 4.04628L45.2226 4.31689L45.7638 1.36612L44.2884 1.0955L43.7472 4.04628ZM50.0919 2.61546L48.6725 2.13033L47.7022 4.96909L49.1216 5.45423L50.0919 2.61546ZM54.2572 7.61553L55.598 8.28792L56.9428 5.60622L55.602 4.93382L54.2572 7.61553ZM60.7576 7.92758L59.5068 7.09967L57.851 9.60133L59.1018 10.4292L60.7576 7.92758ZM63.9895 13.8841L65.2296 14.7279L66.9172 12.2476L65.6771 11.4038L63.9895 13.8841ZM70.8534 14.5913L69.5397 13.8673L68.0916 16.4946L69.4053 17.2187L70.8534 14.5913ZM75.1504 19.9943L76.5356 20.5697L77.6864 17.7991L76.3011 17.2238L75.1504 19.9943ZM81.9869 19.1842L80.5404 18.7871L79.7464 21.6802L81.1929 22.0772L81.9869 19.1842ZM87.4767 23.3497L88.964 23.5449L89.3543 20.5704L87.8671 20.3752L87.4767 23.3497ZM93.8572 20.7365L92.3573 20.7506L92.3855 23.7505L93.8854 23.7364L93.8572 20.7365ZM100.274 23.2522L101.76 23.0441L101.344 20.0731L99.8582 20.2812L100.274 23.2522ZM105.791 19.11L104.336 19.4746L105.065 22.3846L106.52 22.0201L105.791 19.11ZM112.584 20.2539L114.011 19.7916L113.086 16.9376L111.659 17.4L112.584 20.2539ZM117.568 15.4408L116.139 15.8979L117.053 18.7552L118.482 18.2981L117.568 15.4408ZM3.39354 22.6741C3.73791 21.9578 4.18472 21.1844 4.73272 20.3706L2.24436 18.6949C1.62839 19.6096 1.10603 20.5085 0.689833 21.3741L3.39354 22.6741ZM8.23983 16.1179C9.45928 14.8667 10.8518 13.6126 12.3981 12.406L10.5524 10.0409C8.90117 11.3295 7.40724 12.674 6.09146 14.0239L8.23983 16.1179ZM17.015 9.25072C18.5787 8.32051 20.2405 7.462 21.9874 6.70657L20.7966 3.95301C18.9263 4.76183 17.1501 5.67964 15.4812 6.67245L17.015 9.25072ZM27.2396 4.84436C28.9986 4.35437 30.8192 3.97892 32.6913 3.74244L32.3154 0.76609C30.2914 1.02176 28.3274 1.42711 26.4346 1.95439L27.2396 4.84436ZM38.2284 3.46741C40.0329 3.51649 41.875 3.70288 43.7472 4.04628L44.2884 1.0955C42.2617 0.723767 40.2659 0.521713 38.31 0.468523L38.2284 3.46741ZM49.1216 5.45423C50.8148 6.03294 52.5284 6.74857 54.2572 7.61553L55.602 4.93382C53.7541 4.00716 51.9155 3.23875 50.0919 2.61546L49.1216 5.45423ZM59.1018 10.4292C59.8683 10.9365 60.6369 11.4755 61.4072 12.0473L63.1953 9.63839C62.3825 9.03506 61.5698 8.46514 60.7576 7.92758L59.1018 10.4292ZM61.4072 12.0473C62.2743 12.6909 63.1351 13.3028 63.9895 13.8841L65.6771 11.4038C64.8574 10.8461 64.0301 10.258 63.1953 9.63839L61.4072 12.0473ZM69.4053 17.2187C71.3573 18.2946 73.2725 19.2144 75.1504 19.9943L76.3011 17.2238C74.5278 16.4873 72.7117 15.6156 70.8534 14.5913L69.4053 17.2187ZM81.1929 22.0772C83.3466 22.6683 85.4418 23.0827 87.4767 23.3497L87.8671 20.3752C85.9664 20.1258 84.0062 19.7384 81.9869 19.1842L81.1929 22.0772ZM93.8854 23.7364C96.1059 23.7155 98.2365 23.5377 100.274 23.2522L99.8582 20.2812C97.9356 20.5505 95.9351 20.717 93.8572 20.7365L93.8854 23.7364ZM106.52 22.0201C108.675 21.4801 110.7 20.8644 112.584 20.2539L111.659 17.4C109.811 17.999 107.856 18.5926 105.791 19.11L106.52 22.0201Z"
                            fill="#AD9EFF" />
                    </svg>
                    <p class="getting__label">
                        Звонит оператор, проверяет сумму списания долга
                    </p>
                    <svg width="121" height="29" viewBox="0 0 121 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M62.3013 10.8428L61.4072 12.0473L62.3013 10.8428ZM121 16L104.173 11.8949L109.031 28.5201L121 16ZM4.73272 20.3706L5.57059 19.1265L3.08223 17.4507L2.24436 18.6949L4.73272 20.3706ZM6.09146 14.0239L5.0445 15.0981L7.19286 17.192L8.23983 16.1179L6.09146 14.0239ZM12.3981 12.406L13.5806 11.4832L11.7349 9.11808L10.5524 10.0409L12.3981 12.406ZM15.4812 6.67245L14.1921 7.43934L15.7259 10.0176L17.015 9.25072L15.4812 6.67245ZM21.9874 6.70657L23.3641 6.11119L22.1734 3.35763L20.7966 3.95301L21.9874 6.70657ZM26.4346 1.95439L24.9896 2.35691L25.7946 5.24688L27.2396 4.84436L26.4346 1.95439ZM32.6913 3.74244L34.1795 3.55446L33.8036 0.578113L32.3154 0.76609L32.6913 3.74244ZM38.31 0.468523L36.8105 0.427742L36.729 3.42663L38.2284 3.46741L38.31 0.468523ZM43.7472 4.04628L45.2226 4.31689L45.7638 1.36612L44.2884 1.0955L43.7472 4.04628ZM50.0919 2.61546L48.6725 2.13033L47.7022 4.96909L49.1216 5.45423L50.0919 2.61546ZM54.2572 7.61553L55.598 8.28792L56.9428 5.60622L55.602 4.93382L54.2572 7.61553ZM60.7576 7.92758L59.5068 7.09967L57.851 9.60133L59.1018 10.4292L60.7576 7.92758ZM63.9895 13.8841L65.2296 14.7279L66.9172 12.2476L65.6771 11.4038L63.9895 13.8841ZM70.8534 14.5913L69.5397 13.8673L68.0916 16.4946L69.4053 17.2187L70.8534 14.5913ZM75.1504 19.9943L76.5356 20.5697L77.6864 17.7991L76.3011 17.2238L75.1504 19.9943ZM81.9869 19.1842L80.5404 18.7871L79.7464 21.6802L81.1929 22.0772L81.9869 19.1842ZM87.4767 23.3497L88.964 23.5449L89.3543 20.5704L87.8671 20.3752L87.4767 23.3497ZM93.8572 20.7365L92.3573 20.7506L92.3855 23.7505L93.8854 23.7364L93.8572 20.7365ZM100.274 23.2522L101.76 23.0441L101.344 20.0731L99.8582 20.2812L100.274 23.2522ZM105.791 19.11L104.336 19.4746L105.065 22.3846L106.52 22.0201L105.791 19.11ZM112.584 20.2539L114.011 19.7916L113.086 16.9376L111.659 17.4L112.584 20.2539ZM117.568 15.4408L116.139 15.8979L117.053 18.7552L118.482 18.2981L117.568 15.4408ZM3.39354 22.6741C3.73791 21.9578 4.18472 21.1844 4.73272 20.3706L2.24436 18.6949C1.62839 19.6096 1.10603 20.5085 0.689833 21.3741L3.39354 22.6741ZM8.23983 16.1179C9.45928 14.8667 10.8518 13.6126 12.3981 12.406L10.5524 10.0409C8.90117 11.3295 7.40724 12.674 6.09146 14.0239L8.23983 16.1179ZM17.015 9.25072C18.5787 8.32051 20.2405 7.462 21.9874 6.70657L20.7966 3.95301C18.9263 4.76183 17.1501 5.67964 15.4812 6.67245L17.015 9.25072ZM27.2396 4.84436C28.9986 4.35437 30.8192 3.97892 32.6913 3.74244L32.3154 0.76609C30.2914 1.02176 28.3274 1.42711 26.4346 1.95439L27.2396 4.84436ZM38.2284 3.46741C40.0329 3.51649 41.875 3.70288 43.7472 4.04628L44.2884 1.0955C42.2617 0.723767 40.2659 0.521713 38.31 0.468523L38.2284 3.46741ZM49.1216 5.45423C50.8148 6.03294 52.5284 6.74857 54.2572 7.61553L55.602 4.93382C53.7541 4.00716 51.9155 3.23875 50.0919 2.61546L49.1216 5.45423ZM59.1018 10.4292C59.8683 10.9365 60.6369 11.4755 61.4072 12.0473L63.1953 9.63839C62.3825 9.03506 61.5698 8.46514 60.7576 7.92758L59.1018 10.4292ZM61.4072 12.0473C62.2743 12.6909 63.1351 13.3028 63.9895 13.8841L65.6771 11.4038C64.8574 10.8461 64.0301 10.258 63.1953 9.63839L61.4072 12.0473ZM69.4053 17.2187C71.3573 18.2946 73.2725 19.2144 75.1504 19.9943L76.3011 17.2238C74.5278 16.4873 72.7117 15.6156 70.8534 14.5913L69.4053 17.2187ZM81.1929 22.0772C83.3466 22.6683 85.4418 23.0827 87.4767 23.3497L87.8671 20.3752C85.9664 20.1258 84.0062 19.7384 81.9869 19.1842L81.1929 22.0772ZM93.8854 23.7364C96.1059 23.7155 98.2365 23.5377 100.274 23.2522L99.8582 20.2812C97.9356 20.5505 95.9351 20.717 93.8572 20.7365L93.8854 23.7364ZM106.52 22.0201C108.675 21.4801 110.7 20.8644 112.584 20.2539L111.659 17.4C109.811 17.999 107.856 18.5926 105.791 19.11L106.52 22.0201Z"
                            fill="#AD9EFF" />
                    </svg>
                    <p class="getting__label">
                        Лид по указанным критериям попадает к вам в CRM
                    </p>
                </div>
                <div class="getting__row">
                    <p>
                        <span>MYFORCE</span> генерит до 600 лидов на один регион! Клиенты
                        идут через рекламные кампании и сайты. Каждый лид проверяется на
                        брак и актуальность списания долгов.
                        <span>После подтверждения заявки мы сообщаем, что с ними свяжется
                            юрист в ближайшее время</span>
                    </p>
                    <button class="getting__cta cta open-modal">
                        Получить клиентов
                    </button>
                </div>
            </div>
        </section>
        <section class="examples">
            <div class="container">
                <div class="examples__row">
                    <div class="audio">
                        <h2 class="examples__title title">
                            Пример обработки <span>лидов БФЛ</span>
                        </h2>
                        <audio src="assets/lead01.mp3" type="audio/mp3" controls="controls"></audio><audio
                            src="assets/lead02.mp3" type="audio/mp3" controls="controls"></audio><audio
                            src="assets/lead03.mp3" type="audio/mp3" controls="controls"></audio><audio
                            src="assets/lead04.mp3" type="audio/mp3" controls="controls"></audio>
                    </div>
                    <img src="assets/examples.svg" alt="example" />
                </div>
            </div>
        </section>
        <section class="why-we">
            <div class="container">
                <h2 class="title why-we__title">Почему <span>именно мы?</span></h2>
                <div class="why-we__wrap">
                    <div class="why-we__img">
                        <img src="assets/why-we.svg" alt="Почему именно мы? " />
                    </div>
                    <div class="why-we__item">
                        <h3 class="why-we__subtitle">Помимо лидов вы получаете:</h3>
                        <ul class="why-we__list">
                            <li>
                                <span>Конверсионый скрипт</span> – больше не нужно ломать
                                голову над переходом клиента "в сделку".
                            </li>
                            <li>
                                <span>Акции и бонусы</span> - мы предоставим скидку 10 % на
                                каждые 30 дополнительных лидов к вашему объему
                            </li>
                            <li>
                                <span>Вы платите ТОЛЬКО</span> за лиды - оплата за результат,
                                в счет не идет настройка рекламных кампаний, доступ к системе,
                                наша работа
                            </li>
                            <li>
                                <span>Всего за 7900 руб/мес</span> мы предоставим вам личного
                                аккаунт менеджера , который будет отслеживать рекламные
                                кампании и поддерживать с вами связь 24/7
                            </li>
                        </ul>
                        <button class="cta cta__why-we open-modal">Подробнее</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews" id="reviews">
            <div class="container">
                <h2 class="reviews__title title">
                    <span>Отзывы</span> наших клиентов
                </h2>
                <div class="swiper">
                    <div class="swiper-controll">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-btn">
                            <div class="swiper-prev">
                                <svg width="32" height="19" viewBox="0 0 32 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9.5L9.5 1M1 9.5L9.5 18M1 9.5H23M30.5 9.5H26" stroke="#7A6BDE"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="swiper-next">
                                <svg width="32" height="19" viewBox="0 0 32 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M31 9.5L22.5 1M31 9.5L22.5 18M31 9.5H9M1.5 9.5H6" stroke="#7A6BDE"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-1.jpg" alt="Наши отзыв" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-3.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-4.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-5.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-6.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-7.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-8.jpg" alt="Наши отзыв" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-block">
                                <img src="assets/slide-9.jpg" alt="Наши отзыв" />
                            </div>
                        </div>








                    </div>
                </div>
            </div>
        </section>
        <section class="quiz">
            <div class="container">
                <h2 class="quiz__title title"><span>Квиз</span></h2>
                <p class="quiz__subtitle">
                    Ответье на <span>5</span> вопросов и получите <span>10</span> лидов
                    в подарок
                </p>
                <div class="quiz__board">
                    <div class="quiz__question active">
                        <div class="quiz__stage">
                            <p><span>1 / </span>5</p>
                            <div class="quiz__progress"></div>
                        </div>
                        <div class="quiz__answer">
                            <p><span>1</span> Кем вы являетесь?</p>
                            <div class="quiz__input">
                                <input name="quiz" type="radio" id="radio_1" checked="checked"
                                    value="Предприниматель, хочу открыть юридический бизнес" />
                                <label class="radio__label" for="radio_1"><span></span><span>Предприниматель, хочу
                                        открыть юридический бизнес</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz" type="radio" id="radio_2" value="Частный юрист" />
                                <label class="radio__label" for="radio_2"><span></span><span>Частный
                                        юрист</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz" type="radio" id="radio_3" value="Компания до 3 человек" />
                                <label class="radio__label" for="radio_3"><span></span><span>Компания до 3
                                        человек</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz" type="radio" id="radio_4" value="Компания более 3 человек" />
                                <label class="radio__label" for="radio_4"><span></span><span>Компания более 3
                                        человек</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz" type="radio" id="radio_5" value="Частный арбитражный управляющий" />
                                <label class="radio__label" for="radio_5"><span></span><span>Частный арбитражный
                                        управляющий</span></label>
                            </div>
                        </div>
                        <div class="quiz__control">
                            <button class="cta quiz__forward">Далее</button>
                        </div>
                    </div>
                    <div class="quiz__question">
                        <div class="quiz__stage">
                            <p><span>2 / </span>5</p>
                            <div class="quiz__progress quiz__progress_40"></div>
                        </div>
                        <div class="quiz__answer">
                            <p><span>2</span> Укажите ваш город</p>
                            <input type="text" placeholder="Введите свой город" name="message" />
                        </div>
                        <div class="quiz__control">
                            <button class="cta quiz__back">Назад</button><button
                                class="cta quiz__forward">Далее</button>
                        </div>
                    </div>
                    <div class="quiz__question">
                        <div class="quiz__stage">
                            <p><span>3 / </span>5</p>
                            <div class="quiz__progress quiz__progress_60"></div>
                        </div>
                        <div class="quiz__answer">
                            <p>
                                <span>3</span> Сколько лидов в месяц вы хотели бы получать в
                                месяц?
                            </p>
                            <div class="quiz__input">
                                <input name="quiz-3" type="radio" id="radio_3_1" checked="checked"
                                    value="До 50 лидов" />
                                <label class="radio__label" for="radio_1"><span></span><span>До 50 лидов</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz-3" type="radio" id="radio_3_2" value="До 100 лидов" />
                                <label class="radio__label" for="radio_2"><span></span><span>До 100 лидов</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz-3" type="radio" id="radio_3_3" value="От 200 до 500 лидов" />
                                <label class="radio__label" for="radio_3"><span></span><span>От 200 до 500
                                        лидов</span></label>
                            </div>
                            <div class="quiz__input">
                                <input name="quiz-3" type="radio" id="radio_3_4" value="Более 500 лидов" />
                                <label class="radio__label" for="radio_4"><span></span><span>Более 500
                                        лидов</span></label>
                            </div>
                        </div>
                        <div class="quiz__control">
                            <button class="cta quiz__back">Назад</button><button
                                class="cta quiz__forward">Далее</button>
                        </div>
                    </div>
                    <div class="quiz__question">
                        <div class="quiz__stage">
                            <p><span>4 / </span>5</p>
                            <div class="quiz__progress quiz__progress_80"></div>
                        </div>
                        <div class="quiz__answer">
                            <p><span>4</span> Фамилия и имя</p>
                            <input type="text" placeholder="Фамилия" name="fio" />
                            <input type="text" placeholder="Имя" name="username" />
                        </div>
                        <div class="quiz__control">
                            <button class="cta quiz__back">Назад</button><button
                                class="cta quiz__forward">Далее</button>
                        </div>
                    </div>
                    <div class="quiz__question">
                        <div class="quiz__stage">
                            <p><span>5 / </span>5</p>
                            <div class="quiz__progress quiz__progress_100"></div>
                        </div>
                        <div class="quiz__answer">
                            <p><span>5</span> Номер для связи</p>
                            <input type="tel" name="phone" placeholder="Номер телефона" class="phone" />
                        </div>
                        <div class="quiz__control">
                            <button class="cta quiz__send">Отправить данные</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="packets" id="packets">
            <div class="container">
                <h2 class="packets__title title">Пакеты услуг</h2>
                <div class="packets__wrap">
                    <div class="packets__item">
                        <p class="packets__list_title">Пакет 1 “Выгодный”</p>
                        <ul class="packets__list">
                            <li>до 100 лидов в месяц</li>
                            <li>от 50 000 рублей</li>
                            <li>Замена брака</li>
                        </ul>
                        <button class="cta cta__packets open-modal">
                            Узнать подробнее
                        </button>
                    </div>
                    <div class="packets__item">
                        <p class="packets__list_title">Пакет 2 “Универсальный”</p>
                        <ul class="packets__list">
                            <li>до 200 лидов в месяц</li>
                            <li>от 100 000 рублей</li>
                            <li>Записи звонков контакт-центра</li>
                            <li>Контроль качества обработки лидов</li>
                            <li>Замена брака</li>
                        </ul>
                        <button class="cta cta__packets open-modal">
                            Узнать подробнее
                        </button>
                    </div>
                    <div class="packets__item">
                        <p class="packets__list_title">Пакет 3 “Премиум”</p>
                        <ul class="packets__list">
                            <li>до 500 лидов в месяц</li>
                            <li>от 250 000 рублей</li>
                            <li>Аккаунт менеджер</li>
                            <li>Записи звонков контакт-центра</li>
                            <li>Контроль качества обработки лидов</li>
                            <li>Замена брака</li>
                        </ul>
                        <button class="cta cta__packets open-modal">
                            Узнать подробнее
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="partners">
            <div class="container">
                <h2 class="partners__title title">
                    C нами сотрудничают - <span>нам доверяют</span>
                </h2>
                <div class="partners__wrap">
                    <div class="partners__block">
                        <img src="assets/partners-1.svg" alt="ОСВОБОДИМ" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-2.svg" alt="ПРАВАТОН" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-3.svg" alt="ФЭС" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-4.png" alt="ЗАЩИТА" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-5.png" alt="ФЦБ" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-6.png" alt="БАНКИРРО" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partnerrs-7.png" alt="ПРАВОЗАЩИТНИК" />
                    </div>
                    <div class="partners__block">
                        <img src="assets/partners-8.svg" alt="СТОПДОЛГ" />
                    </div>
                </div>
            </div>
        </section>
        <section class="doubt">
            <div class="container">
                <h2 class="doubt__title title">
                    Все еще сомневаетесь <span>в покупке?</span>
                </h2>
                <div class="doubt__item">
                    <div class="doubt__wrap">
                        <div class="doubt__left">
                            <div class="doubt__text">
                                Оставьте заявку и мы ответим на все интересующие вас вопросы
                                прямо сейчас
                            </div>
                            <form class="form form__doubt" method="POST">
                                <input name="fio" class="fio input" placeholder="ФИО" />
                                <input type="email" name="email" class="email input" placeholder="E-Mail" />
                                <input type="tel" name="phone" class="phone input" placeholder="Номер телефона" />
                                <input type="hidden" name="region" class="region input" />
                                <input type="hidden" name="query_string"
                                    value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>"
                                    class="query_string input" />
                                <button class="cta cta__doubt" type="submit">
                                    Оставить заявку
                                </button>
                            </form>
                        </div>
                        <div class="doubt__img">
                            <img src="assets/doubt.svg" alt="Все еще сомневаетесь <span>в покупке?</span>" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="automation">
            <div class="container">
                <h2 class="automation__title title">
                    Автоматизация бизнеса по банкротству <span>вместе с MYFORCE</span>
                </h2>
                <p class="automation__subtitle">
                    Что мы можем сделать еще для наших партнеров?
                </p>
                <div class="automation__video">
                    <div class="thumb__wrap">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/03kIw3W8Dzk"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="courses">
                    <div class="courses__item">
                        <div class="courses__logo">
                            <img src="assets/courses-1.png" alt="Корпоративная настройка Битрикс24 с обучением" />
                        </div>
                        <div class="courses__descr">
                            <h4 class="courses__title">
                                Корпоративная настройка Битрикс24 с обучением
                            </h4>
                            <div class="courses__wrap">
                                <ul>
                                    <li>
                                        Составление ТЗ специалистами MYFORCE (2 видео конференции)
                                    </li>
                                    <li>Покупка лицензии по реферальной ссылке MYFORCE</li>
                                    <li>Персональный куратор на период разработки</li>
                                </ul>
                                <ul>
                                    <li>Плановые совещания по внедрению 1 раз в неделю</li>
                                    <li>
                                        Презентация настройки после окончания работ (1 видео
                                        конференция) и обучение персонала (1 видео конференция)
                                    </li>
                                </ul>
                            </div>
                            <button class="cta cta__courses open-modal">
                                Узнать подробнее
                            </button>
                        </div>
                        <div class="courses__img">
                            <img src="assets/img-1.svg" alt="Корпоративная настройка Битрикс24 с обучением" />
                        </div>
                    </div>
                    <div class="courses__item">
                        <div class="courses__logo">
                            <img src="assets/courses-2.png" alt="Корпоративное обучение. Руководитель Отдела Продаж" />
                        </div>
                        <div class="courses__descr">
                            <h4 class="courses__title">
                                Корпоративное обучение.
                                <span>Руководитель Отдела Продаж</span>
                            </h4>
                            <div class="courses__wrap">
                                <ul>
                                    <li>Система контроля отделов (МПК, МПП и МКС)</li>
                                    <li>Форматы отчетов</li>
                                    <li>Система мотивации персонала</li>
                                    <li>Уязвимые места в отделах</li>
                                </ul>
                                <ul>
                                    <li>Точки роста отдела</li>
                                    <li>Работа над ошибками и разбор кейсов</li>
                                    <li>Аттестация и выдача сертификата</li>
                                    <li>Работа с коучем на период обучения</li>
                                </ul>
                            </div>
                            <button class="cta cta__courses open-modal">
                                Узнать подробнее
                            </button>
                        </div>
                        <div class="courses__img">
                            <img src="assets/img-2.svg" alt="Корпоративное обучение. Руководитель Отдела Продаж" />
                        </div>
                    </div>
                    <div class="courses__item">
                        <div class="courses__logo">
                            <img src="assets/courses-3.png"
                                alt="Корпоративное обучение. Технология Банкротного Бизнеса" />
                        </div>
                        <div class="courses__descr">
                            <h4 class="courses__title">
                                Корпоративное обучение.
                                <span>Технология Банкротного Бизнеса</span>
                            </h4>
                            <div class="courses__wrap">
                                <ul>
                                    <li>Бизнес-процессы работы офиса</li>
                                    <li>Технология посика персонала</li>
                                    <li>Система KPI и мотивация</li>
                                </ul>
                                <ul>
                                    <li>Система орг.структуры</li>
                                    <li>Технология бизнеса</li>
                                    <li>Работа с коучем на период обучения</li>
                                </ul>
                            </div>
                            <button class="cta cta__courses open-modal">
                                Узнать подробнее
                            </button>
                        </div>
                        <div class="courses__img">
                            <img src="assets/img-3.svg" alt="Корпоративное обучение. Технология Банкротного Бизнеса" />
                        </div>
                    </div>
                    <div class="courses__item">
                        <div class="courses__logo">
                            <img src="assets/courses-4.png" alt="Услуги контакт-центра" />
                        </div>
                        <div class="courses__descr">
                            <h4 class="courses__title">Услуги контакт-центра</h4>
                            <div class="courses__wrap">
                                <ul>
                                    <li>Обработка баз и реанимация баз</li>
                                    <li>Назначение и контроль встречи</li>
                                    <li>
                                        Аренда оператора БФЛ на обзвон старой базы, лид-ген или
                                        верификацию базы
                                    </li>
                                </ul>
                                <ul>
                                    <li>Аренда оператора БФЛ на назначение встречи</li>
                                </ul>
                            </div>
                            <button class="cta cta__courses open-modal">
                                Узнать подробнее
                            </button>
                        </div>
                        <div class="courses__img">
                            <img src="assets/img-4.svg" alt="Услуги контакт-центра" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="join">
            <div class="container">
                <h2 class="join__title title">
                    Станьте частью <span>самого большого сообщества</span> юристов по
                    банкротству в России
                </h2>
                <div class="join__qr">
                    <img src="assets/qr.svg"
                        alt="Сканируй QR код и вступай в самое большое сообщество юристов по банкротству в России!" />
                    <a href="https://t.me/joinchat/zXbt11oyckg1ZDYy"><svg width="75" height="75" viewBox="0 0 75 75"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_159)">
                                <path
                                    d="M37.5 0C27.5566 0 18.0117 3.95332 10.9863 10.9834C3.95369 18.0163 0.00194807 27.5542 0 37.5C0 47.4416 3.95508 56.9865 10.9863 64.0166C18.0117 71.0467 27.5566 75 37.5 75C47.4434 75 56.9883 71.0467 64.0137 64.0166C71.0449 56.9865 75 47.4416 75 37.5C75 27.5584 71.0449 18.0135 64.0137 10.9834C56.9883 3.95332 47.4434 0 37.5 0Z"
                                    fill="url(#paint0_linear_71_159)" />
                                <path
                                    d="M16.9746 37.1036C27.9082 32.3411 35.1972 29.2011 38.8418 27.6841C49.2597 23.3523 51.4218 22.5999 52.8339 22.5744C53.1445 22.5695 53.8359 22.6462 54.2871 23.011C54.6621 23.3186 54.7675 23.7346 54.8203 24.0267C54.8671 24.3185 54.9316 24.9835 54.8789 25.5027C54.3164 31.4324 51.873 45.8218 50.6308 52.4634C50.1093 55.2736 49.0722 56.2157 48.0703 56.3077C45.8906 56.5081 44.2382 54.8687 42.1289 53.4865C38.83 51.3226 36.9668 49.9761 33.7617 47.865C30.0586 45.4251 32.4609 44.0839 34.5703 41.8925C35.1211 41.3189 44.7187 32.5913 44.9003 31.7997C44.9238 31.7007 44.9472 31.3316 44.7246 31.137C44.5078 30.9419 44.1855 31.0087 43.9511 31.0615C43.6171 31.1365 38.3496 34.6216 28.1308 41.5163C26.6367 42.5441 25.2832 43.045 24.0644 43.0187C22.7285 42.99 20.1504 42.2616 18.2343 41.6394C15.8906 40.8759 14.0214 40.4722 14.1855 39.1755C14.2675 38.5005 15.1992 37.8097 16.9746 37.1036Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_71_159" x1="58.1551" y1="-1.17195e-06"
                                    x2="3.69131e-07" y2="66.1765" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#7A6BDE" />
                                    <stop offset="1" stop-color="#B1A6FF" />
                                </linearGradient>
                                <clipPath id="clip0_71_159">
                                    <rect width="75" height="75" fill="white" />
                                </clipPath>
                            </defs>
                        </svg></a>
                    <p>
                        Сканируй QR код и вступай в самое большое сообщество юристов по
                        банкротству в России!
                    </p>
                    <p>Более 14 000 юристов в телеграмм</p>
                </div>
            </div>
        </section>
        <section class="test" id="test">
            <div class="container">
                <h2 class="test__title title">
                    <span>Тестовый пакет</span> лидов на банкротство
                </h2>
                <div class="doubt__item">
                    <div class="doubt__wrap test__wrap">
                        <div class="doubt__left">
                            <div class="doubt__text">
                                Оформите тестовую неделю и убедитесь в качестве лидов прямо
                                сейчас!
                            </div>
                            <form class="form form__doubt" method="POST">
                                <input name="fio" class="fio input" placeholder="ФИО" />
                                <input type="email" name="email" class="email input" placeholder="E-Mail" />
                                <input type="tel" name="phone" class="phone input" placeholder="Номер телефона" />
                                <input type="hidden" name="region" class="region input" />
                                <input type="hidden" name="query_string"
                                    value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>"
                                    class="query_string input" />
                                <button class="cta cta__doubt cta__test" type="submit">
                                    Получить тестовый пакет
                                </button>
                            </form>
                        </div>
                        <div class="doubt__img">
                            <img src="assets/test.svg" alt="Оформите тестовую неделю и убедитесь в качестве лидов прямо
                сейчас!" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <ul class="footer__list">
                <li>
                    <p class="footer__title">Горячая линия</p>
                    <a class="footer__tel" href="tel:+79666663924">+7 966 666 3924</a>
                </li>
                <li>
                    <p class="footer__title">Почта</p>
                    <a class="footer__mail" href="mailto:general@myforce.ru">general@myforce.ru</a>
                </li>
                <li>
                    <p class="footer__title">Центральный офис</p>
                    <address>
                        344038 г.Ростов-на-Дону, Ворошиловский проспект 82/4 офис 99
                    </address>
                </li>
                <li>
                    <p class="footer__title">Об организации</p>
                    <p>ИНН: 6167130086</p>
                    <p>ОГРН: 1156196049415</p>
                </li>
            </ul>
            <a class="footer__policy" href="./documents/policy.pdf" target="_blank">Согласие на обработку данных</a>
        </div>
    </footer>
    <div class="preloader">
        <img src="assets/loading.gif" alt="Loading..." />
    </div>
    <div class="modal">
        <div class="modal__content">
            <h2 class="modal__title modal__title_w400">
                Заполните форму и мы с вами свяжемся в ближайшее время
            </h2>
            <form class="form form__modal" method="POST">
                <input name="fio" class="fio input" placeholder="ФИО" />
                <input type="email" name="email" class="email input" placeholder="E-Mail" />
                <input type="tel" name="phone" class="phone input" placeholder="Номер телефона" />
                <input type="hidden" name="region" class="region input" />
                <input type="hidden" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>"
                    class="query_string input" />
                <button class="cta cta__modal close" type="submit">
                    Оставить заявку
                </button>
            </form>
            <svg class="modal__close close" width="30px" height="30px" viewBox="0 0 1024 1024"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="#fff"
                    d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z" />
            </svg>
        </div>
    </div>
    <div class="modal">
        <div class="modal__content">
            <h2 class="modal__title">100 лидов + скрипт и CRM в подарок!</h2>
            <form class="form form__modal" method="POST">
                <input name="fio" class="fio input" placeholder="ФИО" />
                <input type="email" name="email" class="email input" placeholder="E-Mail" />
                <input type="tel" name="phone" class="phone input" placeholder="Номер телефона" />
                <input type="hidden" name="region" class="region input" />
                <input type="hidden" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>"
                    class="query_string input" />
                <button class="cta cta__modal" type="submit">Оставить заявку</button>
            </form>
            <svg class="modal__close close close" width="30px" height="30px" viewBox="0 0 1024 1024"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="#fff"
                    d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z" />
            </svg>
        </div>
    </div>
    <div class="modal">
        <div class="modal__content">
            <h2 class="modal__title modal__title_w436">
                Дадим бесплатные 10 лидов за подписку в телеграм
            </h2>
            <a href="https://t.me/joinchat/zXbt11oyckg1ZDYy"><svg width="92" height="92" viewBox="0 0 92 92" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_54_886)">
                        <path
                            d="M46 0C33.8028 0 22.0944 4.84941 13.4766 13.473C4.84986 22.1 0.00238963 33.7998 0 46C0 58.195 4.85156 69.9035 13.4766 78.527C22.0944 87.1506 33.8028 92 46 92C58.1972 92 69.9056 87.1506 78.5234 78.527C87.1484 69.9035 92 58.195 92 46C92 33.805 87.1484 22.0965 78.5234 13.473C69.9056 4.84941 58.1972 0 46 0Z"
                            fill="url(#paint0_linear_54_886)" />
                        <path
                            d="M20.8222 45.5139C34.2341 39.6719 43.1754 35.8201 47.646 33.9593C60.4254 28.6455 63.0775 27.7227 64.8097 27.6914C65.1907 27.6853 66.0388 27.7794 66.5922 28.2269C67.0522 28.6042 67.1816 29.1145 67.2463 29.4728C67.3038 29.8308 67.3829 30.6465 67.3182 31.2834C66.6282 38.5571 63.631 56.2082 62.1072 64.3552C61.4675 67.8023 60.1954 68.9581 58.9663 69.0709C56.2925 69.3167 54.2657 67.3057 51.6782 65.6101C47.6316 62.9558 45.346 61.3041 41.4144 58.7145C36.8719 55.7216 39.8188 54.0764 42.4063 51.3882C43.0819 50.6846 54.855 39.9788 55.0779 39.0078C55.1066 38.8863 55.1354 38.4335 54.8622 38.1949C54.5963 37.9555 54.201 38.0374 53.9135 38.1021C53.5038 38.1941 47.0422 42.4693 34.5072 50.9268C32.6744 52.1875 31.0141 52.802 29.5191 52.7697C27.8804 52.7344 24.7179 51.841 22.3675 51.0777C19.4925 50.1412 17.1997 49.646 17.401 48.0554C17.5016 47.2274 18.6444 46.38 20.8222 45.5139Z"
                            fill="white" />
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_54_886" x1="71.3369" y1="-1.43759e-06" x2="4.528e-07"
                            y2="81.1765" gradientUnits="userSpaceOnUse" radio>
                            <stop stop-color="#7A6BDE" />
                            <stop offset="1" stop-color="#B1A6FF" />
                        </linearGradient>
                        <clipPath id="clip0_54_886">
                            <rect width="92" height="92" fill="white" />
                        </clipPath>
                    </defs>
                </svg> </a><svg class="modal__close close close" width="30px" height="30px" viewBox="0 0 1024 1024"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="#fff"
                    d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z" />
            </svg>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="mask.js"></script>

</html>