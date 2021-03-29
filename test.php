<form method="POST">
  <label>Стипендия: <input type="number" name="stipeng"></label>
<input type="submit" name="send" value="Найти">
</form>

<br>
<?php
if (isset($_POST['stipend'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT FAM, NAZV_S,STIP FROM STUDENT
            INNER JOIN SPEC ON SPEC.KOD_S = STUDENT.KOD_S
            WHERE STIP >=$_POST['stipend']";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {

        echo "
        <table>
        <tr>
        <th>ФАМИЛИЯ</th>
        <th>СПЕЦМАЛЬНОСТЬ</th>
        <th>СТИПЕНДИЯ</th>
        </tr>";

        while ($row = $result->fetch_assoc())
        {
            echo 
            "<tr>
                <td>$row[FAM]</td>
                <td>$row[NAZV_S]</td>
                <td>$row[STIP]</td>
            </tr>";
        }
        
        echo  "</table>";
    }
}
?>