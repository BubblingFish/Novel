<?php
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
	//加载视图
    public function register()
    {
    	$this->display(register);
    }
    //动态刷新验证
    public function res(){
    	$P['user_name']=$_POST['username'];
    	$state=0;
    	if(isset($P['user_name'])&&$P['user_name']!=''){
    		$User=M('User');
    		$result=$User->where($P)->select();
    		if($result){
    			$state=1;
        	}else{
        	    $state=2;
        	    }
    	}
    	echo $state;
    }
    //注册
    public function userResgister(){
    	if(isset($_POST['userName'])&&isset($_POST['userPs'])&&$_POST['userName']!=''&&$_POST['userPs']!=''){
    		$User = M("User"); // 实例化User对象
            $data['user_name'] = $_POST['userName'];
            $data['user_ps'] = $_POST['userPs'];
            if(isset($_FILES['userImg'])){
            	$file=$_FILES['userImg'];
            	switch($file['error']){
            		case 0:
            		$type=explode("/",$file['type'])[1];//判断图片类型
            		$type_array=['png','jpg','jpeg'];
            		$dir="userImg";
            		$name=date("Y").date("m").date("d").date("H").date("i").date("s").rand(1,999);
            		if(in_array($type,$type_array)){
            			if(is_uploaded_file($file['tmp_name'])){
            				$imgResult=move_uploaded_file($file['tmp_name'],$dir."/".$name.".".$type);
            				echo $imgResult;
            				if($imgResult){
            					$data['user_img']=$name.'.'.$type;
            				}
            			}else{
            				exit("请通过规定上传图片");
            			}
            		}else{
            			exit("请上传规定格式的图片");
            		}
            		break;
            		case 1:
            		exit("图片过大");
            		break;
            		case 2:
            		exit("图片过大");
            		break;
            		case 3:
            		exit("图片部分上传，请重试！");
            		break;
            		default:
            		break;
            	}
            }
            $result=$User->add($data);
    	}else{
    		$result=0;
    	}
    	if($result){
    		header("Refresh:3;url=http://localhost/Home/login/login");
    		echo("注册成功,即将跳转......");
    	}else{
    		header("Refresh:3;url=http://localhost/Home/register/resgister");
    		echo("注册失败，请重新注册");
    	}
    }
}
?>