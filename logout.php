<?php
session_start();
session_destroy();
/*header() ������ͻ��˷���ԭʼ�� HTTP ��ͷ��*/
header("location:index.php");
?>