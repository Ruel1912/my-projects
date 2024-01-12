<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
$js =<<< JS
JS;
$this->registerJs($js);
?>

<section class="search">
  <div class="container">
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    <div class="search__inner">
      <div class="search__content">
        <h1 class="search__title">
          Статьи по списанию кредитов и долгов
        </h1>


        <?= Html::beginForm('search', 'get', ['class' => 'news__search-forms']) ?>
        <div class="news__search">
          <select class="news__search-select" name="cat" data-placeholder="Категория">
            <option></option>
              <?php foreach ($category as $k => $v): ?>
                <option <?= $_GET['cat'] == $v['category'] ? 'selected' : '' ?> value="<?= $v['category'] ?>"><?= $v['category'] ?></option>
              <?php endforeach; ?>

          </select>

          <label class="news__search-label">
            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.1661 14.3333L5.58984 9.90959" stroke="#7181AA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M4.33301 6.41666C4.33301 9.04002 6.45966 11.1667 9.08301 11.1667C11.7064 11.1667 13.833 9.04002 13.833 6.41666C13.833 3.79331 11.7064 1.66666 9.08301 1.66666C6.45966 1.66666 4.33301 3.79331 4.33301 6.41666Z" stroke="#7181AA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <input class="news__search-input" name="search" value="<?= Html::encode($_GET['search']) ?>" placeholder="Введите ваш запрос" type="search">
          </label>
          <button class="news__search-btn btn btn--blue" type="submit">Найти</button>

        </div>
        <?= Html::endForm() ?>
          <?php if (!empty($articles)): ?>
          <?php foreach ($articles as $k => $v): ?>
        <div class="search__cards">
          <article class="search__card card-news">
            <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>" class="search__card-link card-news__link">
              <div class="card-news__content">
                <span class="card-news__cat"><?= $v['category'] ?></span>
                <h2 class="search__card-title card-news__title">
<?= $v['title'] ?>
                </h2>

                <p class="search__card-text card-news__text">
<?= $v['sub_title'] ?>
                </p>

                <div class="card-news__box">
                  <a href="<?= Url::to(['article', 'link' => $v['link']]) ?>" class="search__card-add link link--blue">Читать статью</a>
                </div>

              </div>

              <div class="search__card-bottom card-news__bottom">
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
        </div>
              <?php endforeach; ?>
        <div class="search__paging paging">
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
          <?php else: ?>
        <!-- Не найдено статьи -->
       <div class="search__none">
          <h2 class="search__none-title">
            К сожалению, по вашему запросу ничего не найдено
          </h2>

          <p class="search__none-text">
            Введите другой запрос или ознакомьтесь со статьями на странице <a href="<?= Url::to(['news']) ?>" class="search__none-link link link--blue">Новости</a>
          </p>
        </div>
        <!-- Не найдено статьи -->
          <?php endif; ?>
      </div>

      <aside class="search__aside popular">
        <div class="popular__links">
          <p class="popular__links-title">
            Популярное за неделю
          </p>

          <ul class="popular__links-list">
          <?php foreach ($news as $k => $v): ?>
              <li class="popular__links-item">
                  <a href="<?= Url::to(['article', 'like' => $v['link']]) ?>" class="popular__links-link link link--gray"><?= $v['title'] ?></a>
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

          <a href="<?= Url::to(['consultation']) ?>" class="popular__advice-btn btn btn--white">
            Оставить заявку
          </a>
        </div>
      </aside>
    </div>

    <?php include_once 'gotoquiz.php' ?>
  </div>
</section>