<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';

$js =<<< JS
var SignStapCounter = 0,
    SignStap = '.Stap' + SignStapCounter,
    SignStapNext = '.Stap' + (SignStapCounter + 1),
    timer_c = 59,
    timer_a = 59,
    timer = '1:' + timer_c,
    trig = 1,
    flag = true;
   
$('.signin-nextBTN').on('click', function(){
    var     phone = $('#reg_phone').val(),
            timeoutSms = null,
            firstInp = $(this).parent().find('.signin_main_inpgroup input:first-child').val().length,
            lastInp = $(this).parent().find('.signin_main_inpgroup input:last-child').val().length;
    if (SignStapCounter === 0){
        if (firstInp > 0 && lastInp > 0){
            $.ajax({
        url: '/site/check-phone',
        dataType: 'JSON',
        data: {phone:phone},
        type: 'POST',
      }).done(function (rsp) {
        if (rsp.exist){
            flag = false;
            $('.signin_main_already-regist').fadeIn(300);
        }else if (rsp.status === 'error'){
            flag = false;
            $('.Stap1 .signin_main-subtitle').text('Не более 1 смс в 2 минуты').css('color', 'red');
        } else {
            flag = true;
        }
        if (flag){
            $('.Stap1').fadeOut(300, function() {
            $('.signin_main-subtitle-phone').text($('.signin_main-phone').val());
              $('.Stap2').fadeIn(300);
              if($('.Stap2').is(":visible") && trig == 1){
                setInterval(function(){
                  trig = 0;
                  if(timer_c > 0){
                    timer_c--;
                    timer = '1:' + timer_c;
                    $('.signin_main_sendcode-text-num').text(timer);
                  }else if(timer_a > 0) {
                    timer_a--;
                    $('.signin_main_sendcode-text-num').text(timer_a);
                  }else {
                    $('.signin_main-subtitle-btn').fadeIn(0);
                    $('.signin_main_sendcode-text').fadeOut(0);
                    $('.signin_main_sendcode-again').fadeIn(0);
                  }
                }, 1000);
              }
            });
            if (timeoutSms === null) {
                $.ajax({
                    url: '/site/send-sms',
                    data: {phone:phone},
                    dataType: 'JSON',
                    type: 'POST',
                }).done(function(rsp) {});
            }
            timeoutSms = setTimeout(function() {
                timeoutSms = null;
            }, 120000);
            SignStapCounter++;
        }
        });
        } else {
            $('.Stap1 .signin_main-subtitle').text('Заполните все поля').css('color', 'red');
        }
      
    } else if (SignStapCounter === 1) {
        var code = $('#reg_code').val();
        $.ajax({
            url: '/site/code-confirm',
            data: {code:code},
            dataType: 'JSON',
            type: 'POST',
        }).done(function(rsp) {
            if (rsp.status === 'error'){
                $('.error__text').html(rsp.message);
                $('.error__text').show();
            } else {
                SignStapCounter++
                $('.Stap2').fadeOut(300, function() {
                    $('.Stap3').fadeIn(300);
                });
            }
        });
    }else if (SignStapCounter === 2) {
        if ($('#reg_region').val().length > 0){
            SignStapCounter++ 
             $('.Stap3').fadeOut(300, function() {
                $('.Stap4').fadeIn(300);
             });
        }
    }
    console.log(SignStapCounter);

  
  $('.signin_main_sendcode-again').on('click', function() {
      var  phone = $('#reg_phone').val();
        $.ajax({
            url: '/site/send-sms',
            data: {phone:phone},
            dataType: 'JSON',
            type: 'POST',
        }).done(function(rsp) {
            console.log(rsp);
          if (rsp.status === 'error'){
              $('.error__text').text(rsp.message);
              $('.error__text').show();
          } else {
              $('.signin_main_sendcode-again').remove();
          }
        });
  });
  $('.signin_main-subtitle-btn').on('click', function(){
      $(SignStapNext).fadeOut(300, function() {
        $(SignStap).fadeIn(300);
        SignStapCounter--;
        SignStap = '.Stap' + SignStapCounter;
        SignStapNext = '.Stap' + (SignStapCounter + 1);
      });
      timer_c = 59;
      timer_a = 59;
      timer = '1:' + timer_c;
      $('.signin_main-subtitle-btn').fadeOut(0);
      $('.signin_main_sendcode-text').fadeIn(0);
      $('.signin_main_sendcode-again').fadeOut(0);
  });
  
});
  
  $('.sends__forms-register').on('click', function () {
      var username = $('#reg_phone').val(),
          email = $('#reg_email').val(),
          fio = $('#reg_fio').val(),
          region = $('#reg_region').val(),
          password = $('input[name="password"]').val(),
          confirm_pass = $('input[name="confirm_pass"]').val();
  $.ajax({
    url: "/site/confirm-signup",
    type: "POST",
    dataType: 'JSON',
    data: {fio:fio, username:username, email:email, region:region, password:password, confirm_pass:confirm_pass},
  }).done(function(rsp) {
    if (rsp.status === 'success'){
      $('.Stap4').fadeOut(300, function() {
        $('.Stap5').fadeIn(300);
      });
      setTimeout(function() {
        location.href = '/login';
      }, 6000)
    } else {
      $('.Stap4 .signin_main-subtitle').text(rsp.message);
    }
  });
});

JS;
$this->registerJs($js);
?>

<section class="signin">
    <div class="container">
        <div class="signin_wrapper">
            <section class="signin_main">
                <div class="signin_main_wrapper">
                    <a class="link link--gray signin_main--link" href="<?= Url::to(['/']) ?>">Вернуться на главную</a>

                    <div class="Staps Stap1">
                        <div class="Staps_content">
                            <p class="signin_main-stap">Шаг 1 / 4</p>
                            <h1 class="signin_main-title">
                                Регистрация
                            </h1>
                            <div class="signin_main_already-regist">
                                <h2 class="signin_main_already-regist-title">
                                    На указанный номер уже зарегистрирован пользователь
                                </h2>
                                <h3 class="signin_main_already-regist-subtitle">
                                    Укажите другой номер или войдите в аккаунт
                                </h3>
                            </div>
                            <h2 class="signin_main-subtitle">
                                Укажите ваши данные для регистрации на сайте
                            </h2>
                            <div class="signin_main_inpgroup">
                                <input id="reg_fio" class="InputT" placeholder="Фамилия Имя Отчество" minlength="2"
                                    type="text" name="fio">
                                <input id="reg_phone" class="InputT signin_main-phone" placeholder="Номер телефона"
                                    type="tel" name="username">
                            </div>
                            <button type="button" class="signin_btn btn btn--blue signin-nextBTN">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Уже есть аккаунт?
                                <a class="link link--blue signin_main_last-link"
                                    href="<?= Url::to(['login']) ?>">Войти</a>
                            </p>
                        </div>
                    </div>

                    <div class="Staps Stap2">
                        <div class="Staps_content">
                            <p class="signin_main-stap">Шаг 2 / 4</p>
                            <h1 class="signin_main-title">
                                Регистрация
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Введите код подтверждения из SMS-сообщения, отправленного на номер <span
                                    class="signin_main-subtitle-phone"></span>
                            </h2>
                            <button class="signin_main-subtitle-btn" type="button">
                                Изменить номер
                            </button>
                            <p style="margin-top: 10px;margin-bottom: 10px;color: red;font-size: 16px;font-weight: 500px;display: none"
                                class="error__text"></p>
                            <div class="signin_main_inpgroup">
                                <input id="reg_code" class="InputT" required placeholder="Код подтверждения"
                                    minlength="6" type="text" name="code">
                            </div>
                            <div class="signin_main_sendcode">
                                <p class="signin_main_sendcode-text">
                                    Повторить отправку кода через <span
                                        class="signin_main_sendcode-text-num">1:59</span>
                                </p>
                                <button type="button" class="signin_main_sendcode-again ">
                                    Отправить код повторно
                                </button>
                            </div>
                            <button type="button" class="signin_btn btn btn--blue signin-nextBTN">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Уже есть аккаунт?
                                <a class="link link--blue signin_main_last-link"
                                    href="<?= Url::to(['login']) ?>">Войти</a>
                            </p>
                        </div>
                    </div>

                    <div class="Staps Stap3">
                        <div class="Staps_content">
                            <p class="signin_main-stap">Шаг 3 / 4</p>
                            <h1 class="signin_main-title">
                                Регистрация
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Укажите вашу электронную почту и регион
                            </h2>
                            <h3 class="signin_main-subtitle-2">Важно! Укажите настоящую электронную почту, чтобы
                                получать оповещения о ходе процедуры списания ваших долгов</h3>
                            <div class="signin_main_inpgroup">
                                <input id="reg_email" class="InputT" placeholder="Почта" type="email" name="email">
                                <input id="reg_region" class="InputT" required placeholder="Ваш регион" minlength="2"
                                    type="text" name="new_region">
                            </div>
                            <button type="button" class="signin_btn btn btn--blue signin-nextBTN">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Уже есть аккаунт?
                                <a class="link link--blue signin_main_last-link"
                                    href="<?= Url::to(['login']) ?>">Войти</a>
                            </p>
                        </div>
                    </div>

                    <div class="Staps Stap4">
                        <div class="Staps_content">
                            <p class="signin_main-stap">Шаг 4 / 4</p>
                            <h1 class="signin_main-title">
                                Регистрация
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Придумайте пароль
                            </h2>
                            <div class="signin_main_inpgroup">
                                <input class="InputT signin_main-password" required placeholder="Введите пароль"
                                    type="password" name="password">
                                <input class="InputT signin_main-confirm-password" required
                                    placeholder="Повторите пароль" type="password" name="confirm_pass">
                            </div>
                            <button type="button" class="signin_btn btn btn--blue sends__forms-register">
                                Продолжить
                            </button>
                            <p class="signin_main_last">
                                Уже есть аккаунт?
                                <a class="link link--blue signin_main_last-link"
                                    href="<?= Url::to(['login']) ?>">Войти</a>
                            </p>
                        </div>
                    </div>

                    <div class="Staps Stap5">
                        <div class="Staps_content">
                            <p class="signin_main-stap">Шаг 4 / 4</p>
                            <h1 class="signin_main-title">
                                Регистрация завершена
                            </h1>
                            <h2 class="signin_main-subtitle">
                                Для начала процедуры списания долгов вам необходимо заполнить Анкету
                            </h2>
                            <h2 class="signin_main-subtitle">
                                А также выбрать удобный для вас Способ оплаты
                            </h2>
                            <h2 class="signin_main-subtitle">
                                Если у вас возник вопрос, свяжитесь с нами по номеру <a
                                    class="link link--blue signin_main_last-link" href="tel:+7 (495) 414-15-23">+7 (495)
                                    414-15-23</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="signin_aside">
                <div class="signin_aside_content">
                    <h2 class="signin_aside-title">Получите помощь юриста в списании ваших долгов</h2>
                    <ul class="signin_aside-column">
                        <li class="signin_aside-column-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                viewBox="0 0 28 28">
                                <path fill="#AAB" fill-rule="evenodd"
                                    d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                                    clip-rule="evenodd"></path>
                            </svg>Онлайн-аудит вашей проблемы
                        </li>
                        <li class="signin_aside-column-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                viewBox="0 0 28 28">
                                <path fill="#AAB" fill-rule="evenodd"
                                    d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                                    clip-rule="evenodd"></path>
                            </svg>Помогаем в любом регионе России
                        </li>
                        <li class="signin_aside-column-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                viewBox="0 0 28 28">
                                <path fill="#AAB" fill-rule="evenodd"
                                    d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                                    clip-rule="evenodd"></path>
                            </svg>Гарантийная защита имущества от реализации
                        </li>
                        <li class="signin_aside-column-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                viewBox="0 0 28 28">
                                <path fill="#AAB" fill-rule="evenodd"
                                    d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                                    clip-rule="evenodd"></path>
                            </svg>Дистанционное списание долгов
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>