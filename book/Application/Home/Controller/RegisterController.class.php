<?php
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    public function register()
    {
    	$this->display(register);
    }
    public function res(){
    	$userName=$_POST['username'];
    	$state=0;
    	if($isset($userName)){
            //检查是否存在	
            $state=1;
    	}else{
    		$User = M("User"); // 实例化User对象
    		$result=$User->where("username ='".$userName."'")->select();
    		if($result){
    			$state=2;
    		}
    	}
    	echo $state;
    }
}