<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
$singerid = $_GET[singerid];
$yanchanghuiid = $_GET[yanchanghuiid];

//将点击的歌手和演唱会id的cookie保存下来
$visit_singer_num = 25; //访问歌手次数
$visit_yanchanghui_num = 25;//访问演唱会次数
if(isset($_COOKIE['singerids']))//判断是否设置了COOKIE  
{
	$singerids=$_COOKIE['singerids'];
    $singeridsArray=explode(",", $singerids);  //以数组的形式
	$recently_num = count($singeridsArray);  //计算数组个数
		
	if(in_array($singerid,$singeridsArray)){
		//存在就不写入了；
	}
	else{
		if($recently_num<$visit_singer_num){
			if($singerids==""){  //加入singerid
				setcookie("singerids", $singerid, time()+3600*5, '/');
			}
			else{
				$singeridsNew=$singerids.",".$singerid;
				setcookie("singerids", $singeridsNew,time()+3600*5, '/'); 
			}
		}
		else{//如果大于了指定的大小后，将第一个给删去，在尾部再加入最新的记录。 
			$pos=strpos($singerids,",")+1; //第一个参数的起始位置 
			$FirstString=substr($singerids,0,$pos); //取出第一个参数 
			$singerids=str_replace($FirstString,"",$singerids); //将第一个参数删除  
			$singeridsNew=$singerids.",".$singerid;
			setcookie("singerids", $singeridsNew,time()+3600*5, '/'); 
		}
	}
}
else{//没有设置则进行设置
	setcookie("singerids",$singerid,time()+3600*5, '/');
}

//演唱会id
if(isset($_COOKIE['yanchanghuiids']))//判断是否设置了COOKIE  
{
	$yanchanghuiids=$_COOKIE['yanchanghuiids'];
    $yanchanghuiidsArray=explode(",", $yanchanghuiids);  //以数组的形式
	$recently_num = count($yanchanghuiidsArray);  //计算数组个数
		
	if(in_array($yanchanghuiid,$yanchanghuiidsArray)){
		//存在就不写入了；
	}
	else{
		if($recently_num<$visit_yanchanghui_num){
			if($yanchanghuiids==""){  //加入singerid
				setcookie("yanchanghuiids", $yanchanghuiid, time()+3600*5, '/');
			}
			else{
				$yanchanghuiidsNew=$yanchanghuiids.",".$yanchanghuiid;
				setcookie("yanchanghuiids", $yanchanghuiidsNew,time()+3600*5, '/'); 
			}
		}
		else{//如果大于了指定的大小后，将第一个给删去，在尾部再加入最新的记录。 
			$pos=strpos($yanchanghuiids,",")+1; //第一个参数的起始位置 
			$FirstString=substr($yanchanghuiids,0,$pos); //取出第一个参数 
			$yanchanghuiids=str_replace($FirstString,"",$yanchanghuiids); //将第一个参数删除  
			$yanchanghuiidsNew=$yanchanghuiids.",".$yanchanghuiid;
			setcookie("yanchanghuiids", $yanchanghuiidsNew,time()+3600*5, '/'); 
		}
	}
}
else{//没有设置则进行设置
	setcookie("yanchanghuiids",$yanchanghuiid,time()+3600*5, '/');
}

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

					mysql_query('SET NAMES UTF8');
					$sql2 = mysql_query("SELECT y.*
							FROM singer AS s, yanchanghui AS y,singertoyanchanghui as sty
            				WHERE y.id = sty.yanchanghui_id
            				AND s.id = sty.singer_id  
							AND y.sale =  'on'
							AND s.num >=1
							AND s.id = $singerid 
							AND y.id =$yanchanghuiid;",$conn);
					$result=mysql_fetch_array($sql2);
					
				?>
				<h3><?php echo $result[singername]?></h3>
				<div class="about-team">
					<div class="client">
						<div class="about-team-left">
							<img src="<?php echo $result[pic];?>"></img>
						</div>
						
						<div class="about-team-right">
							<div class="line1">
								<table>
								<tr>
								<td background="./images/changjing/xiantiao/line1.gif"></td>
								</tr>
								</table>
							</div>
							
							<div class="jianjie">
								<span><?php echo $result[huiming];?></span>
								城市:<span><?php echo $result[city];?></span>
								时间:<span><?php echo $result[startdate]."\r\n";echo $result[startweek]."\r\n";echo $result[starttime]?></span>
								场馆:<span><?php echo $result[address];?></span>
								销售情况：<span><?php if($result[sale]=="on"){echo "销售中";}?></span>
							</div>
							
						</div>
						<div class="clear"> </div>
					</div>
				</div>
			</div>
    		<div class="bshare-custom">
                <a title="分享到QQ空间" class="bshare-qzone"></a>
                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                <a title="分享到人人网" class="bshare-renren"></a>
                <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                <a title="分享到网易微博" class="bshare-neteasemb"></a>
                <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
                <span class="BSHARE_COUNT bshare-share-count">0</span>
    		</div>
    		<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/button.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
    		<a class="bshareDiv" onclick="javascript:return false;"></a><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
			<div class="info">
				<div class="line1">
					<table>
					<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
					</tr>
					</table>
				</div>
				<div class="info2">
					<h3>演唱会信息</h3>
					<p><?php echo $result[introduction];?></p>
					
				</div>
			</div>
			<div class="line1">
					<table>
					<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
					</tr>
					</table>
			</div>
			<?php
				$sql3 = mysql_query("select * from leaveword as l,user as u 
				where l.isshow=1 and l.userid=u.userid and yanchanghuiid = '".$yanchanghuiid."' order by l.istop,l.addtime desc;",$conn);
			?>
			<div class = "leavewordneirong">
				<center><h3>留言</h3></center>
				<?php
					while($info3 = mysql_fetch_array($sql3))
					{
				?>
				
				<div id="leavewordneirong_left">
					<a><img src="<?php if($info3[face]!=""){echo $info3[face];}else{echo "images/sex/nothing.jpg";}?>"></img></a>
					<p><?php echo $info3[regname];?></p>
				</div>
				<div id="leavewordneirong_right">
					<p><?php echo $info3[content];?></p>
				</div>
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
			</div>
			<?php
				$sql4 = mysql_query("select * from user where userid='".$_SESSION[userid]."';",$conn);
				$info4 = mysql_fetch_array($sql4);
			?>
			<form action='saveleaveword.php?yanchanghuiid=<?php echo $yanchanghuiid;?>' method='post'>
				<center>
				<div class="leaveword">
					<h3>评论</h3>
					<?php
					if($info4==true)
					{
					?>
					<span><textarea name="userMsg"> </textarea></span>
				</div>
				</center>
				<div class="tijiao">
					<input class="btn btn-8 btn-8c" type="submit" value="提交" />
				</div>
					<?php
					}
					else{
					?>
					<span><textarea name="userMsg" disabled="disabled">请先登录</textarea></span>
					<?php
					}
					?>
			</form>
			<div class="clear"></div>	
	</div>
</div>
<?php
	include("bottom.php");
?>
