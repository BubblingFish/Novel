<?php
namespace Admin\Controller;

use Think\Controller;

class RepeatController extends Controller
{
    public function repeat()
    {
    	session_start();
    	$_SESSION['g_id']=$_GET['g_id']; 
    	$this->display(repeat);
    } 
    public function fg(){
    	echo $_GET['fgy'];
    	echo $_GET['fgn'];

    	$Book=M('Book');
    	
    	$result=$Book->where('book_id='.$_GET['fgn'])->select();
    	$result2=$Book->where('book_id='.$_GET['fgy'])->select();
    	echo $result2[0]['book_img'];
    	
    	$file = "bookImg/book".$result2[0]['book_img'];
    	$file2 = "bookAbstract/".$result2[0]['abstract'];
    	$file3 = "bookUrl/".$result2[0]['book_url'];
    	unlink($file);
    	unlink($file2);
    	unlink($file3);	
    	$Book->book_recom=$result[0]['book_recom'];
    	$Book->book_img=$result[0]['book_img'];
    	$Book->book_cate=$result[0]['book_cate'];
    	$Book->update_time=$result[0]['update_time'];
    	$Book->abstract=$result[0]['abstract'];
    	$Book->book_url=$result[0]['book_url'];
    	$result3=$Book->where('book_id='.$_GET['fgy'])->save();
    	if($result3){
    		$result4=$Book->where('book_id='.$_GET['fgn'])->delete();
    		$Rec=M('Recommend');
    		$Rec->rec_if=1;
    		$resultRec=$Rec->where('book_id='.$_GET['fgn'])->save();
    		header("Refresh:0;url=http://localhost/Admin/index/index");
    	}else{
    		echo "覆盖失败";
    		header("Refresh:1;url=http://localhost/Admin/index/index");    		
    	}
    }
    public function defg(){
    	echo $_GET['dere'];
    	$Book=M('Book');
    	$result=$Book->where("book_id=".$_GET['dere'])->select();
    	$file = "bookImg/book".$result[0]['book_img'];
    	$file2 = "bookAbstract/".$result[0]['abstract'];
    	$file3 = "bookUrl/".$result[0]['book_url'];
    	unlink($file);
    	unlink($file2);
    	unlink($file3);	
    	$result2=$Book->where("book_id=".$_GET['dere'])->delete();
    	if($result2){
    		$Rec=M('Recommend');
    	    $result3=$Rec->where('book_id='.$_GET['dere'])->delete();  
    	    if($result3){
    	    	echo "删除成功";
    		    header("Refresh:1;url=http://localhost/Admin/index/index"); 	    	
    	    } 		
    	}
    }    
    public function repeatNo(){
    	session_start();
    	if(isset($_SESSION['g_id'])){
    		$Book=M('Book');
    		$result=$Book->where("book_id=".$_SESSION['g_id'])->select();
    		if($result){
    			$result2=$Book->where("book_name='".$result[0]['book_name']."' And book_writer='".$result[0]['book_writer']."' And audi=1")->select();
    			if($result2){
    				$data[0]['book_id']=$result2[0]['book_id'];
    				$data[0]['book_img']=$result2[0]['book_img'];
    				$data[0]['book_name']=$result2[0]['book_name'];
    				$data[0]['book_cate']=$result2[0]['book_cate'];
    				$data[0]['book_writer']=$result2[0]['book_writer'];
    				$data[0]['book_recom']=$result2[0]['book_recom'];
    				$data[0]['update_time']=$result2[0]['update_time'];
    				$data[0]['book_url']=$result2[0]['book_url'];
    				
    				$data[1]['book_id']=$result[0]['book_id'];
    				$data[1]['book_img']=$result[0]['book_img'];
    				$data[1]['book_name']=$result[0]['book_name'];
    				$data[1]['book_cate']=$result[0]['book_cate'];
    				$data[1]['book_writer']=$result[0]['book_writer'];
    				$data[1]['book_recom']=$result[0]['book_recom'];
    				$data[1]['update_time']=$result[0]['update_time'];
    				$data[1]['book_url']=$result[0]['book_url'];
    				
    				echo json_encode($data);
    			}
    		}
    	}
    }           
}