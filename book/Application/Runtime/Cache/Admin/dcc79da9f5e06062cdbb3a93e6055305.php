<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="../../Public/js/jquery1.9.1.min.js"></script>
		<link rel="shortcut icon" href="../../Public/bookImg/booknone.png" />
	</head>
	<body>
		<button onclick="Play()">删除</button>
		<a href="www.baidu.com">点击</a>
		<script type="text/javascript">
			function Play () {
							     $.ajax({
			            			type:"post",
			            			url: "http://localhost/Admin/index/tr",
			            			success:function(response){
			            				console.log(response);
			            			},
			            			error:function(){
			            				console.log("222");
			            			},
			            			async:true
			            		})
			}
		</script>
	</body>
</html>