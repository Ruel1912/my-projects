<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Получить консультацию';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="orderpage">
    <div class="container">
        <?= Breadcrumbs::widget([ 'links' => isset($this->params ['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>
        
        <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data', 'class' => 'SecondOrderForm']) ?>
            <input type="hidden" value="" name="city">
            <input type="hidden" value="" name="new_region">
            <input type="hidden" name="params" value="<?= !empty($params) ? base64_encode(json_encode($params)) : null ?>">
            <input type="hidden" value="<?= $_SERVER['QUERY_STRING'] ?>" name="query_string">

            <div class="orderpage_wrapper">
                <h1 class="orderpage-title">
                Укажите ваши данные для связи и наш эксперт с вами свяжется
                </h1>
                <div class="orderpage_inpgroup">
                    <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                    <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                </div>
                <button type="submit" class="btn btn--red">
                Получить консультацию
                </button>
                <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank" class="link link--gray" href="<?= Url::to(['/privacypolicy']) ?>">согласие на обработку персональных данных</a> в соответствии с 152-ФЗ</p>
            </div>
        <?= Html::endForm() ?>
    </div>
</section>