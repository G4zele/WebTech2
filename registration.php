<?php #Страница регистрации пользователя
setcookie("userFindName", null, -1, '/');
require_once("Account.php");
include_once('HomePage.php');
include('navbar.php');
?>
<link rel="stylesheet" href="css/styleReg.css">
<div class="container-xxl">
<form action="validation.php" method="post">
  <div class="row mb-3">
    <label for="inputName3" class="col-sm-2 col-form-label">Имя</label>
    <div class="col-sm-10">
      <input type="name" class="form-control" name="name"  id="inputName3" placeholder="Имя" value="<?= $_SESSION['IncompleteUser']->name ?>" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Электронная почта</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name ="email" id="inputEmail3" placeholder="Почта" value="<?= $_SESSION['IncompleteUser']->email ?>" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Пароль" value="<?= $_SESSION['IncompleteUser']->password ?>" required />
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPasswordReplay3" class="col-sm-2 col-form-label">Повторите пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password2" id="inputPasswordReplay3" placeholder="Повторите пароль" required />
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="consent" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Согласие на обработку данных
        </label>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="col-sm-10">
      <p><input name="submit" type="submit" ></p>
      <?php
      if ($_SESSION['message']) {
        echo '<p class="btn btn-outline-success"> ' . $_SESSION['message'] . '</p>';
      }
  unset($_SESSION['message']);
  unset($_SESSION['IncompleteUser']);
  ?>
      </div>
    </div>
  </div>
</div>

</form>
</div>

