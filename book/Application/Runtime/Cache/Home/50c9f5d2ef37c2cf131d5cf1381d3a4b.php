<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登陆页</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/register.css"/>
	</head>
	<body>
		<a class="title" href="#">书荒之家</a>
		<hr class="line"/>
		<div class="box">
			<form action="http://localhost/Home/login/userLogin" method="post" class="formbox">
				<h2 class="tag">Login</h2>
				<input id="user_Name" type="text" name="userName" placeholder="User  Name"/>
				<span id="y1"></span>
				<input id="user_Ps" type="text" name="userPs" placeholder="User  Password"/><br />
				<input  id="subMit" type="submit" value="提交"/>
			</form>
		</div>
	</body>
	<script src="../../Public/js/jquery1.9.1.min.js"></script>
	<script src="../../Public/js/login.js"></script>
	</script>
</html>