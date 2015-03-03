<?php
	include('../common/dbconfig.php');
	$result = -1;
	$messageNumber = -1;

	if (!$error) {
		$query = 'SELECT COUNT(*) FROM `sky_contents`';

		$stmt = $dbh->prepare($query);

		$error = !$stmt->execute();

		if (!$error) {
			$result = $stmt->fetch(PDO::FETCH_NUM);
			$result =  $result[0];
			$messageNumber = $result;

			if ($result % 5 == 0 && $result >= 5) {
				$result /= 5;
			} else {
				$result = $result / 5 + 1;
			}

			$result = (int)$result;
		}
	}
	echo json_encode(Array('error' => $error, 'pageNumber' => $result, 'messageNumber' => $messageNumber));
?>