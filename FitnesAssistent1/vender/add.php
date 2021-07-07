<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$null = false;



$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['e-mail'];
$weight = $_POST['weight'];
$height = $_POST['height'];
if ($height != NULL) {
    $BMI = $weight / (($height / 100) * ($height /100));
}
$target = $_POST['target'];
$eatenToday = $_POST['eatenToday'];
if (($name == NULL) || ($password == NULL) || ($email == NULL) || ($weight == NULL) || ($height == NULL) || ($target == NULL)){
    ?>
    <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="stylesheet" href="../css/style.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Ошибка</title>
            </head>
            <body>
                <div class="wrapper">
                    <div class="center message-box">
                        <div class="container border">
                            <h1>Введите все значения</h1>
                            <a class="button" href="../registration.php">Назад</a>
                        </div>
                    </div>
                </div>
            </body>
        </html>
    
    <?
    $null = true;
}




$query = mysqli_query($connect, "SELECT * FROM `user` WHERE `email`= '".mysqli_real_escape_string($connect, $_POST['e-mail'])."'");

if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {

    if(mysqli_num_rows($query)>0) {
        header('Location: ../registration.php');
    } else {
    
     mysqli_query($connect,"INSERT INTO `user` (`id`, `name`, `password`, `email`, `weight`, `height`, `BMI`, `target`, `eatenToday`) VALUES (NULL, '$name', '$password', '$email', '$weight', '$height', '$BMI', '$target', '0')");

     $data = mysqli_query($connect, "SELECT * FROM `user` WHERE `email` = '$email'");
     $data = mysqli_fetch_assoc($data);

     session_start();
     $_SESSION['data'] = $data;
     header('Location: ../user/mainScreen.php');
    }
    
    } else {
        if ($null == false) {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="stylesheet" href="../css/style.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Ошибка</title>
            </head>
            <body>
                <div class="wrapper">
                    <div class="center">
                        <div class="message-box"> </div>
                            <div class="container border">
                                <h1>Почтовый адрес указан не корректно</h1>
                        
                
            
            
        <?
        }
        ?>
                                <a class="button" href="../registration.php">Назад</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>
        <?
    
    }

?>