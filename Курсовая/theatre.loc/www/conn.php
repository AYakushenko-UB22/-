<?php
	$db_username = 'root';
	$db_password = '';
	$conn = new PDO( 'mysql:host=localhost;port=3306;dbname=formcheck', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>