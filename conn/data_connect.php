<?php
     $conn=mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or die("���ݿ���������Ӵ���".mysql_error());
     mysql_select_db("app_hiyin",$conn) or die("���ݿ���ʴ���".mysql_error());
 	 mysql_query("set character set utf-8");
     mysql_query("set names utf-8");
?>