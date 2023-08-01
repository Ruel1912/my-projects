<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Настройки профиля';
$js =<<< JS
$('.cabinet-settings').on('submit', function(e) {
    e.preventDefault();
    var fio = $('input[name="fio"]').val(),
        region = $('input[name="region"]').val();
    $.ajax({
        url: 'fio-region',
        data: {fio:fio, region:region},
        dataType: 'JSON',
        type: 'POST',
    }).done(function(rsp) {
        if (rsp.status === 'success'){
            $('.save-popup').text('Изменения сохранены');
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        } else {
            $('.save-popup').text(rsp.message);
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        }
    });
});
$('.setting_notice').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'notice',
        data: $('.setting_notice').serialize(),
        dataType: 'JSON',
        type: 'POST',
    }).done(function(rsp) {
        if (rsp.status === 'success'){
            $('.save-popup').text('Изменения сохранены');
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        } else {
            $('.save-popup').text(rsp.message);
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        }
    });
});

$('.saveEmail').on('click', function(e) {
    e.preventDefault();
    var email = $('input[name="email"]').val();
    $.ajax({
        url: 'email-change',
        data: {email:email},
        dataType: 'JSON',
        type: 'POST',
    }).done(function(rsp) {
        if (rsp.status === 'success'){
            $('.save-popup').text('Изменения сохранены');
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        } else {
            $('.save-popup').text(rsp.message);
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        }
    });
});

$('.savePass').on('click', function(e) {
    e.preventDefault();
    var old = $('input[name="p_old"]').val(),
        newp = $('input[name="p_new"]').val(),
        confirm = $('input[name="p_confirm"]').val();
    $.ajax({
        url: 'change-pass',
        data: {old:old, new:newp, confirm:confirm},
        dataType: 'JSON',
        type: 'POST',
    }).done(function(rsp) {
        if (rsp.status === 'success'){
            $('.save-popup').text('Изменения сохранены');
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        } else {
            $('.save-popup').text(rsp.message);
            $('.save-popup-back').fadeIn(300);
            $('.save-popup-wrap').fadeIn(300);
        }
    });
});


JS;
$this->registerJs($js);
?>

    <article class="cabinet">
        <h1 class="cabinet-title">Настройки профиля</h1>
<?= Html::beginForm('', 'post', ['class' => 'cabinet-settings']) ?>
        <section class="cabinet_settings-tabs set1 cabinet_settings-personal">
            <div class="cabinet_settings-personal_content">
                <h2 class="cabinet_settings-personal-title">
                    Личные данные
                </h2>
                <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                    ФИО
                    </p>
                    <input class="InputT" type="text" value="<?= $user->fio ?>"  name="fio">
                </div>
               <div class="cabinet_settings-personal_row">
                   <p class="cabinet_settings-personal_row-name">
                   Номер телефона
                   </p>
                   <input class="InputT cabinet_settings-personal_row-phone" type="tel" value="<?= $user->username ?>" name="phone">
               </div>
                <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                    Ваш регион
                    </p>
                    <input class="InputT" type="text" value="<?= $user->region ?>" name="region">
                </div>

                <!-- Необходимо реализовать валидацию формы, а потом уже открытие попапа -->
                <button type="submit" class="btn btn--red btn--submit-settings open-popup" data-call="cabinet-reset">Сохранить изменения</button>
            </div>
        </section>
        <?= Html::endForm() ?>

<?= Html::beginForm('', 'post', ['class' => 'setting_password']) ?>
        <section class="cabinet_settings-tabs set2 cabinet_settings-password">
            <div class="cabinet_settings-personal_content">
                <h2 class="cabinet_settings-personal-title">
                    Почта и пароль
                </h2>
                <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                        email
                    </p>
                    <input class="InputT" type="email" value="<?= $user->email ?>"  name="email">
                </div>
                <button style="margin-bottom: 20px;" type="button" class="btn btn--red btn--submit-settings saveEmail">Сохранить изменения</button>
                <!-- <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                        Старый пароль
                    </p>
                    <input class="InputT" placeholder="Старый пароль" type="password" name="p_old">
                </div> -->
                <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                        Новый пароль
                    </p>
                    <input class="InputT" placeholder="Новый пароль" type="password" name="p_new">
                </div>
                <div class="cabinet_settings-personal_row">
                    <p class="cabinet_settings-personal_row-name">
                        Повторите пароль
                    </p>
                    <input class="InputT" placeholder="Подтвердите пароль" type="password" name="p_confirm">
                </div>
                <button type="button" class="btn btn--red btn--submit-settings savePass">Сохранить изменения</button>
            </div>
        </section>
<?= Html::endForm(); ?>

<?= Html::beginForm('', 'post', ['class' => 'setting_notice']) ?>
        <section class="cabinet_settings-tabs set3 cabinet_settings-notification">
            <div class="cabinet_settings-personal_content">
                <h2 class="cabinet_settings-personal-title">
                    Уведомления
                </h2>
                <label class="cabinet_settings-personal_label">
                    <input <?= isset($params['change']) ? 'checked' : '' ?> type="checkbox" name="notice[change]">
                    <p>Получать уведомления об изменениях процедуры на почту</p>
                </label>
                <label class="cabinet_settings-personal_label">
                    <input <?= isset($params['sms']) ? 'checked' : '' ?> type="checkbox" name="notice[sms]">
                    <p>Получать SMS-уведомления об изменениях процедуры</p>
                </label>

                <!-- Добавлено -->
                <label class="cabinet_settings-personal_label">
                    <input <?= isset($params['']) ? 'checked' : '' ?> type="checkbox" name="notice[]">
                    <p>Получать уведомления о новых статьях</p>
                </label>
                <!-- Добавлено -->
                <button type="submit" class="btn btn--red btn--submit-settings btn--submit-settings-last">Сохранить изменения</button>
            </div>
        </section>
<?= Html::endForm(); ?>
    </article>



<div class="save-popup-back"></div>
<div class="save-popup-wrap">
    <section class="save-popup">
        Изменения сохранены
    </section>
</div>
<?//= Html::beginForm('', 'post', ['class' => 'popup-phone-settings']) ?>
<!--            <div class="save-phone-popup-wrap">-->
<!--                <section class="save-phone-popup">-->
<!--                    <button type="button" class="PopupClose">-->
<!--                        <img src="--><?//= Url::to('/img/close.svg') ?><!--" alt="close">-->
<!--                    </button>-->
<!---->
<!--                    <div class="Staps_content">-->
<!--                        <h2 class="signin_main-title">-->
<!--                            Изменение номера телефона-->
<!--                        </h2>-->
<!--                        <h3 class="signin_main-subtitle">-->
<!--                            Введите код подвтерждения из SMS-сообщения, отправленного на номер <span class="signin_main-subtitle-phone3"></span>-->
<!--                        </h3>-->
<!--                        <button class="signin_main-subtitle-btn" type="button">-->
<!--                            Изменить номер-->
<!--                        </button>-->
<!--                        <div class="signin_main_inpgroup">-->
<!--                            <input class="InputT" required placeholder="Код подтверждения" minlength="6" type="text" name="code-confirm">-->
<!--                        </div>-->
<!--                        <div class="signin_main_sendcode">-->
<!--                            <p class="signin_main_sendcode-text">-->
<!--                                Повторить отправку кода через <span class="signin_main_sendcode-text-num">1:59</span>-->
<!--                            </p>-->
<!--                            <button type="button" class="signin_main_sendcode-again">-->
<!--                                Отправить код повторно-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <button type="submit" class="signin_btn btn btn--blue">-->
<!--                            Продолжить-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </section>-->
<!--            </div>-->
<?//= Html::endForm() ?>