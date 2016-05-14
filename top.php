<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="./js/getsearch.js"></script>
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
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
    </script>
	<script type='text/javascript'>
		function onload(){
            alert("Welcome!");
			
		}
	</script>
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