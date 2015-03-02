<?php
	include('../common/common.php');
	include('../common/dbconfig.php');

	if (!islogin()) {
		exit;
	}

	if (!empty($_POST['message'])) {
		$content = filterString($_POST['message']);
		$time = time();

		$query = 'INSERT INTO `sky_contents` (`content`, `time`) VALUES(:content, :time)';

		$stmt = $dbh->prepare($query);

		$stmt->bindValue(':content', $content);
		$stmt->bindValue(':time', $time);

		$stmt->execute();

		$insertId = $dbh->lastInsertId();

		$arr = Array('id' => $insertId, 'content'=> $content, 'time' => $time);
		echo json_encode($arr);
	} else {
		exit;
	}

//	echo date('Y-M-D H:i:s');

?>