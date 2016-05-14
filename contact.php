<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>
<title>hiyin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
	include("top.php");
?>
<script>
	function check_input(form){
		if(form.userName.value == ""){
				alert("请先登录!");
				form.name_login.select();
				return(false);
			}
			if(form.userEmail.value == ""){
				alert("邮箱不能为空");
				form.userEmail.select();
				return(false);
			}
			if(form.userPhone.value == ""){
				alert("手机号码不能为空");
				form.userPhone.select();
				return(false);
			}
			if(form.userMsg.value == ""){
				alert("内容不能为空不能为空");
				form.userMsg.select();
				return(false);
			}
		return(true);
	}
</script>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form method="post" action="savecontactus.php" onSubmit="return check_input(form)">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input name="userName" type="text" class="textbox" disabled="disabled" value="<?php if($_SESSION["username"]!=""||$_SESSION["username"]!="root")
								{echo $_SESSION["username"];}?>"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<button class="btn btn-8 btn-8c">Submit</button>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>
					    	  <div class="map">
							   	    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
							  </div>
      				</div>
					<div class="company_address">
							<h3>Company Information :</h3>
							<p>Phone:(00) 222 666 444</p>
							<p>Fax: (000) 000 00 00 0</p>
							<p>Email: <span>info@mycompany.com</span></p>
							<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
					</div>
				</div>
			  </div>
			  <div class="clear"> </div>
		</div>
   		<div class="clear"></div>	
	</div>
  </div>
<?php
	include("bottom.php");
?>
