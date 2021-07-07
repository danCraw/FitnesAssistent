<?php
	require_once 'config/connect.php';

	$user_id = $_GET['id'];

	$user = mysqli_query($connect, "SELECT * FROM `user` WHERE `id`= '$user_id'");
	$user = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="wrapper">
        <div class="center message-box p-top50">
                <div class="container border flex-container flex-column">
					<form action="reset.php" method="post">
						<h2>Смена пароля</h3>
						<!-- <input type="hidden" name="id" value="<?= $user['id'] ?>"> -->
						<input type="hidden" name="code" value="<?=rand(1000, 9999)?>">
						<p>E-mail</p>
						<input type="text" name="email"value="<?= $user['email']?>">
						<button class="button" type = 'submit'>Отправить</button>
					</form>
					<form action='../login.php' method="post">
						<button class="button" type = 'submit'>Назад</button>
					</form>
                
            </div>
        </div>
    </div>
</body>
</html>