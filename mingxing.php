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
	$_SESSION[area] = "dalu";
	$_SESSION[singer_sex] = "men";
?>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="selectarea">
				<div class="hotsinger">
					<?php
						$sql=mysql_query("SELECT distinct s.id, s.singername
						FROM singer AS s, yanchanghui AS y,singertoyanchanghui as sty
						WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
						AND y.sale =  'on'
						AND s.num >=1
						AND y.tuijian =1
						LIMIT 0 , 5;",$conn);
					?>
					<h3>热门</h3>
					<ul>
					<?php
						while($result=mysql_fetch_array($sql))
						{
					?>
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><?php echo $result[singername];?></a>
					<?php
						}
					?>
					</ul>
				</div>
				
				<div class="area">
					<h3>地区</h3>
					<ul>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]= "dalu";echo $_SESSION[area]?>">大陆</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]= "gangtai";echo $_SESSION[area]?>">港台</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]="rihan";echo $_SESSION[area]?>">日韩</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]="oumei";echo $_SESSION[area]?>">欧美</a>
					</ul>
				</div>
				
				<div class="xingbie">
					<h3>性别</h3>
					<ul>
						<a href="mingxingsex.php?sex=<?php echo $_SESSION[singer_sex];?>">男生</a>
						<a href="mingxingsex.php?sex=<?php $_SESSION[singer_sex]="women";echo $_SESSION[singer_sex];?>">女生</a>
					</ul>
				</div>
				
            </div>
			<div class="featured-top">
				
				<!--//大陆明星图片列表-->
				<div class="dalu">
					<h3>大陆</h3>
				</div>
				<div class="featured-box">
                    <?php
						$sql1=mysql_query("SELECT distinct s.singername, s.num, s.pic,s.id
                        FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
                        WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
                        AND s.area =  'dalu'
                        AND y.tuijian =1
                        AND y.sale =  'on'
                        AND s.num >=1
                        ORDER BY s.num DESC 
                        LIMIT 0 , 3",$conn);
						
						while($result=mysql_fetch_array($sql1))
						{
					?>
					
					<div class="col_1_of_3 span_1_of_3">
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo "$result[singername]";?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会还有:</span><h3 style="margin-bottom: 0px;"><?php echo "$result[num]"?></h3><span class="actual">场</span>
						</div>
					</div>
                    <?php
						}
					?>
                    
					<div class="clear"></div>
					<div class="more">
						<a href="mingxingmore.php?select=<?php $_SESSION[area] = "dalu";echo $_SESSION[area];?>"><h3>more</h3></a>
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
					<h3>港台</h3>
				</div>
				<div class="featured-box">
                    <?php
						$sql2=mysql_query("SELECT distinct s.singername,s.num,s.pic,s.id
                        FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
                        WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
                        AND s.area =  'gangtai'
                        AND y.tuijian =1
                        AND y.sale =  'on'
                        AND s.num >=1
                        ORDER BY s.num DESC 
                        LIMIT 0 , 3",$conn);
						while($result=mysql_fetch_array($sql2))
						{
                    
                    ?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo "$result[singername]";?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会还有:</span><h3 style="margin-bottom: 0px;"><?php echo "$result[num]"?></h3><span class="actual">场</span>
						</div>
					</div>
                    <?php
						}
					?>
                
					<div class="clear"></div>
					<div class="more">
						<a href="mingxingmore.php?select=<?php $_SESSION[area] = "gangtai";echo $_SESSION[area];?>"><h3>more</h3></a>
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
					<h3>日韩</h3>
				</div>
				<div class="featured-box">
                    <?php
						$sql3=mysql_query("SELECT distinct s.singername,s.num,s.pic,s.id
                        FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
                        WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
                        AND s.area =  'rihan'
                        AND y.tuijian =1
                        AND y.sale =  'on'
                        AND s.num >=1
                        ORDER BY s.num DESC 
                        LIMIT 0 , 3",$conn);
						while($result=mysql_fetch_array($sql3))
						{
					?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo "$result[singername]";?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会还有:</span><h3 style="margin-bottom: 0px;"><?php echo "$result[num]"?></h3><span class="actual">场</span>
						</div>
					</div>
                    <?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="mingxingmore.php?select=<?php $_SESSION[area] = "rihan";echo $_SESSION[area];?>"><h3>more</h3></a>
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
					<h3>欧美</h3>
				</div>
				<div class="featured-box">
                    <?php
					    $sql4=mysql_query("SELECT distinct s.singername,s.num,s.pic,s.id
                        FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
                        WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
                        AND s.area =  'oumei'
                        AND y.tuijian =1
                        AND y.sale =  'on'
                        AND s.num >=1
                        ORDER BY s.num DESC 
                        LIMIT 0 , 3",$conn);
						while($result=mysql_fetch_array($sql4))
						{
                    ?>
					<div class="col_1_of_3 span_1_of_3">
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo "$result[singername]";?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会还有:</span><h3 style="margin-bottom: 0px;"><?php echo "$result[num]"?></h3><span class="actual">场</span>
						</div>
					</div>
                    <?php
						}
					?>
					<div class="clear"></div>
					<div class="more">
						<a href="mingxingmore.php?select=<?php $_SESSION[area] = "oumei";echo $_SESSION[area];?>"><h3>more</h3></a>
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