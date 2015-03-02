<?php
	session_start();

	function isLogin() {
		if (array_key_exists('login', $_SESSION) && $_SESSION['login']) {
			return true;
		} else {
			return false;
		}
	}

	function filterString($str) {
		return nl2br(htmlspecialchars(trim($str)));
	}

	function getDateArray($dateArr, $key) {
		foreach ($dateArr as &$value) {
			$value[$key] = date('Y-m-d H:i:s', $value[$key]);
//			echo $value[$key];
		}
		
		return $dateArr;
	}
?>