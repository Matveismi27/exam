<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
require_once "mysql.php";
$user_id = @$_COOKIE['user_id'];
if (empty($user_id)){
    echo "Чтобы пользоваться корзиной пользователь должен быть авторизован";
    return;
}
$query = "SELECT * FROM cart WHERE user_id = $user_id";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
?>

<body>

    <div class="grid-container catalog">
        <?php foreach ($res as $key => $value):?>

        <div class="grid-item product"><?=$value["name"]?></div>

        <?php endforeach;?>
    </div>

</body>
</html>