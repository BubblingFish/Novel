<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../Public/css/serbook.css" />
	</head>
	<body>
		<div class="bookBox">
			<table border="1" id="book_t">
				<tr>
					<th>书籍封面</th>
					<th>书籍名称</th>
					<th>书籍作者</th>
					<th>推荐用户</th>
					<th>书籍评分</th>
					<th>书籍类型</th>
					<th>更新时间</th>
					<th>书籍概要</th>
					<th>资源地址</th>
				</tr>
				<tr>
					<td><img src=".../../../../bookImg/book20180518210621112.jpeg"/></td>
					<td>闻一多见闻录</td>
					<td>蜡笔小新</td>
					<td>蜡笔小新</td>
					<td>32</td>
					<td>玄幻</td>
					<td>2018-09-01 11:20:21</td>
					<td>啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</td>
					<td>www.baidu.com</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript" src="../../Public/js/jquery1.9.1.min.js"></script> 
		<script type="text/javascript">
		$(document).ready(function (){
//		    $.ajax({ 
//		    	type:"post",
//		    	url: "http://localhost/Admin/serbook/showAll",
//		    	success:function(response){
//		    		var p=JSON.parse(response);		    		
//		    		for(var i=0;i<p.Length;i++){
//		    			htmlobj=$.ajax({url:"../../bookImg/book"+p[i]['book_img'],async:false});
//		    			htmlobj2=$.ajax({url:"../../bookAbstract/"+p[i]['abstract'],async:false});
//		    			htmlobj3=$.ajax({url:"../../bookUrl/"+p[i]['book_url'],async:false});
//		    			$("<tr><td></td></tr>").appendTo($("#book_t"));
//		    		}
//		    	},
//		    	error:function(){
//		    		console.log("222");
//		    	},
//		    	async:true
//		    });			
		});
		</script>
	</body>
</html>