<?php #Очистка "Кук" при выходе
    setcookie('loggedIn', false);
    setcookie("userID", null, -1, '/');
    setcookie("userName", null, -1, '/');
    setcookie("userEmail", null, -1, '/');
    header('Location: index.php');
?>