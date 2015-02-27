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
					今天天气不错。
				</div>
				<div class="text-messages">
					<ul>
						<li id="time">Time:2015-2-27 12:06:09</li>
						<div class="operate">
							<li><a id="edit" href="#">Edit</a></li>
							<li><a id="delete" href="#">Delete</a></li>
						</div>
					</ul>
					<button id="cancel-edit">取消编辑</button>
					<button id="confirm-edit">提交编辑</button>
				</div>
			</div>
			<div class="blog-text">
				<div class="text-main">
					<textarea style="display:block;">今天天气不错。</textarea>
				</div>
				<div class="text-messages">
					<ul style="display:none;">
						<li id="time">Time:2015-2-27 12:06:09</li>
						<div class="operate">
							<li><a id="edit" href="#">Edit</a></li>
							<li><a id="delete" href="#">Delete</a></li>
						</div>
					</ul>
					<button style="display:block;" id="cancel-edit">取消编辑</button>
					<button style="display:block;" id="confirm-edit">提交编辑</button>
				</div>
			</div>
		</div>
		<div class="pages">
			<ul>
				<li><a href="#">Prev</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">Next</a></li>
			</ul>
		</div>
	</div>
	<div class="footer">&copy 2015 By Sky</div>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>