<?php
session_start();
    function register($login, $email, $pass) {
        if ($login=='' || $email=='' || $pass==''){
           echo "<br>Введены некоректные значения<br>";
           return false;
        }

        if ((strlen($pass) < 5) || (strlen($pass) > 15) || !preg_match("#^[aA-zZ0-9]+$#", $pass)){
            echo "<br>Некорректный пароль<br>";
            return false;
        }

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "isis";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error)
        {
            die("Connection failed: " .$conn->connect_error);
        }

        $findUser = "SELECT * FROM users WHERE username='$login'";
        $result = $conn->query($findUser);
        $user = mysqli_fetch_assoc($result);


        if($result->num_rows == 0) {
            $addUser = "INSERT INTO users (users.username, users.email, users.password) 
            VALUES ('$login','$email', '$pass')";

            if ($conn->query($addUser)){ 
                $_SESSION['userid']=$user['id'];
                $_SESSION['username']=$login;
                if($user[isadmin]==1) {
                    $_SESSION['admin']=true;
                }
                echo "We have new user!<br>";
                echo "Hello, $login!<br>";
            }
        } else {
            echo "Пользователь с таким именем уже существует!";
            return false;
        }

        $conn->close();

        return true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="shortcut icon" href="books/book-logo-1.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h4>Регистрация</h4>

    <?php
    if(isset($_COOKIE[username])){
        echo "<h4>Welcome, $_COOKIE[username]!</h4>";
        if($_COOKIE[admin]) echo "<h4>You're an admin!</h4>";
    } else if(isset($_SESSION[username])){
        echo "<h4>Welcome, $_SESSION[username]!</h4>";
        if($_SESSION[admin]) echo "<h4>You're an admin!</h4>";
    } else echo "<h4>Welcome, guest!</h4>";
   ?>

    <br>
    <form action="registration.php" method="post">
        <label>Логин: <input type="text" name="username"></label>
        <label>eMail: <input type="email" name="email"></label>
        <label>Пароль: <input type="password" name="password"></label>
        <label><input type="submit" value="Зарегистрироваться"></label>
    </form>

    <?php
        if(isset($_POST['username'])) register($_POST[username],$_POST[email],$_POST[password]);
    ?>
    <br>
    <h4>Уже зарегистрированы?</h4>
    <br>
    <a href='/login.php' class='btn btn-lg btn-primary'>Войти</a>
    <br>
    <br>
    <a href='/' class='btn btn-lg btn-primary'>На главную</a>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</body>
</html>