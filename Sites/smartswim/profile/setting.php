<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");

        // Проверяем, что пользователь авторизован
    if (!isset($_SESSION['user_id'])) {
        // Перенаправляем пользователя на страницу авторизации
        header('Location: login.php');
        exit();
        }

    // Обрабатываем нажатие кнопки "Выход"
    if (isset($_POST['logout'])) {
        // Удаляем данные из сессии
        session_unset();
        session_destroy();
        // Перенаправляем пользователя на страницу авторизации
        header('Location: login.php');
        exit();
    }

    require_once("role.php");
    require "scripts/add_doc.php";

    if (isset($_POST['photo'])) {
        // Получаем информацию о загруженной картинке
        $photo_name = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        $photo_size = $_FILES['photo']['size'];
        $photo_error = $_FILES['photo']['error'];    
        // Проверяем, что файл загружен без ошибок
        if ($photo_error === UPLOAD_ERR_OK) {
          // Получаем расширение файла
          $photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
          // Генерируем уникальное имя файла
          $photo_new_name = "user_" . $user_id . "." . $photo_ext;
          // Сохраняем файл на сервере
          move_uploaded_file($photo_temp, $_SERVER['DOCUMENT_ROOT'] . '/uploads/users/avatars/' . $user_id . '/' . $photo_new_name);
          // Обновляем запись в базе данных с именем файла фотографии
          $update_query = "UPDATE users SET photo='$photo_new_name' WHERE id='$user_id'";
          $result = mysqli_query($conn, $update_query);
          if (!$result) {
            die("Ошибка при обновлении записи в базе данных: " . mysqli_error($conn));
          }
          // Обновляем информацию о фотографии в сессии
          $_SESSION['photo'] = $photo_new_name;
          // Перезагружаем страницу для отображения обновленной фотографии
          header("Location: ".$_SERVER['REQUEST_URI']);
        } else {
          echo "Ошибка при загрузке файла: " . $photo_error;
        }
    }  

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        addDocument($conn, $id);
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/favicon/site.webmanifest" />
    <meta name="google-site-verification" content="lmm1PKa548QuGWucxihb6_YSIHYI2S4HlIitqscXxOQ">
    <meta name="yandex-verification" content="ef19dc9ff54bb0ed">
    <meta name="description" content="Личный кабинет Smartswim">
    <meta property="og:url" content="https://smartswim.ru/profile">
    <meta property="og:title" content="<?= $user['firstname'] ?> <?= $user['lastname'] ?>">
    <meta property="og:description" content="Личный кабинет Smartswim">
    <meta property="og:image" content="/images/logo.png">
    <meta property="og:type" content="website">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>Управление профилем</title>
    <link rel="stylesheet" href="/base.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="/components/form.css">
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
    <main class="main">
        <section class="profile">
            <div class="container">
                <div class="profile__wrapper">
                    <aside class="setting">
                        <div class="profile__photo">
                            <img src="<?= $user['photo'] ? '/uploads/users/avatars/'. $user_id . '/' . $user['photo'] : '/images/user-placeholder.svg' ?>"
                                alt="Profile photo">

                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="photo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 30 30" fill="none">
                                            <circle cx="15" cy="15" r="15" fill="#D9D9D9" />
                                            <g clip-path="url(#clip0_72_4222)">
                                                <path
                                                    d="M18.8155 9L17.8735 7.77867C17.6859 7.5372 17.4457 7.34161 17.1713 7.2067C16.8968 7.07179 16.5953 7.00111 16.2895 7H13.7135C13.4077 7.00111 13.1062 7.07179 12.8317 7.2067C12.5573 7.34161 12.3171 7.5372 12.1295 7.77867L11.1875 9H18.8155Z"
                                                    fill="#2B2B37" />
                                                <path
                                                    d="M14.9987 18.9998C16.4715 18.9998 17.6654 17.8059 17.6654 16.3332C17.6654 14.8604 16.4715 13.6665 14.9987 13.6665C13.5259 13.6665 12.332 14.8604 12.332 16.3332C12.332 17.8059 13.5259 18.9998 14.9987 18.9998Z"
                                                    fill="#2B2B37" />
                                                <path
                                                    d="M19.6667 10.3335H10.3333C9.4496 10.3346 8.60237 10.6861 7.97748 11.311C7.35259 11.9359 7.00106 12.7831 7 13.6668L7 19.6668C7.00106 20.5506 7.35259 21.3978 7.97748 22.0227C8.60237 22.6476 9.4496 22.9991 10.3333 23.0002H19.6667C20.5504 22.9991 21.3976 22.6476 22.0225 22.0227C22.6474 21.3978 22.9989 20.5506 23 19.6668V13.6668C22.9989 12.7831 22.6474 11.9359 22.0225 11.311C21.3976 10.6861 20.5504 10.3346 19.6667 10.3335ZM15 20.3335C14.2089 20.3335 13.4355 20.0989 12.7777 19.6594C12.1199 19.2198 11.6072 18.5951 11.3045 17.8642C11.0017 17.1333 10.9225 16.3291 11.0769 15.5531C11.2312 14.7772 11.6122 14.0645 12.1716 13.5051C12.731 12.9457 13.4437 12.5647 14.2196 12.4104C14.9956 12.256 15.7998 12.3352 16.5307 12.638C17.2616 12.9407 17.8864 13.4534 18.3259 14.1112C18.7654 14.769 19 15.5424 19 16.3335C18.9989 17.394 18.5772 18.4108 17.8273 19.1608C17.0773 19.9107 16.0605 20.3324 15 20.3335Z"
                                                    fill="#2B2B37" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_72_4222">
                                                    <rect width="16" height="16" fill="white"
                                                        transform="translate(7 7)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </label>
                                    <input type="file" id="photo" name="photo" style="display: none">
                                </div>
                                <button type="submit" name="photo" style="display: none">Отправить фото</button>
                            </form>
                        </div>
                        <div class="profile__name">
                            <p><?= $user['firstname'] ?></p>
                            <p><?= $user['lastname'] ?></p>
                        </div>
                        <nav class="profile__nav">
                            <div class="nav__competition">
                                <a href="competition.php"><label>Соревнования</label></a>
                                <a href="collecting.php"><label>Сборы</label></a>
                            </div>
                            <div class="nav__shop">
                                <a href="favourite.php">
                                    <label>Избранное</label>
                                    <?php if($user_favourite_count != 0): ?>
                                    <span>(<?= $user_favourite_count ?>)</span>
                                    <?php endif; ?>
                                </a>

                                <a href="trash.php">
                                    <label>Корзина</label>
                                    <?php if($user_trash_count != 0): ?>
                                    <span>(<?= $user_trash_count ?>)</span>
                                    <?php endif; ?>
                                </a>
                                <a href="order.php">
                                    <label>Заказы</label>
                                    <?php if($user_order_count != 0): ?>
                                    <span>(<?= $user_order_count ?>)</span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </nav>

                        <a href="index.php" class="nav__settings active index">Управление профилем</a>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" name="logout" value="1">
                            <button class="nav__exit" type="submit">Выйти</button>
                        </form>
                    </aside>
                    <div class="profile__content setting">
                        <div class="breadcrumbs">
                            <a href="/profile" class="breadcrumbs__link">Личный кабинет</a>
                            <span class="breadcrumb__divider">
                                <svg width="10" height="15" viewBox="0 0 10 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.4 0.5L10 7.83981L4.66667 14.5L0.533333 14.5L5.73333 7.83981L-6.11959e-07 0.5L4.4 0.5Z"
                                        fill=" #8e8e8e"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0)"
                                class="breadcrumbs__link breadcrumbs__link_active">Управление</a>
                        </div>
                        <h1 class="profile__title title">Управление профилем</h1>
                        <?php if(mysqli_num_rows($children) != 0): ?>
                        <div class="data__items">
                            <?php foreach($children as $child): ?>
                            <?php
                                if ($role == "родитель") {
                                    $child_id = $child['id'];
                                } else if ($role == "тренер") {
                                    $child_id = $child['student_id'];
                                    $child = mysqli_fetch_assoc($conn->query("SELECT * FROM users WHERE role = 'ученик' AND id = $child_id"));
                                } else {
                                    $child_id = $user_id;
                                }
                                    $child_documents = mysqli_fetch_assoc($conn->query("SELECT * FROM users__document WHERE user_id=$child_id"));
                                    $child_passport = isset($child_documents['passport']) ? $child_documents['passport'] : NULL;
                                    $child_insurance = isset($child_documents['insurance']) ? $child_documents['insurance'] : NULL;
                                    $child_medical = isset($child_documents['medical']) ? $child_documents['medical'] : NULL;
                                ?>
                            <div class="data__item">
                                <?php if(isset($heading)): ?>
                                <h2 class="data__title"><?= $heading ?> <?= $child['firstname'] ?>
                                    <?= $child['lastname'] ?></h2>
                                <?php endif; ?>
                                <div class="files">
                                    <?php
                                                    $files = [
                                                        "passport" => [
                                                            "Свидетельство о рождении / паспорт ребенка",
                                                            $child_passport
                                                        ],
                                                        "insurance"=> [
                                                            "Страховка ребенка",
                                                            $child_insurance
                                                        ],
                                                        "medical"=> [
                                                            "Мед отпуск ребенка",
                                                            $child_medical
                                                        ],
                                                    ];
                                                    ?>
                                    <?php foreach($files as $key => $value): ?>
                                    <div class="file">
                                        <?php
                                                            $title = $value[0];
                                                            $document = $value[1];
                                                            ?>
                                        <span><?= $title ?></span>
                                        <?php if(isset($document)): ?>
                                        <div class="file__control">
                                            <a
                                                href="<?= "/uploads/users/documents/$child_id/$document" ?>">Посмотреть</a>
                                            <?php if($role != "тренер"): ?>
                                            <div class="edit">
                                                <a href="javascript:void(0)" class="edit_button">Редактировать</a>
                                                <div class="file__edit">
                                                    <div>
                                                        <label for="<?= $key ?> <?= $child_id ?>">Заменить</label>
                                                        <form style="display: none" action="scripts/edit_doc.php"
                                                            class="add__form" method="post"
                                                            enctype="multipart/form-data">
                                                            <input type="file" name="<?= $key ?>"
                                                                id="<?= $key ?> <?= $child_id ?>"
                                                                accept=".jpg, .jpeg, .png, .gif, application/pdf">
                                                            <input type="hidden" name="id" value="<?= $child_id ?>">
                                                            <input type="hidden" name="doc" value="<?= $document ?>">
                                                            <input type="submit">
                                                        </form>
                                                    </div>
                                                    <a
                                                        href="scripts/edit_doc.php?mode=delete&id=<?= $child_id?>&doc=<?= $document ?>">Удалить</a>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        <?php if($role == "тренер"): ?>
                                        <button type="button">
                                            <label>Не добавлено</label>
                                        </button>
                                        <?php else: ?>
                                        <button type=" button">
                                            <label for="<?= $key ?> <?= $child_id ?>">Добавить</label>
                                            <form style="display: none" action="" class="add__form" method="post"
                                                enctype="multipart/form-data">
                                                <input type="file" name="<?= $key ?>" id="<?= $key ?> <?= $child_id ?>"
                                                    accept=".jpg, .jpeg, .png, .gif, application/pdf">
                                                <input type="hidden" name="id" value="<?= $child_id ?>">
                                                <input type="submit" value="">
                                            </form>
                                        </button>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($button)): ?>
                        <a class="profile__link button" href="add.php"><?= $button ?></a>
                        <?php endif; ?>
                    </div>
                </div>
        </section>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
    <script src="photo.js"></script>
    <script src="edit_doc.js"></script>
    <script src="mobile_ref.js"></script>
</body>

</html>