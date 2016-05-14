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
		mysql_query("insert into yanchanghui(cityid,huiming,singername,startdate,startweek,starttime,addtime,address,introduction,sale,tuijian,type) 
		values ('$info1[cityid]','$yanchanghuiname','$singername','$startdate','$week_select','$starttime','$addtime','$address','$introduction','$sale','$tuijian','$yanchanghuitype');",$conn);
		$sql3 = mysql_query("select * from yanchanghui where huiming='$yanchanghuiname' and singername='$singername' and startdate='$startdate' and sale='on';",$conn);
		$info3 = mysql_fetch_array($sql3);
		if($info3==true){
			mysql_query("insert into cityyanchanghui values ('$info1[cityid]','$info3[id]');",$conn);
			mysql_query("update city set number=number+1 where cityid = '$info1[cityid]';",$conn);
			mysql_query("update singer set num=num+1 where id='$info2[id]';",$conn);
			mysql_query("insert singeryanchanghui values('$info2[id]','$info3[id]');",$conn);
			echo "<script language='javascript'>alert('成功添加$yanchanghuiname');history.back();</script>";
		}
	}
}
?>
