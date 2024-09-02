<?php

use yii\helpers\Url;

Yii::$app->name = "О нас";
//$this->registerCssFile("@web/css/service.css");
?>

<section class="about">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/about"]) ?>">/ О нас</a>
        </nav>
        <h2 class="services__title title">О нас</h2>
    </div>
</section>