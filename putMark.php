<?php #Файл предварительной обработки оценки 
    $nameInfo = $_POST["nameInfo"];
    $markInfo = $_POST["markInfo"];
    require_once("method/marks.php");
    PutMarks ($nameInfo, $markInfo);
    header("Location: index.php");
?>