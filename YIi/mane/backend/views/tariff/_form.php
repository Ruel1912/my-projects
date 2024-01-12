<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tariff */
/* @var $form yii\widgets\ActiveForm */

if (!empty($model->props))
    $props = $model->props;
else
    $props = '[]';


$js = <<<JS
function render() {
    var html = '';
    if (arr.length > 0) {
        for (var i = 0; i < arr.length; i++) {
            html += "<div class='click-destroy' data-id='"+ i +"'>";
            html += arr[i];
            html += "</div>";
        }
    }
    $('.props').html(html);
    $('#tariff-props').val(JSON.stringify(arr));
}
var arr = $props;
$('.btn-add-prop').on('click', function() {
    var 
        val = $('.prop-val').val();
    if (val.length > 0 && arr.indexOf(val) === -1)
        arr.push(val);
    render();
    $('.prop-val').val('');
});
$('.props').on('click', '.click-destroy', function() {
  var id = $(this).attr('data-id');
  arr.splice(id, 1);
  render();
});
render();
JS;
$this->registerJs($js);

?>
<style>
    .props {
        display: flex;
        flex-wrap: wrap;
    }
    .props div {
        background-color: #fafafa;
        border-radius: 6px;
        padding: 5px 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        border: 1px solid gainsboro;
        cursor: pointer;
    }
</style>
<div class="tariff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Стандартный']) ?>

    <?= $form->field($model, 'full_price')->input('number', ['placeholder' => '225000']) ?>

    <?= $form->field($model, 'first_pay')->input('number', ['placeholder' => '25000']) ?>

    <?= $form->field($model, 'months')->input('number', ['min' => 0, 'placeholder' => '8']) ?>

    <p><b>Добавить особенности тарифа:</b></p>
    <p><input type="text" value="" class="form-control prop-val" placeholder="Законная защита имущества"></p>
    <p><button type="button" class="btn btn-primary btn-add-prop">Добавить</button></p>
    <div class="props">

    </div>
    <div style="display: none">
        <?= $form->field($model, 'props')->textarea(['rows' => 6]) ?>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
