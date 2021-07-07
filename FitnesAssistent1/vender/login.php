<?php

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$email = $_POST['e-mail'];
$password = $_POST['password'];
$isNULL = 0;

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $data = mysqli_query($connect, "SELECT * FROM `user` WHERE `email` = '$email'");
    $data = mysqli_fetch_assoc($data);
    //Сравниваем пароли

    if (($email == NULL) || ($password == NULL)) {
        $isNULL = 1;
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
                                <div class="container border flex-container flex-column">
                                    <h1>Заполните все поля и повторите попытку</h1>
                                    <form action='../login.php' method="post">
                                        <button class="button" type = 'submit'>Назад</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?
    }

    if (($data['email']) === ('admin') && ($data['password']) === ('admin')) {

        header("Location: ../admin/index.php"); 

    } else {
    if($data['password'] === ($password))
    {
        session_start();
        $_SESSION['data'] = $data;
        header("Location: ../user/mainScreen.php"); 
        exit();
    }
    else
    {
        if ($isNULL == 0) {
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
                                <div class="container border flex-container flex-column">
                                    <h1>Вы ввели неправильный логин или пароль</h1>
                                    <form action='../login.php' method="post">
                                        <button class="button" type='submit'>Назад</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?
        }
    }
}
?>

