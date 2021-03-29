<br>
<br>
<h5 class="text-center">Добавить запись</h5>
<br>

<form name="newRow" method="POST" action="index.php">
  <label>Книга: <input type="text" name="name"></label>
  <label>Описание: <input type="text" name="email"></label>
  <label>Год: <input type="number" name="yearB"></label>
  <label>Жанр: 
    <select name="genreN">
    <?php 
      $sql = "SELECT * FROM genres";
      $resultGenres = $conn->query($sql);
      foreach( $resultGenres as $row ){
        echo "<option value='$row[id]'>$row[name]</option>";
      }
    ?> 
    </select>
  </label>
  <label>Автор: 
    <select name="authorN">
    <?php 
      $sql = "SELECT * FROM authors";
      $resultAuthors = $conn->query($sql);
      foreach( $resultAuthors as $row ){
        echo "<option value='$row[id]'>$row[name]</option>";
      }
    ?> 
    </select>
  </label>
  

  <input type="submit" name="send" value="Отправить">
  </form>

  <?php
    if (isset($_POST)) {
        $sqlAdd = "INSERT INTO books (books.name, books.description, books.year, books.genreId, books.authorId) 
        VALUES ('$_POST[name]', '$_POST[email]', $_POST[yearB],  $_POST[genreN] , $_POST[authorN])";
        $conn->query($sqlAdd);
    }
  ?>