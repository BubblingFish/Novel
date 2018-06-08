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
								$('#y1').html("账号可用");
								break;								
							}
							case '2':{
								console.log('12');
								$('#y1').html("未检测到此用户");
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