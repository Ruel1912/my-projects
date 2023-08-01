<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
    $nameFilter = isset($_POST['name']) ? $_POST['name'] : '';
    $ageFilter = isset($_POST['age']) ? $_POST['age'] : '';
    $dayFilter = isset($_POST['day']) ? $_POST['day'] : '';
    $serviceFilter = isset($_POST['service']) ? $_POST['service'] : '';

    // Подготавливаем запрос с учетом фильтров
    $sql = "SELECT * FROM coaches__schedule WHERE 1=1";
    if (!empty($nameFilter)) {
        $sql .= " AND name = '$nameFilter'";
    }
    if (!empty($ageFilter)) {
        if (intval($ageFilter) != 18) {
            // Разбиваем значение фильтра на минимальное и максимальное значение возраста
            list($minAge, $maxAge) = explode('-', $ageFilter);
            // Добавляем условие в запрос, чтобы выбирать только те строки,
            // у которых возраст находится в заданном диапазоне
            $sql .= " AND age BETWEEN $minAge AND $maxAge";
        } else {
            $sql .= " AND age LIKE '%$ageFilter%' ";
        }
    }
    if (!empty($dayFilter)) {
        $sql .= " AND day LIKE '%$dayFilter%' ";
    }
    if (!empty($serviceFilter)) {
        $sql .= " AND service = '$serviceFilter'";
    }
    $sql .= " ORDER BY name";
    $result = $conn->query($sql);
    $html = '<div class="table__header"><div>Специалист</div><div>Группа</div><div>Услуга</div><div>Возраст</div><div>День, время</div></div>';
    foreach($result as $row) {
        $html .= "<div class='table__row'>";
    $html .= '<div>' . $row['name'] . '</div>';
    $html .= '<div>' . $row['team'] . '</div>';
    $html .= '<div>' . $row['service'] . '</div>';
    $html .= '<div>' . $row['age'] . ' лет</div>';
    $html .= '<div>';
    $html .= '<span>' . $row['day'] . '</span>';
    $html .= '<span>' . $row['time'] . '</span>';
    $html .= '</div>';
    $html .= "</div>";
    }
    echo $html;
?>