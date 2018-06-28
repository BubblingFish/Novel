$(document).ready(function (){
	var count=5;//设置结果页每页显示条数
	$.ajax({
		type:"post",
		url: "http://localhost/Admin/seruser/getNum",
		success:function(response){
			if(response!=0){
			if(response>count){
				var pagecount=Math.ceil(response/count);
				$.ajax({
					type:"post",
					url: "http://localhost/Admin/seruser/getser",
					data:{rows:count},
					success:function(response){
						var k=JSON.parse(response);	
						$("#typeBox").html("");
						for (var i=0;i<count;i++) {
							$("<tr><td>"+k[i]['type']+"</td><td><a href='http://localhost/Admin/seruser/addRec?type_id="+k[i]['type_id']+"'>增加</a><a href='http://localhost/Admin/seruser/deleteRec?type_id="+k[i]['type_id']+"'>删除</a></td></tr>").appendTo($("#typeBox"));
						}
//								     分页
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
			            			url: "http://localhost/Admin/seruser/getser",
			            			data:{rows: count,page: api.getCurrent()},
			            			success:function(response){
			            				var k=JSON.parse(response);
			            				$("#typeBox").html("");
			            				for (var i=0;i<k.length;i++) {
			            					$("<tr><td>"+k[i]['type']+"</td><td><a href='http://localhost/Admin/seruser/addRec?type_id="+k[i]['type_id']+"'>增加</a><a href='http://localhost/Admin/seruser/deleteRec?type_id="+k[i]['type_id']+"'>删除</a></td></tr>").appendTo($("#typeBox"));
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
					url: "http://localhost/Admin/seruser/getser",
					success:function(response){
						var k=JSON.parse(response);	
						$("#typeBox").html("");
						for (var i=0;i<k.length;i++) {
							$("<tr><td>"+k[i]['type']+"</td><td><a href='http://localhost/Admin/seruser/addRec?type_id="+k[i]['type_id']+"'>增加</a><a href='http://localhost/Admin/seruser/deleteRec?type_id="+k[i]['type_id']+"'>删除</a></td></tr>").appendTo($("#typeBox"));
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