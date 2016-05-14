<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d.h:i:sa");
$groupid = $_GET[groupid];
$topicid = $_GET[topicid];
$title = $_POST[huatiname];
$content = $_POST[huatineirong];
mysql_query('SET NAMES UTF8');
$sql1 = mysql_query("select * from user where userid=".$_SESSION[userid].";",$conn);
$info1 = mysql_fetch_array($sql1);
if($info1==false){
	echo "<script language='javascript'>alert('请先登录！');history.back();</script>";
}
else{
	if($topicid=="newtopic"){
		$sql2 = mysql_query("select * from weigroup where groupid=$groupid and isaudit =1 and isshow=1;",$conn);
		$info2 = mysql_fetch_array($sql2);
		if($info2==true){
			$sql3 =  mysql_query("select * from weigroup where groupid=".$groupid." and ispost=0",$conn);
			$info3 = mysql_fetch_array($sql3);
			if($info3==true){
				echo "<script language='javascript'>alert('小组已经禁止发布话题!');history.back();</script>";
			}
			else{
				mysql_query("insert into group_topics(groupid,groupname,userid,title,content,count_comment,count_view,count_attach,istop,isshow,addtime,uptime) values 
					($groupid,'".$info3[groupname]."',".$_SESSION[userid].",'".$title."','".$content."',0,1,0,0,1,'".$time."','".$time."');",$conn);
				mysql_query("update weigroup set count_topic=count_topic+1,uptime='".$time."' where groupid=".$groupid.";",$conn);
				header("location:xiaozuinfo.php?groupid=$groupid");
			}
		}
		else{
			echo "<script language='javascript'>alert('该小组可能因为某些原因无法显示');history.back();</script>";
		}
	}
}
?>