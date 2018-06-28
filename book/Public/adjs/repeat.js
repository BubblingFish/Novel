$(document).ready(function (){
	var count=4;//设置结果页每页显示条数
	$.ajax({
		type:"post",
		url: "http://localhost/Admin/repeat/repeatNo",
		success:function(response){
			var k=JSON.parse(response);
			console.log(k);
			htmlobj=$.ajax({url:"../../bookUrl/"+k[0]['book_url'],async:false});
			$("<tr><td><img src='../../bookImg/book"+k[0]['book_img']+"'></td><td>"+k[0]['book_name']+"</td><td>"+k[0]['book_cate']+"</td><td>"+k[0]['book_writer']+"</td><td>"+k[0]['book_recom']+"</td><td>"+k[0]['update_time']+"</td><td><a href='"+htmlobj.responseText+"'>跳转</a></td><td>-原书籍-</td></tr>").appendTo($("#reBox"));
		    htmlobj2=$.ajax({url:"../../bookUrl/"+k[1]['book_url'],async:false});
			$("<tr><td><img src='../../bookImg/book"+k[1]['book_img']+"'></td><td>"+k[1]['book_name']+"</td><td>"+k[1]['book_cate']+"</td><td>"+k[1]['book_writer']+"</td><td>"+k[1]['book_recom']+"</td><td>"+k[1]['update_time']+"</td><td><a href='"+htmlobj2.responseText+"'>跳转</a></td><td><a href='http://localhost/Admin/repeat/fg?fgy="+k[0]['book_id']+"&fgn="+k[1]['book_id']+"'>替换</a><a href='http://localhost/Admin/repeat/defg?dere="+k[1]['book_id']+"'>删除</a></td></tr>").appendTo($("#reBox"));
		},
		error:function(){
			console.log("222");
		},
		async:true
	});	
})