<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/data_connect.php");
$city_name = $_POST[homecity_name]; 
$localarea = $_POST[input_select];
$num = $_POST[input_from];
mysql_query('SET NAMES UTF8');
mysql_query("insert into city(cityname,localarea,number) values ('$city_name','$localarea',$num);",$conn);
echo "<script language='javascript'>alert('成功添加$city_name');history.back();</script>";
?>
