<header class="header" id="header">
    <div class="container">
        <nav class="header__nav">
            <div class="header__logo logo"><a href="/"><img src="/images/Logo.svg"
                        alt="Единая юридическая служба помощи"></a></div>
            <div class="header__tel">
                <a href="tel:+7 (812) 507-66-07">+7 (812) 507-66-07</a>
                <a href="tel:+7 (818) 245-74-64">+7 (818) 245-74-64</a>
                <a href="tel:+7 (911) 554-28-28">+7 (911) 554-28-28</a>


            </div>
            <ul class="header__list inter">
                <li class="header__item"><a class="header__link <?= $page == "home" ? "active" : "" ?>"
                        href="index.php#features">О нас</a></li>
                <li class="header__item toggler">
                    <div class="toggler-header">
                        <a class="header__link <?= $page == "service" ? "active" : "" ?>"
                            href="javascript:void(0)">Услуги
                        </a> <svg class="header__arrow" xmlns="http://www.w3.org/2000/svg" width="13" height="12"
                            fill="none" viewBox="0 0 13 12">
                            <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                d="m2.01 4 4.02 4 4.02-4" />
                        </svg>
                    </div>
                    <ul class="header-list_inner service-list_inner toggler-content istok">
                        <li class="header__item">
                            <a href="consult.php">Консультация</a>
                        </li>
                        <li class="header__item">
                            <a class="<?= $_SERVER['PHP_SELF'] == '/crash.php' ? 'anchor' : '' ?>"
                                href="<?= $_SERVER['PHP_SELF'] == '/crash.php' ? '#jud' : 'crash.php#jud' ?>">Судебное
                                банкротство</a>
                        </li>
                        <li class="header__item">
                            <a class="<?= $_SERVER['PHP_SELF'] == '/crash.php' ? 'anchor' : '' ?>"
                                href="<?= $_SERVER['PHP_SELF'] == '/crash.php' ? '#mfc' : 'crash.php#mfc' ?>">Упрощенное
                                банкротство через МФЦ</a>
                        </li>
                        <li class="header__item">
                            <a href="dolgi.php">Оптимизация задолженности</a>
                        </li>
                        <li class="header__item service-inner">
                            <div class="service-inner-header">
                                <a class="" href="javascript:void(0)">Услуги по гражданскому праву </a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"
                                    viewBox="0 0 12 12">
                                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                        d="m4 2 4 4-4 4" />
                                </svg>
                            </div>
                            <ul class="header-list_inner right-list_inner istok">
                                <li class="header__item">
                                    <a class="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? 'anchor filter__item' : '' ?>"
                                        href="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? '#civil' : 'civil-law.php#civil' ?>">Гражданское
                                        право</a>
                                </li>
                                <li class="header__item">
                                    <a class="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? 'anchor filter__item' : '' ?>"
                                        href="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? '#housing' : 'civil-law.php#housing' ?>">
                                        Жилищное право</a>
                                </li>
                                <li class="header__item">
                                    <a class="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? 'anchor filter__item' : '' ?>"
                                        href="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? '#pension' : 'civil-law.php#pension' ?>">
                                        Пенсионное право</a>
                                </li>
                                <li class="header__item">
                                    <a class="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? 'anchor filter__item' : '' ?>"
                                        href="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? '#family' : 'civil-law.php#family' ?>">
                                        Семейное право</a>
                                </li>
                                <li class="header__item">
                                    <a class="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? 'anchor filter__item' : '' ?>"
                                        href="<?= $_SERVER['PHP_SELF'] == '/civil-law.php' ? '#labor' : 'civil-law.php#labor' ?>">
                                        Трудовое право</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="header__item"><a class="header__link <?= $page == "result" ? "active" : "" ?>"
                        href="results.php">Наши результаты</a></li>
                <li class="header__item"><a class="header__link <?= $page == "payment" ? "active" : "" ?>"
                        href="payment.php">Оплата</a></li>
                <li class="header__item"><a class="header__link <?= $page == "contact" ? "active" : "" ?>"
                        href="contact.php">Контакты</a></li>
                <li class="header__item"><a class="header__link <?= $page == "info" ? "active" : "" ?>"
                        href="info.php">Полезная информация</a></li>
                <div class="close-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 36 36">
                        <path stroke="#F4F9FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="m7.5 7.5 21 21m-21 0 21-21" />
                    </svg>
                </div>
            </ul>
            <div class="burger"><span></span> <span></span> <span></span></div>
        </nav>

    </div>
</header>