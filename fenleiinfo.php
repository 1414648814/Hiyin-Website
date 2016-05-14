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
				<?php
					$type=$_GET[type];
					switch ($type){
						case 'liuxing':
							$title='流行';
							break;
						case 'yaogun':
							$title='摇滚';
							break;
						case 'minzu':
							$title='民族';
							break;
						case 'yinyuejie':
							$title='音乐节';
							break;
						case 'qita':
							$title='其他';
							break;
					}
					mysql_query('SET NAMES UTF8');
					$sql1 = mysql_query("select count(*) as num from yanchanghui as y where y.type = '".$_GET[type]."'
						AND y.sale =  'on';",$conn);
					$info1=mysql_fetch_array($sql1);
					$total = $info1[num];
				?>
			<div class="featured-top">
				<div class="dalu">
					<h3><?php echo $title;?></h3>
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
					$sql2=mysql_query("SELECT s.id AS singerid, y. * 
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.type = '".$_GET[type]."'
						AND y.sale =  'on'
						ORDER BY y.tuijian DESC,s.area asc
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
					
					<a href="fenleiinfo.php?type=<?php echo $type;?>" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="fenleiinfo.php?type=<?php echo $type;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="fenleiinfo.php?type=<?php echo $type;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="fenleiinfo.php?type=<?php echo $type;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="fenleiinfo.php?type=<?php echo $type;?>&page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="fenleiinfo.php?type=<?php echo $type;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
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