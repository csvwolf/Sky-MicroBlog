<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');

	include('../common/dbconfig.php');

	if (array_key_exists('id', $_POST)) {
		$id = $_POST['id'];
		$query = 'DELETE FROM `sky_contents` WHERE id = :id';

		$stmt = $dbh->prepare($query);

		$stmt->bindValue(':id', $id);

		$stmt->execute();

		echo json_encode('Success');
	}
?>