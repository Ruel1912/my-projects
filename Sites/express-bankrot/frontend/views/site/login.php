<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
$confirmLogin = $_SESSION['valid_user'] ?? null;
$_SESSION['valid_user'] = false;
if (!empty($confirmLogin) && $confirmLogin == true){
    $js =<<< JS
    setTimeout(function() {
        $('#login-form').submit();
        console.log('ok');
    }, 2000);
    JS;
} else {
    $js =<<< JS
    $('.LogonForm').on('submit', function(e) {
        e.preventDefault();
        return true;
    });

    var timer_c2 = 59,
        timer_a2 = 59,
        timer2 = '1:' + timer_c2,
        trig2 = 1;
    $('#restorBtn1').on('click', function() {
        var phone = $('#input__phone').val();
        if (phone.length > 0){
            $.ajax({
                url: '/site/check-phone',
                data: {phone:phone},
                dataType: 'JSON',
                type: 'POST',
            }).done(function(rsp) {
                if (rsp.status){
                    $('.error__text-restore').text(rsp.message).fadeIn(300);
                } else {
                    if(!rsp.exist){
                         $('.error__text-restore').text('Пользователь не найден').fadeIn(300);
                    } else {
                         setTimeout(function(){
                          $('.logon_main-subtitle-phone').text($('.logon_main-phone').val());
                          if($('.Logon_Stap2').is(":visible") && trig2 == 1){
                            setInterval(function(){
                              trig2 = 0;
                              if(timer_c2 > 0){
                                timer_c2--;
                                timer2 = '1:' + timer_c2;
                                $('.signin_main_sendcode-text-num').text(timer2);
                              }else if(timer_a2 > 0) {
                                timer_a2--;
                                $('.signin_main_sendcode-text-num').text(timer_a2);
                              }else {
                                $('.signin_main_sendcode-text').fadeOut(0);
                                $('.signin_main-subtitle-btn').fadeIn(0);
                                $('.signin_main_sendcode-again').fadeIn(0);
                              }
                            }, 1000);
                          }
                        }, 300);
                         $('.Logon_Stap1').fadeOut(1,function() {
                           $('.Logon_Stap2').fadeIn(300);
                         });
                         $.ajax({
                            url: '/site/send-sms',
                            data: {phone:phone},
                            dataType: 'JSON',
                            type: 'POST',
                         }).done(function(rsp) {console.log(rsp)});
                    }
                }
            });
        }
    });
    
    $('#sendCode').on('click', function() {
      var code = $('#reset_code_send').val();
        $.ajax({
            url: '/site/code-confirm',
            data: {code:code},
            dataType: 'JSON',
            type: 'POST',
        }).done(function(rsp) {
            if (rsp.status === 'error'){
                $('.error__text-restore2').html(rsp.message).show(100);
            } else {
                $('.Logon_Stap2').fadeOut(300, function() {
                    $('.Logon_Stap3').fadeIn(300);
                });
            }
        });
    });
    
        $('#sendNewPass').on('click', function() {
        var npass = $('#newPass').val(),
          confPass = $('#confPass').val(),
          phone = $('#input__phone').val();
        if (npass === confPass){
          $.ajax({
            url: '/site/restore-pass',
            data: {new:npass, conf:confPass, phone:phone},
            dataType: 'JSON',
            type: 'POST',
          }).done(function(rsp) {
            if (rsp.status === 'error'){
                $('.error__text-restore3').text(rsp.message).fadeIn(300);
            } else {
               $('.Logon_Stap3').fadeOut(300, function() {
                    $('.Logon_Stap4').fadeIn(300);
               });
            }
          });
        }
        });
    
     $('.signin_main-subtitle-btn').on('click', function(){
       $('.Logon_Stap2').fadeOut(300, function() {
         $('.Logon_Stap1').fadeIn(300);
         $('.signin_main_sendcode-text').fadeIn(0);
         $('.signin_main-subtitle-btn').fadeOut(0);
         $('.signin_main_sendcode-again').fadeOut(0);
       });
       timer_c2 = 59;
       timer_a2 = 59;
       timer2 = '1:' + timer_c2;
    });
         
    $('.signin_main_sendcode-again').on('click', function(){
      var phone = $('#input__phone').val();
      $.ajax({
        url: '/site/send-sms',
        data: {phone:phone},
        dataType: 'JSON',
        type: 'POST',
     }).done(function(rsp) {
         if (rsp.status === 'error'){
            $('.error__text-restore2').text(rsp.message).fadeIn(300);
         } else {
            $('.signin_main_sendcode-again').fadeOut(0);
            $('.signin_main_sendcode-text').fadeIn(0);
            $('.signin_main-subtitle-btn').fadeOut(0);
            timer_c2 = 59;
            timer_a2 = 59;
            timer2 = '1:' + timer_c2;
         }
     });
    });
JS;
}

$this->registerJs($js);

$css =<<< CSS
.form-group{
    width: 100%;
}
CSS;
$this->registerCss($css);
?>
<style>
    .help-block-error {
        margin-bottom: 10px;
        color: red;
    }
</style>
<section class="signin">
    <div class="container">
        <div class="signin_wrapper">
            <section class="signin_main">
                <div class="signin_main_wrapper">
                    <a class="link link--gray signin_main--link" href="<?= Url::to(['/']) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M7.5 15L2.5 10L7.5 5" stroke="#AAAABB" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M17.5 10H3.33333" stroke="#AAAABB" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M2.49967 10H3.33301" stroke="#AAAABB" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'LogonForm']); ?>
                    <div class="Logon_Logon_Staps Logon_Stap0">
                        <div class="Logon_Staps_content">
                            <h1 class="signin_main-title">
                                Вход
                            </h1>
                            <div class="signin_main_already-regist logon_main_not-regist">
                                <h2 class="signin_main_already-regist-title">
                                    Указанный номер не принадлежит ни одному из аккаунтов.
                                </h2>
                                <h3 class="signin_main_already-regist-subtitle">
                                    Укажите другой номер или зарегистрируйтесь
                                </h3>
                            </div>
                            <h2 class="signin_main-subtitle">
                                Войдите в аккаунт, чтобы ознакомиться с этапами списания ваших долгов
                            </h2>
                            <div class="signin_main_inpgroup">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'InputT signin_main-phone', 'placeholder' => 'Номер телефона', 'type' => 'tel', 'value' => $_SESSION['phone'] ?? ''])->label(false) ?>
                                <?= $form->field($model, 'password')->passwordInput(['class' => 'InputT', 'placeholder' => 'Пароль', 'value' => $_SESSION['password'] ?? ''])->label(false) ?>
                            </div>
                            <button type="button" class="forgot-password">Забыли пароль?</button>
                            <?= Html::submitButton('Войти', ['class' => 'signin_btn btn btn--blue', 'name' => 'login-button']) ?>
                            <p class="signin_main_last">
                                Нет аккаунта?
                                <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                    <?= Html::beginForm('', 'post', ['class' => 'Logon-recoveryForm']) ?>
                    <div class="Logon_Staps Logon_Stap1">
                        <div class="Logon_Staps_content">
                            <h1 class="signin_main-title">
                                Восстановление пароля
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Укажите ваш номер телефона и мы отправим вам код для подтверждения аккаунта
                            </h2>
                            <p style="margin-bottom: 15px; color: red; font-size: 16px; font-weight: 500; display: none" class="error__text-restore"></p>
                            <div class="signin_main_inpgroup">
                                <input id="input__phone" class="InputT logon_main-phone" required placeholder="Номер телефона" type="tel" name="phone">
                            </div>
                            <button type="button" id="restorBtn1" class="signin_btn btn btn--blue logon-nextBTN">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Нет аккаунта?
                                <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </div>

                    <div class="Logon_Staps Logon_Stap2">
                        <div class="Logon_Staps_content">
                            <h1 class="signin_main-title">
                                Восстановление пароля
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Введите код подтверждения из SMS-сообщения, отправленного на номер <span class="logon_main-subtitle-phone"></span>
                            </h2>
                            <button class="signin_main-subtitle-btn" type="button">
                                Изменить номер
                            </button>
                            <p style="margin-bottom: 15px; color: red; font-size: 16px; font-weight: 500; display: none" class="error__text-restore2"></p>
                            <div class="signin_main_inpgroup">
                                <input class="InputT" id="reset_code_send" required placeholder="Код подтверждения"  minlength="6" type="text" name="code">
                            </div>
                            <div class="signin_main_sendcode">
                                <p class="signin_main_sendcode-text">
                                    Повторить отправку кода через <span class="signin_main_sendcode-text-num">1:59</span>
                                </p>
                                <button type="button" class="signin_main_sendcode-again">
                                    Отправить код повторно
                                </button>
                            </div>
                            <button id="sendCode" type="button" class="signin_btn btn btn--blue logon-nextBTN">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Нет аккаунта?
                                <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </div>

                    <div class="Logon_Staps Logon_Stap3">
                        <div class="Logon_Staps_content">
                            <h1 class="signin_main-title">
                                Восстановление пароля
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Придумайте новый пароль
                            </h2>
                            <p style="margin-bottom: 15px; color: red; font-size: 16px; font-weight: 500; display: none" class="error__text-restore3"></p>
                            <div class="signin_main_inpgroup">
                                <input id="newPass" class="InputT signin_main-password" required placeholder="Введите новый пароль" type="password" name="password">
                                <input id="confPass" class="InputT signin_main-confirm-password" required placeholder="Повторите пароль" type="password" name="confirm-password">
                            </div>
                            <button id="sendNewPass" type="button" class="signin_btn btn btn--blue">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Нет аккаунта?
                                <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </div>

                    <div class="Logon_Staps Logon_Stap4">
                        <div class="Logon_Staps_content">
                            <h1 class="signin_main-title signin_main-title-last">
                                Вы успешно сменили пароль
                            </h1>
                            <a href="<?= Url::to(['login']) ?>" class="signin_btn btn btn--blue">
                                Войти в аккаунт
                            </a>
                            <p class="signin_main_last">
                                Нет аккаунта?
                                <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </div>
                    <?= Html::endForm() ?>
                </div>
            </section>
            <aside class="signin_aside">
                <div class="signin_aside_content">
                    <h2 class="signin_aside-title">Получите помощь юриста в списании ваших долгов</h2>
                    <ul class="signin_aside-column">
                        <li class="signin_aside-column-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65916V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65916C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.6247C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31659 10.9024 8.68342 10.9024 8.2929 11.2929C7.90237 11.6834 7.90237 12.3166 8.2929 12.7071L9.89788 14.3121C10.5301 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.6247Z" fill="#AAAABB"/>
</svg>Онлайн-аудит вашей проблемы
                        </li>
                        <li class="signin_aside-column-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65916V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65916C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.6247C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31659 10.9024 8.68342 10.9024 8.2929 11.2929C7.90237 11.6834 7.90237 12.3166 8.2929 12.7071L9.89788 14.3121C10.5301 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.6247Z" fill="#AAAABB"/>
</svg>Помогаем в любом регионе России
                        </li>
                        <li class="signin_aside-column-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65916V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65916C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.6247C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31659 10.9024 8.68342 10.9024 8.2929 11.2929C7.90237 11.6834 7.90237 12.3166 8.2929 12.7071L9.89788 14.3121C10.5301 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.6247Z" fill="#AAAABB"/>
</svg>Гарантийная защита имущества от реализации
                        </li>
                        <li class="signin_aside-column-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3939 5.74002L13.1818 3.50624C12.4271 3.18282 11.5729 3.18282 10.8182 3.50624L5.60608 5.74002C5.2384 5.8976 5 6.25914 5 6.65916V11.9121C5 13.8498 5.93579 15.6682 7.51257 16.7945L10.8375 19.1694C11.5329 19.6661 12.4671 19.6661 13.1625 19.1694L16.4874 16.7945C18.0642 15.6682 19 13.8498 19 11.9121V6.65916C19 6.25914 18.7616 5.8976 18.3939 5.74002ZM15.7809 9.6247C16.1259 9.19343 16.056 8.56414 15.6247 8.21913C15.1934 7.87412 14.5641 7.94404 14.2191 8.37531L10.9171 12.5029L9.70711 11.2929C9.31659 10.9024 8.68342 10.9024 8.2929 11.2929C7.90237 11.6834 7.90237 12.3166 8.2929 12.7071L9.89788 14.3121C10.5301 14.9443 11.5714 14.8866 12.1298 14.1885L15.7809 9.6247Z" fill="#AAAABB"/>
</svg>Дистанционное списание долгов
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
