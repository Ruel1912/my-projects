<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TiketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тикеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tikets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тикет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'date',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return \backend\models\Tikets::$textStatus[$model->status];
                }
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'response' => function ($url, $model, $key) {
                        return Html::a("<span class='glyphicon glyphicon-comment'></span>", \yii\helpers\Url::to(['chat', 'id' => $model->id]));
                    }
                ],
                'template' => "{response}<br>{update}<br>{delete}<br>"

            ],
        ],
    ]); ?>


</div>
