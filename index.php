<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
require_once "mysql.php";
$query = 'SELECT product.id, product.name, picture_src, category.name as category_name  FROM product JOIN category on category.id = category_id';
$res = mysqli_query($link, $query) or die(mysqli_error($link));

?>

<body>
<div class="container">
    <div class="grid-container catalog">
        <?php foreach ($res as $key => $value):?>
        
    <div class="grid-item grid-container product">
        <img class="grid-item" src="<?=$value["picture_src"]?>" alt="картинка">
        <h4><?=$value["name"]?></h4>
        <div class="category"><?=$value["category_name"]?></div>
        <a class="btn" href="product.php?id=<?=$value["id"]?>"> Купить</a>
    </div>

        <?php endforeach;?>
    </div>
</div>

</body>
</html>