<?php
include("conn/data_connect.php");
header ( "Content-type: text/html; charset=utf-8" ); //�����ļ������ʽ
session_start();
$userEmail=$_POST[userEmail];
$userPhone=$_POST[userPhone];
$userMsg=$_POST[userMsg];
$date=date("Y-m-j");
if($_SESSION["username"]!=""||$_SESSION["username"]!="root"){
	$sql=mysql_query("select * from user where regname='".$_SESSION["username"]."'",$conn);
	$info = mysql_fetch_array($sql);
	if($info==true){
		mysql_query("insert into contactus (regname,regemail,number,content,date) values ('$_SESSION[username]','$userEmail','$userPhone','$userMsg','$date')",$conn);
		echo "<script>alert('success!');history.back();</script>";
		exit;
	}
	else{
		echo "<script>alert('login!');history.back();</script>";
		header("location:login.php");//ע�����ǰ�治�����κε�������
		exit;
	}
}
else{
	echo "<script>alert('login!');history.back();</script>";
}

?>