function Play () {
	$.ajax({
		type:"post",
		url: "http://localhost/Home/bookdetail/opo",
		success:function(response){
			if (response==1) {
				$("#btn_zan").css("background-color","silver");
		    	alert("已经点赞了");
		    } else{
		   	    alert("点赞成功");
		    }
		},
		error:function(){
			console.log("222");
		},
		async:true
    });
}
$(document).ready(function (){
//书籍详情信息		
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/bookdetail/dis",
		    	success:function(response){
		    		var p=response.split('@');;
		    		console.log(p);
		    		htmlobj=$.ajax({url:"../../bookAbstract/"+p[5],async:false});
		    		htmlobj2=$.ajax({url:"../../bookUrl/"+p[6],async:false});
		    		console.log(htmlobj2.responseText);
		    		var op=$("<div class='book_detail_img'><img src='../../bookImg/book"+p[0]+"'/></div><span id='s_content'><b>"+p[1]+"</b><a>作者："+p[2]+"&nbsp;&nbsp;&nbsp;来自于："+p[3]+"</a><h6>好评数："+p[4]+"</h6></span><h4>内容简介</h4><p>"+htmlobj.responseText+"</p></div>").appendTo($("#b_detail"));
		    		var btn=$("<button id='btn_zan'>点赞</button>");
		    		var skip=$("<a id='skip' href='"+htmlobj2.responseText+"'>点击跳转</a>");
		    		if (p[7]=='1') {
		    			btn.disabled=true;
		    			btn.css("background-color","green");
		    			btn.attr("onclick","Play()");
		    		}else{
		    			btn.css("display","none");
		    		}
		    		$("#s_content").append(btn);
		    		$("#s_content").append(skip);
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
		    
//书籍评论详情
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/bookdetail/dis_show",
		    	success:function(response){
		    		if (response==0) {
		    			$("<span>暂无评论</span>").appendTo($("#dis_user"));
		    		} else{
		    			var k=JSON.parse(response);
		    			console.log(k);
		    			for (var i=0;i<k.length;i++) {
		    				console.log(k[i]['user_img']);
		    				var a=$("<span><div class='pUser'><img src='../../userImg/"+k[i]['user_img']+"'/><p>"+k[i]['user_name']+"</p></div><p class='pContent'>"+k[i]['dis_content']+"</p><b>"+k[i]['dis_time']+"</b></span>").appendTo($("#dis_user"));
		    			}
		    			
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
	
})