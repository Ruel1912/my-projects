<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile('@web/css/reviews.css');
Yii::$app->name = "Практика";
?>
<section class="reviews">
  <div class="container">
    <h2 class="title">Практика</h2>
    <?if (!empty($cases)): ?>
    <div class="review_items">
      <?php foreach ($cases as $case): ?>
      <div class="review_item">
        <div class="review_image">
        <img src="<?= !empty($review['image_case']) ? $review['image_case'] : Url::to('@web/images/document-placeholder.png') ?>"
            alt="Скриншот дела <?= $case['case_number']?>">
        </div>
        <div class="review_content ">
          <h3 class="review_content_title primary">Дело № <?= $case['case_number']?></h3>
          <ul class="review_list">
            <li class="review_list_item"><strong>ФИО: </strong><?= $case['fio'] ?> </li>
            <li class="review_list_item"><strong>Регион: </strong><?= $case['region'] ?> </li>
            <li class="review_list_item"><strong>Долг: </strong>
            <?= $case['debt'] > 0 ? number_format($case['debt'], 2, ",", " ").' рублей' : "Не раскрывается" ?> </li>
            <li class="review_list_item"><strong>Списано: </strong>
            <?= $case['debt_written'] > 0 ? number_format($case['debt_written'], 2, ",", " ").' рублей' : "Не раскрывается" ?> </li>
            <li class="review_list_item"><strong>Дата: </strong><?= date("d.m.Y", strtotime($case['date_application'])) ?> </li>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <? endif; ?>
    <div class="paginator">
      <?= LinkPager::widget([
    'pagination' => $pages,
    'prevPageLabel' => 'Пред.',
    'nextPageLabel' => 'След.',
    ]);?>
    </div>
  </div>
</section>