<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');

	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/header.php');
?>
	<div class="container microblog">
		<header>
			<h1><a href="javascript:void(0)">Power Wind</a></h1>
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
			<div class="loading">正在努力加载内容...</div>
		</div>
		<div class="pages">
			<ul>
<!-- 				<div class="loading">正在努力加载页码...</div>
 --><!-- 				<li class="prev">Prev</li>
				<li class="current number">1</li>
				<li class="number">2</li>
				<li class="number">3</li>
				<li class="number">4</li>
				<li class="next">Next</li> -->
			</ul>
			<div class="footer">&copy 2015 By Sky</div>

		</div>
	</div>
	<script type="text/javascript" src="js/message.js"></script>
	<script type="text/javascript" src="js/page.js"></script>
	<script type="text/javascript">
		if (!history.state) {
			window.history.replaceState({type: 'url', pageNumber: page.currentPage, title: 'microblog'}, 'Hello', 'microblog.php');
		}
	</script>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>