$(document).ready(function (){
	//		    随机推荐用户
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/index/reUser",
		    	success:function(response){
		    		var rec=JSON.parse(response);
		    		for (var i=0;i<rec.length;i++) {
		    			var p=i+1;
		    			$("<li><span><p>"+p+"</p><a href='http://localhost/Home/recpersonal/show?id="+rec[i]['user_id']+"'>"+rec[i]['user_name']+"</a></span></li>").appendTo('#ul_rec');
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });
//		    获取热门标签
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/index/hotHover",
		    	success:function(response){
		    		var hothover=JSON.parse(response);
		    		for (var i=0;i<hothover.length;i++) {
		    			$("<li><span><a href='http://localhost/Home/searchresult/searchresult?cate="+hothover[i]['type']+"'>"+hothover[i]['type']+"</a></span></li>").appendTo('#ul_hot');
		    		}
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });			
})