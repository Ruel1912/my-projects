<?php

use app\models\ServicesList;
use yii\helpers\Url;

Yii::$app->name = "Наши услуги";
$this->registerCssFile("@web/css/service.css");
?>

<section class="service">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/service"]) ?>">/ Услуги</a>
        </nav>
        <h2 class="services__title title">Наши услуги</h2>
        <div class="services__cards">
            <?php foreach ($services as $service): ?>
                <div class="services-card card">
                    <img class="services__image" src="<?= Url::to(["images/bank.svg"]) ?>" alt="">
                    <h3 class="services-card__title"><?= $service['title'] ?></h3>
                    <h4 class="services-card__sub-title">Что получите от данной процедуры?</h4>
                    <?php
                    $services__items = ServicesList::find()
                        ->joinWith('services')
                        ->where(['services_id' => $service['id']])
                        ->all();
                    ?>
                    <ul class="services-card__list">
                        <?php foreach ($services__items as $services__item): ?>
                            <li>
                                <p><?= $services__item['row'] ?></p>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                    <a class="services__button button blue" href="<?= Url::to(["/bid"]) ?>">Заказать услугу</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>