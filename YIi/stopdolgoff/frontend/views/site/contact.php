<?php

use yii\helpers\Url;

Yii::$app->name = "Контакты";
//$this->registerCssFile("@web/css/service.css");
?>

<section class="contact">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/article"]) ?>">/ Контакты</a>
        </nav>
        <h2 class="services__title title">Контакты</h2>
    </div>
</section>