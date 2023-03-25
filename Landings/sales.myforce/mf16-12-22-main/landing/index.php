<?php
$queryString = $_SERVER['QUERY_STRING'];
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
if (empty($_SESSION['qs'])) {
  $_SESSION['qs'] = $_SERVER['QUERY_STRING'];
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="yandex-verification" content="a8d5131a3fb7ebb2" />
  <meta name="description" content=" Авторская система лидогенерации от MYFORCE" />
  <meta name="keywords" content="лиды, клиенты, как привлечь клиентов, заявки, купить лиды, как найти клиентов для бизнеса" />
  <title>Клиенты для бизнеса под ключ | MYFORCE</title>
  <meta property="og:title" content="Клиенты для бизнеса под ключ | MYFORCE" />
  <meta property="og:description" content="Экосистема для предпринимателей и бизнеса" />
  <meta name="csrf-param" content="_csrf-core" />
  <meta name="csrf-token" content="OmcIZA1eFLGIDMLxTwWi8St4niWyUUp5oB1xMAdGXMtrEkcnWD1miPxNhpoXUvfFGAvkVf8FHTHPSBNxbSQRvQ==" />
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/imagesfavicon/favicon-16x16.png" />
  <link rel="manifest" href="./assets/images/favicon/site.webmanifest" />

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link href="css/main.css" rel="stylesheet" />

  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5" type="text/javascript"></script>

</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header__wrap">
        <a href="/" class="header__logo">MYFORCE</a>
        <nav class="nav nav__mobile">
          <a href="/" class="nav__link">Главная</a>
          <a href="#about" class="nav__link">О компании</a>
          <a href="#products" class="nav__link">Топ-продукты</a>
          <svg class="nav__close" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.66667 7.66667L14.3333 14.3333M14.3333 7.66667L7.66667 14.3333M6.33333 21H15.6667C17.5335 21 18.4669 21 19.18 20.6367C19.8072 20.3171 20.3171 19.8072 20.6367 19.18C21 18.4669 21 17.5335 21 15.6667V6.33333C21 4.46649 21 3.53307 20.6367 2.82003C20.3171 2.19282 19.8072 1.68289 19.18 1.36331C18.4669 1 17.5335 1 15.6667 1H6.33333C4.46649 1 3.53307 1 2.82003 1.36331C2.19282 1.68289 1.68289 2.19282 1.36331 2.82003C1 3.53307 1 4.46649 1 6.33333V15.6667C1 17.5335 1 18.4669 1.36331 19.18C1.68289 19.8072 2.19282 20.3171 2.82003 20.6367C3.53307 21 4.46649 21 6.33333 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </nav>

        <div class="header__contacts">
          <p class="header__text_phone">+7 966 666 3924</p>
          <a href="tel+:79666663924" class="header__phone">Позвонить</a>
        </div>

        <div class="hamburger">
          <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7H21M1 1H21M7.66667 13H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
    </div>
  </header>

  <main class="main">
    <section class="promo">
      <div class="container">
        <div class="promo__wrap">
          <div class="promo__block">
            <h1 class="promo__title">
              Экосистема для предпринимателей и бизнеса
            </h1>
            <p class="promo__subtitle">
              Удобный бизнес-сервис для предпринимателей.
            </p>
            <a href="#request" class="btn">
              <svg class="btn__arrow" width="102" height="26" viewBox="0 0 102 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M92.3536 13.3535C92.5488 13.1583 92.5488 12.8417 92.3536 12.6464L89.1716 9.46446C88.9763 9.2692 88.6597 9.2692 88.4645 9.46446C88.2692 9.65972 88.2692 9.9763 88.4645 10.1716L91.2929 13L88.4645 15.8284C88.2692 16.0237 88.2692 16.3403 88.4645 16.5355C88.6597 16.7308 88.9763 16.7308 89.1716 16.5355L92.3536 13.3535ZM4.37114e-08 13.5L92 13.5L92 12.5L-4.37114e-08 12.5L4.37114e-08 13.5Z" fill="white" />
                <circle cx="89" cy="13" r="12.5" stroke="white" />
              </svg>
              Оставить заявку
            </a>
          </div>
          <div class="promo__img">
            <div class="promo__img_abs">
              <img src="assets/images/promo-img.png" alt="Мирослав Масальский основатель MYFORCE" />
            </div>
            <div class="promo__director">
              <p>Мирослав Масальский</p>
              <p>основатель MYFORCE</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="about" id="about">
      <div class="container">
        <h2 class="about__title">О компании</h2>

        <div class="about__wrap">
          <div class="about__img">
            <div>
              <img src="assets/images/about-1.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-2.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-3.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-4.jpg" alt="" />
            </div>
          </div>

          <div class="about__slider">
            <div>
              <img src="assets/images/about-1.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-2.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-3.jpg" alt="" />
            </div>
            <div>
              <img src="assets/images/about-4.jpg" alt="" />
            </div>
          </div>
          <div class="about__block">
            <p class="about__text">
              « Мы — <span>команда MYFORCE</span> — вдохновлены тем,
              что нам удаётся менять жизнь сотен тысяч людей и повышать
              уровень образования в стране. И уверены, что сможем добиться
              большего, так как у онлайн‑образования огромный потенциал.
            </p>
            <p class="about__text">
              Мы <span>стремимся к масштабному развитию</span> не только
              компании, но и каждого человека задействованного в ней,
              ведь для нас человеческий ресурс стоит выше производственных
              мощностей. Благодаря безостановочно движению вверх, мы не только
              даём возможность для переезда или получения зарубежного опыта,
              но и <span>активно поддерживаем все стремления сотрудников</span>
              к саморазвитию за счёт богатого опыта руководителей из разных
              стран! Благодаря этому мы <span>успешно ведём бизнес</span>
              не только в России, но и в СНГ. »
            </p>
            <p class="about__descr">
              © Мирослав Масальский, основатель MYFORCE
            </p>

            <div class="about__statistic">
              <h3>ДЕЛАЕМ БИЗНЕС ДОСТУПНЫЙ ДЛЯ КАЖДОГО</h3>
              <ul class="about__list">
                <li class="about__item">
                  <p class="about__number">90 000</p>
                  <p>
                    постоянных<br />
                    пользователей
                  </p>
                </li>

                <li class="about__item">
                  <p class="about__number">547</p>
                  <p>компаний основано на наших франшизах</p>
                </li>

                <li class="about__item">
                  <p class="about__number">12 938</p>
                  <p>человек прошли обучение и посетили мероприятия</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="products" id="products">
      <div class="container">
        <h2 class="products__title">Топ-продукты</h2>

        <p class="products__text">
          Если вы впервые собираетесь работать с нами, предоставляем скидку
          20% на ЛЮБОЙ продукт из этого списка. Чтобы получить скидку вам
          необходимо сообщить, что вы пришли с сайта MYFORCE.
        </p>

        <div class="products__slider">
          <div class="products__item_act">
            <p class="title__active">Лиды</p>
            <div class="products__block">
              <div class="products__item">
                <h5>Лиды</h5>
                <p>
                  Персональная лидогенерация БФЛ в вашем регионе с дозвоном от
                  80%, лучшая отбраковка на рынке.
                </p>
                <button class="btn__mobile" id="modal-1" data-title="Лиды" data-url="assets/images/products-1.jpg">
                  Подробнее
                </button>
              </div>
            </div>
          </div>
          <div class="products__item_act">
            <p class="title__active">Франшиза</p>
            <div class="products__block">
              <div class="products__item">
                <h5>Франшиза</h5>
                <p>
                  Открываем бизнес под ключ с окупаемостью 3-6 месяцев с
                  минимальными вложениями
                </p>
                <button class="btn__mobile" id="modal-2" data-title="Франшиза" data-url="assets/images/products-2.jpg">
                  Подробнее
                </button>
              </div>
            </div>
          </div>
          <div class="products__item_act">
            <p class="title__active">CRM</p>
            <div class="products__block">
              <div class="products__item">
                <h5>CRM</h5>
                <p>
                  Индивидуальные разработки по автоматизации вашего бизнеса
                </p>
                <button class="btn__mobile" id="modal-3" data-title="CRM" data-url="assets/images/products-3.jpg">
                  Подробнее
                </button>
              </div>
            </div>
          </div>
          <div class="products__item_act">
            <p class="title__active">Курсы</p>
            <div class="products__block">
              <div class="products__item">
                <h5>Курсы</h5>
                <p>
                  Персональная лидогенерация БФЛ в вашем регионе с дозвоном от
                  Обучение среди опытных менторов и повышение квалификации
                  персонала
                </p>
                <button data-title="Курсы" class="btn__mobile" data-url="assets/images/products-4.jpg" id="modal-4">
                  Подробнее
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="mobile__slider">
          <div>
            <div class="mobile__img mobile__img-1">
              <div class="mobile__item">
                <div>
                  <h5>Лиды</h5>
                  <p>
                    Персональная лидогенерация БФЛ в вашем регионе с дозвоном
                    от 80%, лучшая отбраковка на рынке.
                  </p>
                  <button data-title="Лиды" class="btn__mobile" data-url="assets/images/products-1.jpg" id="modal-1">
                    Подробнее
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="mobile__img mobile__img-2">
              <div class="mobile__item">
                <div>
                  <h5>Франшиза</h5>
                  <p>
                    Открываем бизнес под ключ с окупаемостью 3-6 месяцев с
                    минимальными вложениями
                  </p>
                  <button data-title="Франшиза" class="btn__mobile" data-url="assets/images/products-2.jpg" id="modal-2">
                    Подробнее
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="mobile__img mobile__img-3">
              <div class="mobile__item">
                <div>
                  <h5>CRM</h5>
                  <p>
                    Индивидуальные разработки по автоматизации вашего бизнеса
                  </p>
                  <button data-title="CRM" class="btn__mobile" data-url="assets/images/products-3.jpg" id="modal-3">
                    Подробнее
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="mobile__img mobile__img-4">
              <div class="mobile__item">
                <div>
                  <h5>Курсы</h5>
                  <p>
                    Персональная лидогенерация БФЛ в вашем регионе с дозвоном
                    от Обучение среди опытных менторов и повышение
                    квалификации персонала
                  </p>
                  <button data-title="Курсы" class="btn__mobile" data-url="assets/images/products-4.jpg" id="modal-4">
                    Подробнее
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h2 class="products__title request__title">Оставить заявку</h2>
      </div>
    </section>

    <section class="request" id="request">
      <div class="container">
        <div class="request__wrap">
          <h4 class="request__text">
            Если вы уже наш партнёр и получили эту ссылку, сообщите об этом
            менеджеру или позвоните нам по горячей линии для уточнения
            доступной скидки или акции по интересующему продукту.
          </h4>
          <form class="form form-validate" id="form-validate" action="" novalidate="">

            <input type="text" id="name" placeholder="Имя" class="fio" name="fio" required />


            <input type="email" name="email" class="email" placeholder="Почта" required />


            <input type="tel" name="phone" class="phone" placeholder="Номер телефона" />

            <input type="hidden" name="region" class="region" />
            <input type="hidden" name="query-string" class="query-string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>" />

            <button type="submit" class="btn btn__request send-form">
              <svg class="btn__arrow" width="102" height="26" viewBox="0 0 102 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M92.3536 13.3535C92.5488 13.1583 92.5488 12.8417 92.3536 12.6464L89.1716 9.46446C88.9763 9.2692 88.6597 9.2692 88.4645 9.46446C88.2692 9.65972 88.2692 9.9763 88.4645 10.1716L91.2929 13L88.4645 15.8284C88.2692 16.0237 88.2692 16.3403 88.4645 16.5355C88.6597 16.7308 88.9763 16.7308 89.1716 16.5355L92.3536 13.3535ZM4.37114e-08 13.5L92 13.5L92 12.5L-4.37114e-08 12.5L4.37114e-08 13.5Z" fill="white" />
                <circle cx="89" cy="13" r="12.5" stroke="white" />
              </svg>
              Оставить заявку
            </button>
          </form>
        </div>
      </div>
      <div class="request__bg"></div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer__wrap">
        <a href="/" class="header__logo">MYFORCE</a>
        <nav class="nav__footer">
          <a href="/" class="nav__link">Главная</a>
          <a href="#about" class="nav__link">О компании</a>
          <a href="#products" class="nav__link">Топ-продукты</a>
        </nav>
        <div class="footer__contacts">
          <p class="header__text_phone">+7 966 666 3924</p>
          <a href="tel+:79666663924" class="header__phone">Позвонить</a>
        </div>
      </div>

      <div class="footer__politics">
        <p>© 2022. Все права защищены.</p>
        <a href="javascript:void(0)">Политика конфиденциальности</a>
      </div>
    </div>
  </footer>

  <div class="modal">
    <div class="modal__content">
      <div class="modal__body">
        <h5 class="modal__title">Лиды</h5>
        <ul data-id="modal-1">
          <li>- Индивидуальная Лидогенерация в Вашем регионе.</li>
          <li>
            - Клиенты для вашего бизнеса, более 20 успешных маркетологов и
            аналитиков, арбитражников трафика, и веб-мастеров, которые
            занимаются исключительно лидогенерацией.
          </li>
        </ul>
        <ul data-id="modal-2">
          <li>- Франшиза</li>
          <li>- Полное сопровождение бизнеса с нуля под ключ.</li>
          <li>
            - Профессиональное обучение штата, предоставление документации и
            рабочих программ.
          </li>
          <li>- Аналитика по работе, инструменты маркетинга.</li>
          <li>- Предоставляем клиентов.</li>
        </ul>
        <ul data-id="modal-3">
          <li>
            - Настройка, разработка текущей или новой CRM системы для вашего
            бизнеса по стандартам 2022-2023 года для любого типа компаний.
          </li>
          <li>
            - Многофункциональные шаблоны кастомизации работы ваших приложений
            и автоматизация бизнес-процессов. Разовые модули работы, роботы, а
            так же интеграции со сторонними приложениями web-разработки
          </li>
        </ul>
        <ul data-id="modal-4">
          <li>
            - Огромный выбор курсов с собственной платформой обучения.
            Профессиональные преподаватели, обучение с коучем и без.
          </li>
          <li>- Нескончаемая бесплатная база знаний.</li>
          <li>- Сертифицирование сотрудников и руководителей</li>
        </ul>
        <button class="btn btn__modal btn__modal__active">
          <svg class="btn__arrow" width="102" height="26" viewBox="0 0 102 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M92.3536 13.3535C92.5488 13.1583 92.5488 12.8417 92.3536 12.6464L89.1716 9.46446C88.9763 9.2692 88.6597 9.2692 88.4645 9.46446C88.2692 9.65972 88.2692 9.9763 88.4645 10.1716L91.2929 13L88.4645 15.8284C88.2692 16.0237 88.2692 16.3403 88.4645 16.5355C88.6597 16.7308 88.9763 16.7308 89.1716 16.5355L92.3536 13.3535ZM4.37114e-08 13.5L92 13.5L92 12.5L-4.37114e-08 12.5L4.37114e-08 13.5Z" fill="#001A33" />
            <circle cx="89" cy="13" r="12.5" stroke="#001A33" />
          </svg>
          Оставить заявку
        </button>

        <svg class="modal__close" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.66667 7.66667L14.3333 14.3333M14.3333 7.66667L7.66667 14.3333M6.33333 21H15.6667C17.5335 21 18.4669 21 19.18 20.6367C19.8072 20.3171 20.3171 19.8072 20.6367 19.18C21 18.4669 21 17.5335 21 15.6667V6.33333C21 4.46649 21 3.53307 20.6367 2.82003C20.3171 2.19282 19.8072 1.68289 19.18 1.36331C18.4669 1 17.5335 1 15.6667 1H6.33333C4.46649 1 3.53307 1 2.82003 1.36331C2.19282 1.68289 1.68289 2.19282 1.36331 2.82003C1 3.53307 1 4.46649 1 6.33333V15.6667C1 17.5335 1 18.4669 1.36331 19.18C1.68289 19.8072 2.19282 20.3171 2.82003 20.6367C3.53307 21 4.46649 21 6.33333 21Z" stroke="#001A33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </div>
  </div>

  <div class="modal" id="modal__form">
    <div class="modal__content modal__content_form">
      <div class="modal__body modal__body_form">
        <h5>Оставь заявку и получи персональную скидку</h5>
        <p>В ближайшее время мы с Вами свяжемся.</p>

        <form class="form form-validate">
          <input type="text" class="fio" placeholder="Имя" name="fio" />
          <input type="email" name="email" class="email" placeholder="Почта" />
          <input type="tel" name="phone" class="phone" placeholder="Номер телефона" />
          <input type="hidden" class="region" name="region" />
          <input type="hidden" class="query-string" name="query-string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>">

          <button type="submit" class="btn btn__modal btn__modal_form send-form">
            Оставить заявку
          </button>
        </form>

        <svg class="modal__close modal__close_form" width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 8.33333L15 15.6667M15 8.33333L8 15.6667M6.6 23H16.4C18.3602 23 19.3403 23 20.089 22.6004C20.7475 22.2488 21.283 21.6879 21.6185 20.998C22 20.2136 22 19.1869 22 17.1333V6.86667C22 4.81314 22 3.78638 21.6185 3.00203C21.283 2.31211 20.7475 1.75118 20.089 1.39964C19.3403 1 18.3602 1 16.4 1H6.6C4.63982 1 3.65972 1 2.91103 1.39964C2.25247 1.75118 1.71703 2.31211 1.38148 3.00203C1 3.78638 1 4.81314 1 6.86667V17.1333C1 19.1869 1 20.2136 1.38148 20.998C1.71703 21.6879 2.25247 22.2488 2.91103 22.6004C3.65972 23 4.63982 23 6.6 23Z" stroke="url(#paint0_linear_53_107)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <defs>
            <linearGradient id="paint0_linear_53_107" x1="1" y1="12" x2="22" y2="12" gradientUnits="userSpaceOnUse">
              <stop stop-color="#00C6FB" />
              <stop offset="1" stop-color="#005BEA" />
            </linearGradient>
          </defs>
        </svg>
      </div>
    </div>
  </div>



  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script src="./js/mask.js"></script>


  <script src="./js/main.js"></script>

  <script src="./js/validate.js"></script>
  <script src="./js/script.js"></script>




</body>

</html>