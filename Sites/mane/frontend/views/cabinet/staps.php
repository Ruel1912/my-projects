<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Все этапы процедуры';
$stages = \backend\models\Stages::find()->asArray()->all();
$stageArr = [];
if (!empty($stages)) {
    foreach ($stages as $item)
        $stageArr[$item['status']] = $item;
}

$js = <<<JS
$('input[type="file"]').on('input', function() {
    $('.file-preloader').show();
    $(this).closest('form').submit();
});
JS;
$this->registerJs($js);

?>

<article class="cabinet">
  <h1 class="cabinet-title">Все этапы процедуры</h1>
  <p class="cabinet-staps-undertitle">Пройденные этапы</p>
  <div class="cabinet_stages-passed">
    <?php foreach ($userStages as $k => $v): ?>
    <?php if ($v['passed'] == 1): ?>
    <?php foreach ($stageArr as $key => $val): ?>
    <?php if ($key === $v['stage_id']): ?>
    <section class="cabinet_stages-passed-item">
      <button class="cabinet_stages-passed-item-btn">
        <h2><?= $val['name'] ?></h2>
      </button>
      <div class="cabinet_stages-passed-item-info">
        <div class="cabinet_stages-passed-item-info_content"><?= $val['small_desc'] ?></div>
      </div>
    </section>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <?php if(!empty($user->stage_id)): ?>
  <section class="cabinet_card cabinet_card_stap">
    <div class="cabinet_card_stap_content">
      <div class="cabinet_card_stap_left">
        <p class="cabinet_card_stap_left-name">
          Текущий этап процедуры
        </p>
        <h2 class="cabinet_card_stap_left-title">
          <?= $stageArr[$user->stage_id]['name'] ?>
        </h2>
        <p class="cabinet_card_stap_left-undertitle">
          <?= $stageArr[$user->stage_id]['small_desc'] ?>
        </p>
        <?php if($stageArr[$user->stage_id]['need_to_do'] == 1): ?>
        <h3 class="cabinet_card_stap_left-subtitle">
          Вам необходимо сделать:
        </h3>
        <?php if(!empty($deal)): ?>
        <ul class="cabinet_card_stap_left-ul">
          <li class="cabinet_card_stap_left-ul-item">
            <?= $deal['text']->text ?>
          </li>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($stageArr[$user->stage_id]['files_provide'] == 1 && !empty($deal['files'])): ?>
        <?php $urls = json_decode($deal['files']->urls, 1); ?>
        <?php foreach($urls as $key => $item): ?>
        <a class="link link--black"
          href="<?= Url::to(['get-attached-file', 'index' => $key, 'id' => $deal['files']->id]) ?>">Скачать
          приложение №<?= $key + 1 ?></a>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if($stageArr[$user->stage_id]['files_accept'] == 1): ?>
        <?php if(!empty($current)): ?>
        <div class="cabinet-docs-item_row">
          <h3 class="cabinet-docs-item_row-name">
            Загрузить чек
          </h3>
          <?php if ($current->deployment_passed === 1): ?>
          <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
            Загружено
          </p>
          <?php else: ?>
          <?= Html::beginForm("/cabinet/sent-file?d={$user->deal_id}&u={$user->id}&s={$current->id}", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
          <input accept=".zip" type="file" name="files">
          <input type="hidden" name="type" value="Архив с документами (<?= $stageArr[$user->stage_id]['name'] ?>)">
          <?= Html::endForm(); ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="cabinet_card_stap_right">
        <p>Длительность: <span>8 дней</span></p>
      </div>
    </div>
  </section>
  <?php endif; ?>
</article>