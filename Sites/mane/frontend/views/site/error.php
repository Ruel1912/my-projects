<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="page_container">
    <div class="content" style="padding : 20px; max-width: 1155px; margin: 0 auto">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            Страница не найдена. <br>
            Вышеупомянутая ошибка произошла во время обработки вашего запроса веб-сервером. <br>
            Свяжитесь с нами, если вы считаете, что это ошибка сервера. Спасибо.
        </p>
    </div>
</div>
