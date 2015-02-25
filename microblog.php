<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');

	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/header.php');
?>
	<div class="container red">

	</div>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>