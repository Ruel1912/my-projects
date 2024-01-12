<?php

use backend\models\Articles;
use backend\models\UserModel;
use backend\models\UserPayments;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\CabinetAsset;

if (Yii::$app->controller->action->id !== 'cfs2'){
    $js =<<< JS
    $('input, radio').styler({});
    $('input, checkbox').styler({});
JS;
$this->registerJs($js);
}
$jss =<<< JS
$('.popC-form').on("submit", function (e) {
    if ($('input[name="quest"]').is(':checked')){
    $.ajax({
      url: "/cabinet/send-jur-form",
      type: "POST",
      data: $(this).serialize(),
      }).done(function(rsp) {
          $('.popC_Stap1').fadeOut(300, function(){
              $('.popC_Stap2').fadeIn(300);
          });
    });
    }
  e.preventDefault();
});
JS;
$this->registerJs($jss);
$id = Yii::$app->getUser()->getId();
$user = UserModel::findOne(['id' => $id]);
$datePayments = UserPayments::find()->where(['user_id' => $id, 'status' => 0])->andWhere('CURDATE() > date_exp')->orderBy('id desc')->one();
$datePaymentsBlock = UserPayments::find()->where(['user_id' => $id, 'status' => 0])->andWhere('CURDATE() < date_exp')->orderBy('id desc')->one();
CabinetAsset::register($this);
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
  <style>
  .jq-file__browse {
    color: transparent !important;
  }

  .file-preloader {
    display: none;
    background-color: rgba(0, 0, 0, 0.2);
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 10000;
  }

  .file-preloader>div {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .file-preloader>div>div {
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 10px;
  }
  </style>
  <div class="file-preloader">
    <div>
      <div>Загрузка файлов. Пожалуйста, ожидайте...</div>
    </div>
  </div>
  <?php $this->beginBody() ?>
  <div class="wrapper">
    <header class="cabinet_header">
      <div class="container">
        <div class="cabinet_header_left">
          <div class="cabinet_burger-btn-wrap">
            <button class="cabinet_burger-btn">
              <div class="cabinet_burger-btn-string"></div>
              <div class="cabinet_burger-btn-string"></div>
              <div class="cabinet_burger-btn-string"></div>
            </button>
          </div>
          <a class="header_top_left-logo" href="<?= Url::to(['/cabinet']) ?>">
            <img src="<?= Url::to(['/img/logo.svg']) ?>" alt="logo">
          </a>
        </div>
        <div class="cabinet_header_right">
          <!-- Для изменения текста добавть div-у ниже класс 'red' -->
          <?php if (!empty($datePayments)): ?>
          <div class="cabinet_header-date red">
            <p class="cabinet_header-date-t1">Процедура приостановлена</p>
          </div>
          <?php endif; ?>


          <div class="cabinet_header-usename-wrappper">
            <!-- Для красного колокольчика добавть кнопке класс 'red' -->
            <button type="button" class="btn cabinet_header-usename <?= !empty($datePayments) ? 'red' : '' ?>"
              name="username">
              <p><?= $user->fio ?></p>
            </button>
            <ul class="cabinet_header-usename_spoiler">
              <li class="cabinet_header-usename_spoiler-item">
                <a href="<?= Url::to(['/cabinet/staps']) ?>" class="link link--gray">Этапы процедуры</a>
              </li>
              <li class="cabinet_header-usename_spoiler-item">
                <a href="<?= Url::to(['/cabinet']) ?>" class="link link--gray">Мой профиль</a>
              </li>
              <li class="cabinet_header-usename_spoiler-item">
                <a href="<?= Url::to(['/cabinet/help']) ?>" class="link link--gray">Тех.поддержка</a>
              </li>
              <li class="cabinet_header-usename_spoiler-item">
                <a href="<?= Url::to(['/site/logout']) ?>" class="link link--gray">Выход</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <main class="main cabinet_main">
      <div class="cabinet_main_left"></div>

      <div class="cabinet_main_container">
        <nav class="cabinet_main_nav">
          <img class="BurgerMenuClose BurgerMenuClose2" src="<?= Url::to(['/img/close.svg']) ?>" alt="close">
          <div class="cabinet_main_nav_first">
            <div class="cabinet_main_nav_top">
              <a href="<?= Url::to(['/']) ?>" class="link link--gray">
                Главная
              </a>
              <p class="cabinet_main_nav_top-text">/ Личный кабинет</p>
            </div>
            <h2 class="cabinet_main_nav-username">
              <?= $user->fio ?>
            </h2>
            <ul class="cabinet_main_nav_column">
              <!-- <li class="cabinet_main_nav_column-item">
                                <a class="cabinet_main_nav_column-item-link"
                                    href="<?= Url::to(['/cabinet/cfs2']) ?>">Анкета</a>
                            </li> -->
              <li class="cabinet_main_nav_column-item">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/cabinet/docs']) ?>">Мои документы</a>
              </li>
              <li class="cabinet_main_nav_column-item">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/cabinet/staps']) ?>">Все этапы
                  процедуры</a>
              </li>
              <li class="cabinet_main_nav_column-item cabinet_main_nav_column-item-payment">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/cabinet/payment']) ?>">Оплата</a>
              </li>
              <li class="cabinet_main_nav_column-item cabinet_main_nav_column-item-payment">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/cabinet/referal']) ?>">Реферальная
                  программа</a>
              </li>
              <li class="cabinet_main_nav_column-item cabinet_main_nav_column-item-settings">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/cabinet/settings']) ?>">Настройки
                  профиля</a>
                <ul class="cabinet_main_nav_column-item-subcolumn">
                  <li class="cabinet_main_nav_column-item-subcolumn-item">
                    <button data-id="set1"
                      class="cabinet_main_nav_column-item-subcolumn-item-btn cabinet_settings-btn active">Личные
                      данные</button>
                  </li>
                  <li class="cabinet_main_nav_column-item-subcolumn-item">
                    <button data-id="set2"
                      class="cabinet_main_nav_column-item-subcolumn-item-btn cabinet_settings-btn">Почта
                      и пароль</button>
                  </li>
                  <li class="cabinet_main_nav_column-item-subcolumn-item">
                    <button data-id="set3"
                      class="cabinet_main_nav_column-item-subcolumn-item-btn cabinet_settings-btn">Уведомления</button>
                  </li>
                </ul>
              </li>
            </ul>
            <button type="button" class="btn btn--blue open-popup" data-call="cabinet-feedback">
              Связаться с юристом
            </button>
            <?php if (!empty($datePaymentsBlock)):?>
            <aside class="cabinet_menu_aside">
              <div class="cabinet_menu_aside_content">
                <h3 class="cabinet_menu_aside-title">
                  Дата следующей оплаты:
                </h3>
                <p class="cabinet_menu_aside-text">
                  <?= date('d.m.Y', strtotime($datePaymentsBlock->date_exp)) ?>
                </p>
                <h4 class="cabinet_menu_aside-title">
                  Сумма к оплате:
                </h4>
                <p class="cabinet_menu_aside-text">
                  <?= number_format($datePaymentsBlock->expected_val, 0, '', ' ') ?> рублей
                </p>
                <a class="cabinet_menu_aside_link" href="<?= $datePaymentsBlock->link_payment ?>"></a>
              </div>
            </aside>
            <?php endif; ?>
          </div>

          <div class="cabinet_main_nav_last">
            <ul class="cabinet_main_nav_column">
              <li class="cabinet_main_nav_column-item">
                <a class="cabinet_main_nav_column-item-link cabinet_main_nav_column-item-link_chat"
                  href="<?= Url::to(['/cabinet/help']) ?>">Чат - поддержка</a>
              </li>
              <li class="cabinet_main_nav_column-item">
                <a class="cabinet_main_nav_column-item-link" href="<?= Url::to(['/site/logout']) ?>">Выход</a>
              </li>
            </ul>
          </div>
        </nav>

        <div class="cabinet_info">
          <?= $content ?>
        </div>
      </div>

      <div class="cabinet_main_right"></div>
    </main>

    <footer class="cabinet_footer">
      <div class="container">
        <a class="link link--white js-footer_phone" href="tel:+7 (473) 280-01-01">+7 (473) 280-01-01 </a>
      </div>
    </footer>

    <div class="popCBack"></div>

    <div class="popCWrap">
      <section class="popC">
        <button type="button" class="btn PopupClose PopCClose"><img src="<?= Url::to(['/img/close.svg']) ?>"
            alt="close"></button>

        <div class="popC_Stap1">
          <?= Html::beginForm('', 'post', ['class' => 'popC-form']) ?>
          <input type="hidden" value="" name="city">
          <input type="hidden" value="" name="new_region">
          <div class="popC_Stap-content Popup_Staps_content Popup_Staps_content_cabinet-feedback">
            <h2 class="popC_Stap-title">
              По какому вопросу вы хотите проконсультироваться?
            </h2>

            <div class="popC_Stap_group">
              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Оплата услуг">
                <p class="popC_Stap_group-label-t">
                  Оплата услуг
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Получение документов">
                <p class="popC_Stap_group-label-t">
                  Получение документов
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Текущий этап процедуры">
                <p class="popC_Stap_group-label-t">
                  Текущий этап процедуры
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Прожиточный минимум">
                <p class="popC_Stap_group-label-t">
                  Прожиточный минимум
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Другое">
                <p class="popC_Stap_group-label-t">
                  Другое
                </p>
              </label>
            </div>

            <button class="btn btn--blue popC-submit">
              Заказать обратный звонок
            </button>
          </div>
          <?= Html::endForm() ?>
          <?= Html::beginForm('', 'post', ['class' => 'popC-form']) ?>
          <input type="hidden" value="" name="city">
          <input type="hidden" value="" name="new_region">
          <div class="popC_Stap-content Popup_Staps_content Popup_Staps_content_cabinet-help">
            <h2 class="popC_Stap-title">
              Какие трудности у вас возникли с оплатой?
            </h2>
            <?= Html::endForm() ?>

            <div class="popC_Stap_group">
              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Не проходит платеж">
                <p class="popC_Stap_group-label-t">
                  Не проходит платеж
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Не та сумма платежа">
                <p class="popC_Stap_group-label-t">
                  Не та сумма платежа
                </p>
              </label>

              <label class="popC_Stap_group-label">
                <input class="rad" type="radio" name="quest" value="Другое">
                <p class="popC_Stap_group-label-t">
                  Другое
                </p>
              </label>
            </div>

            <button class="btn btn--red popC-submit">
              Заказать обратный звонок
            </button>
          </div>
          <?= Html::endForm() ?>
          <!-- Отправки формы еще нет -->
          <?= Html::beginForm('', 'post', ['class' => 'change-phone']) ?>
          <div class="popC_Stap-content Popup_Staps_content Popup_Staps_content_cabinet-reset">
            <div class="Logon_Staps_content">
              <h1 class="signin_main-title">
                Изменение номера телефона
              </h1>
              <h2 class="signin_main-subtitle">
                Введите код подтверждения из SMS-сообщения, отправленного на номер <span
                  class="logon_main-subtitle-phone"></span>
              </h2>
              <button class="signin_main-subtitle-btn" type="button">
                Изменить номер
              </button>
              <p style="margin-bottom: 15px; color: red; font-size: 16px; font-weight: 500; display: none"
                class="error__text-restore2"></p>
              <div class="signin_main_inpgroup">
                <input class="InputT" id="reset_code_send" required placeholder="Код подтверждения" minlength="6"
                  type="text" name="code">
              </div>
              <div class="signin_main_sendcode">
                <p class="signin_main_sendcode-text">
                  Повторить отправку кода через <span class="signin_main_sendcode-text-num">1:59</span>
                </p>
                <button type="button" class="signin_main_sendcode-again">
                  Отправить код повторно
                </button>
              </div>
              <button id="sendCode" type="button" class="signin_btn btn btn--blue logon-nextBTN">
                Продолжить
              </button>
            </div>
          </div>
          <?= Html::endForm() ?>
        </div>

        <div class="popC_Stap2">
          <div class="popC_Stap-content">
            <h2 class="popC_Stap-title">
              Ваша заявка принята!
            </h2>
            <h3 class="popC_Stap-subtitle">
              Ожидайте звонка нашего юриста в течение 3 минут с номера
            </h3>
            <a class="popC_Stap-phone js-footer_phone">+7 (473) 280-01-01</a>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
<?php if (Yii::$app->controller->action->id == 'cfs2') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(1)').addClass('active');
</script>
<?php endif; ?>

<?php if (Yii::$app->controller->action->id == 'docs') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(1)').addClass('active');
$('.cabinet_main_nav_last .cabinet_main_nav_column-item:nth-child(1)').removeClass('active');
</script>
<?php endif; ?>
<?php if (Yii::$app->controller->action->id == 'staps') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(2)').addClass('active');
$('.cabinet_main_nav_last .cabinet_main_nav_column-item:nth-child(2)').removeClass('active');
</script>
<?php endif; ?>
<?php if (Yii::$app->controller->action->id == 'payment') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(3)').addClass('active');
</script>
<?php endif; ?>
<?php if (Yii::$app->controller->action->id == 'referal') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(4)').addClass('active');
</script>
<?php endif; ?>
<?php if (Yii::$app->controller->action->id == 'settings') : ?>
<script>
$('.cabinet_main_nav_column-item:nth-child(5)').addClass('active');
</script>
<?php endif; ?>
<?php if (Yii::$app->controller->action->id == 'help') : ?>
<script>
$('.cabinet_main_nav_last .cabinet_main_nav_column-item:nth-child(1)').addClass('active');
</script>
<?php endif; ?>