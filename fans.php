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
			<a href="setyonghu.php"><img src="./images/fans/pic02.jpg" alt="" /></a>
			<h1><a href="fans.php">粉丝社区</a></h1>
		</div>
		
		<div id="menu">
			<ul>
				<li class="current_page_item"><a accesskey="1" title="">粉丝首页</a></li>
				<li><a href="fansxiaozu.php" accesskey="2" title="">热门小组</a></li>
				<li><a href="fanshuati.php" accesskey="3" title="">热门话题</a></li>
				<li><a href="fansguanli.php" accesskey="4" title="">我管理的小组</a></li>
				<li><a href="fanscanyu.php" accesskey="5" title="">我参加的小组</a></li>
			</ul>
		</div>
		
		<div id="backtohome">
			<a href="index.php"><center><h3><<<返回首页<<<</h3></center></a>
		</div>
	</div>
	<div id="main">
 		<!--<div id="banner">
			<img src="./images/fans/pic01.jpg" alt="" class="image-full" />
		</div> 
		-->
		<div id="featured">
			<?php
				mysql_query('SET NAMES UTF8');
				mysql_query('SET NAMES UTF8');
				$sql = mysql_query("select * from weigroup 
						where isaudit=1 and isshow=1 
						order by isrecommend desc,count_user desc,count_topic desc limit 0,16",$conn);	
			?>
			<div class="title">
				<h2>热门小组</h2>
			</div>
			<?php
				while($info = mysql_fetch_array($sql)){
			?>
			<div class="xiaozu">
				<a href="xiaozuinfo.php?groupid=<?php echo $info[groupid]?>"><img src="<?php if($info[groupicon]==""){echo "./images/fans/nothing.jpg";}else{echo $info[groupicon];}?>"></img></a>
				<span class="byline"><?php echo $info[groupname]?></span>
			</div>
			<?php
				}
			?>
			<div class="more">
				<h3><a href="fansxiaozu.php">More</a></h3>
			</div>
		</div>
		<div id="featured">
			<?php
				$sql2 = mysql_query("select w.groupid,w.groupname,g.* from weigroup as w,group_topics as g
							where w.groupid=g.groupid and w.isaudit=1 and w.isshow=1 and g.isshow=1
							order by g.istop desc,g.count_view desc,g.count_comment desc limit 0,10",$conn);
				$num=0;
			?>
			<div class="title">
				<h2>热门话题</h2>
			</div>
			<ul class="style1">
				<?php
					while($info2 = mysql_fetch_array($sql2)){
						$num++;
				?>
				<li>
					<p class="date">热度<b><?php echo $num;?></b></p>
					<h3>话题名称：&nbsp;&nbsp;<a href="huatiinfo.php?groupid=<?php echo $info2[groupid];?>&topicid=<?php echo $info2[topicid]?>"><span style="color:red"><?php echo $info2[title]?></span></a></h3>
					<p>来自&nbsp;&nbsp;&nbsp;<?php echo $info2[groupname]?>小组</p>
					<p>话题内容：&nbsp;&nbsp;<?php echo $info2[content]?></p>
					<p>话题回复：&nbsp;&nbsp;<?php echo $info2[count_comment]?></p>
				</li>
				<div class="line1">
					<table>
						<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<?php
					}
				?>
			</ul>
			<div class="more">
				<h3><a href="fanshuati.php">More</a></h3>
			</div>
		</div>
	</div>
</div>
</body>
</html>
