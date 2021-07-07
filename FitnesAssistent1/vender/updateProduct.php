<?php
require_once '../config/connect.php';

$name = $_POST['name'];
$calories = $_POST['calories'];
$id = $_POST['id'];

mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `calories` = '$calories' WHERE `products`.`id` = '$id'");

header('Location: /');
?>
