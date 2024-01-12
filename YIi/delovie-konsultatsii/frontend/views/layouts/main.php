<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\Html;;

AppAsset::register($this);
?>
<?php 
$this->beginPage();
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (empty($_SESSION['qs'])) {
  $_SESSION['qs'] = $_SERVER['QUERY_STRING'];
}
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= Yii::$app->name?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script
    src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5"
    type="text/javascript"></script>
  <?php
    $this->registerCsrfMetaTags();
    $this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
    $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
    $this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? 'Банкротство физических лиц Гарантия полной процедуры банкротства от подачи заявления до получения решения в суде! Узнайте, возможно ли в вашей ситуации списать долги Узнать Дистанционное банкротство с нами – безопасно и надежно! Заполните анкету и мы подберем лучший вариант для Вас Почему надежно? Аргументы нашей надежности Мы работаем в сфере оказания финансовых и юридических услуг']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? 'Деловые консультации']);
    $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
    $this->head();
    ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>
  <header class="header">
    <div class="container">
      <nav class="header_wrapper">
        <div class="header_logo logo">
          <a href="/" class="header_logo_link">
            <img class="main" src="/images/logo.svg" alt="Деловые консультации">
          </a>
        </div>
        <ul class="header_list">
          <li class="header_list_item"><a href="<?= Url::to(['/about'])?>"
              class="header_list_link <?= $this->context->route == "site/about" ? "active" : "" ?>">О нас</a>
          </li>
          <li class="header_list_item"><a href="<?= Url::to(['/#services'])?>" class="header_list_link">Услуги</a></li>
          <li class="header_list_item"><a href="<?= Url::to(['/review'])?>"
              class="header_list_link  <?= $this->context->route == "site/review" ? "active" : "" ?>">Отзывы</a></li>
          <li class="header_list_item"><a href="<?= Url::to(['/case'])?>"
              class="header_list_link  <?= $this->context->route == "site/case" ? "active" : "" ?>">Практика</a></li>
          <li class="header_list_item"><a href="<?= Url::to(['/support'])?>"
              class="header_list_link <?= $this->context->route == "site/support" ? "active" : "" ?>">Вопрос-ответ</a>
          </li>
          <li class="header_list_item  "><a href="<?= Url::to(['/contact'])?>"
              class="header_list_link <?= $this->context->route == "site/contact" ? "active" : "" ?>">Контакты</a></li>
        </ul>
        <div class="header_phone mobile">
          <a href="tel:+79951273037">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 25 27" fill="none">
              <path
                d="M3.125 6.1875C3.125 15.818 10.3537 23.625 19.2708 23.625C19.6731 23.625 20.072 23.6091 20.467 23.5779C20.9202 23.542 21.1468 23.5241 21.3531 23.3958C21.5239 23.2896 21.686 23.1013 21.7716 22.9095C21.875 22.678 21.875 22.4079 21.875 21.8677V18.6983C21.875 18.244 21.875 18.0169 21.8058 17.8222C21.7446 17.6502 21.6453 17.4971 21.5166 17.3763C21.3708 17.2395 21.1732 17.1619 20.7779 17.0066L17.4375 15.6948C16.9776 15.5141 16.7476 15.4238 16.5295 15.4392C16.3371 15.4527 16.152 15.5236 15.9947 15.644C15.8164 15.7805 15.6905 16.0071 15.4387 16.4603L14.5833 18C11.8231 16.6499 9.58531 14.23 8.33333 11.25L9.75899 10.3262C10.1786 10.0543 10.3884 9.91832 10.5148 9.72569C10.6263 9.55584 10.692 9.35592 10.7045 9.14816C10.7187 8.91255 10.635 8.66422 10.4678 8.16755L9.25311 4.55986C9.10938 4.13298 9.03751 3.91954 8.91085 3.76211C8.79897 3.62305 8.65718 3.51579 8.49794 3.44976C8.31766 3.375 8.10737 3.375 7.68679 3.375H4.7521C4.25196 3.375 4.00189 3.375 3.78748 3.48666C3.6099 3.57914 3.43556 3.75414 3.33719 3.93866C3.21842 4.16145 3.20182 4.4062 3.16863 4.89569C3.13971 5.32222 3.125 5.753 3.125 6.1875Z"
                fill="#162E3C" />
            </svg>
          </a>
        </div>
        <div class="header_contacts">
          <small class="header_contacts_time">Пн.-Пт. 8:30 - 17:30</small>
          <span class="header_contacts_link-title">8 995 127 30 37</span>
          <a href="tel:79951273037" class="header_contacts_link link primary">Перезвоните мне</a>
        </div>
        <div class="burger"><span></span> <span></span> <span></span></div>
        <div class="burger-menu">
          <div class="close_modal close_burger">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path
                d="M16.5208 17.1875C16.3542 17.1875 16.1875 17.1042 16.1042 17.0208L9.85417 10.7708L3.60417 17.0208C3.35417 17.2708 2.9375 17.2708 2.6875 17.0208C2.4375 16.7708 2.4375 16.3542 2.6875 16.1042L8.9375 9.85417L2.6875 3.60417C2.4375 3.35417 2.4375 2.9375 2.6875 2.6875C2.9375 2.4375 3.35417 2.4375 3.60417 2.6875L9.85417 8.9375L16.1042 2.6875C16.3542 2.4375 16.7708 2.4375 17.0208 2.6875C17.2708 2.9375 17.2708 3.35417 17.0208 3.60417L10.7708 9.85417L17.0208 16.1042C17.2708 16.3542 17.2708 16.7708 17.0208 17.0208C16.8542 17.1042 16.6875 17.1875 16.5208 17.1875Z"
                fill="#ABABAB" />
            </svg>
          </div>
          <div class="burger_wrapper">
            <ul class="burger_list">
              <li class="burger_list_item"><a href="<?= Url::to(['/about'])?>" class="burger_list_link link secondary">О
                  нас</a>
              </li>
              <li class="burger_list_item"><a href="<?= Url::to(['/#services'])?>"
                  class="burger_list_link link secondary">Услуги</a>
              </li>
              <li class="burger_list_item"><a href="<?= Url::to(['/review'])?>"
                  class="burger_list_link link secondary">Отзывы</a></li>
              <li class="burger_list_item"><a href="<?= Url::to(['/case'])?>"
                  class="burger_list_link link secondary">Практика</a></li>
              <li class="burger_list_item"><a href="<?= Url::to(['/support'])?>"
                  class="burger_list_link link secondary">Вопрос-ответ</a>
              </li>
              <li class="burger_list_item"><a href="<?= Url::to(['/contact'])?>"
                  class="burger_list_link link secondary">Контакты</a>
              </li>
            </ul>
            <span class="burger_title">8 995 127 30 37</span>
            <a href="tel:+7 995 127 30 37" class="burger_link link secondary"><u>Заказать обратный звонок</u></a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main role="main" class="flex-shrink-0">
    <div class="main__content">
      <?= $content ?>
    </div>
  </main>
  <section class="main_banner">
    <div class="container">
      <div class="main_banner_wrapper">
        <?= Html::beginForm(['/site/send-form'], 'post', ['class' => 'main_banner_form form']) ?>
        <h5 class="main_banner_title fs-xxl">Мы можем помочь</h5>
        <div class="main_banner_form_row">
          <div class="main_banner_form_row_left">
            <div class="form_row">
              <div class="form_row_header">
                <span>Ваше имя</span>
              </div>
              <input onchange="validate(this)" class="form_input" type="text" placeholder="Введите имя" name="fio"
                required>
            </div>
            <div class="form_row">
              <div class="form_row_header">
                <span>Ваш номер телеофна</span>
              </div>
              <input onchange="validate(this)" class="form_input" type="tel" placeholder="+7" name="phone" required>
            </div>
          </div>
          <div class="main_banner_form_row_right">
            <div class="form_row textarea">
              <div class="form_row_header">
                <span>Опишите вашу проблему</span>
                <span>0/300</span>
              </div>
              <textarea onchange="validate(this)" class="form_input" name="message[Сообщение]" cols="30" rows="10"
                placeholder="Что у вас случилось.."></textarea>
            </div>
            <button class="button button-primary" disabled>Отправить</button>
            <p class="main_banner_text">Отправляя заявку, вы даёте своё согласие <br> на обработку ваших персональных
              данных</p>
          </div>
        </div>
        <input type="hidden" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>">
        <input type="hidden" name="region" class="region input" />
        <?= Html::endForm() ?>
        <div class="main_banner_image">
          <img src="<?= Url::to('@web/images/main-banner.webp')?>" alt="фото мы можем помочь">
          <img src="<?= Url::to('@web/images/main-banner-mobile.webp')?>" alt="фото мы можем помочь">
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="container">
      <div class="footer_wrapper">
        <div class="footer_left">
          <div class="header_logo logo">
            <a href="/" class="header_logo_link">
              <img class="main" src="/images/logo.svg" alt="Деловые консультации">
            </a>
          </div>
          <ul class="header_list">
            <li class="header_list_item"><a href="<?= Url::to(['/about'])?>" class="header_list_link">О нас</a>
            </li>
            <!-- <li class="header_list_item"><a href="<?//= Url::to(['/service'])?>" class="header_list_link">Услуги</a></li> -->
            <li class="header_list_item"><a href="<?= Url::to(['/review'])?>" class="header_list_link">Отзывы</a></li>
            <li class="header_list_item"><a href="<?= Url::to(['/case'])?>" class="header_list_link">Практика</a></li>
            <li class="header_list_item"><a href="<?= Url::to(['/support'])?>" class="header_list_link">Вопрос-ответ</a>
            </li>
            <li class="header_list_item"><a href="<?= Url::to(['/contact'])?>" class="header_list_link">Контакты</a>
            </li>
          </ul>
          <a href="tel:+7 (995)-127-30-37" class="header_contacts_link-title link primary">
            8 995 127 30 37</a>
          <a href="tel:+7 (8453)-52-93-01" class="header_contacts_link-title link primary">
            8-(8453)-52-93-01</a>
          <div class="footer_block">
            <h6 class="footer_block_title">Режим работы:</h6>
            <p class="footer_block_text">Понедельник - Пятница <br> с 8:30 до 17:30</p>
          </div>
          <div class="footer_block">
            <h6 class="footer_block_title">Электронная почта:</h6>
            <p class="footer_block_text">dolgu.net@del-audit.ru</p>
          </div>
          <p class="footer_info">
            Работаем по всей Саратовской области и по всей РФ<br>
            ИНН: 6449066230<br>
            ОГРН: 1126449003339<br>
            КПП: 644901001<br>
          </p>
        </div>
        <div class="footer_middle">
          <ul class="header_list">
            <li class="header_list_item"><a href="<?= Url::to(['/about'])?>" class="header_list_link">О нас</a>
            </li>
            <!-- <li class="header_list_item"><a href="<?//= Url::to(['/service'])?>" class="header_list_link">Услуги</a></li> -->
            <li class="header_list_item"><a href="<?= Url::to(['/review'])?>" class="header_list_link">Отзывы</a></li>
            <li class="header_list_item"><a href="<?= Url::to(['/case'])?>" class="header_list_link">Практика</a></li>
            <li class="header_list_item"><a href="<?= Url::to(['/support'])?>" class="header_list_link">Вопрос-ответ</a>
            </li>
            <li class="header_list_item"><a href="<?= Url::to(['/contact'])?>" class="header_list_link">Контакты</a>
            </li>
          </ul>
        </div>
        <div class="footer_right">
        <script type="text/javascript" charset="utf-8" async
          src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae04d576a2a827d5371d42ade3966616f8cbf2461f2482f821cbc7bf19e885426&amp;width=584&amp;height=316&amp;lang=ru_RU&amp;scroll=true">
        </script>
        </div>
      </div>
      <div class="footer_mobile_map">
        <script type="text/javascript" charset="utf-8" async
          src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae04d576a2a827d5371d42ade3966616f8cbf2461f2482f821cbc7bf19e885426&amp;width=100%&amp;height=316&amp;lang=ru_RU&amp;scroll=true">
        </script>
      </div>
      <a href="<?= Url::to(['/policy'])?>" class="footer_notice">
        Политика конфиденциальности
      </a>
      <p class="footer_notice">
        Сайт не является публичной офертой
      </p>
    </div>
  </footer>

  <div class="modal main-modal">
    <div class="modal__content">
      <div class="close_modal">
        <img src="<?= Url::to('@web/images/icon/close.svg') ?>" class="close" alt="X">
      </div>
      <h2 class="modal__title fs-m">Укажите ваши данные для связи и получите консультацию юриста</h2>
      <?= Html::beginForm(['/site/send-form'], 'post', ['class' => 'modal__form form']) ?>
      <div class="form_row">
        <div class="form_row_header">
          <span>Ваше имя</span>
        </div>
        <input onchange="validate(this)" class="form_input" type="text" placeholder="Введите имя" name="fio" required>
      </div>
      <div class="form_row">
        <div class="form_row_header">
          <span>Ваш номер телеофна</span>
        </div>
        <input onchange="validate(this)" class="form_input" type="tel" placeholder="+7" name="phone" required>
      </div>
      <div class="form_row">
        <div class="form_row_header">
          <span>Из какого Вы города</span>
        </div>
        <input onchange="validate(this)" class="form_input" type="text" placeholder="Город" name="region" required>
      </div>
      <input type="hidden" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>">
      <button class="button button-primary close" disabled>Отправить заявку</button>
      <?= Html::endForm() ?>
      <p class="main_banner_text">Отправляя заявку, вы даёте своё согласие <br> на обработку ваших персональных
        данных</p>
    </div>
  </div>
  <div class="modal thank-modal">
    <div class="modal__content">
      <div class="close_modal">
        <img src="<?= Url::to('@web/images/icon/close.svg') ?>" class="close" alt="X">
      </div>
      <h2 class="modal_thank_title fs-m">Спасибо за заявку!</h2>
      <p class="modal_text">Ожидайте звонка нашего юриста <br> в течение 3 минут с номера</p>
      <a href="tel:+7 995 127 30 37" class="modal_link link primary fs-m">8 995 127 30 37</a>
    </div>
  </div>
  </div>
  </div>
  <div class="preloader">
    <div class="preloader_item"></div>
  </div>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();