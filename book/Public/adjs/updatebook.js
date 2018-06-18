$(document).ready(function (){
	var count=1;//设置结果页每页显示条数
	$.ajax({
		type:"post",
		url: "http://localhost/Admin/serbook/getNum",
		success:function(response){
			if(response!=0){
			if(response>count){
				var pagecount=Math.ceil(response/count);
				$.ajax({
					type:"post",
					url: "http://localhost/Admin/serbook/getser",
					data:{rows:count},
					success:function(response){
						var k=JSON.parse(response);	
						$("#upBox").html("");
						for (var i=0;i<count;i++) {
							htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['yurl'],async:false});
							htmlobj2=$.ajax({url:"../../bookUrl/"+k[i]['xurl'],async:false});
							htmlobj3=$.ajax({url:"../../bookAbstract/"+k[i]['update_content'],async:false});
							$("<tr><td>"+k[i]['update_id']+"</td><td>"+k[i]['update_cate']+"</td><td>"+htmlobj3.responseText+"</td><td>"+k[i]['update_url']+"</td><td><a href='"+htmlobj.responseText+"'>原链接</a></td><td><a href='"+htmlobj2.responseText+"'>修改链接</a></td><td><a href='http://localhost/Admin/serbook/addRec?update_id="+k[i]['up_id']+"'>增加</a><a href='http://localhost/Admin/serbook/deleteRec?update_id="+k[i]['up_id']+"'>删除</a></td></tr>").appendTo($("#upBox"));
						}
													
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
			            		//	获取书籍资源
			            		$.ajax({
			            			type:"post",
			            			url: "http://localhost/Admin/serbook/getser",
			            			data:{rows: count,page: api.getCurrent()},
			            			success:function(response){
			            				var k=JSON.parse(response);
			            				$("#upBox").html("");
			            				for (var i=0;i<k.length;i++) {
			            					htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['yurl'],async:false});
							                htmlobj2=$.ajax({url:"../../bookUrl/"+k[i]['xurl'],async:false});
							                htmlobj3=$.ajax({url:"../../bookAbstract/"+k[i]['update_content'],async:false});
							                $("<tr><td>"+k[i]['update_id']+"</td><td>"+k[i]['update_cate']+"</td><td>"+htmlobj3.responseText+"</td><td>"+k[i]['update_url']+"</td><td><a href='"+htmlobj.responseText+"'>原链接</a></td><td><a href='"+htmlobj2.responseText+"'>修改链接</a></td><td><a href='http://localhost/Admin/serbook/addRec?update_id="+k[i]['up_id']+"'>增加</a><a href='http://localhost/Admin/serbook/deleteRec?update_id="+k[i]['up_id']+"'>删除</a></td></tr>").appendTo($("#upBox"));
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
			}else{
				$.ajax({
					type:"post",
					url: "http://localhost/Admin/serbook/getser",
					success:function(response){
						var k=JSON.parse(response);	
						console.log(k);
						$("#upBox").html("");
						for (var i=0;i<k.length;i++) {
							htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['yurl'],async:false});
							htmlobj2=$.ajax({url:"../../bookUrl/"+k[i]['xurl'],async:false});
							htmlobj3=$.ajax({url:"../../bookAbstract/"+k[i]['update_content'],async:false});
							$("<tr><td>"+k[i]['update_id']+"</td><td>"+k[i]['update_cate']+"</td><td>"+htmlobj3.responseText+"</td><td>"+k[i]['update_url']+"</td><td><a href='"+htmlobj.responseText+"'>原链接</a></td><td><a href='"+htmlobj2.responseText+"'>修改链接</a></td><td><a href='http://localhost/Admin/serbook/addRec?update_id="+k[i]['up_id']+"'>增加</a><a href='http://localhost/Admin/serbook/deleteRec?update_id="+k[i]['up_id']+"'>删除</a></td></tr>").appendTo($("#upBox"));
						}
					},
					error:function(){
						console.log("222");
					},
					async:true
				});
			}
		}
		},
		error:function(){
			console.log("222");
		},
		async:true
	});	
})