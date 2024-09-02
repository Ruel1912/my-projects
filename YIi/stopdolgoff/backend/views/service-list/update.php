<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ServicesList $model */

$this->title = 'Изменить' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['/service']];
$this->params['breadcrumbs'][] = ['label' => 'Список услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="services-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
