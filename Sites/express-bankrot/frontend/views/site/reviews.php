<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;

$css =<<< CSS
.ytp-chrome-top{
    display: none !important;
}
CSS;
$this->registerCss($css);
?>
<style>
.ytp-chrome-top .ytp-show-cards-title {
    display: none !important;
}
</style>
<div class="reviews">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

        <div class="reviews__inner">
            <div class="reviews__content">
                <h2 class="reviews__title">
                    Отзывы
                </h2>
                <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $k => $v): ?>
                <div class="mainpage_reviews_right_info-wrap">
                    <div class="mainpage_reviews_right_info mainpage_reviews_right_info--reviwes">
                        <p class="mainpage_reviews_right_info-name"><?= $v['fio'] ?></p>
                        <!-- <p class="mainpage_reviews_right_info-status"><?= $v['status'] ?></p> -->

                        <div class="mainpage_reviews_right_info-group">
                            <?php if (!empty($v['video_link'])): ?>
                            <div class="OpenCaseImage_wrap--reviwes">
                                <iframe width="350px" height="260px" src="<?= $v['video_link'] ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            <?php endif; ?>
                            <div
                                class="mainpage_reviews_right_info-group_right mainpage_reviews_right_info-group_right--reviwes">
                                <div class="mainpage_reviews_right_info-group_right-row">
                                    <p class="mainpage_reviews_right_info-group_right-row-t1">Регион:</p>
                                    <p class="mainpage_reviews_right_info-group_right-row-t2"><?= $v['region'] ?></p>
                                </div>
                                <div class="mainpage_reviews_right_info-group_right-row">
                                    <p class="mainpage_reviews_right_info-group_right-row-t1">Дата
                                        обращения:</p>
                                    <p class="mainpage_reviews_right_info-group_right-row-t2">
                                        <?= date('d.m.Y', strtotime($v['date_application'])) ?></p>
                                </div>
                                <div class="mainpage_reviews_right_info-group_right-row">
                                    <p class="mainpage_reviews_right_info-group_right-row-t1">Сумма
                                        долгов:</p>
                                    <p
                                        class="mainpage_reviews_right_info-group_right-row-t2 mainpage_reviews_right_info-group_right-row-t3">
                                        <?= number_format($v['summ'], '0', '', ' ') ?> рублей</p>
                                </div>
                                <?php if (!empty($v['bankruptcy_date'])): ?>
                                <div class="mainpage_reviews_right_info-group_right-row">
                                    <p class="mainpage_reviews_right_info-group_right-row-t1">Дата
                                        банкротства</p>
                                    <p class="mainpage_reviews_right_info-group_right-row-t2">
                                        <?= date('d.m.Y', strtotime($v['bankruptcy_date'])) ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($v['case_number'])): ?>
                                <div class="mainpage_reviews_right_info-group_right-row">
                                    <p class="mainpage_reviews_right_info-group_right-row-t1">Номер
                                        дела:</p>
                                    <p
                                        class="mainpage_reviews_right_info-group_right-row-t2 mainpage_reviews_right_info-group_right-row-t3">
                                        <?= $v['case_number'] ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($v['link_case'])): ?>
                                <a class="mainpage_reviews_right_info-group_right-btn" target="_blank"
                                    href="<?= Url::to($v['link_case']) ?>"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="32" height="32" fill="none" viewBox="0 0 32 32">
                                        <path fill="#6A6ACF"
                                            d="M25.952 0H10.453a.724.724 0 0 0-.083.01h-.001a.518.518 0 0 0-.139.05l-.004.001a.506.506 0 0 0-.057.036l-.013.01a.52.52 0 0 0-.052.045L4.574 5.68a.524.524 0 0 0-.045.052l-.009.013a.52.52 0 0 0-.036.057l-.002.005a.521.521 0 0 0-.026.059l-.005.012a.51.51 0 0 0-.018.067v.002a.535.535 0 0 0-.01.082v24.346c0 .895.728 1.624 1.624 1.624h19.905c.896 0 1.624-.729 1.624-1.624V1.624C27.576.73 26.848 0 25.952 0Zm-16 1.77v3.172a.588.588 0 0 1-.587.587H6.193l3.759-3.76ZM26.54 30.376a.588.588 0 0 1-.588.587H6.047a.588.588 0 0 1-.587-.587V6.566h3.905c.895 0 1.624-.729 1.624-1.624V1.037h14.963c.324 0 .587.263.587.587v28.752Z">
                                        </path>
                                        <path fill="#6A6ACF"
                                            d="M9.364 8.777h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.036Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.037ZM16 22.67H9.363a.518.518 0 1 0 0 1.037H16a.518.518 0 1 0 0-1.037Zm0 2.764H9.363a.518.518 0 1 0 0 1.036H16a.518.518 0 1 0 0-1.036Zm4.7-1.659a.796.796 0 0 0 0 1.59.796.796 0 0 0 0-1.59Z">
                                        </path>
                                        <path fill="#6A6ACF"
                                            d="M20.699 21.564a3.01 3.01 0 0 0-3.007 3.007 3.01 3.01 0 0 0 3.007 3.006 3.01 3.01 0 0 0 3.006-3.006 3.01 3.01 0 0 0-3.006-3.007Zm0 4.977a1.972 1.972 0 0 1-1.97-1.97c0-1.086.884-1.97 1.97-1.97 1.086 0 1.97.884 1.97 1.97 0 1.086-.884 1.97-1.97 1.97Z">
                                        </path>
                                    </svg> Ознакомиться с делом в картотеке
                                    арбитражных дел</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($v['reviews'])): ?>
                        <p class="mainpage_reviews_right-text mainpage_reviews_right-text--reviwes"><?= $v['reviews'] ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <div class="news__paging paging">
                    <?= LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>
                </div>
            </div>
            <aside class="reviews__aside popular">
                <?php if (!empty($article)): ?>
                <div class="popular__links">
                    <p class="popular__links-title">
                        Популярное за неделю
                    </p>

                    <ul class="popular__links-list">
                        <?php foreach ($article as $k => $v): ?>
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
</div>

<?php include_once 'gotofirstorder.php' ?>