<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>未知</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/typesupply.css" />	
	</head>
	<body>
		<div class="t_sBox" id="dzBox">
			<form class="t_sForm" action="http://localhost/Home/typesupply/ts" method="post">
				<span><input type="text" name="typeName" placeholder="请输入您的类型要求"/></span>
				<span><input type="submit" value="提交"/></span>
			</form>
			
		</div>
		<script src="../../Public/js/typesupply.js"></script>		
	</body>
</html>