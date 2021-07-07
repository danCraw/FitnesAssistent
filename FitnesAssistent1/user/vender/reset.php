<?php
require_once '../config/connect.php';

$inputCode = $_POST['inputCode'];
$trueCode = $_POST['trueCode'];


echo is_null($inputCode);
print_r($inputCode);
    
echo "На указанный адрес выслан код.";
mail($email, 'My Subject', $inputCode);
print_r($inputCode);

?>

<form action="../reset.php" method="post">
			<input type="hidden" name="id" value="<?= $user['id'] ?>">
			<p>Введите код</p>
			<input type="text" name="inputCode" value="<?$inputCode?>">
			<br>
			<br>
			<button type = 'submit'>Сбросить пароль</button>
		</form>

<form action='../../login.php' method="post">
<button type = 'submit'>Назад</button>
</form>
<?
?>