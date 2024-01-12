<?php

use yii\helpers\Url;

$this->title = 'Оплата';

$js =<<< JS
 $('.goPay').on('click', function() {
   $('.Paymodal').fadeIn(300);
 });

 $('.Paymodal, .closePay').on('click', function(e) {
     if (e.target === this) $('.Paymodal').fadeOut(300);
 });
JS;
$this->registerJs($js);
?>

<article class="cabinet">
  <h1 class="cabinet-title">
    Оплата
  </h1>


  <?php if($payments > 0 && !empty($user->tariff_id) && !empty($user->anketa_id)): ?>
  <section class="cabinet_card cabinet_card_stop">
    <div class="cabinet_card_stop_content">
      <h2 class="cabinet_card-title">Процедура приостановлена</h2>
      <p class="cabinet_card-subtitle">У вас есть просрочка по платежам. Вам необходимо внести указанную сумму</p>
      <a href="<?= Url::to(['payment']) ?>" class="btn btn--white btn--white-red">
        Оплатить сейчас
      </a>
      <p class="cabinet_card-subtitle">Если у вас возникли трудности с оплатой, свяжитесь с нами и мы вам поможем</p>
      <a href="" class="link link--blue cabinet_card_fill-form-link open-popup" data-call="cabinet-help">
        Связаться с менеджером
      </a>
    </div>
  </section>
  <?php endif; ?>

  <!--    --><?php //if(!empty($user->tariff_id)): ?>
  <section class="cabinet_card cabinet_payment">
    <div class="cabinet_payment_content">
      <h2 class="cabinet_payment-title">Вся информация о вашем тарифе, сроках выплат и сумме плажетей</h2>
      <h3 class="cabinet_payment-tarif">
        Ваш тариф
      </h3>
      <p class="cabinet_payment-tarif-name">
        <?php if (empty($tariff->name)): ?>
        Вы ещё не выбрали тариф
        <?php else: ?>
        <?= $tariff->name ?>
        <?php endif; ?>
      </p>

      <?php if(!empty($next)): ?>
      <h3 class="cabinet_payment_group_left-group_title">Наименование сделки</h3>
      <div class="cabinet_payment_group">
      <!-- <div class="cabinet_payment_group red"> Для просрочки нужно добавить класс red -->
        <div class="cabinet_payment_group_left">
          <div class="cabinet_payment_group_left-group">
            <div class="cabinet_payment_group_left-group-content">
              <p class="cabinet_payment_group_left-group-t1">
                Сумма к оплате
              </p>
              <p class="cabinet_payment_group_left-group-t2">
                <?= number_format($next['expected_val'], 0, '', ' ') ?> рублей
              </p>
              <?php if($next['status'] == 0): ?>
              <p class="cabinet_payment_group_left-group-t3">
                Дата следующей оплаты:
              </p>
              <p class="cabinet_payment_group_left-group-t4">
                <?= date("d.m.Y", strtotime($next['date_exp'])) ?>
              </p>
              <a class="btn btn--red" href="<?= $next['link_payment'] ?>" target="_blank">Оплатить сейчас</a>
              <?php endif; ?>
            </div>
          </div>
          <?php if($next['status'] == 1): ?>
          <div class="cabinet_payment_group_left-text">
            <p>
              Ваш платеж внесен.
              <br>
              Предстоящих платежей нет.
            </p>
          </div>
          <?php endif; ?>
          <div class="cabinet_payment_group_left_row">
            <!-- <ul class="cabinet_payment_group_left_row-item">
              <li class="cabinet_payment_group_left_row-item-title">Всего платежей:</li>
              <li class="cabinet_payment_group_left_row-item-undertitle">
                <?/*= $tariff->months + 1 */?>
              </li>
            </ul> -->
            <ul class="cabinet_payment_group_left_row-item">
              <li class="cabinet_payment_group_left_row-item-title">Сделано платежей:</li>
              <li class="cabinet_payment_group_left_row-item-undertitle"><?= $total ?></li>
            </ul>
            <ul class="cabinet_payment_group_left_row-item">
              <li class="cabinet_payment_group_left_row-item-title">Всего оплачено</li>
              <li class="cabinet_payment_group_left_row-item-undertitle">
                <?php if(!empty($totalPay)): ?>
                <?= $tariff->full_price - $totalPay['user_sum'] > 0 ? number_format($totalPay['user_sum'] , 0, '', ' ') : 0 ?>
                <?php else: ?>
                <?= number_format(0, 0, '', ' ') ?>
                <?php endif; ?>рублей</li>
            </ul>
          </div>
        </div>
        <div class="cabinet_payment_group_right">
          <div class="cabinet_payment_group_right-status">
            <?php if($next['status'] == 0): ?>
            <p>Неоплачено</p>
            <?php else: ?>
            <p>Оплачено</p>
            <?php endif; ?>
          </div>
          <a class="btn btn--red" href="" target="_blank">Оплатить сейчас</a>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <!--    --><?php //endif; ?>

  <?php if(empty($user->tariff_id)): ?>
  <section class="cabinet_card cabinet_card_сhoose-rate">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Для начала процедуры банкротства вам необходимо оплатить услугу
      </h2>
      <p class="cabinet_card-subtitle">
        Выберите удобный тариф и начните списание долгов прямо сейчас!
      </p>
      <a class="btn btn--red cabinet_card_сhoose-rate-link" href="<?= Url::to(['/site/payment']) ?>">Выбрать тариф</a>
    </div>
  </section>
  <section class="cabinet_card cabinet_card_сhoose-rate">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Вы можете оплатить без выбора тарифа
      </h2>
      <p class="cabinet_card-subtitle">
        Воспользуйтесь возможностью онлайн оплаты
      </p>
      <a class="btn btn--red goPay" target="_blank">Оплатить сейчас</a>
    </div>
    <div class="Paymodal">
      <div class="modalPay">
        <script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
        <form class="PayForm" name="TinkoffPayForm">
          <button type="button" class="closePay">&times;</button>
          <h4 class="titlePay">Для оплаты заполните все поля</h4>
          <input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1630430307656">
          <input class="tinkoffPayRow" type="hidden" name="frame" value="true">
          <input class="tinkoffPayRow" type="hidden" name="language" value="ru">
          <input class="tinkoffPayRow" type="hidden" name="user" value="<?= Yii::$app->getUser()->getId() ?>">
          <input class="PayInput" type="number" placeholder="Сумма" name="amount" required>
          <input class="tinkoffPayRow PayInput" type="text" placeholder="ФИО" name="name">
          <input class="tinkoffPayRow PayInput" type="tel" placeholder="Телефон указанный в профиле" name="phone">
          <input class="tinkoffPayRow" type="hidden" name="receipt" value="">
          <script>
          function Payment(e) {
            let form = e.parentElement,
              summ = form.amount.value,
              user = form.user.value;
            $.ajax({
              url: '/site/payment-new',
              data: {
                summ: summ,
                user: user
              },
              type: 'POST',
            }).done(function(rsp) {
              $('.Paymodal').fadeOut(300);
            });
            pay(form);
          }
          </script>
          <input class="tinkoffPayRow PayBtn" onclick="Payment(this)" type="button" value="Оплатить">
        </form>
      </div>
    </div>
  </section>
  
  <?php else: ?>
  <section class="cabinet_card cabinet_card_сhoose-rate">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Оплатить
      </h2>
      <p class="cabinet_card-subtitle">
        Воспользуйтесь возможностью онлайн оплаты
      </p>
      <a class="btn btn--red goPay" target="_blank">Оплатить сейчас</a>
    </div>
    <div class="Paymodal">
      <div class="modalPay">
        <script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
        <form class="PayForm" name="TinkoffPayForm">
          <button type="button" class="closePay">&times;</button>
          <h4 class="titlePay">Для оплаты заполните все поля</h4>
          <input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1630430307656">
          <input class="tinkoffPayRow" type="hidden" name="frame" value="true">
          <input class="tinkoffPayRow" type="hidden" name="language" value="ru">
          <input class="tinkoffPayRow" type="hidden" name="user" value="<?= Yii::$app->getUser()->getId() ?>">
          <input class="PayInput" type="number" placeholder="Сумма" name="amount" required>
          <input class="tinkoffPayRow PayInput" type="text" placeholder="ФИО" name="name">
          <input class="tinkoffPayRow PayInput" type="tel" placeholder="Телефон указанный в профиле" name="phone">
          <input class="tinkoffPayRow" type="hidden" name="receipt" value="">
          <script>
          function Payment(e) {
            let form = e.parentElement,
              summ = form.amount.value,
              user = form.user.value;
            $.ajax({
              url: '/site/payment-new',
              data: {
                summ: summ,
                user: user
              },
              type: 'POST',
            }).done(function(rsp) {
              $('.Paymodal').fadeOut(300);
            });
            pay(form);
          }
          </script>
          <input class="tinkoffPayRow PayBtn" onclick="Payment(this)" type="button" value="Оплатить">
        </form>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="cabinet_card cabinet_card_writing-off-debts cabinet_card_writing-off-debts-on-payment-page">
    <div class="cabinet_card_content">
      <h2 class="cabinet_card-title">
        Какие долги можно списать
      </h2>
      <div class="cabinet_card_writing-off-debts_row">
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Mentor.svg') ?>" alt="two people & notebook">
          <p class="cabinet_card_writing-off-debts_row-item-title">
            Перед государством
          </p>
          <ul>
            <li>
              Налоги
            </li>
            <li>
              Штрафы
            </li>
          </ul>
        </div>
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Finance professional.svg') ?>" alt="number & progressive">
          <p class="cabinet_card_writing-off-debts_row-item-title">
            Перед банками и МФО
          </p>
          <ul>
            <li>
              Кредиты
            </li>
            <li>
              Микрозаймы
            </li>
            <li>
              Ипотека
            </li>
          </ul>
        </div>
        <div class="cabinet_card_writing-off-debts_row-item">
          <img src="<?= Url::to('/img/Letter between friends.svg') ?>" alt="envelope & note">
          <p class="cabinet_card_writing-off-debts_row-item-title">
            Перед частными лицами
          </p>
          <ul>
            <li>
              Долги по распискам
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

</article>