$(document).ready(function (){
	
//			导航栏按钮
//		    		分页
	$.ajax({//获取总行数
		type:"post",
		url: "http://localhost/Home/index/newbooknum",
		success:function(response){
			var count=5;
			var pagecount=Math.ceil(response/count);
//			获得初始页面
			$.ajax({
						type:"post",
						url: "http://localhost/Home/index/newPrev",
						data:{rows: count},
						success:function(response){
							var str=response.split('&');
							$("#newBooks2").empty();
							for (var i=0;i<str.length-1;i++) {
								var t1=str[i].split('@');
								showNew (t1[0],t1[1],t1[2],t1[3],t1[4]);
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
						url: "http://localhost/Home/index/newBook",
						data:{rows: count,page: api.getCurrent()},
						success:function(response){
							var str=response.split('&');
							$("#newBooks2").empty();
							for (var i=0;i<str.length-1;i++) {
								var t1=str[i].split('@');
								showNew (t1[0],t1[1],t1[2],t1[3],t1[4]);
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
		    
            
//			添加最新书籍函数
            function showNew (book_id,name,writer,img,abstract) {
                htmlobj=$.ajax({url:"../../bookAbstract/"+abstract,async:false});
                var str='';
                if (htmlobj.responseText.length>100) {
                	str=htmlobj.responseText.slice(0,101)+"<a id='copy' href='http://localhost/Home/bookdetail/bookdetail?B_id="+book_id+"'>...更多</a>";
                }else{
                	str=htmlobj.responseText;
                }
            	var div=$("<div class='nwbook_item'><img class='nwbook_img' src='../../bookImg/book"+img+"'/><span><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+book_id+"'>"+name+"</a><b>"+writer+"</b><p>"+str+"</p></span></div>").appendTo($('#newBooks2'));
            }		    
})