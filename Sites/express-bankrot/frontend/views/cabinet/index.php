<?php

/**
 * @var \backend\models\UserModel $user
 */

use yii\helpers\Html;
use backend\models\UserModel;
use yii\helpers\Url;

$this->title = 'Личный кабинет';
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

  <?php if($payments > 0 && !empty($user->tariff_id) && !empty($user->anketa_id)): ?>
    <section class="cabinet_card cabinet_card_stop">
    <div class="cabinet_card_stop_content">
      <h2 class="cabinet_card-title">Процедура приостановлена</h2>
      <p class="cabinet_card-subtitle">У вас есть просрочка по платежам. Вам необходимо внести указанную сумму</p>
      <a href="<?= Url::to(['payment']) ?>" class="btn btn--white btn--white-red">
        Оплатить сейчас
      </a>
      <p class="cabinet_card-subtitle">Если у вас возникли трудности с оплатой, свяжитесь с нами и мы вам поможем</p>
      <a href="" class="link link--blue cabinet_card_fill-form-link open-popup" data-call="cabinet-help">
        Связаться с менеджером
      </a>
    </div>
  </section>
  <?php endif; ?>

  <?php if(empty($user->anketa_id)): ?>
  <!-- <section class="cabinet_card cabinet_card_fill-form">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Заполните Анкету для подробного аудита вашей проблемы
      </h2>
      <p class="cabinet_card-subtitle">
        Юрист ознакомится с вашей анкетой и подберет стратегию по списанию долгов
      </p>
      <a class="link link--blue cabinet_card_fill-form-link" href="<?= Url::to(['cfs2']) ?>">Заполнить анкету</a>
    </div>
  </section> -->
  <?php endif; ?>

  <?php if(empty($user->tariff_id) && !empty($user->anketa_id)): ?>
  <section class="cabinet_card cabinet_card_сhoose-rate">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Для начала процедуры банкротства вам необходимо оплатить услугу
      </h2>
      <p class="cabinet_card-subtitle">
        Выберите удобный тариф и начните списание долгов прямо сейчас!
      </p>
      <a class="btn btn--red cabinet_card_сhoose-rate-link" href="<?= Url::to(['/site/payment']) ?>">Выбрать тариф</a>
    </div>
  </section>
  <?php endif; ?>

  <?php
    $css =<<< CSS
    .promotion__news{
        margin-bottom: 28px;
        display: flex;
        align-items: start;
    }
    .promotion__news-bold{
        font-weight: 800;
    }
    .promotion__news-svg{
        display: block;
        width: 20px;
        height: 20px;
    }
CSS;
$this->registerCss($css);
    ?>
  <!-- 
  <div class="promotion__news">
    <div style="width: 25px; height: 25px; margin-right: 10px">
      <svg class="promotion__news-svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.533 438.533"
        style="enable-background:new 0 0 438.533 438.533;" xml:space="preserve">
        <g>
          <path style="width:25px; height:25px;" fill="red"
            d="M409.133,109.203c-19.608-33.592-46.205-60.189-79.798-79.796C295.736,9.801,259.058,0,219.273,0
		c-39.781,0-76.466,9.801-110.063,29.407c-33.595,19.604-60.192,46.201-79.8,79.796C9.801,142.8,0,179.489,0,219.267
		s9.804,76.463,29.407,110.062c19.607,33.585,46.204,60.189,79.799,79.798c33.597,19.605,70.283,29.407,110.063,29.407
		s76.47-9.802,110.065-29.407c33.593-19.602,60.189-46.206,79.795-79.798c19.603-33.599,29.403-70.287,29.403-110.062
		C438.533,179.489,428.732,142.795,409.133,109.203z M255.82,356.021c0,2.669-0.862,4.9-2.573,6.707s-3.806,2.711-6.283,2.711
		h-54.818c-2.472,0-4.663-0.952-6.565-2.854c-1.904-1.903-2.854-4.093-2.854-6.563V301.78c0-2.478,0.95-4.668,2.854-6.571
		c1.903-1.902,4.093-2.851,6.565-2.851h54.818c2.478,0,4.579,0.907,6.283,2.707c1.711,1.817,2.573,4.045,2.573,6.715V356.021z
		 M255.246,257.812c-0.192,1.902-1.188,3.568-2.991,4.996c-1.813,1.424-4.045,2.135-6.708,2.135h-52.822
		c-2.666,0-4.95-0.711-6.853-2.135c-1.904-1.428-2.857-3.094-2.857-4.996L178.162,80.51c0-2.288,0.95-3.997,2.852-5.14
		c1.906-1.521,4.19-2.284,6.854-2.284h62.819c2.666,0,4.948,0.76,6.851,2.284c1.903,1.143,2.848,2.856,2.848,5.14L255.246,257.812z" />
        </g>
      </svg>
    </div>

    <p><span class="promotion__news-bold">АКЦИЯ:</span> Заполните Анкету и оплатите выбранный формат в <span
        class="promotion__news-bold">течение 3 дней</span>, и получите скидку
      <span class="promotion__news-bold">5 000 руб</span>. Вы уже остановите рост долгов и освободитесь от оплаты по
      всем кредитам!
    </p>
  </div> -->

  <section class="cabinet_card cabinet_card_writing-off-debts">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Как проходит процедура списания долгов
      </h2>
      <div class="cabinet_card_writing-off-debts_row">
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Feedback form 1.svg') ?>" alt="poll-in-monitor">
          <p class="cabinet_card_writing-off-debts_row-item-text">
            Выбираете удобный способ оплаты
          </p>
        </div>
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Solving problems 1.svg') ?>" alt="pazzles">
          <p class="cabinet_card_writing-off-debts_row-item-text">
            Подбор стратегии и сбор необходимых документов, подача заявления
          </p>
        </div>
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Solving problems 2.svg') ?>" alt="angle-in-shild">
          <p class="cabinet_card_writing-off-debts_row-item-text">
            Ваши долги списаны! Вы начинаете новую жизнь без кредитов и долгов!
          </p>
        </div>
      </div>
    </div>
  </section>


  <?php if(!empty($user->anketa_id) && !empty($user->tariff_id) && $docs === 0): ?>
  <section class="cabinet_card cabinet_card_docs">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Дополните список документов
      </h2>
      <p class="cabinet_card-subtitle">
        Для продолжения процедуры отправьте недостающие документы прямо сейчас. Ознакомиться с полным списком можно
        во вкладке <a class="link link--blue cabinet_card_docs-link" href="<?= Url::to(['/cabinet/docs']) ?>">Мои
          документы</a>
      </p>
    </div>
  </section>
  <?php endif; ?>
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
          href="<?= Url::to(['get-attached-file', 'index' => $key, 'id' => $deal['files']->id]) ?>">Скачать квитанцию</a>
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