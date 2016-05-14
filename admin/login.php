<?php
header ( "Content-type: text/html; charset=utf-8" ); //璁剧疆鏂囦欢缂栫爜鏍煎紡
?>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<title>后台登陆</title>
	<script>
		function check_signin_input(form){
			if(form.username.value == ""){
				alert("用户名不能为空");
				form.username.select();
				return(false);
			}
			if(form.pwd.value == ""){
				alert("密码不能为空");
				form.pwd.select();
				return(false);
			}
			return(true);
		}
	</script>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			欢迎到hiyin的后台管理
		</div>
		<div id="back">
			<a href="#">返回首页</a>&nbsp;&nbsp; | &nbsp;&nbsp;
			<a href="#">帮助</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
				<form method="post" action="save_signin.php" onSubmit="return check_signin_input(this)">
					<div id="login_tip">
						用户登录
					</div>
					<div><input type="text" class="username" name="username"></div>
					<div><input type="password" class="pwd" name="pwd"></div>
					<div id="btn_area">
						<input type="submit" name="submit" id="sub_btn" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" class="verify">
						<img src="images/login/verify.png" alt="" width="80" height="40">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		版权归hiyin所有
	</div>
</body>
</html>