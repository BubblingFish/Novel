<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
		<title>BookStore</title>
		<link rel="stylesheet" type="text/css" href="../../../../Public/public/bootstrap.min.css"/>
		<style>
			*{
				margin: 0px;
				padding: 0px;
			}
			.width_full{
				width: 100%;
			}
			.height_full{
				height: 100%;
			}
			.full{
				width: 100%;
				height: 100%;
			}
			.float_nav{
				height: 30px;
/*				background: #122B40;*/
                background: #C0C0C0;
			}
			.float_nav_font{
				list-style-type: none;
				line-height: 30px;
				color: white;
			}
			li{
				display: inline-block;
				list-style-type: none;
				float: right;
				padding-right: 10px;
			}
			li:first-child{
				display: inline-block;
				list-style-type: none;
				float: right;
				padding-right: 0px;
			}
		</style>
	</head>
	<body>
		<!--标题栏-->
		<div class="container-fluid float_nav">
			<div class="container height_full">
				<div class="col-xs-8 text-left"><a class="float_nav_font">心悦其中</a></div>
				<div class="col-xs-4">
					<ul>
						<li class="text-center"><a class="float_nav_font">注册2</a></li>
						<li class="text-center"><a class="float_nav_font">注册</a></li>
						<li class="text-center"><a class="float_nav_font">登陆</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>