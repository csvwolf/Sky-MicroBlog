<?php
	$dbname = 'sky_microblog';
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
?>