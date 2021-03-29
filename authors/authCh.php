<br>
<h5 class="text-center">Изменить запись</h5>
<form name="chRowId" method="POST" action="auth.php"> 
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
    $sqlById = "SELECT * FROM authors WHERE authors.id = $_POST[Cid]";
    $updRow = $conn->query($sqlById); 
    $Cauthor = mysqli_fetch_assoc($updRow);
}
?>

<form name="chRow" method="POST" action="auth.php">
  <label>Id: 
    <select name="Chageid">
    <?php 
        echo "<option selected value='$Cauthor[id]'>$Cauthor[id]</option>";
    ?> 
    </select>
  </label>
  <label>Имя: <input type="text" name="Cname" value="<?php echo $Cauthor[name] ?>"></label>
  <label>Дата рождения: <input type="date" name="yearB" value="<?php echo $Cauthor[DoB] ?>"></label>
  <label>Дата смерти: <input type="date" name="yearD" value="<?php echo $Cauthor[DoD] ?>"></label>
  <input type="submit" name="send" value="Изменить">
</form>

  <?php
    if (isset($_POST) && isset($_POST[Cname])) {
        $sqlChange = "UPDATE authors SET authors.name = '$_POST[Cname]', 
        authors.DoB = ". preg_replace('~[^0-9]+~','',$_POST[yearB]) .", 
        authors.DoD =" . preg_replace('~[^0-9]+~','',$_POST[yearD]) . "
        WHERE authors.id = $_POST[Chageid]";
        echo $sqlChange;
        $conn->query($sqlChange); 
    }
  ?>