<?php
	$dbname = 'sky_microblog';
	$dbhost = 'localhost';
	$user = 'root';
	$password = '';

	$dsn = 'mysql:dbname=' . $dbname . ';host=' . $dbhost . ';';

	$status = 'success';
	try {
		$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		$status = 'database error';
	}
?>