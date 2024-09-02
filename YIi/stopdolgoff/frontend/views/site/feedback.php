<?php

use yii\helpers\Url;

Yii::$app->name = "Отзывы клиентов";
//$this->registerCssFile("@web/css/service.css");
?>

<section class="feedback">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/feedback"]) ?>">/ Отзывы</a>
        </nav>
        <h2 class="services__title title">Отзывы</h2>
    </div>
</section>