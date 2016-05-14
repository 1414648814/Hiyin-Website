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
				<li class="current_page_item"><a accesskey="3" title="">热门话题</a></li>
				<li><a href="fansguanli.php" accesskey="4" title="">我管理的小组</a></li>
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
			$sql=mysql_query("SELECT COUNT( * ) AS num
				FROM weigroup AS w, group_topics AS g
				WHERE w.groupid = g.groupid
				AND w.isaudit =1
				AND w.isshow =1
				AND g.isshow =1",$conn);
			$info=mysql_fetch_array($sql);
			$total=$info[num];
			$pagesize=10;
			if ($total<=$pagesize){
				$pagecount=1;
			} 
			if(($total%$pagesize)!=0)
			{
				$pagecount=intval($total/$pagesize)+1;
			}
			else
			{
				$pagecount=$total/$pagesize;	
			}
			if(($_GET[page])==""){
				$page=1;
			}
			else
			{
				$page=intval($_GET[page]);
			}
		?>
		<div id="featured">
			<?php
				mysql_query('SET NAMES UTF8');
				$sql2 = mysql_query("select w.groupname,g.* 
							from weigroup as w,group_topics as g
							where w.groupid=g.groupid and w.isaudit=1 and w.isshow=1 and g.isshow=1
							order by g.istop desc,g.count_view desc,g.count_comment desc;",$conn);
				$num=0;
			?>
			<div class="title">
				<h2>热门话题</h2>
			</div>
			<ul class="style1">
				<?php
					while($result = mysql_fetch_array($sql2)){
						$num++;
				?>
				<li>
					<p class="date">热度<b><?php echo $num;?></b></p>
					<h3>话题名称：<a href="huatiinfo.php?groupid=<?php echo $result[groupid];?>&topicid=<?php echo $result[topicid]?>"><span style="color: red;"><?php echo $result[title]?><span></a></h3>
					<p>来自<?php echo $result[groupname]?>小组</p>
					<p>话题内容：<?php echo $result[content]?></p>
					<p>话题回复：<?php echo $result[count_comment]?></p>
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
		</div>
		<div class="fenye">
				<table>
					<tr>
					<!--用于页底的反应-->
					<td>
					第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
					<?php
					//只显示4个页面，如果超出4个页面，则用后一页图标表示，可以跳转到后一页
					//page指的是当前的页面
					//pagecount指的是一共展示的页面
						if($page>=2)
						{
					?>
					
					<a href="fanshuati.php" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="fanshuati.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="fanshuati.php?page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="fanshuati.php?page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="fanshuati.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="fanshuati.php?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
					<?php 
						}
					?>
					
					</td>
					</tr>
				</table>
		</div>
	</div>
</div>
</body>
</html>
