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
			alert("请先选择演唱会!");
		}
		else{
			document.form1.action="insertyanchanghuimore.php?checkboxid="+str; 
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
	
	<div class="div_from_aoto" style="width:95%;">
		<form name="form1" method="post" action="">
		<table id="rounded-corner">
			<thead>
				<tr>
					<th></th>
					<th>序号</th>
					<th>城市</th>
					<th>演唱会名</th>
					<th>歌手</th>
					<th>具体时间</th>
					<th>添加时间</th>
					<th>地址</th>
					<th>介绍</th>
					<th>销售情况</th>
					<th>推荐</th>
					<th>留言数目</th>
					<th>类型</th>
					<th>编辑</th>
					<th>删除</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="12">演唱会的相关信息（可进行修改并删除）.</td>
				</tr>
			</tfoot>
			<?php
				mysql_query('SET NAMES UTF8');
				$sql1 = mysql_query("select s.singername,c.cityname,y.* from yanchanghui as y,singer as s,city as c where y.singerid=s.id and y.cityid = c.cityid;",$conn);
				$i=1;
			?>
			<tbody>
				<?php
				while($info1 = mysql_fetch_array($sql1)){
					
					if($info1[type]=="liuxing"){
						$info1[type] = "流行";
					}
					else if($info1[type]=="yaogun"){
						$info1[type] = "摇滚";
					}
					else if($info1[type]=="yinyuejie"){
						$info1[type] = "音乐节";
					}
					else if($info1[type]=="minzu"){
						$info1[type] = "民族";
					}
					else{
						$info1[type] = "其他";
					}
					if($i%2==0){
				?>
					<tr class="odd">
						<td><input type="checkbox" name="checkbox[]" /></td>
						<td><?php echo $info1[id];?></td>
						<td><?php echo $info1[cityname];?></td>
						<td><?php echo $info1[huiming];?></td>
						<td><?php echo $info1[singername];?></td>
						<td><?php echo $info1[startdate].$info1[startweek].$info1[starttime];?></td>
						<td><?php echo $info1[addtime];?></td>
						<td><?php echo $info1[address];?></td>
						<td><?php echo substr($info1[introduction],0,10)."...";?></td>
						<td><?php echo $info1[sale];?></td>
						<td><?php echo $info1[tuijian];?></td>
						<td><?php echo $info1[count_leaveword];?></td>
						<td><?php echo $info1[type];?></td>
						<td><a href="insertyanchanghuimore.php?checkboxid=<?php echo $info1[id].",";?>"><img src="images/changjing/tubiao/edit.png" alt="" title="" border="0" /></a></td>
						<td><a href="#"><img src="images/changjing/tubiao/trash.gif" alt="" title="" border="0" /></a></td>
					</tr>
				<?php
					}
					else{
				?>
					<tr class="even">
						<td><input type="checkbox" name="checkbox[]" /></td>
						<td><?php echo $info1[id];?></td>
						<td><?php echo $info1[cityname];?></td>
						<td><?php echo $info1[huiming];?></td>
						<td><?php echo $info1[singername];?></td>
						<td><?php echo $info1[startdate].$info1[startweek].$info1[starttime];?></td>
						<td><?php echo $info1[addtime];?></td>
						<td><?php echo $info1[address];?></td>
						<td><?php echo substr($info1[introduction],0,10)."...";?></td>
						<td><?php echo $info1[sale];?></td>
						<td><?php echo $info1[tuijian];?></td>
						<td><?php echo $info1[count_leaveword];?></td>
						<td><?php echo $info1[type];?></td>
						<td><a href="insertyanchanghuimore.php?checkboxid=<?php echo $info1[id].",";?>"><img src="images/changjing/tubiao/edit.png" alt="" title="" border="0" /></a></td>
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