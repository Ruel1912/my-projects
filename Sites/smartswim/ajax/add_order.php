<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
 $user_id = $_POST['user_id'];
 $trash_id = $_POST['trash_id'];
 $size_id = $_POST['size_id'];
 $count = $_POST['count'];

 $res = $conn->query("INSERT INTO users__order(user_id, order_id, `date`, size_id, count) VALUES ($user_id, $trash_id, CURRENT_TIMESTAMP, $size_id, $count)");
//  $order = $conn->query("SELECT * FROM users__order WHERE user_id = $user_id AND order_id = $trash_id AND size_id = $size_id");
//  if (mysqli_num_rows($order) > 0) {
//    $order_count = mysqli_fetch_assoc($order)['count'] + $count;
//    $res = $conn->query("UPDATE users__order SET count = $order_count WHERE user_id = $user_id AND date order_id = $trash_id AND size_id = $size_id");
//  } else {
//  }

 if ($res) {
    echo "success";
 } else {
    echo "error";
 }

 $conn->close();
?>