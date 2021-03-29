<?php
session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "isis";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}
echo "<p class='text-center'>Connection succesful!</p>";

if(isset($_COOKIE[username]) && $_COOKIE[admin]){
    require 'books/books.php';

    require 'books/add.php';

    require 'books/change.php';

    require 'books/rmRow.php';

    require 'books/comments.php';

    require 'books/commentadd.php';
  } else if(isset($_SESSION[username]) && $_SESSION[admin]){
    require 'books/books.php';

    require 'books/add.php';

    require 'books/change.php';

    require 'books/rmRow.php';

    require 'books/comments.php';

    require 'books/commentadd.php';
  } else if(isset($_SESSION[username])){
    require 'books/books.php';

    require 'books/comments.php';
    
    require 'books/commentadd.php';
  } else if(isset($_COOKIE[username])){
    require 'books/books.php';

    require 'books/comments.php';
    
    require 'books/commentadd.php';
  } else {
    require 'books/books.php';

    require 'books/comments.php';
  }

$conn->close();
?>