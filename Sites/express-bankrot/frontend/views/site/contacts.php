<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="contact">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <div class="contact__inner">
            <div class="contact__content">
                <h1 class="contact__title">
                    Контакты
                </h1>

                <div class="contact__item">
                    <p class="contact__info">
                        Контактные данные
                    </p>

                    <ul class="contact__list">
                        <li class="contact__list-item">
                            <a href="<?= Url::to('tel:+7 (473) 280-01-01') ?>"
                                class="contact__list-link link link--gray">+7 (473) 280-01-01 (Воронеж)</a>
                        </li>
                        <li class="contact__list-item">
                            <a href="<?= Url::to('tel:+7 (861) 205-64-64') ?>"
                                class="contact__list-link link link--gray">+7 (861) 205-64-64 (Краснодар)</a>
                        </li>
                        <li class="contact__list-item">
                            <a href="<?= Url::to('tel:+7 (863) 333-52-02') ?>"
                                class="contact__list-link link link--gray">+7 (863) 333-52-02 (Ростов-на-Дону)</a>
                        </li>
                        <li class="contact__list-item">
                            <a href="<?= Url::to('tel:+7 (3852) 29-92-02') ?>"
                                class="contact__list-link link link--gray">+7 (3852) 29-92-02 (Барнаул)</a>
                        </li>
                        <li class="contact__list-item contact__list-item_email">
                            <a class="contact__list-link link link--gray" href="<?= Url::to('uspravozashitnik@gmail.com') ?>">uspravozashitnik@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="contact__box">
                    <div class="contact__item">
                        <p class="contact__info">
                            Филиалы
                        </p>

                        <p class="contact__text filial">
                            Воронежская область, г. Воронеж, ул. Фридриха Энгельса д. 25Б, офис 102, БЦ БиК
                        </p>
                        <p class="contact__text filial">
                            Краснодарский край, г. Краснодар, ул. Красная, 65, 2 этаж, офис 5
                        </p>
                        <p class="contact__text filial">
                            Ростовская область, Ростов-на-Дону, пер. Братский, 55
                        </p>
                        <p class="contact__text filial">
                            Алтайский край, г. Барнаул ул. Деповская д.18
                        </p>
                    </div>

                    <div class="contact__item">
                        <p class="contact__info">
                            Режим работы филлиалов
                        </p>

                        <p class="contact__text filial">
                            ПН-ПТ: с 9-00 до 18-00

                        </p>
                    </div>
                </div>

                <div class="contact__map">
                    <!--          <a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">-->
                    <!--            Москва-->
                    <!--          </a>-->
                    <!--          <a href="https://yandex.ru/maps/213/moscow/house/lesnaya_ulitsa_43/Z04Ycw5gT0IAQFtvfXt5cXlrbA==/?ll=37.590676%2C55.780588&utm_medium=mapframe&utm_source=maps&z=16" style="color:#eee;font-size:12px;position:absolute;top:14px;">-->
                    <!--            Лесная улица, 43 — Яндекс.Карты-->
                    <!--          </a>-->
                    <!--          <iframe class="contact__map-iframe" src="https://yandex.ru/map-widget/v1/-/CCUau4g~HA" frameborder="1" allowfullscreen="true">-->
                    <!--          </iframe>-->
                    <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A696c945f10145ac4caf1046ce476353d3a2dd56423f5a319367aea687cba4301&amp;width=730&amp;height=440&amp;lang=ru_RU&amp;scroll=true">
                    </script>
                </div>
            </div>


            <aside class="contact__aside popular">
                <?php if (!empty($articles)): ?>
                <div class="popular__links">
                    <p class="popular__links-title">
                        Популярное за неделю
                    </p>

                    <ul class="popular__links-list">
                        <?php foreach ($articles as $k => $v): ?>
                        <li class="popular__links-item">
                            <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>"
                                class="popular__links-link link link--gray"><?= $v['title'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>

<?php include_once 'gotofirstorder.php' ?>