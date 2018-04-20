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
//  	if($isset($_POST['username'])){
//          //检查是否存在
//          $User = M("User"); // 实例化User对象
//  		$result=$User->where("username ='".$userName."'")->select();
//  		if($result){
//  			$state=1;
//  		}else{
//  			$state=2;
//  		}
//  	}else{
//  		$state=3;
//  	}

        $User=M('User');
        $result=$User->where("username='".$userName."'")->select();
        if($result){
        	$state=1;
        }else{
        	$state=2;
        }
    	echo $state;
    }
}