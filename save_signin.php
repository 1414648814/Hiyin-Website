<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
$username=$_POST[name_login];
$userpwd=md5($_POST[password_login]);
class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/data_connect.php");
     $sql=mysql_query("select * from user where regname='".$this->name."'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false){
          echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
               exit;
			}
          
          if($info[regpwd]==$this->pwd)
            {  
			   session_start();
			   $_SESSION[userid]=$info[userid];
	           $_SESSION[username]=$info[regname];
			   $_SESSION[sex]=$info[regsex];
			   $_SESSION[email]=$info[regemail];
			   $_SESSION[age]=$info[regage];
			   $_SESSION[qianming]=$info[qianming];
               header("location:index.php");//注意这个前面不能有任何的输出语句
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
