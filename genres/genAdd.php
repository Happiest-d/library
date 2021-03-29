<br>
<br>
<h5 class="text-center">Добавить запись</h5>
<br>

<form name="newRow" method="POST" action="gen.php">
  <label>Название: <input type="text" name="name"></label>
  <label>Описание: <input type="text" name="description"></label>
  <input type="submit" name="send" value="Отправить">
  </form>

  <?php
    if (isset($_POST[name]) && ($_POST[name]!='')) {
        $sqlAdd = "INSERT INTO genres (genres.name, genres.description) 
        VALUES ('$_POST[name]', '$_POST[description]')";
        $conn->query($sqlAdd);
    }
  ?>