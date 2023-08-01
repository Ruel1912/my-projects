<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

$js = <<< JS
    $('title, .breadcrumb li.active').text($('h1').text());
    $('.articlepage_stats_like-btn').on('click', function(e) {
        e.preventDefault();
      $.ajax({
        url: '/site/like',
        type: 'POST',
        dataType: 'JSON',
        data: {like:1, id:$article->id},
      }).done(function( rsp) {
          console.log(rsp);
        $.pjax.reload({container: '#btnLike',})
      });
    });
    $('.articlepage_stats_deslike-btn').on('click', function(e) {
        e.preventDefault();
      $.ajax({
        url: '/site/dislike',
        type: 'POST',
        dataType: 'JSON',
        data: {like:1, id:$article->id},
      }).done(function(rsp) {
        console.log(rsp);
        $.pjax.reload({container: '#btnDislike',})
      });
    });
JS;
$this->registerJs($js);

$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['news']];
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="articlepage">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <div class="articlepage_wrapper">
            <div class="articlepage_left">
                <p class="articlepage-sectionname"><?= $article->category ?></p>
                <h1 class="articlepage-title"><?= $article->title ?></h1>
                <div class="articlepage_stats-wrap">
                    <p class="articlepage_stats-date"><?= date('d.m.Y', strtotime($article->date)) ?></p>
                    <div class="articlepage_stats">
                        <div class="articlepage_stats_views">
                            <img src="<?= Url::to('img/views.svg') ?>" alt="views">
                            <p class="articlepage_stats-num"><?= $article->views ?></p>
                        </div>
                        <?php
                                $classLike = !empty($_COOKIE['like']);
                                $classDislike = !empty($_COOKIE['diz'])
                            ?>
                        <div class="articlepage_stats_like">
                            <button type="button"
                                class="articlepage_stats-btn articlepage_stats_like-btn <?= $classLike === true ? 'active' : '' ?>"></button>
                            <?php Pjax::begin(['id' => 'btnLike']) ?>
                            <p class="articlepage_stats-num"><?= $article->likes ?></p>
                            <?php Pjax::end() ?>
                        </div>
                        <div class="articlepage_stats_deslike">
                            <button type="button"
                                class="articlepage_stats-btn articlepage_stats_deslike-btn <?= $classDislike === true ? 'active' : '' ?>"></button>
                            <?php Pjax::begin(['id' => 'btnDislike']) ?>
                            <p class="articlepage_stats-num"><?= $article->dizlike ?></p>
                            <?php Pjax::end() ?>
                        </div>
                    </div>
                </div>
                <div class="articlepage_nav-wrap">
                    <nav class="articlepage_nav">
                        <h2 class="articlepage_nav-title">Содержание</h2>
                        <ul class="articlepage_nav-titles">
                        </ul>
                    </nav>
                </div>
                <article class="article">
                    <?= $article->content ?>
                </article>
                <aside class="articlepage_morearticles">
                    <h2 class="articlepage_morearticles_title">
                        Статьи по теме
                    </h2>
                    <nav class="articlepage_morearticles_nav">
                        <ul class="articlepage_morearticles_nav_column">
                            <?php foreach ($themeArticle as $k => $v): ?>
                            <li>
                                <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>"><?= $v['title'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </aside>
            </div>
            <aside class="news__aside popular">
                <?php if (!empty($moreArticle)): ?>
                <div class="popular__links">
                    <p class="popular__links-title">
                        Популярное за неделю
                    </p>

                    <ul class="popular__links-list">
                        <?php foreach ($moreArticle as $k => $v): ?>
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
                        Оставить заявку
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php include_once 'gotofirstorder.php' ?>