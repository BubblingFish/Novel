<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>未知</title>
		<link rel="stylesheet" type="text/css" href="../../Public/styles/typesupply.css" />	
	</head>
	<body>
		<div class="t_sBox" id="dzBox">
			<form class="t_sForm" action="http://localhost/Home/typesupply/ts" method="post">
				<span><input type="text" name="typeName" placeholder="请输入您的类型要求"/></span>
				<span><input type="submit" value="提交"/></span>
			</form>
			
		</div>
		
		<script type="text/javascript">
				var div=document.createElement("div");
				div.id="dzDiv";
				document.body.appendChild(div);
								
		var typeWriter = {
			msg: function(msg){
				return msg;
			},
			len: function(){
				return this.msg.length;
			},
			seq: 0,
			speed: 150,//打字时间(ms)
			type: function(){
				
				var _this = this;
				var p=document.createElement("p");
				p.id="dz";
				div.appendChild(p);
				p.innerHTML='';
				p.innerHTML = _this.msg.substring(_this.seq,_this.seq+1);
				if (_this.seq == _this.len()) {
					_this.seq = 0;
					clearTimeout(t);
				}
				else {
					_this.seq++;
					var t = setTimeout(function(){_this.type()}, this.speed);
				}
			}
		}
		
		window.onload = function(){
			var msg = "世上许多事情是我们难以预料的，总会遇到很多不如意的事。我们不能控制际遇，却可以掌握自己；我们不知生命有多长久，但我们却可以安排当下的生活。我们无法避免逆境与困难，那就迎难而上，获取新的生活。——在这里是我们无法触及的领域，但因为有您的支持，我们才能越来越好......";
			function getMsg(){
				return msg;
			}
			typeWriter.msg = getMsg(msg);
			typeWriter.type();
		}
	</script>		
	</body>
</html>