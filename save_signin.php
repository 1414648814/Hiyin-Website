<?php
header ( "Content-type: text/html; charset=utf-8" ); //�����ļ������ʽ
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
          echo "<script language='javascript'>alert('�����ڴ��û���');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('���û��Ѿ������ᣡ');history.back();</script>";
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
               header("location:index.php");//ע�����ǰ�治�����κε�������
               exit;
            }
          else {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";
             exit;
           }

      }    
   }
 }
$obj=new chkinput(trim($username),trim($userpwd));
$obj->checkinput();
?>
