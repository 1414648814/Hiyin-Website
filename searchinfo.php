<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
$search = $_POST[search_neirong];  //用户的搜索内容
$search_neirong_num = 25;  //规定记录下的搜索的内容的数目
//记录下用户的搜索内容
if(isset($_COOKIE['search_neirong']))//判断是否设置了COOKIE  
{
	$search_neirong=$_COOKIE['search_neirong'];
    $search_neirongArray=explode(",", $search_neirong);  //以数组的形式
	$recently_num = count($search_neirongArray);  //计算数组个数
	
	if(in_array($search,$search_neirongArray)){
		//存在就不写入了；
	}
	else{
		if($recently_num<$search_neirong_num){
			if($search_neirong==""){  //加入搜索的内容
				setcookie("search_neirong", $search, time()+3600*5, '/');
			}
			else{
				$search_neirongNew=$search_neirong.",".$search;
				setcookie("search_neirong", $search_neirongNew,time()+3600*5, '/'); 
			}
		}
		else{//如果大于了指定的大小后，将第一个给删去，在尾部再加入最新的记录。 
			$pos=strpos($search_neirong,",")+1; //第一个参数的起始位置 
			$FirstString=substr($search_neirong,0,$pos); //取出第一个参数 
			$search_neirong=str_replace($FirstString,"",$search_neirong); //将第一个参数删除  
			$search_neirongNew=$search_neirong.",".$search;
			setcookie("search_neirong", $search_neirongNew,time()+3600*5, '/'); 
		}
	}
}
else{//没有设置则进行设置
	setcookie("search_neirong",$search,time()+3600*5, '/');
}
echo "<script>alert($search);</script>";
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
			<div class="featured-top">
				<div class="dalu">
					<h3>搜索结果</h3>
				</div>
				<?php
					mysql_query('SET NAMES UTF8');
					$sql1 = mysql_query("SELECT COUNT( * ) AS num
						FROM yanchanghui AS y, singer AS s,singertoyanchanghui as sty
						WHERE y.id = sty.yanchanghui_id
                        AND s.id = sty.singer_id
						AND y.sale =  'on'
						AND s.num >=1
						AND 
						(
							(
							s.singername LIKE  '%$search%'
							)
							OR (
							y.huiming LIKE  '%$search%'
							)
							OR (
							y.address LIKE  '%$search%'
							)
						);",$conn);
					$info1 = mysql_fetch_array($sql1);
					$total = $info1[num];
					//分页
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
						AND y.sale =  'on'
						AND s.num >=1
						AND (
							(s.singername LIKE  '%$search%')
							OR (y.huiming LIKE  '%$search%')
							OR (y.address LIKE  '%$search%')
						)
						order by y.tuijian desc
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
							<a href="mingxinginfo.php?singerid=<?php echo $result[singerid];?>"><p class="title"><span>歌手名字：</span><?php echo $result[singername];?></p></a>
							<span class="actual"><?php echo $result[huiming];?></span>
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
					
					<a href="searchinfo.php" title="首页"><font face="webdings"> 9 </font></a> 
					<a href="searchinfo.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
					<?php
						}
						if($pagecount<=4){
							for($i=1;$i<=$pagecount;$i++){
					?>

					<a href="searchinfo.php?page=<?php echo $i;?>"><?php echo $i;?></a>
					
					<?php
							}
						}
						else
						{
							for($i=1;$i<=4;$i++)
							{	 
					?>
					<div class="a">
						<a href="searchinfo.php?page=<?php echo $i;?>"><?php echo $i;?></a>
					</div>
					<?php 
							}
					?>
					<a href="searchinfo.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
					<a href="searchinfo.php?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
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