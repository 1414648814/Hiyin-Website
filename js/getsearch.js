function getsearch(form){
	if(form.search_neirong.value==""||form.search_neirong.value=="请输入演唱会名称，艺人，场馆名称...."){
		alert("搜索内容不能为空");
		form.search_neirong.select();
		return(false);
	}
	return(true);
}