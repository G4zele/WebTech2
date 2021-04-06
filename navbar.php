<nav class="navbar navbar-expand-lg navbar-light bg-light"><!--Навигационная панель с кнопками-->
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Photos Labs</a>
    <span class="navbar-text">
      Сайт о изображениях
    </span>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex" action="findUser.php" method="POST">
        <input class="form-control mt-2 mx-2" type="text" name="nameInfo" placeholder="Поиск" aria-label="post">
        <button class="btn btn-primary mt-2 mx-2" type="submit">Найти</button>
        <?php if (!htmlspecialchars($_COOKIE["loggedIn"])):?>
            <a class="btn btn-secondary mt-2 mx-2" href="registration.php" role="button">Регистрация</a>
            <a class="btn btn-secondary mt-2 mx-2" href="SignIn.php" role="button">Вход</a>
          <?php else: ?>
            <a class="btn btn-secondary mt-2 mx-2" href="loadImage.php" role="button">Загрузить</a>
            <a class="btn btn-secondary mt-2 mx-2" href="userPage.php" role="button">Пользователь</a>
            <a class="btn btn-secondary mt-2 mx-2" href="Exit.php" role="button">Выход</a>
          <?php endif; ?>
      </form>
    </div>
  </div>
</nav>