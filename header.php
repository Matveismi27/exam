<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
    if (@$_GET["logout"]=="logout"){
        setcookie('is_login', 'false');
        unset($_COOKIE['user_id']);
    }
?>
<nav>
    <ul>
    <li><a href="index.php">Главная</a></li>
    <li><a href="login.php">Вход</a></li>
    <li><a href="cart.php">Корзина</a></li>
    </ul>
</nav>
<?php
?>