<?php
namespace Home\Controller;

use Think\Controller;

class TypesupplyController extends Controller
{
    public function typesupply()
    {
        $this->display(typesupply);
    }
    public function ts()
    {
    	if(isset($_POST['typeName'])&&$_POST['typeName']!=''){
    		$Booktype = M("Booktype"); // 实例化User对象
    		$data['type']=$_POST['typeName'];
    		$data['type_audi']=1;
    		$result=$Booktype->add($data);	
    		if($result){
    			var_dump("您的要求会尽快获得处理，期待我们共同成长");
    			header("Refresh:3;url=http://localhost/Home/index/index");
    		}else{
    			var_dump("您的要求提交失败，请在此尝试！");
    			header("Refresh:3;url=http://localhost/Home/typesupply/typesupply");    			
    		}
    	}else{
    		var_dump("没有接收到您的要求，返回中......");
    		header("Refresh:3;url=http://localhost/Home/typesupply/typesupply");
    	}
    }    
}
?>