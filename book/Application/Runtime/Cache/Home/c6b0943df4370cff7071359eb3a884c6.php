<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="icon" type="image/x-icon" href="../../../../Public/images/title.jpg"/>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/bookdetail.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/pagination.css" />
		<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	    <script type="text/javascript" src="../../Public/js/daohang.js"></script> 
		<script type="text/javascript" src="../../Public/js/jquery.pagination.js"></script>	    
	    <script type="text/javascript" src="../../Public/js/bookdetail.js"></script> 
	</head>
	<body>
		<!--导航栏-->
		<div class="navBox">
			<div class="nav">
				<ul>
					<li class="current"><a href="http://localhost/Home/index/index" target="_blank">首页</a></li>
                    <li><a href="http://localhost/Home/cateresult/searchresult?cate=玄幻">玄幻<small>Fantasy</small></a></li>
                    <li><a href="http://localhost/Home/cateresult/searchresult?cate=武侠">武侠<small>Martial arts</small></a></li>
                    <li><a href="http://localhost/Home/cateresult/searchresult?cate=科幻">科幻<small>Future science</small></a></li>
                    <li><a href="http://localhost/Home/cateresult/searchresult?cate=言情">言情<small>Romantic</small></a></li>
                    <li><a href="http://localhost/Home/cateresult/searchresult?cate=都市">都市<small>City</small></a></li>
                    <li><a href="http://localhost/Home/recommend/recommend">推荐<small>+</small></a></li>
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
       		<form class="searchForm" action="http://localhost/Home/searchresult/searchresult" method="post">
       			<input class="search" type="text" name="serBook" placeholder="请输入查询书籍"/>
       			<button class="searchBtn" type="submit"><img src="../../Public/images/search.png"/></button>
       		</form>
       	</div>
       	<div class="Res_LogBox">
       		<div class="Res_Log" id="userL">

       		</div>
       	</div>
      
       </div>
       <!--内容-->	
       <div class="book_detail_box" id='dis_club'>
       	<div class="book_detail" id="b_detail">
       		<!--书籍详情-->
       	</div>
       	<div class="abstractBox" id="abs">
       		<h4 class='t4'>内容简介</h4>
       	</div>
        <div class="user_speak" id="dis_user">
        	<h4 class='t4'>书籍评论</h4>
       		<!--用户评论-->
       	</div>
       	<div class="M-box"></div>
       </div>
       
	</body>
</html>