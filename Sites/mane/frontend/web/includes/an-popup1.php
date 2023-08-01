<?php

/**
 * @var $this \yii\web\View
 */

use yii\helpers\Url;
?>
<div id="an-pop-over-3" class="an-pop-over"> <!--STEP3-->
	<div class="an-flexpop">
		<div class="an-pop-special-new">
			<div class="ta-right" style="position: absolute; width: 100%">
				<div class="closing-tag">
					+
				</div>
			</div>
			<div class="an-popsmall">
				<p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Сведения о задолженности</p>
				<div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Кредитор</p>
                                <input type="text" class="aninpt2" name="credit_debt_creditor" placeholder="ПАО Банк">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="50000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_summ" placeholder="500 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="50000">
                                        +
                                    </div>
                                </div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Платеж в месяц</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="10000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_monthly" placeholder="10 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="10000">
                                        +
                                    </div>
                                </div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Остаток по платежу</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_ostatok" placeholder="500 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Просрочка</p>
                            <select name="credit_debt_latePayment" id="" class="aninpt3 dropdown1">
                                <option value="Нет просрочки">Нет просрочки</option>
                                <option value="1 месяц">1 месяц</option>
                                <option value="2 месяца">2 месяца</option>
                                <option value="3 месяца">3 месяца</option>
                                <option value="4 месяца">4 месяца</option>
                                <option value="5 месяцев">5 месяцев</option>
                                <option value="6 месяцев" selected>6 месяцев</option>
                                <?php for ($i = 7; $i < 37; $i++): ?>
                                    <option value="<?= $i ?> месяцев"><?= $i ?> месяцев</option>
                                <?php endfor; ?>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Вид задолжности</p>
                            <select name="credit_debt_type" id="" class="aninpt3 dropdown1">
                                <option value="Кредит">Кредит</option>
                                <option value="Кредитная карта" selected>Кредитная карта</option>
                                <option value="Ипотека">Ипотека</option>
                                <option value="Автокредит">Автокредит</option>
                                <option value="Залоговый кредит">Залоговый кредит</option>
                                <option value="Микрозаймы">Микрозаймы</option>
                                <option value="Карта рассрочки">Карта рассрочки</option>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">В каком году был взят кредит</p>
                            <select name="credit_debt_year" id="" class="aninpt3 dropdown1">
                                <option value="" selected hidden disabled>Выберите год</option>
                                <?php for($i = 2021; $i > 1999; $i--): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px"></p>
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" name="credit_debt_poruch" id="checkbox_100z2" style="" class="checks">
                                <label for="checkbox_100z2" style=" padding-left: 0" class="checksl">Есть поручитель или солидарный заемщик</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-some-pos" data-type="credit_debt" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
		</div>
	</div>
</div>


<div id="an-pop-over-3-1" class="an-pop-over"> <!--STEP3-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Сведения о задолженности</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <input type="hidden" name="credit_debt_id_update" value="">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px;">Кредитор</p>
                                <input type="text" class="aninpt2" name="credit_debt_creditor_update" placeholder="ПАО Банк">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_summ_update" placeholder="500 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Платеж в месяц</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="10000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_monthly_update" placeholder="10 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="10000">
                                        +
                                    </div>
                                </div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Остаток по платежу</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4" name="credit_debt_ostatok_update" placeholder="500 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Просрочка</p>
                            <select name="credit_debt_latePayment_update" id="" class="aninpt3 dropdown1 upd1chosen">
                                <option value="Нет просрочки">Нет просрочки</option>
                                <option value="1 месяц">1 месяц</option>
                                <option value="2 месяца">2 месяца</option>
                                <option value="3 месяца">3 месяца</option>
                                <option value="4 месяца">4 месяца</option>
                                <option value="5 месяцев">5 месяцев</option>
                                <option value="6 месяцев" selected>6 месяцев</option>
                                <?php for ($i = 7; $i < 37; $i++): ?>
                                    <option value="<?= $i ?> месяцев"><?= $i ?> месяцев</option>
                                <?php endfor; ?>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Вид задолжности</p>
                            <select name="credit_debt_type_update" id="" class="aninpt3 dropdown1 upd1chosen">
                                <option value="Кредит">Кредит</option>
                                <option value="Кредитная карта" selected>Кредитная карта</option>
                                <option value="Ипотека">Ипотека</option>
                                <option value="Автокредит">Автокредит</option>
                                <option value="Залоговый кредит">Залоговый кредит</option>
                                <option value="Микрозаймы">Микрозаймы</option>
                                <option value="Карта рассрочки">Карта рассрочки</option>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">В каком году был взят кредит</p>
                            <select name="credit_debt_year_update" id="" class="aninpt3 dropdown1 upd1chosen">
                                <option value="" selected hidden disabled>Выберите год</option>
                                <?php for($i = 2021; $i > 1999; $i--): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px"></p>
                            <div class="checkbox" style="outline: none !important;">
                                <input type="checkbox" name="credit_debt_poruch_update" id="checkbox_100z1" style="" class="checks">
                                <label for="checkbox_100z1" style=" padding-left: 0" class="checksl">Есть поручитель или солидарный заемщик</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 update-some-pos" data-type="credit_debt" style="text-align: center; border: none">Обновить</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="an-pop-over-4-1" class="an-pop-over"> <!--STEP4-main-pop-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-bottom: 5px;">Выберите вид задолженности</p>
                 <div style="margin: 0 auto; max-width: 366px; width: 100%; padding: 50px 5px 246px;">
                     <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Вид задолженности</p>
                    <select name="" id="choose-type-other-debt" class="aninpt3 dropdown1">
                        <option value="" disabled selected>Выберите вид задолженности</option>
                        <option value="ЖКХ">ЖКХ</option>
                        <option value="Налоги">Налоги</option>
                        <option value="Задолженность по причинению вреда здоровью, материального ущерба, морального вреда">Задолженность по причинению вреда здоровью, материального ущерба, морального вреда</option>
                        <option value="Субсидиарная ответственность по долгам юр.лица">Субсидиарная ответственность по долгам юр.лица</option>
                        <option value="Алименты">Алименты</option>
                        <option value="Штрафы ГИБДД">Штрафы ГИБДД</option>
                        <option value="Долг по расписке частному лицу">Долг по расписке частному лицу</option>
                        <option value="Иные виды задолженности">Иные виды задолженности</option>
                    </select>
                 </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-2" class="an-pop-over"> <!--STEP4-pop2-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Налоги</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Налоги" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Налоги" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Налоги" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-3" class="an-pop-over"> <!--STEP4-pop3-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">ЖКХ</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="5000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="ЖКХ" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="5000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="ЖКХ" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="ЖКХ" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-4" class="an-pop-over"> <!--STEP4-pop4-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Задолженность по причинению вреда здоровью, материального ущерба, морального вреда</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="50000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Задолженность по причинению вреда здоровью, материального ущерба, морального вреда" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="50000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Задолженность по причинению вреда здоровью, материального ущерба, морального вреда" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Задолженность по причинению вреда здоровью, материального ущерба, морального вреда" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-5" class="an-pop-over"> <!--STEP4-pop5-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Субсидиарная ответственность по долгам юр.лица</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="50000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Субсидиарная ответственность по долгам юр.лица" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="50000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Субсидиарная ответственность по долгам юр.лица" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Субсидиарная ответственность по долгам юр.лица" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-6" class="an-pop-over"> <!--STEP4-pop6-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Алименты</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Алименты" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Алименты" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Алименты" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-7" class="an-pop-over"> <!--STEP4-pop7-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Штрафы ГИБДД</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="5000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Штрафы ГИБДД" name="" placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="5000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Штрафы ГИБДД" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Штрафы ГИБДД" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-8" class="an-pop-over"> <!--STEP4-pop8-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Долг по расписке частному лицу</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="5000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Долг по расписке частному лицу" name=""  placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="5000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Долг по расписке частному лицу" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Долг по расписке частному лицу" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-4-9" class="an-pop-over"> <!--STEP4-pop8-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Иные виды задолженности</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма задолженности</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="50000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 summ_other_add" data-type="Иные виды задолженности" name=""  placeholder="100 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="50000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Примечание</p>
                    <input type="text" class="aninpt2 comm_other_add" data-type="Иные виды задолженности" name="" placeholder="Вы можете оставить краткий комментарий">
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-other-debt-btn" data-type="Иные виды задолженности" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-5" class="an-pop-over"> <!--STEP5-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="an-popsmall" style="" id="an-popsmall2">
                <div class="pop5-quiz-1 pop-quiz" data-type-audit="court_decision" style="display: block">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию о судебном решении</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363;">Номер судебного решения</p>
                                    <input type="text" class="aninpt2 court_decision_number" name="" placeholder="_ _ _ _ - _ _ _ _">
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма к взысканию (можно примерную)</p>
                                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                            –
                                        </div>
                                        <div style="position: relative; z-index: 1; width: 100%;">
                                            <input type="text"  class="aninpt4 court_decision_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                        </div>
                                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                            +
                                        </div>
                                    </div>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="1" data-type="court_decision">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 19px;">Дата судебного решения</p>
                                <input type="text" class="aninpt2 court_decision_date" placeholder="Введите или выберете дату" style="padding: 10px 10px" id="datepicker">
                                <div class="quiz-append-block-1 quiz-del-section" data-restore-type="court_decision">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="1" data-type="court_decision" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-2 pop-quiz" data-type-audit="executive_proceedings" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию об исполнительном производстве</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363;">Номер исполнительного производства</p>
                                    <input type="text" class="aninpt2 executive_proceedings_number" name="" placeholder="_ _ _ _ - _ _ _ _">
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма к взысканию</p>
                                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                            –
                                        </div>
                                        <div style="position: relative; z-index: 1; width: 100%;">
                                            <input type="text" class="aninpt4 executive_proceedings_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                        </div>
                                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                            +
                                        </div>
                                    </div>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="2" data-type="executive_proceedings">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 19px;">Дата исполнительного производства</p>
                                <input type="text" class="aninpt2 executive_proceedings_date" placeholder="Введите или выберете дату" style="padding: 10px 10px" id="datepicker2">
                                <div class="quiz-append-block-2 quiz-del-section" data-restore-type="executive_proceedings">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="2" data-type="executive_proceedings" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-3 pop-quiz" data-type-audit="debits" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию о списании денежных средств</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363; padding-bottom: 5px;">Кто списывает? (банки, приставы, иные организации)</p>
                                    <select name="" id="" class="aninpt3 dropdown1 required-quiz-3 debits_organisation" style="">
                                        <option value="Судебные приставы">Судебные приставы</option>
                                        <option value="Банки" selected>Банки</option>
                                        <option value="Иные организации">Иные организации</option>
                                    </select>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="3" data-type="debits">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz-append-block-3 quiz-del-section" data-restore-type="debits">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 41px; padding-bottom: 5px;" class="mrg101">Сумма списания в месяц</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4 required-quiz-3 debits_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="3" data-type="debits" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-4 pop-quiz" data-type-audit="arests" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Укажите аресты и запреты на имущество</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363; padding-bottom: 5px;">Причины наложения ареста</p>
                                    <select name="" id="" class="aninpt3 dropdown1 required-quiz-4 arests_reason" style="">
                                        <option value="Исполнительное производство">Исполнительное производство</option>
                                        <option value="Залог" selected>Залог</option>
                                        <option value="Иное">Иное</option>
                                    </select>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="4" data-type="arests">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz-append-block-4 quiz-del-section" data-restore-type="arests">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 19px; color: #636363; padding-bottom: 5px;">Вид имущества</p>
                                <select name="" id="" class="aninpt3 dropdown1 required-quiz-4 arests_type" style="">
                                    <option value="Частный дом">Частный дом</option>
                                    <option value="Квартира" selected>Квартира</option>
                                    <option value="Земельный участок">Земельный участок</option>
                                    <option value="Транспортное средство">Транспортное средство</option>
                                    <option value="Ценные бумаги">Ценные бумаги</option>
                                    <option value="Счет в банке">Счет в банке</option>
                                    <option value="Иное">Иное</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="4" data-type="arests" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-5 pop-quiz" data-type-audit="LLC_capital" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте сведения об участии в уставном капитале ООО и АО</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363; padding-bottom: 5px;">Вид </p>
                                    <select name="" id="" class="aninpt3 dropdown1 required-quiz-5 LLC_capital_type" style="">
                                        <option value="ООО">ООО</option>
                                        <option value="АО" selected>АО</option>
                                    </select>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="5" data-type="LLC_capital">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz-append-block-5 quiz-del-section" data-restore-type="LLC_capital">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 19px; color: #636363; padding-bottom: 5px;">Доля в процентах</p>
                                <select name="" id="" class="aninpt3 dropdown1 required-quiz-5 LLC_capital_percent" style="">
                                    <?php for($i = 1; $i < 101; $i++): ?>
                                        <option value="<?= $i ?> %"><?= $i ?> %</option>
                                    <?php endfor; ?>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="5" data-type="LLC_capital" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-7 pop-quiz" data-type-audit="official_income" style="display: none;">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Укажите год, когда пропал Ваш официальный источник дохода:</p>

                    <div style="margin: 0 auto; max-width: 366px; width: 100%; padding: 30px 5px 30px;">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 19px; color: #636363; padding-bottom: 5px;">Выберите год</p>
                        <select name="" id="" class="aninpt3 dropdown1 required-quiz-7 official_income_additional">
                            <?php $year = (int)date("Y"); ?>
                            <?php while($year !== 1959): ?>
                                <option value="<?= $year ?>"><?= $year-- ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="7" data-type="official_income" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-8 pop-quiz" data-type-audit="receivables" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию о дебиторской задолженности</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363; padding-bottom: 5px;">Должник</p>
                                    <select name="" id="" class="aninpt3 dropdown1 required-quiz-8 receivables_debtor" style="">
                                        <option value="Должник - физическое лицо">Должник - физическое лицо</option>
                                        <option value="Должник - государство" selected>Должник - государство</option>
                                        <option value="Должник - юридическое лицо">Должник - юридическое лицо</option>
                                    </select>
                                    <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                        <div>
                                            <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                        </div>
                                        <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" class="hov-gen append-additional-popup" data-curr="8" data-type="receivables">
                                            Добавить еще
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz-append-block-8 quiz-del-section" data-restore-type="receivables">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма </p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4 required-quiz-8 receivables_summ" name="" placeholder="500 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>
                                <input type="text" class="aninpt2 total_receivables" readonly placeholder="Общая сумма задолженности" style="margin: 10px 0;">
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="8" data-type="receivables" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-9-sob pop-quiz" data-type-audit="housing" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию о собственном жилье</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; color: #636363; padding-bottom: 5px;">Год приобретения</p>
                                    <select name="" id="" class="aninpt3 dropdown1 required-quiz-9 year_sob">
                                        <?php $year = (int)date("Y"); ?>
                                        <?php while($year !== 1959): ?>
                                            <option value="<?= $year ?>"><?= $year-- ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <div class="checkbox" style="outline: none !important;">
                                        <input type="checkbox" required name="polic" id="checkbox_100" style="" class="checks registered_sob">
                                        <label for="checkbox_100" style=" padding-left: 0" class="checksl">Прописан в этом жилье</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                                <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                        –
                                    </div>
                                    <div style="position: relative; z-index: 1; width: 100%;">
                                        <input type="text" class="aninpt4 required-quiz-9 price_sob" name="" placeholder="2 000 000" style="position: relative; z-index: 1;">
                                    </div>
                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                        +
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="9" data-type="housing" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
                <div class="pop5-quiz-9-aren pop-quiz" data-type-audit="housing" style="display: none">
                    <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-top: 30px">Добавьте информацию об арендованном жилье</p>
                    <div class="container" style="width: 100%;">
                        <div class="row row0">
                            <div class="col-sm-6">
                                <div>
                                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Арендная плата за месяц</p>
                                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="5000">
                                            –
                                        </div>
                                        <div style="position: relative; z-index: 1; width: 100%;">
                                            <input type="text" class="aninpt4 required-quiz-9 rent_aren" name="" placeholder="20 000" style="position: relative; z-index: 1;">
                                        </div>
                                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="5000">
                                            +
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>
                    <div class="flex mrg100" style="flex-flow: row wrap; margin-top: 5px;">
                        <div style="min-width: 50px;">
                            <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back">
                        </div>
                        <div style="order: 999; max-width: 340px;" data-curr="9" data-type="housing" class="next-go-popup">ДАЛЕЕ</div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-1" class="an-pop-over"> <!--STEP6-main-pop-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-bottom: 5px;">Выберите вид дохода</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%; padding: 50px 5px 50px;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px;">Вид дохода</p>
                    <select name="" id="choose-type-dohod" class="aninpt3 dropdown1">
                        <option value="" disabled selected>Выберите тип дохода</option>
                        <option value="Пенсия" >Пенсия</option>
                        <option value="Заработная плата (доход от ИП)">Заработная плата (доход от ИП)</option>
                        <option value="Получение алиментов">Получение алиментов</option>
                        <option value="Проценты по вкладам и ценным бумагам">Проценты по вкладам и ценным бумагам</option>
                        <option value="Иные выплаты">Иные выплаты</option>
                        <option value="Пособия на ребенка">Пособия на ребенка</option>
                        <option value="Пособия по инвалидности">Пособия по инвалидности</option>
                        <option value="Пособия по потере кормильца">Пособия по потере кормильца</option>
                    </select>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-2" class="an-pop-over"> <!--STEP6-pop2-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Пенсия</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода в месяц</p>
                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Пенсия" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" id="checkbox_101" style="" data-type="Пенсия" class="checks incoming_money_onCard">
                        <label for="checkbox_101" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Пенсия">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" data-type="Пенсия" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Пенсия" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-3" class="an-pop-over"> <!--STEP6-pop3-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Заработная плата (или доход от ИП)</p>
                <p style="font-family: Roboto;font-style: normal;font-weight: 300;font-size: 16px;line-height: 140%;text-align: center; margin-top: 15px; max-width: 600px; margin: 0 auto">Укажите официальные данные по 2-НДФЛ, если официальной заработной платы (дохода от ИП) у Вас нет - оставьте поле пустым</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода в месяц</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="10000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Заработная плата (доход от ИП)" placeholder="50 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="10000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" id="checkbox_104" style="" class="checks incoming_money_onCard" data-type="Заработная плата (доход от ИП)">
                        <label for="checkbox_104" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Заработная плата (доход от ИП)">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" data-type="Заработная плата (доход от ИП)" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Заработная плата (доход от ИП)" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-4" class="an-pop-over"> <!--STEP6-pop4-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Получение алиментов</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода в месяц</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Получение алиментов" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" id="checkbox_105" style="" data-type="Получение алиментов" class="checks incoming_money_onCard">
                        <label for="checkbox_105" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Получение алиментов">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" data-type="Получение алиментов" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Получение алиментов" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-5" class="an-pop-over"> <!--STEP6-pop5-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Пособия на ребенка</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Пособия на ребенка" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" id="checkbox_106" data-type="Пособия на ребенка" style="" class="checks incoming_money_onCard">
                        <label for="checkbox_106" style=" padding-left: 0"  class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Пособия на ребенка">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" data-type="Пособия на ребенка" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Пособия на ребенка" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-6" class="an-pop-over"> <!--STEP6-pop6-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Пособия по инвалидности</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Пособия по инвалидности" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" data-type="Пособия по инвалидности" id="checkbox_107" style="" class="checks incoming_money_onCard">
                        <label for="checkbox_107" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Пособия по инвалидности">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" name="" data-type="Пособия по инвалидности" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Пособия по инвалидности" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-7" class="an-pop-over"> <!--STEP6-pop7-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Пособия по потере кормильца</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" name="" data-type="Пособия по потере кормильца" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" data-type="Пособия по потере кормильца" id="checkbox_107333" style="" class="checks  incoming_money_onCard">
                        <label for="checkbox_107333" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Пособия по потере кормильца">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" class="aninpt2 incoming_money_bank" name="" data-type="Пособия по потере кормильца" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Пособия по потере кормильца" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-6-8" class="an-pop-over"> <!--STEP6-pop8-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Иные выплаты</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода</p>

                    <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Иные выплаты" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Укажите вид пособия</p>
                    <input type="text" class="aninpt2 incoming_money_description" data-type="Иные выплаты" placeholder="Введите вид пособия">
                    <div class="checkbox" style="outline: none !important;">
                        <input type="checkbox" required name="polic" data-type="Иные выплаты" id="checkbox_108" style="" class="checks incoming_money_onCard">
                        <label for="checkbox_108" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Иные выплаты">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input type="text" data-type="Иные выплаты" class="aninpt2 incoming_money_bank" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Иные выплаты" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="an-pop-over-6-9" class="an-pop-over"> <!--STEP6-pop9-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Проценты по вкладам и ценным бумагам</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 30px; padding-bottom: 5px;">Сумма дохода</p>

                    <div class="flex" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                        <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                            –
                        </div>
                        <div style="position: relative; z-index: 1; width: 100%;">
                            <input type="text" class="aninpt4 incoming_money_summ" data-type="Проценты по вкладам и ценным бумагам" name="" placeholder="10 000" style="position: relative; z-index: 1;">
                        </div>
                        <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                            +
                        </div>
                    </div>
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px; margin-top: 20px;">Вид</p>
                    <select data-type="Проценты по вкладам и ценным бумагам" name="" id="" class="aninpt3 dropdown1 incoming_money_description">
                        <option value="" selected hidden disabled>Выберете вид ценной бумаги</option>
                        <optgroup label="ОСНОВНЫЕ">
                            <option value="Векселя">Векселя</option>
                            <option value="Паи">Паи</option>
                            <option value="Акции">Акции</option>
                            <option value="Облигации">Облигации</option>
                        </optgroup>
                        <optgroup label="ПРОИЗВОДСТВЕННЫЕ">
                            <option value="Депозитарные расписки">Депозитарные расписки</option>
                            <option value="Варранты">Варранты</option>
                            <option value="Фьючерсы">Фьючерсы</option>
                            <option value="Опционы">Опционы</option>
                            <option value="Форварды">Форварды</option>
                        </optgroup>
                    </select>
                    <div class="checkbox" style="outline: none !important;">
                        <input data-type="Проценты по вкладам и ценным бумагам" type="checkbox" required name="polic" id="checkbox_109" style="" class="checks incoming_money_onCard">
                        <label for="checkbox_109" style=" padding-left: 0" class="checksl">Получаю на карту</label>
                    </div>
                    <div style="display: none" class="hidden-block-in-popup" data-type="Проценты по вкладам и ценным бумагам">
                        <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 10px;">Укажите банк</p>
                        <input data-type="Проценты по вкладам и ценным бумагам" type="text" class="aninpt2 incoming_money_bank" name="" placeholder="Введите название банка">
                    </div>
                </div>
                <div style="padding: 60px 5px 65px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-dohod" data-type="Проценты по вкладам и ценным бумагам" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="an-pop-over-7-1" class="an-pop-over"> <!--STEP7-pop1-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-bottom: 5px;">Вид имущества</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%; padding: 50px 5px 50px;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px;">Вид имущества</p>
                    <select name="" id="choose-type-property" class="aninpt3 dropdown1">
                        <option value="" disabled selected>Выберите вид имущества</option>
                        <option value="Квартира">Квартира</option>
                        <option value="Частный дом">Частный дом</option>
                        <option value="Земельный участок">Земельный участок</option>
                        <option value="Транспортное средство">Транспортное средство</option>
                        <option value="Ценные бумаги">Ценные бумаги</option>
                        <option value="Иное имущество">Иное имущество</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-2" class="an-pop-over"> <!--STEP7-pop2-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Квартира</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                                <select name="" id="" class="aninpt3 dropdown1 property_year" data-type="Квартира">
                                    <?php $year = (int)date("Y"); ?>
                                    <?php while($year !== 1959): ?>
                                        <option value="<?= $year ?>"><?= $year-- ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div class="one-more-property hov-gen" data-type="Квартира" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                                <div class="checkbox" style="outline: none !important;">
                                    <input type="checkbox" name="polic" id="checkbox_110ss" data-type="Квартира" style="" class="checks property_registered">
                                    <label for="checkbox_110ss" style=" padding-left: 0" class="checksl">Прописан в этом жилье</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" class="aninpt4 property_price" data-type="Квартира" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Квартира" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-3" class="an-pop-over"> <!--STEP7-pop3-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Частный дом</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                                <select name="" id="" data-type="Частный дом" class="aninpt3 dropdown1 property_year">
                                    <?php $year = (int)date("Y"); ?>
                                    <?php while($year !== 1959): ?>
                                        <option value="<?= $year ?>"><?= $year-- ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div data-type="Частный дом" class="one-more-property hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                                <div class="checkbox" style="outline: none !important;">
                                    <input type="checkbox" required name="polic" data-type="Частный дом" id="checkbox_110" style="" class="checks property_registered">
                                    <label for="checkbox_110" style=" padding-left: 0" class="checksl">Прописан в этом жилье</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Частный дом" class="aninpt4 property_price" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Частный дом" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-4" class="an-pop-over"> <!--STEP7-pop4-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Земельный участок</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                                <select data-type="Земельный участок" name="" id="" class="aninpt3 dropdown1 property_year">
                                    <?php $year = (int)date("Y"); ?>
                                    <?php while($year !== 1959): ?>
                                        <option value="<?= $year ?>"><?= $year-- ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div data-type="Земельный участок" class="one-more-property hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input data-type="Земельный участок" type="text" class="aninpt4 property_price" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Земельный участок"  style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-5" class="an-pop-over"> <!--STEP7-pop5-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Транспортное средство</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Вид транспортного средства</p>
                                <select name="" id="" data-type="Транспортное средство" class="aninpt3 dropdown1 property_type_auto">
                                    <option value="Автомобиль" selected>Автомобиль</option>
                                    <option value="Фургон">Фургон</option>
                                    <option value="Мототранспорт">Мототранспорт</option>
                                    <option value="Водный транспорт">Водный транспорт</option>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div data-type="Транспортное средство" class="one-more-property hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input data-type="Транспортное средство" type="text" class="aninpt4 property_price" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                            <select name="" data-type="Транспортное средство" id="" class="aninpt3 dropdown1 property_year">
                                <?php $year = (int)date("Y"); ?>
                                <?php while($year !== 1959): ?>
                                    <option value="<?= $year ?>"><?= $year-- ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Транспортное средство" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-6" class="an-pop-over"> <!--STEP7-pop6-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Ценные бумаги</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                                <select data-type="Ценные бумаги" name="" id="" class="aninpt3 dropdown1 property_year">
                                    <?php $year = (int)date("Y"); ?>
                                    <?php while($year !== 1959): ?>
                                        <option value="<?= $year ?>"><?= $year-- ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div data-type="Ценные бумаги" class="one-more-property hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px; margin-top: 20px">Вид</p>
                            <select name="" id="" data-type="Ценные бумаги" class="aninpt3 dropdown1 property_type_document">
                                <option value="" selected hidden disabled>Выберете вид ценной бумаги</option>
                                <optgroup label="ОСНОВНЫЕ">
                                    <option value="Векселя">Векселя</option>
                                    <option value="Паи">Паи</option>
                                    <option value="Акции">Акции</option>
                                    <option value="Облигации">Облигации</option>
                                </optgroup>
                                <optgroup label="ПРОИЗВОДСТВЕННЫЕ">
                                    <option value="Депозитарные расписки">Депозитарные расписки</option>
                                    <option value="Варранты">Варранты</option>
                                    <option value="Фьючерсы">Фьючерсы</option>
                                    <option value="Опционы">Опционы</option>
                                    <option value="Форварды">Форварды</option>
                                </optgroup>
                            </select>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Ценные бумаги" class="aninpt4 property_price" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Ценные бумаги" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-7-7" class="an-pop-over"> <!--STEP7-pop7-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Иное движимое и недвижимое имущество</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год приобретения</p>
                                <select name="" data-type="Иное имущество" id="" class="aninpt3 dropdown1 property_year">
                                    <?php $year = (int)date("Y"); ?>
                                    <?php while($year !== 1959): ?>
                                        <option value="<?= $year ?>"><?= $year-- ?></option>
                                    <?php endwhile; ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Рыночная стоимость на данный момент</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 420px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Иное имущество" class="aninpt4 property_price" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row row0">
                        <div class="col-sm-12">
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Примечание</p>
                            <input data-type="Иное имущество" type="text" class="aninpt2 property_commentary" placeholder="Например: коммерческая недвижимость, гараж и пр." style="width: 100%; max-width: none">
                            <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                <div>
                                    <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                </div>
                                <div data-type="Иное имущество" class="one-more-property hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                    Добавить еще
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-property-btn" data-type="Иное имущество" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-8-1" class="an-pop-over"> <!--STEP8-pop1-->
    <div class="an-flexpop">
        <div class="an-pop-special-new" style="max-width: 750px;">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center; padding-bottom: 5px;">Вид сделки</p>
                <div style="margin: 0 auto; max-width: 366px; width: 100%; padding: 50px 5px 50px;">
                    <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px;">Вид сделки</p>
                    <select name="" id="choose-deal-type" class="aninpt3 dropdown1">
                        <option value="" selected disabled>Выберите тип сделки</option>
                        <option value="Дарение">Дарение</option>
                        <option value="Продажа" >Продажа</option>
                        <option value="Покупка">Покупка</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-8-2" class="an-pop-over"> <!--STEP8-pop2-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Продажа</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Наименование имущества</p>
                                <select name="" id="" data-type="Продажа" class="aninpt3 dropdown1 deals_propertyType">
                                    <option value="Частный дом">Частный дом</option>
                                    <option value="Квартира" selected>Квартира</option>
                                    <option value="Ценные бумаги">Ценные бумаги</option>
                                    <option value="Земельный участок">Земельный участок</option>
                                    <option value="Транспортное средство">Транспортное средство</option>
                                    <option value="Иное имущество">Иное имущество</option>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div data-type="Продажа" class="one-more-deal hov-gen" style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма сделки</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Продажа" class="aninpt4 deals_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год сделки</p>
                            <select name="" id="" data-type="Продажа" class="aninpt3 dropdown1 deals_year">
                                <?php $year = (int)date("Y"); ?>
                                <?php while($year !== 1959): ?>
                                    <option value="<?= $year ?>"><?= $year-- ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-deals-btn" data-type="Продажа" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-8-3" class="an-pop-over"> <!--STEP8-pop3-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Дарение</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Наименование имущества</p>
                                <select name="" data-type="Дарение" id="" class="aninpt3 dropdown1 deals_propertyType">
                                    <option value="Частный дом">Частный дом</option>
                                    <option value="Квартира" selected>Квартира</option>
                                    <option value="Ценные бумаги">Ценные бумаги</option>
                                    <option value="Земельный участок">Земельный участок</option>
                                    <option value="Транспортное средство">Транспортное средство</option>
                                    <option value="Иное имущество">Иное имущество</option>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" data-type="Дарение" class="one-more-deal hov-gen">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма сделки</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Дарение" class="aninpt4 deals_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год сделки</p>
                            <select name="" id="" data-type="Дарение" class="aninpt3 dropdown1 deals_year">
                                <?php $year = (int)date("Y"); ?>
                                <?php while($year !== 1959): ?>
                                    <option value="<?= $year ?>"><?= $year-- ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-deals-btn" data-type="Дарение" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="an-pop-over-8-4" class="an-pop-over"> <!--STEP8-pop4-->
    <div class="an-flexpop">
        <div class="an-pop-special-new">
            <div class="ta-right" style="position: absolute; width: 100%">
                <div class="closing-tag">
                    +
                </div>
            </div>
            <div class="an-popsmall">
                <div style="min-width: 50px; padding-left: 20px">
                    <img src="<?= Url::to(['img/anketa/back.png']) ?>" alt="" class="str-back" style="margin-top: -25px;margin-left: -10px;">
                </div>
                <p style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #333333; text-align: center;">Покупка</p>
                <div class="container" style="width: 100%;">
                    <div class="row row0">
                        <div class="col-sm-6">
                            <div>
                                <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Наименование имущества</p>
                                <select name="" id="" data-type="Покупка" class="aninpt3 dropdown1 deals_propertyType">
                                    <option value="Частный дом">Частный дом</option>
                                    <option value="Квартира" selected>Квартира</option>
                                    <option value="Ценные бумаги">Ценные бумаги</option>
                                    <option value="Земельный участок">Земельный участок</option>
                                    <option value="Транспортное средство">Транспортное средство</option>
                                    <option value="Иное имущество">Иное имущество</option>
                                </select>
                                <div class="flex" style="margin-top: 3px; cursor: pointer;">
                                    <div>
                                        <img src="<?= Url::to(['img/anketa/plus.png']) ?>" alt="">
                                    </div>
                                    <div style="margin-left: 5px; font-weight: normal;font-size: 12px;line-height: 14px;/* identical to box height *//* текст */color: #979797;" data-type="Покупка" class="one-more-deal hov-gen">
                                        Добавить еще
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Сумма сделки</p>
                            <div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">
                                <div style="position: relative; z-index: 2;" class="minus click-inp-add" data-stp="100000">
                                    –
                                </div>
                                <div style="position: relative; z-index: 1; width: 100%;">
                                    <input type="text" data-type="Покупка" class="aninpt4 deals_summ" name="" placeholder="1 000 000" style="position: relative; z-index: 1;">
                                </div>
                                <div style="position: relative; z-index: 2; " class="plus click-inp-add" data-stp="100000">
                                    +
                                </div>
                            </div>
                            <p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; margin-top: 20px; padding-bottom: 5px">Год сделки</p>
                            <select name="" data-type="Покупка" id="" class="aninpt3 dropdown1 deals_year">
                                <?php $year = (int)date("Y"); ?>
                                <?php while($year !== 1959): ?>
                                    <option value="<?= $year ?>"><?= $year-- ?></option>
                                <?php endwhile; ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div style="padding: 48px 5px 48px; margin: 0 auto; width: 100%; max-width: 270px;">
                    <div class="an-show1 add-deals-btn" data-type="Покупка" style="text-align: center; border: none">ДОБАВИТЬ</div>
                </div>
            </div>
        </div>
    </div>
</div>