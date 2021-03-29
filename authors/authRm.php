<br>
<br>
<h5 class="text-center">Удалить запись</h5>
<br>

<form name="newRow" method="POST" action="auth.php">
  <label>Id Записи: 
      <select name="rmId">
      <?php 
        foreach( $result as $row ){
          echo "<option value='$row[id]'>$row[id]</option>";
        }
      ?> 
      </select>
  </label>
  <input type="submit" name="send" value="Удалить">
</form>

<?php
    if (isset($_POST)) {
        $sqlRM = "DELETE FROM authors
        WHERE id = $_POST[rmId]";
        $conn->query($sqlRM);
        echo "<br>";
    }
?>