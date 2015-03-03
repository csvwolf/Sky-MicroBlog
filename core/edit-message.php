<?php
	include('../common/common.php');
	include('../common/dbconfig.php');

	$arr = Array();

	if (!islogin()) {
		$status = 'not login';
	} else {
		if (array_key_exists('content', $_POST) && !empty($_POST['content'])) {
			$content = filterString($_POST['content']);
			$id = $_POST['id'];

			$query = 'UPDATE `sky_contents` SET content = :content WHERE id = :id';

			$stmt = $dbh->prepare($query);

			$stmt->bindValue(':content', $content);
			$stmt->bindValue(':id', $id);

			$success = $stmt->execute();

			if (!$success) {
				$stats = 'sql error';
			}

			$arr['content'] = $content;

		} else {
			$status = 'content missing';
		}
	}

	$arr['status'] = $status;

	echo json_encode($arr);

//	echo date('Y-M-D H:i:s');

?>