<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
		<title>Share Books</title>
		<link rel="stylesheet" type="text/css" href="../../../../Public/public/bootstrap.min.css"/>
		<style>
			/*css配置*/
			*{
				margin: 0px;
				padding: 0px;
			}
			.content{
				width: 100%;
				min-width: 700px;
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
			/*标题栏*/
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
			/*	搜索框*/
			.search{
				height: 70px;
			}
		    .searchBox{
		    	height: 40px;
		    	margin-top: 25px;
		    	border: 3px solid #122B40;
		    }
		    .searchBtn{
		    	height: 40px;
		    	margin-top: 25px;
		    	background: #122B40;
		    	color: white;
		    	border: none;
		    }

		</style>
	</head>
	<body class="content">
		<!--标题栏-->
		<div class="container-fluid float_nav">
			<div class="container height_full">
				<div class="col-xs-8 text-left"><a class="float_nav_font">心悦其中</a></div>
				<div class="col-xs-4">
					<ul>
						<li class="text-center"><a class="float_nav_font">注册</a></li>
						<li class="text-center"><a class="float_nav_font">登陆</a></li>
						<li class="text-center"><a class="float_nav_font">个人中心</a></li>
					</ul>
				</div>
			</div>
		</div>

       <!-- 查询框-->
       <div class="container search">
       	<form>
       		<div class="col-xs-3"><img class="full" src="../../../../Public/image/logo.dbed5.png"/></div>
       		<input type="text" placeholder="搜索从这里开始..." class="col-xs-4 searchBox">
       		<button type="submit" class="col-xs-2 searchBtn">查询</button>
       		<div class="col-xs-3"></div>
       	</form>   
       </div>
       
	</body>
</html>