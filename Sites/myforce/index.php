<?php
    $title = "Лиды на банкротство физических лиц с гарантией конверсии";
    $description = "Лиды на банкротство физических лиц с гарантией конверсии для юристов и юридических компаний. У нас вы купите только качественные лиды";
    $keywords = "лиды на банкротство, купить лиды";
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="<?= $keywords ?>">
  <meta name="description" content="<?= $description ?>">
  <meta property="og:title" content="<?= $title ?>">
  <meta property="og:image" content="https://клиенты-для-юриста.рф/images/logo.svg">
  <meta property="og:url" content="https://клиенты-для-юриста.рф">
  <meta property="og:description" content="<?= $description ?>">
  <title><?= $title ?></title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/index.css">
  <script
    src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5"
    type="text/javascript"></script>
  <link rel="stylesheet" media="(max-width: 1400px)" href="/css/mobile.css">
</head>

<body>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/header.php' ?>
  <main>
    <section class="promo">
      <div class="promo_top">
        <div class="container">
          <h1 class="promo_title">Лиды на банкротство физических лиц с гарантией конверсии
          </h1>
          <p class="promo_text">Получайте реальных клиентов на банкротство с фиксированным ROI</p>
          <div class="promo_control">
            <button class="button open-modal" data-modal="main">
              Оставить заявку
            </button>
            <button class="border-button button open-modal" data-modal="presentation">
              Получить видео-презентацию
            </button>
          </div>
        </div>
      </div>
      <div class="promo_bottom">
        <div class="container">
          <div class="promo_bottom_items">
            <div class="promo_bottom_item">
              <img src="/images/promo1.svg" alt="100">
              <h3 class="promo_bottom_item_title">лидов в тарифе</h3>
            </div>
            <div class="promo_bottom_item">
              <img src="/images/promo2.svg" alt="6%">
              <h3 class="promo_bottom_item_title">гарантия на конверсию</h3>
            </div>
            <div class="promo_bottom_item">
              <img src="/images/promo3.svg" alt="100%">
              <h3 class="promo_bottom_item_title">замена брака</h3>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="quality">
      <div class="container">
        <h2 class="title">Какого качества лиды на банкротство вы получаете</h2>
        <div class="quality_items">
          <div class="quality_item quality_item1">
            <img src="/images/infographics/quiality1.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Все лиды пришли с живой рекламы Яндекс Директ</h3>
          </div>
          <div class="quality_item quality_item2">
            <img src="/images/infographics/quiality2.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Все лиды обработаны нашим живым Контакт-Центром</h3>
          </div>
          <div class="quality_item quality_item3">
            <img src="/images/infographics/quiality3.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title"> Все лиды на 100% соответствуют: региону, сумме долга, актуальной проблеме
            </h3>
          </div>
          <div class="quality_item quality_item4">
            <img src="/images/infographics/quiality4.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Все лиды передаются партнеру в реальном времени без задержки</h3>
          </div>
          <div class="quality_item quality_item5">
            <img src="/images/infographics/quiality5.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Даем лиды только в одни руки</h3>
          </div>
          <div class="quality_item quality_item6">
            <img src="/images/infographics/quiality6.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Дозвон по лидам более 95%</h3>
          </div>
          <div class="quality_item quality_item7">
            <img src="/images/infographics/quiality7.svg" alt="Инфографика" class="quality_item_img">
            <h3 class="quality_item_title">Каждый лид знает, что ему будет перезванивать юрист и ждет звонка!</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="record">
      <div class="container">
        <h2 class="title">Записи разговоров из контакт-центра</h2>
        <div class="record_row">
          <div class="record_col">
            <a download href="/sounds/Целевой Ангелина.mp3" class="border-button record_button">Запись разговора <svg
                width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.0001 1V15.4444M11.0001 15.4444L15.4446 10.5833M11.0001 15.4444L6.55566 10.5833"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M14.3333 21.0002H7.66667C4.52397 21.0002 2.95262 21.0002 1.97631 20.0238C1 19.0475 1 17.4762 1 14.3335M21 14.3335C21 17.4762 21 19.0475 20.0237 20.0238C19.6906 20.3569 19.2882 20.5764 18.7778 20.7209"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <a download href="/sounds/Ирина целевой.mp3" class="border-button record_button">Запись разговора <svg
                width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.0001 1V15.4444M11.0001 15.4444L15.4446 10.5833M11.0001 15.4444L6.55566 10.5833"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M14.3333 21.0002H7.66667C4.52397 21.0002 2.95262 21.0002 1.97631 20.0238C1 19.0475 1 17.4762 1 14.3335M21 14.3335C21 17.4762 21 19.0475 20.0237 20.0238C19.6906 20.3569 19.2882 20.5764 18.7778 20.7209"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
          <div class="record_col">
            <img src="/images/infographics/record.svg" alt="Инфографика">
          </div>
          <div class="record_col">
            <a download href="/sounds/Ирина Рагулина.mp3" class="border-button record_button">Запись разговора <svg
                width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.0001 1V15.4444M11.0001 15.4444L15.4446 10.5833M11.0001 15.4444L6.55566 10.5833"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M14.3333 21.0002H7.66667C4.52397 21.0002 2.95262 21.0002 1.97631 20.0238C1 19.0475 1 17.4762 1 14.3335M21 14.3335C21 17.4762 21 19.0475 20.0237 20.0238C19.6906 20.3569 19.2882 20.5764 18.7778 20.7209"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <a download href="/sounds/Гитюк целевой.mp3" class="border-button record_button">Запись разговора <svg
                width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.0001 1V15.4444M11.0001 15.4444L15.4446 10.5833M11.0001 15.4444L6.55566 10.5833"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M14.3333 21.0002H7.66667C4.52397 21.0002 2.95262 21.0002 1.97631 20.0238C1 19.0475 1 17.4762 1 14.3335M21 14.3335C21 17.4762 21 19.0475 20.0237 20.0238C19.6906 20.3569 19.2882 20.5764 18.7778 20.7209"
                  stroke="black" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
        <button class="button open-modal" data-modal="presentation">Получить презентацию лидов</button>
      </div>
    </section>

    <section class="tarif" id="tarif">
      <div class="container">
        <h2 class="title">Тарифы на лиды с обработкой контакт-центра</h2>
        <div class="tarif_cards">
          <div class="tarif_card">
            <div class="tarif_card_header">
              <h3 class="tarif_card_title">Стартовый</h3>
            </div>
            <div class="tarif_card_body">
              <ul class="tarif_card_list">
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>100 лидов в пакете</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>25% замены брака</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>Стандартный сценарий работы арендованного контакт-центра</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>Источник трафика - Яндекс Директ</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                    viewBox="0 0 13 13" fill="none">
                    <path d="M1 1L12 12" stroke="#B00000" stroke-width="0.9375" />
                    <path d="M12 1L1 12" stroke="#B00000" stroke-width="0.9375" />
                  </svg>Фильтры по сумме долга</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                    viewBox="0 0 13 13" fill="none">
                    <path d="M1 1L12 12" stroke="#B00000" stroke-width="0.9375" />
                    <path d="M12 1L1 12" stroke="#B00000" stroke-width="0.9375" />
                  </svg>Фильтры по имуществу</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                    viewBox="0 0 13 13" fill="none">
                    <path d="M1 1L12 12" stroke="#B00000" stroke-width="0.9375" />
                    <path d="M12 1L1 12" stroke="#B00000" stroke-width="0.9375" />
                  </svg> Фильтры по автокредиту</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                    viewBox="0 0 13 13" fill="none">
                    <path d="M1 1L12 12" stroke="#B00000" stroke-width="0.9375" />
                    <path d="M12 1L1 12" stroke="#B00000" stroke-width="0.9375" />
                  </svg>Гарантия на конверсию в договор</li>
              </ul>
            </div>
            <div class="tarif_card_footer">
              <div class="tarif_card_footer_wrapper">
                <h4 class="tarif_card_price">от 49.000р</h4>
                <button class="button tarif_button open-modal" data-modal="buy" data-tarif="Стартовый">Купить лиды</button>
              </div>
            </div>

          </div>
          <div class="tarif_card">
            <div class="tarif_card_header">
              <h3 class="tarif_card_title">Профессиональный</h3>
            </div>
            <div class="tarif_card_body">
              <ul class="tarif_card_list">
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>150 лидов в пакете</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>25% замены брака</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Фильтры по сумме долга <br> <span>(От 100.000 до 250.000 долга)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Фильтры по имуществу <br> <span>(Без ипотеки и залога)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Стандартный сценарий работы арендованного контакт-центра <br> <span>(с возможностью добавить
                      название компании и согласовать время перезвона)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>Источник трафика - Яндекс Директ</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Гарантия на конверсию в договор <br> <span>(До 4.5%)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                    viewBox="0 0 13 13" fill="none">
                    <path d="M1 1L12 12" stroke="#B00000" stroke-width="0.9375" />
                    <path d="M12 1L1 12" stroke="#B00000" stroke-width="0.9375" />
                  </svg>Фильтры по автокредиту </li>
              </ul>
            </div>
            <div class="tarif_card_footer">
              <div class="tarif_card_footer_wrapper">
                <h4 class="tarif_card_price">от 99.000р</h4>
                <button class="button tarif_button open-modal" data-modal="buy" data-tarif="Профессиональный">Купить лиды</button>
              </div>
            </div>

          </div>
          <div class="tarif_card">
            <div class="tarif_card_header">
              <h3 class="tarif_card_title">Корпоративный</h3>
            </div>
            <div class="tarif_card_body">
              <ul class="tarif_card_list">
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>300 лидов в пакете</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>25% замены брака</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Фильтры по сумме долга br <span>(От 100.000 до500.000 долга)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Фильтры по имуществу <br> <span>(Без ипотеки и залога)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Фильтры по автокредиту <br> <span>(Без автокредита)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Уникальный сценарий работы арендованного контакт-центра <br> <span> (по техническому заданию
                      партнера)</span></p>
                </li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>Источник трафика - Яндекс Директ</li>
                <li class="tarif_card_list_item"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="11"
                    viewBox="0 0 13 11" fill="none">
                    <path d="M1 7.77657L3.73569 9.83055C4.09843 10.1029 4.61115 10.0406 4.89827 9.68934L12 1"
                      stroke="#00B02A" stroke-linecap="round" />
                  </svg>
                  <p>Гарантия на конверсию в договор <br> <span>(До 6%)</span></p>
                </li>
              </ul>
            </div>
            <div class="tarif_card_footer">
              <div class="tarif_card_footer_wrapper">
                <h4 class="tarif_card_price">от 195.000р</h4>
                <button class="button tarif_button open-modal" data-modal="buy" data-tarif="Корпоративный">Купить лиды</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class='guarantee'>
      <div class='container'>
        <div class="guarantee_wrapper">
          <img src="/images/Waves.svg" alt="Волна">
          <h2 class="guarantee_title"><strong>Мы даём гарантию на сделки</strong> со своих лидов, так как уверены в их
            качестве </h2>
          <h3 class="guarantee_sub-title">Подробнее о гарантиях и конверсии уточняйте у менеджеров</h3>
          <img src="/images/Waves.svg" alt="Волна">
          <button class="button open-modal" data-modal="guarantee">Уточнить условия гарантии</button>
        </div>
      </div>
    </section>

    <section class='free' id='free'>
      <div class='container'>
        <h2 class='title free_title'>Обучаем работе с лидами в каждом тарифе</h2>
        <p class="free_text">12 уроков по эффективной обработке лидов на банкротство доступны в Личном кабинете
          партнера! Регистрируйтесь и получайте ценные знания бесплатно!</p>
        <div class='box-with-img free_row'>
          <div class='box-with-img_left free_left'>
            <div class="free_video">
              <div class='embed-container'><iframe src='https://www.youtube.com/embed/1A7T7JKj4Iw' frameborder='0'
                  allowfullscreen></iframe></div>
            </div>
          </div>
          <div class='box-with-img_right free_right'>
            <img src='/images/infographics/free.svg' alt='Инфографика'>
          </div>
        </div>
        <button class="button has-link"><a target="_blank" href="https://user.myforce.ru/education">Пройти бесплатный курс по
            работе с лидами</a></button>
      </div>
    </section>
    <section class='delivery'>
      <div class='container'>
        <h2 class='title delivery_title'>Условия поставки лидов на банкротство</h2>
        <div class="delivery_items">
          <div class="delivery_item">
            <div class="delivery_item_left">
              <img class="delivery_img" src="/images/delivery1.svg" alt="партнер">
              <h3 class="delivery_item_title">Только 1 партнер на 1 регион</h3>
              <p class="delivery_text">Наш трафик лидов ограничен, мы не можем давать много качественных лидов всем
                желающим</p>
            </div>
            <div class="delivery_item_right">1</div>

          </div>
          <div class="delivery_item">
            <div class="delivery_item_left">
              <img class="delivery_img" src="/images/delivery2.svg" alt="Звуковая волна">
              <h3 class="delivery_item_title">У вас должна быть CRM и запись звонков</h3>
              <p class="delivery_text">Если вы не используете CRM в работе, то мы не даем гарантию на конверсию в лидах
              </p>
            </div>
            <div class="delivery_item_right">2</div>

          </div>
          <div class="delivery_item">
            <div class="delivery_item_left">
              <img class="delivery_img" src="/images/delivery3.svg" alt="Человек">
              <h3 class="delivery_item_title">Нам нужен доступ к вашей CRM</h3>
              <p class="delivery_text">Мы должны видеть качество обработки лидов, чтобы быть уверенными, что лиды
                прозваниваются как надо</p>
            </div>
            <div class="delivery_item_right">3</div>

          </div>
          <div class="delivery_item">
            <div class="delivery_item_left">
              <img class="delivery_img" src="/images/delivery4.svg" alt="Наушники">
              <h3 class="delivery_item_title">Вы прислушиваетесь к нашим рекомендациям</h3>
              <p class="delivery_text">Нам важно, чтобы у вас были сделки, а это значит, что мы заинтересованы в
                максимально эффективной обработке лидов.</p>
            </div>
            <div class="delivery_item_right">4</div>

          </div>
          <div class="delivery_item_right delivery_item_right_last"><svg xmlns="http://www.w3.org/2000/svg" width="22"
              height="19" viewBox="0 0 22 19" fill="none">
              <path d="M1 13.8002L5.97399 17.6799C6.63351 18.1943 7.56572 18.0767 8.08777 17.4132L21 1" stroke="black"
                stroke-width="2" stroke-linecap="round" />
            </svg></div>
        </div>
      </div>
    </section>
    <section class='region'>
      <div class='container'>
        <div class="guarantee_wrapper">
          <img src="/images/Waves.svg" alt="Волна">
          <h3 class="guarantee_sub-title region_sub-title">Если вас устраивает такой подход к бизнесу, то давайте
            резервировать регион и запускать сотрудничество!</h3>
          <img src="/images/Waves.svg" alt="Волна">
          <button class="button open-modal" data-modal="region">Уточнить свободен ли ваш регион</button>
        </div>
      </div>
    </section>
    <section class='gift'>
      <div class='container'>
        <h2 class='title gift_title'>Получите до <span>25</span> лидов в подарок</h2>
        <div class='gift_row box-with-img'>
          <div class='gift_left box-with-img_left'>
            <ul class="gift_items">
              <li class="gift_item">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                  <path d="M12 13.8337L17.9732 18.3136C18.7404 18.8889 19.8214 18.7758 20.4529 18.0542L32.1667 4.66699"
                    stroke="#0BCA7A" stroke-width="2" stroke-linecap="round" />
                  <path
                    d="M34 17.5C34 20.9476 32.9202 24.3085 30.9119 27.1109C28.9039 29.9133 26.0683 32.0162 22.8038 33.1244C19.5392 34.2325 16.0095 34.2902 12.7103 33.2896C9.41119 32.2888 6.50842 30.2796 4.40967 27.5447C2.31093 24.8095 1.12164 21.4857 1.00884 18.0399C0.896034 14.5942 1.86539 11.1996 3.78075 8.3331C5.69612 5.46655 8.46128 3.27196 11.6879 2.05756C14.9145 0.843144 18.4405 0.669931 21.7706 1.56223"
                    stroke="#0BCA7A" stroke-width="2" stroke-linecap="round" />
                </svg>
                <h3 class="gift_item_title"><strong>Расскажите о нас</strong> своим партнерам и отправьте ссылку на наш
                  сайт</h3>
              </li>
              <li class="gift_item">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                  <path d="M12 13.8337L17.9732 18.3136C18.7404 18.8889 19.8214 18.7758 20.4529 18.0542L32.1667 4.66699"
                    stroke="#0BCA7A" stroke-width="2" stroke-linecap="round" />
                  <path
                    d="M34 17.5C34 20.9476 32.9202 24.3085 30.9119 27.1109C28.9039 29.9133 26.0683 32.0162 22.8038 33.1244C19.5392 34.2325 16.0095 34.2902 12.7103 33.2896C9.41119 32.2888 6.50842 30.2796 4.40967 27.5447C2.31093 24.8095 1.12164 21.4857 1.00884 18.0399C0.896034 14.5942 1.86539 11.1996 3.78075 8.3331C5.69612 5.46655 8.46128 3.27196 11.6879 2.05756C14.9145 0.843144 18.4405 0.669931 21.7706 1.56223"
                    stroke="#0BCA7A" stroke-width="2" stroke-linecap="round" />
                </svg>
                <h3 class="gift_item_title"><strong>Получите 25 лидов</strong> в случае, если ваш партнер приобретет любой Тариф</h3>
              </li>
            </ul>
            <button class="button has-link"><a href="https://t.me/+yLw_MO5Tc-ozMjEy">Подписаться на Telegram
                канал</a></button>
          </div>
          <div class='gift_right box-with-img_right'>
            <img src='/images/gift.png' alt='Подарок'>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/footer.php' ?>
</body>

</html>