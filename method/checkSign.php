<?php
function checkEmail($email) #Проверка почты
{
    $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123'); 
    $query = 'SELECT "userEmail" FROM "Users" WHERE "userEmail" = :email';
    $request=$database->prepare($query);
    $request->bindParam(':email', $email);
    $request->execute();
    $data=$request->fetchObject();
    return $data;
}
function checkPassword($email, $password) #Проверка пароля
{
    $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123'); 
    $query = 'SELECT "userPass" FROM "Users" WHERE "userEmail" = :email';
    $request=$database->prepare($query);
    $request->bindParam(':email', $email);
    $request->execute();
    $hashPassword=$request->fetch();
    return password_verify($password,$hashPassword[0] );
}
?>