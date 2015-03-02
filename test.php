<?php
	$dbname = 'show';
	$dbhost = 'localhost';
	$user = 'root';
	$password = '';

	$dsn = 'mysql:dbname=' . $dbname . ';host=' . $dbhost . ';';

	try {
		$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
		exit;
	}

	$query = 'INSERT INTO `show_tags` (`name`) VALUES(1323232)';
	echo 'Hello';
	$stmt = $dbh->prepare($query);

	$stmt->execute();

	$result = $dbh->lastInsertId();


	print_r($result);
?>