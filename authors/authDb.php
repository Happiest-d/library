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
    require 'authors.php';

    require 'authAdd.php';

    require 'authCh.php';

    require 'authRm.php';
  } else if(isset($_SESSION[username]) && $_SESSION[admin]){
    require 'authors.php';

    require 'authAdd.php';

    require 'authCh.php';

    require 'authRm.php';
  } else {
    require 'authors.php';
  }

// require 'authors.php';

// require 'authAdd.php';

// require 'authCh.php';

// require 'authRm.php';

$conn->close();
?>