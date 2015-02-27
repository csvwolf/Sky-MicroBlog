<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- 取消移动设备默认缩放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, target-densitydpi=device-dpi">
	<meta name="description" content="Just a MicroBlog">
	<meta name="keywords" content="MicroBlog">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/core.js"></script>
	<title>Index - 简单微博系统</title>
</head>
<body>
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
<!--
 	<button>刷新</button>
 --> 
</body>
</html>