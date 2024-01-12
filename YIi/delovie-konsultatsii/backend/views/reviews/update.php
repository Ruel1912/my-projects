<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Reviews $model */

$this->title = 'Изменить: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fio, 'url' => ['view', 'id' => $model->id]];
?>
<div class="reviews-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
