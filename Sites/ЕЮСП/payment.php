<!DOCTYPE html>
<html lang="ru">
<?php $page = "payment" ?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/payment.css">
<link rel="stylesheet" href="/css/main-mobile.css">

<title>Оплата</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="payment-banner inter">
            <div class="container">
                <h2 class="title">Оплата <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16" fill="none"
                        viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg>
                </h2>
                <h3 class="payment-banner__sub-title">Оплатить услуги вы можете любым удобным для Вас способом.
                    Заполните, пожалуйста, форму оплаты!
                </h3>
                <form name="TinkoffPayForm" action="" method="post" class="form pay" novalidate>
                    <div class="form__row">
                        <input autofocus oninput="validate(this)" type="text" name="fio" class="form-input"
                            placeholder="Имя" required minlength="2" maxlength="50">
                    </div>
                    <div class="form__row">
                        <input onchange="validate(this)" type="tel" name="phone" class="form-input phone"
                            placeholder="Номер телефона" required>
                    </div>
                    <div class="form__row">
                        <input oninput="validate(this)" type="number" name="amount" class="form-input"
                            placeholder="Сумма платежа" required step="any">
                    </div>
                    <button type="submit" class="button"><span>Оплатить </span> <svg xmlns="http://www.w3.org/2000/svg"
                            width="89" height="16" fill="none" viewBox="0 0 89 16">
                            <path fill="#0F73E7"
                                d="M88.707 8.707a1 1 0 0 0 0-1.414L82.343.929a1 1 0 1 0-1.414 1.414L86.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364ZM0 9h88V7H0v2Z" />
                        </svg>
                    </button>
                </form>
            </div>

        </section>
        <section class="faq inter gerb">
            <div class="container">
                <h3>Как оплатить?</h3>
                <div class="faq__list">
                    <div class="faq__item">
                        <span class="istok">01</span>
                        <div class="faq__item_content">
                            <p><strong>Наличным платежом</strong> с использованием Исполнителем бланков строгой
                                отчетности в одном из офисов</p>
                        </div>
                    </div>
                    <div class="faq__item">
                        <span class="istok">02</span>
                        <div class="faq__item_content">
                            <p>
                                Через систему <strong>онлайн-кассы</strong> на сайте путём внесения средств
                                с электронных счётов
                                на расчётный счёт Исполнителя и получения соответствующего уведомления.
                            </p>
                            <p>Для выбора оплаты услуги с помощью банковской карты на соответствующей странице
                                необходимо нажать <strong>кнопку Оплата заказа</strong> банковской картой. Оплата
                                происходит
                                через ПАО ПСБ с использованием банковских карт следующих платёжных систем:</p>
                            <ul>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" fill="none"
                                        viewBox="0 0 26 8">
                                        <path fill="#0F73E7"
                                            d="M25.354 4.354a.5.5 0 0 0 0-.708L22.172.464a.5.5 0 1 0-.707.708L24.293 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182ZM0 4.5h25v-1H0v1Z" />
                                    </svg>МИР</li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" fill="none"
                                        viewBox="0 0 26 8">
                                        <path fill="#0F73E7"
                                            d="M25.354 4.354a.5.5 0 0 0 0-.708L22.172.464a.5.5 0 1 0-.707.708L24.293 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182ZM0 4.5h25v-1H0v1Z" />
                                    </svg>VISA International</li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" fill="none"
                                        viewBox="0 0 26 8">
                                        <path fill="#0F73E7"
                                            d="M25.354 4.354a.5.5 0 0 0 0-.708L22.172.464a.5.5 0 1 0-.707.708L24.293 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182ZM0 4.5h25v-1H0v1Z" />
                                    </svg>Mastercard Worldwide</li>
                            </ul>
                        </div>
                    </div>
                    <div class="faq__item">
                        <span class="istok">03</span>
                        <div class="faq__item_content">
                            <p><strong>В рассрочку</strong> от компании до двух лет. Без процентов и переплат!</p>
                        </div>
                    </div>
                </div>
                <div class="faq__togglers">
                    <div class="faq__toggler active toggler">
                        <div class="faq__toggler_header">
                            <h4>Что делать, если оплата на сайте не проходит?</h4>
                            <div class="faq__toggler_svg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="none" viewBox="0 0 30 30">
                                    <path stroke="#0F73E7" stroke-width="1.5"
                                        d="M2.5 15c0-5.893 0-8.839 1.83-10.67C6.162 2.5 9.108 2.5 15 2.5s8.839 0 10.67 1.83C27.5 6.162 27.5 9.108 27.5 15s0 8.839-1.83 10.67C23.838 27.5 20.892 27.5 15 27.5s-8.839 0-10.67-1.83C2.5 23.838 2.5 20.892 2.5 15Z" />
                                    <path stroke="#0F73E7" stroke-linecap="round" stroke-width="1.5"
                                        d="M18.75 15H15m0 0h-3.75M15 15v-3.75M15 15v3.75" />
                                </svg></div>
                        </div>
                        <div class="faq__toggler_body">
                            <ul class="faq__toggler_body_list">
                                <li>
                                    <span>1</span>
                                    <div>
                                        <p>Первое, что нужно сделать: ознакомиться с подсказками, которые могут
                                            появиться на
                                            странице оплаты, вероятно, там указано, почему вы не можете оплатить.</p>
                                    </div>

                                </li>
                                <li>
                                    <span>2</span>
                                    <div>
                                        <p>Если информации недостаточно, вероятны следующие ошибки:</p>
                                        <ul>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>Данные карты введены некорректно</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>Истек срок действия карты</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>На карте недостаточно денег</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>Одноразовым паролем из смс не удалось подтвердить платеж</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>По Вашей карте установлен запрет на покупки в интернете</li>
                                        </ul>

                                    </div>
                                </li>
                                <li>
                                    <span>3</span>
                                    <div>
                                        <p>Если все корректно:</p>
                                        <ul>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>Попробуйте повторить платеж позже</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg>Позвоните в банк, выпустивший карту</li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="26" height="4"
                                                    fill="none" viewBox="0 0 26 4">
                                                    <path fill="#1B2026"
                                                        d="M25.177 2.177a.25.25 0 0 0 0-.354L23.586.233a.25.25 0 0 0-.354.353L24.646 2l-1.414 1.414a.25.25 0 0 0 .354.354l1.59-1.591ZM0 2.25h25v-.5H0v.5Z" />
                                                </svg> Попробуйте использовать другую карту для оплаты</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span>4</span>
                                    <div>
                                        <p> В случае, если вышеперечисленное не помогло, обратитесь по номеру,
                                            указанному на нашем
                                            сайте.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="faq__toggler toggler">
                        <div class="faq__toggler_header">
                            <h4>Условия возврата</h4>
                            <div class="faq__toggler_svg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="none" viewBox="0 0 30 30">
                                    <path stroke="#0F73E7" stroke-width="1.5"
                                        d="M2.5 15c0-5.893 0-8.839 1.83-10.67C6.162 2.5 9.108 2.5 15 2.5s8.839 0 10.67 1.83C27.5 6.162 27.5 9.108 27.5 15s0 8.839-1.83 10.67C23.838 27.5 20.892 27.5 15 27.5s-8.839 0-10.67-1.83C2.5 23.838 2.5 20.892 2.5 15Z" />
                                    <path stroke="#0F73E7" stroke-linecap="round" stroke-width="1.5"
                                        d="M18.75 15H15m0 0h-3.75M15 15v-3.75M15 15v3.75" />
                                </svg></div>
                        </div>
                        <div class="faq__toggler_body">

                            <p>В случае отказа Арбитражного Суда в принятии заявления о несостоятельности (банкротстве)
                                к производству или прекращении производства по делу о несостоятельности (банкротстве)
                                Заказчика, и возвращения заявления с документами по причинам нарушений, допущенных
                                Исполнителем при подготовке документов и представления интересов Заказчика в Арбитражном
                                Суде, по ведению гражданских дел связанных с банкротством Заказчика, Заказчик в вправе
                                потребовать от Исполнителя возврата денежных сумм, уплаченных Исполнителю в качестве
                                вознаграждения на оказание юридических услуг в полном объёме за весь период
                                обслуживания.
                            </p>
                            <p>Чтобы вернуть денежные средства в случае отказа Арбитражного Суда в принятии заявления о
                                несостоятельности (банкротстве) к производству или прекращении производства по делу о
                                несостоятельности (банкротстве) Заказчика, и возвращения заявления с документами по
                                причинам нарушений, допущенных Исполнителем при подготовке документов и представления
                                интересов Заказчика в Арбитражном Суде, по ведению гражданских дел связанных с
                                банкротством Заказчика, Заказчик предоставляет заявление с указанием суммы к возврату с
                                приложением чеков, подтверждающих факты оплаты услуг Исполнителя, причины возврата,
                                реквизитов счета Заказчика в один из офисов (ссылка на список офисов) или Почтой России
                                по адресу: 620062, г. Екатеринбург проспект Ленина 97А офис 323. Возврат денежных
                                средств производится в течение 5-30 рабочих дней с даты обращения Заказчика с
                                заявлением, содержащим все необходимые данные (срок зависит от банка, который выдал вашу
                                банковскую карту).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <div class="modal payment-modal inter">
        <div class="modal__content">
            <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path class="close" stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="m5 5 14 14M5 19 19 5" />
            </svg>
            <form method="post" action="/backend/pay.php">
                <h2 class="modal__title">Выберите способ оплаты:</h2>
                <div class="radios">
                    <label class="custom-checkbox">
                        <input checked type="radio" name="message[Способ оплаты]" value="Через СБП">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">Через СБП</span>
                    </label>
                    <label class="custom-checkbox">
                        <input type="radio" name="message[Способ оплаты]" value="По номеру карты">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">По номеру карты</span>
                    </label>
                </div>
                <input type="hidden" name="fio">
                <input type="hidden" name="phone">
                <input type="hidden" name="message[Сумма платежа]">
                <button class="button pay"><span class="close">Оплатить</span>
                    <svg class="close" xmlns="http://www.w3.org/2000/svg" width="57" height="12" fill="none"
                        viewBox="0 0 57 12">
                        <path fill="var(--primary)"
                            d="M56.53 6.53a.75.75 0 0 0 0-1.06L51.757.697a.75.75 0 0 0-1.06 1.06L54.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06L56.53 6.53ZM0 6.75h56v-1.5H0v1.5Z" />
                    </svg>
                </button>
            </form>

        </div>
    </div>
    <div class="modal qr-modal inter">
    <div class="modal__content">
        <svg class="modal__close close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path class="close" stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="m5 5 14 14M5 19 19 5" />
        </svg>
        <h2 class="modal__title">Для оплаты по Системе Быстрых Платежей <br> отсканируйте QR-код</h2>
        <img src="<?= $_GET['qr']?>" alt="qr-code">
        <button class="button promo__button close"><span class="close">Закрыть</span>
            <svg class="close" xmlns="http://www.w3.org/2000/svg" width="57" height="12" fill="none"
                viewBox="0 0 57 12">
                <path fill="var(--primary)"
                    d="M56.53 6.53a.75.75 0 0 0 0-1.06L51.757.697a.75.75 0 0 0-1.06 1.06L54.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06L56.53 6.53ZM0 6.75h56v-1.5H0v1.5Z" />
            </svg>
        </button>
    </div>
</div>
    <script src="/js/pay.js"></script>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const responseValue = urlParams.get('response');
    const qrValue = urlParams.get('qr');
    if (responseValue) {
        openModal(document.querySelector(`.${responseValue}-modal`));
    }
    if (qrValue) {
        openModal(document.querySelector(".qr-modal"));
    }
</script>
</body>


</html>