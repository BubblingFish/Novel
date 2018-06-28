$(document).ready(function (){
	var count=5;//设置结果页每页显示条数
	$.ajax({
		type:"post",
		url: "http://localhost/Admin/index/getNum",
		success:function(response){
			if(response!=0){
			if(response>count){
				var pagecount=Math.ceil(response/count);
				$.ajax({
					type:"post",
					url: "http://localhost/Admin/index/getser",
					data:{rows:count},
					success:function(response){
						var k=JSON.parse(response);	
						$("#tdBox").html("");
						for (var i=0;i<count;i++) {
							htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
							$("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_rec']+"</td><td>"+k[i]['rec_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td><a href='http://localhost/Admin/index/addRec?rec_id="+k[i]['rec_id']+"'>增加</a><a href='http://localhost/Admin/index/deleteRec?rec_id="+k[i]['rec_id']+"'>删除</a></td></tr>").appendTo($("#tdBox"));
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
			            			url: "http://localhost/Admin/index/getser",
			            			data:{rows: count,page: api.getCurrent()},
			            			success:function(response){
			            				var k=JSON.parse(response);
			            				$("#tdBox").html("");
			            				for (var i=0;i<k.length;i++) {
			            					htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
			            					$("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_rec']+"</td><td>"+k[i]['rec_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td><a href='http://localhost/Admin/index/addRec?rec_id="+k[i]['rec_id']+"'>增加</a><a href='http://localhost/Admin/index/deleteRec?rec_id="+k[i]['rec_id']+"'>删除</a></td></tr>").appendTo($("#tdBox"));
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
					url: "http://localhost/Admin/index/getser",
					success:function(response){
						console.log(response);
						var k=JSON.parse(response);	
						$("#tdBox").html("");
						for (var i=0;i<k.length;i++) {
							htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
							$("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_rec']+"</td><td>"+k[i]['rec_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td><a href='http://localhost/Admin/index/addRec?rec_id="+k[i]['rec_id']+"'>增加</a><a href='http://localhost/Admin/index/deleteRec?rec_id="+k[i]['rec_id']+"'>删除</a></td></tr>").appendTo($("#tdBox"));
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