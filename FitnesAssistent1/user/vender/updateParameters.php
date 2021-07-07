<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$oldBMI = $BMI;
$BMI = $weight / (($height / 100) * ($height /100));
$target = $_POST['target'];

$userBMI = mysqli_query($connect, "SELECT * FROM `bmi` WHERE `user_id` = $id");
$userBMI = mysqli_fetch_all($userBMI);

$count = mysqli_query($connect, "SELECT COUNT(1) FROM `bmi`");
$count = mysqli_fetch_assoc($count);

$last_bmi = $count['COUNT(1)'];

$last_bmi = ($userBMI[$last_bmi - 1][2]);

if ($BMI != $last_bmi) {
    

mysqli_query($connect, "INSERT INTO `bmi` (`id`, `user_id`, `bmi`) VALUES (NULL, '$id', '$BMI')");

} 

mysqli_query($connect, "UPDATE `user` SET `weight` = '$weight', `height` = '$height', `BMI` = '$BMI', `target` = '$target' WHERE `user`.`id` = $id");

header('Location: ../mainScreen.php');
?>
