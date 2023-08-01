<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Тех.поддержка';

$js =<<< JS
    $('.start__Helpdesk').on('click', function() {
        var name = $(this).attr('name');
        console.log(name);
        $.ajax({
            url: 'help',
            type: 'POST',
            data: {name:name},
        }).done(function() {
          location.reload();
        });
    });


    var sendForm = true;
    $('.cabinet-help').on('submit', function(e) {
      e.preventDefault();
      if ($('.Message-Input').val().length > 0){
          if (sendForm){
              sendForm = false;
              $.ajax({
                url: 'send-message-help',
                dataType: 'JSON',
                type: 'POST',
                data: $('.cabinet-help').serialize(),
              }).done(function(rsp) {
                $.pjax.reload({container: '#supportContainer'}).done(function() {
                  sendForm = true;
                  $('.Message-Input').val(''); 
                  $('.cabinet_help_top_main').scrollTop($(".cabinet_help_top_main")[0].scrollHeight);
                });
              });
          }
      }

    });
    $('.cabinet_help_top_main').scrollTop($(".cabinet_help_top_main")[0].scrollHeight);
    
JS;
$this->registerJs($js);
?>

<style>
.jq-file__name {
    color: transparent;
}
</style>
<article class="cabinet">
    <h1 class="cabinet-title">Тех.поддержка</h1>
    <h2 class="cabinet-subtitle">Если у вас возникли трудности в использовании сайта, напиши нам и решим вашу проблему
    </h2>
    <section class="cabinet_help">
        <?php if (!empty($tiket)): ?>
        <div class="cabinet_help_top">
            <div class="cabinet_help_top_image">
                <div class="cabinet_help_top_image-img"></div>
                <div class="cabinet_help_top_image-status"></div>
            </div>
            <div class="cabinet_help_top_text">
                <p class="cabinet_help_top_text-name">Константин</p>
                <p class="cabinet_help_top_text-status">Специалист технической поддержки</p>
            </div>
        </div>

        <div class="cabCont">
            <?php Pjax::begin(['id' => 'supportContainer']) ?>
            <?php if (empty($tiket)): ?>
            <p class="cabinet_help_top_main_message_info-text">Диалог пока пуст</p>
            <?php else: ?>

            <div class="cabinet_help_top_main">
                <?php foreach ($tiket->messages as $k => $v): ?>
                <?php if ($v['isSupport'] === 1): ?>
                <div class="cabinet_help_top_main_message">
                    <div style="background-image: url(<?= Url::to(['img/aboutpage-1.png']) ?>)"
                        class="cabinet_help_top_main_message-icon"></div>
                    <div class="cabinet_help_top_main_message_info">
                        <p class="cabinet_help_top_main_message_info-text">
                            <?= $v['message'] ?>
                        </p>
                        <p class="cabinet_help_top_main_message_info-time">
                            <?= date('H:i', strtotime($v['date'])) ?>
                        </p>
                    </div>
                </div>
                <?php else: ?>
                <div class="cabinet_help_top_main_message cabinet_help_top_main_my-message">
                    <div class="cabinet_help_top_main_message-icon"></div>
                    <div class="cabinet_help_top_main_message_info">
                        <p class="cabinet_help_top_main_message_info-text">
                            <?= $v['message'] ?>
                        </p>
                        <p class="cabinet_help_top_main_message_info-time">
                            <?= date('H:i', strtotime($v['date'])) ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php Pjax::end() ?>
        </div>

        <?= Html::beginForm('', 'post', ['class' => 'cabinet-help']) ?>
        <div class="cabinet_help_top_bottom">
            <input type="hidden" name="tiketId" value="<?= $tiket->id ?>">
            <input placeholder="Введите текст" class="Message-Input" name="message">
            <button class="btn btn--red btn--Message-submit">Отправить</button>
            <input accept type="file" multiple name="files">
        </div>
        <?= Html::endForm() ?>
        <?php else: ?>
        <style>
        .cabinet_help {
            width: fit-content;
        }
        </style>
        <input class="btn btn--red start__Helpdesk" name="startDesk" type="button"
            value="Начать диалог с тех.поддержкой">
        <?php endif; ?>
    </section>
</article>