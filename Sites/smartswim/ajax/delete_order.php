<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $user_id = $_POST['user_id'];
 $trash_id = $_POST['trash_id'];
 $size_id = $_POST['size_id'];
 $res = $conn->query("DELETE FROM `users__trash` WHERE user_id = $user_id AND trash_id = $trash_id AND size_id = $size_id");

 if ($res) {
    echo "success";
} else {
     echo "error";
}
$conn->close();
?>