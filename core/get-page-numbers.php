<?php
	include('../common/dbconfig.php');

	$query = 'SELECT COUNT(*) FROM `sky_contents`';

	$stmt = $dbh->prepare($query);

	$stmt->execute();

	$result = $stmt->fetch(PDO::FETCH_NUM);
	$result =  $result[0];

	if ($result % 5 == 0 && $result >= 5) {
		$result /= 5;
	} else {
		$result = $result / 5 + 1;
	}
	echo json_encode((int)$result);
?>