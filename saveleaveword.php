<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
$userMsg=$_POST[userMsg];
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d.h:i:sa");
$yanchanghuiid = $_GET[yanchanghuiid];
mysql_query('SET NAMES UTF8');
mysql_query("insert into leaveword(userid,yanchanghuiid,addtime,content) values 
('".$_SESSION[userid]."','$yanchanghuiid','$time','$userMsg');",$conn);
mysql_query("update yanchanghui set count_leaveword=count_leaveword+1 where id='$yanchanghuiid';",$conn);
echo "<script language='javascript'>alert('评论成功！');history.back();</script>";
?>