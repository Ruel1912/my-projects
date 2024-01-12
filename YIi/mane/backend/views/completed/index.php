<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompletedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Завершенные дела';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="completed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить дело', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'summ',
            'case_number',
            'image_case',
            'link_case',
            //'date_add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
