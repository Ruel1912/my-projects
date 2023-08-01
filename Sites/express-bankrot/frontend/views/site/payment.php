<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Оплата';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->getUser();
if (!$user->isGuest) {
    $um = \backend\models\UserModel::findOne($user->getId());
}

$this->registerJsFile(Url::to(['js/alert.js']), ['depends' => \yii\web\JqueryAsset::class]);

$js = <<<JS
var id;
$('.getTariff').on('click', function(e) {
    var name = $(this).attr('data-name');
    e.preventDefault();
    id = $(this).attr('data-id');
    Swal.fire({
        icon: 'warning',
        title: 'Тариф ' + name,
        text: 'Вы действительно хотите выбрать данный тариф?',
        footer: '',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Да',
        cancelButtonText: 'Нет',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                data: {id: id},
                dataType: "JSON",
                url: '/site/choose-tariff',
                type: "POST"
            }).done(function(rsp) {
                if (rsp.status === 'success')
                    location.href = '/cabinet/payment';
            });
        }
    });
});
JS;
$this->registerJs($js);

?>
<style>
    .tariff-chosen {
        border:1px solid gainsboro; background-color: #fafafa; padding: 5px 10px; border-radius: 6px;
        text-align: center;
        font-size: 14px;
    }
</style>
<section class="payment">
  <div class="container">
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    <h1 class="payment__title">Оплата</h1>
    <p class="payment__subtitle">
      Выберите удобный для вас способ оплаты и начните жизнь с чистого листа
    </p>

    <div class="payment__inner">

        <?php $path = 0; ?>
        <?php if(!empty($tariff)): ?>
            <?php foreach($tariff as $item): ?>
                <?php

                    switch ($path) {
                        default:
                        case 0:
                            $postfix = '--green';
                            break;
                        case 1:
                            $postfix = '--turquoise';
                            break;
                        case 2:
                            $postfix = '--purpur';
                            break;
                        case 3:
                            $postfix = '';
                            break;
                    }

                ?>
                <article class="payment__item">
                    <div class="payment__content payment__content<?= $postfix ?>">
                        <h2 class="payment__deck payment__deck<?= $postfix ?>">
                            <?= $item['name'] ?>
                        </h2>
                        <p class="payment__text">
                            Освобождение от кредитов и долгов с момента заключения договора
                        </p>

                        <ul class="payment__list">
                            <?php $props = json_decode($item['props']) ?>
                            <?php if(!empty($props)): ?>
                                <?php foreach($props as $p): ?>
                                        <li class="payment__li payment__li<?= $postfix ?>"><?= $p ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <?php if($user->isGuest): ?>
                            <a href="<?= Url::to(['site/signin']) ?>" class="payment__link btn btn--blue">Выбрать</a>
                        <?php else: ?>
                            <?php if(empty($um->tariff_id)): ?>
                                <a href="#" class="payment__link btn btn--blue getTariff" data-name="<?= $item['name'] ?>" data-id="<?= $item['id'] ?>">Выбрать</a>
                            <?php else: ?>
                                <?php if($um->tariff_id == $item['id']): ?>
                                    <div class="tariff-chosen">Тариф выбран</div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </article>
            <?php $path++; if ($path >= 4) $path = 0; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
  </div>
</section>

<section class="payment-ask">
  <div class="container">
    <h2 class="payment__title">Возник вопрос?</h2>
    <p class="payment__subtitle">
      Получите бесплатную консультацию прямо сейчас
    </p>
    <a href="<?=Url::to(['therdorder'])?>" class="payment__link btn btn--red">Получить консультацию юриста</a>
  </div>
</section>