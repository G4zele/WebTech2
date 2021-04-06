<?php #Файл класса для обработки основных данных пользователя
class Account
  {
      public $email;
      public $password;
      public $name;
      public $consent;
      
      function SetAccountValueReg()
      {
          $this->email = trim($_POST['email']);
          $this->password = trim($_POST['password']);
          $this->name = trim($_POST['name']);
      }
    }
?>