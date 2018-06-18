<?php
namespace Home\Controller;

use Think\Controller;

class CateresultController extends Controller
{
    public function searchresult()
    {
    	$Book=M('Book');
    	session_start;
    	if(isset($_GET['cate'])){
    		$_SESSION['cate']=$_GET['cate'];
    		$result=$Book->where("book_cate='".$_GET['cate']."'")->select();
    	}   
    	if($result){
    		$_SESSION['cateNum']=count($result);
    	} 
    	       	
        $this->display(cateresult);
    }
    public function getser()
    {
    	$Book=M('Book');
    	session_start;
    	if(isset($_SESSION['cate'])){
    		$result=$Book->where("book_cate='".$_SESSION['cate']."'")->select();
    	}   	 

    	if($result){
    		if(isset($_POST['rows'])){//依据是否存在$_POST['rows']判断是否需要分页，存在则表示条目超过单页显示条数限制，需分页
    			if(isset($_POST['page'])){//依据是否存在$_POST['page']判断是否进行分页
    				$begin=($_POST['page']-1)*$_POST['rows'];
    	            $end=$_POST['rows']*$_POST['page'];
    	            $rowCount=0;//重置数组
    	            if($end<count($result)){//是否是最后的页面
    	            	for($i=$begin;$i<$end;$i++){
    	            		$data[$rowCount]['book_img']=$result[$i]['book_img'];
    	            		$data[$rowCount]['book_id']=$result[$i]['book_id'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $rowCount++;
    		            }   	            	
    	            }else{//最后页面显示
    	            	for($i=$begin;$i<count($result);$i++){
    	            		$data[$rowCount]['book_img']=$result[$i]['book_img'];
    	            		$data[$rowCount]['book_id']=$result[$i]['book_id'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $rowCount++;
    		            }     	            	
    	            }
    			}else{//未点击页码，无需分页，初始化第一个页面
    				for($i=0;$i<$_POST['rows'];$i++){
    					$data[$i]['book_img']=$result[$i]['book_img'];
    			        $data[$i]['book_id']=$result[$i]['book_id'];
    			        $data[$i]['book_name']=$result[$i]['book_name'];
    			        $data[$i]['book_writer']=$result[$i]['book_writer'];
    		        }    				
    			}
    		}else{//未超过单页限制个数，不需要分页
    			for($i=0;$i<count($result);$i++){
    				$data[$i]['book_img']=$result[$i]['book_img'];
    			    $data[$i]['book_id']=$result[$i]['book_id'];
    			    $data[$i]['book_name']=$result[$i]['book_name'];
    			    $data[$i]['book_writer']=$result[$i]['book_writer'];
    		    }   			
    		}
    		echo json_encode($data);
    	} 
    	       	
    }    
    public function getNum(){
    	session_start;
    	if(isset($_SESSION['cateNum'])){
    		echo $_SESSION['cateNum'];
    	}else{
    		echo 0;
    	}
    }
}
?>