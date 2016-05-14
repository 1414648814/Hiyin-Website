<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/data_connect.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hiyin后台模板</title>
<script type="text/javascript" src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
<script type="text/javascript" src="./fckeditor/fckeditor.js"></script> <!--载入fckeditor类-->
<script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./js/manhuaDate.1.0.js"></script>
<script type="text/javascript">
   window.onload = function()
   {
      var oFCKeditor = new FCKeditor( 'MyTextarea' ) ;
      oFCKeditor.BasePath = "./FCKeditor/" ;
	  oFCKeditor.Width = "100%";
	  oFCKeditor.Height = "450px";
      oFCKeditor.ReplaceTextarea() ;
	}
</script>
<script type="text/javascript">
$(function (){
	$("input.startdate").manhuaDate({					       
		Event : "click",//可选				       
		Left : 0,//弹出时间停靠的左边位置
		Top : -16,//弹出时间停靠的顶部边位置
		fuhao : "-",//日期连接符默认为-
		isTime : false,//是否开启时间值默认为false
		beginY : 2010,//年份的开始默认为1949
		endY :2015//年份的结束默认为2049
	});
});
</script>
</head>
<body>
<?php
	$checkboxid = $_GET[checkboxid];
	$yanchanghui_array = explode(",",$checkboxid);
	$num = count($yanchanghui_array);
	mysql_query('SET NAMES UTF8');
	for($i=0;$i<$num-1;$i++)
	{
		$id = (int)$yanchanghui_array[$i];
		//echo "<script language='javascript'>alert($id);</script>";
		$sql=mysql_query("select * from yanchanghui as y,singer as s,city as c where y.cityid = c.cityid and y.singerid = s.id and y.id=$id;",$conn);
		$result = mysql_fetch_array($sql);
?>
<h2><?php echo $result[huiming];?></h2>
<div class="div_from_aoto" style="width:60%">
    <FORM action="changeyanchanghui.php?yanchanghuiid=<?php echo $id;?>" method="POST">
        <div class="control-group">
            <label class="laber_from">城市</label>
            <div  class="controls" ><INPUT name="cityname" type=text value="<?php echo $result[cityname];?>"><P class=help-block></P></div>
        </div>
        <DIV class="control-group">
            <LABEL class="laber_from">演唱会名</LABEL>
            <DIV  class="controls" ><INPUT name="yanchanghuiname" type=text value="<?php echo $result[huiming];?>"><P class=help-block></P></DIV>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from" >歌手</LABEL>
            <DIV  class="controls" ><INPUT name="singername" type=text value="<?php echo $result[singername];?>"><P class=help-block></P></DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >开始日期</LABEL>
            <DIV  class="controls" ><INPUT class="startdate" name="startdate" type=text value="<?php echo $result[startdate];?>" readonly="true"><P class=help-block></P></DIV>
			<div style="text-align:center;clear:both"></div>
		</DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">周几</LABEL>
            <DIV  class="controls" >
                <SELECT name="week_select" style="width:100px;height:30px;cursor:pointer;">
					<?php
						$week_array = array("周一","周=","周三","周四","周五","周六","周日");
						for($j=0;$j<count($week_array);$j++){
							if($result[area]==$week_array[$j]){
					?>	
                    <OPTION selected><?php echo $result[area];?></OPTION>
					<?php
								array_splice($week_array, $j, 1);
								break;
							}
						}
						for($j=0;$j<count($week_array);$j++){
					?>
                    <OPTION><?php echo $week_array[$j];?></OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >具体时间</LABEL>
            <DIV  class="controls" ><INPUT name="starttime" type=text value="<?php echo $result[starttime];?>"><P class=help-block></P></DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >地址</LABEL>
            <DIV  class="controls" ><INPUT name="address" type=text value="<?php echo $result[address];?>"><P class=help-block></P></DIV>
        </DIV>
		
		<DIV class="control-group">
            <LABEL class="laber_from">销售情况</LABEL>
            <DIV  class="controls" >
                <SELECT name="sale" style="width:100px;height:30px;cursor:pointer;">
					<?php
						if($result[sale]=="on"){
					?>
                    <OPTION selected><?php echo "正在销售";?></OPTION>
					<?php
						}
						else{
					?>
					<OPTION selected><?php echo "销售完毕";?></OPTION>
					<?php
						}
						if($result[sale]=="on"){
					?>
                    <OPTION>销售完毕</OPTION>
					<?php
						}
						else{
					?>
					<OPTION>正在销售</OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">推荐</LABEL>
            <DIV  class="controls" >
                <SELECT name="tuijian" style="width:100px;height:30px;cursor:pointer;">
                    <?php
						if($result[tuijian]=="1"){
					?>
                    <OPTION>推荐</OPTION>
					<?php
						}
						else{
					?>
					 <OPTION>不推荐</OPTION>
					<?php
						}
						if($result[tuijian]=="1"){
					?>
                    <OPTION>不推荐</OPTION>
					<?php
						}
						else{
					?>
					<OPTION>推荐</OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">演唱会类型</LABEL>
            <DIV  class="controls" >
                <SELECT name="yanchanghuitype" style="width:100px;height:30px;cursor:pointer;">
					<?php
						$type_array = array("liuxing","yaogun","yinyuejie","minzu","qita");
						for($j=0;$j<count($type_array);$j++){
							if($result[type]==$type_array[$j]){
								if($result[type]=="liuxing"){
									$result[type] = "流行";
								}
								else if($result[type]=="yaogun"){
									$result[type] = "摇滚";
								}
								else if($result[type]=="yinyuejie"){
									$result[type] = "音乐节";
								}
								else if($result[type]=="minzu"){
									$result[type] = "民族";
								}
								else{
									$result[type] = "其他";
								}
					?>
                    <OPTION selected><?php echo $result[type];?></OPTION>
					<?php
								array_splice($type_array, $j, 1);
								break;
							}
						}
						for($j=0;$j<count($type_array);$j++){
								if($type_array[$j]=="liuxing"){
									$type_array[$j]= "流行";
								}
								else if($type_array[$j]=="yaogun"){
									$type_array[$j] = "摇滚";
								}
								else if($type_array[$j]=="yinyuejie"){
									$type_array[$j] = "音乐节";
								}
								else if($type_array[$j]=="minzu"){
									$type_array[$j] = "民族";
								}
								else{
									$type_array[$j] = "其他";
								}
					?>
                    <OPTION><?php echo $type_array[$j];?></OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >介绍</LABEL>
            <DIV  class="controls" >
				<textarea id ="MyTextarea" name="MyTextarea"><?php echo $result[introduction];?></textarea>
			</DIV>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from" ></LABEL>
            <DIV class="controls" ><button class="btn btn-success" style="width:120px;" >确认</button></DIV>
        </DIV>
    </FORM>
	<div class="picshangchuan">
			<form name="frm" method="post" enctype="multipart/form-data" action="settouxiang.php">
					<font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|bmp|pjpeg|gif格式的图片</font><br/><br/>
						请选择图片：
						<input name='upfile' type='file'/>
						<input name="btn" type="submit" value="上传" /><br />
			</form>
			<img src="./images/yangchanghuiPic/nothing.jpg">
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
	}
?>
</body>
</html>