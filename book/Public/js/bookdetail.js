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
		    		htmlobj=$.ajax({url:"../../bookAbstract/"+p[5],async:false});
		    		htmlobj2=$.ajax({url:"../../bookUrl/"+p[6],async:false});
		    		var op=$("<div class='book_detail_img'><img src='../../bookImg/book"+p[0]+"'/></div><span id='s_content'><b>"+p[1]+"</b><a>作者："+p[2]+"&nbsp;&nbsp;&nbsp;来自于："+p[3]+"</a><h6>好评数："+p[4]+"</h6></span><h4>内容简介</h4><p>"+htmlobj.responseText+"</p></div>").appendTo($("#b_detail"));
		    		var btn=$("<button id='btn_zan'>点赞</button>");
		    		var blank=$("<div class='discuss_club'><form action='http://localhost/Home/bookdetail/discuss' method='post'><input class='dis_input1' type='text' name='discuss' placeholder='请输入评论（限30字以内）'/><input class='dis_input2' type='submit' value='发表'/></form></div>");
		    		var skip=$("<a id='skip' href='"+htmlobj2.responseText+"'>点击跳转</a>");
		    		if (p[7]=='1') {
		    			btn.disabled=true;
		    			btn.css("background-color","green");
		    			btn.attr("onclick","Play()");
		    			$("#dis_club").append(blank);
		    		}else{
		    			btn.css("display","none");
		    			blank.css("display","none");
		    		}
		    		$("#s_content").append(btn);
		    		$("#s_content").append(skip);
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
		
			$('.M-box').pagination({
				pageCount:5,
				jump:true,
				coping:true,
				homePage:'首',
				endPage:'末',
				prevContent:'<',
				nextContent:'>'
			});
//		    		分页
	$.ajax({//获取总行数
		type:"post",
		url: "http://localhost/Home/bookdetail/showNum",
		success:function(response){
			var count=3;
			var pagecount=Math.ceil(response/count);
//			获得初始页面
			$.ajax({
				type:"post",
				url: "http://localhost/Home/bookdetail/dis_firstshow",
				data:{rows: count},
				success:function(response){
					$("#dis_user").empty();
					var k=JSON.parse(response);				
					if (response==0) {
						$("<span>暂无评论</span>").appendTo($("#dis_user"));
					} else{
						var k=JSON.parse(response);
						for (var i=0;i<k.length;i++) {
							var a=$("<span><div class='pUser'><img src='../../userImg/"+k[i]['user_img']+"'/><p>"+k[i]['user_name']+"</p></div><p class='pContent'>"+k[i]['dis_content']+"</p><b>"+k[i]['dis_time']+"</b></span>").appendTo($("#dis_user"));
		    			}
		    		}
				},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    })		
//		     分页
			$('.M-box').pagination({
				pageCount:pagecount,
				jump:true,
				coping:true,
				homePage:'首',
				endPage:'末',
				prevContent:'<',
				nextContent:'>',
				current:1, 
				callback:function(api){
//					获取书籍资源
					$.ajax({
						type:"post",
						url: "http://localhost/Home/bookdetail/dis_show",
						data:{rows: count,page: api.getCurrent()},
						success:function(response){
							$("#dis_user").empty();
							if (response==0) {
								$("<span>暂无评论</span>").appendTo($("#dis_user"));
		    		       } else{
		    		       	    var k=JSON.parse(response);
		    			        for (var i=0;i<k.length;i++) {
		    				        var a=$("<span><div class='pUser'><img src='../../userImg/"+k[i]['user_img']+"'/><p>"+k[i]['user_name']+"</p></div><p class='pContent'>"+k[i]['dis_content']+"</p><b>"+k[i]['dis_time']+"</b></span>").appendTo($("#dis_user"));
		    			        }
		    			    }
					    },
		    	        error:function(){
		    	        	console.log("222");
		    	        },
		    	        async:true
		           })				
				}
			});
		},
		error:function(){
			console.log("222");
		},
		async:true
	});	
	
})