<?php

use yii\bootstrap\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\UserFiles as valids;

$this->title = 'Документы';

$sections = [
    1 => ['Копия паспорта', 'Копия ИНН', 'Копия СНИЛС', 'Копия трудовой книжки', 'Все кредитные договора и графики'],
    2 => ['Копия свидетельства о браке или его расторжении и разделе имущества', 'Копии свидетельства о рождении несовершеннолетних детей', 'Брачный договор'],
    3 => ['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)', 'Копия ПТС на автомобиль', 'Фото автомобиля'],
    4 => ['Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)', 'Справка о наличии или отсутствии судимости', 'Справка о получении пособий, компенсаций и других социальных выплат', 'Справка о размере пенсии', 'Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости'],
    5 => ['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)'],
    6 => ['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)'],
    7 => ['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года'],
    8 => ['Справка об отсутствии статуса ИП'],
    9 => ['Объяснение должника'],
];

$arr = [];
if (!empty($files)) {
    foreach ($files as $item) {
        $arr[] = $item['type'];
    }
}
$js = <<<JS
$('input[type="file"]').on('input', function() {
    $('.file-preloader').show();
    $(this).closest('form').submit();
});
JS;
$this->registerJs($js);
$usr = \backend\models\UserModel::findOne(Yii::$app->getUser()->getId());
?>
    <style>
        .fadeAfter5 {
            color: red;
            padding-bottom: 20px;
        }
    </style>
<?php //if($usr->deal_id !== 0): ?>
    <article class="cabinet">
        <h1 class="cabinet-title">Ваши документы</h1>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="fadeAfter5" role="alert">
                <?php echo Yii::$app->session->getFlash('error'); ?>
                <?php $this->registerJs(
                    <<<JS
setTimeout(function() {
    $('.fadeAfter5').fadeOut(1000);
}, 5000);
JS
                ) ?>
            </div>
        <?php endif; ?>

        <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data', 'class' => 'cabinet-docs-filter-form']) ?>
        <section class="cabinet-docs-filter">
            <label class="cabinet-docs-filter-btn <?= empty($_GET['filter']) ? 'clicked-type' : '' ?>">
                <input type="radio" onclick="return location.href = 'docs'"
                       name="docs" value="all">
                Все документы
            </label>
            <label class="cabinet-docs-filter-btn <?= !empty($_GET['filter']) && $_GET['filter'] === 'done' ? 'clicked-type' : '' ?>">
                <input onclick="return location.href = 'docs?filter=done'" type="radio" name="docs" value="all">
                Загруженные
            </label>
            <label class="cabinet-docs-filter-btn <?= !empty($_GET['filter']) && $_GET['filter'] === 'wait' ? 'clicked-type' : '' ?>">
                <input onclick="return location.href = 'docs?filter=wait'" type="radio" name="docs" value="all">
                Нужно загрузить
            </label>
            <!-- <label class="cabinet-docs-filter-btn <?= !empty($_GET['filter']) && $_GET['filter'] === 'other' ? 'clicked-type' : '' ?>">
                <input onclick="return location.href = 'docs?filter=other'" type="radio" name="docs" value="all">
                Документы для анализа
            </label> -->
        </section>
        <?= Html::endForm() ?>

        <main class="cabinet-docs">
            <?php if (empty($_GET['filter'])): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Документы, находящиеся у вас
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия паспорта
                    </h3>
                    <?php if (in_array('Копия паспорта', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия паспорта']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия паспорта">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия ИНН
                    </h3>
                    <?php if (in_array('Копия ИНН', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия ИНН']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия ИНН">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия СНИЛС
                    </h3>
                    <?php if (in_array('Копия СНИЛС', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия СНИЛС']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия СНИЛС">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия трудовой книжки
                    </h3>
                    <?php if (in_array('Копия трудовой книжки', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия трудовой книжки']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия трудовой книжки">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Все кредитные договора и графики, которые у Вас
                        есть <?= valids::$additionalDescription['Все кредитные договора и графики'] ?>
                    </h3>
                    <?php if (in_array('Все кредитные договора и графики', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Все кредитные договора и графики']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Все кредитные договора и графики">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы женаты или у Вас есть несовершеннолетний ребёнок
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия свидетельства о браке или его расторжении и разделе имущества
                    </h3>
                    <?php if (in_array('Копия свидетельства о браке или его расторжении и разделе имущества', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия свидетельства о браке или его расторжении и разделе имущества']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копия свидетельства о браке или его расторжении и разделе имущества">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копии свидетельства о рождении несовершеннолетних детей
                    </h3>
                    <?php if (in_array('Копии свидетельства о рождении несовершеннолетних детей', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копии свидетельства о рождении несовершеннолетних детей']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копии свидетельства о рождении несовершеннолетних детей">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Брачный договор <?= valids::$additionalDescription['Брачный договор'] ?>
                    </h3>
                    <?php if (in_array('Брачный договор', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Брачный договор']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Брачный договор">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если у Вас или Вашей супруги есть имущество
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия свидетельства о праве собственности (квартира, гараж, 1 земельный
                        участок) <?= valids::$additionalDescription['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)'] ?>
                    </h3>
                    <?php if (in_array('Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Копия ПТС на автомобиль
                    </h3>
                    <?php if (in_array('Копия ПТС на автомобиль', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Копия ПТС на автомобиль']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия ПТС на автомобиль">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Фото автомобиля <?= valids::$additionalDescription['Фото автомобиля'] ?>
                    </h3>
                    <?php if (in_array('Фото автомобиля', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Фото автомобиля']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Фото автомобиля">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    После этого необходимо дойти до ближайшего МФЦ и запросить там следующие документы
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)
                    </h3>
                    <?php if (in_array('Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Справка о наличии или отсутствии судимости
                    </h3>
                    <?php if (in_array('Справка о наличии или отсутствии судимости', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка о наличии или отсутствии судимости']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка о наличии или отсутствии судимости">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Справка о получении пособий, компенсаций и других социальных выплат
                    </h3>
                    <?php if (in_array('Справка о получении пособий, компенсаций и других социальных выплат', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка о получении пособий, компенсаций и других социальных выплат']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о получении пособий, компенсаций и других социальных выплат">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Справка о размере пенсии <?= valids::$additionalDescription['Справка о размере пенсии'] ?>
                    </h3>
                    <?php if (in_array('Справка о размере пенсии', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка о размере пенсии']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка о размере пенсии">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты
                        недвижимости <?= valids::$additionalDescription['Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости'] ?>
                    </h3>
                    <?php if (in_array('Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Даже если у Вас никогда не было авто, в ближайшем МРЭО ГИБДД необходимо запросить
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Справку о наличии транспортных средств и сделок с ними за последние три года на Вас и Вашу
                        супругу <?= valids::$additionalDescription['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)'] ?>
                    </h3>
                    <?php if (in_array('Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы работали в течение последних трёх лет, необходимо предоставить справку 2-НДФЛ за последние
                    три года. Тоже самое касается Вашей супруги/супруга. Получить её можно:
                </h2>

                <div class="cabinet-docs-item_row cabinet-docs-item_column">
                    <ul>
                        <li class="cabinet-docs-item_column-name">
                            У бухгалтера по месту работы
                        </li>
                        <li class="cabinet-docs-item_column-name">
                            В налоговой
                        </li>
                        <li class="cabinet-docs-item_column-name">
                            На сайте nalog.ru в личном кабинете (вход через гос. услуги)
                        </li>
                    </ul>
                    <div style="width: 100%; max-width: 185px; margin-right: -90px;">
                        <i><?= valids::$additionalDescription['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)'] ?></i>
                    </div>
                    <?php if (in_array('Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Из каждого банка необходимо запросить справку о наличии счетов, справку о задолженности и остатку
                    на счете, а также выписку за последние 3 года
                </h2>

                <div class="cabinet-docs-item_row">
                    <h3 class="cabinet-docs-item_row-name">
                        Справки из всех банков, включая дебетовые счета (зарплата, пенсия, сберкнижка)
                        <i><?= valids::$additionalDescription['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года'] ?></i>
                    </h3>
                    <?php if (in_array('Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны необходимо взять справку об отсутствии статуса ИП. Получить ее можно
                </h2>
                <!--cabinet-docs-item_column-->
                <div class="cabinet-docs-item_row">
                    <ul style="max-width: 500px; padding-left: 10px;">
                        <li class="cabinet-docs-item_column-name">
                            На официальном сайте ФНС России (www.nalog.ru) в электронном сервисе «Предоставление
                            сведений из ЕГРЮЛ/ЕГРИП о конкретном юридическом лице/индивидуальном предпринимателе в форме
                            электронного документа» реализована возможность получения справки об отсутствии
                            запрашиваемой информации в ЕГРИП. Справка о том, что лицо не является индивидуальным
                            предпринимателем в электронном виде предоставляется бесплатно
                        </li>
                        <li class="cabinet-docs-item_column-name">
                            В Налоговой службе, за получение справки на бумажном носителе необходимо заплатить
                            госпошлину в размере 200 рублей, а при необходимости срочного оформления — 400 рублей
                        </li>
                    </ul>
                    <?php if (in_array('Справка об отсутствии статуса ИП', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Справка об отсутствии статуса ИП']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка об отсутствии статуса ИП">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны, необходимо сформировать объяснение должника. (Когда брались кредиты, на
                    что были потрачены)
                </h2>
                <!-- cabinet-docs-item_column -->
                <div class="cabinet-docs-item_row">
                    <a class="link link--gray cabinet-docs-item_column-link" href="<?= Url::to(['']) ?>">Смотреть пример
                        документа</a>

                    <?php if (in_array('Объяснение должника', $arr)): ?>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    <?php else: ?>
                        <?php $elems = valids::$docTypes['Объяснение должника']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Объяснение должника">
                        <?= Html::endForm(); ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php else: ?>
            <?php if ($_GET['filter'] === 'done'): ?>
            <?php $render = false; ?>
            <?php foreach($sections[1] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Документы, находящиеся у вас
                </h2>
                <?php if (in_array('Копия паспорта', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия паспорта
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Копия ИНН', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия ИНН
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Копия СНИЛС', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия СНИЛС
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Копия трудовой книжки', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия трудовой книжки
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Все кредитные договора и графики', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Все кредитные договора и графики, которые у Вас
                            есть <?= valids::$additionalDescription['Все кредитные договора и графики'] ?>
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[2] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы женаты или у Вас есть несовершеннолетний ребёнок
                </h2>
                <?php if (in_array('Копия свидетельства о браке или его расторжении и разделе имущества', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия свидетельства о браке или его расторжении и разделе имущества
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Копии свидетельства о рождении несовершеннолетних детей', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копии свидетельства о рождении несовершеннолетних детей
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Брачный договор', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Брачный договор <?= valids::$additionalDescription['Брачный договор'] ?>
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[3] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если у Вас или Вашей супруги есть имущество
                </h2>

                <?php if (in_array('Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия свидетельства о праве собственности (квартира, гараж, 1 земельный
                            участок) <?= valids::$additionalDescription['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)'] ?>
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Копия ПТС на автомобиль', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия ПТС на автомобиль
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>

                    </div>
                <?php endif; ?>
                <?php if (in_array('Фото автомобиля', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Фото автомобиля <?= valids::$additionalDescription['Фото автомобиля'] ?>
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>

                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[4] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    После этого необходимо дойти до ближайшего МФЦ и запросить там следующие документы
                </h2>
                <?php if (in_array('Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Справка о наличии или отсутствии судимости', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о наличии или отсутствии судимости
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Справка о получении пособий, компенсаций и других социальных выплат', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о получении пособий, компенсаций и других социальных выплат
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Справка о размере пенсии', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о размере
                            пенсии <?= valids::$additionalDescription['Справка о размере пенсии'] ?>
                        </h3>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (in_array('Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты
                            недвижимости <?= valids::$additionalDescription['Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости'] ?>
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>

                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[5] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Даже если у Вас никогда не было авто, в ближайшем МРЭО ГИБДД необходимо запросить
                </h2>
                <?php if (in_array('Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справку о наличии транспортных средств и сделок с ними за последние три года на Вас и Вашу
                            супругу <?= valids::$additionalDescription['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)'] ?>
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[6] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы работали в течение последних трёх лет, необходимо предоставить справку 2-НДФЛ за последние
                    три года. Тоже самое касается Вашей супруги/супруга. Получить её можно:
                </h2>
                <?php if (in_array('Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <ul>
                            <li class="cabinet-docs-item_column-name">
                                У бухгалтера по месту работы
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                В налоговой
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                На сайте nalog.ru в личном кабинете (вход через гос. услуги)
                            </li>
                        </ul>
                        <div>
                            <i><?= valids::$additionalDescription['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)'] ?></i>
                        </div>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[7] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Из каждого банка необходимо запросить справку о наличии счетов, справку о задолженности и остатку
                    на счете, а также выписку за последние 3 года
                </h2>

                <?php if (in_array('Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справки из всех банков, включая дебетовые счета (зарплата, пенсия, сберкнижка)
                            <i><?= valids::$additionalDescription['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года'] ?></i>
                        </h3>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[8] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны необходимо взять справку об отсутствии статуса ИП. Получить ее можно
                </h2>

                <?php if (in_array('Справка об отсутствии статуса ИП', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <ul>
                            <li class="cabinet-docs-item_column-name">
                                На официальном сайте ФНС России (www.nalog.ru) в электронном сервисе «Предоставление
                                сведений из ЕГРЮЛ/ЕГРИП о конкретном юридическом лице/индивидуальном предпринимателе в
                                форме
                                электронного документа» реализована возможность получения справки об отсутствии
                                запрашиваемой информации в ЕГРИП. Справка о том, что лицо не является индивидуальным
                                предпринимателем в электронном виде предоставляется бесплатно
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                В Налоговой службе, за получение справки на бумажном носителе необходимо заплатить
                                госпошлину в размере 200 рублей, а при необходимости срочного оформления — 400 рублей
                            </li>
                        </ul>

                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php $render = false; ?>
            <?php foreach($sections[9] as $item): ?>
            <?php if (in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны, необходимо сформировать объяснение должника. (Когда брались кредиты, на
                    что были потрачены)
                </h2>
                <?php if (in_array('Объяснение должника', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <a class="link link--gray cabinet-docs-item_column-link"
                           href="<?= Url::to(['img/example.png']) ?>" download="Пример объяснения">Смотреть пример
                            документа</a>
                        <p class="cabinet-docs-item_row-status cabinet-docs-item_row-upploaded">
                            
                        </p>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php elseif ($_GET['filter'] === 'other'): ?>
            <h2 class="cabinet-docs-item-title">
                Загрузите документ для предварительного анализа
            </h2>
            <div class="cabinet-docs-item_row">
                <h3 class="cabinet-docs-item_row-name">
                    Документ для анализа
                </h3>
                <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                <input type="file" name="files">
                <input type="hidden" name="type" value="Анализ">
                <?= Html::endForm(); ?>
            </div>
            <?php else: ### Нужно загрузить  ?>
            <?php $render = false; ?>
            <?php foreach($sections[1] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Документы, находящиеся у вас
                </h2>
                <?php if (!in_array('Копия паспорта', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия паспорта
                        </h3>
                        <?php $elems = valids::$docTypes['Копия паспорта']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия паспорта">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
                <?php if (!in_array('Копия ИНН', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия ИНН
                        </h3>
                        <?php $elems = valids::$docTypes['Копия ИНН']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия ИНН">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
                <?php if (!in_array('Копия СНИЛС', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия СНИЛС
                        </h3>
                        <?php $elems = valids::$docTypes['Копия СНИЛС']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия СНИЛС">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Копия трудовой книжки', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия трудовой книжки
                        </h3>
                        <?php $elems = valids::$docTypes['Копия трудовой книжки']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия трудовой книжки">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Все кредитные договора и графики', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Все кредитные договора и графики, которые у Вас
                            есть <?= valids::$additionalDescription['Все кредитные договора и графики'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Все кредитные договора и графики']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Все кредитные договора и графики">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>

            <?php $render = false; ?>
            <?php foreach($sections[2] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы женаты или у Вас есть несовершеннолетний ребёнок
                </h2>
                <?php if (!in_array('Копия свидетельства о браке или его расторжении и разделе имущества', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия свидетельства о браке или его расторжении и разделе имущества
                        </h3>
                        <?php $elems = valids::$docTypes['Копия свидетельства о браке или его расторжении и разделе имущества']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копия свидетельства о браке или его расторжении и разделе имущества">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
                <?php if (!in_array('Копии свидетельства о рождении несовершеннолетних детей', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копии свидетельства о рождении несовершеннолетних детей
                        </h3>
                        <?php $elems = valids::$docTypes['Копии свидетельства о рождении несовершеннолетних детей']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копии свидетельства о рождении несовершеннолетних детей">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Брачный договор', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Брачный договор <?= valids::$additionalDescription['Брачный договор'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Брачный договор']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Брачный договор">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>

            <?php $render = false; ?>
            <?php foreach($sections[3] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если у Вас или Вашей супруги есть имущество
                </h2>
                <?php if (!in_array('Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия свидетельства о праве собственности (квартира, гараж, 1 земельный
                            участок) <?= valids::$additionalDescription['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Копия свидетельства о праве собственности (квартира, гараж, 1 земельный участок)">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
                <?php if (!in_array('Копия ПТС на автомобиль', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Копия ПТС на автомобиль
                        </h3>
                        <?php $elems = valids::$docTypes['Копия ПТС на автомобиль']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Копия ПТС на автомобиль">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Фото автомобиля', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Фото автомобиля <?= valids::$additionalDescription['Фото автомобиля'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Фото автомобиля']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Фото автомобиля">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>


            <?php $render = false; ?>
            <?php foreach($sections[4] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    После этого необходимо дойти до ближайшего МФЦ и запросить там следующие документы
                </h2>

                <?php if (!in_array('Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)
                        </h3>

                        <?php $elems = valids::$docTypes['Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Сведения о состоянии индивидуального лицевого счета застрахованного лица (Форма СЗИ-6)">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Справка о наличии или отсутствии судимости', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о наличии или отсутствии судимости
                        </h3>

                        <?php $elems = valids::$docTypes['Справка о наличии или отсутствии судимости']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка о наличии или отсутствии судимости">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Справка о получении пособий, компенсаций и других социальных выплат', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о получении пособий, компенсаций и других социальных выплат
                        </h3>
                        <?php $elems = valids::$docTypes['Справка о получении пособий, компенсаций и других социальных выплат']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о получении пособий, компенсаций и других социальных выплат">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
                <?php if (!in_array('Справка о размере пенсии', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справка о размере пенсии <?= valids::$additionalDescription['Справка о размере пенсии'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Справка о размере пенсии']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка о размере пенсии">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
                <?php if (!in_array('Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты
                            недвижимости <?= valids::$additionalDescription['Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости'] ?>
                        </h3>

                        <?php $elems = valids::$docTypes['Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Выписка из ЕГРН о правах отдельного лица на имеющиеся у него объекты недвижимости">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>


            <?php $render = false; ?>
            <?php foreach($sections[5] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Даже если у Вас никогда не было авто, в ближайшем МРЭО ГИБДД необходимо запросить
                </h2>
                <?php if (!in_array('Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справку о наличии транспортных средств и сделок с ними за последние три года на Вас и Вашу
                            супругу <?= valids::$additionalDescription['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)'] ?>
                        </h3>
                        <?php $elems = valids::$docTypes['Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о наличии транспортных средств и сделок с ними за последние три года на Вас и супругу(супруга)">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>


            <?php $render = false; ?>
            <?php foreach($sections[6] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Если вы работали в течение последних трёх лет, необходимо предоставить справку 2-НДФЛ за последние
                    три года. Тоже самое касается Вашей супруги/супруга. Получить её можно:
                </h2>
                <?php if (!in_array('Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <ul>
                            <li class="cabinet-docs-item_column-name">
                                У бухгалтера по месту работы
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                В налоговой
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                На сайте nalog.ru в личном кабинете (вход через гос. услуги)
                            </li>
                        </ul>
                        <div>
                            <i><?= valids::$additionalDescription['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)'] ?></i>
                        </div>

                        <?php $elems = valids::$docTypes['Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка 2-НДФЛ за последние три года на Вас и супругу(супруга)">
                        <?= Html::endForm(); ?>

                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>


            <?php $render = false; ?>
            <?php foreach($sections[7] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Из каждого банка необходимо запросить справку о наличии счетов, справку о задолженности и остатку
                    на счете, а также выписку за последние 3 года
                </h2>
                <?php if (!in_array('Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года', $arr)): ?>
                    <div class="cabinet-docs-item_row">
                        <h3 class="cabinet-docs-item_row-name">
                            Справки из всех банков, включая дебетовые счета (зарплата, пенсия, сберкнижка)
                            <i><?= valids::$additionalDescription['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года'] ?></i>
                        </h3>

                        <?php $elems = valids::$docTypes['Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type"
                               value="Справка о наличии счетов, справка о задолженности и остатке на счете, выписка за последние 3 года">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>

            <?php $render = false; ?>
            <?php foreach($sections[8] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>
            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны необходимо взять справку об отсутствии статуса ИП. Получить ее можно
                </h2>
                <?php if (!in_array('Справка об отсутствии статуса ИП', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <ul>
                            <li class="cabinet-docs-item_column-name">
                                На официальном сайте ФНС России (www.nalog.ru) в электронном сервисе «Предоставление
                                сведений из ЕГРЮЛ/ЕГРИП о конкретном юридическом лице/индивидуальном предпринимателе в
                                форме
                                электронного документа» реализована возможность получения справки об отсутствии
                                запрашиваемой информации в ЕГРИП. Справка о том, что лицо не является индивидуальным
                                предпринимателем в электронном виде предоставляется бесплатно
                            </li>
                            <li class="cabinet-docs-item_column-name">
                                В Налоговой службе, за получение справки на бумажном носителе необходимо заплатить
                                госпошлину в размере 200 рублей, а при необходимости срочного оформления — 400 рублей
                            </li>
                        </ul>
                        <?php $elems = valids::$docTypes['Справка об отсутствии статуса ИП']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Справка об отсутствии статуса ИП">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>

            <?php $render = false; ?>
            <?php foreach($sections[9] as $item): ?>
            <?php if (!in_array($item, $arr)) {
                $render = true;
                break;
            } ?>
            <?php endforeach; ?>

            <?php if($render): ?>
            <section class="cabinet-docs-item">
                <h2 class="cabinet-docs-item-title">
                    Когда все документы собраны, необходимо сформировать объяснение должника. (Когда брались кредиты, на
                    что были потрачены)
                </h2>
                <?php if (!in_array('Объяснение должника', $arr)): ?>
                    <div class="cabinet-docs-item_row cabinet-docs-item_column">
                        <a class="link link--gray cabinet-docs-item_column-link"
                           href="<?= Url::to(['img/example.png']) ?>" download="Пример объяснения">Смотреть пример
                            документа</a>
                        <?php $elems = valids::$docTypes['Объяснение должника']; ?>
                        <?php foreach ($elems as $k => $el) $elems[$k] = "{$el}, "; ?>
                        <?php $valid = "." . implode('.', $elems); ?>
                        <?= Html::beginForm("sent-file", 'POST', ['class' => 'form-file', 'enctype' => 'multipart/form-data']); ?>
                        <input accept="<?= $valid ?>" type="file" name="files">
                        <input type="hidden" name="type" value="Объяснение должника">
                        <?= Html::endForm(); ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
        </main>
    </article>
    <!--    --><?php //else: ?>
    <!--    <article class="cabinet">-->
    <!--        <h1 class="cabinet-title">Мои документы</h1>-->
    <!--        <p>Ваше дело еще пока что на рассмотрении. После рассмотрения и начала процедуры у вас появится возможность загружать необходимые для процесса документы</p>-->
    <!--    </article>-->
<?php //endif; ?>