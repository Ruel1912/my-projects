<?php

use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model backend\models\Articles */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS

    function rus_to_latin ( str ) {
        
        let ru = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 
            'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i', 
            'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 
            'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 
            'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 
            'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'u', 'я': 'ya'
        }, n_str = [];
        
        str = str.replace(/[ъь]+/g, '').replace(/й/g, 'i');
        
        for ( let i = 0; i < str.length; ++i ) {
           n_str.push(
                  ru[ str[i] ]
               || ru[ str[i].toLowerCase() ] === undefined && str[i]
               || ru[ str[i].toLowerCase() ].replace(/^(.)/, function ( match ) { return match.toUpperCase() })
           );
        }
        
        return n_str.join('');
    }
    
    

    $(document).ready(function() {
      $('#titleInput').on('input',function() {
          let j = rus_to_latin($(this).val());
          j = j.replace(/ /g, '-');
          $('#linkArticle').val(j.toLowerCase());
      });
    });
JS;
$this->registerJs($js);
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Категория']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'id' => 'titleInput', 'placeholder' => 'Заголовок']) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true, 'id' => 'linkArticle', 'placeholder' => 'Ссылка статьи']) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true, 'placeholder' => 'Подзаголовок']) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
    ]); ?>

    <?= $form->field($model, 'image')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control', 'placeholder' => 'Картинка услуги'],
        'buttonOptions' => ['class' => 'btn btn-admin', 'style' => 'padding: 6px 15px'],
        'buttonName' => 'Выбрать',
        'multiple'      => false       // возможность выбора нескольких файлов
    ]); ?>

    <?= $form->field($model, 'views')->textInput(['placeholder' => 'Просмотры', 'type' => 'number']) ?>

    <?= $form->field($model, 'likes')->textInput(['placeholder' => 'Лайки', 'type' => 'number']) ?>

    <?= $form->field($model, 'dizlike')->textInput(['placeholder' => 'Дизлайки', 'type' => 'number']) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options'       => ['class' => 'form-control', 'placeholder' => date('Y-m-d')],
    ]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true, 'placeholder' => 'Описание МЕТА']) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true, 'placeholder' => 'Заголовок МЕТА']) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'placeholder' => 'Ключевые слова']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
