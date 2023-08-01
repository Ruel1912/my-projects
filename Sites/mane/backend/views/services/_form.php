<?php

use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Services */
/* @var $form yii\widgets\ActiveForm */

if(!empty($model->benefits)) $benef = $model->benefits;
else $benef = '[]';

$js =<<< JS
var obj = $benef;
    if (obj.length > 0){
         var html = '';
            for (var i = 0; i < obj.length; i++){
                html += '<div data-id="'+ i +'" class="benefits__adds--plus">'+ obj[i] +'</div>';
            }
            $('.benefits__adds').html(html);
    }
    $('.addBen').on('click', function() {
        var index = obj.length;
        var addPlus = '<div data-id="'+ index +'" class="benefits__adds--plus">'+ $('#benefits__inp').val() +'</div>';
        $('.benefits__adds').append(addPlus);  
        obj.push($('#benefits__inp').val());
        $('#benefits__inp').val('');
        $('#benMore').val(JSON.stringify(obj));
    });
   $('.benefits__adds').on('click', '.benefits__adds--plus', function() {
        var id = $(this).attr('data-id');
        obj.splice(id, 1);
        $('#benMore').val(JSON.stringify(obj));
        var html = '';
        for (var i = 0; i < obj.length; i++){
            html += '<div data-id="'+ i +'" class="benefits__adds--plus">'+ obj[i] +'</div>';
        }
        $('.benefits__adds').html(html);
   });

JS;

$this->registerJs($js);

?>


<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Заголовок']) ?>

    <div style="display: none">
        <?= $form->field($model, 'benefits')->textInput(['maxlength' => true, 'placeholder' => 'Преимущества', 'id' => 'benMore']) ?>
    </div>

    <?= $form->field($model, 'smal_title')->textInput(['maxlength' => true, 'placeholder' => 'Подзаголовок']) ?>

    <div class="benefits">
        <label class="control-label" for="benefits__inp">Преимущества</label>
        <div class="benefits__block">
            <input id="benefits__inp" type="text" name="benefitses" placeholder="Преимущества" class="benefits__input form-control">
            <button type="button" class="btn addBen btn-primary">Добавить</button>
        </div>
        <div class="benefits__adds"></div>
    </div>

    <?= $form->field($model, 'image')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control', 'placeholder' => 'Картинка услуги'],
        'buttonOptions' => ['class' => 'btn btn-admin', 'style' => 'padding: 6px 15px'],
        'buttonName'    => 'Выбрать',
        'multiple'      => false       // возможность выбора нескольких файлов
    ]); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'language'      => 'ru',
        'dateFormat'    => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
