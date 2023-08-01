<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KnowledgeBase */

$this->title = 'Обновить видео базы знаний: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'База знаний', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="knowledge-base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
