<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Reviews $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
