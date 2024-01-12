<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Вход';
?>

<section class="signin">
    <div class="container">
        <div class="signin_wrapper">
            <section class="signin_main">
                <div class="signin_main_wrapper">
                    <a class="link link--gray signin_main--link" href="<?= Url::to(['/']) ?>">Вернуться на главную</a>
                        
                    <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data', 'class' => 'LogonForm']) ?>
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
                                    <input class="InputT signin_main-phone" required placeholder="Номер телефона" type="tel" name="phone">
                                    <input class="InputT" required placeholder="Пароль" type="passwod" name="passwod">
                                </div>
                                <a href="<?= Url::to(['requestPasswordResetToken']) ?>" class="forgot-password">Забыли пароль?</a>
                                <button type="submit" class="signin_btn btn btn--blue">
                                    Войти
                                </button>
                                <p class="signin_main_last">
                                    Нет аккаунта?
                                    <a class="link link--blue signin_main_last-link" href="<?= Url::to(['signin']) ?>">Зарегистрироваться</a>
                                </p>
                            </div>
                        </div>
                    <?= Html::endForm() ?>

                    <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data', 'class' => 'Logon-recoveryForm']) ?>
                        <div class="Logon_Staps Logon_Stap1">
                            <div class="Logon_Staps_content">
                                <h1 class="signin_main-title">
                                    Восстановление пароля
                                </h1>
                                <h2 class="signin_main-subtitle">
                                    Укажите ваш номер телефона и мы отправим вам код для подтверждения аккаунта
                                </h2>
                                <div class="signin_main_inpgroup">
                                    <input class="InputT logon_main-phone" required placeholder="Номер телефона" type="tel" name="phone">
                                </div>
                                <button type="button" class="signin_btn btn btn--blue logon-nextBTN">
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
                                <div class="signin_main_inpgroup">
                                    <input class="InputT" required placeholder="Код подтверждения"  minlength="6" type="text" name="code">
                                </div>
                                <div class="signin_main_sendcode">
                                    <p class="signin_main_sendcode-text">
                                        Повторить отправку кода через <span class="signin_main_sendcode-text-num">1:59</span>
                                    </p>
                                    <button type="button" class="signin_main_sendcode-again">
                                        Отправить код повторно
                                    </button>
                                </div>
                                <button type="button" class="signin_btn btn btn--blue logon-nextBTN">
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
                                <div class="signin_main_inpgroup">
                                    <input class="InputT signin_main-password" required placeholder="Введите новый пароль" type="password" name="password">
                                    <input class="InputT signin_main-confirm-password" required placeholder="Повторите пароль" type="password" name="confirm-password">
                                </div>
                                <button type="submit" class="signin_btn btn btn--blue">
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
                            Онлайн-аудит вашей проблемы
                        </li>
                        <li class="signin_aside-column-item">
                            Помогаем в любом регионе России
                        </li>
                        <li class="signin_aside-column-item">
                            Гарантийная защита имущества от реализации
                        </li>
                        <li class="signin_aside-column-item">
                            Дистанционное списание долгов
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>