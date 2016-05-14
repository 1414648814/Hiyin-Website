<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
$name=$_POST[name];
$email=$_POST[e-mail];
$pwd=md5($_POST[password]);
$sex=$_POST[sex];
$age=$_POST[age];
$city=$_POST[city];
$country=$_POST[country];
$code=$_POST[code];
$number=$_POST[number];
$regtime=date("Y-m-j");
$sql=mysql_query("select * from user where regname='".$name."'",$conn);
$info=mysql_fetch_array($sql);
if($info==true)
 {
   echo "<script>alert('该用户已经存在!');history.back();</script>";
   exit;
 }
 else
 {  
    mysql_query("insert into user (regname,regemail,regpwd,regcity,regcountry,regage,regsex,regcode,regnumber,regtime) values ('$name','$email','$pwd','$city','$country','$age','$sex','$code','$number','$regtime')",$conn);
	$_SESSION[username] = $name;
	$_SESSION[email]=$email;
	$_SESSION[sex]=$sex;
	$_SESSION[age]=$age;
	$_SESSION[city]=$city;
	$_SESSION[country]=$country;
	$_SESSION[code]=$code;
	$_SESSION[number]=$number;
	
    echo "<script>alert('恭喜，注册成功!');window.location='index.php';</script>";
 }
?>
