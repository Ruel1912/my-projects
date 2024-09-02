<?php
    use yii\helpers\Url;
    Yii::$app->name = "Оставить заявку";
    $this->registerCssFile("@web/css/bid.css");
?>

<section class="bid">
    <div class="container">
        <div class="bid__inner">
            <div class="bid__content">
                <h2 class="bid__title title">Спасибо за заявку!</h2>
                <h3 class="bid__sub-title">Ожидайте звонка юриста с номера</h3>
            </div>
            <img class="bid__image" src="<?= Url::to(["images/form.png"]) ?>" alt="">
        </div>
    </div>
</section>
