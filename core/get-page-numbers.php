<?php
	include('../common/dbconfig.php');
	$result = -1;
	$messageNumber = -1;

	if ($status == 'success') {
		$query = 'SELECT COUNT(*) FROM `sky_contents`';

		$stmt = $dbh->prepare($query);

		$success = !$stmt->execute();

		if (!$success) {
			$result = $stmt->fetch(PDO::FETCH_NUM);
			$result =  $result[0];
			$messageNumber = $result;

			if ($result % 5 == 0 && $result >= 5) {
				$result /= 5;
			} else {
				$result = $result / 5 + 1;
			}

			$result = (int)$result;
		} else {
			$status = 'sql error';
		}
	}
	echo json_encode(Array('status' => $status, 'pageNumber' => $result, 'messageNumber' => $messageNumber));
?>