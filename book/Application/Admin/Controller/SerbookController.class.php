<?php
namespace Admin\Controller;

use Think\Controller;

class SerbookController extends Controller
{
    public function serbook()
    {
    	$this->display(serbook);
    }
    public function showAll(){
    	$Book=M('Book');
    	$result=$Book->where("audi=0")->select();
    	if($result){
    		echo json_encode($result);
    	}    	
    }
}