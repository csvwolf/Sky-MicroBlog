<?php
	session_start();

	// array_key_exists('password', $_POST)
	if (isset($_POST['password'])) {
		$pass = md5($_POST['password']);

		if ($pass == md5('Kurama')) {
			$_SESSION['login'] = true;
			echo json_encode('200');
		} else {
			echo json_encode('403');
		}
	} else {
		echo json_encode('404');
	}
?>