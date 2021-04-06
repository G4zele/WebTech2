<?php
    function getPicturesWithId($userId) #получение массива картинок из базы данных сортируя по ID
    {
        try {
            $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
            $query='SELECT "picName", "picRate", "picRateCount", "picAddTime",  "picDescript"
            FROM public."Pics"
            WHERE public."Pics"."userId" = :userId
            ORDER BY "picAddTime" DESC';
            $parameters = [
                ':userId'=> $userId,
            ];
            $request=$database->prepare($query);
            $request->execute($parameters);
            return $request;
            } 
        catch (\Throwable $th) 
        {
                    print($th->getMessage());
                    return null;
        }
    }
    function getPictures() #получение массива всех картинок из базы данных 
    {
        try {
            $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
            $query='SELECT "picName", "picRate", "picRateCount", "picAddTime",  "picDescript", "userName"
            FROM public."Pics" join public."Users" on public."Pics"."userId" = public."Users"."userId"
            ORDER BY "picAddTime" DESC';
            $request=$database->prepare($query);
            $request->execute();
            return $request;
            } 
        catch (\Throwable $th) 
        {
                    print($th->getMessage());
                    return null;
        }
    }
?>