<?php
    use yii\helpers\Url;
    Yii::$app->name = "Оставить заявку";
    $this->registerCssFile("@web/css/bid.css");
?>

<section class="bid">
    <div class="container">
        <div class="bid__inner">
            <div class="bid__content">
                <h2 class="bid__title title">Получите консультацию юриста по вашей проблеме</h2>
                <h3 class="bid__sub-title">Укажите ваши данные.
                    Наш юрист свяжется с вами в течение 3 минут</h3>
                <form class="form bid__form">
                    <input type="text" name="name" class="form-input" placeholder="Имя" required minlength="2" maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+">
                    <input type="tel" name="phone" class="form-input" placeholder="Номер телефона" required minlength="11" maxlength="20" pattern="^\+?[0-9]{7,15}$">
                    <input type="text" name="region" class="form-input" placeholder="Регион" required maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+">
                    <button type="submit" class="button blue send-button" disabled>Получить консультацию</button>
                </form>
                <p class="bid__policy">*оставляя заявку на данном сайте Вы даете свое разрешение на обработку своих персональных данных в соответствии с ФЗ-152</p>
            </div>
            <img class="bid__image" src="<?= Url::to(["images/form.png"]) ?>" alt="">
        </div>
    </div>
</section>
