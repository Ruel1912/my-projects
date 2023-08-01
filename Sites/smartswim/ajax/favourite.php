<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    $user_id = $_SESSION['user_id'];
// Получение значения поиска из POST-данных
$id = isset($_POST['id']) ? trim($_POST['id']) : '';
$existProduct = $conn->query("SELECT * FROM users__favourite WHERE user_id = $user_id AND favourite_id = $id");


if (mysqli_num_rows($existProduct) > 0) {
    $res = $conn->query("DELETE FROM users__favourite WHERE favourite_id = $id AND user_id = $user_id");
    if ($res) {
        echo "remove";
    }
    
} else {
    $res = $conn->query("INSERT INTO users__favourite(user_id, favourite_id) VALUES ($user_id, $id)");
    if ($res) {
        echo "add";
    }
}
// Закрытие соединения с базой данных
$conn->close();
?>