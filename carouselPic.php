<?php #Файл генерации данных для "карусели"
    include('method/getPics.php');
    $picData = getPicturesWithId($_COOKIE['userID']);#Выборка картинок
    $picTmp = $picData->fetchAll();
        for($j = 0; $j<count($picTmp);$j++)
        {   
            if($j == 0)#Первая картинка обязательно должна быть "активной"
            {
                echo"
                <div class=\"carousel-item active\">";
            }
            else
            {
                echo"
                <div class=\"carousel-item\">";
            }
            echo"
                <img src=\"images/{$picTmp[$j][0]}\" class=\"d-block w-100\" alt=\"{$picTmp[$j][0]}\">
            </div>"; #Данные о изображении
        }
?>