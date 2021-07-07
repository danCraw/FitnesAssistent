<?php

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$email = $_POST['e-mail'];
$password = $_POST['password'];

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($connect, "SELECT * FROM `user` WHERE `email` = '$email'");
    $data = mysqli_fetch_assoc($query);
    //Сравниваем пароли
    if($data['password'] === ($password))
    {
        session_start();
        $_SESSION['data'] = $data;
        header("Location: ../mainScreen.php"); 
        exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
?>

