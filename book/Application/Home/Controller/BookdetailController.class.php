<?php
namespace Home\Controller;

use Think\Controller;

class BookdetailController extends Controller
{	
//	加载视图
    public function bookdetail()
    {
    	if(isset($_GET['B_id'])){
    		session_start();
    		$_SESSION['book_id']=$_GET['B_id'];   		
    	}
    	$this->display(bookdetail); 
    }
//  显示书籍信息
    public function dis(){
    	session_start();
    	$bookD=M('Book');
    	$result=$bookD->where("book_id=".$_SESSION['book_id'])->select();
    	if($result){
    		$str=$result[0]['book_img']."@".$result[0]['book_name']."@".$result[0]['book_writer']."@".$result[0]['book_recom']."@".$result[0]['book_score']."@".$result[0]['abstract']."@".$result[0]['book_url']."@".$result[0]['book_id']."@".$result[0]['book_cate'];
    		if($_SESSION['us']){
    			echo $str."@1";	
    		}else{
    			echo $str."@0";   			
    		}
    	}else{
    		echo 0;
    	}
    }
//  显示评论信息
    public function opo(){
    	session_start();
    	$User=M('User');
    	$resultUser=$User->where("user_name='".$_SESSION['us']."'")->select();

    	$data['book_id']=$_SESSION['book_id'];
    	$data['user_id']=$resultUser[0]['user_id'];
    	$Likebook=M('Likebook');
    	$resultLike=$Likebook->where($data)->select();

    	if(count($resultLike)==0){
//  		点在加一
    		$Book=M('book');
    		$resultBook=$Book->where("book_id=".$data['book_id'])->select();
    		$data['book_score']=$resultBook[0]["book_score"]+1;
    		$resultBook=$Book->where("book_id=".$data['book_id'])->save($data);
//  		记录已经此本书此用户已点赞
            $temp['book_id']=$data['book_id'];
            $temp['user_id']=$data['user_id'];
            $resultLike=$Likebook->add($temp);
    		echo 0;
    	}else{
    		echo 1;
    	}
    }
//提交评论处理
    public function discuss(){
    	if($_POST['discuss']!=''){
    		session_start;
    		if(isset($_SESSION['us'])){
    			$User=M('User');
    			$resultUser=$User->where("user_name='".$_SESSION['us']."'")->select();
    			$Discuss=M(Discuss);
    			$data['book_id']=$_SESSION['book_id'];
    			$data['user_id']=$resultUser[0]['user_id'];
    			$data['dis_content']=$_POST['discuss'];
    			$data['dis_time']=date("Y-m-d").' '.date("H:i:s");
    			$result=$Discuss->add($data);
    			if($result){
    				header("Refresh:3;url=http://localhost/Home/bookdetail/bookdetail?B_id=".$_SESSION['book_id']);
    				echo("发表成功");				
    			}else{
    				header("Refresh:3;url=http://localhost/Home/bookdetail/bookdetail?B_id=".$_SESSION['book_id']);
    				echo("发表失败，请重新尝试");	    				
    			}	
    		}else{
    		header("Refresh:3;url=http://localhost/Home/login/login");
    		echo("登陆后方可评论");
    		}
    	}else{
    		header("Refresh:3;url=http://localhost/Home/bookdetail/bookdetail?B_id=".$_SESSION['book_id']);
    		echo("请提交有效评论");
    	}
    }
//  获取评论条目
    public function showNum(){
    	session_start;
    	$Discuss=M(Discuss);
    	$result=$Discuss->where('book_id='.$_SESSION['book_id'])->order('dis_time desc')->select();
    	echo count($result);    	
    }
//  初始评论显示
    public function dis_firstshow(){
    	session_start;
    	$Discuss=M(Discuss);
    	$result=$Discuss->where('book_id='.$_SESSION['book_id'])->order('dis_time desc')->select();
    	for($i=0;$i<count($result);$i++){
    		$User=M('User');
    		$result2=$User->where("user_id=".$result[$i]['user_id'])->field('user_name,user_img')->select();
    		$result[$i]['user_name']=$result2[0]['user_name'];
    		$result[$i]['user_img']=$result2[0]['user_img'];
    	}    
    	
    	if($result){
    		for($i=0;$i<$_POST['rows'];$i++){
    			$data[$i]['user_name']=$result[$i]['user_name'];
    			$data[$i]['user_img']=$result[$i]['user_img'];
    			$data[$i]['dis_content']=$result[$i]['dis_content'];
    			$data[$i]['dis_time']=$result[$i]['dis_time'];
    		}
    		echo json_encode($data);
    	}else{
    		echo 0;
    	}
    }    
    public function dis_allshow(){
    	session_start;
    	$Discuss=M(Discuss);
    	$result=$Discuss->where('book_id='.$_SESSION['book_id'])->order('dis_time desc')->select();
    	for($i=0;$i<count($result);$i++){
    		$User=M('User');
    		$result2=$User->where("user_id=".$result[$i]['user_id'])->field('user_name,user_img')->select();
    		$result[$i]['user_name']=$result2[0]['user_name'];
    		$result[$i]['user_img']=$result2[0]['user_img'];
    	}  
    	if($result){
    		for($i=0;$i<count($result);$i++){
    			$data[$i]['user_name']=$result[$i]['user_name'];
    			$data[$i]['user_img']=$result[$i]['user_img'];
    			$data[$i]['dis_content']=$result[$i]['dis_content'];
    			$data[$i]['dis_time']=$result[$i]['dis_time'];
    		}
    		echo json_encode($data);
    	}else{
    		echo 0;
    	}    	
    }
//  评论显示
    public function dis_show(){
    	$begin=($_POST['page']-1)*$_POST['rows'];
    	$end=$_POST['rows']*$_POST['page'];
    	session_start;
    	$Discuss=M(Discuss);
    	$result=$Discuss->where('book_id='.$_SESSION['book_id'])->order('dis_time desc')->select();
    	for($i=0;$i<count($result);$i++){
    		$User=M('User');
    		$result2=$User->where("user_id=".$result[$i]['user_id'])->field('user_name,user_img')->select();
    		$result[$i]['user_name']=$result2[0]['user_name'];
    		$result[$i]['user_img']=$result2[0]['user_img'];
    	}  
    	if($result){
    		$rowCount=0;//重置数组
    		if($end<count($result)){
    			for($i=$begin;$i<$end;$i++){
    				$data[$rowCount]['user_name']=$result[$i]['user_name'];
    				$data[$rowCount]['user_img']=$result[$i]['user_img'];
    			    $data[$rowCount]['dis_content']=$result[$i]['dis_content'];
    			    $data[$rowCount]['dis_time']=$result[$i]['dis_time'];
    			    $rowCount++;
    		    }
    		    echo json_encode($data);		
    		}else{
    			for($i=$begin;$i<count($result);$i++){
    				$data[$rowCount]['user_name']=$result[$i]['user_name'];
    				$data[$rowCount]['user_img']=$result[$i]['user_img'];
    			    $data[$rowCount]['dis_content']=$result[$i]['dis_content'];
    			    $data[$rowCount]['dis_time']=$result[$i]['dis_time'];
    			    $rowCount++;
    		    }
    		    echo json_encode($data);   			
    		}
    	}else{
    		echo 0;
    	}
    }
}
?>