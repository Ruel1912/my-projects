<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\models\Articles;
use backend\models\UserModel;
use backend\models\UserPayments;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
$params = [];
foreach ($_GET as $key => $item)
    $params[$key] = htmlspecialchars($item);
$js =<<< JS
    $('input, radio').styler({});
    $('input, checkbox').styler({});
JS;
$this->registerJs($js);
$id = Yii::$app->getUser()->getId();
$user = UserModel::findOne(['id' => $id]);
$articles = Articles::find()->orderBy(['date' => SORT_DESC])->limit(5)->asArray()->all();
$datePayments = UserPayments::find()->where(['user_id' => $id, 'status' => 0])->andWhere('CURDATE() > date_exp')->orderBy('id desc')->one();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:regular,italic,700,700italic" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:200,300,regular,500,600,700,900"
        rel="stylesheet" />
    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=longlat&amp;apikey=bbca1236-7429-44c5-b54e-add0f752bab5"
        type="text/javascript"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
            k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(85901036, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/85901036" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="header">
            <div class="header_top">
                <div class="container">
                    <div class="header_top_wrapper">
                        <div class="header_top_left">
                            <a class="header_top_left-logo" href="<?= Url::to(['/']) ?>">
                                <img class="header_top_left-logo-image" src="<?= Url::to(['img/logo.svg']) ?>"
                                    alt="logo">
                                <img class="header_top_left-logo-image" src="<?= Url::to(['img/logo-dark.svg']) ?>"
                                    alt="logo">
                            </a>
                        </div>
                        <nav class="header_bottom_navigation">
                            <a class="header_bottom_navigation-lunk" href="#about">О нас</a>
                            <a class="header_bottom_navigation-lunk" href="#services">Услуги</a>
                            <a class="header_bottom_navigation-lunk" href="#why-we">Почему мы</a>
                            <a class="header_bottom_navigation-lunk" href="#stages">Этапы работы</a>
                            <a class="header_bottom_navigation-lunk" href="#results">Наши
                                результаты</a>
                            <a class="header_bottom_navigation-lunk" href="#reviews">Отзывы</a>
                            <a class="header_bottom_navigation-lunk" href="#team">Наша команда</a>
                        </nav>
                        <div class="header_top_right">
                            <?php if (Yii::$app->getUser()->isGuest): ?>
                            <a class="header_top_right_link open-modal" data-modal="login"
                                href="<?= Url::to(['login']) ?>"><svg width="21" height="23" viewBox="0 0 21 23"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 22C20 20.3718 20 19.5578 19.7955 18.8953C19.335 17.4039 18.147 16.2367 16.6289 15.7843C15.9546 15.5833 15.126 15.5833 13.4687 15.5833H7.53126C5.87402 15.5833 5.0454 15.5833 4.37114 15.7843C2.85304 16.2367 1.66505 17.4039 1.20453 18.8953C1 19.5578 1 20.3718 1 22M15.8438 6.25C15.8438 9.14949 13.4513 11.5 10.5 11.5C7.54873 11.5 5.15625 9.14949 5.15625 6.25C5.15625 3.3505 7.54873 1 10.5 1C13.4513 1 15.8438 3.3505 15.8438 6.25Z"
                                        stroke="white" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Войти</a>
                            <a class="header_top_right_link open-modal" data-modal="register"
                                href="<?= Url::to(['signin']) ?>">/Регистрация</a>
                            <?php else: ?>
                            <div class="cabinet_header-usename-wrappper">
                                <!-- Для красного колокольчика добавть кнопке класс 'red' -->
                                <button type="button"
                                    class="btn cabinet_header-usename <?= !empty($datePayments) ? 'red' : '' ?>"
                                    name="username">
                                    <p><?= $user->fio ?></p>
                                </button>
                                <ul class="cabinet_header-usename_spoiler">
                                    <li class="cabinet_header-usename_spoiler-item">
                                        <a href="<?= Url::to(['/cabinet/staps']) ?>">Этапы
                                            процедуры</a>
                                    </li>
                                    <li class="cabinet_header-usename_spoiler-item">
                                        <a href="<?= Url::to(['/cabinet']) ?>">Мой профиль</a>
                                    </li>
                                    <li class="cabinet_header-usename_spoiler-item">
                                        <a href="<?= Url::to(['/cabinet/help']) ?>">Тех.поддержка</a>
                                    </li>
                                    <li class="cabinet_header-usename_spoiler-item">
                                        <a href="<?= Url::to(['/site/logout']) ?>">Выход</a>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="BurgerBTN">
                            <div class="BurgerBTN_wrap">
                                <div class="BurgerBTN_string"></div>
                                <div class="BurgerBTN_string"></div>
                                <div class="BurgerBTN_string"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="PopupBack"></div>
        <?= Html::beginForm([' '], 'post', ['enctype' => 'multipart/form-data', 'class' => 'PopupForm']) ?>
        <div class="PopupWrap">
            <section class="Popup">
                <button class="PopupClose">
                    <img src="<?= Url::to(['img/close.svg']) ?>" alt="close">
                </button>

                <div class="Popup_Staps Popup_Stap1">
                    <div class="Popup_Staps_content">
                        <h2 class="Popup_Staps-title">Укажите ваши данные для связи и получите консультацию юриста</h2>
                        <div class="orderpage_inpgroup">
                            <input class="InputT" required placeholder="Ваше имя" minlength="2" type="text" name="fio">
                            <input class="InputT" required placeholder="Номер телефона" type="tel" name="phone">
                        </div>
                        <button type="submit" class="orderpage_btn btn btn--blue">
                            Заказать обратный звонок
                        </button>
                        <p class="descriptoin">*отправляя формы на данном сайте, вы даете <a target="_blank"
                                class="link link--gray" href="<?= Url::to(['']) ?>">согласие на обработку персональных
                                данных</a> в соответствии с 152-ФЗ</p>
                    </div>
                </div>

                <div class="Popup_Staps Popup_Stap2">
                    <div class="Popup_Staps_content">
                        <h2 class="Popup_Staps-title">Спасибо за заявку!</h2>
                        <h3 class="Popup_Staps-subtitle">Ожидайте звонка нашего юриста в течение 3 минут с номера</h3>
                        <p class="Popup_Staps-phone">+7 (495) 230-51-10</p>
                    </div>
                </div>
            </section>
        </div>
        <?= Html::endForm() ?>

        <div class="BurgerBack"></div>
        <nav class="BurgerMenu">
            <img class="BurgerMenuClose" src="<?= Url::to(['img/close.svg']) ?>" alt="close">
            <div class="container">
                <div class="BurgerMenu_wrapper">
                    <div class="BurgerMenu_bottom">
                        <a class="header_bottom_navigation-lunk" href="#about">О нас</a>
                        <a class="header_bottom_navigation-lunk" href="#services">Услуги</a>
                        <a class="header_bottom_navigation-lunk" href="#why-we">Почему мы</a>
                        <a class="header_bottom_navigation-lunk" href="#stages">Этапы работы</a>
                        <a class="header_bottom_navigation-lunk" href="#results">Наши
                            результаты</a>
                        <a class="header_bottom_navigation-lunk" href="#reviews">Отзывы</a>
                        <a class="header_bottom_navigation-lunk" href="#team">Наша команда</a>
                    </div>

                    <div class="BurgerMenu_bottom2">
                        <?php if (Yii::$app->getUser()->isGuest): ?>
                        <a class="header_top_right_link open-modal" data-modal="login" href="<?= Url::to(['login']) ?>">
                            Войти</a>
                        <a class="header_top_right_link open-modal" data-modal="register"
                            href="<?= Url::to(['signin']) ?>">Регистрация</a>
                        <?php else: ?>
                        <a class="header_top_right_link" href="<?= Url::to(['/cabinet']) ?>">Личный кабинет</a>
                        <a class="header_top_right_link" href="<?= Url::to(['logout']) ?>">Выход</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </nav>

        <main class="main">
            <?= $content ?>
        </main>

        <footer class="footer">
            <div class="container">
                <div class="footer_wrapper">
                    <div class="footer_left">
                        <a class="header_top_left-logo" href="<?= Url::to(['/']) ?>">
                            <img class="header_top_left-logo-image" src="<?= Url::to(['img/logo-footer.svg']) ?>"
                                alt="logo">
                        </a>
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" fill="none"
                                viewBox="0 0 19 24">
                                <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.5 12.346c1.76 0 3.188-1.41 3.188-3.15S11.26 6.046 9.5 6.046c-1.76 0-3.188 1.41-3.188 3.15s1.428 3.15 3.188 3.15Z" />
                                <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.5 22.321c2.125-4.2 8.5-6.91 8.5-12.6 0-4.639-3.806-8.4-8.5-8.4S1 5.082 1 9.721c0 5.69 6.375 8.4 8.5 12.6Z" />
                            </svg>Адрес: <span>г.Липецк, ул Водопьянова 21В, офис 207</span></p>
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none"
                                viewBox="0 0 22 23">
                                <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M6.86 8.092a15.698 15.698 0 0 0 3.059 4.31 15.7 15.7 0 0 0 4.31 3.06c.134.065.201.097.286.121.301.088.671.025.927-.158.072-.051.133-.113.256-.235.376-.376.564-.564.753-.687a2.15 2.15 0 0 1 2.343 0c.19.123.377.31.753.687l.21.21c.57.57.856.856 1.012 1.163a2.15 2.15 0 0 1 0 1.94c-.156.307-.441.593-1.012 1.164l-.17.17c-.57.569-.854.854-1.241 1.071a3.63 3.63 0 0 1-1.589.413c-.444-.001-.747-.087-1.354-.26a20.465 20.465 0 0 1-8.905-5.238A20.465 20.465 0 0 1 1.26 6.918C1.087 6.312 1 6.008 1 5.564a3.63 3.63 0 0 1 .413-1.589c.218-.387.502-.671 1.072-1.24l.17-.17c.57-.571.856-.857 1.163-1.012a2.15 2.15 0 0 1 1.94 0c.307.155.593.44 1.164 1.012l.21.21c.375.375.563.563.686.752a2.15 2.15 0 0 1 0 2.344c-.123.189-.31.377-.686.752-.123.123-.185.185-.236.257a1.124 1.124 0 0 0-.158.926c.025.085.057.152.121.286Z" />
                            </svg>Телефон: <span><a href="tel:+7 901 234 56 78">+7 901 234 56 78</a></span></p>
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" fill="none"
                                viewBox="0 0 20 19">
                                <path stroke="#222" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="m1 4.321 7.348 5.716c.595.463.893.694 1.217.784.286.079.585.079.87 0 .324-.09.621-.321 1.217-.784L19 4.32m-13.68 13h9.36c1.512 0 2.268 0 2.846-.327a2.868 2.868 0 0 0 1.18-1.31C19 15.04 19 14.2 19 12.52v-6.4c0-1.68 0-2.52-.294-3.162a2.868 2.868 0 0 0-1.18-1.31c-.578-.328-1.334-.328-2.846-.328H5.32c-1.512 0-2.268 0-2.846.327a2.868 2.868 0 0 0-1.18 1.311C1 3.601 1 4.441 1 6.121v6.4c0 1.68 0 2.52.294 3.162a2.869 2.869 0 0 0 1.18 1.311c.578.327 1.334.327 2.846.327Z" />
                            </svg>Электронная почта: <span><a href="mailto:mane05@mail.ru">mane05@mail.ru</a></span></p>

                    </div>
                    <div class="footer_center">
                        <nav class="footer_center_navigation">
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk" href="#about">О
                                нас</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk" href="#results">Наши
                                результаты</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk"
                                href="#services">Услуги</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk"
                                href="#reviews">Отзывы</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk" href="#why-we">Почему
                                мы</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk" href="#team">Наша
                                команда</a>
                            <a class="footer_center_navigation-lunk header_bottom_navigation-lunk" href="#stages">Этапы
                                работы</a>
                        </nav>
                    </div>
                    <div class="footer_right">
                        <div class="header_top_right">
                            <?php if (Yii::$app->getUser()->isGuest): ?>
                            <a class="header_top_right_link open-modal" data-modal="login"
                                href="<?= Url::to(['login']) ?>"><svg width="21" height="23" viewBox="0 0 21 23"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 22C20 20.3718 20 19.5578 19.7955 18.8953C19.335 17.4039 18.147 16.2367 16.6289 15.7843C15.9546 15.5833 15.126 15.5833 13.4687 15.5833H7.53126C5.87402 15.5833 5.0454 15.5833 4.37114 15.7843C2.85304 16.2367 1.66505 17.4039 1.20453 18.8953C1 19.5578 1 20.3718 1 22M15.8438 6.25C15.8438 9.14949 13.4513 11.5 10.5 11.5C7.54873 11.5 5.15625 9.14949 5.15625 6.25C5.15625 3.3505 7.54873 1 10.5 1C13.4513 1 15.8438 3.3505 15.8438 6.25Z"
                                        stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Войти</a>
                            <a class="header_top_right_link open-modal" data-modal="register"
                                href="<?= Url::to(['signin']) ?>">/Регистрация</a>
                            <?php endif; ?>
                        </div>
                        <a class="footer_right_document" href="<?= Url::to(['/policy.html']) ?>">Политика
                            конфиденциальности</a>
                        <!-- <a class="footer_right_document" href="<?= Url::to(['/policy.html']) ?>">Договор оферты</a> -->
                        <div class="socials">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    viewBox="0 0 18 18">
                                    <path fill="#9F9F9F"
                                        d="M8.77 17.863A8.77 8.77 0 1 0 8.77.32a8.77 8.77 0 0 0 0 17.542Z" />
                                    <path fill="#fff"
                                        d="M3.76 8.9s4.344-1.848 5.85-2.499c.578-.26 2.537-1.093 2.537-1.093s.904-.365.828.52c-.025.365-.226 1.64-.427 3.02l-.627 4.087s-.05.6-.478.703c-.426.104-1.13-.364-1.255-.468-.1-.078-1.884-1.25-2.537-1.823-.175-.156-.376-.468.026-.833a97.531 97.531 0 0 0 2.636-2.603c.302-.312.603-1.041-.653-.156-1.783 1.275-3.54 2.473-3.54 2.473s-.402.26-1.156.026c-.753-.234-1.632-.547-1.632-.547s-.603-.39.427-.807Z" />
                                </svg></a>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    viewBox="0 0 18 18">
                                    <path fill="#9F9F9F"
                                        d="m.689 17.336 1.21-4.499a8.312 8.312 0 0 1 2.25-10.681 8.367 8.367 0 0 1 10.92.705 8.316 8.316 0 0 1 .848 10.882 8.354 8.354 0 0 1-4.895 3.177 8.371 8.371 0 0 1-5.784-.797L.689 17.336Zm4.767-2.896.281.166a6.764 6.764 0 0 0 8.176-.992 6.719 6.719 0 0 0 1.129-8.137 6.745 6.745 0 0 0-3.259-2.875 6.767 6.767 0 0 0-7.959 2.113 6.722 6.722 0 0 0-1.395 4.11 6.645 6.645 0 0 0 .987 3.49l.176.29-.677 2.51 2.54-.675Z" />
                                    <path fill="#9F9F9F" fill-rule="evenodd"
                                        d="M12.282 9.98a1.393 1.393 0 0 0-1.191-.27c-.31.128-.51.612-.71.855a.295.295 0 0 1-.382.086A5.397 5.397 0 0 1 7.3 8.344a.323.323 0 0 1 .043-.447c.223-.22.387-.493.476-.794a1.727 1.727 0 0 0-.219-.95 2.225 2.225 0 0 0-.69-1.043.956.956 0 0 0-1.025.157 2.102 2.102 0 0 0-.73 1.664c.001.177.024.352.067.523.11.411.281.804.505 1.165.162.277.339.546.53.804a8.12 8.12 0 0 0 2.293 2.12c.449.281.929.51 1.43.68.52.236 1.095.326 1.663.262a2.001 2.001 0 0 0 1.507-1.117.95.95 0 0 0 .072-.571c-.086-.395-.615-.628-.94-.818Z"
                                        clip-rule="evenodd" />
                                </svg></a>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="27" height="16" fill="none"
                                    viewBox="0 0 27 16">
                                    <path fill="#9F9F9F" fill-rule="evenodd"
                                        d="M26.399 1.573c.182-.563 0-.976-.867-.976h-2.867c-.73 0-1.066.357-1.248.75 0 0-1.458 3.292-3.523 5.43-.668.618-.972.815-1.337.815-.182 0-.446-.197-.446-.76v-5.26c0-.674-.211-.975-.819-.975h-4.505c-.456 0-.73.313-.73.61 0 .64 1.033.788 1.14 2.588v3.91c0 .857-.168 1.013-.532 1.013-.972 0-3.336-3.306-4.739-7.09-.274-.733-.55-1.03-1.283-1.03H1.776c-.82 0-.983.357-.983.75 0 .704.972 4.192 4.526 8.805 2.369 3.15 5.707 4.859 8.744 4.859 1.823 0 2.048-.38 2.048-1.033v-2.381c0-.759.173-.91.75-.91.425 0 1.154.197 2.855 1.716 1.944 1.8 2.265 2.607 3.358 2.607h2.867c.82 0 1.229-.379.993-1.127-.259-.746-1.187-1.829-2.419-3.112-.668-.731-1.67-1.519-1.974-1.913-.425-.506-.304-.731 0-1.181 0 0 3.493-4.557 3.858-6.104Z"
                                        clip-rule="evenodd" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>