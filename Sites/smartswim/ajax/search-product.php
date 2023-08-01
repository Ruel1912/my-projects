<?php
require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
// Получение значения поиска из POST-данных
$searchValue = isset($_POST['title']) ? trim($_POST['title']) : '';
// Поиск пользователя в базе данных
$query = sprintf("SELECT * FROM shop__product WHERE title LIKE '%s%%'", $searchValue);
$result = $conn->query($query);

if (empty($searchValue) || $searchValue == " ") {
    $query = "SELECT * FROM shop__product";
}

$res = "";
if (mysqli_num_rows($result) != 0) {
        foreach ($result as $card) {
            $id = $card['id'];
            $title = $card['title'];
            $image = $card['image'];
            $image_path = "/uploads/shop/$image";
            $new_price = $card['new-price'];
            $price = $card['price'];
            $res .= "<div class='card'>
            <div class='card__header'>
            <img src='$image_path' alt='$title'>
</div>
<div class='card__body'>
    <p class='card__title'> $title</p>";
    if (isset($new_price)) {
        $res.= "<div class='card__control sale'>
<div class='price'>
    <span class='card__price'>$price ₽</span>
<span class='card__new-price'>$new_price ₽</span>
</div>";
} else {
$res.= "<div class='card__control'>
    <div class='price'>
        <span class='card__price'>$price ₽</span>
</div>";
}

$res .= "
<a href='product.php?id=$id' class='card__link'>
    <span>Подробнее</span>
    <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 15 15' fill='none'>
        <path d='M4.76871 0L3 1.76877L8.73123 7.5L3 13.2312L4.76871 15L12.2687 7.5L4.76871 0Z' fill='white' />
        <path d='M4.76871 0L3 1.76877L8.73123 7.5L3 13.2312L4.76871 15L12.2687 7.5L4.76871 0Z' />
    </svg>
</a>
</div>
</div>
</div>";
}

echo $res;

} else {
echo "<p class='shop__empty'>Ничего не найдено</p>";

}

// Закрытие соединения с базой данных
$conn->close();
?>