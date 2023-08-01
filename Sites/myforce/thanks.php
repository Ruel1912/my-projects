<?php
    $title = "Спасибо за вашу заявку!";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="<?= $title ?>">
  <meta property="og:image" content="https://клиенты-для-юриста.рф/images/logo.svg">
  <meta property="og:url" content="https://клиенты-для-юриста.рф">
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
    <section class='thanks'>
      <div class='container'>
        <h2 class='thanks__title title'>Спасибо за вашу заявку!</h2>
        <div class='box-with-img'>
          <div class='box-with-img_left'>
            <h3 class="thanks-sub-title">Наши менеджеры свяжутся с вами в течение скорого времени</h3>
            <button class="button has-link"><a href="index.php">Вернуться назад</a></button>
            <div class="thanks-pres">
              <h4 class="thanks-pres-title">Вам доступна видео презентация тарифов</h4>
              <div class="free_video">
                <div class='embed-container'><iframe src='https://www.youtube.com/embed/Y9uCBC0FJ6w' frameborder='0'
                    allowfullscreen></iframe></div>
              </div>
            </div>
          </div>
          <div class='box-with-img_right'>
            <img src='/images/infographics/thank.svg' alt='Инфографика'>
          </div>
        </div>
      </div>

    </section>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/footer.php' ?>
  </body>

</html>