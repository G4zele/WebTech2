<?php
function addNewUser ($userName, $userEmail, $userPassword) #Добавление нового пользователя
{
    try {
        $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
        $generatedID = rand ( 100000 , 999999 );
        $query='INSERT INTO public."Users"("userId", "userName", "userEmail", "userPass") VALUES (:userId , :userName, :userEmail, :userPass)';
        $parameters = [
            ':userName'=> $userName,
            ':userEmail'=> $userEmail,
            ':userPass'=> password_hash($userPassword, PASSWORD_DEFAULT),
            ':userId'=> $generatedID
        ];
        setcookie("userID", $generatedID);
        setcookie("userName", $userName);
        setcookie("userEmail", $userEmail);
        $request=$database->prepare($query);
        $request->execute($parameters);
    } catch (\Throwable $th) {
                print($th->getMessage());
      }
}
?>