<h4>Найти книги (фильтр по названию)</h4>
<form name="newRow" method="POST" action="filt.php">
  <label>Книга: <input type="text" name="findName"></label>
<input type="submit" name="send" value="Найти">
</form>
<br>
<?php
if (isset($_POST)) {
    $sql = "SELECT books.id, books.name, books.description, books.year, authors.name AS 'author', genres.name AS 'genre' FROM books
            INNER JOIN authors ON books.authorId = authors.id
            INNER JOIN genres ON books.genreId =  genres.id
            WHERE books.name like '%$_POST[findName]%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {

        echo "
        <table class='table table-striped'>
        <thead><tr>
        <th scope='col'>id</th>
        <th scope='col'>Название</th>
        <th scope='col'>Описание</th>
        <th scope='col'>Год</th>
        <th scope='col'>Жанр</th>
        <th scope='col'>Автор</th>
        </tr></thead>
        <tbody>";

        while ($row = $result->fetch_assoc())
        {
            echo 
            "<tr>
                <td scope='row'>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[description]</td>
                <td>$row[year]</td>
                <td>$row[genre]</td>
                <td>$row[author]</td>
            </tr>";
        }
        
        echo  "</tbody></table>";
    }
}
?>
