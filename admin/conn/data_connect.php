<?php
     $conn=mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or die("数据库服务器连接错误".mysql_error());
     mysql_select_db("app_hiyin",$conn) or die("数据库连接错误".mysql_error());
 	 mysql_query("set character set utf-8");
     mysql_query("set names utf-8");
?>