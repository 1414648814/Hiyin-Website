<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/data_connect.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hiyin后台管理</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
<script language="JavaScript" type="text/javascript"> 
</script>
</head>
<body>
<?php
	$checkboxid = $_GET[checkboxid];
	$singer_array = explode(",",$checkboxid);
	$num = count($singer_array);
	mysql_query('SET NAMES UTF8');
	for($i=0;$i<$num-1;$i++)
	{
		$id = (int)$singer_array[$i];
		//echo "<script language='javascript'>alert($id);</script>";
		$sql=mysql_query("select * from singer where id=$id;",$conn);
		$result = mysql_fetch_array($sql);
?>
<h2><?php echo $result[singername];?></h2>
<div class="div_from_aoto" style="width: 500px;">
    <FORM action="changesinger.php?singerid=<?php echo $id;?>" method="post">
        <DIV class="control-group">
            <label class="laber_from">歌手名字</label>
            <DIV  class="controls" ><INPUT name="singername" type=text value="<?php echo $result[singername];?>"><P class=help-block></P></DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from">歌手性别</LABEL>
            <DIV  class="controls" >
                <SELECT name="singersex" style="width:100px;height:30px;cursor:pointer;">
					<?php
						$xingbie_array = array("men","women","menandwomen");
						for($j=0;$j<count($xingbie_array);$j++){
							if($result[sex]==$xingbie_array[$j]){
								if($result[sex]=="men"){
									$result[sex] = "男";
								}
								else if($result[sex]=="women"){
									$result[sex] = "女";
								}
								else{
									$result[sex] = "组合";
								}
					?>	
						<OPTION selected><?php echo $result[sex];?></OPTION>
					<?php
								array_splice($xingbie_array, $j, 1); 
							}
						}
						for($j=0;$j<count($xingbie_array);$j++){
								if($xingbie_array[$j]=="men"){
									$xingbie_array[$j] = "男";
								}
								else if($xingbie_array[$j]=="women"){
									$xingbie_array[$j] = "女";
								}
								else{
									$xingbie_array[$j] = "组合";
								}
					?>
                    <OPTION><?php echo $xingbie_array[$j];?></OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">所属地区</LABEL>
            <DIV  class="controls" >
                <SELECT name="singerarea" style="width:100px;height:30px;cursor:pointer;">
                    <?php
						$area_array = array("dalu","gangtai","rihan","oumei");
						for($j=0;$j<count($area_array);$j++){
							if($result[area]==$area_array[$j]){
								if($result[area]=="dalu"){
									$result[area] = "中国大陆";
								}
								else if($result[area]=="gangtai"){
									$result[area] = "香港台湾";
								}
								else if($result[area]=="rihan"){
									$result[area] = "韩国日本";
								}
								else{
									$result[area] = "欧洲美国";
								}
					?>	
						<OPTION selected><?php echo $result[area];?></OPTION>
					<?php
								array_splice($area_array, $j, 1); 
							}
						}
						for($j=0;$j<count($area_array);$j++){
								if($area_array[$j]=="dalu"){
									$area_array[$j]= "中国大陆";
								}
								else if($area_array[$j]=="gangtai"){
									$area_array[$j] = "香港台湾";
								}
								else if($area_array[$j]=="rihan"){
									$area_array[$j] = "韩国日本";
								}
								else{
									$area_array[$j] = "欧洲美国";
								}
					?>
                    <OPTION><?php echo $area_array[$j];?></OPTION>
					<?php
						}
					?>
                </SELECT>
            </DIV>
        </DIV>
        <DIV class="control-group">
            <LABEL class="laber_from">组合</LABEL>
            <DIV  class="controls" >
                <SELECT name="singerzuhe" style="width:100px;height:30px;cursor:pointer;">
                    <OPTION selected><?php if($result[zuhe]=="zuhe"){echo "组合";}else{echo "单人";}?></OPTION>
                    <OPTION><?php if($result[zuhe]=="zuhe"){echo "单人";}else{echo "组合";}?></OPTION>
                </SELECT>
            </DIV>
        </DIV>
		<DIV class="control-group">
            <LABEL class="laber_from" >剩下演唱会数目</LABEL>
            <DIV  class="controls" ><INPUT name="singernum" type=text value="<?php echo $result[num];?>"><P class=help-block></P></DIV>
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