<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
$userMsg=$_POST[userMsg];
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d.h:i:sa");
$groupid = $_GET[groupid];
$topicid = $_GET[topicid];
mysql_query('SET NAMES UTF8');
mysql_query("insert into group_topics_comments(topicid,userid,content,addtime) values 
($topicid,'".$_SESSION[userid]."','$userMsg','$time');",$conn);
mysql_query("update group_topics set count_comment=count_comment+1,count_view=count_comment+1,uptime='".$time."' where topicid=$topicid and groupid=$groupid;",$conn);
echo "<script language='javascript'>alert('评论成功！');history.back();</script>";
?>