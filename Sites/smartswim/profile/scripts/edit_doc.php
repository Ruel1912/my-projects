<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $doc = $_POST['doc'];
        $dirPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/users/documents/$id";
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        foreach ($_FILES as $key => $file) {
            $uploadedFile = $file['tmp_name'];
            $fileType = mime_content_type($uploadedFile);
            $basename = basename($file['name']); // Получаем базовое имя файла (с расширением) - "file.pdf"
            $file_ext = pathinfo($basename, PATHINFO_EXTENSION); // Получаем расширение файла - "pdf"
            $filename = $key . "." . $file_ext;
            if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
                if (in_array($fileType, $allowedTypes)) {
                    // Перемещаем файл в папку назначения
                    move_uploaded_file($file['tmp_name'], $dirPath . "/" . $filename);
                    header("Location: edit_doc.php?mode=delete&id=$id&doc=$doc&new_doc=$filename");
                } else {
                    echo 'Неверный тип файла. Пожалуйста, загрузите файл в формате PDF.';
                }
            } else {
                echo 'Ошибка при загрузке файла.';
            }
        }
    }

    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
        $id = $_GET['id'];
        $document = $_GET['doc'];
        $new_doc = $_GET['new_doc'];
        $basename = basename($document); // Получаем базовое имя файла (с расширением) - "file.pdf"
        $file_ext = pathinfo($basename, PATHINFO_EXTENSION); // Получаем расширение файла - "pdf"
        $file_base = pathinfo($basename, PATHINFO_FILENAME); // Получаем имя файла без расширения - "file"

        if (isset($new_doc)) {
            $new_base = basename($new_doc); // Получаем базовое имя файла (с расширением) - "file.pdf"
            $new_doc_base = pathinfo($new_base, PATHINFO_FILENAME); // Получаем имя файла без расширения - "file"
            $nulling_doc = $conn->query("UPDATE users__document SET $new_doc_base = '$new_doc' WHERE user_id=$id");
        } else {
            $nulling_doc = $conn->query("UPDATE users__document SET $file_base = NULL WHERE user_id=$id");
        }
        if ($nulling_doc) {
            $file_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/users/documents/$id/$document";
            if (file_exists($file_path)) {
                if (unlink($file_path)) {
                    header("Location: ". $_SERVER['HTTP_REFERER']);
                } else {
                    echo "Ошибка при удалении файла.";
                }
            } else {
                echo "Файл не существует.";
            }
        } else {
            echo "Ошибка удаления документа $document";
        }
    }
?>