<br>
<h5 class="text-center">Изменить запись</h5>
<form name="chRowId" method="POST" action="gen.php"> 
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
    $sqlById = "SELECT * FROM genres WHERE genres.id = $_POST[Cid]";
    $updRow = $conn->query($sqlById); 
    $Cgenre = mysqli_fetch_assoc($updRow);
}
?>

<form name="chRow" method="POST" action="gen.php">
  <label>Id: 
    <select name="Chageid">
    <?php 
        echo "<option selected value='$Cgenre[id]'>$Cgenre[id]</option>";
    ?> 
    </select>
  </label>
  <label>Жанр: <input type="text" name="Cname" value="<?php echo $Cgenre[name] ?>"></label>
  <label>Описание: <input type="text" name="description" value="<?php echo $Cgenre[description] ?>"></label>
  <input type="submit" name="send" value="Изменить">
</form>

  <?php
    if (isset($_POST) && isset($_POST[Cname])) {
        $sqlChange = "UPDATE genres SET genres.name = '$_POST[Cname]', genres.description = '$_POST[description]'
        WHERE genres.id = $_POST[Chageid]";
        $conn->query($sqlChange); 
    }
  ?>