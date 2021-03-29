<?php
$sql = "SELECT * FROM authors";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{

    echo "
    <table class='table table-striped'>
    <thead><tr>
      <th scope='col'>id</th>
      <th scope='col'>Имя</th>
      <th scope='col'>Дата рождения</th>
      <th scope='col'>Дата смерти</th>
    </tr></thead>
    <tbody>";

    while ($row = $result->fetch_assoc())
    {
        echo 
        "<tr>
            <td scope='row'>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[DoB]</td>
            <td>$row[DoD]</td>
        </tr>";
    }
    
    echo  "</tbody></table>";

}
?>
