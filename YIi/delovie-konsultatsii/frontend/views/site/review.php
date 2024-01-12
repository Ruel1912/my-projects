<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile('@web/css/reviews.css');
Yii::$app->name = "Отзывы клиентов";
?>
<section class="reviews">
  <div class="container">
    <h2 class="title">Отзывы</h2>
    <?if (!empty($reviews)): ?>
    <div class="review_items">
      <?php foreach ($reviews as $review): ?>
      <div class="review_item">
        <div class="review_image">
          <img src="<?= !empty($review['image_case']) ? $review['image_case'] : Url::to('@web/images/document-placeholder.png') ?>"
            alt="Скриншот дела <?= $review['case_number']?>">
        </div>
        <div class="review_content ">
          <h3 class="review_content_title primary">Дело № <?= $review['case_number']?></h3>
          <p class="review_text">«<?= Html::encode($review['review']) ?>»</p>
          <h4 class="review_author"><?= $review['fio'] ?> (<?= $review['region'] ?>)</h4>
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