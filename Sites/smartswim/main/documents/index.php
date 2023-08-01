<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    $name = $_GET['name']; 
    $documents = $conn->query("SELECT * FROM documents WHERE name = '$name'");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Документы</title>
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/favicon/site.webmanifest" />
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="(max-width: 1200px)" href="../main-mobile.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="documents">
            <div class="container">
                <?php while ($row = mysqli_fetch_assoc($documents)) : ?>
                <div class="breadcrumbs">
                    <a href="/main" class="breadcrumbs__link">Главная</a>
                    <span class="breadcrumb__divider">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                fill="#fff" />
                        </svg>
                    </span>
                    <a href="javascript:void(0)"
                        class="breadcrumbs__link breadcrumbs__link_active"><?= $row['title'] ?></a>
                </div>
                <h1 class="documents__title title"><?= htmlspecialchars($row['title']) ?></h1>
                <div class="document__text"><?= $row['content'] ?></div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
</body>

</html>