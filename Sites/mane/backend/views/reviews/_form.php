<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Великая Александра Викторовна']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Пенсионер']) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true, 'placeholder' => 'Ростовская область']) ?>

    <?= $form->field($model, 'date_application')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')],
    ]) ?>

    <?= $form->field($model, 'summ')->textInput(['type' => 'number', 'placeholder' => 'Сумма долга']) ?>

    <?= $form->field($model, 'bankruptcy_date')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')."Если процедура не завершена, то введите 0"],
    ]) ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true, 'placeholder' => 'А03-6165/2020']) ?>

    <!--    -->
    <?//= $form->field($model, 'image_case')->widget(InputFile::className(), [
//        'language'      => 'ru',
//        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
//        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
//        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
//        'options'       => ['class' => 'form-control', 'placeholder' => 'Первая страница дела'],
//        'buttonOptions' => ['class' => 'btn btn-admin', 'style' => 'padding: 6px 15px'],
//        'buttonName' => 'Выбрать',
//        'multiple'      => false       // возможность выбора нескольких файлов
//    ]); ?>

    <?= $form->field($model, 'link_case')->textInput(['maxlength' => true, 'placeholder' => 'https://kad.arbitr.ru/Card/a5f7a946-fb10-4e91-831f-154483d440b2']) ?>

    <p style="font-size: 18px;">Для корректного отображения отзыва на странице, необходимо ниже добавить либо видео,
        либо комментарий</p>
    <?= $form->field($model, 'reviews')->textarea(['rows' => 6, 'placeholder' => 'Александра была вынуждена взять кредит для погашения своих долгов. Долги росли и  наступил момент, когда платить стало нечем. Далее начались звонки из банка и угрозы коллекторов. Через время клиентка увидела рекламу нашей компании и записалась на консультацию. Проконсультировавшись с нашими специалистами, которые грамотно смогли объяснить все шаги процедуры банкротства, уже на следующий день они начали сбор необходимых документов. ']) ?>

    <?= $form->field($model, 'video_link')->textInput(['maxlength' => true, 'placeholder' => 'https://www.youtube.com/embed/VoA-aQu75Xk']) ?>

    <?= $form->field($model, 'date_add')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>