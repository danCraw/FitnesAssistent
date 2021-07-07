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
	<link rel="stylesheet" href="../css/style.css">
	<title>Update</title>
</head>
<body>
	<div class="wrapper">
		<div class="center message-box p-top50">
			<div class="flex-container flex-column">
				<div class="container border flex-container flex-column">
					<form action="vender/updateProduct.php" method="post">
						<input type="hidden" name="id" value="<?= $products['id'] ?>">
						<p>Название продукта</p>
						<input type="text" name="name" value="<?= $products['name']?>">
						<p>Калорийность</p>
						<input type="text" name="calories" value="<?= $products['calories']?>">
						<br>
						<br>
						<button  class="button" type = 'submit'>Изменить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>