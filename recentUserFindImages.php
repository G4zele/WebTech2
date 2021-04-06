<?php #Генератор карточек для страницы стороннего пользователя
    $database=new PDO('pgsql:host=127.0.0.1;dbname=WebTech2','WebTech2','123');
    $query='SELECT "userId"
    FROM public."Users"
    WHERE public."Users"."userName" = :userName';
    $parameters = [
        ':userName'=> $_POST["nameInfo"],
    ];
    $request=$database->prepare($query);
    $request->execute($parameters); #Выполнение запроса для получения Id пользователя
    $userId = $request->fetch();
    include('method/getPics.php');
    $picData = getPicturesWithId($userId[0]);
    $picTmp = $picData->fetchAll();
    echo"<div class=\"row justify-content-start mt-2\" id=\"PicsHolder\">";
        for($j = 0; $j<count($picTmp);$j++)#Генерация изображений
        {
            if($picTmp[$j][2]!=0)
            {
                $averageMark = $picTmp[$j][1]/$picTmp[$j][2];
                $averageMark = round($averageMark,1);
            }
            else
            {
                $averageMark = 0;
            }
            echo"<div class=\"col-3\">
                    <div class=\"card\" >
                    <img src=\"images/{$picTmp[$j][0]}\" id=\"myImg$j\" class=\"card-img-top\" >
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$picTmp[$j][0]}</h5><!--название-->
                            <p class=\"card-text\">Описание:</br>{$picTmp[$j][4]}</p><!--описание-->
                            <p class=\"blockquote-6\">Добавлено:</br>{$picTmp[$j][3]}</p>
                            <p class=\"blockquote-6\">Оценка:{$averageMark}</br>Проголосовало:{$picTmp[$j][2]}</p>
                            <form action=\"findUser.php\" method=\"POST\">
                            <input type=\"hidden\" type=\"text\" name=\"nameInfo\" value=\"{$picTmp[$j][5]}\">
                            <button class=\"btn btn-primary\" type=\"submit\">Пользователь</button>
                            </form>
                            <form action=\"putMark.php\" method=\"POST\">
                            <label for=\"customRange2\" class=\"form-label\">Поставить оценку</label>
                            <input type=\"hidden\" type=\"text\" name=\"nameInfo\" value=\"{$picTmp[$j][0]}\">
                            <input name=\"markInfo\" type=\"range\" class=\"form-range\" min=\"1\" max=\"5\" id=\"customRange2\">
                            <button class=\"btn btn-primary\" type=\"submit\">Поставить</button>
                            </form>
                        </div>
                    </div>
                </div>";
        }
    echo"</div>";
?>

<div id="myModal" class="modal"><!-- Модальное окно-->
  <span class="close">×</span>
  <img class="modal-content" id="img01" style="max-height: 95%;">
  <div id="caption"></div>
</div>

<script>
var modal = document.getElementById('myModal'); //Скрипт для активации модального окна при нажатии на картинку в карточке
var buttons =
document.getElementById('PicsHolder');
buttons.onclick = function(e) {
    var img = document.getElementById(e.target.id);
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    if(e.target.id.indexOf('myImg') + 1) {
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
    }
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
