<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompletedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="completed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'summ') ?>

    <?= $form->field($model, 'case_number') ?>

    <?= $form->field($model, 'image_case') ?>

    <?= $form->field($model, 'link_case') ?>

    <?php // echo $form->field($model, 'date_add') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
