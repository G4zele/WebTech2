<?php #функция валидации и скачивания изображения
    session_start();
    require('ImageAdd.php');
    try {
        if (exif_imagetype($_FILES['userfile']['tmp_name']) != IMAGETYPE_JPEG) 
        {
            throw new Exception('Не Jpg');
        }
        if(AddImageToDb($_FILES['userfile']['name'],$_POST['description'],$_COOKIE['userID']))
        {
            $tmp_name = $_FILES['userfile']['tmp_name'];
            $nameImage = basename($_FILES['userfile']['name']);
            move_uploaded_file($tmp_name, "images/$nameImage");
            header('Location: loadImage.php');
            die();
        }
        else
        {
            throw new Exception('Не удалось добавить файл');
        }
    } 
    catch(Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        header('Location: loadImage.php');
        die();
    } 
?>