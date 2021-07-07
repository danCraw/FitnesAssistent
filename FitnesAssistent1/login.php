<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Вход</title>
</head>
<body>
	<div class="wrapper">
		<div class="login center p-top50 flex-container flex-column">
			<div class="container border flex-container flex-column">
				<div class="flex-container flex-column">
				<h2 class="title">Вход</h2>
				<form class="form flex-container flex-column" action="vender/login.php" method="post">
					<div class="input-field">
						<p>E-mail</p>
						<input type="text" name="e-mail">
					</div>
					<div class="input-field">
						<p>Пароль<p>
						<input type="text" name="password">
					</div>
									
					<button class="button" type = 'submit'>Войти</button>
				</form>
			</div>
			<form action="../index.php" method="post">
				<button class="button" type = 'submit'>Назад</button>
			</form>
			<a href="user/resetPassword.php?id=<?=$user[0] ?>">Забыли пароль?</a></div>
		</div>
	</div>
</body>
</html>



		