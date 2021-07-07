<?php

	require_once 'config/connect.php';

	$product_id = $_GET['id'];

	$products = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`= '$product_id'");
	$products = mysqli_fetch_assoc($products);

	echo is_null($products);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update</title>
</head>
<body>
<form action="vender/updateProduct.php" method="post">


			<input type="hidden" name="id" value="<?= $products['id'] ?>">
			<p>Name</p>
			<input type="text" name="name" value="<?= $products['name']?>">
			<p>Calories</p>
			<input type="text" name="calories" value="<?= $products['calories']?>">
			<br>
			<br>
			<button type = 'submit'>Update product</button>

		</form>
</body>
</html>