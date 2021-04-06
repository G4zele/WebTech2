<?php #Подтверждение доступа к аккаунту
session_start();
require_once('method/checkSign.php');
require('Account.php');
$user=new Account();
$user->email=trim($_POST['email']);
$user->password=$_POST['password'];
try {
    if(!checkEmail($user->email)) { #Проверка почты
        throw new Exception('Пользователь с такой почтой не найден');
    } else if(!checkPassword($user->email, $user->password)) {#Проверка пароля
        throw new Exception('Неправильно введен пароль');
    }
    $_SESSION['user']=$user;
    setcookie("loggedIn",true);
    $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123'); #Запрос для заполнения "КуК"
    $query = 'SELECT "userId", "userName" FROM "Users" WHERE "userEmail" = :email';
    $request=$database->prepare($query);
    $request->bindParam(':email', $user->email);
    $request->execute();
    $req=$request->fetch();
    setcookie("userID",$req[0]);
    setcookie("userName", $req[1]);
    setcookie("userEmail", $user->email);
    header('Location: index.php');
} catch(Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    header('Location: SignIn.php');
    unset($user);
    die();
}

?>