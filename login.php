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
<script src="./js/check_input.js"></script>
<?php
	include("top.php");
?>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="login_panel">
        	<h3>存在账户吗</h3>
        	<p>填写表单登录.</p>
				<form name="form1" method="post" id="member" action="save_signin.php" onSubmit="return check_signin_input(this)">
                	<input type="text" name="name_login" value="账号" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号';}">
                    <input type="password" name="password_login" value="" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
					<p class="note">如果你忘记密码，请点击这里找回你的密码<a href="#">找回密码</a></p>
                   <div class="search"><div><button class="grey">登录</button></div></div>
				</form>
           </div>
           <div class="register_account">
    		<h3>注册一个账户</h3>
    		<form name = "form2" method="post" action="save_regitation.php" onSubmit="return check_register_input(this)">
				<table>
		   			<tbody>
						<tr>
						<td>
							<div><input type="text" name="name" value="名字" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '名字';}"></div>
							<div><input type="text" name="e-mail" value="E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}"></div>
							<div><input type="text" name="password" value="密码" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '密码';}"></div>
							<div><input type="text" name="password_again" value="再次输入密码" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '再次输入密码';}"></div>
							<div><input type="text" name="sex" value="性别" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '性别';}"></div>
		    			 </td>
		    			<td>
		    			<div>
							<div><input type="text" name="age" value="年龄" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '年龄';}"></div>
							<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
								<option value="null">选择一个省</option>         
								<option value="AX">Åland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua And Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
							</select>
						</div>		        
						<div><input type="text" name="city" value="城市" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '城市';}"></div>
						<div>
							<input type="text" name="code" value="" class="code"> - <input type="text" name="number" value="" class="number">
								<p>区号 + 电话号码</p>
						</div>
						</td>
						</tr> 
					</tbody>
				</table> 
			<div class="search"><div><button class="grey">创建一个账号</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>
			  <div class="clear"> </div>
		</div>
   		<div class="clear"></div>	
	</div>
  </div>
<?php
	include("bottom.php");
?>