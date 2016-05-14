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
			<div class="chengshiarea">
				<div class="type">
					<div class="huabei_dongbei">
						<h3>华北东北</h3>
						<div id="chengshi">
							<a href="chengshiinfo.php?chengshi_id=1">北京</a>┊<a href="chengshiinfo.php?chengshi_id=23">天津</a>
							┊<a href="chengshiinfo.php?chengshi_id=24">郑州</a>┊<a href="chengshiinfo.php?chengshi_id=15">沈阳</a>
							┊<a href="chengshiinfo.php?chengshi_id=25">哈尔滨</a>┊<a href="chengshiinfo.php?chengshi_id=16">大连</a>
							┊<a href="chengshiinfo.php?chengshi_id=26">长春</a>┊<a href="chengshiinfo.php?chengshi_id=27">呼和浩特</a>
							┊<a href="chengshiinfo.php?chengshi_id=28">石家庄</a>┊<a href="chengshiinfo.php?chengshi_id=29">太原</a>
						</div>
					</div>
					<div class="huadong">
						<h3>华东地区</h3>
						<div id="chengshi">
							<a href="chengshiinfo.php?chengshi_id=7">上海</a>┊<a href="chengshiinfo.php?chengshi_id=8">杭州</a>
							┊<a href="chengshiinfo.php?chengshi_id=9">南京</a>┊<a href="chengshiinfo.php?chengshi_id=12">福州</a>
							┊<a href="chengshiinfo.php?chengshi_id=14">青岛</a>┊<a href="chengshiinfo.php?chengshi_id=30">厦门</a>
							┊<a href="chengshiinfo.php?chengshi_id=31">苏州</a>┊<a href="chengshiinfo.php?chengshi_id=22">宁波</a>
							┊<a href="chengshiinfo.php?chengshi_id=20">济南</a>┊<a href="chengshiinfo.php?chengshi_id=32">常州</a>
							┊<a href="chengshiinfo.php?chengshi_id=33">合肥</a>┊<a href="chengshiinfo.php?chengshi_id=34">南昌</a>
							┊<a href="chengshiinfo.php?chengshi_id=35">温州</a>┊<a href="chengshiinfo.php?chengshi_id=36">无锡</a>
						</div>
					</div>
					<div class="zhongxi">
						<h3>中西地区</h3>
						<div id="chengshi">
							<a href="chengshiinfo.php?chengshi_id=2">成都</a>┊<a href="chengshiinfo.php?chengshi_id=3">重庆</a>
							┊<a href="chengshiinfo.php?chengshi_id=4">西安</a>┊<a href="chengshiinfo.php?chengshi_id=11">武汉</a>
							┊<a href="chengshiinfo.php?chengshi_id=17">长沙</a>┊<a href="chengshiinfo.php?chengshi_id=18">贵阳</a>
							┊<a href="chengshiinfo.php?chengshi_id=10">昆明</a>┊<a href="chengshiinfo.php?chengshi_id=37">洛阳</a>
							┊<a href="chengshiinfo.php?chengshi_id=38">兰州</a>┊<a href="chengshiinfo.php?chengshi_id=39">拉萨</a>
							┊<a href="chengshiinfo.php?chengshi_id=24">郑州</a>
						</div>
					</div>
					<div class="huanan">
						<h3>华南地区</h3>
						<div id="chengshi">
							<a href="chengshiinfo.php?chengshi_id=5">广州</a>┊<a href="chengshiinfo.php?chengshi_id=6">深圳</a>
							┊<a href="chengshiinfo.php?chengshi_id=13">佛山</a>┊<a href="chengshiinfo.php?chengshi_id=40">东莞</a>
							┊<a href="chengshiinfo.php?chengshi_id=19">南宁</a>┊<a href="chengshiinfo.php?chengshi_id=41">中山</a>
							┊<a href="chengshiinfo.php?chengshi_id=42">惠州</a>┊<a href="chengshiinfo.php?chengshi_id=43">柳州</a>
							┊<a href="chengshiinfo.php?chengshi_id=44">三亚</a>┊<a href="chengshiinfo.php?chengshi_id=45">澳门</a>  
							┊<a href="chengshiinfo.php?chengshi_id=46">香港</a>┊<a href="chengshiinfo.php?chengshi_id=47">桂林</a>
						</div>
					</div>
				</div>
            </div>
			<div class="featured-top">
				
				<!--//大陆明星图片列表-->
				<div class="dalu">
					<h3>华北东北</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql1=mysql_query("SELECT s.id AS singerid,c.cityname, y . * 
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND c.localarea =  'huabei_dongbei'
						AND s.num >0
						AND c.number >0
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC , y.startdate ASC 
						LIMIT 0 , 3;",$conn);
				?>
				<div class="featured-box">
					<?php
						while($info1=mysql_fetch_array($sql1))
						{
					
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="yanchanghui.php?singerid=<?php echo $info1[singerid];?>&yanchanghuiid=<?php echo $info1[id];?>"><img src="<?php echo $info1[pic];?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo $info1[singername];?></p>
						<div class="price1" style="height: 25px;">
		        			<span class="actual">时间:<?php echo $info1[startdate].$info1[startweek].$info1[starttime];?></span>
							<span class="actual">地址:<?php echo $info1[cityname]."-".$info1[address]?></span>
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
					<h3>华东地区</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql2=mysql_query("SELECT s.id AS singerid,c.cityname, y . * 
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND c.localarea =  'huadong'
						AND s.num >0
						AND c.number >0
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC , y.startdate ASC 
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
						<div class="price1" style="height: 25px;">
		        			<span class="actual">时间:<?php echo $info2[startdate].$info2[startweek].$info2[starttime];?></span>
							<span class="actual">地址:<?php echo $info2[cityname]."-".$info2[address]?></span>
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
					<h3>中西地区</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql3=mysql_query("SELECT s.id AS singerid,c.cityname, y . * 
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND c.localarea =  'zhongxi'
						AND s.num >0
						AND c.number >0
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC , y.startdate ASC 
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
						<div class="price1" style="height: 25px;">
		        			<span class="actual">时间:<?php echo $info3[startdate].$info3[startweek].$info3[starttime];?></span>
							<span class="actual">地址:<?php echo $info3[cityname]."-".$info3[address]?></span>
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
					<h3>华南地区</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql4=mysql_query("SELECT s.id AS singerid,c.cityname, y . * 
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND c.localarea =  'huanan'
						AND s.num >0
						AND c.number >0
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC , y.startdate ASC 
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
						<div class="price1" style="height: 25px;">
		        			<span class="actual">时间:<?php echo $info4[startdate].$info4[startweek].$info4[starttime];?></span>
							<span class="actual">地址:<?php echo $info4[cityname]."-".$info4[address]?></span>
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
			</div>
			<div class="clear"> </div>
		</div>
   <div class="clear"></div>	
	</div>
  </div>
<?php
	include("bottom.php");
?>