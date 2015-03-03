<?php
	include('../common/common.php');
	include('../common/dbconfig.php');

	$arr = Array();

	if ($status == 'success') {
		if (!islogin()) {
			$status = 'not login';
		} else if (array_key_exists('message', $_POST) && !empty($_POST['message'])) {
			$content = filterString($_POST['message']);
			$time = time();

			$query = 'INSERT INTO `sky_contents` (`content`, `time`) VALUES(:content, :time)';

			$stmt = $dbh->prepare($query);

			$stmt->bindValue(':content', $content);
			$stmt->bindValue(':time', $time);

			$success = $stmt->execute();

			if ($success) {
				$insertId = $dbh->lastInsertId();

				$arr = Array('id' => $insertId, 'content'=> $content, 'time' => $time);
			} else {
				$status = 'sql error';
			}
		} else {
			$status = 'content messing';
		}
	}
//	echo date('Y-M-D H:i:s');
	$arr['status'] = $status;
	
	echo json_encode($arr);
?>