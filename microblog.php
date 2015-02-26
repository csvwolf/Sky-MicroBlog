<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');

	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/header.php');
?>
	<div class="container microblog">
		<header>
			<h1><a href="#">Power Wind</a></h1>
			<span>坑爹的微博System</span>
		</header>
		<div class="post">
			<div class="avatar"></div>
			<form method="post">
				<textarea name="message" placeholder="好想吐槽啊..."></textarea>
				<input type="submit" value="发射！">
			</form>
		</div>
		<div class="main microblog"></div>
	</div>
	<div class="footer">&copy 2015 By Sky</div>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>