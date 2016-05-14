<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/data_connect.php");
$singerid = $_GET[singerid];
$singername = strtoupper($_POST[singername]); 
$singersex = $_POST[singersex];
$singerarea = $_POST[singerarea];
$singerzuhe = $_POST[singerzuhe];
$singernum = $_POST[singernum];
if($singersex=="男"){
	$singersex = "men";
}
else if($singersex=="女"){
	$singersex = "women";
}
else{
	$singersex = "menandwomen";
}
if($singerarea=="中国大陆"){
	$singerarea = "dalu"; 
}
else if($singerarea=="香港台湾"){
	$singerarea = "gangtai";
}
else if($singerarea=="韩国日本"){
	$singerarea = "rihan";
}
else{
	$singerarea = "oumei";
}
if($singerzuhe=="组合"){
	$singerzuhe = "zuhe";
}
else{
	$singerzuhe = "single";
}
mysql_query('SET NAMES UTF8');
mysql_query("update singer  set singername='$singername',sex='$singersex',area='$singerarea',zuhe='$singerzuhe',num='$singernum'  where id = '$singerid';",$conn);
echo "<script language='javascript'>alert('成功更改$singername');history.back();</script>";
?>
