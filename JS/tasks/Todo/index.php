<?
$connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
mysqli_set_charset($connect, 'utf8');

if ($connect->connect_error) {
    die("Ошибка соединения: $connect->connect_error");
}

session_start();
$ip = session_id();
$cases = mysqli_query($connect, "SELECT * FROM toDo WHERE ip='{$ip}' ORDER BY is_ended DESC");

?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, maximum-scale=1.0, minimum-scale=1.0">
    <title>ToDo лист</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>
    <h1>Список задач <?= date('Y') ?></h1>
    <section class="list">
        <?
            if (mysqli_num_rows($cases) > 0) {
                while ($row = mysqli_fetch_array($cases)) {
                    ?>
                    <div class="list-item">
                        <form action="update.php" method="post">
                            <div class="title">
                                <p><?php echo date('j F H:i', strtotime($row['time_of_create'])) . " - " .
                                        date('j F H:i', strtotime($row['time_of_end']));
                                    ?>
                                </p>
                                <div class="title_for_update">
                                    <?php
                                        if($row['is_ended'] == 1) {
                                            ?>
                                                <label class="line-through header"><?= $row['header'] ?></label>
                                                <label><input checked class="check" type="checkbox" name="check"></label>
                                            <?
                                        } else {
                                            ?>
                                                <label class="header"><?= $row['header'] ?></label>
                                                <label><input class="check" type="checkbox" name="check"></label>
                                            <?
                                        }
                                    ?>
                                </div>
                                <input class="new_title hidden" type="text" name="new_title">
                            </div>
                            <div>
                                <p class="description"><?= $row['text'] ?></p>
                                <input class="new_description hidden" type="text" name="new_description">
                            </div>
                            <div><input type="hidden" name="id" value="<?= $row['id'] ?>"></div>
                            <div class="buttons">
                                <input class="update hidden" type="submit" value="Изменить">
                                <a class="delete" href="delete.php?id= <?= $row['id'] ?>">Удалить</a>
                            </div>

                        </form>
                    </div>
                    <?
                }

            } else {
                echo "Добавьте задачу: $connect->error";
            }
        ?>
    </section>

    <section class="form_for_added">
        <form action="insert.php" method="post" class="adding">
            <div class="row_added">Задача:
                <input required type="text" name="title">
            </div>

            <div class="row_added">Описание:
                <textarea required сols="10" rows="5" name="description"></textarea>
            </div>

            <div class="row_added">
                <p>Начало:   </p>
                <div class="data">
                    <input required type="date" name="date_start">
                    <input required type="time" name="time_start">
                </div>

            </div>

            <div class="row_added">
                <p>Конец:    </p>
                <div class="data">
                    <input required type="date" name="date_end">
                    <input required type="time" name="time_end">
                </div>
            </div>

            <div class="insert"><input type="submit" value="Добавить"></div>
        </form>
    </section>
</main>
<script src="script.js"></script>
</body>
</html>
