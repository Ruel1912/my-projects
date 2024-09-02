<?php

use yii\helpers\Url;

Yii::$app->name = "Завершенные дела";
//$this->registerCssFile("@web/css/service.css");
?>

<section class="case">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/case"]) ?>">/ Завершенные дела</a>
        </nav>
        <h2 class="services__title title">Завершенные дела</h2>
    </div>
</section>