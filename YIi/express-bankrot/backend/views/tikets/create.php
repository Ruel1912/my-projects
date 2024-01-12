<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tikets */

$this->title = 'Создание тикета';
$this->params['breadcrumbs'][] = ['label' => 'Тикеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tikets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
