<?php 
session_start();
if ($_SESSION['remember']=true) {
    setcookie('userid', $_SESSION[userid], time()+3600, '/');
    setcookie('username', $_SESSION[username], time()+3600, '/');
    setcookie('admin', $_SESSION[admin], time()+3600, '/');
}
header('Location: /');
exit;
?>