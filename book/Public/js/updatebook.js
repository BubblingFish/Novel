$(document).ready(function (){
//				 显示类别
		    $.ajax({
		    	type:"post",
		    	url:"http://localhost/Home/recommend/type",
		    	success:function(response){
		    		var p=JSON.parse(response);
		    		console.log(p);
		    		var temp="";
		    		for (var i=0;i<p.length;i++) {
		    			temp+="<option value ='"+p[i]['type']+"'>"+p[i]['type']+"</option>";
		    		}
		    		$(temp).appendTo($('#sub_sel'));
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
//		    填充内容 
		    $.ajax({
		    	type:"post",
		    	url:"http://localhost/Home/perfect/show",
		    	success:function(response){
		    		if (response==0) {
		    			alert("出错了！");
		    			location.href="http://localhost/Home/index/index";
		    		} else{
		    			var res=JSON.parse(response);
		    			htmlobj=$.ajax({url:"../../bookAbstract/"+res[0]['abstract'],async:false});
		    			htmlobj2=$.ajax({url:"../../bookUrl/"+res[0]['book_url'],async:false});
		    			console.log(res);
		    			$("#bN").val(res[0]['book_name']);
		    			$("#bW").val(res[0]['book_writer']);
		    			$("#sub_sel").val(res[0]['book_cate']);
		    			$("#bU").val(htmlobj2.responseText);
		    			$("#bT").val(htmlobj.responseText);
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });           	
})