<?php

// Подключение к базе данных
$host = 'localhost';
$dbname = 'alterra';
$username = 'root';
$password = '_gRREm6Fc4q_';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

?>