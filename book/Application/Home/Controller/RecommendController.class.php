<?php
namespace Home\Controller;

use Think\Controller;

class RecommendController extends Controller
{
    public function recommend()
    {	
        $this->display(recommend);
    }
    public function rem(){
    	session_start();
    	if(isset($_SESSION['us'])){
    $userScore=0;
    	if($_POST['bookName']==''||$_POST['bookWriter']==''){
    		header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    		echo "请填写必要信息";
    	}else{
    		$Book=M('Book');
    		$resultP=$Book->where("book_name='".$_POST['bookName']."' And book_writer='".$_POST['bookWriter']."' And audi=1")->field('book_id')->select();
    		if($resultP){
    			header("Refresh:3;url=http://localhost/Home/perfect/perfect?B_id=".$resultP[0]['book_id']);
    			echo("您提交的书籍已存在，进入修改界面......");    			
    		}else{
    	    	$book['book_name']=$_POST['bookName'];
    	        $book['book_writer']=$_POST['bookWriter'];
    	        $book['book_cate']=$_POST['subject'];
    	        if($book['book_cate']=='0'){
    	        	header("Refresh:3;url=http://localhost/Home/recommend/recommend");
    	        	echo "请选择类别";
    	        }else{
    	        	$name=date("Y").date("m").date("d").date("H").date("i").$s.rand(1,999);
    	        	if(isset($_FILES['bookImg'])&&$_FILES['bookImg']['tmp_name']!=''){
    	        		$userScore+=2;//有图片2分
    	        		$file=$_FILES['bookImg'];
    	        		switch($file['error']){
    	        			case 0:
    	        			$type=explode("/",$file['type'])[1];//判断图片类型
            	            $type_array=['png','jpg','jpeg'];
            	            $dir="bookImg";
//          	记录时间
            	            $s=date("s");
            	          
            	            if(in_array($type,$type_array)){
            	            	if(is_uploaded_file($file['tmp_name'])){
            	            		$imgResult=move_uploaded_file($file['tmp_name'],$dir."/book".$name.".".$type);
            			            if($imgResult){
            			            	$book['book_img']=$name.'.'.$type;
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
    	            }else{
    	            	$book['book_img']='none.png';
    	            }
                    session_start();
    	            $book['book_recom']=$_SESSION['us'];
    	            $book['update_time']=date("Y-m-d").' '.date("H:i").':'.$s;
    	
    	            if($_POST['bookAbstract']!=''){
    	            	$userScore+=3;//有介绍3分
    	            	
    	            	$mystr=fopen("bookAbstract/".$name.".txt","w") or die("Unable to open file!");
    		            fwrite($mystr,"  ".$_POST['bookAbstract']);
    		            fclose($mystr);
    		            $book['abstract']=$name.'.txt';
    		           }else{
    		           	$book['abstract']='none.txt';
    	            }
    	            if($_POST['bookUrl']!=''){
    	            	$userScore+=10;//路径正确10分
    	            	$mystr2=fopen("bookUrl/".$name,"w") or die("Unable to open file!");
    		            fwrite($mystr2,$_POST['bookUrl']);
    		            fclose($mystr2);
    		            $book['book_url']=$name;
    		
    		            $book['audi']=0;
    	                $result=$Book->add($book);
    	                if($result){
    	                	$Rec=M('Recommend');
    	                	$rec['book_name']=$_POST['bookName'];
    	                	$rec['user_name']=$_SESSION['us'];
    	                	$rec['book_writer']=$_POST['bookWriter'];
    	                	$rec['rec_score']=$userScore;
    	                	$rec['rec_id']=0;
    	                	$rec['book_id']=$result;
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
    	}else{
    		header("Refresh:3;url=http://localhost/Home/login/login");
    		echo("未登陆，请登陆");
    	}
    	
    }
   
   public function type(){
   	    $bookType = M("Booktype"); // 实例化User对象
   	    $type=$bookType->where("type_audi=1")->select();
   	    echo json_encode($type);
   }
}
?>