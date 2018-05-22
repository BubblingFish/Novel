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
		<link rel="stylesheet" type="text/css" href="../../Public/styles/recommend.css" />
		<script type="text/javascript" src="../../Public/js/angular.min.js" ></script>
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
                    <li><a href="#">推荐<small>+</small></a></li>
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
 <!--      				<small>积分：1024</small>-->
       		</div>
       	</div>
       </div>
       <!--内容-->	
       <div class="reBox">
       	<img class="reImg" src="../../Public/images/reco.jpg"/>
       	<form class="reForm" action="http://localhost/Home/perfect/upbook" method="post" enctype="multipart/form-data">
       		<h2>修改书籍</h2>
       	    <span><p>书名<small>*</small></p><input id="bN" type="text" name="bookName" placeholder="请输入书名" /></span>
       	    <span><p>作者<small>*</small></p><input id="bW" type="text" name="bookWriter" placeholder="请输入作者" /></span>
       	    
            <span>
            	<p>类别:<small>*</small></p>
            	<select class="sub_rec" id="sub_sel" name='subject' outline='none'>
            		<option value ="0">请选择类别</option>
            	</select>  
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<a href="http://localhost/Home/typesupply/typesupply">没有一致的？</a>
            </span>       	    
       	    
       	    
       	    <span><p>书籍封面</p>
       	    	<input type="hidden" name="MAX_FILE_SIZE" value="4096000"/>
       	    	<input type="file" style="border: none;display: inline-block;padding-top: 10px;" 
       	    		name="bookImg" border="none" /><br />
       	    </span>

            <!--<label>类别:</label>
            <input name='subject' type="checkbox" value="玄幻" /><label>玄幻</label>  
            <input name='subject' type="checkbox" checked value="都市" /><label>都市</label>  
            <input name='subject' type="checkbox" checked="惊悚" value="English"/><label>惊悚</label>  
            <input name='subject' type="checkbox" value="历史"/><label>历史</label><br /><br />-->
      
            
            <input class="book_url" id="bU" type="text" name="bookUrl" placeholder="请输入书籍连接"/><small>*</small><br />            
            <input class="book_text" id="bT" type="text" name="bookAbstract" placeholder="请输入书籍简介" /><br />
       		<input class="btn_rec" type="submit" value="提交"/>
       	</form>
       </div>
	</body>
	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	<script type="text/javascript">
		$(document).ready(function (){
//			导航栏
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
				 });
//				 显示类别
		    $.ajax({
		    	type:"post",
		    	url:"http://localhost/Home/recommend/type",
		    	success:function(response){
		    		var p=JSON.parse(response);
		    		console.log(p);
		    		var temp="";
		    		for (var i=0;i<p.length;i++) {
		    			temp+="<option value ='"+p[i]['type']+"'>"+p[i]['type']+"</option>";
		    		}
		    		$(temp).appendTo($('#sub_sel'));
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
//		    填充内容 
		    $.ajax({
		    	type:"post",
		    	url:"http://localhost/Home/perfect/show",
		    	success:function(response){
		    		if (response==0) {
		    			alert("出错了！");
		    			location.href="http://localhost/Home/index/index";
		    		} else{
		    			var res=JSON.parse(response);
		    			htmlobj=$.ajax({url:"../../bookAbstract/"+res[0]['abstract'],async:false});
		    			htmlobj2=$.ajax({url:"../../bookUrl/"+res[0]['book_url'],async:false});
		    			console.log(res);
		    			$("#bN").val(res[0]['book_name']);
		    			$("#bW").val(res[0]['book_writer']);
		    			$("#sub_sel").val(res[0]['book_cate']);
		    			$("#bU").val(htmlobj2.responseText);
		    			$("#bT").val(htmlobj.responseText);
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