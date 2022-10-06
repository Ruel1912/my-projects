<?
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }

    $query = mysqli_query($connect, "DELETE FROM messenger WHERE id = $id");
    echo mysqli_error($connect);
    $connect->close();
    header("Location: https://breakover.ru/u/m.vesel/works/chat/");
    exit();
?>