<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    include "header.php";
    require_once "mysql.php";
    if (@$_COOKIE["is_login"]=="true"):
?>
    <a href="index.php?logout=logout">Выйти из аккаунта</a>
<?php
        return;
    endif;
    ?>
    <div class="container">
        <form  method="POST">
             <input type="text" name="email" require> почта <br>
             <input type="password" name="password"> пароль <br>
             <input type="submit" value="Войти"><br>
            </form>
            <a href="register.php">Зарегистрироваться</a>
    </div>
    <?php
    if (!empty($_POST["email"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = "SELECT password, id FROM user WHERE email = '$email'";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        $result= mysqli_fetch_assoc($res);
        $pass= @$result["password"];
        if ($password == $pass){
            setcookie('is_login', 'true');
            setcookie('user_id', $result["id"]);
            
            header('Location: index.php'); 
        }else{
            echo "<script>alert('Неправильный логин или пароль')</script>";
        }
    }
    ?>
</body>
</html>