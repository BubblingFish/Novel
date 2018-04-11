<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/content.css" />
	</head>
	<body>
		<!--导航栏-->
		<div class="navBox">
			<div class="nav">
				<ul>
					<li class="current"><a href="#" target="_blank">书荒之家</a></li>
                    <li><a href="#">玄幻<small>movie</small></a></li>
                    <li><a href="#">武侠<small>tv play</small></a></li>
                    <li><a href="#">科幻<small>comic</small></a></li>
                    <li><a href="#">言情<small>variety</small></a></li>
                    <li><a href="#">都市<small>documentary</small></a></li>
                    <li><a href="#">更多<small>+</small></a></li>
                    <li><a href="#">登陆<small>+</small></a></li>
                    <li><a href="#">注册<small>+</small></a></li>
               </ul>
               <!--match IE9,IE10 or not ie-->
               <!--[if (get IE 8) | ! (IE)]><!-->
               <h1 class="title"><a href="#">书荒之家</a><span class="btn"><img src="../../Public/images/btn.png" width="34" height="34" alt=""/></span></h1>
               <!--<![endif]-->
            </div>
       </div>
       <!--搜索栏-->
       <div class="searchBox">
       	<div class="searchLogo"></div>
       	<div class="searchBlank">
       		<form class="searchForm" action="#" method="post">
       			<input class="search" type="text" placeholder="请输入查询书籍"/>
       			<input class="searchBtn" type="submit" value="搜索"/>
       		</form>
       	</div>	

       </div>
	
	   <div class="contentBox">
	   	<div class="Content">
	   		<div class="books">
	   			<h3>最热资源</h3>
	   			<div class="hotBooks">
	   				<div class="htbook_item">
	   					<img class="htbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<a href="#">地下城</a>
	   					<p>一地鸡毛</p>
	   				</div>   				
	   			</div>
	   			
	   			<h3>最新资源</h3>
	   			<div class="newBooks">
	   				<div class="nwbook_item">
	   					<img class="nwbook_img" src="../../Public/images/ceshi.jpg"/>
	   					<span><a href="#">地下城</a><b>一地鸡毛</b><p>前段时间参加一个读书会，
	   						讲的是是枝裕和的书和电影，在座的好几个人都是在校的学生，或者是刚刚毕业的学生。
	   						每个人都抒发着自己对是枝裕和的见解，一时间，席间唾沫横飞，互相倾轧屡屡发生。
	   						每个人都在努力地说...</p></span>
	   				</div>
	   			</div>		
	   		</div>
	   		<div class="bookAbout">
	   			<div class="hotUser">
	   				<span><p>置顶推荐榜</p><a>更多+</a></span>
	   				<ul>
	   					<li><span><p><1></1></p><a>武神</a></span></li>
	   					<li><span><p><2></p><a>斗破苍穹</a></span></li>
	   					<li><span><p><3></p><a>悟空传</a></span></li>
	   					<li><span><p><4></p><a>雪中悍刀行</a></span></li>
	   					<li><span><p><5></p><a>择天记</a></span></li>
	   				</ul>
	   			</div>
	   			<div class="bookList">
	   				<p>热搜标签</p>
	   				<ul>
	   					<li><span><a>热血</a></span></li>
	   					<li><span><a>青春励志</a></span></li>
	   					<li><span><a>热血</a></span></li>
	   					<li><span><a>#</a></span></li>
	   				</ul>
	   			</div>
	   		</div>
	   	</div>
	   </div>

       <div class="foot">
       	<p>2018-04-19&nbsp;&nbsp;&nbsp;zhangman.top</p>
       	<ul>
       		<li><a href="#">书荒之家</a></li>
       		<li><a href="#">关于我们</a></li>
       		<li><a href="#">免责声明</a></li>
       	</ul>
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