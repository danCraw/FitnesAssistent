<?php

	require_once 'config/connect.php';

	$product_id = $_GET['id'];

	$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$product_id'");
	$product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update</title>
</head>
<body>
<form action="vender/updateProduct.php" method="post">

			<input type="hidden" name="id" value="<?= $product['id'] ?>">
			<p>Name</p>
			<input type="text" name="name" value="<?= $product['name']?>">
			<p>Calories</p>
			<input type="text" name="calories" value="<?= $product['calories']?>">
			<br>
			<br>
			<button type = 'submit'>Изменить</button>

		</form>
</body>
</html>