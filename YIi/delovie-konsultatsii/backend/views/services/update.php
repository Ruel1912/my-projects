<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Services $model */

$this->title = 'Изменить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
?>
<div class="services-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
