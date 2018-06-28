<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index(){
//  	评分最高
    	$Book = M('Book');
        $hot_list = $Book->where('audi=1')->order('book_score desc')->select();
        $this->assign('hotlist',$hot_list); 
              
        $this->display(index);
    }
//  检测用户状态
    public function show(){
    	session_start();
    	if(isset($_SESSION['us'])){
    		if(isset($_SESSION['img'])&&$_SESSION['img']!=''){
    			$data['username']=$_SESSION['us'];
    			$data['img']=$_SESSION['img'];
    			echo json_encode($data);
    		}else{
    			$data['username']=$_SESSION['us'];
    			$data['img']="user.jpg";
    			echo json_encode($data);
           }
        }else{
       	    $data['username']="登陆";
    	    $data['img']="user.jpg";
    	    echo json_encode($data);
        }
    }
//  最新书籍行数
    public function newBookNum(){
    	$Book = M('Book');
        $new_list = $Book->where('audi=1')->order('update_time desc')->select();
        echo count($new_list);
    }
//  最新书籍初始页面
    public function newPrev(){
    	$Book = M('Book');
        $new_list = $Book->where('audi=1')->order('update_time desc')->select();
        $str='';

        for($i=0;$i<$_POST['rows'];$i++){
        	$str.=$new_list[$i]['book_id']."@".$new_list[$i]['book_name']."@".$new_list[$i]['book_writer']."@".$new_list[$i]['book_img']
        	."@".$new_list[$i]['abstract']."&";
        }
        echo $str;
    }    
//  最新书籍
    public function newBook(){
    	$begin=($_POST['page']-1)*$_POST['rows'];
    	$end=$_POST['rows']*$_POST['page'];

    	$Book = M('Book');
        $new_list = $Book->where('audi=1')->order('update_time desc')->select();
        $str='';

        if($end<count($new_list)){
            for($i=$begin;$i<$end;$i++){
        	$str.=$new_list[$i]['book_id']."@".$new_list[$i]['book_name']."@".$new_list[$i]['book_writer']."@".$new_list[$i]['book_img']
        	."@".$new_list[$i]['abstract']."&";
            }    	
        }else{
            for($i=$begin;$i<count($new_list);$i++){
        	$str.=$new_list[$i]['book_id']."@".$new_list[$i]['book_name']."@".$new_list[$i]['book_writer']."@".$new_list[$i]['book_img']
        	."@".$new_list[$i]['abstract']."&";
            }   	
        }
        echo $str;
    }
//  随机推荐用户
    public function reUser(){
//  	获取推荐用户id
    	$UserNum=2;//推荐用户数量
    	$Likebook=M('Likebook');
    	$sql="select distinct user_id from likebook order by rand() limit ".$UserNum;
        $resultUser=$Likebook->query($sql);
//  	获取用户名称
        $User=M('User');
        
        for($i=0;$i<$UserNum;$i++){
        	$result=$User->where('user_id='.$resultUser[$i]['user_id'])->field('user_id,user_name')->select();
        	$data[$i]['user_id']=$result[0]['user_id'];
        	$data[$i]['user_name']=$result[0]['user_name'];
        }
        echo json_encode($data);	
    }
//  获取热门标签
    public function hotHover(){
    	$HotNum=8;//标签数量
    	$Type=M('Booktype');
    	$result=$Type->where('type_audi=1')->field('type')->limit($HotNum)->select();
    	echo json_encode($result);
    }
}
?>