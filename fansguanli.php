<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="./css/fans_default.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/fans_fonts.css" rel="stylesheet" type="text/css" media="all" />
<?php
	include("conn/data_connect.php");
?>
</head>
<body>
<div id="page" class="container">
	<div id="header">
		<div id="logo">
			<img src="./images/fans/pic02.jpg" alt="" />
			<h1><a href="fans.php">粉丝社区</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="fans.php" accesskey="1" title="">粉丝首页</a></li>
				<li><a href="fansxiaozu.php" accesskey="2" title="">热门小组</a></li>
				<li><a href="fanshuati.php" accesskey="3" title="">热门话题</a></li>
				<li class="current_page_item"><a accesskey="4" title="">我管理的小组</a></li>
				<li><a href="fanscanyu.php" accesskey="5" title="">我参加的小组</a></li>
			</ul>
		</div>
	</div>
	<div id="main">
 		<!--<div id="banner">
			<img src="./images/fans/pic01.jpg" alt="" class="image-full" />
		</div> 
		-->
		<?php
			mysql_query('SET NAMES UTF8');
			$sql1=mysql_query("select * from user where regname='".$_SESSION[username]."'",$conn);
			$info=mysql_fetch_array($sql1);
			if($info==true&&$_SESSION[username]!="root"){
		?>
		<div id="featured">
			<?php
				
				$sql2 = mysql_query("select * from weigroup 
						where isaudit=1 and isshow=1 and userid=".$info[userid]."
						order by isrecommend desc,count_user desc,count_topic desc ",$conn);	
			?>
			<div class="title">
				<h3>我管理的小组</h3>
			</div>
			<?php
				while($info2 = mysql_fetch_array($sql2)){
			?>
			<div class="xiaozu">
				<a href="xiaozuinfo.php?groupid=<?php echo $info2[groupid];?>"><img src="<?php if($info2[groupicon]==""){echo "./images/fans/nothing.jpg";}else{echo $info2[groupicon];}?>"></img></a>
				<span class="byline"><?php echo $info2[groupname]?></span>
			</div>
			<?php
				}
			?>
		</div>
		<?php
			}
			else
			{
		?>
		<div id="featured">
			<h3>请先<a href="login.php"><span style="color: red;">登录</span></a>，然后才能看到自己的小组！</h3>
		</div>
		<?php
			}
		?>
	</div>
</div>
</body>
</html>
