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
			$("<img src='"+dir+"/"+data['img']+"'/><span><p><a href='http://localhost/Home/personal/show'>"+data['username']+"</a>/<a href='http://localhost/Home/login/destroyUser'>注销</a></p></span>").appendTo($('#userL'));
		},
		error:function(){
			console.log("222");
		},
		async:true
	});
})