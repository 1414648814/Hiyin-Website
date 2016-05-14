<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d.h:i:sa");
$groupid = $_GET[groupid];
mysql_query('SET NAMES UTF8');
$sql1 = mysql_query("select * from user where userid=".$_SESSION[userid].";",$conn);
$info1 = mysql_fetch_array($sql1);
if($info1==false){
	echo "<script language='javascript'>alert('请先登录！');history.back();</script>";
}
else{
	$sql2 = mysql_query("select * from weigroup where groupid=".$groupid." and isaudit =1 and isshow=1;",$conn);
	$info2 = mysql_fetch_array($sql2);
	if($info2==true){
		$sql3 = mysql_query("select * from group_users where groupid=".$groupid." and userid=".$_SESSION[userid]." and isadmin =1;",$conn);
		$info3 = mysql_fetch_array($sql3);
		if($info3==true){
			echo "<script language='javascript'>alert('您已经是管理员了，无需加入小组');history.back();</script>";
		}
		else{
			$sql4 = mysql_query("select * from group_users where groupid=".$groupid." and userid =".$_SESSION[userid]." and isadmin =0;",$conn);
			$info4 = mysql_fetch_array($sql4);
			if($info4==true){
				echo "<script language='javascript'>alert('您已经是小组成员了，无需再加入小组');history.back();</script>";
			}
			else{
				mysql_query("insert into group_users(userid,groupid,isadmin,addtime) values 
				(".$_SESSION[userid].",$groupid,0,'$time');",$conn);
				mysql_query("update weigroup set count_user=count_user+1,uptime='".$time."' where groupid=".$groupid.";",$conn);
				echo "<script language='javascript'>alert('成功加入小组，以后可以时刻关注小组信息了！');history.back();</script>";
				return;
			}
		}
	}
	else{
		echo "<script language='javascript'>alert('该小组可能因为某些原因无法显示');history.back();</script>";
	}
}
?>