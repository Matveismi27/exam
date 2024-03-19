<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
require_once "mysql.php";
$user_id = @$_COOKIE['user_id'];
$is_login = @$_COOKIE['is_login'];
if (empty($user_id) ||$is_login=="false"){
    echo "Чтобы пользоваться корзиной пользователь должен быть авторизован";
    return;
}
$query = "SELECT * FROM cart JOIN 
product on product.id=product_id
 WHERE user_id = $user_id ";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
?>

<body>

<div class="container">
    <div class="grid-container catalog">
        <?php foreach ($res as $key => $value):?>
        
    <div class="grid-item grid-container product">
        <img class="grid-item" src="<?=$value["picture_src"]?>" alt="картинка">
        <h4><?=$value["name"]?></h4>
        <a class="btn" href="product.php?id=<?=$value["id"]?>"> Удалить</a>
    </div>

        <?php endforeach;?>
    </div>
</div>

</body>
</html>