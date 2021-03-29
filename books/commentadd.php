<?php
session_start();
?>
<br>
<h5 class="text-center">Добавить комментарий</h5>
<br>

<form name="newRow" method="POST" action="index.php">
  <label>Книга: 
    <select name="bookN">
    <?php 
      $sql = "SELECT * FROM books";
      $resultGenres = $conn->query($sql);
      foreach( $resultGenres as $row ){
        echo "<option value='$row[id]'>$row[name]</option>";
      }
    ?> 
    </select>
  </label>
  <label>Комментарий: <input type="text" name="сommentText"></label>
  <input type="submit" name="send" value="Отправить">
  </form>

  <?php
    if (isset($_POST[bookN]) && isset($_SESSION[userid]) && isset($_POST[сommentText]) && $_POST[сommentText]!='') {
        $sqlAdd = "INSERT INTO comments (comments.bookId, comments.userId, comments.text)
        VALUES ($_POST[bookN],$_SESSION[userid],'$_POST[сommentText]');";
        echo $sqlAdd;
        $conn->query($sqlAdd);
    } else if (isset($_POST[bookN]) && isset($_COOKIE[userid]) && isset($_POST[сommentText]) && $_POST[сommentText]!='') {
        $sqlAdd = "INSERT INTO comments (comments.bookId, comments.userId, comments.text)
        VALUES ($_POST[bookN],$_COOKIE[userid],'$_POST[сommentText]');";
        echo $sqlAdd;
        $conn->query($sqlAdd);
    }
  ?>