<?php
include("conn/data_connect.php");
session_start();
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/pjpeg');
$max_size='500000';      // 最大文件限制（单位：byte）
$upfile='./images/sex'; //图片目录路径
$file=$_FILES['upfile'];
$sql1=mysql_query("select * from user where userid=".$_SESSION[userid].";",$conn);
$info1=mysql_fetch_array($sql1);
unlink("$info1[face]"); 
if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
    if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
		echo "<script>alert('文件不存在!');history.back();</script>";
		exit;
    }
   
	if($file['size']>$max_size){  //判断文件大小是否大于500000字节
		echo "<script>alert('上传文件太大!');history.back();</script>";
		exit;
	} 
	if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
		echo "<script>alert('上传格式不对!');history.back();</script>";
		exit;
	}
	if(!file_exists($upfile)){  // 判断存放文件目录是否存在
		mkdir($upfile,0777,true);
	} 
    $imageSize=getimagesize($file['tmp_name']);
	$img=$imageSize[0].'*'.$imageSize[1];
	$fname=$file['name'];
	$ftype=explode('.',$fname);
	$picName=$upfile."/touxiang_".$fname;
   
	if(file_exists($picName)){
		echo "<script>alert('同文件名已经存在!');history.back();</script>";
		exit;
    }
	if(!move_uploaded_file($file['tmp_name'],$picName)){  
		echo "<script>alert('移动文件出错!');history.back();</script>";
		exit;
    }
	else{
		mysql_query("update user set face='".$picName."' where userid=".$_SESSION[userid].";",$conn);
		echo "<script>alert('上传成功!');history.back();</script>";
    }
}
?>