<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Completed */

$this->title = 'Добавить дело';
$this->params['breadcrumbs'][] = ['label' => 'Завершенные дела', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="completed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
