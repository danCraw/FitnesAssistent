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
	<title>Изменить</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="wrapper">
	    <div class="center message-box p-top50">
            <div class="flex-container flex-column">
                <div class="container border flex-container flex-column">
					<form action="vender/update.php" method="post">
						<input type="hidden" name="id" value="<?= $user['id'] ?>">
						<p>Имя</p>
						<input type="text" name="name" value="<?= $user['name']?>">
						<p>Пароль</p>
						<input type="text" name="password" value="<?= $user['password']?>">
						<p>E-mail</p>
						<input type="text" name="email"value="<?= $user['email']?>">
						<p>Вес</p>
						<input type="text" name="weight"value="<?= $user['weight']?>">
						<p>Рост</p>
						<input type="text" name="height"value="<?= $user['height']?>">
						<p>Цель</p>
						<input type="text" name="target"value="<?= $user['target']?>">
						<p>Съедено сегодня</p>
						<input type="text" name="eatenToday"value="<?= $user['eatenToday']?>">
						<br>
						<br>
						<button class="button" type = 'submit'>Изменить</button>

					</form>
				</div>
			</div>
		</div>
	</div>
		
</body>
</html>