<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Получить консультацию';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="thankspage">
    <div class="container">
        <?= Breadcrumbs::widget([ 'links' => isset($this->params ['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

        <div class="thankspage_wrapper">
            <h1 class="thankspage-title">
                Благодарим за заявку!
            </h1>
            <p class="thankspage-undertitle">
                Наш юрист перезвонит вам в ближайшее время и подробно вас проконсультирует
            </p>
        </div>
    </div>
</section>