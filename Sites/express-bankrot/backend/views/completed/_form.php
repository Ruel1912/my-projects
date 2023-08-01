<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Completed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="completed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'summ')->textInput() ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_case')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_case')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_add')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
