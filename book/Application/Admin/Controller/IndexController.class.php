<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$this->display(aaa);
    }
    public function tr(){
    	$file = "bookUrl/201806131758330";
    	if (!unlink($file))
    	{
    		echo ("Error deleting $file");
    	}else{
    		echo ("Deleted $file");
        }
    }
    public function getNum(){
    	$Rec=M('Recommend');
    	$result=$Rec->where('rec_if=0')->select();
    	echo count($result);
    }
    public function getser()
    {
    	$Rec=M('Recommend');
    	$result=$Rec->where('rec_if=0')->select(); 	
    	

    	if($result){
    		$Book=M('Book');
    		if(isset($_POST['rows'])){//依据是否存在$_POST['rows']判断是否需要分页，存在则表示条目超过单页显示条数限制，需分页
    			if(isset($_POST['page'])){//依据是否存在$_POST['page']判断是否进行第一页的初始化，存在则已经分页
    				$begin=($_POST['page']-1)*$_POST['rows'];
    	            $end=$_POST['rows']*$_POST['page'];
    	            $rowCount=0;//重置数组
    	            if($end<count($result)){//是否是最后的页面
    	            	for($i=$begin;$i<$end;$i++){
    	            		$resultBook=$Book->where("book_id=".$result[$i]['book_id'])->field('book_id,book_img,book_url,book_cate')->select();
    				        $data[$rowCount]['book_img']=$resultBook[0]['book_img'];
    			            $data[$rowCount]['book_id']=$resultBook[0]['book_id'];
    			            $data[$rowCount]['book_url']=$resultBook[0]['book_url'];
    			            $data[$rowCount]['book_cate']=$resultBook[0]['book_cate'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $data[$rowCount]['book_rec']=$result[$i]['user_name'];
    			            $data[$rowCount]['rec_score']=$result[$i]['rec_score'];
    			            $data[$rowCount]['rec_id']=$result[$i]['rec_id'];
    			            $rowCount++;
    		            }   	            	
    	            }else{//最后页面显示
    	            	for($i=$begin;$i<count($result);$i++){
    	            		$resultBook=$Book->where("book_id=".$result[$i]['book_id'])->field('book_id,book_img,book_url,book_cate')->select();
    				        $data[$rowCount]['book_img']=$resultBook[0]['book_img'];
    			            $data[$rowCount]['book_id']=$resultBook[0]['book_id'];
    			            $data[$rowCount]['book_url']=$resultBook[0]['book_url'];
    			            $data[$rowCount]['book_cate']=$resultBook[0]['book_cate'];
    			            $data[$rowCount]['book_name']=$result[$i]['book_name'];
    			            $data[$rowCount]['book_writer']=$result[$i]['book_writer'];
    			            $data[$rowCount]['book_rec']=$result[$i]['user_name'];
    			            $data[$rowCount]['rec_score']=$result[$i]['rec_score'];
    			            $data[$rowCount]['rec_id']=$result[$i]['rec_id'];
    			            $rowCount++;
    		            }     	            	
    	            }
    			}else{//未点击页码，无需分页，初始化第一个页面
    				for($i=0;$i<$_POST['rows'];$i++){
    					$resultBook=$Book->where("book_id=".$result[$i]['book_id'])->field('book_id,book_img,book_url,book_cate')->select();
    				    $data[$i]['book_img']=$resultBook[0]['book_img'];
    			        $data[$i]['book_id']=$resultBook[0]['book_id'];
    			        $data[$i]['book_url']=$resultBook[0]['book_url'];
    			        $data[$i]['book_cate']=$resultBook[0]['book_cate'];
    			        $data[$i]['book_name']=$result[$i]['book_name'];
    			        $data[$i]['book_writer']=$result[$i]['book_writer'];
    			        $data[$i]['book_rec']=$result[$i]['user_name'];
    			        $data[$i]['rec_score']=$result[$i]['rec_score'];
    			        $data[$i]['rec_id']=$result[$i]['rec_id'];
    		        }    				
    			}
    		}else{//未超过单页限制个数，不需要分页
    			for($i=0;$i<count($result);$i++){
    				$resultBook=$Book->where("book_id=".$result[$i]['book_id'])->field('book_id,book_img,book_url,book_cate')->select();
    				$data[$i]['book_img']=$resultBook[0]['book_img'];
    			    $data[$i]['book_id']=$resultBook[0]['book_id'];
    			    $data[$i]['book_url']=$resultBook[0]['book_url'];
    			    $data[$i]['book_cate']=$resultBook[0]['book_cate'];
    			    $data[$i]['book_name']=$result[$i]['book_name'];
    			    $data[$i]['book_writer']=$result[$i]['book_writer'];
    			    $data[$i]['book_rec']=$result[$i]['user_name'];
    			    $data[$i]['rec_score']=$result[$i]['rec_score'];
    			    $data[$i]['rec_id']=$result[$i]['rec_id'];
    		    }   			
    		}
    		echo json_encode($data);
    	} 
    	       	
    } 
    public function deleteRec(){
    	$Rec=M('Recommend');
    	$result=$Rec->where('rec_id='.$_GET['rec_id'])->select(); 
    	$Book=M('Book');
    	$resultDel=$Book->where("book_id=".$result[0]['book_id'])->select();
    	if($resultDel){
            $file = "bookImg/book".$resultDel[0]['book_img'];
    		$file2 = "bookAbstract/".$resultDel[0]['abstract'];
    		$file3 = "bookUrl/".$resultDel[0]['book_url'];
    		unlink($file);
    		unlink($file2);
    		unlink($file3);	    		
    	}
    	$result2=$Book->where("book_id=".$result[0]['book_id'])->delete();
    	if($result2){
//  		删除成功
    		$result3=$Rec->where('rec_id='.$_GET['rec_id'])->delete(); 
    		if($result3){
    			header("Refresh:0;url=http://localhost/Admin/index/index");
    		}
    	}  	
    } 
    public function addRec(){
    	$Rec=M('Recommend');
    	$result=$Rec->where('rec_id='.$_GET['rec_id'])->select(); 
    	$Book=M('Book');
    	$resultBook=$Book->where("book_name='".$result[0]['book_name']."' And book_writer='".$result[0]['book_writer']."' And audi=1")->select();
    	if($resultBook){
    		header("Refresh:0;url=http://localhost/Admin/repeat/repeat?g_id=".$result[0]['book_id']);
    	}else{
    		$Book->audi=1;
    	    $result2=$Book->where("book_id=".$result[0]['book_id'])->save();
    	    if($result2){
    	    	$User=M('User');
                $resultUser=$User->where("user_name='".$result[0]['user_name']."'")->field('user_score')->select();
                if($resultUser)
                {
                	$data['user_score']=$resultUser[0]['user_score']+$result[0]['rec_score'];
            	    $resultUser2=$User->where("user_name='".$result[0]['user_name']."'")->save($data);
            	    if($resultUser2){
            	    	$Rec->rec_if=1;
            		    $result3=$Rec->where('rec_id='.$_GET['rec_id'])->save();
            		    if($result3){
            		    	header("Refresh:0;url=http://localhost/Admin/index/index");
            		    }           		
            	    }
                }
    	    }     		
    	} 	
    }         
}
