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
		<link rel="stylesheet" type="text/css" href="../../Public/styles/content.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/personal.css" />
	</head>
	<body>
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
               <h1 class="title"><a href="#">书荒之家</a><span class="btn"><img src="../../Public/images/btn.png" width="34" height="34" alt=""/></span></h1>
               <!--<![endif]-->
            </div>
        </div>
       <!--内容-->	
       <div class="perBox" id="pBox">
       	    <!--<div class="perImg"><img src="../../../../bookImg/book20180518210621112.jpeg"/></div>
       	    <div>
       	    	<ul>
       	    		<li><small>账号信息：</small>1122<a>修改账号密码</a></li>
       	    		<li><small>个人积分：</small>222</li>
       	    		<li><small>个人书单：</small><span><p>斗破苍穹</p><p>斗破苍穹</p><p>斗破苍穹</p><p>斗破苍穹</p></span><a>查看更多</a></li>
       	    	</ul>
       	    </div>-->
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
	<script type="text/javascript" src="../../Public/js/getperson.js"></script>
</script>
</html>