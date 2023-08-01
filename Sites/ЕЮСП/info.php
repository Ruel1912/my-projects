<!DOCTYPE html>
<html lang="ru">
<?php 
$page = "info";
$articles = [
    [
        "title" => 'Важные изменения в законодательстве для тех, у кого есть кредиты.
        ',
        "desc" => 'Депутаты приняли закон, который продлевает кредитные каникулы до конца этого года. Документ начнет действовать с момента официального опубликования. Напоминаем, каникулы можно получить по кредитам, которые оформлены до',
    ],
    [
        "title" => 'Госдума приняла закон об увеличении налоговых вычетов по расходам граждан на образование, лечение и покупку лекарств
        ',
        "desc" => 'Госдума приняла (https://tass.ru/ekonomika/17560929) закон об увеличении налоговых вычетов по расходам граждан на образование, лечение и покупку лекарств. Россияне теперь смогут получить налоговый вычет с суммы до',
    ],
    [
        "title" => 'Долги по ЖКХ с неизвестных граждан могут разрешить взыскивать без имени ответчика в иске. 
        ',
        "desc" => 'Если истец наряду с датой и местом рождения, а также хотя бы одним идентификатором ответчика не знает его Ф.И.О., на это разрешат указать в иске. В таком случае неизвестные данные направит суду ряд госорганов и публично-правовая компания',
    ]
];
?>
<?php require($_SERVER['DOCUMENT_ROOT']."/components/head.php") ?>
<link rel="stylesheet" href="/css/main-mobile.css">
<link rel="stylesheet" href="/css/info.css">
<title>Полезная информация</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main>
        <section class="info inter gerb">
            <div class="container">
                <h2 class="title">Полезная информация <svg xmlns="http://www.w3.org/2000/svg" width="135" height="16"
                        fill="none" viewBox="0 0 135 16">
                        <path fill="#0F73E7"
                            d="M133.747 8.707a1 1 0 0 0 0-1.414L127.383.929a1.001 1.001 0 0 0-1.415 1.414L131.625 8l-5.657 5.657a1 1 0 0 0 1.415 1.414l6.364-6.364ZM.652 9H133.04V7H.652v2Z" />
                    </svg>
                </h2>
                <div class="article__search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="#0F73E7" stroke-width="1.5" />
                        <path stroke="#0F73E7" stroke-linecap="round" stroke-width="1.5" d="M18.5 18.5 22 22" />
                    </svg>
                    <input type="text" class="search__input" name="search" placeholder="Введите название статьи ">
                </div>
                <div class="article__items">
                    <?php foreach($articles as $id => $article): ?>
                    <div class="article__item">
                        <h3><?= $article['title']?></h3>
                        <h4><?= $article['desc']?>...<a href="article.php?id=<?= $id ?>"><strong>Читать
                                    подробнее</strong></a></h4>
                        <a class="article__link" href="/civil-law.php#civil">Перейти в услуги</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="/js/search.js"></script>
</body>


</html>