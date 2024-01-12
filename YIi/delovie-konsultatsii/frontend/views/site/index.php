<?php

use app\models\ServicesList;
use yii\helpers\Url;

$this->registerCssFile('@web/css/index.css');
$this->registerCssFile('@web/css/libs/swiper.css');
$this->registerJsFile('@web/js/libs/swiper.js');
$this->registerJsFile('@web/js/index.js');

?>

<section class="promo">
  <div class="promo_wrapper">
    <h1 class="promo_title fs-xxl">Банкротство физических лиц</h1>
    <h2 class="promo_subtitle">Гарантия полной процедуры банкротства от подачи заявления до получения решения в суде!
    </h2>
    <p class="promo_text">Узнайте, возможно ли в вашей ситуации списать долги?</p>
    <button class="button button-primary open-modal" data-modal="main">Узнать сейчас</button>
  </div>
  <div class="promo_items swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/1.webp')?>"
          alt="Федеральный арбитражный суд ростовской области">
        <p class="promo_item_text">Федеральный арбитражный суд <br> ростовской области</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/2.webp')?>"
          alt="Арбитражный суд волгоградской области">
        <p class="promo_item_text">Арбитражный суд <br> волгоградской области</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/3.webp')?>" alt="Арбитражный суд города москвы">
        <p class="promo_item_text">Арбитражный суд города москвы</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/4.webp')?>"
          alt="Арбитражный суд республики татарстан">
        <p class="promo_item_text">Арбитражный суд <br> республики татарстан</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/5.webp')?>"
          alt="Арбитражный суд саратовской области">
        <p class="promo_item_text">Арбитражный суд <br> саратовской области</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/6.webp')?>"
          alt="Арбитражный суд краснодарского края">
        <p class="promo_item_text">Арбитражный суд <br> краснодарского края</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/7.webp')?>"
          alt="Арбитражный суд краснодарского края">
        <p class="promo_item_text">Арбитражный суд <br> краснодарского края</p>
      </div>
      <div class="swiper-slide promo_item">
        <img class="promo_image" src="<?= Url::to('@web/images/promo/8.webp')?>"
          alt="Верховный суд республики татарстан">
        <p class="promo_item_text">Верховный суд <br> республики татарстан</p>
      </div>
    </div>
  </div>
</section>
<section class='destroy'>
  <div class='container'>
    <h2 class='title destroy_title'>Избавим от долгов</h2>
    <h3 class='destroy_subtitle'>с кредитами, займами, коммуналкой</h3>
    <div class="destroy_items">
      <div class="destroy_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Кредит.svg')?>" alt="Икнока Кредит">
        </i>
        <h4 class="destroy_item_title">Вернем страховку по кредиту</h4>
      </div>
      <div class="destroy_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Деньги.svg')?>" alt="Икнока Деньги">
        </i>
        <h4 class="destroy_item_title">Остановим рост процентов. Зафиксируем сумму долга и уменьшим платежи</h4>
      </div>
      <div class="destroy_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Коллекторы.svg')?>" alt="Икнока Коллекторы">
        </i>
        <h4 class="destroy_item_title">Освободим от давления коллекторов</h4>
      </div>
      <div class="destroy_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Сохранение.svg')?>" alt="Икнока Сохранение">
        </i>
        <h4 class="destroy_item_title">Полное списание долгов</h4>
      </div>
      <div class="destroy_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Дом.svg')?>" alt="Икнока Дом">
        </i>
        <h4 class="destroy_item_title">Защитим Ваше имущество</h4>
      </div>
    </div>
  </div>
  <div class="destroy_marquee">
    <div class="destroy_marquee_item fs-l">
      <span>
        <p>Возможна оплата в рассрочку</p>
        <p>Возможна оплата в рассрочку</p>
      </span>
      <span>
        <p>Возможна оплата в рассрочку</p>
        <p>Возможна оплата в рассрочку</p>
      </span>
    </div>
  </div>
</section>
<section class='stages'>
  <div class='container'>
    <h2 class='title'>Этапы процедуры банкротства</h2>
    <div class='stages_wrapper box-with-img'>
      <div class='stages_image box-with-img_image'>
        <img src='<?= Url::to('@web/images/stage.webp')?>' alt='Фото этапы процедуры банкротства'>
        <img src='<?= Url::to('@web/images/stage-mobile.webp')?>' alt='Фото этапы процедуры банкротства'>
      </div>
      <div class='stages_content box-with-img_content'>
        <div class="stages_items">
          <div class="stages_item">
            <div class="stages_item_top">
              <span class="stages_item_span fs-l">1 этап</span>
              <h3 class="stages_item_title">Продолжительность: 1-2 месяца</h3>
            </div>
            <p class="stages_item_text">
              Сбор документов, подача заявления в суд.
            </p>
          </div>
          <div class="stages_item">
            <div class="stages_item_top">
              <span class="stages_item_span fs-l">2 этап</span>
              <h3 class="stages_item_title">Продолжительность: 1-3 месяца</h3>
            </div>
            <p class="stages_item_text">
              Выносится определение Арбитражного суда о признании гражданина временно финансово несостоятельным
              (банкротом), вводится соответствующая процедура, приступает к работе арбитражный управляющий.
            </p>
          </div>
          <div class="stages_item">
            <div class="stages_item_top">
              <span class="stages_item_span fs-l">3 этап</span>
              <h3 class="stages_item_title">Продолжительность: 3-6 месяца</h3>
            </div>
            <p class="stages_item_text">
              Завершается процедура признания гражданина временно финансово несостоятельным и гражданин освобождается
              от дальнейшего исполнения обязательств перед всеми кредиторами, чьи требования не были погашены.*
            </p>
          </div>
        </div>
        <p class="stages_text">*за исключением алиментов и обязательств о возмещении вреда, причиненного жизни или
          здоровью, так же возмещение морального вреда.</p>

      </div>
    </div>
  </div>
</section>
<section class='cta'>
  <div class='container'>
    <div class="cta_wrapper">
      <div class="cta_content">
        <h2 class='cta_title fs-xxl'>Важно!</h2>
        <div class="cta_text">
          <p>Если Вы не имеете возможности погасить долг, то единственный выход: это <strong>процедура
              банкротства.</strong></p>
          <p><strong>Процедура банкротства физического лица</strong> — это законная процедура освобождения гражданина
            от долгов при отсутствии признаков фиктивности и преднамеренности, которая регулируется Федеральным законом
            от 26.10.2002 N 127-ФЗ (ред. от 27.12.2018) «О несостоятельности (банкротстве)»</p>
        </div>
        <button class="button button-primary open-modal" data-modal="main">Бесплатная консультация</button>
      </div>
      <div class="cta_image">
        <img src="<?= Url::to('@web/images/cta.webp') ?>" alt="Бесплатная консультация">
        <img src="<?= Url::to('@web/images/cta-mobile.webp') ?>" alt="Бесплатная консультация">
      </div>
    </div>
  </div>
</section>
<?php if(!empty($services)): ?>
<section class='services' id='services'>
  <div class='container'>
    <h2 class='title'>Услуги</h2>
    <div class="services_items">
      <?php foreach($services as $service): ?>
      <div class="services_item">
        <h3 class="services_item_title fs-m"><?= $service->title ?></h3>
        <button class="button button-border open-modal" data-modal="main">Оставить заявку</button>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</section>
<?php endif; ?>
<?php if(!empty($reviews)): ?>
<section class='reviews'>
  <div class='container'>
    <h2 class='title'>Отзывы</h2>
    <div class="reviews_items">
      <?php foreach($reviews as $review): ?>
      <div class="reviews_item">
        <h3 class="reviews_item_title">Дело № <?= $review->case_number ?></h3>
        <p class="reviews_item_text">«<?= $review->review ?>»</p>
        <h4 class="reviews_item_author"><?= $review->fio ?> (<?= $review->region ?>)</h4>
      </div>
      <?php endforeach; ?>
    </div>
    <a href="<?= Url::to(['/review'])?>" class="link primary">Посмотреть все</a>
  </div>
  </div>
</section>
<?php endif; ?>

<section class='why-we'>
  <div class='container'>
    <h2 class='title'>Почему мы</h2>
    <div class="why-we_wrapper box-with-img">
      <div class="why-we_wrapper_content box-with-img_content">
        <div class="why-we_items">
          <div class="why-we_item">
            <div class="why-we_item_top">
              <i class="why-we_icon">
                <img src="<?= Url::to('@web/images/icon/Галочка.svg')?>" alt="Икнока Галочка">
              </i>
              <h3 class="why-we_title">
                Пройти процедуру банкротства — выгоднее, чем платить кредиты
              </h3>
            </div>
            <p class="why-we_item_text">Мы списываем долги в среднем за 9-12% от суммы долга. Выгоднее, чем вечно
              платить кредиты.</p>
          </div>
          <div class="why-we_item">
            <div class="why-we_item_top">
              <i class="why-we_icon">
                <img src="<?= Url::to('@web/images/icon/Разговор.svg')?>" alt="Икнока Разговор">
              </i>
              <h3 class="why-we_title">
                Наши арбитражные управляющие отстаивают ваши интересы
              </h3>
            </div>
            <p class="why-we_item_text">У нас работают опытные профессионалы, доказавшие свое мастерство в процессе
              работы. Мы на деле выполняем обязательства перед клиентами.</p>
          </div>
          <div class="why-we_item">
            <div class="why-we_item_top">
              <i class="why-we_icon">
                <img src="<?= Url::to('@web/images/icon/Чемодан.svg')?>" alt="Икнока Чемодан">
              </i>
              <h3 class="why-we_title">
                Мы сделаем всю работу за вас
              </h3>
            </div>
            <p class="why-we_item_text">Мы накопили большой опыт банкротств как физических, так и юридических лиц:
              десятки успешно проведённых процедур, сотни судебных заседании, собственные успешные судебные практики.
            </p>
          </div>
          <div class="why-we_item">
            <div class="why-we_item_top">
              <i class="why-we_icon">
                <img src="<?= Url::to('@web/images/icon/Защита.svg')?>" alt="Икнока Защита">
              </i>
              <h3 class="why-we_title">
                Защитим вашу собственность и репутацию
              </h3>
            </div>
            <p class="why-we_item_text">Сбережём ваши нервы и здоровье. Защитим вас и имущество, а также имущество ваших
              близких от реализации в процессе исполнительного производства.</p>
          </div>
        </div>
      </div>
      <div class="why-we_wrapper_image box-with-img_image">
        <img src="<?= Url::to('@web/images/why-we.webp')?>" alt="Фото почему мы">
        <img src="<?= Url::to('@web/images/why-we-mobile.webp')?>" alt="Фото почему мы">
      </div>
    </div>
  </div>
</section>