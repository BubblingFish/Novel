<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="icon" type="image/x-icon" href="../../../../Public/images/title.jpg"/>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/content.css" />
	</head>
	<body>
		<!--导航栏-->
		<div class="navBox">
			<div class="nav">
				<ul>
					<li class="current"><a href="http://localhost/Home/index/index" target="_blank">首页</a></li>
                    <li><a href="http://localhost/Home/searchresult/searchresult?cate=玄幻">玄幻<small>movie</small></a></li>
                    <li><a href="http://localhost/Home/searchresult/searchresult?cate=武侠">武侠<small>tv play</small></a></li>
                    <li><a href="http://localhost/Home/searchresult/searchresult?cate=科幻">科幻<small>comic</small></a></li>
                    <li><a href="http://localhost/Home/searchresult/searchresult?cate=言情">言情<small>variety</small></a></li>
                    <li><a href="http://localhost/Home/searchresult/searchresult?cate=都市">都市<small>documentary</small></a></li>
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
	   <div class="contentBox">
	   	<div class="Content">
	   		<div class="books">
	   			<h3>查询结果</h3>
	   			<div class="hotBooks">
	   				<?php if(is_array($serList)): $i = 0; $__LIST__ = $serList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_ser): $mod = ($i % 2 );++$i;?><div class="htbook_item">
	   						<img class="htbook_img" src="../../bookImg/book<?php echo ($vo_ser["book_img"]); ?>"/>
	   						<a href="http://localhost/Home/bookdetail/bookdetail?B_id=<?php echo ($vo_ser["book_id"]); ?>"><?php echo ($vo_ser["book_name"]); ?></a>
	   						<a href="http://localhost/Home/searchresult/searchresult?writer=<?php echo ($vo_ser["book_writer"]); ?>"><?php echo ($vo_ser["book_writer"]); ?></a>
	   					</div><?php endforeach; endif; else: echo "" ;endif; ?>

	   			</div>
	   			
	   		</div>
	   		<!--侧边栏-->
	   		<div class="bookAbout">
	   			<div class="hotUser">
	   				<span class="hs"><p>置顶推荐榜</p></span>
	   				<ul id='ul_rec'>
                        <!--推荐用户-->
	   				</ul>
	   			</div>
	   			<div class="bookList">
	   				<p>热搜标签</p>
	   				<ul id="ul_hot">
	   					<!--热门标签-->
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
	<script type="text/javascript" src="../../Public/js/daohang.js"></script>
	<script type="text/javascript" src="../../Public/js/bookabout.js"></script>
</html>