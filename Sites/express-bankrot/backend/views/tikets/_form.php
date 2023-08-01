<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tikets */
/* @var $form yii\widgets\ActiveForm */

$users = User::find()->select(['username', 'id'])->orderBy('id desc')->asArray()->all();
$usArr = [];
if (!empty($users)) {
    foreach ($users as $item)
        $usArr[$item['id']] = $item['username'];
}
$this->registerCssFile(Url::to(['/css/chosen.min.css']));
$this->registerJsFile(Url::to(['/js/chosen.jquery.min.js']), ['depends' => \yii\web\JqueryAsset::class]);
$js =<<<JS
$(".chosen-select").chosen({disable_search_threshold: 0});
JS;

$this->registerJs($js);
?>

<div class="tikets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(empty($model->user_id)): ?>
        <?= $form->field($model, 'user_id')->dropDownList($usArr, ['class' => 'form-control chosen-select']) ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->dropDownList(\backend\models\Tikets::$textStatus) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
