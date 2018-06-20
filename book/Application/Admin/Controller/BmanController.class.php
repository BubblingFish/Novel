<?php
namespace Admin\Controller;

use Think\Controller;

class BmanController extends Controller
{
    public function bman()
    {
    	if(isset($_POST['serB'])&&$_POST['serB']!=''){
    		session_start();
    		$_SESSION['serB']=$_POST['serB'];
    		unset($_POST['serB']);
    	}
    	echo $_POST['serB'];
    	$this->display(bman);
    }  
    public function getbmanNum(){
    	session_start();
    	$Book=M('Book');
    	if(isset($_SESSION['serB'])&&$_SESSION['serB']!=''){
    	    $result=$Book->where("book_name='".$_SESSION['serB']."' And audi=1")->select();
    	    echo count($result);
    	}else{
    	    $result=$Book->where("audi=1")->select();
    	    echo count($result); 
    	}
    }      
    public function serbman()
    {
    	session_start();
    	$Book=M('Book');
    	if(isset($_SESSION['serB'])){
    	    $result=$Book->where("book_name='".$_SESSION['serB']."' And audi=1")->select();	
    	    unset($_SESSION['serB']); 	
    	}else{
    	    $result=$Book->where("audi=1")->select(); 
    	}
        if($result){
    		if(isset($_POST['rows'])){//依据是否存在$_POST['rows']判断是否需要分页，存在则表示条目超过单页显示条数限制，需分页
    			if(isset($_POST['page'])){//依据是否存在$_POST['page']判断是否进行第一页的初始化，存在则已经分页
    				$begin=($_POST['page']-1)*$_POST['rows'];
    	            $end=$_POST['rows']*$_POST['page'];
    	            $rowCount=0;//重置数组
    	            if($end<count($result)){//是否是最后的页面
    	            	for($i=$begin;$i<$end;$i++){
    				        $data[$rowCount]['book_img']=$result[$i]['book_img'];
    			            $data[$rowCount]['book_id']=$result[$i]['book_id'];
    			            $data[$rowCount]['book_url']=$result[$i]['book_url'];
    			            $data[$rowCount]['book_cate']=$result[$i]['book_cate'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $data[$rowCount]['book_recom']=$result[$i]['book_recom'];
    			            $data[$rowCount]['book_score']=$result[$i]['book_score'];
    			            $data[$rowCount]['update_time']=$result[$i]['update_time'];
    			            $rowCount++;
    		            }   	            	
    	            }else{//最后页面显示
    	            	for($i=$begin;$i<count($result);$i++){
    				        $data[$rowCount]['book_img']=$result[$i]['book_img'];
    			            $data[$rowCount]['book_id']=$result[$i]['book_id'];
    			            $data[$rowCount]['book_url']=$result[$i]['book_url'];
    			            $data[$rowCount]['book_cate']=$result[$i]['book_cate'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $data[$rowCount]['book_recom']=$result[$i]['book_recom'];
    			            $data[$rowCount]['book_score']=$result[$i]['book_score'];
    			            $data[$rowCount]['update_time']=$result[$i]['update_time'];
    			            $rowCount++;
    		            }     	            	
    	            }
    			}else{//未点击页码，无需分页，初始化第一个页面
    				for($i=0;$i<$_POST['rows'];$i++){
    					$data[$i]['book_img']=$result[$i]['book_img'];
    					$data[$i]['book_id']=$result[$i]['book_id'];
    			        $data[$i]['book_url']=$result[$i]['book_url'];
    			        $data[$i]['book_cate']=$result[$i]['book_cate'];
    			        $data[$i]['book_name']=$result[$i]['book_name'];
    			        $data[$i]['book_writer']=$result[$i]['book_writer'];
    			        $data[$i]['book_recom']=$result[$i]['book_recom'];
    			        $data[$i]['book_score']=$result[$i]['book_score'];
    			        $data[$i]['update_time']=$result[$i]['update_time'];
    		        }    				
    			}
    		}else{//未超过单页限制个数，不需要分页
    			for($i=0;$i<count($result);$i++){
    				$data[$i]['book_img']=$result[$i]['book_img'];
    				$data[$i]['book_id']=$result[$i]['book_id'];
    				$data[$i]['book_url']=$result[$i]['book_url'];
    				$data[$i]['book_cate']=$result[$i]['book_cate'];
    				$data[$i]['book_name']=$result[$i]['book_name'];
    				$data[$i]['book_writer']=$result[$i]['book_writer'];
    				$data[$i]['book_recom']=$result[$i]['book_recom'];
    				$data[$i]['book_score']=$result[$i]['book_score'];
    				$data[$i]['update_time']=$result[$i]['update_time'];
    		    }   			
    		}
    		echo json_encode($data);
    	}     	
    } 
    public function deletebman(){
    	echo $_GET['remove_id'];
    	$Book=M('Book');
    	$resultDel=$Book->where('book_id='.$_GET['remove_id'])->select();
    	if($resultDel){
            $file = "bookImg/book".$resultDel[0]['book_img'];
    		$file2 = "bookAbstract/".$resultDel[0]['abstract'];
    		$file3 = "bookUrl/".$resultDel[0]['book_url'];
    		unlink($file);
    		unlink($file2);
    		unlink($file3);	    		
    	}
    	$result=$Book->where('book_id='.$_GET['remove_id'])->delete();
    	if($result){
    		$dis=M('Discuss');
    		$resultDis=$dis->where('book_id='.$_GET['remove_id'])->delete();
    		if($resultDis){
    			$Like=M('Likebook');
    		    $resultLike=$Like->where('book_id='.$_GET['remove_id'])->delete();
    		    if($resultLike){
    		    	header("Refresh:0;url=http://localhost/Admin/bman/bman");
    		    }
    		}
    	}
    }
}