<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReviewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'region') ?>

    <?= $form->field($model, 'date_application') ?>

    <?php // echo $form->field($model, 'summ') ?>

    <?php // echo $form->field($model, 'bankruptcy_date') ?>

    <?php // echo $form->field($model, 'case_number') ?>

    <?php // echo $form->field($model, 'image_case') ?>

    <?php // echo $form->field($model, 'link_case') ?>

    <?php // echo $form->field($model, 'reviews') ?>

    <?php // echo $form->field($model, 'video_link') ?>

    <?php // echo $form->field($model, 'date_add') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>