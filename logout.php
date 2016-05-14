<?php
session_start();
session_destroy();
/*header() 函数向客户端发送原始的 HTTP 报头。*/
header("location:index.php");
?>