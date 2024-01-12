<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Completed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="completed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'summ')->textInput(['placeholder' => '100000']) ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true, 'placeholder' => 'А36-7992/21']) ?>

    <?= $form->field($model, 'image_case')->textInput(['maxlength' => true, 'placeholder' => '/admin/images/Имя Вашего файла']) ?>

    <?= $form->field($model, 'link_case')->textInput(['maxlength' => true, 'placeholder' => 'Ссылка на дело']) ?>

    <?= $form->field($model, 'date_add')->textInput(['placeholder' => '08.07.2023']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>