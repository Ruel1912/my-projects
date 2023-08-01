<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Completed */

$this->title = 'Обновление дела: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Завершенные дела', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="completed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
