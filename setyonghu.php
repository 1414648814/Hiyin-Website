<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<title>hiyin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<?php
	include("top.php");
	include("conn/data_connect.php");
?>
<script language="JavaScript" type="text/javascript"> 
function avatar_success()
{
	alert("头像保存成功"); 
	location.href="./";
}
</script>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>用户信息</h3>
					    <form method="post" action="savechangeinfo.php">
							<?php
								include("conn/data_connect.php");
								$sql=mysql_query("select * from user where regname='".$_SESSION[username]."'",$conn);
								$info=mysql_fetch_array($sql);
							?>
					    	<div>
						    	<span><label>名字:</label></span>
						    	<span><input name="userName" value="<?php echo"$_SESSION[username]"?>" type="text" class="textbox" disabled="disabled"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL:</label></span>
						    	<span><input name="userEmail" value="<?php echo"$_SESSION[email]"?>" type="text" class="textbox" disabled="disabled"></span>
						    </div>
						    <div>
						     	<span><label>性别:</label></span>
						    	<span><input name="userSex" value="<?php echo $info[regsex];?>" type="text" class="textbox"></span>
						    </div>
							<div>
						     	<span><label>年龄:</label></span>
						    	<span><input name="userAge" value="<?php echo $info[regage];?>" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>签名:</label></span>
						    	<span><textarea name="userQianming"><?php echo $info[qianming];?></textarea></span>
						    </div>
						   <div>
						   		<button class="btn btn-8 btn-8c">Change</button>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="picshangchuan">
					<form name="frm" method="post" enctype="multipart/form-data" action="settouxiang.php">
						<font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|bmp|pjpeg|gif格式的图片</font><br/><br/>
						请选择图片：
						 <input name='upfile' type='file'/>
						 <input name="btn" type="submit" value="上传" /><br />
					</form>
					<?php
					
					$sql=mysql_query("select * from user where userid=".$_SESSION[userid].";",$conn);
					$info = mysql_fetch_array($sql);
					if($info[face]!="")
					{
					?>
					<img src="<?php echo $info[face];?>">";
					<?php
					}
					else{
					?>
					<img src="./images/sex/sex_man.png">
					<?php
					}
					?>
					
				</div>
			</div>
			<div class="clear"> </div>
		</div>
   		<div class="clear"></div>	
	</div>
</div>
</head>
</html>