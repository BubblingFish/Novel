<?php
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    public function register()
    {
        $this->display(register);
    }
    public function p(){
    	$userName=$_POST['userName'];
        $userPs=$_POST['userPs'];
        $User=M('user');
        $user=$User->create();
        $user['user_name']=$userName;
        $user['user_ps']=$userPs;
        $User->add($user);
//      $result=$User->find(1);
//      var_dump($result);
    }
}