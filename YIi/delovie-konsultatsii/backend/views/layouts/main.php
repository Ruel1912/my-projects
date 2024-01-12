<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap5\Alert;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= Yii::$app->name?></title>
  <?php
    $this->registerCsrfMetaTags();
    $this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
    $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
    $this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? 'Топовые юристы на все времена']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? 'Юрист']);
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
          <li class="header_list_item"><a href="<?= Url::to(['/services'])?>"
              <?= $this->context->route == "services/index" ? "active" : "" ?> class="header_list_link">Услуги</a></li>
          <li class="header_list_item"><a href="<?= Url::to(['/reviews'])?>"
              class="header_list_link <?= $this->context->route == "reviews/index" ? "active" : "" ?>">Отзывы</a></li>
          <li class="header_list_item"><a href="<?= Url::to(['/cases'])?>"
              class="header_list_link <?= $this->context->route == "cases/index" ? "active" : "" ?>">Практика</a></li>
        </ul>
        <?php
                if (Yii::$app->user->isGuest) {
                    echo Html::tag('div',Html::a('Войти',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
                } else {
                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                        . Html::submitButton(
                            'Выйти',
                            ['class' => 'btn btn-link logout text-decoration-none']
                        )
                        . Html::endForm();
                }
        ?>
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
              <li class="burger_list_item"><a href="<?= Url::to(['/#services'])?>"
                  class="burger_list_link link secondary">Услуги</a>
              </li>
              <li class="burger_list_item"><a href="<?= Url::to(['/review'])?>"
                  class="burger_list_link link secondary">Отзывы</a></li>
              <li class="burger_list_item"><a href="<?= Url::to(['/case'])?>"
                  class="burger_list_link link secondary">Практика</a></li>
            </ul>
            <span class="burger_title">8 995 127 30 37</span>
            <a href="tel: 8 995 127 30 37" class="burger_link link secondary"><u>Заказать обратный звонок</u></a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main role="main" class="flex-shrink-0">
    <div class="main__content">
      <div class="container mt-4">
        <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumb-separator'],
                    'itemTemplate' => "<li>{link}<span class='divider'>/</span></li>\n",
                ]) ?>
        <?= $content ?>

      </div>
    </div>
  </main>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();