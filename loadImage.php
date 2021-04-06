<?php #Страница для загрузки изображения
include_once('HomePage.php');
include('navbar.php');
?>
<form enctype="multipart/form-data" action="loadingImage.php" method="POST">
<div class="mx-auto mt-5" style="width: 50%;">
    <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
    <label for="formFile" class="form-label">Загрузить фото</label>
    <input class="form-control" name="userfile" type="file" id="formFile" multiple accept="image/*,image/jpg">
    <label for="formFile" class="form-label">Описание</label>
    <textarea class="form-control" name="description" id="formFile" rows="3"></textarea>
    <div class="mt-2">
    <input type="submit" value="Отправить файл" />
    </div>
</div>
</form>
