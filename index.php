<?php #Главная страница
include_once('HomePage.php');
include('navbar.php');
?>
<div class="container "><!-- Контейнер для текста в содержимом страницы -->
<div class="row">
  <div class="col align-self-start">
    <div class ="display-5">Последние добавленные изображения</div>
  </div>
</div>
</div>
<div class="container"><!-- контейнер для изображения -->
<?php
  include('recentImages.php')#Генератор последних 20 и меньше изображений
?>
</div>
  