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
				<li>Prev</li>
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>Next</li>
			</ul>
			<div class="footer">&copy 2015 By Sky</div>

		</div>
	</div>
	<script type="text/javascript" src="js/message.js"></script>
	<script type="text/javascript" src="js/page.js"></script>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>