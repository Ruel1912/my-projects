<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Завершенные дела наших клиентов';
$this->params['breadcrumbs'][] = $this->title;
$css = <<< CSS
    .reviews__content {
        flex: 1 1 800px;
    }
    .completed__block{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 30px;
        gap: 30px;
    }
    .completed__case{
        max-width: 255px;
        width: 100%;
        padding: 20px 12px;
        background: rgba(201, 201, 252, 0.50);
        border-radius: 8px;
    }
    .completed__img{
        max-width: 231px;
    }
    .completed__summ{
        font-weight: normal;
        font-size: 14px;
        line-height: 140%;
        color: #AAB;
        margin-top: 20px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .completed__summ span{
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 140%;
        color: rgba(241, 55, 55, 0.9);
        padding-left: 7px;
    }
    .completed__link{
        font-weight: normal;
        font-size: 14px;
        line-height: 140%;
        color: #AAB;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .completed__link span{
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 140%;
        color: rgba(4, 17, 50, 0.9);
        padding-left: 7px;
    }
CSS;
$this->registerCss($css);
?>

<div class="reviews">
  <div class="container">
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <div class="reviews__inner">
      <div class="reviews__content">
        <h2 class="reviews__title">
          Завершенные дела
        </h2>
        <div class="completed__block">
          <?php foreach ($completed as $k => $v): ?>
          <div class="completed__case">
            <div class="OpenCaseImage_wrap--reviwes">
              <button class="OpenCaseImage"></button>
              <img class="completed__img"
                src="<?= Url::to([str_replace( "/admin", '/backend/web', $v['image_case'])]) ?>"
                alt="Скриншот первой страницы">
              <div class="CaseBack"></div>
              <div class="CaseWrap">
                <div class="Case">
                  <button class="Case_close">
                    <img src="<?= Url::to('img/close.svg') ?>" alt="close">
                  </button>
                  <img class="completed__img"
                    src="<?= Url::to([str_replace( "/admin", '/backend/web', $v['image_case'])]) ?>"
                    alt="Скриншот первой страницы">
                  <a class="mainpage_reviews_right_info-group_right-btn" target="_blank" href="<?= $v['link_case'] ?>"><svg
                      xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                      <path fill="#6A6ACF"
                        d="M25.952 0H10.453a.724.724 0 0 0-.083.01h-.001a.518.518 0 0 0-.139.05l-.004.001a.506.506 0 0 0-.057.036l-.013.01a.52.52 0 0 0-.052.045L4.574 5.68a.524.524 0 0 0-.045.052l-.009.013a.52.52 0 0 0-.036.057l-.002.005a.521.521 0 0 0-.026.059l-.005.012a.51.51 0 0 0-.018.067v.002a.535.535 0 0 0-.01.082v24.346c0 .895.728 1.624 1.624 1.624h19.905c.896 0 1.624-.729 1.624-1.624V1.624C27.576.73 26.848 0 25.952 0Zm-16 1.77v3.172a.588.588 0 0 1-.587.587H6.193l3.759-3.76ZM26.54 30.376a.588.588 0 0 1-.588.587H6.047a.588.588 0 0 1-.587-.587V6.566h3.905c.895 0 1.624-.729 1.624-1.624V1.037h14.963c.324 0 .587.263.587.587v28.752Z">
                      </path>
                      <path fill="#6A6ACF"
                        d="M9.364 8.777h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.036Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.037ZM16 22.67H9.363a.518.518 0 1 0 0 1.037H16a.518.518 0 1 0 0-1.037Zm0 2.764H9.363a.518.518 0 1 0 0 1.036H16a.518.518 0 1 0 0-1.036Zm4.7-1.659a.796.796 0 0 0 0 1.59.796.796 0 0 0 0-1.59Z">
                      </path>
                      <path fill="#6A6ACF"
                        d="M20.699 21.564a3.01 3.01 0 0 0-3.007 3.007 3.01 3.01 0 0 0 3.007 3.006 3.01 3.01 0 0 0 3.006-3.006 3.01 3.01 0 0 0-3.006-3.007Zm0 4.977a1.972 1.972 0 0 1-1.97-1.97c0-1.086.884-1.97 1.97-1.97 1.086 0 1.97.884 1.97 1.97 0 1.086-.884 1.97-1.97 1.97Z">
                      </path>
                    </svg>Ознакомиться с&nbsp;делом в&nbsp;картотеке
                    арбитражных дел</a>
                </div>
              </div>
            </div>
            <p class="completed__summ">Сумма долгов: <span><?= number_format($v['summ'], 0, 0, ' ') ?> рублей</span></p>
            <p class="completed__link">Номер дела: <span><?= $v['case_number'] ?></span></p>
          </div>
          <?php endforeach; ?>
        </div>
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