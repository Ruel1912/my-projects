<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="services">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <div class="services__inner">
            <div class="services__content">
                <h1 class="services__title">
                    Услуги юридической службы «ЭКСПРЕСС БАНКРОТ»
                </h1>

                <div class="services__cards">
                    <?php foreach ($services as $k => $v) : ?>
                    <article
                        class="services__card mainpage_services_info_card">
                        <h3 class="mainpage_services_info_card-title services__card-title">
                            <?= $v['title'] ?>
                        </h3>
                        <p class="mainpage_services_info_card-undertitle">
                            <?= $v['smal_title'] ?>
                        </p>
                        <div class="mainpage_services_info_card_group">
                            <?php $benefits = json_decode($v['benefits'], false) ?>
                            <ul class="mainpage_services_info_card_group-column">
                            <h3 class="mainpage_services_info_card_group_title">Что входит в услугу:</h3>
                                <?php foreach ($benefits as $key => $value) : ?>
                                <li class="mainpage_services_info_card_group-column-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                        viewBox="0 0 28 28">
                                        <path fill="#AAB" fill-rule="evenodd"
                                            d="m21.46 6.698-6.081-2.606a3.5 3.5 0 0 0-2.758 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.932 5.697l3.879 2.77c.811.58 1.901.58 2.712 0l3.88-2.77a7 7 0 0 0 2.93-5.697V7.77c0-.467-.277-.888-.706-1.072Zm-3.179 4.428a1 1 0 0 0-1.562-1.25l-3.968 4.961-1.544-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                                            clip-rule="evenodd" />
                                    </svg><?= $value ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="services__control">
                        <a class="services__btn btn btn--red" href="<?= Url::to(['therdorder']) ?>">
                            Заказать услугу
                        </a>
                        <a class="services__btn btn btn--red" href="<?= Url::to(['therdorder']) ?>">
                            Посмотреть весь прайс
                        </a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <nav>
                        <?= LinkPager::widget([
              'pagination' => $pages,
            ]); ?>
                    </nav>
                </div>
            </div>

            <aside class="services__aside popular">
                <?php if (!empty($articles)) : ?>
                <div class="popular__links">
                    <p class="popular__links-title">
                        Популярное за неделю
                    </p>

                    <ul class="popular__links-list">
                        <?php foreach ($articles as $k => $v) : ?>
                        <li class="popular__links-item">
                            <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>"
                                class="popular__links-link link link--gray"><?= $v['title'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <div class="popular__advice">
                    <p class="popular__advice-title">
                        Получите консультацию юриста по вашей проблеме
                    </p>

                    <p class="popular__advice-text">
                        Оставьте заявку и наш юрист вас проконсультирует в течение 10 минут
                    </p>

                    <a href="<?= Url::to(['consultation']) ?>" class="popular__advice-btn btn btn--help">
                        Помогите мне
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php include_once 'gotofirstorder.php' ?>