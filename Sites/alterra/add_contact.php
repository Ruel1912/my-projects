<?php
require_once "connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $phone = $_POST['phone'];

    // Запись контакта в базу данных
    $add_contact = $pdo->prepare("INSERT INTO contact (username, phone) VALUES (:name, :phone)");
    $add_contact->bindParam(':name', $name);
    $add_contact->bindParam(':phone', $phone);

    try {
        $add_contact->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Ошибка добавления контакта: " . $e->getMessage();
    }
}
?>