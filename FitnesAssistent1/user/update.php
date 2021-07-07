<?php

	require_once 'config/connect.php';

	$user_id = $_GET['id'];

	$user = mysqli_query($connect, "SELECT * FROM `user` WHERE `id`= '$user_id'");
	$user = mysqli_fetch_assoc($user);

	echo $user['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update</title>
</head>
<body>
<form action="vender/update.php" method="post">
			<input type="hidden" name="id" value="<?= $user['id'] ?>">
			<p>Name</p>
			<input type="text" name="name" value="<?= $user['name']?>">
			<p>Password</p>
			<input type="text" name="password" value="<?= $user['password']?>">
			<p>E-mail</p>
			<input type="text" name="email"value="<?= $user['email']?>">
			<p>Weight</p>
			<input type="text" name="weight"value="<?= $user['weight']?>">
			<p>Height</p>
			<input type="text" name="height"value="<?= $user['height']?>">
			<p>Target</p>
			<input type="text" name="target"value="<?= $user['target']?>">
			<br>
			<br>
			<button type = 'submit'>Update user</button>

		</form>
</body>
</html>