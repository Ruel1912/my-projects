<?php

use yii\helpers\Url;
Yii::$app->name = "О нас";
$this->registerCssFile("@web/css/about.css");
?>

<section class="about">
  <div class="container">
    <h2 class="services__title title">О нас</h2>
    <div class='about_wrapper box-with-img'>
      <div class='about_text box-with-img_content'>
        <p>Опытные специалисты <strong>компании Деловые Консультации</strong> имеют богатую многолетнюю практику
          и наработки с 1999 года
          в предоставлении юридических, бухгалтерских, консультационных услуг и готовы помочь должникам быстро
          и эффективно решить проблемы.</p>
        <p>Мы досконально знаем, как работают суды, приставы и банки, поэтому уже <strong>более 1,8 млрд. руб.</strong>
          выигранно для наших клиентов.</p>
        <p>В нашем офисе мы всегда с теплом встречаем каждого человека, говорим открыто о сроках процедуры, о подводных
          камнях, об имеющихся рисках и даже если ваша ситуация не подходит под процедуру банкротства, <strong>мы всегда
            выслушаем</strong> клиента и <strong>абсолютно бесплатно поможем</strong> найти пути решения сложившейся
          ситуации.</p>
      </div>
      <div class='about_image box-with-img_image'>
        <img src='<?= Url::to('@web/images/about.webp')?>' alt='Фото о нас'>
        <img src='<?= Url::to('@web/images/about-mobile.webp')?>' alt='Фото о нас'>
      </div>
    </div>

    <div class="about_numbers">
      <h3 class="about_numbers_title fs-l">О компании в цифрах</h3>
      <div class="about_numbers_items">
        <div class="about_numbers_item">
          <h4 class="about_numbers_item_number fs-m"><span>100</span>%</h4>
          <p class="about_numbers_item_text">Во время процедуры банкротства финансовый управляющий выделяет деньги
            в размере прожиточного минимума на содержание должника и 100% на каждого из иждивенцев.</p>
        </div>
        <div class="about_numbers_item">
          <h4 class="about_numbers_item_number fs-m"><span>10</span>лет</h4>
          <p class="about_numbers_item_text">Находимся по одному адресу и не собираемся его менять.</p>
        </div>
        <div class="about_numbers_item">
          <h4 class="about_numbers_item_number fs-m"><span>7</span>дней в неделю</h4>
          <p class="about_numbers_item_text">После заключения с нами Договора, мы берём всю Вашу ситуацию и проблемы под
            свой личный контроль, находясь постоянно на связи буквально круглые сутки.</p>
        </div>
      </div>
    </div>
</section>

<section class='facts'>
  <div class='container'>
    <h2 class='title'>Немного фактов</h2>
    <div class="about_facts_items">
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Локация.svg')?>" alt="Икнока Локация">
        </i>
        <h4 class="about_facts_item_title">Проводим успешные процедуры <strong>в регионах:</strong> Саратов, Москва, Волгоград, Казань, Ростов, либо в других <strong>по желанию заказчика.</strong></h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Имущество.svg')?>" alt="Икнока Имущество">
        </i>
        <h4 class="about_facts_item_title">Во время процедуры банкротства <strong>у должника не описывается и не изымается личное имущество</strong> (мебель, оргтехника, бытовая техника и т.д.).</h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Затраты.svg')?>" alt="Икнока Затраты">
        </i>
        <h4 class="about_facts_item_title">Финансовый управляющий не вызывает к себе должника, не задаёт вопросов. Процедура банкротства <strong>максимально комфортна для клиента.</strong></h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Без контроля.svg')?>" alt="Икнока Без контроля">
        </i>
        <h4 class="about_facts_item_title"><strong>Без дополнительных затрат</strong> для клиента отправляем письма кредиторам,  в налоговую и госорганы т. д., на наличие сделок, имущества и др.</h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Контракт.svg')?>" alt="Икнока Контракт">
        </i>
        <h4 class="about_facts_item_title">Во время процедуры банкротства <strong>не контролируются любые расходы и покупки</strong> должника.</h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Рассрочка.svg')?>" alt="Икнока Рассрочка">
        </i>
        <h4 class="about_facts_item_title"><strong>Стоимость</strong> наших услуг <strong>всегда фиксируется</strong> в договоре, она <strong>окончательная</strong> и <strong>никогда не увеличивается</strong> в ходе процедуры.</h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Гарантия.svg')?>" alt="Икнока Гарантия">
        </i>
        <h4 class="about_facts_item_title">У нас <strong>выгодная рассрочка</strong> оплаты услуг и индивидуальный график оплаты. Мы <strong>не требуем оплаты</strong> наших услуг <strong>прямо сейчас.</strong></h4>
      </div>
      <div class="about_facts_item">
        <i class="icon">
          <img src="<?= Url::to('@web/images/icon/Комфорт.svg')?>" alt="Икнока Комфорт">
        </i>
        <h4 class="about_facts_item_title"><strong>Сохраняем имущество должника.</strong> Гарантируем полную процедуру банкротства
          от подачи заявления до получения решения в суде.</h4>
      </div>
    </div>
  </div>
</section>