<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册页</title>
	</head>
	<style>
		.abc{
			border: 1px solid red;
			width: 100px;
			height: 100px;
		}
		img{
			width: 100%;
			height: 100%;
		}
	</style>
	<body>
		<form action="http://localhost/Home/register/p" 
			method="post" enctype="multipart/form-data">
			us:<input type="text" name="userName"/>
			ps:<input type="text" name="userPs"/>
			<input type="submit" value="提交"/>
		</form>
		<div class='abc'>
			<img src="../../../../Public/image/logo.png"/>
		</div>
	</body>
</html>