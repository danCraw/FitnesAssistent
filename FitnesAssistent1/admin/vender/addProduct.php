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
        ?>
        <h1>Данный продукт уже существует</h1>
        <?
    } else {
    
     mysqli_query($connect,"INSERT INTO `products` (`id`, `name`, `calories`) VALUES (NULL, '$name', '$calories')");
    
    header('Location: ../index.php');
    }
    ?>
    <br>
    <br>
    <form action="../index.php" method="post">
    <button type = 'submit'>Назад</button>
    </form>   
    