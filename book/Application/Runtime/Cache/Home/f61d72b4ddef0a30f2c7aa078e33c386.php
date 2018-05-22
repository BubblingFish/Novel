<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册页</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/register.css"/>
	</head>
	<body>
		<a class="title" href="#">书荒之家</a>
		<hr class="line"/>
		<div class="box">
			<form action="http://localhost/Home/register/userResgister" method="post" class="formbox" enctype="multipart/form-data">
				<h2 class="tag">Register</h2>
				<input type="hidden" name="MAX_FILE_SIZE" value="1024000"/>
				<input id="user_img" type="file" name="userImg" /><br />
				<input id="user_Name" type="text" name="userName" placeholder="User  Name"/>
				<span id="y1"></span>
				<input id="user_Ps" type="text" name="userPs" placeholder="User  Password"/><br />
				<input  id="subMit" type="submit" value="提交"/>
			</form>
		</div>
	</body>
	<script src="../../Public/js/jquery1.9.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
//			var user={name:$('#user_Name').text(),ps:$('#user_Ps').text()};
			$('#user_Name').blur(function() {
				var username=$('#user_Name').val();
				$.ajax({
					type:"post",
					url:"http://localhost/Home/register/res",
					data:{'username':username},
					success:function(response){
						switch(response){
							case '0':{
								console.log('10');
								$('#y1').html("请输入账号");
								break;
							}
							case '1':{
								console.log('11');
								$('#y1').html("账号已注册");
								break;								
							}
							case '2':{
								console.log('12');
								$('#y1').html("可注册");
								break;								
							}
							default:{
								$('#y1').html("未知的错误");
								break;
							}
						}
					},
					error:function(){
						console.log("222");
					},
					async:true
				});
			
			
			
			
			})
		})
	</script>
</html>