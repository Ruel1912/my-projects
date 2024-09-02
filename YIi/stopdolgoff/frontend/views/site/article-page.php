<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->registerCssFile("@web/css/article.css");
Yii::$app->name = $article->title;

$css = <<< CSS
    /* COMMON */
main {
    width: 100% !important;
    margin: 0 !important;
    display: flex !important;
}
.main__content {
    max-width: 825px !important;
}

aside {
    display: block !important;
}
/* COMMON */

@media (max-width: 800px) {
/* COMMON */
main {
    width: 100% !important;
    margin: 0 !important;
    display: block !important;
}
.main__content {
    max-width: unset !important;
}

aside {
    display: none !important;
}

div.banner-form {
    display: none;
}
/* COMMON */
}
CSS;

$this->registerCss($css);
?>
<section class="article">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/article"]) ?>">/ Статьи</a>
            <a>/ <?= $article->title?></a>
        </nav>
        <h1 class="article__title title">
            <?= $article->title ?>
        </h1>
        <p class="article__text">
            <span><?= date('d.m.Y', strtotime($article['date'])) ?></span>
        </p>
        <div class="article__content">
            <?= $article->content ?>
        </div>
    </div>
</section>
