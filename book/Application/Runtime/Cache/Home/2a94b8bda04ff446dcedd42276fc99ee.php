<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/1.css" />
	</head>
	<body>
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
	</body>
	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	<script type="text/javascript">
		$(document).ready(function (){
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
				 });
		})
</script>
</html>