<?php

use yii\helpers\Url;

Yii::$app->name = "Контакты";
$this->registerCssFile("@web/css/contact.css");
?>

<section class="contact">
  <div class="container">
    <h2 class="title">Контакты</h2>
    <div class="contact_info">
      <p class="contact_text">Наш офис находится <strong>по адресу:</strong> 413100, Саратовская область, г.Энгельс, ул
        Московская, д.30 (на пересечении с ул.Нестерова) </p>
      <p class="contact_text"><strong>График работы:</strong> рабочие дни с понедельника по пятницу с 8:30 до 17:30.</p>
      <p class="contact_text"><strong>Телефон:</strong> <a href="tel: 8-995-127-3037"
          class="link primary fs-m">8-995-127-3037</a></p>
      <p class="contact_text"><strong>Почта:</strong> <a href="mailto:dolgu.net@del-audit.ru"
          class="link primary">dolgu.net@del-audit.ru</a></p>
      <p class="contact_text"><strong>Реквизиты:</strong></p>
      <p class="contact_text"><br>ИНН: 6449066230<br>ОГРН: 1126449003339<br>КПП: 644901001</p>
    </div>
    <div class="contact_map">
      <script type="text/javascript" charset="utf-8" async
        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae04d576a2a827d5371d42ade3966616f8cbf2461f2482f821cbc7bf19e885426&amp;width=100%&amp;height=316&amp;lang=ru_RU&amp;scroll=true">
      </script>
    </div>
  </div>
</section>