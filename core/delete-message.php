<?php
	include ('../common/common.php');
	include('../common/dbconfig.php');
	
	if (!islogin()) {
		$status = 'not login';
	} else {
		if (array_key_exists('id', $_POST)) {
			$id = $_POST['id'];
			$query = 'DELETE FROM `sky_contents` WHERE id = :id';

			$stmt = $dbh->prepare($query);

			$stmt->bindValue(':id', $id);

			$success = $stmt->execute();

			if ($success) {
				$status = 'success';
			} else {
				$status = 'sql error';
			}
		} else {
			$status = 'content missing';
		}
	}

	$arr = Array('status' => $status);
	
	echo json_encode($arr);
?>