
		function check_signin_input(form){
			if(form.name_login.value == ""||form.name_login.value == 'name_login'){
				alert("用户名不能为空");
				form.name_login.select();
				return(false);
			}
			if(form.password_login.value == ""||form.password_login.value =="password_login"){
				alert("密码不能为空");
				form.password_login.select();
				return(false);
			}
			return(true);
		}
		function check_register_input(form){
			if(form.name.value ==""||form.name.value =="Name"){
				alert("名字不能为空");
				form.name.select();
				return(false);
			}
			if(form.e-mail.value ==""||form.e-mail.value =="E-Mail"){
				alert("e-mail不能为空");
				form.e-mail.select();
				return(false);
			}
			if(form.password.value ==""||form.password.value =="password"){
				alert("密码不能为空");
				form.password.select();
				return(false);
			}
			if(form.password_again.value ==""||form.password_again.value =="password_again"){
				alert("密码不能为空");
				form.password_again.select();
				return(false);
			}
			if(form.password_again.value !=form.password.value){
				alert("密码不正确");
				form.password_again.select();
				return(false);
			}
			if(form.sex.value ==""||form.sex.value =="sex"){
				alert("性别不能为空");
				form.sex.select();
				return(false);
			}
			if(form.city.value ==""||form.city.value =="City"){
				alert("城市不能为空");
				form.city.select();
				return(false);
			} 
			if(form.code.value == ""||form.number.value == ""){
				alert("电话号码格式不正确");
				form.code.select();
				return(false);
			}
			return(true);
		}