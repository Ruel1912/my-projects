<?
    $author = $_POST['author'];
    $message = $_POST['message'];


    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }

    $query = mysqli_query($connect, "INSERT INTO messenger (message, author, datetime) VALUES ('{$message}', '{$author}', NOW())");
    echo mysqli_error($connect);
    $connect->close();
    header("Location: https://breakover.ru/u/m.vesel/works/chat/");
    exit();
?>