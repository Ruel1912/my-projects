<?php


/**
 * @var $this \yii\web\View
 */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = "Анкета";
$this->registerCssFile(Url::to(['css/anketa.css']));
$this->registerCssFile(Url::to(['css/chosen.min.css']));
$this->registerCssFile(Url::to(['css/date.css']));
$this->registerJsFile(Url::to(['js/fs.js']), ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::to(['js/chosen.jquery.min.js']), ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::to(['js/jui.js']), ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::to(['js/alert.js']), ['depends' => [\yii\web\JqueryAsset::className()]]);
$reloadUrl = Url::to(['site/reload-anketa']);

$jss =<<< JS
     ymaps.ready(init);

  function init() {
    ymaps.geolocation.get({
      provider: "yandex"
    })
        .then(function (res) {
          var g = res.geoObjects.get(0);
          $("input[name=city]").val(g.getLocalities()[0]);
          $("input[name=new_region]").val(g.getAdministrativeAreas()[0]);
        })
        .catch(function (err) {
          console.log('Не удалось установить местоположение', err);
        });
  }
JS;
$this->registerJs($jss);

if(!empty($anketa)) {
    $js = <<<JS
    // window.onerror = function(msg, file, line, col, error) { 
    //     $.ajax({
    //         data: {error: msg + " " + file + " " + line + " " + error},
    //         type: "POST",
    //         url: "/cabinet/log-error",
    //     }).done(function (resp) {
    //         if(resp.data !== false && resp.data !== null)
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Возникла ошибка при обработке запроса',
    //                 text: 'Данные ошибки были записаны и анализируются технической поддержкой.',
    //                 footer: 'Тех. поддержка: +7 495 118 39 34',
    //             });
    //     });
    // };
    $('#obj-div').html('$anketa');
    $('.reload-anketa').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: "$reloadUrl",
            data: {reload: true},
            dataType: "JSON",
            type: "POST"
        }).done(function() {
            location.reload();
        });
    });
JS;
    $this->registerJs($js, \yii\web\View::POS_END);
}
$this->registerJsFile(Url::to(['js/anketa_cfs2.js']), ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerLinkTag(['rel' => 'stylesheet', 'type' => null, 'href' => 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,700']);
$this->registerLinkTag(['rel' => 'stylesheet', 'type' => null, 'href' => 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700']);
$this->registerLinkTag(['rel' => 'stylesheet', 'type' => null, 'href' => 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&display=swap']);
require_once('includes/an-popup1.php');
if(!empty($_SESSION['object']))
    $object = $_SESSION['object'];
else
    $object = null;

function returnVarIfExist($object, $category, $param){
    return !empty($object) && !empty($object->$category) && !empty($object->$category->$param) ? $object->$category->$param : null;
}

?>
<style>
    .anbtn{
        background: var(--link-blue);
    }
    .anbtn:hover, .next-go:hover{
        background: var(--link-blue-hov);
    }
    .next-go{
        background: var(--link-blue);
    }
    .gr2{
        background-image: url('<?= Url::to(['img/anketa/cfs/gr2.png']) ?>');
    }
</style>
<div style="font-style: normal; min-height: calc(100vh - 200px)">
    <?php if(empty($user->anketa_id)): ?>
        <div style="display: none" id="obj-div"></div>
        <?php echo Html::beginForm(\yii\helpers\Url::to(['site/anketa-function']), 'POST', ['class' => 'feedback-form']);?>
        <input type="hidden" name="email" value="">
        <section id="first-form-anketa" style="display: block">
            <div class="container" style="padding-left: 0; padding-right: 0">
                <div class="row row0" id="padd1">
                    <div class="col-lg-5">
                        <h1 style="font-weight: 500;font-size: 36px;line-height: 140%; margin-bottom: 4px;" id="ps1">Заполните карту аудита</h1>
                        <h2 style="font-weight: 500;font-size: 26px;line-height: 140%; margin-bottom: 8px;">Для анализа возможности Вашей процедуры полного списания долгов физ.лица</h2>
                        <p style="font-weight: normal;font-size: 18px;line-height: 140%; margin-bottom: 20px;">На основании данной анкеты юристы Федерального центра защиты заемщиков проведут тщательный анализ Вашей долговой ситуации и подскажут: подходит Вам полное списание долгов или нет.</p>
                        <div style="padding: 30px;background: #fafafa;border: 1px solid #F2F2F2;box-sizing: border-box;font-weight: 300;font-size: 18px;line-height: 21px; border-radius: 12px 12px 0 0" class="padd100">
                            Заполнение подробной <b>анкеты</b> - первый этап в процедуре банкротства. Процесс признания банкротом имеет достаточно много нюансов. И от того, насколько подробно Вы заполните анкету зависит скорость и простота проведения процедуры.
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div style="background: rgba(113, 129, 170, 0.8); border-radius: 0 0 12px 12px; padding: 30px;" class="padd100">
                            <p style="color:#FFFFFF; font-weight: 700;font-size: 20px;line-height: 21px;">Чтобы Вам было удобно заполнять анкету, мы разделили ее на несколько блоков</p>
                            <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 15px; width: 100%;">
                                <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;">
                                    1 блок
                                </div>
                                <div style="font-weight: 500; margin-left: 12px">
                                    Контактные данные
                                </div>
                            </div>

                            <input type="hidden" name="UTM" value="">
                            <input type="hidden" name="UTM_expand" value="">
                            <input type="hidden" name="yslyga" value="54">
                            <input type="hidden" name="book" value="anketa">
                            <input type="hidden" name="question" value="Анкета">
                            <p style="font-weight: 700;font-size: 14px;line-height: 140%;/* identical to box height */color: #ECF5FF;padding-top: 15px">Введите ФИО *</p>
                            <input type="text" placeholder="ФИО" name="fio" class="aninpt validate-first frender0" value="<?= $user->fio ?>">
                            <p style="font-weight: 700;font-size: 14px;line-height: 140%;/* identical to box height */color: #ECF5FF;padding-top: 15px">Номер телефона *</p>
                            <input type="text" name="phone" style="background-color: #e9e9e9" value="<?= $user->username ?>" class="aninpt validate-first frender0" readonly placeholder="8(___)___-__-__">
                            <p style="font-weight: 700;font-size: 14px;line-height: 140%;/* identical to box height */color: #ECF5FF;padding-top: 15px">Введите E-mail</p>
                            <input type="email" placeholder="Email" value="<?= $user->email ?>"  name="p" class="aninpt frender0">
                            <p style="font-weight: 700;font-size: 14px;line-height: 140%;/* identical to box height */color: #ECF5FF;padding-top: 15px">Город регистрации по паспорту *</p>
                            <input type="text" name="city" <?= returnVarIfExist($object, 'system_info', 'city') ?> class="aninpt validate-first frender0" placeholder="Ростов-на-Дону">
                            <div style="padding-top: 25px; font-size: 11px; color: #fafafa">
                                * &ndash; обязательное поле
                            </div>
                            <div style=" margin: 0 auto; width: 100%; max-width: 306px; margin-bottom: 8px;">
                                <div class="next-step-anketa btn btn--blue" id="first-form-confirmation" style="margin-top: 0;">СЛЕДУЮЩИЙ ШАГ</div>
                            </div>
                            <div class="flex" style="margin: 0 auto; max-width: 262px; width: 100%">
                                <div>
                                    <img src="<?= Url::to(['img/anketa/Checkbox.png']) ?>" alt="">
                                </div>
                                <div style="margin-left: 8px; font-weight: bold;font-size: 8px;line-height: 10px;/* identical to box height">
                                    Даю согласие на обработку <a href="<?= Url::to(['site/policy']) ?>" target="_blank" style="color: var(--link-blue);">персональных данных</a>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($_COOKIE['anketa_token'])): ?>
                            <div style="margin-top: 20px; text-align: center; display: none">
                                <a href="#" class="reload-anketa">сбросить данные анкеты</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="second-big-section-anketa" style="display: none">
            <div class="container">
                <div style="padding: 20px 0 30px; position: relative">
                    <style>
                        .stp-progress{
                            background-color: #fafafa;
                            padding: 5px;
                        }
                        .active-progress{
                            background-color: var(--link-blue-hov);
                            color: white;
                        }
                        .current-progress {
                            background-color: var(--link-blue);
                            color: white;
                        }
                    </style>
                    <div style="width: 100%; height: 5px;background: transparent;"></div>
                    <div class="progress-bar-anketa" style="width: 0%; height: 5px;background:  transparent; position: absolute; left: 0; margin-top: -5px;"></div>
                    <div style="display: flex">
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="1">1 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="2">2 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="3">3 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="4">4 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="5">5 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="6">6 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="7">7 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="8">8 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="9">9 шаг</div>
                        <div class="stp-progress" style="max-width: 10%; width: 100%; margin: 0 auto; text-align: center" data-stp="10">10 шаг</div>
                    </div>
                </div>
                <div class="row row0 SHOW_IN_THE_END">
                    <div class="col-lg-8" style="padding-left: 0">
                        <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;">Проверьте правильность заполнения анкеты</h3>
                        <p style="margin-top: 10px;margin-bottom: 12px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">Просмотрите все поля еще раз, если увидели ошибку, Вы можете сразу ее исправить</p>

                    </div>
                    <div class="col-lg-4">
                        <div style="width: 100%; max-width: 306px;" class="hide991">
                            <div class="anbtn audit_button" style="margin-top: 0;padding: 17px 5px">ВСЕ ВЕРНО!</div>
                        </div>
                    </div>
                </div>
                <div class="step step000 SHOW_IN_THE_END" style="display: none">
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500; min-width: 70px; text-align: center">
                            1 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Контактные данные
                        </div>
                    </div>
                    <div class="row row0">
                        <div class="col-lg-5 col-left">
                            <div style="margin-bottom: 15px">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">ФИО</p>
                                <input type="text" class="aninpt2 last-step-inps required_input" data-type="fio" value="<?= $user->fio ?>" name="" placeholder="Иванов Иван Иванович">
                            </div>
                            <div style="margin-bottom: 15px">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">E-mail</p>
                                <input type="email"  class="aninpt2 last-step-inps" data-type="email" value="<?= $user->email ?>" name="" placeholder="ivanov@ivan.ru">
                            </div>
                        </div>
                        <div class="col-lg-5 col-left2">
                            <div style="margin-bottom: 15px">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Номер телефона</p>
                                <input style="background-color: #e9e9e9" type="text" value="<?= $user->username ?>" readonly  class="aninpt2 last-step-inps input-phonemask required_input" data-type="phone" name="" placeholder="8(000)000-00-00">
                            </div>
                            <div style="margin-bottom: 15px">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Город регистрации по паспорту</p>
                                <input type="text"  class="aninpt2 last-step-inps required_input" data-type="city" name="" placeholder="Москва">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step step1" style="display: block;">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Общие сведения о Вас</h3>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500; min-width: 70px; text-align: center">
                            2 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Иные юридически значимые сведения
                        </div>
                    </div>
                    <div class="row row0">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; padding-top: 20px; margin-bottom: 12px;">Ваш социальный статус</p>
                        <div class="col-lg-2 col-left">
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="Работающий" required name="polic" id="checkbox_1" style="" class="checks soc soc1 special_checked">
                                <label for="checkbox_1" style="" class="checksl soc3">Работающий</label>
                            </div>
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="Безработный" required name="polic" id="checkbox_2" style="" class="checks soc soc2">
                                <label for="checkbox_2" style="" class="checksl soc4">Безработный</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-left2">
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="Пенсионер" required name="polic" id="checkbox_3" style="" class="checks soc soc1">
                                <label for="checkbox_3" style="" class="checksl soc3">Пенсионер</label>
                            </div>
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="В декретном отпуске" required name="polic" id="checkbox_7" style="" class="checks soc soc2">
                                <label for="checkbox_7" style="" class="checksl soc4">В декретном отпуске</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-left2">
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="Военнослужащий" required name="polic" id="checkbox_5" style="" class="checks soc soc1">
                                <label for="checkbox_5" style="" class="checksl soc3">Военнослужащий</label>
                            </div>
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" data-value="Нетрудоспособный" required  name="polic" id="checkbox_6" style="" class="checks soc soc2">
                                <label for="checkbox_6" style="" class="checksl soc4">Нетрудоспособный</label>
                            </div>
                        </div>
                        <div class="col-lg-3 ">

                        </div>
                    </div>
                    <div class="row row0">
                        <div class="col-lg-5 col-left" style="margin-top: 10px;">
                            <div class="socinp">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Место работы</p>
                                <input type="text" disabled class="aninpt2" name="work_place_main" placeholder="АО Сбертех">
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Семейное положение</p>
                            <select name="marital_status_main" id="xc500" class="aninpt3 dropdown1" placeholder="Не женат (не замужем)" >
                                <option value="Женат (замужем)">Женат (замужем)</option>
                                <option value="Не женат (не замужем) / Вдовец (вдова)" selected>Не женат (не замужем) / Вдовец (вдова)</option>
                                <option value="Разведен (разведена)">Разведен (разведена)</option>
                            </select>
                            <div id="marital_block_tog" style="display: none">
                                <div style="margin-top: 10px">
                                    <select name="marital_status_additional_tog" class="aninpt3 dropdown1" style="margin-top: 20px;">
                                        <option hidden disabled selected>Введите год заключения брака</option>
                                        <?php $year = (int)date("Y"); ?>
                                        <?php while($year !== 1959): ?>
                                            <option value="<?= $year ?>"><?= $year-- ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div id="marital_block_div" style="display: none">
                                <div style="margin-top: 10px">
                                    <select name="marital_status_additional_div"  class="aninpt3 dropdown1" style="margin-top: 20px;">
                                        <option hidden disabled selected>Введите год расторжения брака</option>
                                        <?php $year = (int)date("Y"); ?>
                                        <?php while($year !== 1959): ?>
                                            <option value="<?= $year ?>"><?= $year-- ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div style="margin-top: 10px">
                                    <select name="marital_status_additional_division"  class="aninpt3 dropdown1" style="margin-top: 20px;">
                                        <option value="Был раздел имущества">Был раздел имущества</option>
                                        <option value="Не было раздела имущества">Не было раздела имущества</option>
                                    </select>
                                </div>
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Наличие судимости по УК РФ</p>
                            <select name="criminal_record_main"  class="aninpt3 dropdown1" placeholder="Не женат (не замужем)">
                                <option value="Нет" selected>Нет</option>
                                <option value="Да">Да</option>
                            </select>
                            <div id="criminal_record_hidden_block" style="display: none">
                                <div class="criminal_record_add">
                                    <input type="text" class="aninpt2 criminal_a not_del_criminal" name="criminal_record_additional[]" placeholder="Укажите статью УК РФ" style="margin-top: 10px;">
                                </div>
                                <div class="flex add-some-block" data-add="criminal_record" style="margin-top: 5px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div class="hov-add-some"  style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7 col-left2" style="margin-top: 10px;">
                            <div class="flex">
                                <div style="width: 390px" class="unwidth">
                                    <div class="socinp">
                                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Должность</p>
                                        <input type="text" disabled class="aninpt2" name="work_place_additional" placeholder="Инженер-разработчик">
                                    </div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Наличие несоверш. детей и иждивенцев</p>
                                    <div>
                                        <select name="dependents_main"  class="aninpt3 dropdown1" placeholder="">
                                            <option value="Нет" selected>Нет</option>
                                            <option value="Есть">Есть</option>
                                        </select>
                                    </div>
                                    <div id="deps-hidden-block" style="display: none; margin-top: 10px;">
                                        <select name="dependents_additional"  class="aninpt3 dropdown1" placeholder="" style="display: none">
                                            <option value="" selected disabled hidden>Введите количество детей и/или иждивенцев</option>
                                            <?php $deps = 1; ?>
                                            <?php while($deps !== 21): ?>
                                                <option value="<?= $deps ?>"><?= $deps++ ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Наличие инвалидности</p>
                                    <select name="disability_main"  class="aninpt3 dropdown1" placeholder="">
                                        <option value="Нет" selected>Нет</option>
                                        <option value="Есть">Есть</option>
                                    </select>
                                    <div id="disab_hidden" style="margin-top: 10px; display: none">
                                        <input type="text" class="aninpt2" name="disability_additional" placeholder="Укажите группу" style="">
                                    </div>
                                </div>
                                <div>
                                    <img src="<?= Url::to(['img/anketa/Union.png']) ?>" alt="Иждивенцами считаются все нетрудоспособные члены семьи, проживающие с Вами на одной территории" style="margin-top: -26px; margin-left: 6px;" class="hide680">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step2" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Для качественного финансового анализа укажите все Ваши задолженности по кредитам</h3>
                    <p style="font-weight: 300;font-size: 16px;line-height: 140%;" class="HIDE_IN_THE_END">Данная информация остается только у нас, мы не передаем ее банкам, органам ФССП и прочим организациям</p>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            3 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о кредитах
                        </div>
                    </div>
                    <div class="">
                        <div class="credit_debt_append_block">

                        </div>
                        <p class="credit_debt_hide1" style="margin-top: 30px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 30px;">В данный момент список пуст, нажмите кнопку, чтобы добавить кредитора </p>
                    </div>
                    <div class="an-show1 show-popup" data-step="2" style="margin-top: 30px;">
                        <div class="flex" style="margin: 0 auto; width: 100%;">
                            <div style="">
                                ДОБАВИТЬ КРЕДИТОРА
                            </div>
                            <div style="margin-left: 12px">
                                <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                            </div>
                        </div>
                    </div>
                    <div class="credit_debt_hide1" style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;">
                        <div class="flex" style="align-items: center">
                            <div style="min-width: 16px;">
                                <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                            </div>
                            <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                Если Вы не можете указать точную информацию - укажите ее примерно
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step3" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Выберите вид некредитной задолженности, если она у Вас есть и заполните форму, если нет - пропустите этот шаг</h3>
                    <p style="font-weight: 300;font-size: 16px;line-height: 140%;" class="HIDE_IN_THE_END">К некредитной задолженности относятся долги по налогам, за услуги ЖКХ, по алиментам и прочие виды задолженностей</p>
                    <div class="flex " style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            4 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о прочих долгах
                        </div>
                    </div>
                    <div>
                        <div class="other_debt_append_block">

                        </div>
                        <p class="other_debt_hide1" style="margin-top: 30px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 30px;">В данный момент список пуст, нажмите кнопку, чтобы добавить долг </p>
                    </div>
                    <div class="an-show1 show-popup" data-step="3" style="margin-top: 30px; max-width: 222px">
                        <div class="flex" style="margin: 0 auto; width: 100%;">
                            <div style="">
                                ДОБАВИТЬ ДОЛГ
                            </div>
                            <div style="margin-left: 12px">
                                <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                            </div>
                        </div>
                    </div>
                    <div class="other_debt_hide1" style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;">
                        <div class="flex" style="align-items: center">
                            <div style="min-width: 16px;">
                                <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                            </div>
                            <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                Если Вы не можете указать точную информацию - укажите ее примерно
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step4" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;">Ответьте на несколько важных вопросов</h3>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 24px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            5 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Дополнительная информация для аудита
                        </div>
                    </div>
                    <div class="hide-after-complete">
                        <div style="padding: 100px 0 60px">
                            <div style="margin: 0 auto; width: 100%; max-width: 754px; padding:  20px ; background: #F2F2F2;">

                                <div style="display: block" class="quiz-1 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Есть ли у Вас решения судов по взысканию задолженностей?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Подавал ли банк на Вас в суд?</div>
                                    <div style="padding-top: 88px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="1" data-param="court_decision" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="1" data-param="court_decision" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="1" data-param="court_decision"  class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-2 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Есть ли исполнительные производства?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Открыто ли у приставов (ФССП) исполнительное производство на Вас по взысканию задолженностей?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="2" data-param="executive_proceedings" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="2" data-param="executive_proceedings" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="2" data-param="executive_proceedings" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-3 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Списание денежных средств </div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Списывают ли у Вас безакцептно (без Вашего разрешения) денежные средства со счетов для погашения исполнительного производства (ФССП) или кредитной задолженности?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="3" data-param="debits" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="3" data-param="debits" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="3" data-param="debits" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-4 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Есть ли у Вас аресты или запреты на имущество? </div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Наложенные аресты на счета, зарплатную карту. Или на имущество: дом, квартира, земля, автомобиль и т.д.</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="4" data-param="arests" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="4" data-param="arests" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="4" data-param="arests" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-5 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Сведения об участии в уставном капитале ООО и АО</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Являетесь ли Вы учредителем ООО или акционером?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="5" data-param="LLC_capital" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="5" data-param="LLC_capital" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="5" data-param="LLC_capital" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-6 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Зарегистрированно ли на Вас ИП?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Являетесь ли вы действующим индивидуальным предпринимателем?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="6" data-param="individual_enterpreneur" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="6" data-param="individual_enterpreneur" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="6" data-param="individual_enterpreneur" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-7 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Есть ли у Вас официальный источник дохода, подтвержденный справкой?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Можете ли вы подтвертить свой доход с помощью справки 2-НДФЛ, полученной в налоговой?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="7" data-param="official_income" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="7" data-param="official_income" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="7" data-param="official_income" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-8 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Есть ли у Вас дебиторская задолженность (право требовать возвращения долга)?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Есть ли у Вас документы (расписки, исполнительные листы), по которым Вы можете взыскать денежные средства в свою пользу?</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 559px; margin: 0 auto">
                                            <div style="" data-qs="8" data-param="receivables" class="yes-go">
                                                ДА
                                            </div>
                                            <div style="max-width: 173px" data-qs="8" data-param="receivables" class="none-go">
                                                НЕТ
                                            </div>
                                            <div style="max-width: 173px;" data-qs="8" data-param="receivables" class="skip-quiz">
                                                НЕ УВЕРЕН
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz-9 quiz-block">
                                    <div style="font-weight: 700;font-size: 24px;line-height: 28px; text-align: center; padding-top: 20px">Вы проживаете в собственном жилье или арендованном?</div>
                                    <div style="font-weight: 300;font-size: 16px;line-height: 140%; padding-top: 25px; text-align: center">Жилье, которое оформлено на Вас и Вы в нем прописаны.</div>
                                    <div style="padding-top: 82px; padding-bottom: 50px;">
                                        <div class="flex bondik" style="width: 100%; max-width: 366px; margin: 0 auto">
                                            <div style="" data-qs="9" data-param="housing" class="sobs-go">
                                                СОБСТВЕННОЕ
                                            </div>
                                            <div style="max-width: 173px" data-qs="9" data-param="housing" class="arenda-go">
                                                АРЕНДА
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div style="">
                            <div style="padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 486px; margin: 0 auto">
                                <div class="flex" style="align-items: center">
                                    <div style="min-width: 16px;">
                                        <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                                    </div>
                                    <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                        Если Вы затрудняетесь с ответом - ответьте так, как считаете нужным
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step step4-1" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Проверьте, пожалуйста, еще раз ответы на все вопросы</h3>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 24px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            5 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Дополнительная информация для аудита
                        </div>
                    </div>
                    <div class="txt18">Есть ли у Вас решения судов по взысканию задолженностей?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_10" style="" value="ДА" data-type="court_decision" class="checks group-court_decision audit-checkbox">
                            <label for="checkbox_10" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_11" style="" value="НЕТ" data-type="court_decision" class="checks group-court_decision audit-checkbox">
                            <label for="checkbox_11" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_12" style="" value="НЕ УВЕРЕН" data-type="court_decision" class="checks group-court_decision audit-checkbox">
                            <label for="checkbox_12" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-court_decision append-summary-block">

                    </div>

                    <div class="txt18">Есть ли исполнительные производства?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_13" style="" value="ДА" data-type="executive_proceedings" class="checks group-executive_proceedings audit-checkbox">
                            <label for="checkbox_13" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_14" style="" value="НЕТ" data-type="executive_proceedings" class="checks group-executive_proceedings audit-checkbox">
                            <label for="checkbox_14" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_15" style="" value="НЕ УВЕРЕН" data-type="executive_proceedings" class="checks group-executive_proceedings audit-checkbox">
                            <label for="checkbox_15" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-executive_proceedings append-summary-block">

                    </div>


                    <div class="txt18">Безакцептное списание денежных средств</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_16" style="" value="ДА" data-type="debits" class="checks group-debits audit-checkbox">
                            <label for="checkbox_16" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_17" style="" value="НЕТ" data-type="debits" class="checks group-debits audit-checkbox">
                            <label for="checkbox_17" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_18" style="" value="НЕ УВЕРЕН" data-type="debits" class="checks group-debits audit-checkbox">
                            <label for="checkbox_18" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-debits append-summary-block">

                    </div>


                    <div class="txt18">Есть ли у Вас аресты или запреты на имущество?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_19" style="" value="ДА" data-type="arests" class="checks group-arests audit-checkbox">
                            <label for="checkbox_19" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_20" style="" value="НЕТ" data-type="arests" class="checks group-arests audit-checkbox">
                            <label for="checkbox_20" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_21" style="" value="НЕ УВЕРЕН" data-type="arests" class="checks group-arests audit-checkbox">
                            <label for="checkbox_21" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-arests append-summary-block">

                    </div>


                    <div class="txt18">Являетесь ли Вы учредителем ООО или акционером?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_22" style="" value="ДА" data-type="LLC_capital" class="checks group-LLC_capital audit-checkbox">
                            <label for="checkbox_22" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_23" style="" value="НЕТ" data-type="LLC_capital" class="checks group-LLC_capital audit-checkbox">
                            <label for="checkbox_23" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_24" style="" value="НЕ УВЕРЕН" data-type="LLC_capital" class="checks group-LLC_capital audit-checkbox">
                            <label for="checkbox_24" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-LLC_capital append-summary-block">

                    </div>


                    <div class="txt18">Зарегистрированно ли на Вас ИП?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_25" style="" value="ДА" data-type="individual_enterpreneur" class="checks group-individual_enterpreneur audit-checkbox">
                            <label for="checkbox_25" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_26" style="" value="НЕТ" data-type="individual_enterpreneur" class="checks group-individual_enterpreneur audit-checkbox">
                            <label for="checkbox_26" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_27" style="" value="НЕ УВЕРЕН" data-type="individual_enterpreneur" class="checks group-individual_enterpreneur audit-checkbox">
                            <label for="checkbox_27" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>


                    <div class="txt18">Есть ли у Вас официальный источник дохода, подтвержденный справкой?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_28" style="" value="ДА" data-type="official_income" class="checks group-official_income audit-checkbox">
                            <label for="checkbox_28" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_29" style="" value="НЕТ" data-type="official_income"  class="checks group-official_income audit-checkbox">
                            <label for="checkbox_29" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_30" style="" value="НЕ УВЕРЕН" data-type="official_income" class="checks group-official_income audit-checkbox">
                            <label for="checkbox_30" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-official_income append-summary-block">

                    </div>


                    <div class="txt18">Есть ли у Вас дебиторская задолженность (право требовать возвращения долга)?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_31" style="" value="ДА" data-type="receivables" class="checks group-receivables audit-checkbox">
                            <label for="checkbox_31" style="" class="checksl ">Да</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_32" style="" value="НЕТ" data-type="receivables" class="checks group-receivables audit-checkbox">
                            <label for="checkbox_32" style="" class="checksl ">Нет</label>
                        </div>
                        <div style="width: 100px">
                            <input type="checkbox" required name="polic" id="checkbox_33" style="" value="НЕ УВЕРЕН" data-type="receivables" class="checks group-receivables audit-checkbox">
                            <label for="checkbox_33" style="" class="checksl ">Не знаю</label>
                        </div>
                    </div>
                    <div class="append-block-receivables append-summary-block">

                    </div>


                    <div class="txt18">Вы проживаете в собственном жилье или арендованном?</div>
                    <div class="flex" style="padding-top: 21px; width: 100%;">
                        <div style="width: 179px">
                            <input type="checkbox" required name="polic" id="checkbox_34" style="" value="СОБСТВЕННОЕ" data-type="housing" class="checks group-housing audit-checkbox">
                            <label for="checkbox_34" style="" class="checksl ">Собственное</label>
                        </div>
                        <div style="width: 179px">
                            <input type="checkbox" required name="polic" id="checkbox_35" style="" value="АРЕНДОВАННОЕ" data-type="housing" class="checks group-housing audit-checkbox">
                            <label for="checkbox_35" style="" class="checksl ">Арендованное</label>
                        </div>
                    </div>
                    <div class="append-block-housing append-summary-block">

                    </div>

                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step5" style="display: none">
                    <div class="row row0">
                        <div class="col-lg-7 appended-fix-5 col-left">
                            <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Выберете вид дохода и заполните форму, если доходов нет - пропустите шаг</h3>
                            <p style="font-weight: 300;font-size: 16px;line-height: 140%;" class="HIDE_IN_THE_END">Укажите Ваши официальные доходы <b>за месяц</b>, подтвержденные 2-НДФЛ</p>
                            <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                                <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                                    6 блок
                                </div>
                                <div style="font-weight: 500; padding-left: 3px">
                                    Сведения о доходах
                                </div>
                            </div>
                            <div>
                                <div class="hide5stepblock">
                                    <p style="margin-top: 30px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 30px;">В данный момент список пуст, нажмите кнопку, чтобы добавить доход </p>
                                </div>
                                <div class="append5stepblock">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 appended-destroy col-left2">
                            <div style="border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; padding: 20px 0px 29px 20px" class="kus">
                                <div class="flex">
                                    <div style="min-width: 63px" class="hide991">
                                        <img src="<?= Url::to(['img/anketa/ic1.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 15px; font-weight: normal;font-size: 20px;line-height: 140%;">Доходы гражданина показывают, будет ли введена реструктуризация долгов или они будут списаны при процедуре банкротства</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="an-show1 show-popup" data-step="5" style="margin-top: 30px; max-width: 233px">
                        <div class="flex" style="margin: 0 auto; width: 100%;">
                            <div style="">
                                ДОБАВИТЬ ДОХОД
                            </div>
                            <div style="margin-left: 12px">
                                <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;" class="hide5stepblock">
                        <div class="flex" style="align-items: center">
                            <div style="min-width: 16px;">
                                <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                            </div>
                            <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                Если Вы не можете указать точную информацию - укажите ее примерно
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step6" style="display: none">
                    <div class="row row0">
                        <div class="col-lg-7 col-left">
                            <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Какое имущество есть у Вас в собственности?</h3>
                            <p style="font-weight: 300;font-size: 16px;line-height: 140%;" class="HIDE_IN_THE_END">Квартиры, дома, земельные участки, дачи, автомобили, лодки, иное имущество</p>
                            <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                                <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                                    7 блок
                                </div>
                                <div style="font-weight: 500; padding-left: 3px">
                                    Сведения о имуществе
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 HIDE_IN_THE_END col-left2">
                            <div style="border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; padding: 20px 0px 29px 20px; margin-top: 10px;" class="kus">
                                <div class="flex">
                                    <div style="min-width: 63px" class="hide991">
                                        <img src="<?= Url::to(['img/anketa/ic1.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 15px; font-weight: normal;font-size: 20px;line-height: 140%;">Мы знаем как сохранить имущество при банкротстве! Отнеситесь серьезно к заполнению этого раздела.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row0">
                        <div class="col-lg-8 step6fixblock col-left">
                            <p style="font-weight: 700;font-size: 18px;line-height: 21px; margin-top: 10px">Ваше имущество:</p>
                            <div class="step6appendblock mine">
                                <p class="hidestep6" style="margin-top: 10px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">В данный момент список пуст, нажмите кнопку, чтобы добавить имущество </p>
                            </div>
                            <div class="an-show1 show-popup" data-step="6" data-type="mine" style="margin-top: 20px; max-width: 220px; padding: 18px 51px;">
                                <div class="flex" style="margin: 0 auto; width: 100%;">
                                    <div style="">
                                        ДОБАВИТЬ
                                    </div>
                                    <div style="margin-left: 12px">
                                        <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                                    </div>
                                </div>
                            </div>
                            <div class="ifsoc1" style="display: none">
                                <p style="font-weight: 700;font-size: 18px;line-height: 21px; margin-top: 40px">Имущество Вашей супруги (супруга), приобретенное в браке:</p>
                                <div class="step6appendblock partner">
                                    <p class="hidestep6" style="margin-top: 10px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">В данный момент список пуст, нажмите кнопку, чтобы добавить имущество </p>
                                </div>
                                <div class="an-show1 show-popup" data-step="6" data-type="partner" style="margin-top: 20px; max-width: 220px; padding: 18px 51px;">
                                    <div class="flex" style="margin: 0 auto; width: 100%;">
                                        <div style="">
                                            ДОБАВИТЬ
                                        </div>
                                        <div style="margin-left: 12px">
                                            <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ifsoc2" style="display: none">
                                <p style="font-weight: 700;font-size: 18px;line-height: 21px; margin-top: 40px">Имущество бывшей супруги (супруга), приобретенное в браке:</p>
                                <div class="step6appendblock ex_partner">
                                    <p class="hidestep6" style="margin-top: 10px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">В данный момент список пуст, нажмите кнопку, чтобы добавить имущество </p>
                                </div>
                                <div class="an-show1 show-popup" data-step="6" data-type="ex_partner" style="margin-top: 20px; max-width: 220px; padding: 18px 51px;">
                                    <div class="flex" style="margin: 0 auto; width: 100%;">
                                        <div style="">
                                            ДОБАВИТЬ
                                        </div>
                                        <div style="margin-left: 12px">
                                            <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 hidestep6 col-left2" >
                            <div style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;">
                                <div class="flex" style="align-items: center">
                                    <div style="min-width: 16px;">
                                        <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                                    </div>
                                    <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                        Если Вы не можете указать точную информацию - укажите ее примерно
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step7" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Укажите сведения о совершенных сделках с движимым и недвижимым имуществом за последние три года, если сделок не было - пропустите этот шаг</h3>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            8 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о сделках
                        </div>
                    </div>
                    <div class="append-block-s7">
                        <p style="margin-top: 10px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">В данный момент список пуст, нажмите кнопку, чтобы добавить имущество </p>
                    </div>
                    <div class="row row0">
                        <div class="col-lg-7 fix7step col-left">
                            <div class="an-show1 show-popup" data-step="7" style="margin-top: 20px; max-width: 220px; padding: 18px 51px;">
                                <div class="flex" style="margin: 0 auto; width: 100%;">
                                    <div style="">
                                        ДОБАВИТЬ
                                    </div>
                                    <div style="margin-left: 12px">
                                        <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;" class="HIDE_IN_THE_END">
                                <div class="flex" style="align-items: center">
                                    <div style="min-width: 16px;">
                                        <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                                    </div>
                                    <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                        Если Вы не можете указать точную информацию - укажите ее примерно
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 hidestep7 col-left2">
                            <div style="border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; padding: 20px 0px 29px 20px; margin-top: 10px;" class="kus">
                                <div class="flex">
                                    <div style="min-width: 63px" class="hide991">
                                        <img src="<?= Url::to(['img/anketa/ic1.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 15px; font-weight: normal;font-size: 20px;line-height: 140%;">В процедуре банкротства сделки за последние 3 года могут быть оспорены, поэтому укажите информацию максимально правдиво, чтобы мы смогли защитить Ваше имущество</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="SHOW_IN_THE_END" style="margin-top: 40px">
                </div>
                <div class="step step7-1" style="display: none">
                    <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;">Укажите сведения о совершенных сделках с движимым и недвижимым имуществом за последние три года, если сделок не было - пропустите этот шаг</h3>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            8 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о сделках
                        </div>
                    </div>
                    <div class="flex">
                        <div></div>
                        <div></div>
                        <div style="margin-left: 20px">
                            <img src="<?= Url::to(['img/anketa/gr1.png']) ?>" alt="">
                        </div>
                        <div style="margin-left: 20px">
                            <img src="<?= Url::to(['img/anketa/gr2.png']) ?>" alt="">
                        </div>
                    </div>
                    <div class="row row0">
                        <div class="col-lg-7">
                            <div class="an-show1 show-popup" style="margin-top: 20px; max-width: 220px; padding: 18px 51px;">
                                <div class="flex" style="margin: 0 auto; width: 100%;">
                                    <div style="">
                                        ДОБАВИТЬ
                                    </div>
                                    <div style="margin-left: 12px">
                                        <img src="<?= Url::to(['img/anketa/plus2.png']) ?>" alt="" style="margin-top: -5px;">
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 40px; padding: 32px 20px; background: #F2F2F2;border-radius: 3px; max-width: 364px;">
                                <div class="flex" style="align-items: center">
                                    <div style="min-width: 16px;">
                                        <img src="<?= Url::to(['img/anketa/cfs/!.png']) ?>" alt="" style="margin-top: 5px;width: 16px;">
                                    </div>
                                    <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                        Если Вы не можете указать точную информацию - укажите ее примерно
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div style="border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; padding: 20px 0px 29px 20px; margin-top: 10px;" >
                                <div class="flex">
                                    <div style="min-width: 63px" class="hide991">
                                        <img src="<?= Url::to(['img/anketa/ic1.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 15px; font-weight: normal;font-size: 20px;line-height: 140%;">В процедуре банкротства сделки за последние 3 года могут быть оспорены, поэтому укажите информацию максимально правдиво, чтобы мы смогли защитить Ваше имущество</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step step8" style="display: none">
                    <div class="row row0">
                        <div class="col-lg-7 col-left">
                            <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;" class="HIDE_IN_THE_END">Обоснование кредитной задолженности</h3>
                            <p style="margin-top: 10px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;" class="HIDE_IN_THE_END">Опишите максимально подробно, почему у Вас появились задолженности</p>
                            <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 10px; width: 100%;">
                                <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                                    9 блок
                                </div>
                                <div style="font-weight: 500; padding-left: 3px">
                                    Обоснование задолженности
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 HIDE_IN_THE_END col-left2">
                            <div style="border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; padding: 20px 0px 29px 20px; margin-top: 10px;" class="kus">
                                <div class="flex">
                                    <div style="min-width: 63px" class="hide991">
                                        <img src="<?= Url::to(['img/anketa/ic1.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 15px; font-weight: normal;font-size: 20px;line-height: 140%;">При процедуре банкротства судья обращает большое внимание на Ваше обоснование кредитной задолжности. Правдоподобное обоснование дает хороший шанс на успешное банкротство </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea id="rationale-text" name="" placeholder="Подробно опишите ситуацию, в связи с которой у Вас появились задолженности" cols="30" rows="10" style="width: 100%; background: #F2F2F2;border: 1px solid #979797;box-sizing: border-box;border-radius: 3px; font-weight: 500;font-size: 18px;line-height: 21px; margin-top: 30px; padding: 10px; max-width: 1155px; outline: none; resize: none"></textarea>
                </div>
                <div class="step step90" style="display: none" id="final">
                    <div class="row row0">
                        <div class="col-lg-8">
                            <h3 style="font-weight: 700;font-size: 18px;line-height: 21px;">Проверьте правильность заполнения анкеты</h3>
                            <p style="margin-top: 10px;margin-bottom:12px;font-weight: normal;font-size: 16px;line-height: 140%; margin-top: 20px;">Просмотрите все поля еще раз, если увидели ошибку, Вы можете сразу ее исправить</p>

                        </div>
                        <div class="col-lg-4">
                            <div style="width: 100%; max-width: 306px;" class="hide991">
                                <button type="submit" class="anbtn" style="margin-top: 0;padding: 17px 5px">ВСЕ ВЕРНО!</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 20px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            1 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Контактные данные
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            2 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Иные юридически значимые сведения
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            3 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о задолженности
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            3 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Дополнительная информация для аудита
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            4 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о доходах
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            5 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о имуществе
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            6 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Сведения о сделках
                        </div>
                    </div>
                    <div class="flex" style="font-size: 18px;line-height: 21px; width: 57px; margin-top: 40px; width: 100%;">
                        <div style="background: var(--link-blue);border-radius: 3px; color: white; padding: 5px 8px; font-weight: 500;min-width: 70px; text-align: center">
                            7 блок
                        </div>
                        <div style="font-weight: 500; padding-left: 3px">
                            Обоснование задолженности
                        </div>

                    </div>
                    <div style="padding: 105px 5px 77px; margin: 0 auto; width: 100%; max-width: 306px;">
                        <button type="submit" class="anbtn" style="margin-top: 0; padding: 17px 5px">ВСЕ ВЕРНО!</button>
                    </div>
                </div>
                <div class="flex padd90 HIDE_IN_THE_END" style="flex-flow: row wrap; width: 100%;">
                    <div class="back-go">
                        <div class="flex" style="max-width: 100px; margin: 0 auto;">
                            <div style="height: 23px; display:flex; justify-content: center; align-items: center;">
                                <img src="<?= Url::to(['img/anketa/arr.png']) ?>" alt="" >
                            </div>
                            <div style="margin-left: 15px;">
                                НАЗАД
                            </div>
                        </div>
                    </div>
                    <div class="next-go next-step-anketa btn btn--blue">
                        СЛЕДУЮЩИЙ ШАГ
                    </div>
                    <div class="skip-go" style="display: none;">
                        ПРОПУСТИТЬ
                    </div>
                </div>
            </div>
            <div style="width: 100%; max-width: 306px; margin: 10px auto 40px" class="SHOW_IN_THE_END">
                <div class="anbtn audit_button" style="margin-top: 0;padding: 17px 5px">ВСЕ ВЕРНО!</div>
            </div>
            <div class="ending-block" style="display:none;">
                <div class="container">
                    <div style="text-align: center; padding: 20px 0px; color: #DE5F43; font-size: 26px; line-height: 30px;">
                        <b>Внимание!</b>
                    </div>
                    <div style="text-align: center; padding: 0 20px; font-size: 26px;line-height: 36px;">
                        <b>Всё готово!</b>
                        <br>
                        Анкета полностью готова к отправке и анализу. Чтобы посмотреть результат анализа анкеты нажмите "ОТПРАВИТЬ АНКЕТУ". Наш оператор свяжется с вами для уточнения деталей и консультации.
                        <br>
                    </div>
                    <div style="text-align: center; padding: 20px 20px; display: none">
                        <div class="checkbox" style="outline: none !important;">
                            <input type="checkbox" data-value="" required name="polic" id="checkbox_1777322" style="" class="checks">
                            <label for="checkbox_1777322" style="font-size: 20px" class="checksl"><b>Я хочу как можно скорей избавиться от кредитов и готов оплатить платеж 7000р в ближайшие 3 дня </b></label>
                        </div>
                    </div>
                    <div style="text-align: center; padding: 0 20px">
                        <div class="anbtn final-button" style="margin: 20px auto;padding: 17px 5px">ОТПРАВИТЬ АНКЕТУ</div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo Html::endForm();?>
        <section id="final-block" style="display: none">
            <div>
                <h2 style="font-weight: bold;font-size: 30px;line-height: 35px; text-align: center; padding: 40px 5px 50px">Анкета отправлена!</h2>
                <p><span>Наш менеджер приступил к рассмотрению вашей анкеты! Пожалуйста ожидайте обратного звонка для согласования.</span></p>
            </div>
            <div style="display: none">
                <!--FINAL THEME-->
                <h2 style="font-weight: bold;font-size: 30px;line-height: 35px; text-align: center; padding: 40px 5px 50px">Экспресс-аудит банкротного рейтинга</h2>
                <div class="container">
                    <div class="var1-1" style="display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n1.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Ваши доходы
                            </div>
                        </div>
                        <div style="margin-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%;">
                            У Вас нет официальных источников дохода.
                        </div>
                    </div>
                    <div class="var1-2" style="display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n11.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Ваши доходы
                            </div>
                        </div>
                        <div style="margin-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%;">
                            Ваши доходы не превышают платеж реструктуризации.
                        </div>
                    </div>
                    <div class="var1-3" style="display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n1.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Ваши доходы
                            </div>
                        </div>
                        <div style="margin-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%;">
                            Ваши доходы больше, чем платеж реструктуризации.
                        </div>
                    </div>
                </div>
                <div class="var1-1" style="margin-top: 50px; background: #47B39D; padding: 0 0 37px">
                    <div class="container">
                        <div class="row row0">
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: right; color: #FFFFFF;opacity: 0.8;">
                                    Высокий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: right">Шанс банкротства физического лица</div>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: left; color: #FFFFFF;opacity: 0.8;">
                                    Низкий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: left">Шанс реструктуризации долга </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="var1-2" style="margin-top: 50px; background: #47B39D; padding: 0 0 37px; display: none">
                    <div class="container">
                        <div class="row row0">
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: right; color: #FFFFFF;opacity: 0.8;">
                                    Высокий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: right">Шанс банкротства физического лица</div>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: left; color: #FFFFFF;opacity: 0.8;">
                                    Низкий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: left">Шанс реструктуризации долга </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="var1-3" style="margin-top: 50px; background: rgba(214, 62, 28, 0.8); padding: 0 0 37px; display: none">
                    <div class="container">
                        <div class="row row0">
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: right; color: #FFFFFF;opacity: 0.8;">
                                    Низкий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: right;">Шанс банкротства физического лица - необходимы подготовительные работы. Обратитесь к юристу.  </div>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5" style="padding-top: 37px">
                                <div style="font-weight: 700;font-size: 50px;line-height: 140%; text-align: left; color: #FFFFFF;opacity: 0.8;">
                                    Высокий
                                </div>
                                <div style="font-size: 20px;line-height: 140%;/* or 28px */color: #FFFFFF;font-weight: 300; text-align: left;">Шанс реструктуризации долга - необходимо снизить сумму доходов </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="var2-1" style="padding-top: 90px">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n2.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Жилье и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы прописаны не в собственном жилье, а значит — это не единственное место, пригодное для жизни! Ваше имущество могут продать на торгах при банкротстве.
                        </div>
                        <div class="flex" style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px;">
                            <div style="min-width: 13px;">
                                <img src="<?= Url::to(['img/anketa/!2.png']) ?>" alt="" >
                            </div>
                            <div style="margin-left: 10px; font-weight: 300;font-size: 20px; line-height: 140%; width: 100%; max-width: 431px;">
                                Срочно пропишитесь в собственной квартире — это наложит запрет на продажу.
                            </div>
                        </div>
                    </div>
                    <div class="var2-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n2.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Жилье и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас есть имущество, которое может быть продано на торгах по банкротству.
                        </div>
                        <div class="flex" style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px;">
                            <div style="min-width: 13px;">
                                <img src="<?= Url::to(['img/anketa/!2.png']) ?>" alt="" >
                            </div>
                            <div style="margin-left: 10px; font-weight: 300;font-size: 20px; line-height: 140%; width: 100%; max-width: 450px;">
                                Необходимо получить консультацию у юриста, как избежать продажи и защитить имущество.
                            </div>
                        </div>
                    </div>
                    <div class="var2-3" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n22.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Жилье и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас нет недвижимости и другого имущества, которое может быть реализовано при банкротстве. <br>Это замечательно!
                        </div>
                    </div>
                    <div class="var3-1" style="padding-top: 90px">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n3.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Сделки
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы совершали сделки за последние три года.
                        </div>
                        <div class="flex" style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px;">
                            <div style="min-width: 13px;">
                                <img src="<?= Url::to(['img/anketa/!2.png']) ?>" alt="" >
                            </div>
                            <div style="margin-left: 10px; font-weight: 300;font-size: 20px; line-height: 140%; width: 100%; max-width: 431px;">
                                Нужно получить консультацию у юриста о том, как защитить их от оспаривания.
                            </div>
                        </div>
                    </div>
                    <div class="var3-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n33.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Сделки
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас не было сделок за последние три года, а значит и нечего оспаривать. Вздохните спокойно!
                        </div>
                    </div>
                    <div class="var4-1" style="padding-top: 90px">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n44.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Брак и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас нет семейного имущества, купленного в браке. И это очень хорошо!
                        </div>
                    </div>
                    <div class="var4-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n44.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Брак и имущество
                            </div>
                        </div>
                        <div style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы никогда не состояли в браке, а значит и нет совместного имущества! Это облегчит процедуру!
                        </div>
                    </div>
                    <div class="var4-3" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n4.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Брак и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас есть семейное имущество, купленное в браке за последние три года. Его могут продать на торгах.
                        </div>
                        <div class="flex" style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px;">
                            <div style="min-width: 13px;">
                                <img src="<?= Url::to(['img/anketa/!2.png']) ?>" alt="" >
                            </div>
                            <div style="margin-left: 10px; font-weight: 300;font-size: 20px; line-height: 140%; width: 100%; max-width: 431px;">
                                Нужно получить консультацию у юриста о том, как защитить их от оспаривания.
                            </div>
                        </div>
                    </div>
                    <div class="var4-4" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n44.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Брак и имущество
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы развелись более трех лет назад. А значит, даже при отстуствии деления имущества при разводе, у Вас уже нет семейного имущества! Все хорошо!
                        </div>
                    </div>
                    <div class="var4-5" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n44.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Брак и имущество
                            </div>
                        </div>
                        <div style="padding-top: 20px; margin-bottom: 12px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас было деление имущества при разводе! Это хорошо!
                        </div>
                    </div>
                    <div style="padding-top: 40px;">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n5.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Задолженности
                            </div>
                        </div>
                        <div class="var5-1-1" style="padding-top: 20px; margin-bottom: 12px; display: none">
                            <div class="flex">
                                <div>
                                    <img src="<?= Url::to(['img/anketa/r1.png']) ?>" alt="" >
                                </div>
                                <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                    Долги по алиментам не списываются при банкротстве.
                                </div>
                            </div>
                        </div>
                        <div class="var5-1-2" style="padding-top: 20px; margin-bottom: 12px; display: none">
                            <div class="flex">
                                <div>
                                    <img src="<?= Url::to(['img/anketa/r1.png']) ?>" alt="" >
                                </div>
                                <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                    Субсидиарная ответственность не списывается при банкротстве.
                                </div>
                            </div>
                        </div>
                        <div class="var5-1-3" style="padding-top: 20px; margin-bottom: 12px; display: none">
                            <div class="flex">
                                <div>
                                    <img src="<?= Url::to(['img/anketa/r1.png']) ?>" alt="" >
                                </div>
                                <div style="font-weight: normal;font-size: 20px;line-height: 140%; margin-left: 20px;">
                                    Компенсация материального вреда и причиненного ущерба не списывается при банкротстве.
                                </div>
                            </div>
                        </div>
                        <div class="var5-2-1" style="font-weight: normal;font-size: 20px;line-height: 140%; padding-top: 20px; margin-bottom: 12px;">
                            Вам <span style="color: rgba(214, 62, 28, 0.8);">НЕ ПОДХОДИТ</span> упрощенная (внесудебная) процедура банкротства. Вы можете подать на банкротство на общих основаниях через Арбитражный суд
                        </div>
                        <div class="var5-2-2" style="font-weight: normal;font-size: 20px;line-height: 140%; padding-top: 20px; margin-bottom: 12px; display: none">
                            Вам <span style="color: #47B39D;">ПОДХОДИТ</span> упрощенное (внесудебное) банкротство! Это замечательно! Но нужно уточнить у юриста все подробности!
                        </div>
                        <div class="var5-2-3" style="font-weight: normal;font-size: 20px;line-height: 140%; padding-top: 20px; margin-bottom: 12px; display: none">
                            У Вас очень большие долги. Ваша процедура банкротства будет проходить в <span style="color: rgba(214, 62, 28, 0.8);">СТАНДАРТНОМ</span> формате — через Арбитражный суд.
                        </div>
                    </div>
                </div>
                <div class="var5-3-1" style="margin-top: 50px;padding: 47px 5px; background: rgba(214, 62, 28, 0.8); display: none">
                    <div class="flex" style="margin: 0 auto; width: 100%; max-width: 782px;">
                        <div style="min-width: 10px">
                            <img src="<?= Url::to(['img/anketa/!3.png']) ?>" alt="" >
                        </div>
                        <div style="margin-left: 8px; font-weight: bold;font-size: 20px;line-height: 140%; color: #F2F2F2;">
                            Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!
                        </div>
                    </div>
                </div>
                <div class="var5-3-2" style="margin-top: 50px;padding: 18px 5px; background: #47B39D;">
                    <div class="flex" style="margin: 0 auto; width: 100%; max-width: 839px;">
                        <div style="min-width: 110px">
                            <img src="<?= Url::to(['img/anketa/ic2.png']) ?>" alt="" >
                        </div>
                        <div style="margin-left: 8px; font-weight: bold;font-size: 20px;line-height: 140%; color: #F2F2F2;">
                            Отлично! Сумма долга подходит для подачи заявления на банкротство!
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="var6-1" style="padding-top: 90px">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n66.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Наличие ИП
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы не являетесь индивидуальным предпрнимателем, а это означает, что процедура банкротства будет проходить для Вас проще.
                        </div>
                    </div>
                    <div class="var6-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n6.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Наличие ИП
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы являетесь индивидуальным предпринимателем, а это означает, что процедура банкротства будет проходить для Вас сложнее.
                        </div>
                    </div>
                    <div class="var7-1" style="padding-top: 90px; ">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n77.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Социальный статус
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%" class="var-status">
                            Ваш статус — припятствий к банкротству нет.
                        </div>
                    </div>
                    <div class="var7-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n7.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Социальный статус
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы — военнослужащий, т.е. относитесь к группе риска при банкротстве. Нужна консультация с юристом!
                        </div>
                    </div>
                    <div class="var8-1" style="padding-top: 90px; ">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n88.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Просрочки
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас большие просрочки — это позволяет подать на банкротство с высоким шансом списания долгов!
                        </div>
                    </div>
                    <div class="var8-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n8.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Просрочки
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            По некоторым кредитам просрочки менее 3-х месяцев. Банкротство возможно со средним шансом. Уточните детали у юриста!
                        </div>
                    </div>
                    <div class="var9-1" style="padding-top: 90px; ">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n99.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                ООО или АО
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы не являетесь участником АО или ООО — это хорошо!
                        </div>
                    </div>
                    <div class="var9-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n9.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                ООО или АО
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            Вы участник общества — это усложняет процедуру. Нужна консультация с юристом.
                        </div>
                    </div>
                    <div class="var10-1" style="padding-top: 90px; ">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n100.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Дебиторская задолженность
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас нет текущих прав требования долга к третьим лицам. Это упрощает процедуру!
                        </div>
                    </div>
                    <div class="var10-2" style="padding-top: 90px; display: none">
                        <div class="flex">
                            <div>
                                <img src="<?= Url::to(['img/anketa/n10.png']) ?>" alt="" >
                            </div>
                            <div style="font-weight: 700;font-size: 20px;line-height: 140%;margin-left: 20px;">
                                Дебиторская задолженность
                            </div>
                        </div>
                        <div style="padding-top: 10px; padding-left: 45px; font-weight: normal;font-size: 20px;line-height: 140%; width: 100%">
                            У Вас есть право требовать долги у других. Это усложняет процедуру. Уточните у юриста, как быть с этим.
                        </div>
                    </div>
                </div>
                <div class="container" style="">
                    <div class="row row0" style="padding-top: 150px;font-weight: 300;font-size: 20px;line-height: 140%;">
                        <div class="col-lg-5">
                            <p>Вы набрали <span style="color: rgba(214, 62, 28, 0.8);"><b><span class="anketa-points"></span> баллов</b></span></p>
                            <div class="rez1" style="padding-bottom: 15px;">
                                <p>Это <b>ОЧЕНЬ НИЗКИЙ</b> банкротный рейтинг!</p>
                                <p>Шанс на успех при самостоятельном банкротстве минимальный.</p>
                                <p>Если Вы подадите на банкротство <b>БЕЗ ПОДГОТОВКИ</b>, то точно навредите себе! Обязательно проконсультируйтесь с юристом.</p>
                                <p><span style="font-weight: 400">Вероятность списания долга: Низкая</span> (без вмешательств экспертов)</p>
                            </div>
                            <div class="rez2" style="display: none; padding-bottom: 15px;">
                                <p>Это <b>НИЗКИЙ</b> банкротный рейтинг!</p>
                                <p>Шанс на успех при самостоятельном банкротстве ниже среднего.</p>
                                <p>Если Вы подадите на банкротство <b>БЕЗ ПОДГОТОВКИ</b>, то могут быть негативные последствия!</p>
                                <p>Обязательно уточните у специалиста, как правильно подготовиться к процедуре и списать долги без рисков.</p>
                                <p><span style="font-weight: 400">Вероятность списания долга: Средняя</span> (без вмешательств экспертов)</p>
                            </div>
                            <div class="rez3" style="display: none; padding-bottom: 15px;">
                                <p>Это <b>СРЕДНИЙ</b> банкротный рейтинг!</p>
                                <p>Шанс на успех при самостоятельном банкротстве не самый лучший.</p>
                                <p>Мы рекомендуем провести консультацию с юристом и обсудить спорные моменты перед подачей. Могут быть негативные последствия.</p>
                                <p><span style="font-weight: 400">Вероятность списания долга: Высокая</span></p>
                            </div>
                            <div class="rez4" style="display: none; padding-bottom: 15px;">
                                <p>Это банкротный рейтинг <b>ВЫШЕ СРЕДНЕГО</b>!</p>
                                <p>Шанс на успех при самостоятельном банкротстве не самый лучший.</p>
                                <p>Мы рекомендуем провести консультацию с юристом и обсудить спорные моменты перед подачей. Могут быть негативные последствия.</p>
                                <p><span style="font-weight: 400">Вероятность списания долга: Высокая</span></p>
                            </div>
                        </div>
                        <div class="col-lg-7 " >
                            <style>
                                .rate-block{
                                    position: absolute;
                                    width: 100%;
                                    bottom: 0;
                                }
                                .red-block{
                                    background-color: #E87258;
                                }
                                .yellow-block {
                                    background-color: #EEBB3A;
                                }
                            </style>
                            <div style="display: flex; align-items: flex-end; justify-content: center; flex-wrap: wrap">
                                <div style="margin: 0 5px; max-width: 300px; width: 100%;">
                                    <div style="min-height: 400px; max-width: 300px; width: 100%; position: relative; ">
                                        <div class="my-rating rate-block red-block" style="">
                                            <div style="display: flex; position: relative; height: 100%; justify-content: center; align-items: center">
                                                <div class="anketa-points" style="color: white; font-size: 60px; font-weight: 700">33</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parent-block-my">
                                        <div style="padding: 10px; color: white; font-weight: bolder; text-align: center;">
                                            Ваш рейтинг сейчас
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 0 5px; max-width: 300px; width: 100%;">
                                    <div style="min-height: 400px; max-width: 300px; width: 100%; position: relative; ">
                                        <div class="expert-rating rate-block" style="background-color: #47B39D; ">
                                            <div style="display: flex; position: relative; height: 100%; justify-content: center; align-items: center">
                                                <div class="expert-points" style="color: white; font-size: 60px; font-weight: 700">88</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="background-color: #47B39D;">
                                        <div style="padding: 10px; color: white; font-weight: bolder; text-align: center;  ">
                                            Ваш рейтинг после вмешательства специалиста!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="font-weight: 400;font-size: 16px;line-height: 130%;color: #ECF5FF; padding: 80px 10px 67px">
                        <p style=""><b>Банкротный рейтинг</b> (рейтинг банкротства) — показывает насколько эффективной и простой будет Ваша процедура банкротства физического лица! Чем выше рейтинг, тем проще будет списать долг без рисков и последствий! </p>
                        <p><b>Критически низкий рейтинг</b>, при котором банкротство невозможно — менее 15 баллов. В данном случае помочь Вам никак нельзя и процедура недоступна!</p>
                        <p><b>Средний рейтинг</b> — от 16 до 50 баллов. Означает, что Вам 100% нужна помощь в подготовке к процедуре. Но даже с таким рейтингом успех списания долга может быть очень высоким. Все зависит от подготовительной работы.</p>
                        <p><b>Хороший рейтинг</b> — от 51 до 75 баллов. Процедура банкротства будет быстрой, без последствий, а все спорные нюансы можно будет заранее решить с юристом и консультантом. </p>
                        <p><b>Отличный рейтинг</b> — от 76 до 100 баллов. Процедура максимально эффективная для Вас. Вам не нужно подготавливаться перед подачей заявления! Однако, мы все же рекомендуем обсудить детали с юристом. </p>
                    </div>
                </div>
            </div>

        </section> <!--FINAL THEME-->
    <?php else: ?>
        <div>
            <h2 style="font-weight: bold;font-size: 30px;line-height: 35px; text-align: center; padding: 40px 5px 50px">Анкета уже заполнена</h2>
            <p style="text-align: center"><span>Ваша анкета уже находится в обработке, пожалуйста, ожидайте.</span></p>
        </div>
    <?php endif; ?>
</div>
