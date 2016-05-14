<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/data_connect.php");
?>
<html>
<head>
<title>hiyin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<!--slider-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
<script src="./js/jquery-1.9.0.min.js"></script>
<script src="./js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).php();
                $(".dropdown dt a span").php(text);
                $(".dropdown dd ul").hide();
                $("#result").php("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").php();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
</script>

<!--实现城市的选择-->
<script type="text/javascript">
var $$ = function (id) {
	return document.getElementById(id);
}

var getByClass = function (oParent, sClass) {
	var aEle = oParent.getElementsByTagName("*");
	var re = new RegExp("\\b" + sClass + "\\b");
	var arr = [];

	for (var i = 0; i < aEle.length; i++) {
		if (re.test(aEle[i].className)) {
			arr.push(aEle[i]);
		}
	}
	return arr;
}

var setMainNav = function () {
	var oMainNav = $$("mainNav");
	var aLi = getByClass(oMainNav, "list")[0].getElementsByTagName("li");
	var aGameHover = getByClass(oMainNav, "game_hover");
	var aHoverCont = getByClass(oMainNav, "hover_cont");

	for (var i = 0; i < aGameHover.length; i++) {
		aGameHover[i].index = i;
		aGameHover[i].onmouseover = function () {
			this.className += " "+"game_hover_current";
			for (var j = 0; j < aHoverCont.length; j++) {
				aHoverCont[j].index_j = j;
				aHoverCont[j].style.display = "none";
				aHoverCont[j].onmouseover = function () {
					this.style.display = "block";
					aGameHover[this.index_j].className += " "+"game_hover_current";
				}

				aHoverCont[j].onmouseout = function () {
					this.style.display = "none";
				}
			}
			if (aHoverCont[this.index]) {
				aHoverCont[this.index].style.display = "block";
			}
		}
	}

	for (var i = 0; i < aLi.length; i++) {
		aLi[i].index = i;
		aLi[i].onmouseout = function () {
			if (aHoverCont[this.index]) {
				aHoverCont[this.index].style.display = "none";
			}
			aGameHover[this.index].className = "game_hover";
		}
	}
}
window.onload = function () {
	setMainNav();
}
</script>

</head>
<body onload="onload()">
<div class="header">
	<div class="header-top">
		<div class="wrap">
			<div class="header_top_right">
						<div class="nav" id="mainNav">
							<ul class="list">
								<li>
									<a href="#" class="game_hover">[选择城市]</a>
									<div class="hover_cont wlyx">
										<div class="nav_cont">
											<div class="nav_li">
												<div class="nav_li_l">
													华北东北
												</div>
												<div class="nav_li_r">
													<a href="chengshiinfo.php?chengshi_id=1">北京</a>┊<a href="chengshiinfo.php?chengshi_id=23">天津</a>
													┊<a href="chengshiinfo.php?chengshi_id=24">郑州</a>┊<a href="chengshiinfo.php?chengshi_id=15">沈阳</a>
													┊<a href="chengshiinfo.php?chengshi_id=25">哈尔滨</a>┊<a href="chengshiinfo.php?chengshi_id=16">大连</a>
													┊<a href="chengshiinfo.php?chengshi_id=26">长春</a>┊<a href="chengshiinfo.php?chengshi_id=27">呼和浩特</a>
													┊<a href="chengshiinfo.php?chengshi_id=28">石家庄</a>┊<a href="chengshiinfo.php?chengshi_id=29">太原</a>	
												</div>
											</div>
											<div class="nav_li">
												<div class="nav_li_l">
													华东地区
												</div>
												<div class="nav_li_r">
													<a href="chengshiinfo.php?chengshi_id=7">上海</a>┊<a href="chengshiinfo.php?chengshi_id=8">杭州</a>
														┊<a href="chengshiinfo.php?chengshi_id=9">南京</a>┊<a href="chengshiinfo.php?chengshi_id=12">福州</a>
														┊<a href="chengshiinfo.php?chengshi_id=14">青岛</a>┊<a href="chengshiinfo.php?chengshi_id=30">厦门</a>
														┊<a href="chengshiinfo.php?chengshi_id=31">苏州</a>┊<a href="chengshiinfo.php?chengshi_id=22">宁波</a>
														┊<a href="chengshiinfo.php?chengshi_id=20">济南</a>┊<a href="chengshiinfo.php?chengshi_id=32">常州</a>
														┊<a href="chengshiinfo.php?chengshi_id=33">合肥</a>┊<a href="chengshiinfo.php?chengshi_id=34">南昌</a>
														┊<a href="chengshiinfo.php?chengshi_id=35">温州</a>┊<a href="chengshiinfo.php?chengshi_id=36">无锡</a>													
												</div>
											</div>
											<div class="nav_li">
												<div class="nav_li_l">
													中西地区
												</div>
												<div class="nav_li_r">
													<a href="chengshiinfo.php?chengshi_id=2">成都</a>┊<a href="chengshiinfo.php?chengshi_id=3">重庆</a>
													┊<a href="chengshiinfo.php?chengshi_id=4">西安</a>┊<a href="chengshiinfo.php?chengshi_id=11">武汉</a>
													┊<a href="chengshiinfo.php?chengshi_id=17">长沙</a>┊<a href="chengshiinfo.php?chengshi_id=18">贵阳</a>
													┊<a href="chengshiinfo.php?chengshi_id=10">昆明</a>┊<a href="chengshiinfo.php?chengshi_id=37">洛阳</a>
													┊<a href="chengshiinfo.php?chengshi_id=38">兰州</a>┊<a href="chengshiinfo.php?chengshi_id=39">拉萨</a>
													┊<a href="chengshiinfo.php?chengshi_id=24">郑州</a>
												</div>
											</div>
											<div class="nav_li">
												<div class="nav_li_l">
													华南地区
												</div>
												<div class="nav_li_r">
													<a href="chengshiinfo.php?chengshi_id=5">广州</a>┊<a href="chengshiinfo.php?chengshi_id=6">深圳</a>
													┊<a href="chengshiinfo.php?chengshi_id=13">佛山</a>┊<a href="chengshiinfo.php?chengshi_id=40">东莞</a>
													┊<a href="chengshiinfo.php?chengshi_id=19">南宁</a>┊<a href="chengshiinfo.php?chengshi_id=41">中山</a>
													┊<a href="chengshiinfo.php?chengshi_id=42">惠州</a>┊<a href="chengshiinfo.php?chengshi_id=43">柳州</a>
													┊<a href="chengshiinfo.php?chengshi_id=44">三亚</a>┊<a href="chengshiinfo.php?chengshi_id=45">澳门</a>  
													┊<a href="chengshiinfo.php?chengshi_id=46">香港</a>┊<a href="chengshiinfo.php?chengshi_id=47">桂林</a>
												</div>
											</div>
											<div class="nav_li">
												<div class="nav_li_l">
													<a href="chengshi.php">更多城市</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
				<div class="login">
					<?php
						if($_SESSION[username]==""||$_SESSION[username]=="root"){
					?>
						<span><a href="login.php"><img src="./images/login.png" alt="" title="login"></a></span>
					<?php
						}
						else{
							if($_SESSION[sex]=="men")
							{
					?>
						<span><a href="setyonghu.php"><img src="./images/sex/sex_man.png" alt="" title="<?php echo "$_SESSION[username]"?>"></a></span>
						
					<?php
							}
							else{
					?>
						<span><a href="setyonghu.php"><img src="./images/sex/sex_woman.png" alt="" title="<?php echo "$_SESSION[username]"?>"></a></span>
					<?php
							}
						}
					?>
					
		   		</div>
				<?php
						if($_SESSION[username]!=""&&$_SESSION[username]!="root"){
				?>
						<div class="login">
							<div>
							<a href="logout.php"><img src="./images/attention/attention.png" alt=""/></a>
								
							</div>
				<?php
						}
				?>
				</div>
		 		<div class="clear"></div>
			 </div>
			<div class="clear"></div>
		 </div>
	    <div class="clear"></div>
   </div>
	<div class="header-bot">
		<div class="wrap">
			<div class="header-bot1">
				<div class="logo">
					<a href="index.php"><img src="./images/logo.png" alt=""></a>
				</div>
				<div class="ph-no">
					<div class="search_box">
					       <form action="searchinfo.php" method="post" onSubmit="return getsearch(this)">
								<input name="search_neirong" type="text" value="请输入演唱会名称，艺人，场馆名称...." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入演唱会名称，艺人，场馆名称....';}"><input type="submit" value="">
					       </form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
	<div class="header-bottom">
		<div class="wrap">
			<nav id="menu-wrap">    
				<ul id="menu">
					<li><a href="index.php">首页</a></li>
					<li>
						<a href="fenlei.php">分类</a>
							<ul>
								<li><a href="fenleiinfo.php?type=liuxing">流行</a></li>
								<li><a href="fenleiinfo.php?type=yaogun">摇滚</a></li>
								<li><a href="fenleiinfo.php?type=minzu">民族</a></li>
								<li><a href="fenleiinfo.php?type=yinyuejie">音乐节</a></li>
							    <li><a href="fenleiinfo.php?type=other">其他</a></li>
							</ul>
					</li>
					<li><a href="mingxing.php">明星</a></li>
					<li><a href="zhoubian.php">周边</a></li>
					<li><a href="fans.php">粉丝社区</a></li>
				</ul>
			</nav>
		</div>
	</div>
  <div class="banner">
	<div id="wrapper">
 		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="./images/index_pic/banner1.jpg"  alt="" />
				<img src="./images/index_pic/banner2.jpg"  alt="" />
				<img src="./images/index_pic/banner3.jpg"  alt="" />
				<img src="./images/index_pic/banner4.jpg"  alt="" />
            </div>
        </div>
    </div>
  </div>
<div class="main">
	<div class="wrap">
		<?php
			mysql_query('SET NAMES UTF8');
			$sql1 = mysql_query("select s.id as singerid,s.singername,y.* 
            from yanchanghui as y,singer as s ,singertoyanchanghui as sty
            WHERE y.id = sty.yanchanghui_id
            AND s.id = sty.singer_id 
            AND y.sale='on' 
            AND s.num >=1 
            order by y.tuijian desc limit 0,15;",$conn);
			$i=0;
		?>
		<div class="content-top">
			<?php
				while($result = mysql_fetch_array($sql1))
				{
					$i++;
			?>
			<div class="col_1_of_3 span_1_of_3">
				<a href="yanchanghui.php?singerid=<?php echo $result[singerid];?>&yanchanghuiid=<?php echo $result[id];?>">
					<div id="mainContent">
						<div id="yanchanghuipic">
							<img src="<?php if($result[pic]!=""){echo $result[pic];}else{echo "images/yanchanghui/nothing,jpg";}?>" alt=""/>
						</div>
					</div>
					<div class="banner_content">
						<h2><?php echo $result[huiming];?></h2>
						<p style="color:#FFF68F";><?php echo $result[address];?><i class="icon-chevron-sign-right"></i></p>
						<p style="color:#FFF68F";><?php echo $result[startdate].$result[startweek].$result[starttime];?><i class="icon-chevron-sign-right"></i></p>
					</div>
				</a>
				<div class="icon-right">
					<a href="#"><img src="./images/marker1.png" alt=""/></a>
				</div>
				<div class="clear"></div>
			</div>
			<?php
				if($i%3==0){
			?>
			<div class="line1">
					<table>
					<tr>
						<td background="./images/changjing/xiantiao/line1.gif"></td>
					</tr>
					</table>
			</div>
			<?php
					}
				}
			?>
			<div class="clear"></div>
		</div>
		<div class="section group">			
			<div class="leftsidebar span_3_of_1">
				<?php 
					$sql2=mysql_query("select s.id as singerid,s.singername,y.* 
                    from yanchanghui as y,singer as s ,singertoyanchanghui as sty
            		WHERE y.id = sty.yanchanghui_id
            		AND s.id = sty.singer_id  
            		AND y.sale='on' and s.num >=1 
                    order by y.addtime desc,y.tuijian desc limit 0,8; ",$conn);
				?>
				<h3>最in的演唱会</h3>
				<?php
					while($result2 = mysql_fetch_array($sql2))
					{
				?>
				<a href="yanchanghui.php?singerid=<?php echo $result2[singerid];?>&yanchanghuiid=<?php echo $result2[id];?>">
				<div class="posts">
					<div class="date">
							<figure><?php echo $result2[addtime];?></figure>
					</div>
					<div class="post_desc">
							<p style="color:#FFFFFF";><?php echo $result2[huiming];?></p>
					</div>
					<div class="clear"></div>	
				</div>
				</a>
				<?php
					}
				?>
 			</div>	
			<div class="content span_1_of_c">
				<?php
					if(isset($_COOKIE["singerids"]))//判断是否设置了COOKIE  
					{
						$singerids=$_COOKIE["singerids"];  //取出singerid
						$singeridsArray=explode(",", $singerids);  //以，划分成一个数组用来保存singerid的数组
					}
					if(isset($_COOKIE["yanchanghuiids"]))//判断是否设置了COOKIE  
					{
						$yanchanghuiids=$_COOKIE["yanchanghuiids"];  //取出singerid
						$yanchanghuiidsArray=explode(",", $yanchanghuiids);  //以，划分成一个数组用来保存yanchanghuiid的数组
					}
				?>
				<div class="con-left">
					<h3>猜你喜欢</h3>
					<div class="con-box">
						<div class="grid images_3_of_2">
							<img src="./images/pic3.jpg" alt=""/>
						</div>
						<div class="desc span_3_of_2">
							<h3>Tuesday, 5 August 2013</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
						</div><div class="clear"></div>	
					</div>
					<div class="con-right-box">
						<div class="grid images_3_of_2">
							<img src="./images/pic4.jpg" alt=""/>
						</div>
						<div class="desc span_3_of_2">
							<h3>Tuesday, 5 August 2013</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
						</div><div class="clear"></div>	
					</div>
				</div>
			</div>
			<div class="gundongpinglun">
				<?php
					$sql2 = mysql_query("select w.groupid,w.groupname,w.groupicon,g.* from weigroup as w,group_topics as g
							where w.groupid=g.groupid and w.isaudit=1 and w.isshow=1 and g.isshow=1
							order by g.istop desc,g.count_view desc,g.count_comment desc limit 0,6",$conn);
					$i=0;
				?>
				<div class="con-right">
					<h3>最夯话题</h3>
					<?php
						while($result2 = mysql_fetch_array($sql2)){
							$i++;
							if($i%2==0){
					?>
					<div class="con-box">
						<div class="desc span_3_of_2">
							<a href="huatiinfo.php?groupid=<?php echo $result2[groupid];?>&topicid=<?php echo $result2[topicid];?>"><h3><?php echo $result2[title];?></h3></a>
							<p style="color:#FFFFFF";><?php echo $result2[content];?></p>
						</div>
						<div class = "laizixiaozu">
							<a href="xiaozuinfo.php?groupid=<?php echo $result2[groupid];?>"><img src="<?php if($result2[groupicon]!=""){echo $result2[groupicon];}else{echo "images/groupicon/nothing.jpg";}?>"></img></a>
							<p>Go</p>
						</div>
						<div class="clear"></div>	
					</div>
					<?php
							}
							else{
					?>
					<div class="con-right-box">
						<div class="desc span_3_of_2">
							<a href="huatiinfo.php?groupid=<?php echo $result2[groupid];?>&topicid=<?php echo $result2[topicid];?>"><h3><?php echo $result2[title];?></h3></a>
							<p style="color:#FFFFFF";><?php echo $result2[content];?></p>
						</div>
						<div class = "laizixiaozu">
							<a href="xiaozuinfo.php?groupid=<?php echo $result2[groupid];?>"><img src="<?php if($result2[groupicon]!=""){echo $result2[groupicon];}else{echo "images/groupicon/nothing.jpg";}?>"></img></a>
							<p>Go</p>
						</div>
						<div class="clear"></div>	
					</div>
					<?php
							}
						}
					?>
				</div>
			</div>
			
		<div class="clear"></div>	
		</div>
	</div>
</div>
<?php
	include("bottom.php");
?>