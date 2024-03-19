<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <?php
    include "header.php";
    require_once "mysql.php";
    ?>
    <div class="container">
        <form method="POST">
             <input type="email" name="email" require> email <br>
             <input type="password" name="password"> пароль <br>
             <input type="password" name="password2"> повтор пароля <br>
             <input type="submit" value="Зарегистрироваться"><br>
            </form>
            <a href="login.php">Вход</a>
    </div>

    <?php
    if (!empty($_POST["email"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if ($password == $password2){
            $query = "INSERT INTO user (email, password) VALUES ('$email','$password')";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));

            header('Location: login.php'); 
        }else{
            echo "<script>alert('Пароли не совпадают')</script>";
        }
    }
    ?>
</body>
</html>