<?php
	include('../common/common.php');
	include('../common/dbconfig.php');

	$pageNumber = 0;
	$messageNumber = 0;
	$arr = Array();
	if ($status == 'success') {

		if (array_key_exists('page', $_GET)) {
			$pageNumber = $_GET['page'];
		} else {
			$pageNumber = 1;
		}
		if ($pageNumber > 0) {

			$showItem = 5;

			$offset = ($pageNumber - 1) * $showItem;

			$query = 'SELECT * FROM `sky_contents` ORDER BY id DESC LIMIT :showItem OFFSET :offset';

			$stmt = $dbh->prepare($query);

			$stmt->bindValue(':showItem', $showItem, PDO::PARAM_INT);
			$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

			$success = $stmt->execute();
			if ($success) {
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$result = getDateArray($result, 'time');
				$messageNumber = count($result);
				$arr['result'] = $result;
			} else {
				$status = 'sql error';
			}

		} else {
			$status = 'input error';
		}
	}

	$arr['messageNumber'] = $messageNumber;
	$arr['status'] = $status;
	// $arr = Array(Array('id' => '1000', 'content'=>'Hello World', 'time' => '2015-2-27 14:23:20'), Array('id' => '1001', 'content'=>'今天天气不错', 'time' => '2015-2-27 18:20:21'));
	echo json_encode($arr);

?>