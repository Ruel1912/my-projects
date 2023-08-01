<?php
require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
// Получение значения поиска из POST-данных
$searchValue = isset($_POST['searchValue']) ? trim($_POST['searchValue']) : '';
if (empty($searchValue) || $searchValue == " ") {
    echo "";
    $conn->close();
    die;
}
// Поиск пользователя в базе данных
$query = sprintf("SELECT * FROM users WHERE role = 'ученик' AND CONCAT(lastname, ' ', firstname, ' ', patronymic) LIKE '%s%%'", $searchValue);
$result = $conn->query($query);

$res = "";
if (mysqli_num_rows($result) != 0) {

    $res .= "<ul>";
        foreach ($result as $user) {
            $id = $user['id'];
            $lastname = $user['lastname'];
            $firstname = $user['firstname'];
            $patronymic = $user['patronymic'];
            $res .= "<li class='user_item' data-id=$id>$lastname $firstname $patronymic</li>";
        }
    $res .= "</ul>";

    echo $res;

} else {
    echo '<p>Ничего не найдено</p>';

}

// Закрытие соединения с базой данных
$conn->close();
echo $searchValue;
?>