<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<title>hiyin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
	include("top.php");
	include("conn/data_connect.php");
?>
<div class="main">
	<div class="wrap">
			<div class="about-grid">
				<?php
					$singerid = $_GET[singerid];
					mysql_query('SET NAMES UTF8');
					$sql1 = mysql_query("SELECT * 
						FROM singer
						WHERE id =$singerid;",$conn);
					$singerinfo = mysql_fetch_array($sql1);
					$total=$singerinfo[num];
					$pagesize=2;
					if ($total<=$pagesize){
						$pagecount=1;
					} 
					if(($total%$pagesize)!=0){
						$pagecount=intval($total/$pagesize)+1;
					}else
					{
						$pagecount=$total/$pagesize;
							
					}
					if(($_GET[page])==""){
						$page=1;
							
					}else{
						$page=intval($_GET[page]);
					}
					if($total>=1)
					{
					
				?>
				<h3><?php echo $singerinfo[singername]?></h3>
				<div class="about-team">
					<div class="client">
						<div class="about-team-left">
								<a><img src="<?php echo $singerinfo[pic];?>" ></a>
						</div>
						<?php
							$sql2 = mysql_query("SELECT s.id AS sid, c.cityname,s.num, y.id AS yid, y.pic as ypic, y.cityid, y.huiming, y.startdate,y.address
							FROM singer AS s, yanchanghui AS y,city as c,singertoyanchanghui as sty
            				WHERE y.id = sty.yanchanghui_id
            				AND s.id = sty.singer_id  
                            and y.cityid = c.cityid
							AND y.sale =  'on'
							AND s.num >=1
							AND s.id ='$singerid' limit ".($page-1)*$pagesize.",$pagesize;",$conn);
							while($result=mysql_fetch_array($sql2))
							{
						
						?>
						
						<div class="about-team-right">
							<div class="line1">
								<table>
								<tr>
								<td background="./images/changjing/xiantiao/line1.gif"></td>
								</tr>
								</table>
							</div>
							<a href="yanchanghui.php?singerid=<?php echo $singerid?>&yanchanghuiid=<?php echo $result[yid]?>"><img src="<?php echo $result[ypic];?>"></a>
							<div class="jianjie">
								<span><?php echo $singerinfo[singername];?></span>
								<span><?php echo $result[huiming];?></span>
								城市:<span><?php echo $result[cityname];?></span>
								时间:<span><?php echo $result[startdate];?></span>
								场馆:<span><?php echo $result[address];?></span>
								<div class="chakan">
									<a href="yanchanghui.php?singerid=<?php echo $singerid?>&yanchanghuiid=<?php echo $result[yid]?>"><img src='./images/changjing/tubiao/chakan.png'></a>
								</div>
							</div>
							
						</div>
						<?php
							}
					}
						?>
						
						<div class="clear"> </div>
					</div>
				</div>
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
					
					<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>&page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="mingxinginfo.php?singerid=<?php echo $singerid;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
					<?php 
						}
					?>
					
					</td>
					</tr>
				</table>
			</div>
			<div class="clear"></div>	
	</div>
</div>
<?php
	include("bottom.php");
?>
