<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['e-mail'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$sex = $_POST['sex'];
$BMI = $weight / (($height / 100) * ($height /100));
$target = $_POST['target'];


$query = mysqli_query($connect, "SELECT * FROM `user` WHERE `email`= '".mysqli_real_escape_string($connect, $_POST['e-mail'])."'");

if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {

    if(mysqli_num_rows($query)>0) {
        header('Location: ../registration.php');
    } else {
    
     mysqli_query($connect,"INSERT INTO `user` (`id`, `name`, `password`, `email`, `weight`, `height`, `BMI`, `target`)
      VALUES (NULL, '$name', '$password', '$email', '$weight', '$height', '$BMI', '$target')");
    
    header('Location: /');
    }
    
    } else {
    
    echo "Адрес указан не корректно.";
    ?>
    <br>
    <br>
    <a href="../registration.php">Go back</a>
    <?
    
    }

?>