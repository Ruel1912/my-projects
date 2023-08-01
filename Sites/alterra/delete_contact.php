<?php
require_once "connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Удаление контакта
    $delete_contact = $pdo->prepare("DELETE FROM contact WHERE id = $id");
    
    try {
        $delete_contact->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Ошибка удаления контакта: " . $e->getMessage();
    }
}
?>