<?php
    $id = $_POST['id'];
    $message = $_POST['message'];

    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }

    $query = mysqli_query($connect, "UPDATE messenger SET message='{$message}' WHERE id={$id}");
    $connect->close();
    if ($query){
        header("Location: https://breakover.ru/u/m.vesel/works/chat/?response=success");
    }
    header("Location: https://breakover.ru/u/m.vesel/works/chat/?response=error");
    echo mysqli_error($connect);
    exit;
