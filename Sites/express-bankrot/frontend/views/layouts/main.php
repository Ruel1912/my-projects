<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\models\Articles;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
$params = [];
foreach ($_GET as $key => $item)
    $params[$key] = htmlspecialchars($item);
$js =<<< JS
    $('input, radio').styler({});
    $('input, checkbox').styler({});
JS;
$this->registerJs($js);
$articles = Articles::find()->orderBy(['date' => SORT_DESC])->limit(5)->asArray()->all();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:regular,italic,700,700italic" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:200,300,regular,500,600,700,900" rel="stylesheet" />
  <script
    src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5"
    type="text/javascript"></script>
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
  (function(m, e, t, r, i, k, a) {
    m[i] = m[i] || function() {
      (m[i].a = m[i].a || []).push(arguments)
    };
    m[i].l = 1 * new Date();
    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
      k, a)
  })
  (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

  ym(85901036, "init", {
    clickmap: true,
    trackLinks: true,
    accurateTrackBounce: true
  });
  </script>
  <noscript>
    <div><img src="https://mc.yandex.ru/watch/85901036" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->
  <?php $this->beginBody() ?>
  <div class="wrapper">
    <header class="header">
      <div class="header_top">
        <div class="container">
          <div class="header_top_wrapper">
            <div class="header_top_left">
              <a class="header_top_left-logo" href="<?= Url::to(['/']) ?>">
                <img class="header_top_left-logo-image" src="<?= Url::to(['img/logo.svg']) ?>" alt="logo">
              </a>
            </div>
            <div class="header_top_right">
              <?php if (Yii::$app->getUser()->isGuest): ?>
              <a class="header_top_right_link" href="<?= Url::to(['login']) ?>">Войти</a>
              <a class="header_top_right_link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
              <?php else: ?>
              <!-- <a class="header_top_right_link" href="<?= Url::to(['/cabinet']) ?>">Войти в личный
                кабинет</a> -->
              <div class="cabinet_header-usename-wrappper">
                <!-- Для красного колокольчика добавть кнопке класс 'red' -->
                <button type="button" class="btn cabinet_header-usename " name="username">
                  <p>Татьяна Анатольевна Веселова</p>
                </button>
                <ul class="cabinet_header-usename_spoiler">
                  <li class="cabinet_header-usename_spoiler-item">
                    <a href="/cabinet/procedure-steps" class="link link--gray">Этапы процедуры</a>
                  </li>
                  <li class="cabinet_header-usename_spoiler-item">
                    <a href="/cabinet" class="link link--gray">Мой профиль</a>
                  </li>
                  <li class="cabinet_header-usename_spoiler-item">
                    <a href="/cabinet/help" class="link link--gray">Тех.поддержка</a>
                  </li>
                  <li class="cabinet_header-usename_spoiler-item">
                    <a href="/site/logout" class="link link--gray">Выход</a>
                  </li>
                </ul>
              </div>
              <a class="header_top_right_link" href="<?= Url::to(['logout']) ?>">Выход</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container">
          <div class="header_bottom_wrapper">
            <div class="BurgerBTN">
              <div class="BurgerBTN_wrap">
                <div class="BurgerBTN_string"></div>
                <div class="BurgerBTN_string"></div>
                <div class="BurgerBTN_string"></div>
              </div>
            </div>
            <nav class="header_bottom_navigation">
              <a class="header_bottom_navigation-lunk header_bottom_navigation-lunk_thank open-popup" data-call="thank"
                href="javascript:void(0)">Поблагодарить <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                  fill="none" viewBox="0 0 23 23">
                  <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m6.917 12.417 2.75 2.75 6.417-6.417" />
                  <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.5 20.667a9.167 9.167 0 1 0 0-18.333 9.167 9.167 0 0 0 0 18.333Z" />
                </svg></a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['services']) ?>">Услуги</a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['complited']) ?>">Практика</a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['reviews']) ?>">Отзывы</a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['news']) ?>">Новости</a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['knowledge-base']) ?>">Полезные
                материалы</a>
              <a class="header_bottom_navigation-lunk" href="<?= Url::to(['contacts']) ?>">Контакты</a>
              <a class="header_bottom_navigation-lunk header_bottom_navigation-lunk_report open-popup"
                data-call="report" href="javascript:void(0)">Пожаловаться <svg xmlns="http://www.w3.org/2000/svg"
                  width="22" height="21" fill="none" viewBox="0 0 22 21">
                  <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 7.875v3.5m0 3.5h.01M9.73 3.405l-7.539 12.43c-.418.69-.627 1.035-.596 1.318a.868.868 0 0 0 .372.617c.241.167.659.167 1.493.167h15.08c.834 0 1.251 0 1.492-.167a.868.868 0 0 0 .373-.617c.031-.283-.178-.628-.596-1.317l-7.54-12.431c-.417-.687-.625-1.03-.897-1.146a.957.957 0 0 0-.745 0c-.271.115-.48.459-.896 1.146Z" />
                </svg></a>
            </nav>
            <!-- <div class="header_bottom_right">
              <button class="header_bottom_right-text open-popup" data-call="feedback">Заказать обратный звонок</button>
            </div> -->
          </div>
        </div>
      </div>
    </header>
    <div class="PopupBack"></div>
    <div class="PopupWrap">
      <section class="Popup">
        <button class="PopupClose">
          <img src="<?= Url::to(['img/close.svg']) ?>" alt="close">
        </button>

        <div class="Popup_Staps Popup_Stap1">
          <div class="Popups">
          <?= Html::beginForm([' '], 'post', ['enctype' => 'multipart/form-data', 'class' => 'PopupForm']) ?>
            <div class="Popup_Staps_content Popup_Staps_content_feedback">
              <h2 class="Popup_Staps-title">Укажите ваши данные для связи и получите консультацию юриста</h2>
              <div class="orderpage_inpgroup">
                <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                <input class="InputT" required placeholder="Ваш город" minlength="2" type="text" name="region">
              </div>
              <button type="submit" class="orderpage_btn btn btn--red">
                Заказать обратный звонок
              </button>
              <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                  class="link link--gray" href="<?= Url::to(['/privacypolicy']) ?>">согласие на обработку персональных
                  данных</a> в соответствии с 152-ФЗ</p>
            </div>
            <?= Html::endForm() ?>
            <?= Html::beginForm([' '], 'post', ['enctype' => 'multipart/form-data',]) ?>
            <div class="Popup_Staps_content Popup_Staps_content_thank">
              <h2 class="Popup_Staps-title">Мы очень рады, что смогли вам помочь!</h2>
              <h3 class="Popup_Staps-sub-title">Пожалуйста, заполните форму ниже и мы передадим Ваши пожелания
                ответственному лицу.</h3>
              <div class="orderpage_inpgroup">
                <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                <input class="InputT" required placeholder="Ваш город" minlength="2" type="text" name="region">
                <textarea name="message[Комментарий]" placeholder="Напишите пару слов о компании/сотруднике/отзыв"
                  class="InputT"></textarea>
              </div>
              <button type="submit" class="orderpage_btn btn btn--red">
                Спасибо за помощь!
              </button>
              <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                  class="link link--gray" href="<?= Url::to(['/privacypolicy']) ?>">согласие на обработку персональных
                  данных</a> в соответствии с 152-ФЗ</p>
            </div>
            <?= Html::endForm() ?>
            <?= Html::beginForm([' '], 'post', ['enctype' => 'multipart/form-data',]) ?>
            <div class="Popup_Staps_content Popup_Staps_content_report">
              <h2 class="Popup_Staps-title">Нам очень жаль, если у вас возникли проблемы</h2>
              <h3 class="Popup_Staps-sub-title">Пожалуйста, заполните форму ниже, и мы немедленно займёмся решением
                вашей проблемы</h3>
              <div class="orderpage_inpgroup">
                <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                <input class="InputT" required placeholder="Ваш город" minlength="2" type="text" name="region">
                <textarea name="message[Комментарий]" placeholder="Напишите о Вашей проблеме" class="InputT"></textarea>
              </div>
              <button type="submit" class="orderpage_btn btn btn--red">
                Перезвоните мне
              </button>
              <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                  class="link link--gray" href="<?= Url::to(['/privacypolicy']) ?>">согласие на обработку персональных
                  данных</a> в соответствии с 152-ФЗ</p>
            </div>
            <?= Html::endForm() ?>
            <?= Html::beginForm([' '], 'post', ['enctype' => 'multipart/form-data',]) ?>
            <div class="Popup_Staps_content Popup_Staps_content_leave">
              <h2 class="Popup_Staps-title">Вы уже уходите?</h2>
              <div class="orderpage_inpgroup">
                <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                <input class="InputT" required placeholder="Ваш город" minlength="2" type="text" name="region">
                <textarea name="message[Комментарий]" placeholder="Напишите о Вашей проблеме" class="InputT"></textarea>
              </div>
              <button type="submit" class="orderpage_btn btn btn--red">
                Получить презентацию
              </button>
              <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                  class="link link--gray" href="<?= Url::to(['/privacypolicy']) ?>">согласие на обработку персональных
                  данных</a> в соответствии с 152-ФЗ</p>
            </div>
            <?= Html::endForm() ?>
          </div>
        </div>

        <div class="Popup_Staps Popup_Stap2">
          <div class="Popup_Staps_content">
            <h2 class="Popup_Staps-title">Спасибо за заявку!</h2>
            <h3 class="Popup_Staps-subtitle">Ожидайте звонка нашего юриста в течение 3 минут с номера</h3>
            <a class="Popup_Staps-phone js-footer_phone">+7 (473) 280-01-01</a>
          </div>
        </div>
      </section>
    </div>

    <div class="BurgerBack"></div>
    <nav class="BurgerMenu">
      <img class="BurgerMenuClose" src="<?= Url::to(['img/close.svg']) ?>" alt="close">
      <div class="container">
        <div class="BurgerMenu_wrapper">
          <div class="BurgerMenu_bottom">
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['services']) ?>">Услуги</a>
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['complited']) ?>">Практика</a>
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['reviews']) ?>">Отзывы</a>
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['news']) ?>">Новости</a>
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['knowledge-base']) ?>">Полезные
              материалы</a>
            <a class="header_bottom_navigation-lunk" href="<?= Url::to(['contacts']) ?>">Контакты</a>
          </div>
          <div class="header_top_right BurgerMenu_top">
            <?php if (Yii::$app->getUser()->isGuest): ?>
            <a class="header_top_right_link" href="<?= Url::to(['login']) ?>">Войти</a>
            <a class="header_top_right_link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
            <?php else: ?>
            <a class="header_top_right_link" href="<?= Url::to(['/cabinet']) ?>">Войти в личный кабинет</a>
            <a class="header_top_right_link" href="<?= Url::to(['logout']) ?>">Выход</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>

    <main class="main">
      <?= $content ?>
      <?php if ((Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'mainorder' || Yii::$app->controller->action->id == 'firstorder' || Yii::$app->controller->action->id == 'secondorder' || Yii::$app->controller->action->id == 'therdorder' || Yii::$app->controller->action->id == 'consultation' || Yii::$app->controller->action->id == 'quiz' || Yii::$app->controller->action->id == 'thanks') && !empty($articles)) : ?>
      <section class="popular-articles">
        <div class="container">
          <div class="popular-articles_wrapper">
            <div class="popular-articles_left">
              <h2 class="popular-articles_left-title">Популярные статьи</h2>
              <?php if (Yii::$app->controller->action->id == 'index') : ?>
              <aside class="popular-articles_left_consultation">
                <h3 class="popular-articles_left_consultation-title">
                  Получите консультацию юриста по вашей проблеме
                </h3>
                <p class="popular-articles_left_consultation-info">
                  Оставьте заявку и наш юрист вас проконсультирует в течение 10 минут
                </p>
                <a class="btn btn--blue" href="<?= Url::to(['consultation']) ?>">Получить
                  консультацию</a>
              </aside>
              <?php endif; ?>

              <?php if (
                  Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'consultation' || Yii::$app->controller->action->id == 'firstorder' || Yii::$app->controller->action->id == 'secondorder' ||
                  Yii::$app->controller->action->id == 'therdorder' || Yii::$app->controller->action->id == 'quiz'
                ) : ?>
              <aside class="popular-articles_left_mainorder">
                <h2 class="popular-articles_left_mainorder-title">
                  Получите варианты списания вашего долга уже сегодня
                </h2>
                <p class="popular-articles_left_mainorder-text">
                  Ответье на 3 вопроса и получите:
                </p>
                <ul class="popular-articles_left_mainorder_group">
                  <li class="popular-articles_left_mainorder_group-text">
                    Полный аудит вашей проблемы
                  </li>
                  <li class="popular-articles_left_mainorder_group-text">
                    План списания долга
                  </li>
                  <li class="popular-articles_left_mainorder_group-text">
                    Инструкцию «Топ-8 правил как общаться с коллекторами»
                  </li>
                </ul>
                <a class="btn btn--red" href="<?= Url::to(['mainorder']) ?>">Получить план
                  списания</a>
              </aside>
              <?php endif; ?>
            </div>
            <div class="popular-articles_right">
              <div class="popular-articles_right_wrap">
                <?php foreach ($articles as $k => $v) : ?>
                <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>" class="popular-articles_right_card">
                  <img class="popular-articles_right_card-img"
                    src="<?= Url::to([str_replace( "/admin", '/backend/web', $v['image'])]) ?>" alt="image">
                  <div class="popular-articles_right_card_info">
                    <p class="popular-articles_right_card_info-category">
                      <?= $v['category'] ?>
                    </p>
                    <h3 class="popular-articles_right_card_info-title">
                      <?= $v['title'] ?>
                    </h3>
                    <p class="popular-articles_right_card_info-text"><?= $v['sub_title'] ?></p>
                    <div class="popular-articles_right_card_info_bottom">
                      <p class="popular-articles_right_card_info_bottom-date">
                        <?= date('d.m.Y', strtotime($v['date'])) ?>
                      </p>
                      <div class="popular-articles_right_card_info_bottom_right">
                        <div class="popular-articles_right_card_info_bottom_right-group">
                          <img src="<?= Url::to(['img/views.svg']) ?>" alt="views">
                          <p class="popular-articles_right_card_info_bottom_right-group-text">
                            <?= $v['views'] ?></p>
                        </div>
                        <div class="popular-articles_right_card_info_bottom_right-group">
                          <img src="<?= Url::to(['img/like.svg']) ?>" alt="like">
                          <p class="popular-articles_right_card_info_bottom_right-group-text">
                            <?= $v['likes'] ?></p>
                        </div>
                        <div class="popular-articles_right_card_info_bottom_right-group">
                          <img src="<?= Url::to(['img/dislike.svg']) ?>" alt="deslike">
                          <p class="popular-articles_right_card_info_bottom_right-group-text">
                            <?= $v['dizlike'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <?php endforeach; ?>
              </div>
              <a class="MoreServBTN" href="<?= Url::to(['news']) ?>">Больше статей о списании
                долгов</a>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if (Yii::$app->controller->action->id == 'index') : ?>
      <section class="mainpage_last">
        <div class="container">
          <div class="mainpage_last_wrapper_top">
            <div class="mainpage_last_top_left">
              <h2 class="mainpage_guarantees_left">
                Сотрудничаем с банками и МФО
              </h2>
              <aside class="mainpage_last_top_left_aside">
                <h3 class="mainpage_last_top_left_aside-title">
                  Не нашли свой банк?
                </h3>
                <p class="mainpage_last_top_left_aside-text">
                  Свяжитесь с нами и мы уточним информацию в вашем банке
                </p>
                <a href="<?= Url::to(['consultation']) ?>" class="btn btn--blue">
                  Перезвоните мне!
                </a>
              </aside>
            </div>
            <div class="mainpage_last_top_right">
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-1.png']) ?>" alt="tinkoff">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-2.png']) ?>" alt="vtb">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-3.png']) ?>" alt="money-now">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-4.png']) ?>" alt="fast-money">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-5.png']) ?>" alt="bks-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-6.png']) ?>" alt="finam">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-7.png']) ?>" alt="opening-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-8.png']) ?>" alt="alfa-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-9.png']) ?>" alt="gusprom-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-10.png']) ?>" alt="moscow-ind-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-11.png']) ?>" alt="post-bank">
              </div>
              <div class="mainpage_last_top_right-card">
                <img src="<?= Url::to(['img/banks-12.png']) ?>" alt="sber">
              </div>
            </div>
          </div>
          <div class="mainpage_last_wrapper">
            <div class="mainpage_last_group">
              <div class="mainpage_last_group_colunm">
                <img src="<?= Url::to(['img/mainpage_last-1.svg']) ?>" alt="message">
                <p class="mainpage_last_group_colunm-text">
                  Более 25 юристов по всей России
                </p>
              </div>
              <div class="mainpage_last_group_colunm">
                <img src="<?= Url::to(['img/mainpage_last-2.svg']) ?>" alt="books">
                <p class="mainpage_last_group_colunm-text">
                  Более 5 лет опыта в банкротстве физических лиц
                </p>
              </div>
              <div class="mainpage_last_group_colunm">
                <img src="<?= Url::to(['img/mainpage_last-3.svg']) ?>" alt="weights">
                <p class="mainpage_last_group_colunm-text">
                  Более 500 млн рублей списано
                </p>
              </div>
              <div class="mainpage_last_group_colunm">
                <img src="<?= Url::to(['img/mainpage_last-4.svg']) ?>" alt="case">
                <p class="mainpage_last_group_colunm-text">
                  Более 1500 дел завершено
                </p>
              </div>
            </div>
            <p class="mainpage_last-prevbtn">
              Не теряйте время! Доверьтесь профессионалам и начните жизнь с чистого листа!
            </p>
            <a class="btn btn--red" href="<?= Url::to(['consultation']) ?>">ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ ЮРИСТА</a>
          </div>
        </div>
      </section>
      <?php endif; ?>
    </main>

    <footer class="footer">
      <div class="container">
        <div class="footer_wrapper">
          <div class="footer_top">
            <div class="footer_top_left">
              <div class="footer_top_left_text">
                <p class="footer_top_left_text-title">Осуществляем юридическую помощь:</p>
                <div class="footer_top_left_text_group">
                  <ul class="footer_top_left_text_group-colunm">
                    <li class="footer_top_left_text_group-colunm-text">
                      Полное списание долгов
                    </li>
                    <li class="footer_top_left_text_group-colunm-text">
                      Частичное списание долгов
                    </li>
                    <li class="footer_top_left_text_group-colunm-text">
                      Реструктуризация долгов
                    </li>
                    <li class="footer_top_left_text_group-colunm-text">
                      Банкротство военнослужащих
                    </li>
                  </ul>
                  <ul class="footer_top_left_text_group-colunm">
                    <li class="footer_top_left_text_group-colunm-text">
                      Банкротство пенсионеров
                    </li>
                    <li class="footer_top_left_text_group-colunm-text">
                      Банкротство с ипотекой
                    </li>
                    <li class="footer_top_left_text_group-colunm-text">
                      Банкротство многодетных семей
                    </li>
                  </ul>
                </div>
              </div>
              <div class="footer_top_left_links">
                <p class="footer_top_left_links-title">Сервисы</p>
                <nav class="footer_top_left_links_group">
                  <ul class="footer_top_left_links_group-colunm">
                    <a class="footer_top_left_link" href="<?= Url::to(['']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Личный кабинет
                      </li>
                    </a>
                    <a class="footer_top_left_link" href="<?= Url::to(['contacts']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Контакты
                      </li>
                    </a>
                  </ul>
                  <ul class="footer_top_left_links_group-colunm">
                    <a class="footer_top_left_link" href="<?= Url::to(['reviews']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Отзывы
                      </li>
                    </a>
                    <a class="footer_top_left_link" href="<?= Url::to(['news']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Новости
                      </li>
                    </a>
                  </ul>
                  <ul class="footer_top_left_links_group-colunm">
                    <a class="footer_top_left_link" href="<?= Url::to(['services']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Услуги
                      </li>
                    </a>
                    <a class="footer_top_left_link" href="<?= Url::to(['knowledge-base']) ?>">
                      <li class="footer_top_left_links_group-colunm-text">
                        Знания
                      </li>
                    </a>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="footer_top_right">
              <a class="footer_top_right-logo" href="<?= Url::to(['/']) ?>">
                <img src="<?= Url::to(['img/footerlogo.svg']) ?>" alt="logo">
              </a>
              <a class="footer_top_right-link js-footer_phone" href="<?= Url::to('tel:+7 (473) 280-01-01') ?>">+7 (473)
                280-01-01</a>
              <a class="footer_top_right-link"
                href="<?= Url::to('mailto:info@express-bankrot.ru ') ?>">info@express-bankrot.ru </a>
              <a class="footer_top_right-link" href="<?= Url::to('javascript:void(0)') ?>">с 09-00 до 18-00 пн-пт</a>
              <p class="footer_top_right-description">*отправляя формы на данном сайте, вы даете согласие
                на обработку персональных данных в соответствии <br> с 152-ФЗ</p>
              <div class="footer_socials">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none"
                    viewBox="0 0 35 35">
                    <g clip-path="url(#a)">
                      <path fill="url(#b)"
                        d="M29.817 34.889H5.18a5.073 5.073 0 0 1-5.07-5.071V5.18A5.071 5.071 0 0 1 5.18.11h24.647c2.8 0 5.071 2.272 5.071 5.07v24.647a5.086 5.086 0 0 1-5.081 5.062Z" />
                      <path fill="#F6921E"
                        d="M29.817 34.89v-.106H5.18a4.941 4.941 0 0 1-3.509-1.458 4.941 4.941 0 0 1-1.457-3.509V5.181a4.94 4.94 0 0 1 1.457-3.51A4.94 4.94 0 0 1 5.181.216h24.646a4.94 4.94 0 0 1 3.51 1.458 4.94 4.94 0 0 1 1.457 3.508v24.647a4.94 4.94 0 0 1-1.458 3.51 4.941 4.941 0 0 1-3.509 1.457v.201a5.18 5.18 0 0 0 5.177-5.177V5.18A5.18 5.18 0 0 0 29.827.004H5.18A5.18 5.18 0 0 0 .004 5.18v24.647a5.18 5.18 0 0 0 5.176 5.177h24.647l-.01-.116Z" />
                      <path fill="#fff"
                        d="M17.499 17.893a6.302 6.302 0 0 0 6.298-6.298 6.302 6.302 0 0 0-6.298-6.298 6.309 6.309 0 0 0-6.298 6.298 6.308 6.308 0 0 0 6.298 6.298Zm0-8.906a2.61 2.61 0 0 1 2.607 2.607 2.61 2.61 0 0 1-2.607 2.607 2.61 2.61 0 0 1-2.608-2.607A2.61 2.61 0 0 1 17.5 8.987Zm2.549 14.043a11.629 11.629 0 0 0 3.663-1.514 1.847 1.847 0 0 0 .574-2.55 1.856 1.856 0 0 0-2.55-.584 8.012 8.012 0 0 1-8.483 0 1.829 1.829 0 0 0-2.54.584 1.848 1.848 0 0 0 .574 2.55 11.63 11.63 0 0 0 3.662 1.515l-3.518 3.518c-.72.72-.72 1.89 0 2.608a1.851 1.851 0 0 0 2.607 0l3.461-3.462 3.461 3.462a1.844 1.844 0 0 0 2.607-2.608l-3.518-3.518Z" />
                    </g>
                    <defs>
                      <linearGradient id="b" x1="17.503" x2="17.503" y1="34.887" y2=".11"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F05822" />
                        <stop offset="1" stop-color="#F47E20" />
                      </linearGradient>
                      <clipPath id="a">
                        <path fill="#fff" d="M0 0h35v35H0z" />
                      </clipPath>
                    </defs>
                  </svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="43" height="25" fill="none"
                    viewBox="0 0 43 25">
                    <path fill="#2787F5" fill-rule="evenodd"
                      d="M42.013 1.693c.3-.976 0-1.693-1.422-1.693h-4.705C34.69 0 34.14.62 33.84 1.302c0 0-2.392 5.709-5.781 9.417-1.097 1.073-1.595 1.415-2.193 1.415-.3 0-.732-.342-.732-1.318V1.693C25.134.522 24.787 0 23.79 0h-7.392C15.65 0 15.2.543 15.2 1.059c0 1.11 1.694 1.366 1.869 4.488v6.782c0 1.487-.275 1.756-.873 1.756-1.595 0-5.474-5.734-7.774-12.295C7.971.515 7.518 0 6.316 0H1.613C.269 0 0 .62 0 1.302c0 1.22 1.595 7.27 7.426 15.272C11.313 22.038 16.79 25 21.774 25c2.99 0 3.36-.658 3.36-1.791v-4.13c0-1.316.283-1.578 1.23-1.578.698 0 1.894.341 4.685 2.976 3.19 3.122 3.715 4.523 5.51 4.523h4.704c1.344 0 2.016-.658 1.628-1.956-.424-1.294-1.947-3.172-3.968-5.397-1.096-1.269-2.74-2.635-3.24-3.318-.697-.878-.498-1.268 0-2.049 0 0 5.732-7.904 6.33-10.587Z"
                      clip-rule="evenodd" />
                  </svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" fill="none"
                    viewBox="0 0 28 29">
                    <path fill="#34AADF"
                      d="M13.517 28.017c7.464 0 13.516-6.051 13.516-13.516S20.981.984 13.516.984C6.053.984 0 7.036 0 14.501s6.052 13.516 13.517 13.516Z" />
                    <path fill="#fff"
                      d="M5.794 14.206s6.696-2.849 9.018-3.852c.89-.4 3.909-1.685 3.909-1.685s1.393-.561 1.277.803c-.039.561-.348 2.527-.658 4.654-.465 3.008-.968 6.298-.968 6.298s-.077.923-.735 1.083c-.658.16-1.742-.561-1.935-.722-.155-.12-2.903-1.925-3.909-2.808-.27-.24-.58-.722.039-1.284a150.265 150.265 0 0 0 4.063-4.012c.465-.481.93-1.605-1.006-.24-2.747 1.965-5.457 3.81-5.457 3.81s-.619.402-1.78.04a78.35 78.35 0 0 1-2.516-.842s-.928-.601.658-1.243Z" />
                  </svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="none"
                    viewBox="0 0 27 27">
                    <path fill="#00D95F"
                      d="m.033 26.577 1.876-6.971a12.881 12.881 0 0 1-1.354-8.925 12.906 12.906 0 0 1 4.838-7.628 12.966 12.966 0 0 1 16.922 1.093A12.886 12.886 0 0 1 23.63 21.01a12.945 12.945 0 0 1-7.585 4.924c-3.04.677-6.223.239-8.964-1.235L.033 26.577Zm7.387-4.488.436.258a10.483 10.483 0 0 0 12.67-1.537 10.411 10.411 0 0 0 1.75-12.61c-1.145-2-2.92-3.567-5.05-4.455a10.486 10.486 0 0 0-6.726-.457 10.462 10.462 0 0 0-5.608 3.73 10.417 10.417 0 0 0-2.163 6.369 10.297 10.297 0 0 0 1.53 5.409l.273.449-1.05 3.89L7.42 22.09Z" />
                    <path fill="#00D95F" fill-rule="evenodd"
                      d="M18 15.177a2.16 2.16 0 0 0-1.848-.42c-.48.2-.79.95-1.1 1.327a.458.458 0 0 1-.591.132 8.363 8.363 0 0 1-4.181-3.574.5.5 0 0 1 .066-.692c.346-.342.6-.765.739-1.23a2.677 2.677 0 0 0-.34-1.475 3.448 3.448 0 0 0-1.071-1.613 1.48 1.48 0 0 0-1.589.243 3.258 3.258 0 0 0-1.13 2.579c.001.273.036.545.104.81.171.637.435 1.245.783 1.806.25.43.524.845.82 1.245a12.583 12.583 0 0 0 3.553 3.287c.696.434 1.44.788 2.216 1.053a4.917 4.917 0 0 0 2.578.405 3.1 3.1 0 0 0 2.335-1.731 1.47 1.47 0 0 0 .11-.884c-.132-.612-.952-.973-1.455-1.268Z"
                      clip-rule="evenodd" />
                  </svg></a>

              </div>
            </div>
          </div>
          <div class="footer_bottom">
            <a target="_blank" class="footer_bottom-text footer_bottom-link"
              href="<?= Url::to(['/privacypolicy']) ?>">Политика
              конфиденциальности</a>
            <a target="_blank" class="footer_bottom-text footer_bottom-link"
              href="https://drive.google.com/file/d/1cduABxUYt9fpGwJEbm2Q0j5bmsGqGiMy/view">Договор оферты</a>
            <p class="footer_bottom-text">ИНН: 4826150800 </p>
            <p class="footer_bottom-text">ОГРН: 1214800013944</p>
            <p class="footer_bottom-text">ООО «ЭКСПРЕСС-БАНКРОТ»</p>
            <p class="footer_bottom-text js-address">г. Воронеж, ул. Фридриха Энгельса д.25Б, офис 102, БЦ БиК.</p>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <?php $this->endBody() ?>
</body>
<?php if (Yii::$app->controller->action->id == 'services') : ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(2)').addClass('active');
</script>
<?php elseif (Yii::$app->controller->action->id == 'complited') : ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(3)').addClass('active');
</script>
<?php elseif (Yii::$app->controller->action->id == 'reviews') : ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(4)').addClass('active');
</script>
<?php elseif (Yii::$app->controller->action->id == 'news' || Yii::$app->controller->action->id == 'article' || Yii::$app->controller->action->id == 'search') : ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(5)').addClass('active');
</script>
<?php elseif (Yii::$app->controller->action->id == 'knowledge-base') : ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(6)').addClass('active');
</script>
<?php elseif (Yii::$app->controller->action->id == 'contacts'): ?>
<script>
$('.header_bottom_navigation-lunk:nth-child(7)').addClass('active');
</script>
<?php endif; ?>


</html>
<?php $this->endPage() ?>