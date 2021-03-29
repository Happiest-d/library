<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <link rel="shortcut icon" href="books/book-logo-1.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
</head>
<body>
  <header class="text-center">
  <h2>Библиотека</h2>

  <?php
  if(isset($_COOKIE[username])){
    echo "<h4>Welcome, $_COOKIE[username]!</h4>";
    if($_COOKIE[admin]) echo "<h4>You're an admin!</h4>";
  } else if(isset($_SESSION[username])){
    echo "<h4>Welcome, $_SESSION[username]!</h4>";
    if($_SESSION[admin]) echo "<h4>You're an admin!</h4>";
  } else echo "<h4>Welcome, guest!</h4>";
   ?>

  <a href="/">Книги</a>
  <a href="/authors/auth.php">Авторы</a>
  <a href="/genres/gen.php">Жанры</a>
  <a href="/filters/filt.php">Фильтры</a>
  <br>
  <a href="/login.php">Войти</a>
  <a href="/registration.php">Регистрация</a>
  <a href="/logout.php">Выйти</a>
  </header>

  <div class="container-fluid">
  <div class="row">
      <div class="col">
        <form >
          <input class='btn btn-primary btn-lg btn-block' type="submit" name="send" value="Обновить">
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php require 'books/db.php' ?>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</body>
</html>