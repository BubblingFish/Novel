<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
    	$this->display(login);
    }
    public function userLogin(){
    	if(isset($_POST['userName'])&&isset($_POST['userPs'])&&$_POST['userName']!=''&&$_POST['userPs']!=''){
    		$User = M("User"); // 实例化User对象
            $data['user_name'] = $_POST['userName'];
            $data['user_ps'] = $_POST['userPs'];
            $result=$User->where($data)->select();
    	}else{
    		$result=0;
    	}
    	if($result){
    		session_start();
    		$_SESSION['us']=$result[0]['user_name'];
    		$_SESSION['img']=$result[0]['user_img'];
    		var_dump($_SESSION['img']);
    		header("Refresh:3;url=http://localhost/Home/index/index");
    		echo("登陆成功,即将跳转......");
    	}else{
    		header("Refresh:3;url=http://localhost/Home/login/login");
    		echo("登陆失败，请重新登陆");
    	}
    }
    public function destroyUser(){
    	session_start();
        unset($_SESSION['us']);
        header("location:http://localhost/Home/index/index");
    }
}
?>