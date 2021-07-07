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
	<link rel="stylesheet" href="../css/style.css">
	<title>Изменить параметры</title>
</head>
<body>
<div class="wrapper">
		<div class="center p-top50 flex-container flex-column">
			<div class="container border flex-container flex-column">
				<form action="vender/updateParameters.php" method="post">
					<input type="hidden" name="id" value="<?= $user['id'] ?>">
					<div class="input-field">
						<p>Вес</p>
						<input type="text" name="weight"value="<?= $user['weight']?>">
					</div>
					<div class="input-field">
						<p>Рост</p>
						<input type="text" name="height"value="<?= $user['height']?>">
					</div>

					<div class="input-field">
						<p>Цель</p>
						<input type="text" name="target"value="<?= $user['target']?>">
					</div>
					<button class="button" type = 'submit'>Изменить</button>
				</form>
			</div>
		</div>
</div>

</body>
</html>