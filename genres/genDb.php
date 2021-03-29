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
    require 'genres.php';

    require 'genAdd.php';

    require 'genCh.php';

    require 'genRm.php';
  } else if(isset($_SESSION[username]) && $_SESSION[admin]){
    require 'genres.php';

    require 'genAdd.php';

    require 'genCh.php';

    require 'genRm.php';
  } else {
    require 'genres.php';
  }

// require 'genres.php';

// require 'genAdd.php';

// require 'genCh.php';

// require 'genRm.php';

$conn->close();
?>