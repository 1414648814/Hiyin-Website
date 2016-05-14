<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
	include("top.php");
	include("conn/data_connect.php");
?>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="selectarea">
				<div class="type">
					<h3>类型</h3>
					<a href="fenleiinfo.php?type=liuxing"><span>流行</span></a>
					<a href="fenleiinfo.php?type=yaogun"><span>摇滚</span></a>
					<a href="fenleiinfo.php?type=minzu"><span>民族</span></a>
					<a href="fenleiinfo.php?type=yinyuejie"><span>音乐节</span></a>
					<a href="fenleiinfo.php?type=qita"><span>其他</span></a>
				</div>
            </div>
			<div class="featured-top">
				
				<!--//大陆明星图片列表-->
				<div class="dalu">
					<h3>流行</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql1=mysql_query("SELECT s.id AS singerid,s.singername, y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type =  'liuxing'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area desc
						LIMIT 0 , 3",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info1=mysql_fetch_array($sql1))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info1[singerid];?>&yanchanghuiid=<?php echo $info1[id];?>"><img src="<?php echo $info1[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info1[singername];?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会时间:<?php echo $info1[startdate].$info1[startweek].$info1[starttime];?></span>
						</div>
					</div>
					<?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="fenleiinfo.php?type=liuxing"><h3>more</h3></a>
					</div>
				</div>
				<div class="line1">
					<table>
						<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<div class="dalu">
					<h3>摇滚</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql2=mysql_query("SELECT s.id AS singerid,s.singername, y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type =  'yaogun'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area
						LIMIT 0 , 3",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info2=mysql_fetch_array($sql2))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info2[singerid];?>&yanchanghuiid=<?php echo $info2[id];?>"><img src="<?php echo $info2[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info2[singername];?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会时间:<?php echo $info2[startdate].$info2[startweek].$info2[starttime];?></span>
						</div>
					</div>
					<?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="fenleiinfo.php?type=yaogun"><h3>more</h3></a>
					</div>
				</div>
				<div class="line1">
					<table>
						<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<div class="dalu">
					<h3>民族</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql3=mysql_query("SELECT s.id AS singerid, s.singername,y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type =  'minzu'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area
						LIMIT 0 , 3",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info3=mysql_fetch_array($sql3))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info3[singerid];?>&yanchanghuiid=<?php echo $info3[id];?>"><img src="<?php echo $info3[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info3[singername];?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会时间:<?php echo $info3[startdate].$info3[startweek].$info3[starttime];?></span>
						</div>
					</div>
					<?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="fenleiinfo.php?type=minzu"><h3>more</h3></a>
					</div>
				</div>
				<div class="line1">
					<table>
						<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<div class="dalu">
					<h3>音乐节</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql4=mysql_query("SELECT s.id AS singerid, s.singername,y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type =  'minzu'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area
						LIMIT 0 , 3",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info4=mysql_fetch_array($sql4))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info4[singerid];?>&yanchanghuiid=<?php echo $info4[id];?>"><img src="<?php echo $info4[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info4[singername];?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会时间:<?php echo $info4[startdate].$info4[startweek].$info4[starttime];?></span>
						</div>
					</div>
					<?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="fenleiinfo.php?type=yinyuejie"><h3>more</h3></a>
					</div>
				</div>
				<div class="line1">
					<table>
						<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<div class="dalu">
					<h3>其他</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql5=mysql_query("SELECT s.id AS singerid,s.singername, y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type =  'qita'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area
						LIMIT 0 , 3",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info5=mysql_fetch_array($sql5))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info5[singerid];?>&yanchanghuiid=<?php echo $info5[id];?>"><img src="<?php echo $info5[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info5[singername];?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会时间:<?php echo $info5[startdate].$info5[startweek].$info5[starttime];?></span>
						</div>
					</div>
					<?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="fenleiinfo.php?type=qita"><h3>more</h3></a>
					</div>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
   <div class="clear"></div>	
	</div>
  </div>
<?php
	include("bottom.php");
?>