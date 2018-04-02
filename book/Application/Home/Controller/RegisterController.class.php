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
echo $userName;
echo $userPs;
    }
}