<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');

	include('../common/dbconfig.php');

	if (!empty($_POST['content'])) {
		$content = $_POST['content'];
		$id = $_POST['id'];

		$query = 'UPDATE `sky_contents` SET content = :content WHERE id = :id';

		$stmt = $dbh->prepare($query);

		$stmt->bindValue(':content', $content);
		$stmt->bindValue(':id', $id);

		$stmt->execute();

		echo json_encode($content);
	} else {
		exit;
	}

//	echo date('Y-M-D H:i:s');

?>