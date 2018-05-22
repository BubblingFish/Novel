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
					<li class="current"><a href="#" target="_blank">首页</a></li>
                    <li><a href="#">玄幻<small>movie</small></a></li>
                    <li><a href="#">武侠<small>tv play</small></a></li>
                    <li><a href="#">科幻<small>comic</small></a></li>
                    <li><a href="#">言情<small>variety</small></a></li>
                    <li><a href="#">都市<small>documentary</small></a></li>
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
	<script type="text/javascript">
		$(document).ready(function (){
//			导航栏按钮
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
			});
//			个人信息获取
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/personal/personal",
		    	success:function(response){
		    		if (response==0) {
		    			var s=$("<div class='perImg'><img src='../../userImg/user.jpg'/></div><a class='us_login' href='http://localhost/Home/login/login'>登陆</a>").appendTo($("#pBox"));
		    		} else{
		    			var p=JSON.parse(response);
		    			var str='';
		    			for (var i=0;i<p['like_book'].length;i++) {
		    				str+="<a href='http://localhost/Home/bookdetail/bookdetail?B_id="+p['like_book'][i]['book_id']+"'>"+p['like_book'][i]['book_name']+"</a>";
		    		   }
		    			var s=$("<div class='perImg'><img src='../../userImg/"+p['user_img']+"'/></div><p class='usBox'>"+p['user_name']+"</p><div><ul><li><small>个人积分：</small>"+p['user_score']+"</li><li><small>个人书单：</small><small>"+str+"</small></li></ul></div>").appendTo($("#pBox"));
		    		    console.log(p['like_book']);	
		    		}
		    		
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });			

		})
</script>
</html>