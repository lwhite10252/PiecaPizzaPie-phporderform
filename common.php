<?php
define('HOST', 'localhost');
define('USER', 'pizzamaker');
define('PASSWORD', 'password1');
define('DATABASE', 'leanne_white_pizzastore');

	$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	if ($conn->connect_error){
		die("Could not connect" . $conn->connect_error);
	}
?>