<?php

// Database Connection


    $dsn = 'mysql:host=localhost;dbname=cs314';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

	try {
		$connect = new PDO($dsn, $user, $pass, $option);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "You Are Connected To Database" . "<br>";
	}

	catch(PDOException $e) {
		echo "Failed To Connect To Database" . $e->getMessage();
	}


