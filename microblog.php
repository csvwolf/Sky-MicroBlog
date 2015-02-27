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
		<div class="contents">
			<div class="blog-text">
				<div class="text-main">
					<textarea>123</textarea>
				</div>
				<div class="text-messages">
					<ul>
						<li>Time:</li>
						<li>Edit</li>
						<li>Delete</li>
					</ul>
					<button id="cancel-edit">取消编辑</button>
					<button id="confirm-edit">提交编辑</button>
				</div>
			</div>
			<div class="blog-text">123</div>
			<div class="blog-text">123</div>
			<div class="blog-text">123</div>
			<div class="blog-text">123</div>
			<div class="blog-text">123</div>
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
		</div>
	</div>
	<div class="footer">&copy 2015 By Sky</div>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>