<?php
require_once '../config/connect.php';

$email = $_POST['email'];
$code = $_POST['code'];
    
if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {

mail($email, 'My Subject', $code);
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
                    <div class="center message-box p-top50">
                        <div class="flex-container flex-column"> </div>
                            <div class="container border flex-container flex-column">
								<form action="vender/reset.php" method="post">
									<h3>На указанный адрес выслан код</h3>
									<input type="hidden" name="id" value="<?= $user['id'] ?>">
									<input type="hidden" name="trueCode">
									<p>Введите код</p>
									<input type="text" name="inputCode">
									<button class="button" type = 'submit'>Сбросить пароль</button>
								</form>

								<form action='resetPassword.php' method="post">
									<button class="button" type = 'submit'>Назад</button>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>

<?
} else {
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
                    <div class="center message-box p-top50">
                        <div class="flex-container flex-column"> </div>
                            <div class="container border flex-container flex-column">
								<h1>Адрес указан не корректно</h1>
								<a class="button" href="resetPassword.php">Назад</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>

<?
}
?>