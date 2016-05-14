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
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
					<?php
						$groupid = $_GET[groupid];
					?>
				  	<h3>发布话题</h3>
					    <form method="post" action='fabuhuati.php?groupid=<?php echo $groupid;?>&topicid=newtopic'>
							<div>
						     	<span><label>话题:</label></span>
						    	<span><input name="huatiname" value="#话题名称#" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '#话题名称#....';}" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><textarea name="huatineirong" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '话题内容....';}"><?php echo $info[qianming];?></textarea></span>
						    </div>
							<div>
						   		<button class="btn btn-8 btn-8c">Change</button>
							</div>
					    </form>
				  </div>
  				</div>
			</div>
			<div class="clear"> </div>
		</div>
   		<div class="clear"></div>	
	</div>
</div>
</head>
</html>