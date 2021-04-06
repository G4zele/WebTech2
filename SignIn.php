<?php #файл страницы входа пользователя
setcookie("userFindName", null, -1, '/');
session_start();
include_once('HomePage.php');
include('navbar.php');
?>
<link rel="stylesheet" href="css/styleReg.css">
<div class="container-xxl">
<form action="allowance.php" method="post">
  <div class="row mb">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Электронная почта</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name ="email" id="inputEmail3" placeholder="Введите электронную почту" required />
    </div>
  </div>
  <div class="row mb-3 mt-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10 mt-3">
      <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Введите пароль" value="<?= $_SESSION['IncompleteUser']->password ?>" required />
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="col-sm-10">
      <p><input class="btn btn-primary" name="submit" type="submit" value="Войти"></p>
      </div>
    </div>
  </div>
</div>
</form>
</div>