<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KnowledgeBase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="knowledge-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Варианты решения проблем кредитами']) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true, 'placeholder' => 'https://www.youtube.com/watch?v=4X8dDoQ9rOA&ab_channel=%D0%98%D0%BB%D1%8C%D1%8F%D0%94%D0%B5%D1%80%D1%83%D0%BD%D0%BE%D0%B2']) ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
