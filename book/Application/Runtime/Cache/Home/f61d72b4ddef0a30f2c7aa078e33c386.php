<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册页</title>
		<style>
			#subMit{
				display: none;
			}
		</style>
	</head>
	<body>
		<form action="http://localhost/Home/register/res" method="post">
			us:<input id="user_Name" type="text" name="userName"/><br />
			ps:<input id="user_Ps" type="text" name="userPs"/>
			<input  id="subMit" type="submit" value="提交"/>
		</form>
	</body>
	<script src="../../Public/js/jquery1.9.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
//			var user={name:$('#user_Name').text(),ps:$('#user_Ps').text()};
            var username=$('#user_Name').text();
			$('#user_Name').blur(function() {
				$.ajax({
					type:"post",
					url:"http://localhost/Home/register/res",
					data:username,
					success:function(response){
						console.log(response);
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