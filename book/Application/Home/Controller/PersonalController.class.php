<?php
namespace Home\Controller;

use Think\Controller;

class PersonalController extends Controller
{
    public function show(){        
        $this->display(personal);
    }
    public function personal(){
    	session_start();
    	if(isset($_SESSION['us'])){
    		$User=M('User');
    		$resultUser=$User->where("user_name='".$_SESSION['us']."'")->select();
    		
    		$data['user_name']=$resultUser[0]['user_name'];
    		$data['user_score']=$resultUser[0]['user_score'];
    		$data['user_img']=$resultUser[0]['user_img'];
    		$Likebook=M('Likebook');
    		$resultLike=$Likebook->where('user_id='.$resultUser[0]['user_id'])->field('book_id')->select();
    		if($resultLike){
    			$Book=M('book');
    			for($i=0;$i<count($resultLike);$i++){
    				$resultBook=$Book->where('book_id='.$resultLike[$i]['book_id'])->field('book_id,book_name')->select();
    				$data['like_book'][$i]['book_id']=$resultBook[0]['book_id'];
    				$data['like_book'][$i]['book_name']=$resultBook[0]['book_name'];
    			}
    			echo json_encode($data);
    		}else{
    			$data['like_book']='';
    			echo json_encode($data);
    		}
    		
    	}else{
    		echo 0;
    	}
    }
}
?>