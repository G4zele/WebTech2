<?php #Функция добавления изображения к Базе данных
    function AddImageToDb($name, $description, $userId) 
    {
        try {
            $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
            $generatedID = rand ( 100000 , 999999 );
            $query='INSERT INTO public."Pics"(
                "picId", "picName", "picRate", "picRateCount", "picAddTime", "userId", "picDescript")
                VALUES (:picId, :picName, :picRate, :picRateCount, :picAddTime, :userId, :picDescript);';
            $parameters = [
                ':picId'=> $generatedID,
                ':picName'=> $name,
                ':picRate'=> 0,
                ':picRateCount'=> 0,
                ':picAddTime'=> date(DATE_RSS),
                ':userId'=> $userId,
                ':picDescript'=> $description,
            ];
            $request=$database->prepare($query);
            $request->execute($parameters);
            return true;
            } 
        catch (\Throwable $th) 
        {
                    print($th->getMessage());
                    return false;
        }
    }
?>