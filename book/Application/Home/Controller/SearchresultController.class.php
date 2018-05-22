<?php
namespace Home\Controller;

use Think\Controller;

class SearchresultController extends Controller
{
    public function searchresult()
    {
    	$Book=M('Book');
    	if(isset($_GET['cate'])){
    		$result=$Book->where("book_cate='".$_GET['cate']."'")->select();
    	} 
    	if(isset($_GET['writer'])){
    		$result=$Book->where("book_writer='".$_GET['writer']."'")->select(); 		
    	}
    	if(isset($_POST['serBook'])){
    		$result=$Book->where("book_name='".$_POST['serBook']."'")->select(); 		
    	}    	
    	if($result){
    		$this->assign('serList',$result);
    	} 
    	       	
        $this->display(searchresult);
    }
    
   public function ser(){
    	 	
   }
}
?>