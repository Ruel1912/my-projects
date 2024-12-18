<?php

use yii\helpers\Url;

Yii::$app->name = "Популярные вопросы";
$this->registerCssFile("@web/css/faq.css");
?>

<section class="faq">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/faq"]) ?>">/ Популярные вопросы</a>
        </nav>
        <h2 class="faq__title title">Популярные вопросы</h2>
        <div class="faq__accordions">
            <div class="accordion active">
                <div class="accordion__header">
                    <p class="accordion__title">Кто может признать себя банкротом?</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Имеете задолженность по кредиту?<br>
                    Продолжаете оплачивать свои счета, но долг не просто не уменьшается, но и продолжает расти?<br>
                    Исправно платили кредиты, но сложная финансовая ситуация больше не позволяет этого делать?<br>
                    Банк продал долг коллекторам?<br>
                    С 1 октября 2015 года любой гражданин Российской Федерации, который не в силах исполнять свои долговые обязательства, на законных основаниях может признать себя банкротом.
                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Как признать себя банкротом физическому лицу в 2023 году?
                    </p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Сначала проверить исполнительные производства на сайте ФССП. Дела должны быть окончены по п. 4 ч. 1 ст. 46 № 229-ФЗ. У вас должно быть Постановление об окончании исполнительного производства в связи с отсутствие имущества. Если нет — получите у пристава, чтобы проверить актуальность информации.<br><br>Размер долга не меньше 50 000 и не больше 500 000 рублей.<br><br>Вы не подавали на банкротство в другие МФЦ или в Арбитражный суд.
                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Что будет, если ничего не предпринимать?</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Если ничего не предпринимать, все долги в итоге окажутся у судебных приставов, которые по закону выполняют следующие действия:
                    <br>
                    <br>
                    Арестовывают на сумму долга все счета и вклады должника;
                    Запрещают регистрационные действия с имуществом должника (транспортные средства, недвижимость);
                    <br>
                    <br>
                    Запрещают должнику выезд за границу России;
                    Взыскивают долг с заработной платы должника;
                    Выходят в адрес должника и описывают его имущество;
                    Арестовывают имущество и продают на торгах. В случае смерти должника его долги переходят наследникам.
                    <br>
                    <br>
                    У судебных приставов много полномочий, но если должник официально не работает и имущества у него нет, то, конечно, пристав долг исполнить не сможет.
                    <br>
                    <br>
                    Исполнительное производство в таком случае подлежит прекращению в связи с невозможностью взыскания, но долг остаётся. По первому заявлению кредитора исполнительное производство начинается с самого начала. Так может повторяться всю жизнь.
                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Особенности списания долгов</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Внесудебное банкротство физических лиц в МФЦ – это бесплатная процедура.
                    Провести её намного проще по сравнению с вариантом через суд, но и сумма долга в любом случае будет ограничена, поэтому более 500 000 рублей списать не получится. Процедура внесудебного банкротства физического лица действует с 1 сентября 2021 года. Это очень важное новшество, которое рассчитанно на обычных людей, оказавшихся в сложной финансовой ситуации в новых реалиях.
                    <br>
                    Так как процедура не требует обращения в суд и оплаты пошлины, то она позволит сэкономить время и нервы гражданина. Кроме того, для проведения внесудебного банкротства физических лиц через МФЦ нужен неполный набор документов.
                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Как долго длится процедура?</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Как долго длится процедура банкротства
                    На законодательном уровне сроки не предусмотрены, длительность процесса зависит от ситуации. Он может занять от нескольких месяцев до нескольких лет. Длительность процедуры во многом зависит от правильности поданных документов, именно поэтому этим вопросом должен заниматься специалист.
                    <br><br>
                    Суд обязан рассмотреть вашу заявку в течение 90 дней. Арбитражный управляющий начинает свою работу после первого судебного заседания, на котором была инициирована процедура признания вашей несостоятельности.
                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Последствия признания банкротом</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Последствия признания банкротом
                    Запрет занимать должность директора организации в течение 3 лет. <br>
                    Запрет занимать руководящую должность в МФО в течение 5 лет и в банке – в течение 10 лет. <br>
                    Запрет на признание себя повторно банкротом в ближайшие 5 лет. <br>
                    Помните, что даже если суд признает вас банкротом, но не даст разрешение на списание долгов, то в любом случае сумма задолженности «заморозится» и не будет расти, что избавит вас от необходимости уплаты процентов и штрафных санкций.                </div>
            </div>
            <div class="accordion">
                <div class="accordion__header">
                    <p class="accordion__title">Банкротство - простое решение сложных проблем</p>
                    <div class="accordion__arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.53003 5.15967L5.00003 1.63967L1.47003 5.15967" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    Позитивный результат признания гражданина несостоятельным очевиден. Однако многие компании скрывают от своих клиентов тот факт, что процедура имеет и свои минусы. Мы же честно о них расскажем:
                    <br><br>
                    На время процедуры суд может наложить запрет на выезд за пределы РФ. На практике это случается крайне редко.
                    <br><br>
                    Когда идет внесудебное банкротство, человек не может брать кредиты, давать поручительство. В эти полгода кредиторы вправе делать запросы в госорганы без согласия должника: искать спрятанное имущество, проверять общее и долевое, которое записано на супруга.
                    <br><br>
                    Если банк найдет имущество для продажи, он подаст возражения в Арбитраж. По законным возражениям суд прекратит досудебное банкротство через МФЦ и введет процедуру реструктуризации или обычного (платного) банкротства физического лица.
                    <br><br>
                    В течение 10 лет невозможно прибегнуть к процедуре вновь.
                    <br><br>
                    После решения суда невозможно в течение 3 лет заниматься предпринимательской деятельностью и/или занимать руководящие посты в организациях.
                    <br><br>
                    Оставьте заявку на бесплатную консультацию и узнайте, как это сделать.               </div>
            </div>
        </div>
    </div>
</section>
