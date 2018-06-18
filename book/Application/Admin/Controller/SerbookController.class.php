<?php
namespace Admin\Controller;

use Think\Controller;

class SerbookController extends Controller
{
    public function serbook()
    {
    	$this->display(serbook);
    }
    public function getNum(){
    	$Up=M('Perfect');
    	$result=$Up->where('paudi=0')->select();
    	echo count($result);
    }
    public function getser()
    {
    	$Up=M('Perfect');
    	$result=$Up->where('paudi=0')->select();

    	if($result){
    		$Book=M('Book');
    		if(isset($_POST['rows'])){//依据是否存在$_POST['rows']判断是否需要分页，存在则表示条目超过单页显示条数限制，需分页
    			if(isset($_POST['page'])){//依据是否存在$_POST['page']判断是否进行第一页的初始化，存在则已经分页
    				$begin=($_POST['page']-1)*$_POST['rows'];
    	            $end=$_POST['rows']*$_POST['page'];
    	            $rowCount=0;//重置数组
    	            if($end<count($result)){//是否是最后的页面
    		            for($i=$begin;$i<$end;$i++){
    		            	$resultBook=$Book->where("book_id=".$result[$i]['pbook_id'])->select();
    				
    				        if($resultBook[0]['book_cate']!=$result[$i]['pbook_cate']){
    				        	$data[$rowCount]['update_cate']=$result[$i]['pbook_cate']."->".$resultBook[0]['book_cate'];
    				        }else{
    					        $data[$rowCount]['update_cate']="无";
    				        }
    				        if($resultBook[0]['abstract']!=$result[$i]['pabstract']){
    					        $data[$rowCount]['update_content']=$resultBook[0]['abstract'];
    				        }
    				        else{
    					        $data[$rowCount]['update_content']="无";
    				        }
    				        if($resultBook[0]['book_url']!=$result[$i]['pbook_url']){
    					        $data[$rowCount]['update_url']="链接修改";
    				        }
    				        else{
    					        $data[$rowCount]['update_url']="无";
    				        }    			 				    				
    				        $data[$rowCount]['update_id']=$result[$i]['pbook_id'];
    				        $data[$rowCount]['yurl']=$result[$i]['pbook_url'];
    				        $data[$rowCount]['xurl']=$resultBook[0]['book_url'];
    				        $data[$rowCount]['up_id']=$result[$i]['perfect_id'];
    				        $rowCount++;
    		            }  	            	
    	            }else{//最后页面显示
    	            	for($i=$begin;$i<count($result);$i++){
    		            	$resultBook=$Book->where("book_id=".$result[$i]['pbook_id'])->select();
    				
    				        if($resultBook[0]['book_cate']!=$result[$i]['pbook_cate']){
    				        	$data[$rowCount]['update_cate']=$result[$i]['pbook_cate']."->".$resultBook[0]['book_cate'];
    				        }else{
    					        $data[$rowCount]['update_cate']="无";
    				        }
    				        if($resultBook[0]['abstract']!=$result[$i]['pabstract']){
    					        $data[$rowCount]['update_content']=$resultBook[0]['abstract'];
    				        }
    				        else{
    					        $data[$rowCount]['update_content']="无";
    				        }
    				        if($resultBook[0]['book_url']!=$result[$i]['pbook_url']){
    					        $data[$rowCount]['update_url']="链接修改";
    				        }
    				        else{
    					        $data[$rowCount]['update_url']="无";
    				        }    			 				    				
    				        $data[$rowCount]['update_id']=$result[$i]['pbook_id'];
    				        $data[$rowCount]['yurl']=$result[$i]['pbook_url'];
    				        $data[$rowCount]['xurl']=$resultBook[0]['book_url'];
    				        $data[$rowCount]['up_id']=$result[$i]['perfect_id'];
    				        $rowCount++;
    		            }     	            	
    	            }
    			}else{//未点击页码，无需分页，初始化第一个页面
    				for($i=0;$i<$_POST['rows'];$i++){
    					$resultBook=$Book->where("book_id=".$result[$i]['pbook_id'])->select();
    				
    				    if($resultBook[0]['book_cate']!=$result[$i]['pbook_cate']){
    				    	$data[$i]['update_cate']=$result[$i]['pbook_cate']."->".$resultBook[0]['book_cate'];
    				    }else{
    					    $data[$i]['update_cate']="无";
    				    }
    				    if($resultBook[0]['abstract']!=$result[$i]['pabstract']){
    					    $data[$i]['update_content']=$resultBook[0]['abstract'];
    				    }
    				    else{
    					    $data[$i]['update_content']="无";
    				    }
    				    if($resultBook[0]['book_url']!=$result[$i]['pbook_url']){
    					    $data[$i]['update_url']="链接修改";
    				    }
    				    else{
    					    $data[$i]['update_url']="无";
    				    }    			 				    				
    				    $data[$i]['update_id']=$result[$i]['pbook_id'];
    				    $data[$i]['yurl']=$result[$i]['pbook_url'];
    				    $data[$i]['xurl']=$resultBook[0]['book_url'];
    				    $data[$i]['up_id']=$result[$i]['perfect_id'];
    		        }    				
    			}
    		}else{//未超过单页限制个数，不需要分页
    			for($i=0;$i<count($result);$i++){
    				$resultBook=$Book->where("book_id=".$result[$i]['pbook_id'])->select();
    				
    				if($resultBook[0]['book_cate']!=$result[$i]['pbook_cate']){
    					$data[$i]['update_cate']=$resultBook[0]['book_cate']."->".$result[$i]['pbook_cate'];
    				}else{
    					$data[$i]['update_cate']="无";
    				}
    				if($resultBook[0]['abstract']!=$result[$i]['pabstract']){
    					$data[$i]['update_content']=$resultBook[0]['abstract'];
    				}
    				else{
    					$data[$i]['update_content']="无";
    				}
    				if($resultBook[0]['book_url']!=$result[$i]['pbook_url']){
    					$data[$i]['update_url']="链接修改";
    				}
    				else{
    					$data[$i]['update_url']="无";
    				}    			 				    				
    				$data[$i]['update_id']=$result[$i]['pbook_id'];
    				$data[$i]['yurl']=$result[$i]['pbook_url'];
    				$data[$i]['xurl']=$resultBook[0]['book_url'];
    				$data[$i]['up_id']=$result[$i]['perfect_id'];
    		    }   			
    		}
    		echo json_encode($data);
    	} 
    	       	
    } 
    public function deleteRec(){
    	$Del=M('Perfect');
    	$result=$Del->where('perfect_id='.$_GET['update_id'])->select();
        $Book=M('Book');
        $result2=$Book->where("book_id=".$result[0]['pbook_id'])->select();  
    	if($result){
    		if($result2[0]['book_img']!=$result[0]['pbook_img']){
    			unlink("bookImg/book".$result[0]['pbook_img']);
           }	
    		$file = "bookAbstract/".$result[0]['pabstract'];
    		$file2 = "bookUrl/".$result[0]['pbook_url'];
    		unlink($file);
    		unlink($file2);		
    	} 
    	$result2=$Del->where('perfect_id='.$_GET['update_id'])->delete(); 
    	if($result2){
//  		删除成功
    		header("Refresh:0;url=http://localhost/Admin/serbook/serbook");
    	}  	
    } 
    public function addRec(){
    	$Del=M('Perfect');
    	$result=$Del->where('perfect_id='.$_GET['update_id'])->select(); 
    	if($result){
//  		查找成功

//清除原文件
            $Book=M('Book');
            $resultBook2=$Book->where("book_id=".$result[0]['pbook_id'])->select();
            
    	    if($resultBook2[0]['book_img']!=$result[0]['pbook_img']){
    	    	unlink("bookImg/book".$resultBook2[0]['pbook_img']);
            }
            $file = "bookAbstract/".$resultBook2[0]['abstract'];
    		$file2 = "bookUrl/".$resultBook2[0]['book_url'];
    		unlink($file);
    		unlink($file2);		
            //添加新文件
            $Book->book_cate=$result[0]['pbook_cate'];
            $Book->abstract=$result[0]['pabstract'];
            $Book->book_url=$result[0]['pbook_url'];
            $Book->book_score=$result[0]['pbook_score'];
            $Book->book_recom=$result[0]['pbook_recom'];
            $resultBook=$Book->where("book_id=".$result[0]['pbook_id'])->save();
            if($resultBook){
            	$User=M('User');
            	$resultUser=$User->where("user_name='".$result[0]['pbook_recom']."'")->field('user_score')->select();
            	if($resultUser){
            		$User->user_score=$resultUser[0]['user_score']+$result[0]['user_score'];
            		$result3=$User->where("user_name='".$result[0]['pbook_recom']."'")->save();
            		if($result3){
                		$Del->paudi=1;
            		    $result2=$Del->where('perfect_id='.$_GET['update_id'])->save();
            		    if($result2){
            		    	echo "修改成功";
            			    header("Refresh:3;url=http://localhost/Admin/serbook/serbook");
            	        }         			
            		}
            	} 	
            }
    	}     	   	
    }             
}