<?php if (!defined('THINK_PATH')) exit(); function show(){ $dir="../../userImg"; session_start(); if(isset($_SESSION['us'])){ if(isset($_SESSION['img'])&&$_SESSION['img']!=''){ echo "<img  src='".$dir."/".$_SESSION['img']."'/>
        <span><p><a href='#'>".$_SESSION['us']."</a>
        /<a href='http://localhost/Home/login/destroyUser'>注销</a></p></span>"; }else{ echo "<img  src='../../Public/images/user.jpg'/>
        <span><p><a href='#'>".$_SESSION['us']."</a>
        /<a href='http://localhost/Home/login/destroyUser'>注销</a>
        </p></span>"; } } else{ echo "<img  src='../../Public/images/user.jpg'/>
      <span><p>
      <a href='http://localhost/Home/login/login'>登陆</a>/<a href='http://localhost/Home/register/register'>注册</a>
      </p></span>"; } } ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="icon" type="image/x-icon" href="../../../../Public/images/title.jpg"/>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/bookdetail.css" />
	</head>
	<body>
		<!--导航栏-->
		<div class="navBox">
			<div class="nav">
				<ul>
					<li class="current"><a href="#" target="_blank">首页</a></li>
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
       			<?php show();?>
       		</div>
       	</div>
      
       </div>
       <!--内容-->	
       <div class="book_detail_box">
       	<div class="book_detail" id="b_detail">
       		<!--书籍详情-->
       	</div>
        
        
        <div class="user_speak" id="dis_user">
       		<span><h4>书籍评论</h4></span>
       		<!--<span>
       			<div class="pUser">
       				<img src="../../../../bookImg/booknone.jpg" />
       				<p>1122</p>
       			</div>
       			<p class="pContent">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
       			<b>2010-09-18 18:17:42</b>
       		</span>-->
       	</div>
       	<div class="discuss_club">
       		<form action="http://localhost/Home/bookdetail/discuss" method="post">
       			<input class="dis_input1" type="text" name="discuss" placeholder="请输入评论（限30字以内）"/>
       			
       			<input class="dis_input2" type="submit" value="发表"/>
       		</form>
       	</div>
       </div>
       
	</body>
	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	<script type="text/javascript" src="../../Public/js/daohang.js"></script> 
	<script type="text/javascript" src="../../Public/js/bookdetail.js"></script> 
</script>
</html>