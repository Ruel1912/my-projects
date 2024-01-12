<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var frontend\models\Reviews $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reviews-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'case_number')->textInput(['maxlength' => true]) ?>

  <div class="form-group my-2">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>