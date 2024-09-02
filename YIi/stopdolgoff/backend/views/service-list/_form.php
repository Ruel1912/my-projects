<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ServicesList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'services_id')->textInput() ?>

    <?= $form->field($model, 'row')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-success my-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
