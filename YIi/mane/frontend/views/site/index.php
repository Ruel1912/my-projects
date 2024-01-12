<?php

use yii\helpers\Url;
use yii\helpers\Html;
$this->registerCssFile("@web/css/index.css");
$this->registerCssFile("@web/css/swiper.css");
$this->registerJsFile("@web/js/modal.js");
$this->registerJsFile("@web/js/index.js");
$this->registerJsFile("@web/js/select.js");
$this->registerJsFile("@web/js/accordion.js");
$this->title = 'PRAVO M Юридическая компания';
?>

<section class="mainpage_main changeBg">
    <div class="container">
        <div class="mainpage_main_wrapper">
            <div class="mainpage_main_left">
                <p class="mainpage_main_left-prevbtn">
                    Работаем на основании ФЗ «О несостоятельности(банкростве)» №127-ФЗ
                </p>
                <h1 class="mainpage_main_left-title title">
                    Честная и законная помощь в списании долгов под ключ <br> Рассрочка 0%
                </h1>
                <div class="mainpage_buttons">
                    <button class="btn btn--red open-modal" data-modal="main">Получить бесплатную консультацию</button>
                </div>
            </div>
        </div>
        <div class="mainpage_banner">
            <div class="mainpage_banner_item">
                <div class="mainpage_banner_item_left"><img src="<?= Url::to("@web/img/Layer_1.svg")?>" alt="Молоток">
                </div>
                <div class="mainpage_banner_item_right">
                    <h3 class="title">150+</h3>
                    <p>млн. списанных долгов</p>
                </div>
            </div>
            <div class="mainpage_banner_item">
                <div class="mainpage_banner_item_left"><img src="<?= Url::to("@web/img/Layer_1-1.svg")?>" alt="Судья">
                </div>
                <div class="mainpage_banner_item_right">
                    <h3 class="title">100%</h3>
                    <p>Выигранных дел</p>
                </div>
            </div>
            <div class="mainpage_banner_item">
                <div class="mainpage_banner_item_left"><img src="<?= Url::to("@web/img/Layer_1-2.svg")?>" alt="Весы">
                </div>
                <div class="mainpage_banner_item_right">
                    <h3 class="title">8+ лет</h3>
                    <p>Работем с 2015 года</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mainpage_quiz">
    <div class="container">
        <h2 class="title">Узнайте стоимость списания ваших долгов в 4 клика</h2>
        <div class="mainpage_quiz_inner">
            <div class="mainpage_quiz_left">
                <?= Html::beginForm('', 'post', ['class' => 'mainpage_quiz_form']) ?>
                <div class="mainpage_quiz_form_inner">
                    <div class="select__row">
                        <h3>1. Общая сумма задолженности:</h3>
                        <div class="select">
                            <div class="select__header">
                                <p>Выберите значение из списка</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="#000" fill-opacity=".56" d="m7 9.5 5 5 5-5H7Z" />
                                </svg>
                            </div>
                            <div class="select__content">
                                <p>От 250 тыс. - 500 тыс. руб.</p>
                                <p>От 500 тыс. - 1 млн. руб.</p>
                                <p>Более 1 млн. руб.</p>
                            </div>
                            <input type="hidden" name="message[Общая сумма задолженности]">
                        </div>
                    </div>
                    <div class="select__row">
                        <h3>2. Есть ли просрочки?</h3>
                        <div class="select">
                            <div class="select__header">
                                <p>Выберите значение из списка</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="#000" fill-opacity=".56" d="m7 9.5 5 5 5-5H7Z" />
                                </svg>
                            </div>
                            <div class="select__content">
                                <p>Да</p>
                                <p>Нет</p>
                            </div>
                            <input type="hidden" name="message[Есть ли просрочки]">
                        </div>
                    </div>
                    <div class="select__row">
                        <h3>3. Есть ли имущество?</h3>
                        <div class="select">
                            <div class="select__header">
                                <p>Выберите значение из списка</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="#000" fill-opacity=".56" d="m7 9.5 5 5 5-5H7Z" />
                                </svg>
                            </div>
                            <div class="select__content">
                                <p>Да</p>
                                <p>Нет</p>
                            </div>
                            <input type="hidden" name="message[Есть ли имущество]">
                        </div>
                    </div>
                    <div class="select__row">
                        <h3>4. Ваш доход:</h3>
                        <div class="select">
                            <div class="select__header">
                                <p>Выберите значение из списка</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="#000" fill-opacity=".56" d="m7 9.5 5 5 5-5H7Z" />
                                </svg>
                            </div>
                            <div class="select__content">
                                <p>Нет дохода</p>
                                <p>до 20.000 руб.</p>
                                <p>от 20.000 до 50.000 руб.</p>
                                <p>более 50.000 руб.</p>
                            </div>
                            <input type="hidden" name="message[Есть ли просрочки]">
                        </div>
                    </div>
                    <input required type="text" name="fio" placeholder="Введите имя">
                    <input required type="tel" name="phone" placeholder="Введите номер телефона">
                </div>
                <button type="submit" class="btn btn--red">Узнать стоимость</button>
                <?= Html::endForm() ?>
            </div>
            <div class="mainpage_quiz_right">
                <img src="<?= Url::to("@web/img/mane.png")?>" alt="Манэ Даниелян">
            </div>
        </div>
    </div>
</section>
<?php if (!empty($services)): ?>
<?php endif; ?>
<section class="mainpage_services" id="services">
    <div class="container">
        <div class="mainpage_services_wrapper">
            <div class="mainpage_services_info">
                <h2 class="mainpage_guarantees_left title">
                    услуги
                </h2>
                <div class="mainpage_services_info_right">
                    <div class="mainpage_services_info_cards">
                        <?php foreach ($services as $k => $v): ?>
                        <div class="mainpage_services_info_card">
                            <div class="mainpage_services_info_card_left">
                                <img src="<?= Url::to([str_replace( "/admin", '/backend/web', $v['image'])]) ?>"
                                    alt="фоновая картинка">
                            </div>
                            <div class="mainpage_services_info_card_right">
                                <h3 class="mainpage_services_info_card-title">
                                    <?= $v['title'] ?>
                                </h3>
                                <p class="mainpage_services_info_card-undertitle">
                                    <?= $v['smal_title'] ?>
                                </p>
                                <h4 class="mainpage_services_info_card_price">Цена:
                                    <?php $v['price'] = 10 ?>
                                    <span><?= $v['price'] == 0 ? $v['price'] : "от {$v['price']}" ?></span>
                                    руб.
                                </h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="btn btn--red open-modal" data-modal="main">Оставить заявку</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mainpage_about" id="why-we">
    <div class="container">
        <h2 class="title">Почему мы</h2>
        <div class="mainpage_about_wrapper">
            <div class="mainpage_about_wrapper_left">
                <img src="<?= Url::to("@web/img/about.png")?>" alt="Иллстрация">
            </div>
            <div class="mainpage_about_wrapper_right">
                <ul class="mainpage_about_wrapper_right_list">
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Успешная практика списания долгов 100%;</h3>
                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Соберем документы за вас;</h3>

                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Законные способы сохранения имущества;</h3>

                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Рассрочка платежа;</h3>

                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Проведение судебного заседания без вашего участия;</h3>

                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Отслеживание дела 24/7;</h3>

                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Успешная практика списания долгов 100%;</h3>
                    </li>
                    <li class="mainpage_about_wrapper_right_list_item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none" viewBox="0 0 41 41">
                            <path fill="#222"
                                d="M30.581 8.54a3.472 3.472 0 0 0 1.877 1.88l2.982 1.234a3.472 3.472 0 0 1 1.879 4.537l-1.234 2.98a3.467 3.467 0 0 0 .001 2.659l1.232 2.978a3.473 3.473 0 0 1-1.88 4.538l-2.98 1.235a3.472 3.472 0 0 0-1.88 1.877l-1.234 2.981a3.473 3.473 0 0 1-4.537 1.88l-2.98-1.234a3.472 3.472 0 0 0-2.656.002L16.19 37.32a3.473 3.473 0 0 1-4.534-1.878l-1.236-2.983a3.472 3.472 0 0 0-1.877-1.88l-2.981-1.235a3.473 3.473 0 0 1-1.88-4.535l1.234-2.979a3.48 3.48 0 0 0-.002-2.657L3.68 16.19a3.473 3.473 0 0 1 1.88-4.539l2.98-1.234a3.472 3.472 0 0 0 1.879-1.875l1.235-2.982a3.473 3.473 0 0 1 4.536-1.879l2.98 1.234c.85.352 1.806.35 2.657-.002l2.982-1.23a3.472 3.472 0 0 1 4.536 1.879l1.235 2.982V8.54Z" />
                            <path stroke="#FFEA30" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m29.042 17.083-10.57 8.542-4.805-3.883" />
                        </svg>
                        <h3>Психологическая и правовая поддержка: ограждение вас и ваших близких от угроз коллекторов
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="stages" id="stages">
    <div class="stages__wrapper">
        <div class="container">
            <h2 class="title">Этапы работы</h2>
            <div class="stages__wrapper_items">
                <div class="stages__wrapper_column">
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>1</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Консультация в офисе или онлайн</h3>
                            <p>Заполняете краткую анкету и получаете анализ вашей ситуации. Если банкротство
                                вам подходит —
                                составляем для вас дорожную карту и рассказываем все особенности банкротства.</p>
                        </div>
                    </div>
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>2</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Заключение договора</h3>
                            <p>Приступаем к работе над вашей проблемой. От вас нужна лишь доверенность на юриста (шаблон
                                предоставим).</p>
                        </div>
                    </div>
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>3</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Сбор документов</h3>
                            <p>Юрист собирает пакет документов для суда (множество выписок/справок и т.д.) Уведомляет
                                кредиторов о процедуре банкротства.</p>
                        </div>
                    </div>
                </div>
                <div class="stages__wrapper_column">
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>4</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Заявление в суд</h3>
                            <p>Ознакамливаем вас с документами, Подаём заявление и приложения к нему в арбитражный суд.
                            </p>
                        </div>
                    </div>
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>5</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Судебное заседание</h3>
                            <p>Признание банкротом и введение процедуры банкротства (реструктуризации или реализации).
                                Банки, кредиторы и коллекторы перестают вас беспокоить. Вам не требуется присутствие
                                на суде — это задача нашего юриста.</p>
                        </div>
                    </div>
                    <div class="stages__wrapper_item">
                        <div class="stages__wrapper_item_left"><span>6</span></div>
                        <div class="stages__wrapper_item_right">
                            <h3>Полное списание долгов</h3>
                            <p>Получение решения суда об освобождении от требований кредиторов. На этом этапе физическое
                                лицо освобождается от всех долговых обязательств.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="stages__banner">
        <div class="container">
            <div class="stages__banner_wrapper">
                <div class="stages__banner_left">
                    <h3 class="title">Мы списали долг <br> перед банками и МФО:</h3>
                </div>
                <div class="stages__banner_right">
                    <div class="stages__banner_slider">
                        <div class="swiper-container" id="partner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/сбер.png")?>" alt="Сбер">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/займ.png")?>" alt="Займер">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/вебзайм.jpg")?>" alt="Вебзайм">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/mkb_logo.png")?>" alt="МКБ">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/альфа.png")?>" alt="Альфа Банк">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= Url::to("@web/img/втб.png")?>" alt="ВТБ">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($completed)): ?>
<section class="mainpage_completed" id="results">
    <div class="container">
        <h2 class="title">
            Наши результаты
        </h2>
        <div class="mainpage_completed_wrapper">
            <div class="mainpage_completed_cards">
                <div class="swiper-container swiper-completed">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-wrapper">
                        <?php foreach ($completed as $k => $v): ?>
                        <?php $replace_img = str_replace( "/admin", '/backend/web', $v['image_case']) ?>
                        <div class="mainpage_completed_card swiper-slide"
                            style="background: url(<?= $replace_img ?>) no-repeat top center/cover">
                            <div class="mainpage_completed_card_body">
                                <h3 class="mainpage_completed_card_title">Дело <?= $v['case_number'] ?></h3>
                                <div class="mainpage_completed_card_grid">
                                    <div class="mainpage_completed_card_col">
                                        <span>Списано:</span>
                                        <span>Срок:</span>
                                        <span>Регион:</span>
                                    </div>
                                    <div class="mainpage_completed_card_col">
                                        <span><?= number_format($v['summ'], 0, 0, ' ') ?> руб.</span>
                                        <span>1 год</span>
                                        <span>Липецкая обл.</span>
                                    </div>
                                </div>
                                <a href="<?= $v['link_case']?>" class="mainpage_completed_card_body_link">Посмотреть
                                    документ</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="smi">
    <div class="smi__wrapper">
        <div class="container">
            <h2 class="title">Мы в СМИ</h2>
            <div class="smi__items">
                <div class="smi__item">
                    <img class="smi__item_img" src="<?= Url::to("@web/img/rus-bankrot.png")?>" alt="Газета RUSBANKROT">
                    <p class="smi__item_text">«Среди экспертов и специалистов не утихают дискуссии о влиянии пандемии
                        на статистику банкротств.
                        Если взглянуть на динамику банкротства граждан, с момента принятия соответствующего закона,
                        то явно
                        прослеживается…»</p>
                    <a class="smi__item_link"
                        href="https://rusbankrot.ru/people/chto-menyaetsya-v-bankrotstvakh-na-fone-koronakrizisa/">Читать
                        далее...</a>
                </div>
                <div class="smi__item">
                    <img class="smi__item_img" src="<?= Url::to("@web/img/rus-gazeta.png")?>" alt="Российская Газета">
                    <p class="smi__item_text">«В России, очевидно, полноценно заработает практика изъятия за долги
                        единственного жилья, если оно будет признано роскошным, с последующим переселением должника
                        в пристанище поскромнее…»</p>
                    <a class="smi__item_link" href="http://sroroo.ru/press_center/news/3496377/">Читать далее...</a>
                </div>
            </div>
        </div>
</section>

<section class="reasons">
    <div class="container">
        <h2 class="title">
            Каждый человек может оказаться в сложной финансовой ситуации по разным причинам
        </h2>
        <h3 class="reasons_sub-title">Мы поможем в любом даже самом тяжелом случае:</h3>
        <div class="reasons_items">
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/credit-card.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title">Вы брали кредит на бизнес и не справились с выплатой кредита</h4>
                <p class="reasonos_item_text">У Вас нет возможности вернуть этот кредит</p>
            </div>
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/office-worker.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title">Вы пенсионер. Не справляетесь с оплатой кредитов и коммунальных услуг
                </h4>
                <p class="reasonos_item_text">Размер пенсии просто не позволяет выплачивать долги</p>
            </div>
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/graph-bar.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title">Вы потеряли работу или у Вас снизился уровень дохода</h4>
                <p class="reasonos_item_text">Или другая сложная жизненная ситуация, когда нечем платить кредит</p>
            </div>
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/phone-ringing.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title">Вам и Вашим близким постоянно звонят коллекторы</h4>
                <p class="reasonos_item_text">Оказывают постоянное давление и заставляют жить в стрессе</p>
            </div>
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/receipt.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title">Сумма Вашего кредитного долга слишком велика и Вам не под силу его
                    выплатить</h4>
                <p class="reasonos_item_text">У вас нет таких денег, чтобы хватало на жизнь и на выплату долга</p>
            </div>
            <div class="reasons_item">
                <img src="<?= Url::to("@web/img/incognito.svg")?>" alt="Иллюстрация">
                <h4 class="reasonos_item_title"> Вас обманули мошенники</h4>
                <p class="reasonos_item_text">Злоумышленники украли с ваших счетов крупную сумму или обманным путём
                    оформили кредит</p>
            </div>
        </div>
    </div>
</section>

<section class="bankrotstvo">
    <div class="bankrotstvo_top">
        <div class="container">
            <div class="bankrotstvo_top_wrapper">

                <h3 class="bankrotstvo_top_title title">Не знаете с чего начать? Спросите юриста</h3>
                <a href="" class="btn bankrotstvo_top_link"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                        height="24" fill="none" viewBox="0 0 25 24">
                        <path fill="#00D95F"
                            d="m.866 23.69 1.686-6.263a11.575 11.575 0 0 1-1.217-8.02 11.597 11.597 0 0 1 4.347-6.854 11.65 11.65 0 0 1 15.205.982 11.579 11.579 0 0 1 1.181 15.152 11.632 11.632 0 0 1-6.815 4.425 11.655 11.655 0 0 1-8.055-1.11L.866 23.69Zm6.638-4.032.391.232a9.42 9.42 0 0 0 11.385-1.382 9.355 9.355 0 0 0 1.572-11.331 9.392 9.392 0 0 0-4.538-4.002 9.422 9.422 0 0 0-6.043-.41 9.401 9.401 0 0 0-5.04 3.351A9.36 9.36 0 0 0 3.29 11.84a9.252 9.252 0 0 0 1.374 4.86l.245.403-.942 3.496 3.538-.94Z" />
                        <path fill="#00D95F" fill-rule="evenodd"
                            d="M17.01 13.446a1.94 1.94 0 0 0-1.66-.377c-.432.179-.71.854-.99 1.192a.41.41 0 0 1-.53.119 7.515 7.515 0 0 1-3.757-3.211.45.45 0 0 1 .06-.623c.31-.307.539-.687.663-1.105a2.405 2.405 0 0 0-.305-1.325 3.098 3.098 0 0 0-.963-1.45 1.33 1.33 0 0 0-1.427.219 2.927 2.927 0 0 0-1.016 2.317c.001.246.033.49.093.729.154.572.392 1.118.704 1.622.225.386.471.76.737 1.119a11.306 11.306 0 0 0 3.193 2.953 9.62 9.62 0 0 0 1.991.947 4.417 4.417 0 0 0 2.317.364 2.783 2.783 0 0 0 2.098-1.556c.114-.248.149-.526.099-.795-.12-.55-.856-.874-1.308-1.139Z"
                            clip-rule="evenodd" />
                    </svg> Спросите сейчас</a>
            </div>
        </div>
    </div>
    <div class="bankrotstvo_bottom">
        <div class="container">
            <h2 class="title bankrotstvo_bottom_title">ВАЖНО! Не ждите иск от банка, подайте на банкротство первыми,
                чтобы играть по своим
                правилам
            </h2>
            <h3 class="bankrotstvo_bottom_sub-title">Если <span>кредитор</span> подаст заявление на Ваше банкротство
                первым:</h3>
            <div class="bankrotstvo_bottom_wrapper">
                <div class="bankrotstvo_bottom_left">
                    <div class="bankrotstvo_bottom_items">
                        <div class="bankrotstvo_bottom_item">
                            <div class="bankrotstvo_bottom_item_left"><span>1</span></div>
                            <div class="bankrotstvo_bottom_item_right">
                                <h3>Вы не сможете выехать за границу;</h3>
                            </div>
                        </div>
                        <div class="bankrotstvo_bottom_item">
                            <div class="bankrotstvo_bottom_item_left"><span>2</span></div>
                            <div class="bankrotstvo_bottom_item_right">
                                <h3>Вам грозит судебное преследование;</h3>
                            </div>
                        </div>
                        <div class="bankrotstvo_bottom_item">
                            <div class="bankrotstvo_bottom_item_left"><span>3</span></div>
                            <div class="bankrotstvo_bottom_item_right">
                                <h3>Приготовьтесь к конфискации имущества;</h3>
                            </div>
                        </div>
                        <div class="bankrotstvo_bottom_item">
                            <div class="bankrotstvo_bottom_item_left"><span>4</span></div>
                            <div class="bankrotstvo_bottom_item_right">
                                <h3>Возможен арест недвижимости.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bankrotstvo_bottom_right">
                    <p>Кто первый подаёт иск, тот и выбирает арбитражного управляющего! А от финансового управляющего
                        зависит исход вашего банкротства!</p>
                </div>
            </div>
            <button class="btn btn--red open-modal" data-modal="main">Подать на банкроство</button>
        </div>
    </div>
</section>

<section class="reviews" id="reviews">
    <div class="container">
        <h2 class="title">Отзывы</h2>
        <div class="reviews__items">
            <div class="reviews__item">
                <img src="<?= Url::to("@web/img/review01.png")?>" alt="Отзыв пользователя">
            </div>
            <div class="reviews__item">
                <img src="<?= Url::to("@web/img/review02.png")?>" alt="Отзыв пользователя">
            </div>
            <div class="reviews__item">
                <img src="<?= Url::to("@web/img/review03.png")?>" alt="Отзыв пользователя">
            </div>
        </div>
    </div>
</section>

<section class="info" id="about">
    <div class="container">
        <div class="info_wrapper">
            <div class="info_wrapper_left">
                <h2 class="title">О нас</h2>
                <div class="info_wrapper_text">
                    <p><strong>Право М</strong> - это команда квалификацированных людей, которые искренне помогают
                        гражданам освободиться
                        от долгов.</p>
                    <p>Мы честно и открыто говорим вам о рисках, о подводных камнях и последствиях банкротства,
                        о возможности сохранения имущества, о том, подходите ли вы под данную процедуру и шансы
                        завершения дела успехом.</p>
                </div>
                <button class="btn btn--red open-modal" data-modal="main">Оставить заявку</button>
            </div>
            <div class="info_wrapper_right">
                <img src="<?= Url::to("@web/img/info.jpg")?>" alt="Иллюстрация">
            </div>

        </div>
    </div>
</section>

<section class="team" id="team">
    <div class="container">
        <h2 class="title">Наша команда</h2>
        <div class="team-wrapper">
            <div class="team-cards swiper-container">
                <div class="swiper-wrapper">
                    <div class="team-card swiper-slide">
                        <img src="<?= Url::to("@web/img/Даниелян М.png")?>" alt="Манэ Даниелян">
                        <div class="team-card_body">
                            <h3>Манэ Даниелян</h3>
                            <h4>опыт более 10 лет</h4>
                            <h5>Юрист, финансовый управляющий</h5>
                        </div>
                    </div>
                    <div class="team-card swiper-slide">
                        <img src="<?= Url::to("@web/img/Соколова Ю.png")?>" alt="Соколова Юлия">
                        <div class="team-card_body">
                            <h3>Соколова Юлия</h3>
                            <h4>опыт более 10 лет</h4>
                            <h5>Старший юрист</h5>
                        </div>
                    </div>
                    <div class="team-card swiper-slide">
                        <img src="<?= Url::to("@web/img/Соловьев И.png")?>" alt="Соловьев Илья">
                        <div class="team-card_body">
                            <h3>Соловьев Илья</h3>
                            <h4>опыт более 10 лет</h4>
                            <h5>Старший юрист</h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

<section class="guarantee">
    <div class="guarantee_top">
        <div class="container">
            <div class="guarantee_top_wrapper">
                <div class="guarantee_top_wrapper_left">
                    <h3 class="title">Узнайте перспективу списания ваших долгов и получите БОНУС:</h3>
                    <p>Чек-лист «Как общаться с коллекторами, чтобы они перестали угрожать вам и вашим близким»</p>
                </div>
                <button class="btn open-modal" data-modal="help">Получить</button>
            </div>
        </div>
    </div>
    <div class="guarantee_bottom">
        <div class="container">
            <div class="guarantee_bottom_wrapper">
                <h2 class="guarantee_bottom_wrapper_title title">Гарантии</h2>
                <h3 class="guarantee_bottom_wrapper_sub-title">Делаем все для успешного завершения дела!</h3>
                <p class="guarantee_bottom_wrapper_text">Мы вернём вам деньги, если суд не признает вас банкротом.
                    В ситуациях, где должник не подходит под банкротство, мы на первой консультации говорим об этом
                    и предлагаем иные пути решения проблемы. Ценим ваше и наше время, и не берёмся за бесперспективные
                    дела.</p>
            </div>
        </div>

    </div>
</section>

<section class="faq">
    <div class="container">
        <h2 class="title">Часто задаваемые вопросы</h2>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
                готовы рассчитать индивидуальную цену.
            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Какие последствия банкротства физического лица?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                <p>Именно с момента признания банкротом на первом судебном заседании возникает ряд последствий и
                    некоторых изменений в жизни человека. Последствия как ограничивающие, так и положительные для
                    банкрота.</p>
                <ol>
                    <li><strong>Человек не может распоряжаться своими деньгами в процедуре.</strong> Блокируются все
                        счета, карты. В
                        банки
                        поступает информация в тот же день, как человека признают банкротом. Открыть другой счет и им
                        пользоваться нельзя. Снимать денежные средства может только финансовый управляющий. Снимает он
                        опять же
                        не все деньги, а суммы в рамках прожиточного минимума на должника, на детей, иные выплаты и
                        передает их
                        должнику. Арбитражный управляющий выполняет функцию того, кто подписывает документы,
                        контролирует
                        правильность процесса все 6-12 месяцев.</li>
                    <li> <strong>Человек не может распоряжаться своим имуществом в процедуре.</strong> Распоряжение
                        имуществом происходит
                        по
                        согласованию с судом, порядок реализации осуществляется после согласования с судом, либо с
                        залоговым
                        кредитором. Арбитражный управляющий (АУ) не может просто так взять и решить что продавать, а это
                        не
                        продавать и за какую цену продавать. Это в ряде случаев предлагается АУ, но решение принимается
                        всегда
                        окончательное либо судом, либо залоговым кредитором.</li>
                    <li><strong>Исполнительные производства прекращаются.</strong> Соответственно все, вы больше никогда
                        не увидите
                        приставов.
                        Они к вам не могут прийти, не могут писать. Что для многих важно.</li>
                    <li><strong>Запрет на выезд за границу отменяется.</strong> Если человек не мог выезжать заграницу,
                        то как только
                        начинается
                        банкротство, то в самом начале пути ему этот выезд открывается. Многие считают, что в процедуре
                        банкротства наоборот есть запрет на выезд и связано это с тем, что законом предусмотрено, что
                        суд может
                        ограничить выезд за пределы России должнику. Но в нашей практике более 2500 дел и лишь однажды
                        ограничили должнику выезд за пределы страны, но там долги исчислялись миллиардами. Это не
                        рядовая
                        история. Ограничения всегда снимаются, то есть человек получает в этом смысле свободу.</li>
                </ol>




            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Что нужно для банкротства физического лица?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                <button class="btn btn--red open-modal" data-modal="help">Скачать пошаговый план</button>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Сколько длится процедура банкротства физического лица?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                Процедура длится от 6 месяцев до 12 месяцев.
            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Как проходит процедура банкротства физических лиц?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                <ul>
                    <li>Звонок, запись на консультацию.</li>
                    <li>Консультация в нашем офисе, подробный разбор ситуации.</li>
                    <li>Сбор документов.</li>
                    <li>Подготовка дела для подачи в суд.</li>
                    <li>Подготовка к судебному заседанию.</li>
                    <li>Судебное решение о признании гражданина банкротом, введение процедуры реализации, назначение
                        финансового управляющего.</li>
                    <li>Процедура поиска и реализации имущества.</li>
                    <li>Отчет финансового управляющего перед судом.</li>
                    <li>Решение суда о списании долгов перед кредиторами.</li>
                </ul>

            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Какие долги не подлежат списанию при банкротстве физического лица?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                <p>Есть причины, когда долг не списывают, а есть не списываемый долг — долг, который не списывается
                    непотому что кто‑то хороший или плохой, а просто по Закону он никогда не списывается:</p>
                <br>
                <p>Например, у человека есть уголовная статья и в рамках дела ему присудили в качестве наказания выплаты
                    в пользу потерпевших 1,5 млн рублей. При этом человек занимался бизнесом и у него есть задолженность
                    по займам порядка 5млн рублей. Мы понимаем, что в рамках процедуры банкротства человеку не спишут
                    1,5 миллиона рублей, так как долги по уголовным делам не списывают. Но долг в 1,5 млн рублей
                    ещё возможно выплатить, а вот 6,5 млн рублей, уже очень сложно. Поэтому целесообразно провели
                    процедуру, списали 5 млн рублей займов, а 1,5 млн осталось.</p>
                <br>
                <p>Тоже самое с ситуацией по алиментам. Человек платить алименты не может, есть другие долги. Заходит
                    в процедуру банкротства, списывает долги, других кредитов нет. Человек уже может устраиваться
                    на работу и выплачивать алименты.
                    Есть долги, которые могут быть списаны, но (кредиты,микрозаймы, ЖКХ итд.) по ряду причин
                    не будутсписаны:
                    Они связаны с тем как были оформлены займы, либо с поведением должника. Не подлежат списанию долги,
                    которые были получены по поддельным документам.</p>
                <br>
                <p>Если в ходе процедуры будет оспорена сделка, то есть вероятность не списания долга. Так прописано
                    в законе, но практика показывает что идёт списание. Имущество возвращают на должника и проводят
                    списание долга, а имущество реализуют.
                    Не подлежит списанию долг если должник ведёт себя недобросовестно в процедуре банкротства: прячет
                    имущество, не даёт реализовывать, уничтожает.
                    Cубсидиарная ответственность — cитуация, когда человек был директором компании-однодневки.
                    Руководством компании фактически не занимался. В компании проводились серые схемы и директора
                    привлекают к субсидиарной ответственности — когда он отвечает за долгикомпании.</p>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion__header">
                <p class="accordion__title">Как сохранить автомобиль при банкротстве?</p>
                <div class="accordion__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="49" height="50" fill="none" viewBox="0 0 49 50">
                        <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m12.25 18.696 12.25 12.25 12.25-12.25" />
                    </svg>
                </div>
            </div>
            <div class="accordion__content">
                <p>Один из самых распространённых законных способов сохранения имущества это процедура реструктуризации
                    долга. В рамках реструктуризации нужно предоставить план реструктуризации, где по удобному графику
                    платежей должник погашает накопившиеся долги.
                    В исключительных случаях суд оставляет автомобиль банкроту если:</p>
                <ol>
                    <li>Автомобиль используется для обеспечения детей. В данном случае должнику необходимо объяснить,
                        что без автомобиля детям не будет доступно получение образования и медицинское обслуживание.
                    </li>
                    <li>У должника есть серьёзные проблемы со здоровьем. В соответствии со ст. 446 ГК.РФ.</li>
                    <li>
                        Транспортное средство имеет низкую стоимость, которого не превышает 10 000 рублей, в данном
                        случае можно сохранить автомобиль в соответствии ст. 446 ГПК РФ (от 23 ноября 2020 года).</li>
                </ol>


            </div>
        </div>

    </div>
</section>
</section>
<section class="banner-form">
    <div class="container">
        <h2 class="title">
            Остались вопросы? мы Можем помочь!
        </h2>
        <div class="banner-form_wrapper">
            <div class="banner-form_wrapper_left">
                <?= Html::beginForm('', 'post', ['class' => 'banner-form_wrapper_form']) ?>
                <input required type="text" name="fio" placeholder="Введите имя">
                <input required type="tel" name="phone" placeholder="Введите номер телефона">
                <textarea name="message[Введите ваш вопрос]" placeholder="Введите Ваш вопрос"></textarea>
                <div class="banner-form_wrapper_form_control">
                    <button type="submit" class="btn btn--red">Отправить</button>
                    <p>Также можно написать в:
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="44" height="45" fill="none"
                                viewBox="0 0 44 45">
                                <path fill="#34AADF"
                                    d="M22.113 35.896c6.639 0 12.02-5.382 12.02-12.02 0-6.64-5.382-12.022-12.02-12.022-6.64 0-12.021 5.383-12.021 12.021 0 6.64 5.381 12.021 12.02 12.021Z" />
                                <path fill="#fff"
                                    d="M15.245 23.612s5.954-2.534 8.02-3.426c.791-.356 3.476-1.498 3.476-1.498s1.239-.5 1.136.713c-.035.5-.31 2.248-.585 4.14-.414 2.675-.861 5.601-.861 5.601s-.069.82-.654.963c-.585.143-1.549-.499-1.72-.642-.139-.107-2.582-1.712-3.477-2.497-.241-.214-.516-.643.034-1.142 1.24-1.178 2.72-2.64 3.614-3.568.413-.428.826-1.427-.895-.214-2.443 1.748-4.853 3.39-4.853 3.39s-.55.356-1.583.035c-1.033-.321-2.237-.75-2.237-.75s-.826-.534.585-1.105Z" />
                            </svg>
                        </a>
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="47" height="48" fill="none"
                                viewBox="0 0 47 48">
                                <path fill="#00D95F"
                                    d="m11.75 34.632 1.686-6.264a11.575 11.575 0 0 1-1.217-8.02 11.597 11.597 0 0 1 4.348-6.853 11.651 11.651 0 0 1 15.204.982 11.579 11.579 0 0 1 1.181 15.152 11.632 11.632 0 0 1-6.814 4.424 11.655 11.655 0 0 1-8.055-1.11l-6.333 1.689Zm6.638-4.032.392.231a9.42 9.42 0 0 0 11.384-1.381 9.356 9.356 0 0 0 1.572-11.331 9.392 9.392 0 0 0-4.537-4.003 9.422 9.422 0 0 0-6.043-.41 9.4 9.4 0 0 0-5.04 3.352 9.36 9.36 0 0 0-1.943 5.722 9.252 9.252 0 0 0 1.374 4.86l.246.404-.943 3.496 3.538-.94Z" />
                                <path fill="#00D95F" fill-rule="evenodd"
                                    d="M27.894 24.388a1.94 1.94 0 0 0-1.66-.378c-.431.18-.71.855-.989 1.192a.411.411 0 0 1-.53.12 7.516 7.516 0 0 1-3.758-3.212.45.45 0 0 1 .06-.622 2.6 2.6 0 0 0 .663-1.106 2.405 2.405 0 0 0-.305-1.324 3.098 3.098 0 0 0-.962-1.45 1.332 1.332 0 0 0-1.428.218 2.927 2.927 0 0 0-1.015 2.318c0 .245.032.49.093.728.154.572.39 1.119.703 1.622.226.386.472.76.737 1.12a11.305 11.305 0 0 0 3.193 2.952 9.59 9.59 0 0 0 1.991.947 4.418 4.418 0 0 0 2.317.364 2.784 2.784 0 0 0 2.098-1.556c.114-.248.15-.526.1-.794-.12-.55-.857-.874-1.308-1.14Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </p>
                </div>
                <?= Html::endForm() ?>
            </div>
            <div class="banner-form_wrapper_right">
                <img src="<?= Url::to("@web/img/scales.png")?>" alt="Весы">
            </div>
        </div>
    </div>
</section>

<div class="modal main-modal">
    <div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none"
            viewBox="0 0 40 40">
            <path class="close" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M30 10 10 30m0-20 20 20" />
        </svg>
        <h2 class="modal__title title">Оставьте заявку</h2>
        <h3 class="modal__sub-title">Заполните данные ниже, и в ближайшее время мы с Вами свяжемся для дальнейшей
            консультации</h3>
        <?= Html::beginForm('', 'post', ['class' => 'form__modal']) ?>
        <input required type="text" name="fio" placeholder="Введите имя">
        <input required type="tel" name="phone" placeholder="Введите номер телефона">
        <input required type="text" name="region" placeholder="Город (по желанию)">
        <button type="submit" class="btn btn--red">Отправить</button>
        <?= Html::endForm() ?>
    </div>
</div>

<div class="modal login-modal">
    <div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none"
            viewBox="0 0 40 40">
            <path class="close" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M30 10 10 30m0-20 20 20" />
        </svg>
        <h2 class="modal__title title">Добро пожаловать!</h2>
        <?= Html::beginForm('', 'post', ['class' => 'form__modal']) ?>
        <input required type="tel" name="LoginForm[username]" placeholder="Введите номер телефона">
        <input required type="password" name="LoginForm[password]" placeholder="Город (по желанию)">
        <p class="form_error"></p>
        <a href="" class="modal_forget change-modal" data-closedModal="login" data-openedModal="reset">Забыл пароль?</a>
        <button type="submit" class="btn btn--red">Отправить</button>
        <a href="" class="modal_register change-modal" data-closedModal="login"
            data-openedModal="register">Зарегистрироваться</a>
        <?= Html::endForm() ?>
    </div>
</div>

<div class="modal register-modal">
    <div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none"
            viewBox="0 0 40 40">
            <path class="close" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M30 10 10 30m0-20 20 20" />
        </svg>
        <h2 class="modal__title title">Добро пожаловать!</h2>
        <?= Html::beginForm('', 'post', ['class' => 'form__modal']) ?>
        <input required type="tel" name="RegisterForm[username]" placeholder="Введите номер телефона">
        <input type="text" name="RegisterForm[promocode]" placeholder="Введите промокод">
        <input required type="password" name="RegisterForm[password]" placeholder="Придумайте пароль">
        <input required type="password" name="RegisterForm[repeatPassword]" placeholder="Повторите пароль">
        <button type="submit" class="btn btn--red">Зарегистрироваться</button>
        <a href="" class="modal_register change-modal" data-closedModal="register" data-openedModal="login">Войти</a>
        <?= Html::endForm() ?>
    </div>
</div>

<div class="modal reset-modal">
    <div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none"
            viewBox="0 0 40 40">
            <path class="close" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M30 10 10 30m0-20 20 20" />
        </svg>
        <h2 class="modal__title title">Добро пожаловать!</h2>
        <?= Html::beginForm('', 'post', ['class' => 'form__modal']) ?>
        <input required type="tel" name="ResetForm[username]" placeholder="Введите номер телефона">
        <div class="send-box">
            <button class="btn send-code">Отправить код</button>
            <p>Повторно код можно <br> отправить через <span>0:57</span></p>
        </div>
        <div class="code">
            <h3>Код из СМС</h3>
            <input id="reset_code_send" required placeholder="Код подтверждения" minlength="6" type="text" name="code">
        </div>
        <input required type="password" name="ResetForm[password]" placeholder="Придумайте пароль">
        <input required type="password" name="ResetForm[repeatPassword]" placeholder="Повторите пароль">
        <button type="submit" class="btn btn--red">Восстановить</button>
        <a href="" class="modal_register change-modal" data-closedModal="reset"
            data-openedModal="register">Зарегистрироваться</a>
        <?= Html::endForm() ?>
    </div>
</div>

<div class="modal help-modal">
<div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none"
            viewBox="0 0 40 40">
            <path class="close" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M30 10 10 30m0-20 20 20" />
        </svg>
        <h2 class="modal__title title">Получите пошаговый план</h2>
        <h3 class="modal__sub-title">Заполните данные ниже, и в ближайшее время вы получите пошаговый план</h3>
        <?= Html::beginForm('', 'post', ['class' => 'form__modal']) ?>
        <input required type="text" name="fio" placeholder="Введите имя">
        <input required type="email" name="email" placeholder="Введите Эл. почту">
        <button type="submit" class="btn btn--red">Отправить</button>
        <?= Html::endForm() ?>
    </div>
</div>