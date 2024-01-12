<?php

use frontend\models\Cases;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Практика';
?>
<div class="cases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="my-2">
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'case_number',
            'fio',
            'region',
            'debt',
            //'debt_written',
            //'date_application',
            //'image_case',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cases $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
