<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Cases $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Практика', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
