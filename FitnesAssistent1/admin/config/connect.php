<?php 
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'users';


$connect = mysqli_connect($servername, $username, $password, $dbname);


if (!$connect) {
	die('Error, you are not connected');
} 
?>