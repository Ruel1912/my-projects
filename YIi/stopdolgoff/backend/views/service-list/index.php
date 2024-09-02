<?php

use backend\models\ServicesList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = "Список услуг";
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['/service']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success my-2']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'services_id',
            'row',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServicesList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
