$(document).ready(function (){
		var count=5;//设置结果页每页显示条数
		$.ajax({
			type:"post",
			url: "http://localhost/Admin/bman/getbmanNum",
			success:function(response){
				console.log(response);
				if(response!=0){
					if(response>count){
						var pagecount=Math.ceil(response/count);
						$.ajax({
							type:"post",
					        url: "http://localhost/Admin/bman/serbman",
					        data:{rows:count},
					        success:function(response){
					        	var k=JSON.parse(response);	
						        $("#bBox").html("");
						        for (var i=0;i<count;i++) {
						        	htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
							        $("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_recom']+"</td><td>"+k[i]['book_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td>"+k[i]['update_time']+"</td><td><a href='http://localhost/Admin/bman/deletebman?remove_id="+k[i]['book_id']+"'>删除</a></td></tr>").appendTo($("#bBox"));
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
			            	        	$.ajax({
			            	        		type:"post",
			            			        url: "http://localhost/Admin/bman/serbman",
			            			        data:{rows: count,page: api.getCurrent()},
			            			        success:function(response){
			            			        	var k=JSON.parse(response);
			            				        $("#bBox").html("");
			            				        for (var i=0;i<k.length;i++) {
			            				        	htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
							                        $("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_recom']+"</td><td>"+k[i]['book_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td>"+k[i]['update_time']+"</td><td><a href='http://localhost/Admin/bman/deletebman?remove_id="+k[i]['book_id']+"'>删除</a></td></tr>").appendTo($("#bBox"));
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
					    url: "http://localhost/Admin/bman/serbman",
					    success:function(response){
					    	var k=JSON.parse(response);
					    	console.log(k);
					    	$("#bBox").html("");
					    	for (var i=0;i<k.length;i++) {
					    		htmlobj=$.ajax({url:"../../bookUrl/"+k[i]['book_url'],async:false});
							    $("<tr><td><img src='../../bookImg/book"+k[i]['book_img']+"'></td><td>"+k[i]['book_name']+"</td><td>"+k[i]['book_cate']+"</td><td>"+k[i]['book_writer']+"</td><td>"+k[i]['book_recom']+"</td><td>"+k[i]['book_score']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td>"+k[i]['update_time']+"</td><td><a href='http://localhost/Admin/bman/deletebman?remove_id="+k[i]['book_id']+"'>删除</a></td></tr>").appendTo($("#bBox"));
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