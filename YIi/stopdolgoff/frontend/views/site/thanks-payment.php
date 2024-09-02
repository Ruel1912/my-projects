<?php
    use yii\helpers\Url;
    Yii::$app->name = "Оставить заявку";
    $this->registerCssFile("@web/css/bid.css");
    $this->registerCssFile("@web/css/thanks-payment.css");
?>

<section class="bid">
    <div class="container">
        <div class="bid__inner">
            <div class="bid__content">
                <h2 class="bid__title title">Благодарим за оплату</h2>
            </div>
            <img class="bid__image" src="<?= Url::to(["images/form.png"]) ?>" alt="">
        </div>
    </div>
</section>
