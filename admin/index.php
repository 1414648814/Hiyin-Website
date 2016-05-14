<?php
	header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
	session_start();
	include("conn/data_connect.php");
	$sql1=mysql_query("select * from admin where id='$_SESSION[adminid]';",$conn);
	$info1 = mysql_fetch_array($sql1);
	if($info1==false){
		header("location:login.php");
	}
	else{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hiyin后台管理</title>

<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tendina.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
    <!--顶部-->
    <div class="layout_top_header">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">hiyin管理后台</h1></span></div>
            <div id="ad_setting" class="ad_setting">
                <a class="ad_setting_a" href="javascript:; ">
                    <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                    <span>管理员</span>
                    <i class="icon-chevron-down glyph-icon"></i>
                </a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-user glyph-icon"></i> 个人中心 </a> </li>
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-cog glyph-icon"></i> 设置 </a> </li>
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
                </ul>
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
    <div class="layout_left_menu">
        <ul id="menu">
            <li class="childUlLi">
                <a href="#"  target="#"><i class="glyph-icon icon-home"></i>首页</a>
                <ul>
					
                </ul>
            </li>
			<li class="childUlLi">
                <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>添加信息</a>
                <ul>
                    <li><a href="insertchengshi.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加城市</a></li>
                    <li><a href="insertsinger.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加歌手</a></li>
                    <li><a href="insertyanchanghui.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>添加演唱会</a></li>
                </ul>
            </li>
			<li class="childUlLi">
                <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>修改信息</a>
                <ul>
                    <li><a href="xiugaichengshi.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>城市信息</a></li>
                    <li><a href="xiugaisinger.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>歌手信息</a></li>
					<li><a href="xiugaiyanchanghui.php" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>演唱会信息</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="user.html"  target="menuFrame"> <i class="glyph-icon icon-reorder"></i>粉丝社区管理</a>
                <ul>
                    <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>话题删除</a></li>
                    <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>小组删除</a></li>
                    <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>小组禁言</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>话题置顶</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>小组审核</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>小组推荐</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>评论删除</a></li>
                </ul>
            </li>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            <li class="childUlLi">
                <a href="role.html" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>人员管理</a>
                <ul>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>用户添加</a></li>
                    <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>用户删除</a></li>
                    <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>用户禁言</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>用户冻结</a></li>
                </ul>
            </li>
			<li class="childUlLi">
                <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>留言管理</a>
                <ul>
                    <li><a href="meunbox.html" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>删除留言</a></li>
                    <li><a href="meunbox_add.html" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>留言回复</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--菜单-->
    <div id="layout_right_content" class="layout_right_content">

        <div class="route_bg">
            <a href="#">首页</a><i class="glyph-icon icon-chevron-right"></i>
            <a href="#">菜单管理</a>
        </div>
        <div class="mian_content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="main.php" style="overflow:visible;"
                        scrolling="yes" frameborder="no" width="100%" height="100%">
				</iframe>
            </div>
        </div>
    </div>
    <div class="layout_footer">
        <p>Copyright © 2016 - hiyin科技</p>
    </div>
</body>
</html>
<?php
	}
?>