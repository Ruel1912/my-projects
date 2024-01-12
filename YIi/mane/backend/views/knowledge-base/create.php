<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KnowledgeBase */

$this->title = 'Создать видео для базы знаний';
$this->params['breadcrumbs'][] = ['label' => 'База знаний', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledge-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
