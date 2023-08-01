<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Получить консультацию';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="quizpage">
    <div class="container">
        <?= Breadcrumbs::widget([ 'links' => isset($this->params ['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

        <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data', 'class' => 'QuizForm']) ?>
        <input type="hidden" value="" name="city">
        <input type="hidden" value="" name="new_region">
        <input type="hidden" name="params" value="<?= !empty($params) ? base64_encode(json_encode($params)) : null ?>">
        <input type="hidden" value="<?= $_SERVER['QUERY_STRING'] ?>" name="query_string">

        <div class="Staps Stap1">
            <div class="Staps_content">
                <h2 class="quizrpage-title">
                    Укажите общую сумму ваших долгов
                </h2>
                <div class="Staps_inpgroup">
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="summ" value="до 250 000">
                        <p class="Staps-label-text">менее 250 000 рублей</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="summ" value="до 500 000">
                        <p class="Staps-label-text">от 250 000 до 500 000 рублей</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="summ" value="до 3 000 000">
                        <p class="Staps-label-text">от 500 000 до 3 000 000 рублей</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="summ" value="более 3 000 000">
                        <p class="Staps-label-text">более 3 000 000 рублей</p>
                    </label>
                </div>
                <button type="button" class="btn btn--red btn--quiz nextBTN">Далее</button>
            </div>
        </div>
        <div class="Staps Stap2">
            <div class="Staps_content">
                <h2 class="quizrpage-title">
                    Есть ли у вас имущество в собственности
                </h2>
                <div class="Staps_inpgroup">
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="property" value="Да, есть квартира (две и более)">
                        <p class="Staps-label-text">Да, есть квартира (две и более)</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="property" value="Да, есть автомобиль">
                        <p class="Staps-label-text">Да, есть автомобиль</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="property" value="Да, есть коммерческая собственность">
                        <p class="Staps-label-text">Да, есть коммерческая собственность</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="property" value="Да, есть другая собственность">
                        <p class="Staps-label-text">Да, есть другая собственность</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="property" value="Нет, ничего нет">
                        <p class="Staps-label-text">Нет, ничего нет</p>
                    </label>
                </div>
                <button type="button" class="btn btn--red btn--quiz nextBTN">Далее</button>
            </div>
        </div>
        <div class="Staps Stap3">
            <div class="Staps_content">
                <h2 class="quizrpage-title">
                    Есть ли у вас на данный момент просрочки по кредитам
                </h2>
                <div class="Staps_inpgroup">
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="overdue" value="Не было просрочек">
                        <p class="Staps-label-text">Не было просрочек</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="overdue" value="Не было, но скоро будут">
                        <p class="Staps-label-text">Не было, но скоро будут</p>
                    </label>
                    <label class="Staps-label">
                        <input class="rad" type="radio" name="overdue" value="Да, есть просрочка более 3 месяцев">
                        <p class="Staps-label-text">Да, есть просрочка более 3 месяцев</p>
                    </label>
                </div>
                <button type="button" class="btn btn--red btn--quiz nextBTN">Далее</button>
            </div>
        </div>
        <div class="Staps Stap4">
            <div class="Staps_content">
                <h2 class="quizrpage-title">
                    Укажите ваши данные для связи и узнайте сроки и стоимость списания вашего долга
                </h2>
                <div class="Staps_inpgroup">
                    <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                    <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                </div>
                <button type="submit" class="btn btn--red">Получить план списания долгов</button>
                <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                        class="link link--gray" href="<?= Url::to(['/policy.html']) ?>">согласие на обработку
                        персональных данных</a> в соответствии с 152-ФЗ</p>
            </div>
        </div>
        <?= Html::endForm() ?>
    </div>
</section>