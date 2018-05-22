<?php
namespace Home\Controller;

use Think\Controller;

class PerfectController extends Controller
{
    public function perfect(){
        if(isset($_GET['B_id'])){
    		session_start();
    		$_SESSION['book_id']=$_GET['B_id'];   		
    	}
        $this->display(perfect);
    }
    public function show(){
    	session_start();
    	if(isset($_SESSION['book_id'])){
    		$Book=M('Book');
    		$resultBook=$Book->where('book_id='.$_SESSION['book_id'])->select();
    		if($resultBook){
    			echo json_encode($resultBook);
    		}
    	}else{
    		echo 0;
    	}
    }
    public function upbook(){
    	$userScore=0;
    	if($_POST['bookName']==''&&$_POST['bookWriter']==''){
    		header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    		echo "请填写必要信息";
    	}else{
    		session_start();
    		$Book=M('Book');
    		$resultP=$Book->where("book_id=".$_SESSION['book_id'])->select();
    		if($resultP){
    			$book['pbook_id']=$_SESSION['book_id'];
    	    	$book['pbook_name']=$_POST['bookName'];
    	        $book['pbook_writer']=$_POST['bookWriter'];
    	        $book['pbook_cate']=$_POST['subject'];
    	        if($book['book_cate']=='0'){
    	        	header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    	        	echo "请选择类别";
    	        }else{
    	        	if(isset($_FILES['bookImg'])&&$_FILES['bookImg']['tmp_name']!=''){
    	        		$file=$_FILES['bookImg'];
    	        		switch($file['error']){
    	        			case 0:
    	        			$type=explode("/",$file['type'])[1];//判断图片类型
            	            $type_array=['png','jpg','jpeg'];
            	            $dir="bookImg";
//          	记录时间
            	            $s=date("s");
            	            $name=date("Y").date("m").date("d").date("H").date("i").$s.rand(1,999);
            	            if(in_array($type,$type_array)){
            	            	if(is_uploaded_file($file['tmp_name'])){
            	            		$imgResult=move_uploaded_file($file['tmp_name'],$dir."/book".$name.".".$type);
            			            if($imgResult){
            			            	$book['pbook_img']=$name.'.'.$type;
            			            }else{
            				            exit("请通过规定上传图片");
            			            }
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
            	            exit("未知错误 ");
            	            break;
    		            }
    		            var_dump($_FILES['bookImg']);
    	            }else{
    	            	var_dump($_SESSION['book_id']);
    	            	$book['pbook_img']=$resultP[0]['book_img'];
    	            	$name=date("Y").date("m").date("d").date("H").date("i").$s.rand(1,999);
    	            }
    	            $book['pbook_recom']=$_SESSION['us'];
    	            $book['pupdate_time']=date("Y-m-d").' '.date("H:i").':'.$s;
    	
    	            if($_POST['bookAbstract']!=''){
    	            	$mystr=fopen("bookAbstract/".$name.".txt","w") or die("Unable to open file!");
    		            fwrite($mystr,"  ".$_POST['bookAbstract']);
    		            fclose($mystr);
    		            $book['pabstract']=$name.'.txt';
    		           }else{
    		           	$book['pabstract']='none.txt';
    	            }
    	            if($_POST['bookUrl']!=''){
    	            	$mystr2=fopen("bookUrl/".$name,"w") or die("Unable to open file!");
    		            fwrite($mystr2,$_POST['bookUrl']);
    		            fclose($mystr2);
    		            $book['pbook_url']=$name;
    		
    		            $book['paudi']=0;
    		            $book['pbook_score']=$resultP[0]['book_score'];
    		            $Perfect=M('Perfect');
    	                $result=$Perfect->add($book);
    	                if($result){
    	                	$userScore+=10;
    	                	$Rec=M('Recommend');
    	                	$rec['book_name']=$_POST['bookName'];
    	                	$rec['user_name']=$_SESSION['us'];
    	                	$rec['rec_score']=$userScore;
    	                	$rec['rec_id']=0;
    	                	$resultRec=$Rec->add($rec);
    	                	header("Refresh:3;url=http://localhost/Home/index/index");
    		                echo("提交成功,感谢您的支持......");
    	                }else{
    	    	            header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    		                echo("提交失败，请重新尝试");
    	                } 		
    	            }else{
    	            	header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    		            echo("无效路径，请重新尝试");
    		        }
    		    }		
    	    }
    	}	  	
    }
}
?>