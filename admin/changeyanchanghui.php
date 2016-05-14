<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/data_connect.php");
$cityname = $_POST[cityname]; 
$yanchanghuiname = $_POST[yanchanghuiname];
$singername = $_POST[singername];
$startdate = $_POST[startdate];
$week_select = $_POST[week_select];
$starttime = $_POST[starttime];
$addtime=date("Y-m-j");
$address = $_POST[address];
$sale = $_POST[sale];
$tuijian = $_POST[tuijian];
$yanchanghuitype = $_POST[yanchanghuitype];
$introduction = $_POST[MyTextarea];
if($sale=="正在销售"){
	$sale = "on";
}
else{
	$sale = "off";
}
if($tuijian=="推荐"){
	$tuijian = "1"; 
}
else{
	$tuijian = "0";
}
if($yanchanghuitype=="流行"){
	$yanchanghuitype = "liuxing";
}
else if($yanchanghuitype=="摇滚"){
	$yanchanghuitype = "yaogun";
}
else if($yanchanghuitype=="音乐节"){
	$yanchanghuitype = "yinyuejie";
}
else if($yanchanghuitype=="民族"){
	$yanchanghuitype = "minzu";
}
else{
	$yanchanghuitype = "qita";
}
echo "<script language='javascript'>alert('$cityname');</script>";
/*echo "<script language='javascript'>alert('成功添加$yanchanghuiname');</script>";
echo "<script language='javascript'>alert('成功添加$singername');</script>";
echo "<script language='javascript'>alert('成功添加$startdate');</script>";
echo "<script language='javascript'>alert('成功添加$week_select');</script>";
echo "<script language='javascript'>alert('成功添加$starttime');</script>";
echo "<script language='javascript'>alert('成功添加$addtime');</script>";
echo "<script language='javascript'>alert('成功添加$address');</script>";
echo "<script language='javascript'>alert('成功添加$sale');</script>";
echo "<script language='javascript'>alert('成功添加$tuijian');</script>";
echo "<script language='javascript'>alert('成功添加$yanchanghuitype');</script>";
echo "<script language='javascript'>alert('成功添加$introduction');history.back();</script>"; */
mysql_query('SET NAMES UTF8');
//算出城市id
$sql1 = mysql_query("select * from city where cityname='$cityname';",$conn);
$info1 = mysql_fetch_array($sql1);
//算出歌手id
$sql2 = mysql_query("select * from singer where singername='$singername';",$conn);
$info2 = mysql_fetch_array($sql2);
if($info1==false){
	echo "<script language='javascript'>alert('没有城市$cityname');history.back();</script>";
}
else{
	if($info2==false){
		echo "<script language='javascript'>alert('没有歌手$singername');history.back();</script>";
	}
	else{
		mysql_query("update yanchanghui set cityid = '$info1[cityid]',huiming = '$yanchanghuiname',singername='$singername',startdate='$startdate',
		startweek='$week_select',starttime='$starttime',addtime='addtime',address='$address',introduction='$introduction',sale='$sale',tuijian='$tuijian',
		type='$yanchanghuitype';",$conn);
		$sql3 = mysql_query("select * from yanchanghui where huiming='$yanchanghuiname' and singername='$singername' and startdate='$startdate' and sale='on';",$conn);
		$info3 = mysql_fetch_array($sql3);
		if($info3==true){
			mysql_query("update cityyanchanghui set cityid='$info1[cityid]',yanchanghuiid='$info3[id]';",$conn);
			mysql_query("update singeryanchanghui set singerid = '$info2[id]',yanchanghuiid = '$info3[id]');",$conn);
			echo "<script language='javascript'>alert('成功添加$yanchanghuiname');history.back();</script>";
		}
	}
}
?>
