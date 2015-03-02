<?php
	include('../common/common.php');
	include('../common/dbconfig.php');

	if (!islogin()) {
		exit;
	}

	if (!empty($_POST['content'])) {
		$content = filterString($_POST['content']);
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