<?php

// Подключение к базе данных
$servername = "localhost";
$username = "egor_root";
$password = "Smartswim185";
$dbname = "egor_smartswim";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}
// 
?>