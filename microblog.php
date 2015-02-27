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
			<form class="post-message" method="post">
				<textarea name="message" placeholder="好想吐槽啊..."></textarea>
				<input type="submit" value="发射！">
			</form>
		</div>
		<div class="contents">
		</div>
		<div class="pages">
			<ul>
				<li><a href="#">Prev</a></li>
				<li><a href="#1">1</a></li>
				<li><a href="#2">2</a></li>
				<li><a href="#3">3</a></li>
				<li><a href="#4">4</a></li>
				<li><a href="#">Next</a></li>
			</ul>
		</div>
	</div>
	<div class="footer">&copy 2015 By Sky</div>
	<script type="text/javascript" src="js/message.js"></script>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>