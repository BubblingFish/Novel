$(document).ready(function (){
//			个人信息获取
		    $.ajax({ 
		    	type:"post",
		    	url: "http://localhost/Home/recpersonal/recpersonal",
		    	success:function(response){
		    		console.log(response);
		    		if (response==0) {
		    			var s=$("<div class='perImg'><img src='../../userImg/user.jpg'/></div><a class='us_login' href='http://localhost/Home/login/login'>登陆</a>").appendTo($("#pBox"));
		    		} else{
		    			var p=JSON.parse(response);
		    			var str='';
		    			
		    			for (var i=0;i<p['like_book'].length;i++) {
		    				str+="<small><a href='http://localhost/Home/bookdetail/bookdetail?B_id="+p['like_book'][i]['book_id']+"'>"+p['like_book'][i]['book_name']+"</a></small>";
		    		  }
		    			var s=$("<div class='perImg'><img src='../../userImg/"+p['user_img']+"'/></div><p class='usBox'>"+p['user_name']+"</p><div><ul><li><small>个人积分：</small><small>"+p['user_score']+"</small></li><li><small>个人书单：</small>"+str+"</li></ul></div>").appendTo($("#pBox"));
		    		    console.log(p['like_book']);	
		    		}
		    		
		    	},
		    	error:function(){
		    		console.log("222");
		    	},
		    	async:true
		    });				
})