<?php
include("conn/data_connect.php");
$sex=$_POST[userSex];
$age=$_POST[userAge];
$qianming=$_POST[userQianming];
mysql_query("update user set regsex='$sex',regage=$age,qianming='$qianming'",$conn);
header("location:setyonghu.php");
?>