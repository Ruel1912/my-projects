<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");

    $user_id = $_SESSION['user_id'];
    $check_user_result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($check_user_result);
    $role = $user['role'];

    $user_trash_count = mysqli_num_rows($conn->query("SELECT * FROM users__trash WHERE user_id = $user_id"));
    $user_order_count = mysqli_num_rows($conn->query("SELECT * FROM users__order WHERE user_id = $user_id"));
    $user_favourite_count = mysqli_num_rows($conn->query("SELECT * FROM users__favourite WHERE user_id = $user_id"));


    if ($role == "ученик") {
        $children = $check_user_result;
    }

    if ($role == "родитель") {
        $heading = "Данные о ребенке:";
        $children = $conn->query("SELECT * FROM users WHERE parent_id = $user_id");
        $button = "+ добавить ребенка";
    }
    
    if ($role == "тренер") {
        $heading = "Данные об ученике:";
        $children = $conn->query("SELECT * FROM coaches__students WHERE coach_id = $user_id");
        $button = "+ добавить ученика";
    }