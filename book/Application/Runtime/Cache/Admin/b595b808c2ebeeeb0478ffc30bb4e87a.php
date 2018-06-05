<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后端管理</title>
		<link rel="stylesheet" type="text/css" href="../../Public/css/index.css" />
	</head>
	<body>
		<div class='Box'>
			<!--<a onclick="dd()" >ddddd</a>
			<a onclick="cc()" >ddddd</a>
			<div id="b" style="width: 100px;height: 300px;background: salmon;"></div>-->
			<div class="LogoBox"></div>
			<div class="ContentBox">
				<div class="navBox">
					<ul>
						<li><span><a onclick="serUser()">用户信息</a></span></li>
					</ul>
				</div>
				<div class="contentBox" id="b"></div>
			</div>
       </div>
		</div>
		<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
		<script type="text/javascript">
			function serUser () {
				$("#b").load("http://localhost/Admin/serbook/serbook");
			}
//			function cc () {
//				$("#b").load("http://localhost/Admin/seruser/seruser");
//			}
		</script>
	</body>
</html>