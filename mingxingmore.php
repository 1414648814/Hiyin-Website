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
				<div class="hotsinger">
					<?php
						$sql=mysql_query("SELECT distinct s.id, s.singername
						FROM singer AS s, yanchanghui AS y,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
						AND y.sale =  'on'
						AND s.num >=1
						AND y.tuijian =1
						LIMIT 0 , 5",$conn);
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
				<hr>
				<div class="area">
					<h3>地区</h3>
					<ul>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]= "dalu";echo $_SESSION[area]?>">大陆</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]= "gangtai";echo $_SESSION[area]?>">港台</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]="rihan";echo $_SESSION[area]?>">日韩</a>
						<a href="mingxingmore.php?select=<?php $_SESSION[area]="oumei";echo $_SESSION[area]?>">欧美</a>
					</ul>
				</div>
				<hr>
				<div class="xingbie">
					<h3>性别</h3>
					<ul>
						<a href="mingxingsex.php?sex=<?php $_SESSION[singer_sex]="men";echo $_SESSION[singer_sex];?>">男生</a>
						<a href="mingxingsex.php?sex=<?php $_SESSION[singer_sex]="women";echo $_SESSION[singer_sex];?>">女生</a>
					</ul>
				</div>
				<hr>
            </div>
				<?php
					if($_GET[select]=="dalu"){
                       	$_SESSION[area] = "dalu";
                    }
                    else if($_GET[select]=="oumei"){
                        $_SESSION[area] = "oumei";
                    }
                    else if($_GET[select]=="rihan"){
                        $_SESSION[area] = "rihan";
                    }
                    else if($_GET[select]=="gangtai"){
                        $_SESSION[area] = "gangtai";
                    }
					$sql=mysql_query("select count(*) as num
						from singer as s, yanchanghui as y,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
                        and y.sale='on' and s.area ='".$_SESSION[area]."';",$conn);

					$info=mysql_fetch_array($sql);
					$total=$info[num];
					if($total==0)
					{	
						echo $_SESSION[area]."歌手最近没有任何演唱会!";
					}
					else
					{
						
				?>
			<div class="featured-top">
				<div class="dalu">
					<h3>
                        <?php 
                        if($_GET[select]=="dalu"){
                            echo "大陆";
                        }
                        else if($_GET[select]=="oumei"){
                            echo "欧美";
                        }
                        else if($_GET[select]=="rihan"){
                            echo "日韩";
                        }
                        else if($_GET[select]=="gangtai"){
                            echo "港台";
                        }
                        else 
                        
                        ?>
                    </h3>
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
					$sql1=mysql_query("select s.singername,s.num,s.pic,s.id
						from singer as s, yanchanghui as y,singertoyanchanghui as sty
            			WHERE y.id = sty.yanchanghui_id
            			AND s.id = sty.singer_id  
                        and y.sale='on' and s.area ='".$_SESSION[area]."' 
						order by y.tuijian,s.num desc
						limit ".($page-1)*$pagesize.",$pagesize;",$conn);
					while($result=mysql_fetch_array($sql1))
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
					<div class="col_1_of_3 span_1_of_3">
					<?php
						if($result[pic]==""){
					?>
						<img src="./images/singer/nothing.jpg" alt=""/>
					<?php
						}
						else{
					?>
						<a href="mingxinginfo.php?singerid=<?php echo $result[id];?>"><img src="<?php echo "$result[pic]";?>" alt=""/></a>
					<?php
						}
					?>
						<p class="title" style="height: 38px;"><span>歌手名字：</span><?php echo "$result[singername]";?></p>
						<div class="price1" style="height: 19px;">
		        			<span class="actual">演唱会还有:</span><h3 style="margin-bottom: 0px;"><?php echo "$result[num]"?></h3><span class="actual">场</span>
						</div>
					</div>
					<div class="clear"></div>
				</div>
					<?php
						}
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
					
					<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>&page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>&page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="mingxingmore.php?select=<?php echo $_SESSION[area];?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
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