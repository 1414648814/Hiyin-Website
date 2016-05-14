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
			
				<?
					$chengshi_id = $_GET[chengshi_id];
					mysql_query('SET NAMES UTF8');
					$sql1 = mysql_query("SELECT count(*) as num,c.cityname
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND y.cityid = '$chengshi_id'
						AND s.num >0
						AND c.number >0
						AND y.sale = 'on';",$conn);
					$info1=mysql_fetch_array($sql1);
					$total = $info1[num];
				?>
			<div class="featured-top">
				<div class="dalu">
					<h3><?php echo $info1[cityname];?></h3>
				</div>
				<?php
					$pagesize=10;
					if ($total<=$pagesize){
					  $pagecount=1;
					} 
					if(($total%$pagesize)!=0){
					   $pagecount=intval($total/$pagesize)+1;
					
					}else{
					   $pagecount=$total/$pagesize;
					
					}
					if(($_GET[page])==""){
						$page=1;
					
					}else{
						$page=intval($_GET[page]);
					}
					?>
					
					<?php
					mysql_query('SET NAMES UTF8');
					$sql2=mysql_query("SELECT  s.id AS singerid,c.cityname, y . * 
						FROM city AS c, singer AS s, yanchanghui AS y
						WHERE c.cityid = y.cityid
						AND s.singername = y.singername
						AND y.cityid = '$chengshi_id'
						AND s.num >0
						AND c.number >0
						AND y.sale = 'on'
						ORDER BY y.tuijian DESC , y.startdate ASC 
						limit ".($page-1)*$pagesize.",$pagesize;",$conn);
					while($result=mysql_fetch_array($sql2))
					{
				?>
				<div class="line1">
					<table>
						<tr>
							<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
				</div>
				<div class="featured-box">
					<?php
						if($result[pic]==""){
					?>
						<div class="yanchanghuiimg">
							<img src="./images/singer/nothing.jpg" alt=""/>
						</div>
					<?php
						}
						else{
					?>
						<div class="yanchanghuiimg">
							<a href="yanchanghui.php?singerid=<?php echo $result[singerid];?>&yanchanghuiid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
						</div>
					<?php
						}
					?>
						<div class="yanchanghuiinfo">
							<p class="title"><span>歌手名字：</span><?php echo $result[singername];?></p>
							<div class="price1">
								<span class="actual">演唱会时间:<?php echo $result[startdate].$result[startweek].$result[starttime];?></span>
								<span class="actual">演唱会地点:<?php echo $result[address];?></span>
								<span class="actual">销售:<?php echo $result[sale];?></span>
							</div>
							<div id="chakan">
								<a href="yanchanghui.php?singerid=<?php echo $result[singerid];?>&yanchanghuiid=<?php echo $result[id];?>"><img src='./images/changjing/tubiao/chakan.png'></a>
							</div>
						</div>
					<div class="clear"></div>
				</div>
					<?php
						}
					
					?>
				
			</div>
			<div class="clear"> </div>
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
					
					<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>&page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="chengshiinfo.php?chengshi_id=<?php echo $chengshi_id;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
					<?php 
						}
					?>
					
					</td>
					</tr>
				</table>
			</div>
		</div>
	<div class="clear"></div>	
	</div>
  </div>
<?php
	include("bottom.php");
?>