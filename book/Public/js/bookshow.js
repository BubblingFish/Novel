$(document).ready(function (){
//			导航栏按钮
//最新书籍
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/index/newBook",
		    	success:function(response){
		    		var str=response.split('&');
		    		for (var i=0;i<str.length-1;i++) {
		    			var t1=str[i].split('@');
		    			showNew (t1[0],t1[1],t1[2],t1[3],t1[4]);
		    		}
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
                	str=htmlobj.responseText.slice(0,101)+"<a id='copy' href='"+book_id+"'>...更多</a>";
                }else{
                	str=htmlobj.responseText;
                }
            	var div=$("<div class='nwbook_item'><img class='nwbook_img' src='../../bookImg/book"+img+"'/><span><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+book_id+"'>"+name+"</a><b>"+writer+"</b><p>"+str+"</p></span></div>").appendTo($('#newBooks2'));
            }		    
})