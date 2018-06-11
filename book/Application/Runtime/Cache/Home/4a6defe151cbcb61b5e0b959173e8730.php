<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>书荒之家</title>
		<link rel="icon" type="image/x-icon" href="../../../../Public/images/title.jpg"/>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/daohang.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/searchbox.css" />
		<link rel="stylesheet" type="text/css" href="../../Public/styles/recommend.css" />
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
       <div class="reBox">
       	<img class="reImg" src="../../Public/images/reco.jpg"/>
       	<form class="reForm" action="http://localhost/Home/recommend/rem" method="post" enctype="multipart/form-data">
       		<h2>上传书籍</h2>
       	    <span><p>书名<small>*</small></p><input type="text" name="bookName" placeholder="请输入书名" /></span>
       	    <span><p>作者<small>*</small></p><input type="text" name="bookWriter" placeholder="请输入作者" /></span>
       	    
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

      
            
            <input class="book_url" type="text" name="bookUrl" placeholder="请输入书籍连接" /><small>*</small><br />            
            <input class="book_text" type="text" name="bookAbstract" placeholder="请输入书籍简介" /><br />
       		<input class="btn_rec" type="submit" value="提交"/>
       	</form>
       </div>
	</body>
	<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
	<script type="text/javascript" src="../../Public/js/daohang.js"></script> 
	<script type="text/javascript" src="../../Public/js/recommend.js"></script> 
</html>