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
    public function newBook(){
    	$Book = M('Book');
        $new_list = $Book->where('audi=1')->order('update_time desc')->select();
//      echo json_encode($new_list);
        $str='';
        for($i=0;$i<count($new_list);$i++){
        	$str.=$new_list[$i]['book_id']."@".$new_list[$i]['book_name']."@".$new_list[$i]['book_writer']."@".$new_list[$i]['book_img']
        	."@".$new_list[$i]['abstract']."&";
        }
        echo $str;
    }
}
?>