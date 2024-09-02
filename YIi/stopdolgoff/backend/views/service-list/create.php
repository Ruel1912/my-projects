<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ServicesList $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['/service']];
$this->params['breadcrumbs'][] = ['label' => 'Список услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
