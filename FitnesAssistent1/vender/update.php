<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$BMI = $weight / (($height / 100) * ($height /100));
$target = $_POST['target'];

echo $name;

mysqli_query($connect, "UPDATE `user` SET `name` = '$name', `password` = '$password', `email` = '$email', `weight` = '$weight', `height` = '$height', `BMI` = '$BMI', `target` = '$target' WHERE `user`.`id` = '$id");

header('Location: /');
?>
