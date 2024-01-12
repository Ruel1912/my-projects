<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Cases $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cases-form mt-2">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debt')->textInput() ?>

    <?= $form->field($model, 'debt_written')->textInput() ?>

    <?= $form->field($model, 'date_application')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')],
    ]) ?>

    <div class="form-group my-2">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
