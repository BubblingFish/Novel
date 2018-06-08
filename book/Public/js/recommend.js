$(document).ready(function (){
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
})