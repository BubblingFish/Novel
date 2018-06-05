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
	<script type="text/javascript">
		function Play () {
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/bookdetail/opo",
		    	success:function(response){
		    		if (response==1) {
		    			$("#btn_zan").css("background-color","silver");
		    			alert("已经点赞了");
		    		} else{
		    			alert("点赞成功");
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
		}
		$(document).ready(function (){
//			导航栏
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
			});
			
//书籍详情信息		
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/bookdetail/dis",
		    	success:function(response){
		    		var p=response.split('@');;
		    		console.log(p);
		    		htmlobj=$.ajax({url:"../../bookAbstract/"+p[5],async:false});
		    		htmlobj2=$.ajax({url:"../../bookUrl/"+p[6],async:false});
		    		console.log(htmlobj2.responseText);
		    		var op=$("<div class='book_detail_img'><img src='../../bookImg/book"+p[0]+"'/></div><span id='s_content'><b>"+p[1]+"</b><a>作者："+p[2]+"&nbsp;&nbsp;&nbsp;来自于："+p[3]+"</a><h6>好评数："+p[4]+"</h6></span><h4>内容简介</h4><p>"+htmlobj.responseText+"</p></div>").appendTo($("#b_detail"));
		    		var btn=$("<button id='btn_zan'>点赞</button>");
		    		var skip=$("<a id='skip' href='"+htmlobj2.responseText+"'>点击跳转</a>");
		    		if (p[7]=='1') {
		    			btn.disabled=true;
		    			btn.css("background-color","green");
		    			btn.attr("onclick","Play()");
		    		}else{
		    			btn.css("display","none");
		    		}
		    		$("#s_content").append(btn);
		    		$("#s_content").append(skip);
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
		    
//书籍评论详情
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/bookdetail/dis_show",
		    	success:function(response){
		    		if (response==0) {
		    			$("<span>暂无评论</span>").appendTo($("#dis_user"));
		    		} else{
		    			var k=JSON.parse(response);
		    			console.log(k);
		    			for (var i=0;i<k.length;i++) {
		    				console.log(k[i]['user_img']);
		    				var a=$("<span><div class='pUser'><img src='../../userImg/"+k[i]['user_img']+"'/><p>"+k[i]['user_name']+"</p></div><p class='pContent'>"+k[i]['dis_content']+"</p><b>"+k[i]['dis_time']+"</b></span>").appendTo($("#dis_user"));
		    			}
		    			
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