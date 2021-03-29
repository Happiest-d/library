<br>
<br>
<h5 class="text-center">Добавить запись</h5>
<br>

<form name="newRow" method="POST" action="auth.php">
  <label>Имя: <input type="text" name="name"></label>
  <label>Год рожения: <input type="date" name="yearB"></label>
  <label>Год смерти: <input type="date" name="yearD"></label>
  <input type="submit" name="send" value="Отправить">
  </form>

  <?php
    if (isset($_POST[name]) && ($_POST[name]!='')) {
        $sqlAdd = "INSERT INTO authors (authors.name, authors.DoB, authors.DoD) 
        VALUES ('$_POST[name]', ". preg_replace('~[^0-9]+~','',$_POST[yearB]) .", " . preg_replace('~[^0-9]+~','',$_POST[yearD]) . ")";
        $conn->query($sqlAdd);
    }
  ?>