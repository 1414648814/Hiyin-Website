<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hiyin后台管理</title>

<script type="text/javascript" src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
<script language="JavaScript" type="text/javascript"> 
function avatar_success()
{
	alert("头像保存成功"); 
	location.href="./";
}
</script>
</head>
<body>
<div class="div_from_aoto" style="width: 500px;">
    <FORM action="savesinger.php" method="post">
        <DIV class="control-group">
            <label class="laber_from">歌手名字</label>
            <DIV  class="controls" ><INPUT name="singername" type=text placeholder=" 请输入歌手名字"><P class=help-block></P></DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">歌手性别</LABEL>
            <DIV  class="controls" >
                <SELECT name="singersex" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>男</OPTION>
                    <OPTION>女</OPTION>
                    <OPTION>组合</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">所属地区</LABEL>
            <DIV  class="controls" >
                <SELECT name="singerarea" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>中国大陆</OPTION>
					<OPTION>香港台湾 </OPTION>
					<OPTION>韩国日本</OPTION>
					<OPTION>欧洲美国</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">组合</LABEL>
            <DIV  class="controls" >
                <SELECT name="singerzuhe" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected>组合</OPTION>
                    <OPTION>单人</OPTION>
                </SELECT>
            </DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >剩下演唱会数目</LABEL>
            <DIV  class="controls" ><INPUT name="singernum" type=text placeholder="0"><P class=help-block></P></DIV>
            <div style="text-align:center;clear:both"></div>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from" ></LABEL>
            <DIV class="controls" ><button class="btn btn-success" style="width:120px;" >确认</button></DIV>
        </DIV>
    </FORM>
	<div class="picshangchuan">
		<form name="frm" method="post" enctype="multipart/form-data" action="savetouxiang.php">
				<font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|bmp|pjpeg|gif格式的图片</font><br/><br/>
					请选择图片：
					<input name='upfile' type='file'/>
					<input name="btn" type="submit" value="上传" /><br />
		</form>
		<img src="./images/singer/nothing.jpg">
	</div>
</div>
</body>
</html>