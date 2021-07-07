<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style.css">
		<title>Добавить продукт</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="center message-box p-top50">
				<div class="flex-container flex-column">
					<div class="container border flex-container flex-column">
						<form action="vender/addProduct.php" method="post">
							<p>Name</p>
							<input type="text" name="name">
							<p>Calories<p>
							<input type="text" name="calories">
							<br>
							<br>
							<button type = 'submit'>Добавить</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

        <?php 