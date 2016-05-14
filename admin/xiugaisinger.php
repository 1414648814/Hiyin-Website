<?php
	include("conn/data_connect.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hiyin后台管理</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/xiugaisinger2.css" type="text/css"/>

<script type="text/javascript" language="javascript">
	function gehang(){
    //获取tr节点
		var tr=document.getElementsByTagName("th");
    }
    //创建全选反选函数
    function xuan(type){
        //获取name值
        var qcheck=document.getElementsByName("checkbox[]");
        //获取选的按钮
		if(type=="qx"){
			for(var i=0;i<=qcheck.length;i++){
				qcheck[i].checked=true;
			}
		}
        if(type=="qxx"){
			for(var i=0;i<=qcheck.length;i++){
				if(qcheck[i].checked){
					qcheck[i].checked=false;
				}
				else{
					qcheck[i].checked=true;
				}
			}
        }
    }
	function yincang(){
        var input=document.getElementsByName("checkbox[]");
        for(var i=input.length-1; i>=0;i--){
            if(input[i].checked==true){
				//获取td节点
				var td=input[i].parentNode;
				//获取tr节点
				var tr=td.parentNode;
				//获取table
				var table=tr.parentNode;
				//移除子节点
				table.removeChild(tr);
            }
               
        }
    }
	
</script>
<Script Language="JavaScript"> 
	function bianji() 
    {
		var input=document.getElementsByName("checkbox[]");
		var tableId = document.getElementById("rounded-corner"); 
		var str="";
		var num = 0;
		var insert = false;
		for(var i=0; i<=input.length-1;i++){
			if(input[i].checked==true){
				str+=tableId.rows[i+1].cells[1].innerHTML+",";
				num++;
			}
			else{
				
			}
		}
		if(num==0){
			alert("请先选择歌手!");
		}
		else{
			document.form1.action="insertsingermore.php?checkboxid="+str; 
			document.form1.submit(); 
		}
    }
    function del() 
    {
		alert('bianji');
		document.form1.action="delete.jsp"; 
		document.form1.submit(); 
    }
</Script> 
</head>
<body onload="gehang()">
	
	<div class="div_from_aoto" style="width:90%;">
		<form name="form1" method="post" action="">
		<table id="rounded-corner">
			<thead>
				<tr>
					<th></th>
					<th>序号</th>
					<th>名字</th>
					<th>性别</th>
					<th>地区</th>
					<th>组合</th>
					<th>演唱会剩下次数</th>
					<th>图片地址</th>
					<th>编辑</th>
					<th>删除</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="12">歌手的相关信息（可进行修改并删除）.</td>
				</tr>
			</tfoot>
			<?php
				mysql_query('SET NAMES UTF8');
				$sql1 = mysql_query("select * from singer;",$conn);
				$i=1;
			?>
			<tbody>
				<?php
				while($info1 = mysql_fetch_array($sql1)){
					
					if($info1[sex]=="men"){
						$info1[sex]="男";
					}
					else if($info1[sex]=="women"){
						$info1[sex]="女";
					}
					else{
						$info1[sex]="组合";
					}
					if($info1[area]=="dalu"){
						$info1[area]="中国大陆";
					}
					else if($info1[area]=="gangtai"){
						$info1[area]="香港台湾";
					}
					else if($info1[area]=="rihan"){
						$info1[area]="韩国日本";
					}
					else{
						$info1[area]="欧洲美国";
					}
					if($info1[zuhe]=="zuhe"){
						$info1[zuhe]="组合";
					}
					else{
						$info1[zuhe]="单人";
					}
					if($i%2==0){
				?>
					<tr class="odd">
						<td><input type="checkbox" name="checkbox[]" /></td>
						<td><?php echo $info1[id];?></td>
						<td><?php echo $info1[singername];?></td>
						<td><?php echo $info1[sex];?></td>
						<td><?php echo $info1[area];?></td>
						<td><?php echo $info1[zuhe];?></td>
						<td><?php echo $info1[num];?></td>
						<td><?php echo $info1[pic];?></td>
						<td><a href="insertsingermore.php?checkboxid=<?php echo $info1[id].",";?>"><img src="images/changjing/tubiao/edit.png" alt="" title="" border="0" /></a></td>
						<td><a href="#"><img src="images/changjing/tubiao/trash.gif" alt="" title="" border="0" /></a></td>
					</tr>
				<?php
					}
					else{
				?>
					<tr class="even">
						<td><input type="checkbox" name="checkbox[]" /></td>
						<td><?php echo $info1[id];?></td>
						<td><?php echo $info1[singername];?></td>
						<td><?php echo $info1[sex];?></td>
						<td><?php echo $info1[area];?></td>
						<td><?php echo $info1[zuhe];?></td>
						<td><?php echo $info1[num];?></td>
						<td><?php echo $info1[pic];?></td>
						<td><a href="insertsingermore.php?checkboxid=<?php echo $info1[id].",";?>"><img src="images/changjing/tubiao/edit.png" alt="" title="" border="0" /></a></td>
						<td><a href="#"><img src="images/changjing/tubiao/trash.gif" alt="" title="" border="0" /></a></td>
					</tr>
				<?php
					}
					$i++;
				}
				?>
			</tbody>
			<div class="form_sub_buttons">
				<input class="button green"  type="submit" value="编辑" style="width: 100px" onclick="bianji()"/>
				<input class="button red"  type="submit" value="删除" style="width: 100px" onclick="del()"/>
			</div>
		</table>
		</form>
		<div class="form_sub_buttons">
			<a href="#" class="button green" id = "qx" onclick="xuan('qx')">全选</a>
			<a href="#" class="button red" id="qxx" onclick="xuan('qxx')">全部不选</a>
			<a href="#" class="button green" id="del" onclick="yincang()">隐藏</a>
		</div>
	</div>
</body>
</html>