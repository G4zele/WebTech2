<?php
function PutMarks ($nameInfo, $markInfo) #Выставление оценок
{
    $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');#Получение имеющихся оценок изображения
    $query='SELECT "picId", "picRate", "picRateCount"
    FROM public."Pics"
    WHERE public."Pics"."picName" = :picName
    ORDER BY "picAddTime" DESC';
    $parameters = [
        ':picName'=> $nameInfo,
    ];
    $request=$database->prepare($query);
    $request->execute($parameters);
    $requestBody=$request->fetchAll();
    $picId = $requestBody[0][0];
    $oldMark = $requestBody[0]["picRate"] + $markInfo;
    $oldMarkCount = $requestBody[0]["picRateCount"] + 1;  #Обновление оценок изображения
    $query='UPDATE public."Pics"                      
    SET  "picRate"=:newMark, "picRateCount"=:newCount
    WHERE public."Pics"."picId" = :picId;';
    $parameters = [
        ':newMark'=> $oldMark,
        ':newCount'=> $oldMarkCount,
        ':picId'=> $picId,
    ];
    $request=$database->prepare($query);
    $request->execute($parameters);
}
?>