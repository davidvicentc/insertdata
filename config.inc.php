<?php 

	$dbHost = 'localhost';
	$dbname = 'insertdata';
	$dbUser = 'root';
	$dbPass = '';
	try {
		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbname", $dbUser, $dbPass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (Exception $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

 ?>