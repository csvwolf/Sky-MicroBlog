<?php
	$dbname = 'sky_microblog';
	$dbhost = 'localhost';
	$user = 'root';
	$password = '';

	$dsn = 'mysql:dbname=' . $dbname . ';host=' . $dbhost . ';';

	$error = false;
	try {
		$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		$error = true;
	}
?>