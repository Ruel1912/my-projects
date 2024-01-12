<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\UserModel;

$id = Yii::$app->getUser()->getId();
$user = UserModel::findOne(['id' => $id]);
$this->title = 'Реферальная программа';
?>
<article class="cabinet referal">
  <h1 class="cabinet-title">Реферальная программа</h1>
  <?= Html::beginForm('', 'post', ['class' => '']) ?>
  <section class="cabinet_settings-tabs set1 cabinet_settings-personal">
    <div class="cabinet_settings-personal_content">
      <h2 class="cabinet_settings-personal-title">
      Пригласи друга и получи бонус!
      </h2>
      <div class="cabinet_settings-personal_row">
        <p class="cabinet_settings-personal_row-name">
          ФИО реферала
        </p>
        <input class="InputT" type="text" name="fio_referal">
      </div>
      <div class="cabinet_settings-personal_row">
        <p class="cabinet_settings-personal_row-name">
          Номер телефона реферала
        </p>
        <input class="InputT cabinet_settings-personal_row-phone" type="tel" name="phone">
      </div>
      <button type="submit" class="btn btn--red btn--submit-settings">Отправить</button>
    </div>
  </section>
  <?= Html::endForm() ?>
</article>