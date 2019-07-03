<?php 
	$server = 'localhost';
	$username ='root';
	$password ='toor';
	$database = 'php_login_database';


	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
	}
	catch (PDOException $e) {
		die('Connection fail: '.$e -> getMessage());
	}


 ?>