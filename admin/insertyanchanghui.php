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
<div class="div_from_aoto" style="width:60%">
    <FORM action="saveyanchanghui.php" method="POST">
        <div class="control-group">
            <label class="laber_from">城市</label>
            <div  class="controls" ><INPUT name="cityname" type=text placeholder=" 请输入城市"><P class=help-block></P></div>
        </div>
        <DIV class="control-group">
            <LABEL class="laber_from">演唱会名</LABEL>
            <DIV  class="controls" ><INPUT name="yanchanghuiname" type=text placeholder=" 请输入演唱会名"><P class=help-block></P></DIV>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from" >歌手</LABEL>
            <DIV  class="controls" ><INPUT name="singername" type=text placeholder=" 请输入歌手"><P class=help-block></P></DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >开始日期</LABEL>
            <DIV  class="controls" ><INPUT class="startdate" name="startdate" type=text placeholder=" 请输入开始日期" readonly="true"><P class=help-block></P></DIV>
			<div style="text-align:center;clear:both"></div>
		</DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">周几</LABEL>
            <DIV  class="controls" >
                <SELECT name="week_select" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>周一</OPTION>
                    <OPTION>周=</OPTION>
                    <OPTION>周三</OPTION>
                    <OPTION>周四</OPTION>
					<OPTION>周五</OPTION>
					<OPTION>周六</OPTION>
					<OPTION>周日</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >具体时间</LABEL>
            <DIV  class="controls" ><INPUT name="starttime" type=text placeholder=" 12时制(格式：××:××am或pm)"><P class=help-block></P></DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >地址</LABEL>
            <DIV  class="controls" ><INPUT name="address" type=text placeholder=" 请输入地址"><P class=help-block></P></DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">销售情况</LABEL>
            <DIV  class="controls" >
                <SELECT name="sale" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>正在销售</OPTION>
                    <OPTION>销售完毕</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">推荐</LABEL>
            <DIV  class="controls" >
                <SELECT name="tuijian" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>推荐</OPTION>
                    <OPTION>不推荐</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">演唱会类型</LABEL>
            <DIV  class="controls" >
                <SELECT name="yanchanghuitype" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>流行</OPTION>
                    <OPTION>摇滚</OPTION>
					<OPTION>音乐节</OPTION>
					<OPTION>民族</OPTION>
					<OPTION>其他</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >介绍</LABEL>
            <DIV  class="controls" >
				<textarea id ="MyTextarea" name="MyTextarea"></textarea>
			</DIV>
            <div style="text-align:center;clear:both"></div>
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
</body>
</html>