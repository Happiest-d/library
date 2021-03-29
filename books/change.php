<br>
<h5 class="text-center">Изменить запись</h5>
<form name="chRowId" method="POST" action="index.php"> 
  <label>Id: 
    <select name="Cid">
    <?php 
      foreach( $result as $row ){
        echo "<option value='$row[id]'>$row[id]</option>";
      }
    ?> 
    </select>
  </label>
  <input type="submit" name="send" value="Выбрать">
</form>
<br>

<?php
if(isset($_POST[Cid])){
    $sqlById = "SELECT * FROM books WHERE books.id = $_POST[Cid]";
    $updRow = $conn->query($sqlById); 
    $Cbook = mysqli_fetch_assoc($updRow);
}
?>

<form name="chRow" method="POST" action="index.php">
  <label>Id: 
    <select name="Chageid">
    <?php 
        echo "<option selected value='$Cbook[id]'>$Cbook[id]</option>";
    ?> 
    </select>
  </label>
  <label>Книга: <input type="text" name="Cname" value="<?php echo $Cbook[name] ?>"></label>
  <label>Описание: <input type="text" name="Cdescription" value="<?php echo $Cbook[description] ?>"></label>
  <label>Год: <input type="number" name="CyearB" value="<?php echo $Cbook[year] ?>"></label>
  <label>Жанр: 
    <select name="CgenreN">
    <?php 
      $sql = "SELECT * FROM genres";
      $resultGenres = $conn->query($sql);
      foreach( $resultGenres as $row ){
        if ($row[id] == $Cbook[genreId]) {
            echo "<option selected value='$row[id]'>$row[name]</option>";
        } else {
            echo "<option value='$row[id]'>$row[name]</option>";
        }
      }
    ?> 
    </select>
  </label>
  <label>Автор: 
    <select name="CauthorN">
    <?php 
      $sql = "SELECT * FROM authors";
      $resultAuthors = $conn->query($sql);
      foreach( $resultAuthors as $row ){
        if ($row[id] == $Cbook[authorId]) {
            echo "<option selected value='$row[id]'>$row[name]</option>";
        } else {
            echo "<option value='$row[id]'>$row[name]</option>";
        }
      }
    ?> 
    </select>
  </label>

  <input type="submit" name="send" value="Изменить">
</form>

  <?php
    if (isset($_POST) && isset($_POST[Cname])) {
        // echo "Id: " . $_POST['Chageid'];
        // echo "<br>Книга: " . $_POST['Cname'];
        // echo "<br>Описание: " . $_POST['Cdescription'];
        // echo "<br>Год: " . $_POST['CyearB']; 
        // echo "<br>Год: " . $_POST['CgenreN'];
        // echo "<br>Год: " . $_POST['CauthorN'];

        $sqlChange = "UPDATE books SET books.name = '$_POST[Cname]', books.description = '$_POST[Cdescription]', 
        books.year = $_POST[CyearB], books.genreId =  $_POST[CgenreN], books.authorId = $_POST[CauthorN]
        WHERE books.id = $_POST[Chageid]";
        $conn->query($sqlChange); 
        echo $sqlChange;
    }
  ?>