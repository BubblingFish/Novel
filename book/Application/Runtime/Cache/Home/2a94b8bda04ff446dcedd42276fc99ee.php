<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
		<title></title>
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
				width: 80px;
				height: 30px;
				border-left: 1px solid white;
				list-style-type: none;
				float: right;
				padding-right: 0px;
			}
			/*	搜索框*/
			.search{
				height: 70px;
			}
			.searchBB{
				float: left;
			}
		    .searchBox{
		    	width: 300px;
		    	height: 40px;
		    	margin-top: 25px;
		    	margin-left: 45px;
		    	border: 3px solid #122B40;
		    }
		    .searchBtn{
		    	width: 80px;
		    	height: 40px;
		    	margin-top: 25px;
		    	background: #122B40;
		    	color: white;
		    	border: none;
		    }
		    .searchText{
		    	height: 40px;
		    	margin-top: 25px;
		    }
		    /*logo*/
		   .logo{
		   	width: 200px;
		   	height: 60px;
		   	margin-top: 10px;
		   	float: left;
		   }
		   /*分类*/
		  .kindAll{
		  	height: 50px;
		  	background: black;
		  	font: "微软雅黑";
		  	color: white;
		  	margin-top: 10px;
		  }
		  .float_kind_font{
				list-style-type: none;
				line-height: 50px;
				color: white;
			}
		</style>
	</head>
	<body class="content">
		<!--标题栏-->
		<div class="container-fluid float_nav">
			<div class="container height_full">
				<li class="col-xs-8 text-left"><a class="float_nav_font">心悦其中</a></li>
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
       	<form class="searchBB">
       		<div class="logo"><img class="full" src="../../../../Public/image/logo.dbed5.png"/></div>
       		<input type="text" placeholder="搜索从这里开始..." class="searchBox">
       		<button type="submit" class="searchBtn">查询</button>
       		<div class="searchText"></div>
       	</form>   
       </div>
       <div class="kindAll container-fluid">
       	<div class="container">
       		<ul>
       			<li class="text-center"><a class="float_kind_font">首页</a></li>
       			<li class="text-center"><a class="float_kind_font">玄幻</a></li>
       			<li class="text-center"><a class="float_kind_font">修真</a></li>
       		</ul>
       	</div>
       </div>
	</body>
</html>