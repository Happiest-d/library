<?php
session_start();
setcookie('username', $_SESSION[username], time()-3600, '/');
setcookie('password', $_SESSION[password], time()-3600, '/');
setcookie('admin', $_SESSION[admin], time()-3600, '/');
session_destroy();
header('Location: /');
exit;
?>