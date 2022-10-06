<?
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'u1389869_stud', 'nQ9uA7', 'u1389869_st');
    mysqli_set_charset($connect, 'utf8');

    if ($connect->connect_error) {
        die("Ошибка: $connect->connect_error");
    }

    $delete = mysqli_query($connect, "DELETE FROM toDo WHERE id = $id");
    $connect->close();
    if ($delete) {
        header("Location: index.php?response=success");
    } else {
        header("Location: index.php?response=error");
    }
    exit();
?>