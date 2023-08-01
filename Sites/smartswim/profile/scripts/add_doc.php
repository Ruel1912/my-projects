<?php
    function addDocument($conn, $id) {
        $dirPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/users/documents/$id";
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
        }
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        foreach ($_FILES as $key => $file) {
            if (isset($file)) {
                $basename = basename($file['name']); // Получаем базовое имя файла (с расширением) - "file.pdf"
                $file_ext = pathinfo($basename, PATHINFO_EXTENSION); // Получаем расширение файла - "pdf"
                $filename = $key . "." . $file_ext;
                if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
                    if (in_array($file_ext, $allowedTypes)) {
                        // Перемещаем файл в папку назначения
                        move_uploaded_file($file['tmp_name'], $dirPath . "/" . $filename);
                        $add_child_documnets = $conn->query("UPDATE users__document SET $key='$filename' WHERE user_id=$id"); 
                        if ($add_child_documnets) {
                            header("Location: ". $_SERVER['HTTP_REFERER']);
                        } else {
                            echo "Ошибка записи поля $key";
                        }
                    } else {
                        echo 'Неверный тип файла.';
                    }
                }
            }
            
        }
    }
?>