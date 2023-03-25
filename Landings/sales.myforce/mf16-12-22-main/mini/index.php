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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="yandex-verification" content="a8d5131a3fb7ebb2" />
    <title>Поднимаем бизнес на вершину</title>
    <meta name="keywords" content="экосистема, предприниматели, бизнес" />
    <meta
      name="description"
      content="Экосистема для предпринимателей и бизнеса"
    />
    <meta property="og:title" content="Юридическая фирма SBM-право" />
    <meta
      property="og:description"
      content="Экосистема для предпринимателей и бизнеса"
    />
    <meta name="csrf-param" content="_csrf-core" />
    <meta
      name="csrf-token"
      content="OmcIZA1eFLGIDMLxTwWi8St4niWyUUp5oB1xMAdGXMtrEkcnWD1miPxNhpoXUvfFGAvkVf8FHTHPSBNxbSQRvQ=="
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="./img/favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./img/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./img/favicon/favicon-16x16.png"
    />
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="./img/favicon/site.webmanifest" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <script
      src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5"
      type="text/javascript"
    ></script>
  </head>
  <body>
    <main class="main">
      <div class="container">
        <div class="promo">
          <header>
            <a href="/" class="header__logo">MYFORCE</a>
            <nav>
              <ul class="header__links links">
                <li>
                  <a href="/" class="header__logo mobile">MYFORCE</a>
                </li>
                <li>
                  <a href="tel:+7 966 666 3924" class="links__tel"
                    >+7 966 666 3924</a
                  >
                </li>
                <li>
                  <a href="javascript:void(0)" class="links__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Позвонить</a>
                </li>
              </ul>
            </nav>
          </header>
          <h1 class="promo__title">
            Экосистема для предпринимателей и бизнеса
          </h1>
          <p class="promo__text">
            Оставь заявку и получи скидку
            <span class="fw-bold">до 60%</span> на любой продукт.
          </p>

          <a
            href="javascript:void(0)"
            class="promo__btn"
            data-bs-toggle="modal" data-bs-target="#exampleModal"
            >Оставить заявку</a
          >
        </div>
      </div>
      <div class="badge">
        <ul class="header__links links">
          <li>
            <a  class="links__tel" href="javascript:void(0)" >+7 966 666 3924</a>
          </li>
          <li>
            <a href="tel:+7 966 666 3924" class="links__btn">Позвонить</a>
          </li>
        </ul>
        <img
          src="./img/promo/boss.png"
          alt="Мирослав Масальский"
          class="badge__img"
        />
        <div class="badge__footer">
          <h2 class="badge-title">Мирослав Масальский</h2>
          <h3 class="badge-subtitle">основатель MYFORCE</h3>
        </div>
      </div>
    </main>

    <!-- Модальное окно -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
            <svg
              data-bs-dismiss="modal"
              aria-label="Закрыть"
              width="26"
              height="27"
              viewBox="0 0 26 27"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M9 9.33333L17 17.6667M17 9.33333L9 17.6667M7.4 26H18.6C20.8402 26 21.9603 26 22.816 25.5459C23.5686 25.1464 24.1805 24.509 24.564 23.725C25 22.8337 25 21.6669 25 19.3333V7.66667C25 5.33311 25 4.16634 24.564 3.27504C24.1805 2.49103 23.5686 1.85361 22.816 1.45414C21.9603 1 20.8402 1 18.6 1H7.4C5.15979 1 4.03969 1 3.18404 1.45414C2.43139 1.85361 1.81947 2.49103 1.43597 3.27504C1 4.16634 1 5.33311 1 7.66667V19.3333C1 21.6669 1 22.8337 1.43597 23.725C1.81947 24.509 2.43139 25.1464 3.18404 25.5459C4.03969 26 5.15979 26 7.4 26Z"
                stroke="url(#paint0_linear_34_156)"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <defs>
                <linearGradient
                  id="paint0_linear_34_156"
                  x1="1"
                  y1="13.5"
                  x2="25"
                  y2="13.5"
                  gradientUnits="userSpaceOnUse"
                >
                  <stop stop-color="#00C6FB" />
                  <stop offset="1" stop-color="#005BEA" />
                </linearGradient>
              </defs>
            </svg>
            <h2 class="title">Оставь заявку и получи персональную скидку</h2>
            <h2 class="mob-title">Оставьте заявку</h2>
            <h3 class="sub-title">В ближайшее время мы с Вами свяжемся.</h3>
            <form class="form-validate" action="" novalidate="">
              <div class="form-group">
                <input
                  type="text"
                  class="fio"
                  name="fio"
                  placeholder="Имя"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  class="email"
                  name="email"
                  placeholder="Почта"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="tel"
                  class="phone tel-mask"
                  placeholder="Номер телефона"
                  name="phone"
                  required
                />
              </div>
              <input type="hidden" name="region" class="region" />
                <input type="hidden" class="query-string" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>" />
              <button type="submit" class="button send-form">
                Оставить заявку
              </button>
            </form>
          </div>

      </div>

    </div>
  </div>
</div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
      integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/mask.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/validateForm.js"></script>
  </body>
</html>
