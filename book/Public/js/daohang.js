$(document).ready(function (){
//			导航栏按钮
    $(".btn").on("click",function(){
	     $(".nav").find("ul").slideToggle(400);//点击滑动显示或隐藏
    });
     $.ajax({ 
     	type:"post",
		url: "http://localhost/Home/index/show",
		success:function(response){
			var dir="../../userImg";
			var data=JSON.parse(response);
			if (data['username']=='登陆') {
				$("<img src='"+dir+"/"+data['img']+"'/><span><p><a href='http://localhost/Home/login/login'>"+data['username']+"</a>/<a href='http://localhost/Home/register/register'>注册</a></p></span>").appendTo($('#userL'));
			} else{
				$("<img src='"+dir+"/"+data['img']+"'/><span><p><a href='http://localhost/Home/personal/show'>"+data['username']+"</a>/<a href='http://localhost/Home/login/destroyUser'>注销</a></p></span>").appendTo($('#userL'));
			}
		},
		error:function(){
			console.log("222");
		},
		async:true
	});
})