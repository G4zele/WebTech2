<?php
    function GetUserData($userId) #Получение данных о пользователе по ID
    {
        try {
            $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
            $query='SELECT "userId", "userName", "userEmail"
            FROM public."Users"
            WHERE public."Users"."userId" = :userId';
            $parameters = [
                ':userId'=> $userId,
            ];
            $request=$database->prepare($query);
            $request->execute($parameters);
            return $request->fetch();
            } 
        catch (\Throwable $th) 
        {
                    print($th->getMessage());
                    return null;
        }
    }
?>