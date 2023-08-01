<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Полезные материалы';
$this->params['breadcrumbs'][] = $this->title;

$js = <<< JS

JS;
$this->registerJs($js);
?>

<section class="news">
    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <div class="news__inner">
            <div class="news__content">
                <h1 class="news__title">Полезные материалы</h1>
                <?php if (!empty($video)): ?>
                    <div class="knowledge">
                        <?php foreach ($video as $k => $v): ?>
                            <?php parse_str($new = parse_url($v['video'], PHP_URL_QUERY), $link); ?>
                            <div class="knowledge__item">
                                <iframe class="knowledge__frame" width="350" height="187" src="https://www.youtube.com/embed/<?= $link['v'] ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                <h3><?= $v['name'] ?></h3>
                            </div>
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