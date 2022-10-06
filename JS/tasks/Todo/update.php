<?php
    $id = $_POST['id'];
    $new_title = $_POST['new_title'];
    $new_description = $_POST['new_description'];
    $check = $_POST['check'];

    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }

    if ($new_title != '') {
        $update_title = mysqli_query($connect, "UPDATE toDo SET header='{$new_title}' WHERE id={$id}");
        if ($update_title) {
            $response = "success";
        } else {
            $response = "error";
        }
    }

    if ($new_description != '') {
        $update_description = mysqli_query($connect, "UPDATE toDo SET text='{$new_description}' WHERE id={$id}");
        if ($update_description) {
            $response = "success";
        } else {
            $response = "error";
        }
    }

    if ($check != '') {
        $update_check = mysqli_query($connect, "UPDATE toDo SET is_ended=1 WHERE id={$id}");
        if ($update_check) {
            $response = "success";
        } else {
            $response = "error";
        }
    }

    $connect->close();
    header("Location: https://breakover.ru/u/m.vesel/works/Todo?response=$response");
    exit;
