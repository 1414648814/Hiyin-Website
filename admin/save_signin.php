<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
$username=$_POST[username];
$userpwd=md5($_POST[pwd]);
class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/data_connect.php");
     $sql=mysql_query("select * from admin where name='".$this->name."'",$conn);
     $info=mysql_fetch_array($sql);
	 //echo "<script language='javascript'>alert($username);</script>";
     if($info==false){
          echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
               exit;
			}
          
          if($info[pwd]==$this->pwd)
            {  
			   session_start();
			   $_SESSION[adminid]=$info[id];
               header("location:index.php");
               exit;
            }
          else {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             exit;
           }

      }    
   }
 }
$obj=new chkinput(trim($username),trim($userpwd));
$obj->checkinput();
?>
