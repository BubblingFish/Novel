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
		<link rel="stylesheet" type="text/css" href="../../Public/styles/content.css" />
		<script type="text/javascript" src="../../Public/js/angular.min.js" ></script>
	</head>
	<body>
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
       		<div class="Res_Log">
       			<?php show();?>
       		</div>
       	</div>
       </div>
       <!--内容-->	
	   <div class="contentBox">
	   	<div class="Content">
	   		<div class="books">
	   			<h3>最热资源</h3>
	   			<div class="hotBooks">
	   				<?php if(is_array($hotlist)): $i = 0; $__LIST__ = array_slice($hotlist,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_hot): $mod = ($i % 2 );++$i;?><div class="htbook_item">
	   						<img class="htbook_img" src="../../bookImg/book<?php echo ($vo_hot["book_img"]); ?>"/>
	   						<a href="http://localhost/Home/bookdetail/bookdetail?B_id=<?php echo ($vo_hot["book_id"]); ?>"><?php echo ($vo_hot["book_name"]); ?></a>
	   						<a href="http://localhost/Home/searchresult/searchresult?writer=<?php echo ($vo_hot["book_writer"]); ?>"><?php echo ($vo_hot["book_writer"]); ?></a>
	   					</div><?php endforeach; endif; else: echo "" ;endif; ?>
	   				

	   			</div>
	   			
	   			<h3>最新资源</h3>
	   			<div class="newBooks" id="newBooks2">
	   				
	   					<!--<div class="nwbook_item">
	   						<img class="nwbook_img" src="../../bookImg/book<?php echo ($vo_new["book_img"]); ?>"/>
	   						<span><a href="#"><?php echo ($vo_new["book_name"]); ?></a><b><?php echo ($vo_new["book_writer"]); ?></b>
	   							<p></p>
	   						</span>
	   					</div>-->

	   				

	   			</div>		
	   		</div>
	   		<!--侧边栏-->
	   		<div class="bookAbout">
	   			<div class="hotUser">
	   				<span class="hs"><p>置顶推荐榜</p><a>更多+</a></span>
	   				<ul>
	   					<li><span><p>1</p><a>武神</a><small>作者1</small></span></li>
	   					<li><span><p>2</p><a>斗破苍穹</a><small>作者1</small></span></li>
	   					<li><span><p>3</p><a>悟空传</a><small>作者1</small></span></li>
	   					<li><span><p>4</p><a>雪中悍刀行</a><small>作者1</small></span></li>
	   					<li><span><p>5</p><a>择天记</a><small>作者1</small></span></li>
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
//			导航栏按钮
			$(".btn").on("click",function(){
				$(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
			});
//最新书籍
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/index/newBook",
		    	success:function(response){
		    		var str=response.split('&');
		    		for (var i=0;i<str.length-1;i++) {
		    			var t1=str[i].split('@');
		    			showNew (t1[0],t1[1],t1[2],t1[3],t1[4]);
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
			
//			添加最新书籍函数
            function showNew (book_id,name,writer,img,abstract) {
                htmlobj=$.ajax({url:"../../bookAbstract/"+abstract,async:false});
                console.log(htmlobj.responseText);
                var str='';
                if (htmlobj.responseText.length>100) {
                	str=htmlobj.responseText.slice(0,101)+"<a id='copy' href='"+book_id+"'>...更多</a>";
                }else{
                	str=htmlobj.responseText;
                }
            	var div=$("<div class='nwbook_item'><img class='nwbook_img' src='../../bookImg/book"+img+"'/><span><a href='"+book_id+"'>"+name+"</a><b>"+writer+"</b><p>"+str+"</p></span></div>").appendTo($('#newBooks2'));
            }
		})
</script>
</html>