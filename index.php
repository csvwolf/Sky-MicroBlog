<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/header.php');
?>
	<div class="container">
		<div class="main">
			<div class="avatar"></div>
			<div class="content">
				<h1>天家微博系统 - V1.0</h1>
				<div class="tip"></div>
				<form class="login" method="post">
					<input type="password" placeholder="密码" name="password">
					<input type="submit" value="提交">
				</form>
			</div>
		</div>
		<div class="footer">&copy 2015 By Sky</div>
	</div>
<?php
	if (!isset($_SERVER['HTTP_PJAX']))
		include('common/footer.php')
?>