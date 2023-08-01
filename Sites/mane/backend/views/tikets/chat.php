<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\Tikets */

$this->title = "Тикет #{$model->id}";
$this->params['breadcrumbs'][] = ['label' => 'Тикеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$id = $model->id;
$me = Yii::$app->getUser();
$css = <<< CSS
    .cabCont{
        background-color: rgba(205,205,205,0.45);
        padding: 30px;
        border-radius: 15px;
    }
    .cabinet_help_top_main{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: start;
  max-height: 400px;
  overflow: auto;
  padding: 36px 32px;
  background-color: white;
  border-radius: 10px;
  margin-bottom: 20px;
}
.cabinet_help_top_main::-webkit-scrollbar {
  width: 5px;
  background-color: rgba(26, 24, 47, 0.15);
  border-radius: 5px;
  height: 200px;
}
.cabinet_help_top_main::-webkit-scrollbar-thumb {
  background: #0940C8;
  border-radius: 5px;
}
.cabinet_help_top_main_message{
  width: 100%;
  display: flex;
  align-items: start;
  margin-bottom: 24px;
}
.cabinet_help_top_main_message:last-child{
  margin-bottom: 0px;
}
.cabinet_help_top_main_message-icon{
  max-width: 30px;
  width: 100%;
  height: 30px;
  border-radius: 50%;
  overflow: hidden;
  background-repeat: no-repeat;
  background-position: center;
  margin-right: 8px;
}
.cabinet_help_top_main_message_info{
  padding: 12px;
  max-width: 400px;
  width: fit-content;
  border: 1px solid rgba(113, 129, 170, 0.6);
  box-sizing: border-box;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: start;
}
.cabinet_help_top_main_message_info-text{
  font-weight: normal;
  font-size: 14px;
  line-height: 140%;
  font-feature-settings: 'pnum' on, 'lnum' on;
  color: #041132;
  margin-bottom: 4px;
}

.cabinet_help_top_main_message_info-time{
  font-weight: normal;
  font-size: 12px;
  line-height: 140%;
  font-feature-settings: 'pnum' on, 'lnum' on;
  color: rgba(0, 27, 96, 0.5);
}
.cabinet_help_top_main_my-message{
  align-self: flex-end;
  flex-direction: row-reverse;
}
.cabinet_help_top_main_my-message .cabinet_help_top_main_message-icon{
  background-image: url('../../backend/web/images/user-back.png');
}
.cabinet_help_top_bottom{
width: 100%;
display: flex;
}
.Message-Input{
width: 100%;
margin-right: 20px;
outline: none;
border: none;
padding: 10px;
resize: none;
border-radius: 10px;
}
CSS;
$this->registerCss($css);
$js =<<< JS
    $('.cabinet-help').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'tikets-help',
            data: $('.cabinet-help').serialize(),
            dataType: 'JSON',
            type: 'POST',
        }).done(function(rsp) {
            console.log(rsp);
            if (rsp.status === 'success'){
                location.reload();
            } else{
                Swal.fire({
                  icon: 'error',
                  title: 'Ошибка',
                  text: rsp.message,
                });
            }
        });
    });
$(".cabinet_help_top_main").scrollTop($(".cabinet_help_top_main")[0].scrollHeight);
JS;
$this->registerJs($js);

?>

<div class="dialogue-peer-view" style="max-width: 1000px; padding-bottom: 200px">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'date',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return \backend\models\Tikets::$textStatus[$model->status];
                }
            ],
        ],
    ]) ?>

    <div class="cabCont">
        <div class="cabinet_help_top_main">
            <?php if (empty($model->messages)): ?>
                <p>Диалог пуст</p>
            <?php else: ?>
                <?php foreach ($model->messages as $k): ?>
                    <?php if ($k->isSupport === 1): ?>
                        <div class="cabinet_help_top_main_message">
                            <div style="background-image: url(<?= Url::to(['images/aboutpage-1.webp']) ?>)" class="cabinet_help_top_main_message-icon"></div>
                            <div class="cabinet_help_top_main_message_info">
                                <p class="cabinet_help_top_main_message_info-text">
                                    <?= $k->message ?>
                                </p>
                                <p class="cabinet_help_top_main_message_info-time">
                                    <?= date('H:i', strtotime($k->date)) ?>
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cabinet_help_top_main_message cabinet_help_top_main_my-message">
                            <div class="cabinet_help_top_main_message-icon"></div>
                            <div class="cabinet_help_top_main_message_info">
                                <p class="cabinet_help_top_main_message_info-text">
                                    <?= $k->message ?>
                                </p>
                                <p class="cabinet_help_top_main_message_info-time">
                                    <?= date('H:i', strtotime($k->date)) ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?= Html::beginForm('', 'post', ['class' => 'cabinet-help']) ?>
        <input type="hidden" name="user_id" value="<?= $model->user_id ?>">
        <input type="hidden" name="tiket_id" value="<?= $model->id ?>">
        <input type="hidden" name="hash" value="<?= md5("{$model->user_id}::{$model->id}::special_hash_to_prevent_hack::9mb21z") ?>">
    <div class="cabinet_help_top_bottom">
        <input placeholder="Введите текст" class="Message-Input" name="message">
        <button class="btn btn-primary">Отправить</button>
        <!--                <input accept type="file" multiple name="files">-->
    </div>
    <?= Html::endForm() ?>
    </div>



</div>
