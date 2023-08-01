<?php

use yii\helpers\Url;

$this->title = 'Экспресс банкрот';
?>

<section class="mainpage_main">
  <div class="container">
    <div class="mainpage_main_wrapper">
      <div class="mainpage_main_left">
        <h1 class="mainpage_main_left-title">
          Мы помогаем списать долги онлайн не выходя из дома по всей России
        </h1>
        <p class="mainpage_main_left-prevbtn">
          Списание долгов через банкротство физических лиц и ип,защита от коллекторов, реструктуризация
        </p>
        <div class="mainpage_buttons">
          <a class="btn btn--red" href="<?= Url::to(['mainorder']) ?>">Получить консультацию</a>
          <a class="btn" href="<?= Url::to(['mainorder']) ?>">Хочу списать долг</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mainpage_guarantees">
  <div class="container">
    <div class="mainpage_guarantees_wrapper">
      <h2 class="mainpage_guarantees_left">
        Преимущества банкроства физического лица
      </h2>
      <div class="mainpage_guarantees_right">
        <div class="mainpage_guarantees_right_group">
          <div class="mainpage_guarantees_right_group_title-row">
            <h3 class="mainpage_guarantees_right_group_title">
              Свобода
            </h3>
          </div>
          <p class="mainpage_guarantees_right_group-info">
            С момента признания гражданина банкротом судебные приставы приостанавливают исполнительные производства,
            взыскания, снимают все наложенные ограничения и аресты.
          </p>
        </div>
        <div class="mainpage_guarantees_right_group">
          <div class="mainpage_guarantees_right_group_title-row">
            <h3 class="mainpage_guarantees_right_group_title">
              Списание долгов
            </h3>
          </div>
          <p class="mainpage_guarantees_right_group-info">
            После завершения процедуры банкротства гражданин освобождается от дальнейшего исполнения требований
            кредиторов.
          </p>
        </div>
        <div class="mainpage_guarantees_right_group">
          <div class="mainpage_guarantees_right_group_title-row">
            <h3 class="mainpage_guarantees_right_group_title">
              Неприкосновенность жилья
            </h3>
          </div>
          <p class="mainpage_guarantees_right_group-info">
            Взыскание не может быть обращено на жилое помещение, если для гражданина-должника и членов его семьи,
            совместно проживающих в принадлежащем помещении, оно является единственным пригодным для постоянного
            проживания.
          </p>
        </div>
        <div class="mainpage_guarantees_right_group">
          <div class="mainpage_guarantees_right_group_title-row">
            <h3 class="mainpage_guarantees_right_group_title">
              Спокойствие
            </h3>
          </div>
          <p class="mainpage_guarantees_right_group-info">
            Не допускается непосредственное взаимодействие с должником коллекторскими агентствами и службами взыскания
            со дня признания гражданина банкротом.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="mainpage_tabs">
  <div class="container">
    <div class="mainpage_tabs_wrapper">
      <div class="mainpage_tabs_btns">
        <button class="mainpage_tabs_btn btn-tab1" id="btn-tab1">
          <h3 class="mainpage_tabs_btn-name">> 5 лет опыта</h3>
          <div class="mainpage_tabs_btn-string">
            <div class="mainpage_tabs_btn-string-fill"></div>
          </div>
        </button>
        <button class="mainpage_tabs_btn btn-tab2" id="btn-tab2">
          <h3 class="mainpage_tabs_btn-name">25 экспертов</h3>
          <div class="mainpage_tabs_btn-string">
            <div class="mainpage_tabs_btn-string-fill"></div>
          </div>
        </button>
        <button class="mainpage_tabs_btn btn-tab3" id="btn-tab3">
          <h3 class="mainpage_tabs_btn-name">1 500+ клиентов</h3>
          <div class="mainpage_tabs_btn-string">
            <div class="mainpage_tabs_btn-string-fill"></div>
          </div>
        </button>
        <button class="mainpage_tabs_btn btn-tab4" id="btn-tab4">
          <h3 class="mainpage_tabs_btn-name">300 завершенных дел</h3>
          <div class="mainpage_tabs_btn-string">
            <div class="mainpage_tabs_btn-string-fill"></div>
          </div>
        </button>
      </div>
      <div class="mainpage_tabs_info-wrapper tab1">
        <div class="mainpage_tabs_info">
          <p class="mainpage_tabs_info-text">
            Мы помогаем обычным людям решить проблемы с долгами
          </p>
          <div class="mainpage_tabs_info_group">
            <div class="mainpage_tabs_info_group_colunm">
              <div class="mainpage_tabs_info_group_colunm_circle-1">
                <p class="mainpage_tabs_info_group_colunm_circle-text">
                  2018
                </p>
              </div>
              <p class="mainpage_tabs_info_group_colunm-text">
                Начало карьеры
              </p>
            </div>
            <div class="mainpage_tabs_info_group_colunm">
              <div class="mainpage_tabs_info_group_colunm_circle-1 mainpage_tabs_info_group_colunm_circle-2">
                <p class="mainpage_tabs_info_group_colunm_circle-text mainpage_tabs_info_group_colunm_circle-text-2">
                  2020
                </p>
              </div>
              <p class="mainpage_tabs_info_group_colunm-text">
                Более 500 клиентов и 10 юристов в штате
              </p>
            </div>
            <div class="mainpage_tabs_info_group_colunm">
              <div class="mainpage_tabs_info_group_colunm_circle-1 mainpage_tabs_info_group_colunm_circle-3">
                <p class="mainpage_tabs_info_group_colunm_circle-text mainpage_tabs_info_group_colunm_circle-text-2">
                  2023
                </p>
              </div>
              <p class="mainpage_tabs_info_group_colunm-text">
                Более 1 500 клиентов и 25 юристов по всей стране
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="mainpage_tabs_info-wrapper tab2">
        <div class="mainpage_tabs_info">
          <p class="mainpage_tabs_info-text">
            Вам необходимо только прийти на бесплатную консультацию. Если вы решите воспользоваться нашими
            услугами – все заботы мы берем на себя.
          </p>
          <ul class="mainpage_tabs_info_group-2">
            <li class="mainpage_tabs_info_group-2_row">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 50 50">
                <path fill="#AAB" fill-rule="evenodd"
                  d="M38.321 11.958 27.462 7.304a6.25 6.25 0 0 0-4.924 0L11.68 11.958a2.083 2.083 0 0 0-1.263 1.915v10.943a12.5 12.5 0 0 0 5.235 10.172l6.926 4.948a4.167 4.167 0 0 0 4.844 0l6.927-4.948a12.5 12.5 0 0 0 5.235-10.172V13.873c0-.834-.497-1.587-1.263-1.915Zm-6.29 7.416a1 1 0 0 0-1.561-1.25l-7.636 9.545-3.377-3.377a1 1 0 0 0-1.414 1.415l3.772 3.771a1.5 1.5 0 0 0 2.232-.123l7.984-9.98Z"
                  clip-rule="evenodd" />
              </svg>
              Онлайн-аудит вашей проблемы — не нужно ехать в офис
            </li>
            <li class="mainpage_tabs_info_group-2_row">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 50 50">
                <path fill="#AAB" fill-rule="evenodd"
                  d="M38.321 11.958 27.462 7.304a6.25 6.25 0 0 0-4.924 0L11.68 11.958a2.083 2.083 0 0 0-1.263 1.915v10.943a12.5 12.5 0 0 0 5.235 10.172l6.926 4.948a4.167 4.167 0 0 0 4.844 0l6.927-4.948a12.5 12.5 0 0 0 5.235-10.172V13.873c0-.834-.497-1.587-1.263-1.915Zm-6.29 7.416a1 1 0 0 0-1.561-1.25l-7.636 9.545-3.377-3.377a1 1 0 0 0-1.414 1.415l3.772 3.771a1.5 1.5 0 0 0 2.232-.123l7.984-9.98Z"
                  clip-rule="evenodd" />
              </svg>
              Гарантийная защита имущества от реализации
            </li>
            <li class="mainpage_tabs_info_group-2_row">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 50 50">
                <path fill="#AAB" fill-rule="evenodd"
                  d="M38.321 11.958 27.462 7.304a6.25 6.25 0 0 0-4.924 0L11.68 11.958a2.083 2.083 0 0 0-1.263 1.915v10.943a12.5 12.5 0 0 0 5.235 10.172l6.926 4.948a4.167 4.167 0 0 0 4.844 0l6.927-4.948a12.5 12.5 0 0 0 5.235-10.172V13.873c0-.834-.497-1.587-1.263-1.915Zm-6.29 7.416a1 1 0 0 0-1.561-1.25l-7.636 9.545-3.377-3.377a1 1 0 0 0-1.414 1.415l3.772 3.771a1.5 1.5 0 0 0 2.232-.123l7.984-9.98Z"
                  clip-rule="evenodd" />
              </svg>
              Онлайн расчет стоиомости списания - узнайте подходит ли вам процедура
            </li>
          </ul>
        </div>
      </div>
      <div class="mainpage_tabs_info-wrapper tab3">
        <div class="mainpage_tabs_info">
          <p class="mainpage_tabs_info-text">
            Довольных клиентов, которые списали свои долги
          </p>
        </div>
      </div>
      <div class="mainpage_tabs_info-wrapper tab4">
        <div class="mainpage_tabs_info">
          <p class="mainpage_tabs_info-text">
            Мы вернём ваши деньги и возместим все судебные издержки, в том случае если нам не удастся
            освободить вас от уплаты кредитов и долгов.
          </p>
          <div class="mainpage_tabs_info_group-4">
            <img src="<?= Url::to('img/case.png') ?>" alt="case">
            <img src="<?= Url::to('img/case2.png') ?>" alt="case">
            <img src="<?= Url::to('img/case3.png') ?>" alt="case">
            <img src="<?= Url::to('img/case4.png') ?>" alt="case">
          </div>
          <a class="link link--blue link--blue-2" href="<?= Url::to(['/completed']) ?>">Больше завершенных
            дел</a>
        </div>
      </div>
    </div>
  </div>
</section> -->

<section class="mainpage_bannerOne">
  <div class="container">
    <div class="mainpage_bannerOne_wrapper">
      <h2 class="mainpage_bannerOne-title">Начните жизнь с чистого листа!</h2>
      <p class="mainpage_bannerOne-info">Получите консультацию юриста и узнайте сроки и стоимость списания вашего
        долга уже сегодня</p>
      <a class="btn btn--red" href="<?= Url::to(['firstorder']) ?>">Получить консультацию</a>
    </div>
  </div>
</section>

<?php if (!empty($services)): ?>
<section class="mainpage_services">
  <div class="container">
    <div class="mainpage_services_wrapper">
      <div class="mainpage_services_info">
        <h2 class="mainpage_guarantees_left">
          Наши тарифы
        </h2>
        <div class="mainpage_services_info_cards">
          <?php foreach ($services as $k => $v): ?>
          <div style="background-image: url(<?= Url::to([str_replace( "/admin", '/backend/web', $v['image'])]) ?>)"
            class="mainpage_services_info_card">
            <h3 class="mainpage_services_info_card-title">
              <?= $v['title'] ?>
            </h3>
            <p class="mainpage_services_info_card-undertitle">
              <?= $v['smal_title'] ?>
            </p>
            <div class="mainpage_services_info_card_group">
              <h3 class="mainpage_services_info_card_group_title">Для кого?</h3>
              <?php $benefits = json_decode($v['benefits'], false) ?>
              <ul class="mainpage_services_info_card_group-column">
                <?php foreach ($benefits as $key => $value): ?>
                <li class="mainpage_services_info_card_group-column-text">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
                    <path fill="#AAB" fill-rule="evenodd"
                      d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                      clip-rule="evenodd" />
                  </svg><?= $value ?>
                </li>
                <?php endforeach; ?>
              </ul>
              <h3 class="mainpage_services_info_card_group_title">Результат</h3>
              <?php $benefits = json_decode($v['benefits'], false) ?>
              <ul class="mainpage_services_info_card_group-column">
                <?php foreach ($benefits as $key => $value): ?>
                <li class="mainpage_services_info_card_group-column-text">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
                    <path fill="#AAB" fill-rule="evenodd"
                      d="m21.46 6.698-6.082-2.606a3.5 3.5 0 0 0-2.757 0l-6.08 2.606a1.167 1.167 0 0 0-.708 1.072v6.128a7 7 0 0 0 2.931 5.697l3.88 2.77c.81.58 1.9.58 2.712 0l3.879-2.77a7 7 0 0 0 2.931-5.697V7.77c0-.467-.278-.888-.707-1.072Zm-3.18 4.428a1 1 0 1 0-1.561-1.25l-3.969 4.961-1.543-1.543a1 1 0 1 0-1.414 1.414l1.938 1.938a1.5 1.5 0 0 0 2.232-.123l4.318-5.397Z"
                      clip-rule="evenodd" />
                  </svg><?= $value ?>
                </li>
                <?php endforeach; ?>
              </ul>
              <h2 class="mainpage_services_info_card_group_price">от 264 руб/день</h2>
            </div>
          </div>
          <?php endforeach; ?>
          <a class="MoreServBTN" href="<?= Url::to(['services']) ?>">Больше услуг компании <svg
              xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="#6A6ACF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m15 18 6-6-6-6M3 12h17m1 0h-1" />
            </svg></a>
        </div>
      </div>
    </div>
    <?php include_once 'gotoquiz.php' ?>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($reviews)): ?>
<section class="mainpage_reviews">
  <div class="container">
    <div class="mainpage_reviews_wrapper">
      <div class="mainpage_reviews_left">
        <h2 class="mainpage_guarantees_left">
          Кто уже списал долги
        </h2>
        <aside class="mainpage_guarantees-condult">
          <h3 class="mainpage_guarantees-condult-title">
            У вас похожая проблема?
          </h3>
          <p class="mainpage_guarantees-condult-text">
            Оставьте заявку и мы решим вашу проблему!
          </p>
          <a class="btn btn--red" href="<?= Url::to(['consultation']) ?>">Получить консультацию</a>
        </aside>
      </div>
      <div class="mainpage_reviews_right">
        <?php foreach ($reviews as $k => $v): ?>
        <div class="mainpage_reviews_right_info-wrap">
          <div class="mainpage_reviews_right_info">
            <p class="mainpage_reviews_right_info-name"><?= $v['fio'] ?></p>
            <p class="mainpage_reviews_right_info-status"><?= $v['status'] ?></p>
            <div class="mainpage_reviews_right_info-group">
              <div class="mainpage_reviews_right_info-box">
                <img src="<?= Url::to(['img/case-placeholder.jpg']) ?>" alt="photo case">
                <div class="mainpage_reviews_right_info-group_right">
                  <div class="mainpage_reviews_right_info-group_right-row">
                    <p class="mainpage_reviews_right_info-group_right-row-t1">Регион:</p>
                    <p class="mainpage_reviews_right_info-group_right-row-t2"><?= $v['region'] ?>
                    </p>
                  </div>
                  <div class="mainpage_reviews_right_info-group_right-row">
                    <p class="mainpage_reviews_right_info-group_right-row-t1">Дата
                      обращения:</p>
                    <p class="mainpage_reviews_right_info-group_right-row-t2">
                      <?= date('d.m.Y', strtotime($v['date_application'])) ?></p>
                  </div>
                  <div class="mainpage_reviews_right_info-group_right-row">
                    <p class="mainpage_reviews_right_info-group_right-row-t1">Сумма долгов:</p>
                    <p
                      class="mainpage_reviews_right_info-group_right-row-t2 mainpage_reviews_right_info-group_right-row-t3">
                      <?= $v['summ'] != 0 ? $v['summ'].' рублей' : '-' ?></p>
                  </div>
                  <div class="mainpage_reviews_right_info-group_right-row">
                    <p class="mainpage_reviews_right_info-group_right-row-t1">Дата
                      банкротства</p>
                    <p class="mainpage_reviews_right_info-group_right-row-t2">
                      <?= date('d.m.Y', strtotime($v['bankruptcy_date'])) ?></p>
                  </div>
                  <div class="mainpage_reviews_right_info-group_right-row">
                    <p class="mainpage_reviews_right_info-group_right-row-t1">Номер дела:</p>
                    <p
                      class="mainpage_reviews_right_info-group_right-row-t2 mainpage_reviews_right_info-group_right-row-t3">
                      <?= $v['case_number'] ?></p>
                  </div>
                  <a class="mainpage_reviews_right_info-group_right-btn" target="_blank"
                    href="<?= $v['link_case'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                      fill="none" viewBox="0 0 32 32">
                      <path fill="#6A6ACF"
                        d="M25.952 0H10.453a.724.724 0 0 0-.083.01h-.001a.518.518 0 0 0-.139.05l-.004.001a.506.506 0 0 0-.057.036l-.013.01a.52.52 0 0 0-.052.045L4.574 5.68a.524.524 0 0 0-.045.052l-.009.013a.52.52 0 0 0-.036.057l-.002.005a.521.521 0 0 0-.026.059l-.005.012a.51.51 0 0 0-.018.067v.002a.535.535 0 0 0-.01.082v24.346c0 .895.728 1.624 1.624 1.624h19.905c.896 0 1.624-.729 1.624-1.624V1.624C27.576.73 26.848 0 25.952 0Zm-16 1.77v3.172a.588.588 0 0 1-.587.587H6.193l3.759-3.76ZM26.54 30.376a.588.588 0 0 1-.588.587H6.047a.588.588 0 0 1-.587-.587V6.566h3.905c.895 0 1.624-.729 1.624-1.624V1.037h14.963c.324 0 .587.263.587.587v28.752Z" />
                      <path fill="#6A6ACF"
                        d="M9.364 8.777h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.036Zm0 2.766h13.27a.518.518 0 1 0 0-1.037H9.364a.518.518 0 1 0 0 1.037Zm0 2.763h13.27a.518.518 0 1 0 0-1.036H9.364a.518.518 0 1 0 0 1.037ZM16 22.67H9.363a.518.518 0 1 0 0 1.037H16a.518.518 0 1 0 0-1.037Zm0 2.764H9.363a.518.518 0 1 0 0 1.036H16a.518.518 0 1 0 0-1.036Zm4.7-1.659a.796.796 0 0 0 0 1.59.796.796 0 0 0 0-1.59Z" />
                      <path fill="#6A6ACF"
                        d="M20.699 21.564a3.01 3.01 0 0 0-3.007 3.007 3.01 3.01 0 0 0 3.007 3.006 3.01 3.01 0 0 0 3.006-3.006 3.01 3.01 0 0 0-3.006-3.007Zm0 4.977a1.972 1.972 0 0 1-1.97-1.97c0-1.086.884-1.97 1.97-1.97 1.086 0 1.97.884 1.97 1.97 0 1.086-.884 1.97-1.97 1.97Z" />
                    </svg>Ознакомиться с делом в картотеке
                    арбитражных дел</a>
                </div>
              </div>
            </div>
            <?php if (!empty($v['reviews'])): ?>
            <p class="mainpage_reviews_right-text">
              <?= $v['reviews'] ?>
            </p>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
        <a class="MoreServBTN" href="<?= Url::to(['/completed']) ?>">Смотреть все завершенные дела</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="mainpage_secondorder">
  <div class="container">
    <div class="mainpage_secondorder_wrapper">
      <h2 class="mainpage_secondorder-title">Спишите долги самостоятельно без суда!</h2>
      <p class="mainpage_secondorder-info">С 1 сентября 2020 года стало списать долги можно без суда через
        отделение МФЦ. Узнайте, подходит ли вам такая процедура</p>
      <a class="btn btn--red" href="<?= Url::to(['secondorder']) ?>">Узнать больше о внесудебном банкротстве</a>
    </div>
  </div>
</section>

<section class="mainpage_faq">
  <div class="container">
    <h2 class="mainpage_faq-title">Часто задаваемые вопросы</h2>
    <div class="accordion">
      <div class="accordion__header">
        <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
        <div class="accordion__arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="44" viewBox="0 0 45 44" fill="none">
            <path d="M36.5234 16.4082L24.5701 28.3615C23.1584 29.7732 20.8484 29.7732 19.4367 28.3615L7.4834 16.4082"
              stroke="#12123D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="accordion__content active">
        Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
        готовы рассчитать индивидуальную цену.
      </div>
    </div>
    <div class="accordion">
      <div class="accordion__header">
        <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
        <div class="accordion__arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="44" viewBox="0 0 45 44" fill="none">
            <path d="M36.5234 16.4082L24.5701 28.3615C23.1584 29.7732 20.8484 29.7732 19.4367 28.3615L7.4834 16.4082"
              stroke="#12123D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="accordion__content active">
        Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
        готовы рассчитать индивидуальную цену.
      </div>
    </div>
    <div class="accordion">
      <div class="accordion__header">
        <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
        <div class="accordion__arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="44" viewBox="0 0 45 44" fill="none">
            <path d="M36.5234 16.4082L24.5701 28.3615C23.1584 29.7732 20.8484 29.7732 19.4367 28.3615L7.4834 16.4082"
              stroke="#12123D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="accordion__content active">
        Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
        готовы рассчитать индивидуальную цену.
      </div>
    </div>
    <div class="accordion">
      <div class="accordion__header">
        <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
        <div class="accordion__arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="44" viewBox="0 0 45 44" fill="none">
            <path d="M36.5234 16.4082L24.5701 28.3615C23.1584 29.7732 20.8484 29.7732 19.4367 28.3615L7.4834 16.4082"
              stroke="#12123D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="accordion__content active">
        Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
        готовы рассчитать индивидуальную цену.
      </div>
    </div>
    <div class="accordion">
      <div class="accordion__header">
        <p class="accordion__title">Сколько стоит банкротство физического лица?</p>
        <div class="accordion__arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="44" viewBox="0 0 45 44" fill="none">
            <path d="M36.5234 16.4082L24.5701 28.3615C23.1584 29.7732 20.8484 29.7732 19.4367 28.3615L7.4834 16.4082"
              stroke="#12123D" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="accordion__content active">
        Цена на процедуру банкротства будет зависеть от стоимости Вашего долга. В отдельных случаях мы также
        готовы рассчитать индивидуальную цену.
      </div>
    </div>
  </div>
</section>