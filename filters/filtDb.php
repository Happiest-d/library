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

require 'filters.php';

$conn->close();
?>