<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

$product_id = $_GET['product_id'];

$user_id = $_GET['user_id'];

$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$product_id'");
$product = mysqli_fetch_assoc($product);

$user = mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = '$user_id'");
$user = mysqli_fetch_assoc($user);

$eatenToday = $user['eatenToday'] + $product['calories'];

mysqli_query($connect, "UPDATE `user` SET `eatenToday` = '$eatenToday' WHERE `user`.`id` = '$user_id'");

header('Location: ../eat.php?id='.$user_id);

?>

    