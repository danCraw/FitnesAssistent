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
$calories = $_POST['calories'];


$query = mysqli_query($connect, "SELECT * FROM `products` WHERE `name`= '".mysqli_real_escape_string($connect, $_POST['name'])."'");

    if(mysqli_num_rows($query)>0) {
        header('Location: ../addProduct.php');
    } else {
    
     mysqli_query($connect,"INSERT INTO `products` (`id`, `name`, `calories`) VALUES (NULL, '$name', '$calories')");
    
    header('Location: ../mainScreen.php');
    }
    ?>
    <br>
    <br>
    <a href="../addProduct.php">Go back</a>
    <?
    
?>