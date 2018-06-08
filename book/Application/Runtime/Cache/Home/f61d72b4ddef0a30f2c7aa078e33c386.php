<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册页</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/register.css"/>
	</head>
	<body>
		<a class="title" href="#">书荒之家</a>
		<hr class="line"/>
		<div class="box">
			<form action="http://localhost/Home/register/userResgister" method="post" class="formbox" enctype="multipart/form-data">
				<h2 class="tag">注册</h2>
				<input id="user_Name" type="text" name="userName" placeholder="用户名"/>
				<span id="y1"></span>
				<input id="user_Ps" type="text" name="userPs" placeholder="用户密码"/><br />
				<span><small id="tx_img">头像</small><input type="hidden" name="MAX_FILE_SIZE" value="1024000"/>
				<input id="user_img" type="file" name="userImg" /></span>
				<input  id="subMit" type="submit" value="提交"/>
			</form>
		</div>
	</body>
	<script src="../../Public/js/jquery1.9.1.min.js"></script>
    <script src="../../Public/js/register.js"></script>
</html>