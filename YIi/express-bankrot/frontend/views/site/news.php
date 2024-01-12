<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;

$js =<<< JS
$('.news__search-form').on('submit', function(e) {
    e.preventDefault();
    var cat = $('#SearchCat').val(),
        sear = $('#SearhWord').val();
    console.log(cat, sear);
  $.ajax({
    url: 'search',
    type: 'GET',
    data: {cat:cat, search:sear},
  }).done(function() {
    location.href = 'search?cat='+cat+'&search='+sear;
  });
});
JS;
$this->registerJs($js);
?>

<section class="news">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <div class="news__inner">
            <div class="news__content">
                <h1 class="news__title">
                    Статьи по списанию кредитов и долгов
                </h1>
                <?= Html::beginForm('', 'get', ['class' => 'news__search-form']) ?>
                <div class="news__search">
                    <select id="SearchCat" class="news__search-select" name="cat" data-placeholder="Категория">
                        <option></option>
                        <?php foreach ($category as $k => $v): ?>
                        <option value="<?= $v['category'] ?>"><?= $v['category'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="news__search-label">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.1661 14.3333L5.58984 9.90959" stroke="#7181AA" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.33301 6.41666C4.33301 9.04002 6.45966 11.1667 9.08301 11.1667C11.7064 11.1667 13.833 9.04002 13.833 6.41666C13.833 3.79331 11.7064 1.66666 9.08301 1.66666C6.45966 1.66666 4.33301 3.79331 4.33301 6.41666Z"
                                stroke="#7181AA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input id="SearhWord" class="news__search-input" name="search" placeholder="Введите ваш запрос"
                            type="search">
                    </label>
                    <button class="news__search-btn btn btn--blue" type="submit">Найти</button>
                </div>
                <?= Html::endForm() ?>

                <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $k => $v): ?>
                <?php if ($k == 0): ?>
                <div class="news__top" style="background: url(<?= Url::to([str_replace( "/admin", '/backend/web', $v['image'])])?>) no-repeat center center/cover">
                    <article class="news__card-top card-news">
                        <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>"
                            class="card-news__link card-news__link--top">
                            <div class="card-news__content card-news__content--top">
                                <span class="card-news__cat card-news__cat--top"><?= $v['category'] ?></span>
                                <h2 class="card-news__title card-news__title--top">
                                    <?= $v['title'] ?>
                                </h2>

                                <p class="card-news__text card-news__text--top"><?= $v['sub_title'] ?></p>
                            </div>

                            <div class="card-news__bottom">
                                <time class="card-news__date" datetime="2021-05-25 ">
                                    <?= date('d.m.Y', strtotime($v['date'])) ?>
                                </time>

                                <div class="card-news__like">
                                    <div class="card-news__like-item">
                                        <div class="card-news__like-img">
                                            <img src="<?= Url::to('img/views.svg') ?>" alt="views">
                                        </div>
                                        <span class="card-news__like-num"><?= $v['views'] ?></span>
                                    </div>

                                    <div class="card-news__like-item">
                                        <div class="card-news__like-img">
                                            <img src="<?= Url::to('img/like.svg') ?>" alt="like">
                                        </div>
                                        <span class="card-news__like-num"><?= $v['likes'] ?></span>


                                        <div class="card-news__like-item">
                                            <div class="card-news__like-img">
                                                <img src="<?= Url::to('img/dislike.svg') ?>" alt="dislike">
                                            </div>
                                            <span class="card-news__like-num"><?= $v['dizlike'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php if (!empty($articles)): ?>


                <div class="news__cards">
                    <?php foreach ($articles as $k => $v): ?>
                    <?php if ($k !== 0): ?>
                    <article class="news__card card-news">
                        <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>" class="card-news__link">
                            <div class="card-news__content">
                                <span class="card-news__cat"></span>
                                <h3 class="card-news_prev-title"><?= $v['category'] ?></h3>
                                <h2 class="card-news__title"><?= $v['title'] ?></h2>
                                <p class="card-news__text"><?= $v['sub_title'] ?></p>
                            </div>

                            <div class="card-news__bottom">
                                <time class="card-news__date" datetime="2021-05-25 ">
                                    <?= date('d.m.Y', strtotime($v['date'])) ?>
                                </time>

                                <div class="card-news__like">
                                    <div class="card-news__like-item">
                                        <img src="<?= Url::to('img/views.svg') ?>" alt="views">
                                        <span class="card-news__like-num"><?= $v['views'] ?></span>
                                    </div>

                                    <div class="card-news__like-item">
                                        <img src="<?= Url::to('img/like.svg') ?>" alt="like">
                                        <span class="card-news__like-num"><?= $v['likes'] ?></span>
                                    </div>

                                    <div class="card-news__like-item">
                                        <img src="<?= Url::to('img/dislike.svg') ?>" alt="dislike">
                                        <span class="card-news__like-num"><?= $v['dizlike'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="news__paging paging">
                    <?= LinkPager::widget([
                        'pagination' => $pages,
                    ]); ?>
                </div>
            </div>

            <?php if (!empty($news)): ?>
            <aside class="news__aside popular">
                <div class="popular__links">
                    <p class="popular__links-title">
                        Популярное за неделю
                    </p>

                    <ul class="popular__links-list">
                        <?php foreach ($news as $k => $v): ?>
                        <li class="popular__links-item">
                            <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>"
                                class="popular__links-link link link--gray"><?= $v['title'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

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
            <?php endif; ?>
        </div>

        <?php include_once 'gotoquiz.php' ?>
    </div>
</section>