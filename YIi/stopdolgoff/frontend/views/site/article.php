<?php

use app\models\Articles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->registerCssFile("@web/css/article.css");
$this->registerCssFile("@web/css/bid.css");
Yii::$app->name = 'Статьи';
?>

<section class="article">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a href="<?= Url::to(["/article"]) ?>">/ Статьи</a>
        </nav>
        <h2 class="article__title title">Статьи</h2>
        <form class="article__search" action="" method="post">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <g clip-path="url(#clip0_1_1806)">
                    <path opacity="0.971" fill-rule="evenodd" clip-rule="evenodd" d="M5.70154 -0.0171814C6.11819 -0.0171814 6.53488 -0.0171814 6.95154 -0.0171814C9.12063 0.272653 10.7613 1.35599 11.8734 3.23282C12.966 5.38035 12.9244 7.50535 11.7484 9.60782C11.5984 9.84007 11.437 10.064 11.264 10.2797C12.8554 11.8554 14.4283 13.4439 15.9828 15.0453C15.9828 15.1391 15.9828 15.2328 15.9828 15.3266C15.7744 15.5557 15.5557 15.7745 15.3265 15.9828C15.2328 15.9828 15.139 15.9828 15.0453 15.9828C13.4439 14.4283 11.8554 12.8554 10.2797 11.2641C8.77094 12.4411 7.06782 12.8734 5.17029 12.5609C2.76213 12.0276 1.13192 10.6057 0.279663 8.29532C0.142051 7.85163 0.0430922 7.40369 -0.0172119 6.95157C-0.0172119 6.53491 -0.0172119 6.11823 -0.0172119 5.70157C0.320866 3.26447 1.60212 1.51969 3.82654 0.467194C4.43329 0.217761 5.05829 0.0563027 5.70154 -0.0171814ZM6.10779 1.32657C8.1286 1.33906 9.65466 2.20364 10.6859 3.92032C11.6389 5.86891 11.4722 7.71266 10.1859 9.45157C8.69444 11.1254 6.86632 11.6514 4.70154 11.0297C2.58152 10.1771 1.45652 8.60423 1.32654 6.31094C1.43932 4.16813 2.46015 2.63688 4.38904 1.71719C4.94719 1.50204 5.5201 1.37183 6.10779 1.32657Z" fill="#C0C0C0"/>
                </g>
                <defs>
                    <clipPath id="clip0_1_1806">
                        <rect width="16" height="16" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
            <input type="text" name="search_text" placeholder="Введите название статьи">
            <button class="button" type="submit">Поиск</button>
        </form>
        <?php if(isset($_POST['search_text']) && $_POST['search_text'] != ""): ?>
            <?php
                $search_text = $_POST['search_text'];
                $articles_search = Articles::find()
                    ->orderBy('date DESC')
                    ->where(['like', 'title', $search_text])
                    ->limit(6);
                unset($_POST['search_text']);
                $articles_count = $articles_search->count();
            ?>
            <?php if($articles_count  != 0): ?>
                <div class="search__items">
                    <?php $articles_search = $articles_search->all(); ?>
                    <?php foreach ($articles_search as $article_search): ?>
                    <div class="search__item">
                        <div class="search__item-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <g clip-path="url(#clip0_1_1981)">
                                    <path opacity="0.97" fill-rule="evenodd" clip-rule="evenodd" d="M5.37109 -0.0195312C8.87371 -0.0195312 12.3763 -0.0195312 15.8789 -0.0195312C15.9311 0.0394637 15.9767 0.104568 16.0156 0.175781C16.0417 6.71223 16.0417 13.2487 16.0156 19.7852C15.9767 19.8564 15.9311 19.9215 15.8789 19.9805C11.3737 19.9805 6.86848 19.9805 2.36328 19.9805C2.31109 19.9215 2.26552 19.8564 2.22656 19.7852C2.20052 14.2513 2.20052 8.71746 2.22656 3.18359C3.26849 2.10912 4.31668 1.04141 5.37109 -0.0195312ZM5.87891 0.644531C9.04297 0.644531 12.207 0.644531 15.3711 0.644531C15.3711 6.86848 15.3711 13.0925 15.3711 19.3164C11.2044 19.3164 7.03778 19.3164 2.87109 19.3164C2.87109 14.095 2.87109 8.87371 2.87109 3.65234C3.83814 3.67112 4.80168 3.65159 5.76172 3.59375C5.80863 3.5585 5.84121 3.51292 5.85938 3.45703C5.87891 2.51962 5.88543 1.58212 5.87891 0.644531ZM5.17578 1.15234C5.21469 1.75746 5.22774 2.36945 5.21484 2.98828C4.60274 2.99479 3.99074 2.98828 3.37891 2.96875C3.98574 2.36843 4.58469 1.76296 5.17578 1.15234Z" fill="url(#paint0_linear_1_1981)"/>
                                    <path opacity="0.969" fill-rule="evenodd" clip-rule="evenodd" d="M16.8163 -0.0195312C17.0767 -0.0195312 17.3371 -0.0195312 17.5976 -0.0195312C17.6497 0.0394637 17.6953 0.104568 17.7343 0.175781C17.7603 6.71223 17.7603 13.2487 17.7343 19.7852C17.6953 19.8564 17.6497 19.9215 17.5976 19.9805C17.3371 19.9805 17.0767 19.9805 16.8163 19.9805C16.6702 19.8577 16.6246 19.7014 16.6796 19.5117C16.7687 19.3518 16.9054 19.2867 17.0897 19.3164C17.0897 13.0925 17.0897 6.86848 17.0897 0.644531C16.7324 0.657961 16.5956 0.488688 16.6796 0.136719C16.7333 0.0896457 16.7789 0.0375625 16.8163 -0.0195312Z" fill="url(#paint1_linear_1_1981)"/>
                                    <path opacity="0.964" fill-rule="evenodd" clip-rule="evenodd" d="M6.69923 2.98828C9.03001 2.98177 11.3607 2.98828 13.6914 3.00781C13.8699 3.10709 13.9285 3.25682 13.8672 3.45703C13.8216 3.52864 13.763 3.58724 13.6914 3.63281C11.3607 3.65886 9.02997 3.65886 6.69923 3.63281C6.43969 3.41309 6.43969 3.19825 6.69923 2.98828Z" fill="url(#paint2_linear_1_1981)"/>
                                    <path opacity="0.964" fill-rule="evenodd" clip-rule="evenodd" d="M4.55062 5.99604C7.59753 5.98951 10.6444 5.99604 13.6912 6.01557C13.8697 6.11483 13.9283 6.26459 13.867 6.46479C13.8214 6.53639 13.7628 6.59498 13.6912 6.64057C10.6444 6.66662 7.59749 6.66662 4.55062 6.64057C4.29245 6.42393 4.29245 6.20908 4.55062 5.99604Z" fill="url(#paint3_linear_1_1981)"/>
                                    <path opacity="0.958" fill-rule="evenodd" clip-rule="evenodd" d="M4.55116 7.71479C5.8403 7.70826 7.12936 7.71479 8.41834 7.73432C8.67877 7.94264 8.67877 8.151 8.41834 8.35932C7.12928 8.38537 5.84022 8.38537 4.55116 8.35932C4.35159 8.22783 4.306 8.05205 4.41444 7.83198C4.45916 7.7876 4.50475 7.74854 4.55116 7.71479Z" fill="url(#paint4_linear_1_1981)"/>
                                    <path opacity="0.958" fill-rule="evenodd" clip-rule="evenodd" d="M9.8239 7.71479C11.113 7.70826 12.4021 7.71479 13.6911 7.73432C13.8696 7.83358 13.9282 7.98334 13.8669 8.18354C13.8213 8.25514 13.7627 8.31373 13.6911 8.35932C12.402 8.38537 11.113 8.38537 9.8239 8.35932C9.56855 8.14311 9.56855 7.92826 9.8239 7.71479Z" fill="url(#paint5_linear_1_1981)"/>
                                    <path opacity="0.956" fill-rule="evenodd" clip-rule="evenodd" d="M4.55116 9.43354C5.8403 9.42701 7.12936 9.43354 8.41834 9.45307C8.67877 9.66139 8.67877 9.86975 8.41834 10.0781C7.12928 10.1041 5.84022 10.1041 4.55116 10.0781C4.35159 9.94659 4.306 9.7708 4.41444 9.55073C4.45916 9.50635 4.50475 9.46729 4.55116 9.43354Z" fill="url(#paint6_linear_1_1981)"/>
                                    <path opacity="0.956" fill-rule="evenodd" clip-rule="evenodd" d="M9.82454 9.43354C11.1137 9.42701 12.4027 9.43354 13.6917 9.45307C13.8702 9.55233 13.9288 9.70209 13.8675 9.90229C13.8305 9.98315 13.7719 10.0417 13.6917 10.0781C12.4027 10.1041 11.1136 10.1041 9.82454 10.0781C9.56825 9.86366 9.56825 9.64881 9.82454 9.43354Z" fill="url(#paint7_linear_1_1981)"/>
                                    <path opacity="0.964" fill-rule="evenodd" clip-rule="evenodd" d="M4.55116 11.1523C7.59807 11.1458 10.6449 11.1523 13.6918 11.1718C13.8914 11.3033 13.9369 11.4791 13.8285 11.6992C13.7932 11.7461 13.7477 11.7787 13.6918 11.7968C10.6449 11.8229 7.59803 11.8229 4.55116 11.7968C4.35159 11.6653 4.306 11.4896 4.41444 11.2695C4.45916 11.2251 4.50475 11.186 4.55116 11.1523Z" fill="url(#paint8_linear_1_1981)"/>
                                    <path opacity="0.958" fill-rule="evenodd" clip-rule="evenodd" d="M4.55031 12.871C5.83945 12.8645 7.12851 12.871 8.4175 12.8906C8.67793 13.0989 8.67793 13.3072 8.4175 13.5156C7.28476 13.5351 6.15195 13.5416 5.01906 13.5351C5.01906 14.4596 5.01906 15.384 5.01906 16.3085C5.98262 16.3085 6.94613 16.3085 7.90969 16.3085C7.90316 15.6834 7.90969 15.0584 7.92922 14.4335C8.02023 14.1615 8.19601 14.0899 8.45656 14.2187C8.53418 14.2702 8.57976 14.3418 8.59328 14.4335C8.61933 15.1887 8.61933 15.944 8.59328 16.6992C8.57797 16.8146 8.51937 16.8992 8.4175 16.9531C7.12844 16.9791 5.83937 16.9791 4.55031 16.9531C4.49441 16.9349 4.44887 16.9023 4.41359 16.8554C4.34906 15.5957 4.33605 14.3327 4.37453 13.0664C4.42789 12.9936 4.48648 12.9285 4.55031 12.871Z" fill="url(#paint9_linear_1_1981)"/>
                                    <path opacity="0.958" fill-rule="evenodd" clip-rule="evenodd" d="M9.82448 12.871C11.1136 12.8645 12.4027 12.871 13.6917 12.8906C13.8914 13.0238 13.9369 13.1996 13.8284 13.4179C13.7931 13.4648 13.7476 13.4974 13.6917 13.5156C12.4026 13.5416 11.1135 13.5416 9.82448 13.5156C9.56721 13.303 9.56721 13.0881 9.82448 12.871Z" fill="url(#paint10_linear_1_1981)"/>
                                    <path opacity="0.957" fill-rule="evenodd" clip-rule="evenodd" d="M9.82448 14.5898C11.1136 14.5833 12.4027 14.5898 13.6917 14.6093C13.8914 14.7426 13.9369 14.9183 13.8284 15.1367C13.7931 15.1836 13.7476 15.2162 13.6917 15.2343C12.4026 15.2604 11.1135 15.2604 9.82448 15.2343C9.56721 15.0217 9.56721 14.8069 9.82448 14.5898Z" fill="url(#paint11_linear_1_1981)"/>
                                    <path opacity="0.945" fill-rule="evenodd" clip-rule="evenodd" d="M9.86331 16.3085C10.4103 16.302 10.9572 16.3085 11.5039 16.3281C11.6956 16.4185 11.7672 16.5682 11.7188 16.7773C11.6862 16.8619 11.6276 16.9205 11.543 16.9531C10.9701 16.9791 10.3972 16.9791 9.82425 16.9531C9.56073 16.7214 9.57378 16.5066 9.86331 16.3085Z" fill="url(#paint12_linear_1_1981)"/>
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_1_1981" x1="9.1211" y1="-0.0195313" x2="9.1211" y2="19.9805" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_1_1981" x1="17.2047" y1="-0.0195313" x2="17.2047" y2="19.9805" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_1_1981" x1="10.1976" y1="2.98584" x2="10.1976" y2="3.65234" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_1_1981" x1="9.12376" y1="5.99359" x2="9.12376" y2="6.66011" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_1_1981" x1="6.48542" y1="7.71234" x2="6.48542" y2="8.37886" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint5_linear_1_1981" x1="11.7614" y1="7.71234" x2="11.7614" y2="8.37886" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint6_linear_1_1981" x1="6.48542" y1="9.43109" x2="6.48542" y2="10.0976" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint7_linear_1_1981" x1="11.7617" y1="9.43109" x2="11.7617" y2="10.0976" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint8_linear_1_1981" x1="9.12147" y1="11.1498" x2="9.12147" y2="11.8164" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint9_linear_1_1981" x1="6.48289" y1="12.8686" x2="6.48289" y2="16.9726" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint10_linear_1_1981" x1="11.7586" y1="12.8686" x2="11.7586" y2="13.5351" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint11_linear_1_1981" x1="11.7586" y1="14.5873" x2="11.7586" y2="15.2539" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <linearGradient id="paint12_linear_1_1981" x1="10.6847" y1="16.3061" x2="10.6847" y2="16.9726" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD5B45"/>
                                        <stop offset="1" stop-color="#D72D16"/>
                                    </linearGradient>
                                    <clipPath id="clip0_1_1981">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <p><?= $article_search->title ?></p>
                        </div>
                        <a href="<?= Url::to(["/article-page?id=$article_search->id"]) ?>" class="article__link link blue">
                            Читать полностью
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                <g clip-path="url(#clip0_1_482)">
                                    <path d="M10.0791 3.69043C9.91895 3.87793 9.74707 4.07715 9.7002 4.13574L9.61035 4.24512L13.0088 7.24512L16.4072 10.249L7.48145 10.2607L-1.44434 10.2686V10.8545V11.4404L7.48145 11.4482L16.4072 11.46L13.0088 14.4639C10.0166 17.1084 9.61426 17.4756 9.66113 17.5303C9.98145 17.9092 10.3799 18.335 10.4229 18.335C10.4502 18.335 12.2939 16.7295 14.5166 14.7646L18.5557 11.1904V10.8545V10.5186L14.5166 6.94433C12.2939 4.97949 10.4502 3.37012 10.4229 3.36621C10.3955 3.3584 10.2393 3.50683 10.0791 3.69043Z" fill="url(#paint0_linear_1_482)"></path>
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_1_482" x1="8.55566" y1="18.335" x2="8.55566" y2="3.36592" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#6FA0FF"></stop>
                                        <stop offset="1" stop-color="#3F7CF0"></stop>
                                    </linearGradient>
                                    <clipPath id="clip0_1_482">
                                        <rect width="20" height="20" fill="white" transform="translate(0.222168 0.00146484)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>

                    </div>
                <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="search__info"> По Вашему запросу ничего не найдено, попробуйте изменить Ваш запрос или свяжитесь с нами.</p>
            <?php endif; ?>
            <div class="latest-articles">
                <h2 class="latest__title">
                    <?= $articles_count == 0 ? "Возможно, Вы искали" : "Статьи по теме" ?>
                </h2>
                <?php $latest_articles = Articles::find()->limit(5)->all() ?>
                <?php foreach ($latest_articles as $latest_article): ?>
                    <a href="<?= Url::to(["/article-page?id=$latest_article->id"]) ?>" class="article__link link blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <g clip-path="url(#clip0_1_482)">
                                <path d="M10.0791 3.69043C9.91895 3.87793 9.74707 4.07715 9.7002 4.13574L9.61035 4.24512L13.0088 7.24512L16.4072 10.249L7.48145 10.2607L-1.44434 10.2686V10.8545V11.4404L7.48145 11.4482L16.4072 11.46L13.0088 14.4639C10.0166 17.1084 9.61426 17.4756 9.66113 17.5303C9.98145 17.9092 10.3799 18.335 10.4229 18.335C10.4502 18.335 12.2939 16.7295 14.5166 14.7646L18.5557 11.1904V10.8545V10.5186L14.5166 6.94433C12.2939 4.97949 10.4502 3.37012 10.4229 3.36621C10.3955 3.3584 10.2393 3.50683 10.0791 3.69043Z" fill="var(--text)"></path>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_1_482" x1="8.55566" y1="18.335" x2="8.55566" y2="3.36592" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#6FA0FF"></stop>
                                    <stop offset="1" stop-color="#3F7CF0"></stop>
                                </linearGradient>
                                <clipPath id="clip0_1_482">
                                    <rect width="20" height="20" fill="white" transform="translate(0.222168 0.00146484)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <?= $latest_article->title ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
        <div class="article__items">
            <?php foreach ($articles as $article): ?>
                <div class="article__item">
                    <p class="article__text title">
                        <?= $article->title ?>
                        <span>
                            <?= date('d', strtotime($article->date))?>
                            <?= $months[date('n', strtotime($article->date))] ?>
                            <?= date('Y', strtotime($article->date)) ?>
                        </span>
                    </p>
                    <a href="<?= Url::to(["/article-page?id=$article->id"]) ?>" class="article__link link blue">
                        Читать статью
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <g clip-path="url(#clip0_1_482)">
                                <path d="M10.0791 3.69043C9.91895 3.87793 9.74707 4.07715 9.7002 4.13574L9.61035 4.24512L13.0088 7.24512L16.4072 10.249L7.48145 10.2607L-1.44434 10.2686V10.8545V11.4404L7.48145 11.4482L16.4072 11.46L13.0088 14.4639C10.0166 17.1084 9.61426 17.4756 9.66113 17.5303C9.98145 17.9092 10.3799 18.335 10.4229 18.335C10.4502 18.335 12.2939 16.7295 14.5166 14.7646L18.5557 11.1904V10.8545V10.5186L14.5166 6.94433C12.2939 4.97949 10.4502 3.37012 10.4229 3.36621C10.3955 3.3584 10.2393 3.50683 10.0791 3.69043Z" fill="url(#paint0_linear_1_482)"></path>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_1_482" x1="8.55566" y1="18.335" x2="8.55566" y2="3.36592" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#6FA0FF"></stop>
                                    <stop offset="1" stop-color="#3F7CF0"></stop>
                                </linearGradient>
                                <clipPath id="clip0_1_482">
                                    <rect width="20" height="20" fill="white" transform="translate(0.222168 0.00146484)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
</section>
<section class="bid">
    <div class="container">
        <div class="bid__inner">
            <div class="bid__content">
                <h2 class="bid__title title">Получите консультацию юриста по вашей проблеме</h2>
                <h3 class="bid__sub-title">Укажите ваши данные.
                    Наш юрист свяжется с вами в течение 3 минут</h3>
                <form class="form bid__form">
                    <input type="text" name="name" class="form-input" placeholder="Имя" required minlength="2" maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+">
                    <input type="tel" name="phone" class="form-input" placeholder="Номер телефона" required minlength="11" maxlength="20" pattern="^\+?[0-9]{7,15}$">
                    <input type="text" name="region" class="form-input" placeholder="Регион" required maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+">
                    <button type="submit" class="button blue send-button" disabled>Получить консультацию</button>
                </form>
                <p class="bid__policy">*оставляя заявку на данном сайте Вы даете свое разрешение на обработку своих персональных данных в соответствии с ФЗ-152</p>
            </div>
            <img class="bid__image" src="<?= Url::to(["images/form.png"]) ?>" alt="">
        </div>
    </div>
</section>
<?php endif; ?>


