<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="icon" type="image/x-icon" href="../../../../Public/images/title.jpg"/>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/scan.css" />
	</head>
	<body>
		<!--导航栏-->
		<div class="navBox">
			<div class="nav">
				<ul>
					<li class="current"><a href="#" target="_blank">首页</a></li>
                    <li><a href="#">玄幻<small>movie</small></a></li>
                    <li><a href="#">武侠<small>tv play</small></a></li>
                    <li><a href="#">科幻<small>comic</small></a></li>
                    <li><a href="#">言情<small>variety</small></a></li>
                    <li><a href="#">都市<small>documentary</small></a></li>
                    <li><a href="#">更多<small>+</small></a></li>
               </ul>
               <!--match IE9,IE10 or not ie-->
               <!--[if (get IE 8) | ! (IE)]><!-->
               <h1 class="title"><a href="#">书荒之家</a><span class="btn"><img src="../../Public/images/btn.png" width="34" height="34" alt=""/></span></h1>
               <!--<![endif]-->
            </div>
       </div>
       <!--搜索栏-->
       <div class="searchBox">
       	<div class="searchLogo"><img src="../../Public/images/0.png" /></div>
       	<div class="searchBlank">
       		<form class="searchForm" action="#" method="post">
       			<input class="search" type="text" placeholder="请输入查询书籍"/>
       			<button class="searchBtn" type="submit"><img src="../../Public/images/search.png"/></button>
       		</form>
       	</div>	
       	<div class="Res_LogBox">
       		<div class="Res_Log">
       			<img  src="../../Public/images/user.jpg"/>
       			<span>
       				<!--<p>账号：<a href="#">张大海</a></p>
       				<small>积分：1024</small>-->
       				<p><a href="http://localhost/Home/register/register">登陆</a>/<a href="http://localhost/Home/register/register">注册</a></p>
       			</span>
       		</div>
       	</div>
       </div>
       <!--内容-->	
	   <div class="scanBox">
	   	<div class="scanContent">
	   		<div class="scanBooks">
	   			<ul>
	   				<li>按照</li>
	   				<li><label>评分</label></li>
	   				<li><label>时间</label></li>
	   			</ul>
	   			<div class="scan_hotBooks">
	   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   				
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   				
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>	   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   					   				<div class="scan_htbook_item">
	   					<img class="scan_htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>
	   				

	   			</div>
	   		
	   		    <!--分页-->
	   		</div>
	   	
	   	</div>
	   </div>
	</body>
	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	<script type="text/javascript">
		$(document).ready(function (){
//			导航栏
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
				 });
		})
</script>
</html>