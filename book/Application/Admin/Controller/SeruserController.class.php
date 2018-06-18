<?php
namespace Admin\Controller;

use Think\Controller;

class SeruserController extends Controller
{
    public function seruser()
    {
    	$this->display(seruser);
    }
    public function getNum(){
    	$Type=M('Booktype');
    	$result=$Type->where('type_audi=0')->select();
    	echo count($result);
    }
    public function getser()
    {
    	$Type=M('Booktype');
    	$result=$Type->where('type_audi=0')->select();	
    	

    	if($result){
    		if(isset($_POST['rows'])){//依据是否存在$_POST['rows']判断是否需要分页，存在则表示条目超过单页显示条数限制，需分页
    			if(isset($_POST['page'])){//依据是否存在$_POST['page']判断是否进行第一页的初始化，存在则已经分页
    				$begin=($_POST['page']-1)*$_POST['rows'];
    	            $end=$_POST['rows']*$_POST['page'];
    	            $rowCount=0;//重置数组
    	            if($end<count($result)){//是否是最后的页面
    	            	for($i=$begin;$i<$end;$i++){
    				        $data[$rowCount]['type_id']=$result[$i]['type_id'];
    			            $data[$rowCount]['type']=$result[$i]['type'];
    			            $rowCount++;
    		            }   	            	
    	            }else{//最后页面显示
    	            	for($i=$begin;$i<count($result);$i++){
    				        $data[$rowCount]['type_id']=$result[$i]['type_id'];
    			            $data[$rowCount]['type']=$result[$i]['type'];
    			            $rowCount++;;
    		            }     	            	
    	            }
    			}else{//未点击页码，无需分页，初始化第一个页面
    				for($i=0;$i<$_POST['rows'];$i++){
    					$data[$i]['type_id']=$result[$i]['type_id'];
    					$data[$i]['type']=$result[$i]['type'];
    		        }    				
    			}
    		}else{//未超过单页限制个数，不需要分页
    			for($i=0;$i<count($result);$i++){
    				$data[$i]['type_id']=$result[$i]['type_id'];
    				$data[$i]['type']=$result[$i]['type'];
    		    }   			
    		}
    		echo json_encode($data);
    	} 
    	       	
    } 
    public function deleteRec(){
    	$Type=M('Booktype');
    	$result=$Type->where('type_id='.$_GET['type_id'])->delete(); 
    	if($result){
//  		删除成功
    		header("Refresh:0;url=http://localhost/Admin/seruser/seruser");
    	}  	
    } 
    public function addRec(){
    	$Type=M('Booktype');
    	$Type->type_audi=1;
    	$result=$Type->where('type_id='.$_GET['type_id'])->save(); 
    	if($result){
//  		增加成功
    		header("Refresh:0;url=http://localhost/Admin/seruser/seruser");
    	}   	
    }             
}