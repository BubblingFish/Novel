$(document).ready(function (){
	var count=2;//设置结果页每页显示条数
	$.ajax({
		type:"post",
		url: "http://localhost/Home/cateresult/getNum",
		success:function(response){
			if(response!=0){
			if(response>count){
				var pagecount=Math.ceil(response/count);
				$.ajax({
					type:"post",
					url: "http://localhost/Home/cateresult/getser",
					data:{rows:count},
					success:function(response){
						var k=JSON.parse(response);	
						$("#serBox").empty();
						for (var i=0;i<count;i++) {
							$("<div class='htbook_item'><img class='htbook_img' src='../../bookImg/book"+k[i]['book_img']+"'/><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+k[i]['book_id']+"'>"+k[i]['book_name']+"</a><a href='http://localhost/Home/searchresult/searchresult?writer="+k[i]['book_writer']+"'>"+k[i]['book_writer']+"</a></div>").appendTo($("#serBox"));
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
			            			url: "http://localhost/Home/cateresult/getser",
			            			data:{rows: count,page: api.getCurrent()},
			            			success:function(response){
			            				var k=JSON.parse(response);
			            				console.log(response);
			            				$("#serBox").empty();
			            				for (var i=0;i<k.length;i++) {
			            					$("<div class='htbook_item'><img class='htbook_img' src='../../bookImg/book"+k[i]['book_img']+"'/><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+k[i]['book_id']+"'>"+k[i]['book_name']+"</a><a href='http://localhost/Home/searchresult/searchresult?writer="+k[i]['book_writer']+"'>"+k[i]['book_writer']+"</a></div>").appendTo($("#serBox"));
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
					url: "http://localhost/Home/cateresult/getser",
					success:function(response){
						var k=JSON.parse(response);	
						console.log(k);
						$("#serBox").empty();
						for (var i=0;i<k.length;i++) {
							$("<div class='htbook_item'><img class='htbook_img' src='../../bookImg/book"+k[i]['book_img']+"'/><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+k[i]['book_id']+"'>"+k[i]['book_name']+"</a><a href='http://localhost/Home/searchresult/searchresult?writer="+k[i]['book_writer']+"'>"+k[i]['book_writer']+"</a></div>").appendTo($("#serBox"));
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
