<?
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start = "{$_POST['date_start']} {$_POST['time_start']}";
    $end = "{$_POST['date_end']} {$_POST['time_end']}";
    session_start();
    $ip = session_id();

    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }
    $query = "INSERT INTO toDo (time_of_create, time_of_end, header, text, is_ended, ip) VALUES ('{$start}', '{$end}', '{$title}', '{$description}', 0, '{$ip}')";

    $insert = mysqli_query($connect, $query);
    $connect->close();
    if ($insert) {
        header("Location: index.php?response=success");
    } else {
        header("Location: index.php?response=error");
    }
    exit();
?>