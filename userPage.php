<?php #файл страницы пользователя
include_once('HomePage.php');
include('navbar.php');
?>
<div class="container"><!-- контейнер для элементов -->
<div class="display-4 mx-auto mt-1" style="width:55%">Приветствуем <?php echo $_COOKIE["userName"]?>!</div>
<div class="blockquote mx-auto mt-1" style="width: 10%">Изображения</div>
<div id="carouselExampleControls" class="carousel slide mx-auto" style="width: 40%;" data-bs-ride="carousel"><!-- карусель -->
  <div class="carousel-inner mt-4 mx-auto"><!-- поле изображения -->
      <?php include('carouselPic.php') ?><!-- Файл "Паттерна" для заполнения карусели -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"><!-- кнопки для прокручивания -->
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="blockquote mx-auto mt-1" style="width: 20%">Карточки изображений</div>
<?php
  include('recentusersImages.php')#Файл генерации карточек пользователя
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
