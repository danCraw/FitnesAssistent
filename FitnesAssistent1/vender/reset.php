<?php
require_once '../config/connect.php';

$email = $_POST['email'];
$code = $_POST['code'];
    
if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {


mail($email, 'My Subject', $message);
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
                            <form action="vender/update.php" method="post">
								<input type="hidden" name="id" value="<?= $user['id'] ?>">
								<p>Code</p>
								<input type="text" name="code">
								<br>
								<br>
								<button type = 'submit'>Update user</button>

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
                    <div class="center">
                        <div class="message-box"> </div>
                            <div class="container border">
								<h2>Адрес указан некорректно</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>

<br>
<br>
<a class="button" href="../resetPassword.php">Go back</a>
<?
}
?>