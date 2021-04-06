<?php #Страница стороннего пользователя
include_once('HomePage.php');
include('navbar.php');
?>

<div class="container"><!-- контейнер для изображения -->
<div class="display-4 ">Библиотека пользователя: <?php echo $_POST["nameInfo"] ?></div>
<?php
  include('recentUserFindImages.php')#генератор картинок стороннего пользователя
?>
</div>