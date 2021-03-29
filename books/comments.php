<?php
$sql = "SELECT comments.id, books.name AS 'bookName', users.username AS 'commentAuthor', comments.text FROM comments
        INNER JOIN users ON comments.userId = users.id
        INNER JOIN books ON comments.bookId = books.id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{

    echo "
    <br>
    <h4 class='text-center'>Комментарии</h4>
    <table class='table table-striped'>
    <br>
    <thead><tr>
      <th scope='col'>id</th>
      <th scope='col'>Книга</th>
      <th scope='col'>Пользователь</th>
      <th scope='col'>Комментарий</th>
    </tr></thead>
    <tbody>";

    while ($row = $result->fetch_assoc())
    {
        echo 
        "<tr>
            <td scope='row'>$row[id]</td>
            <td>$row[bookName]</td>
            <td>$row[commentAuthor]</td>
            <td>$row[text]</td>
        </tr>";
    }
    
    echo  "</tbody></table>";

    //if ($conn->query("DELETE FROM books WHERE id > 6;") === TRUE) echo 'Удалено';

}
?>