<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
	include("top.php");
	include("conn/data_connect.php");
?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=F124daeb83be57c2dc8b627ca3f23bc4"></script>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<div class="main">
	<div class="wrap">
		<div class="about-grids">
			<div class="searcharea">
				<div class="searchbutton">
					<a href="#">城市搜索</a>
					<a href="#">场馆搜索</a>
					<a href="#">美食搜索</a>
					<a href="#">住宿搜索</a>
					<a href="#">景点搜索</a>
					<div id="sousuo">
						<select>
							<option value="0">步行搜索</option>
							<option value="1">公交搜索</option>
							<option value="2">驾车搜索</option>
						</select>
					</div>
					<div id="fangan">
						<select>
							<option value="0">最少时间</option>
							<option value="1">最短距离</option>
							<option value="2">避开高速</option>
						</select>
					</div>
				</div>
				<div class="searchchengshi">
					<form>
						<input type="text" id="cityName" value="请输入城市...." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入城市....';}"/><input type="submit" value="" onclick="theLocation()"/>
					</form>
				</div>
				<div class="searchchangguan">
					<form>
						<input type="text" id="changguan" value="请输入演唱会名称，艺人，场馆名称...." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入演唱会名称，艺人，场馆名称....';}"/><input type="submit" value="" onclick="changguanlocation()"/>
					</form>
				</div>
				<div class="searchstart">
					<form>
						<input type="text" id="searchstart" value="请输入起始位置...." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入起始位置....';}"/>
					</form>
				</div>
				<div class="searchend">
					<form>
						<input type="text" id="searchend" value="请输入结束位置...." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入结束位置....';}"/><input type="submit" value="" onclick="searchlujing()"/>
					</form>
				</div>
				
			</div>
			<div class="line1">
					<table>
						<tr>
							<td background="./images/changjing/xiantiao/line1.gif"></td>
						</tr>
					</table>
			</div>
			<div class="ditu">
				<div class="ditu_left">
					<?php
					mysql_query('SET NAMES UTF8');
					$sql = mysql_query("SELECT c.cityname as cityname, COUNT( * ) AS total
                        FROM yanchanghui AS y, city AS c
                        WHERE y.cityid = c.cityid
                        GROUP BY y.cityid
                        ORDER BY total DESC 
                        LIMIT 0 , 5",$conn); 
					?>
					<h3>热门城市：</h3>
					<span><?php 
					while($info = mysql_fetch_array($sql))
					{
					echo $info[cityname]."&nbsp&nbsp&nbsp&nbsp";
					}?>
					</span>
					<?php
					mysql_query('SET NAMES UTF8');
					$sql = mysql_query("select address,count(*) as total from yanchanghui group by address order by total desc limit 0,5;",$conn);
					?>
					<h3>热门场馆：</h3>
					<span><?php
						$sql = mysql_query("select address,count(*) as total from yanchanghui group by address order by total desc limit 0,5;",$conn);
						while($info = mysql_fetch_array($sql))
						{						
						echo $info[address]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
						} ?>
					</span>
				</div>
				<div class="line2">
					<table>
						<tr>
							<td background="./images/changjing/xiantiao/line2.gif"></td>
						</tr>
					</table>
				</div>
				<div class="ditu_right">
					<div id="map"></div> 
					<div id="r-result" style="display:none;"></div>
				</div>
			</div>
		</div>
	<div class="clear"></div>	
	</div>
</div>
<script type="text/javascript">  
	var map = new BMap.Map("map");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,11);
	map.enableScrollWheelZoom();
	map.enableDoubleClickZoom();
	
	function theLocation(){
		var city = document.getElementById("cityName").value;
		if(city != ""){
			map.centerAndZoom(city,12);      // 用城市名设置地图中心点
		}
	}
	function changguanlocation(){
		var changguan = document.getElementById("changguan").value;
		var local = new BMap.LocalSearch(map, {
		renderOptions:{map: map}
		});
		local.search(changguan);
	}
	
	function searchlujing(){
		var i=$("#sousuo select").val();
		var start = document.getElementById("searchstart").value;
		var end = document.getElementById("searchend").value;
		alert(i);
		if(i==0){
			var walking = new BMap.WalkingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			walking.search(start, end);
		}
		else if(i==1){
			var transit = new BMap.TransitRoute(map, {
			renderOptions: {map: map, panel: "r-result"}, 
			onResultsHtmlSet : function(){$("#r-result").show()}  	
			});
			transit.search(start,end);
		}
		else if(i==2){
			var routePolicy = [BMAP_DRIVING_POLICY_LEAST_TIME,BMAP_DRIVING_POLICY_LEAST_DISTANCE,BMAP_DRIVING_POLICY_AVOID_HIGHWAYS];
			map.clearOverlays(); 
			var i=$("#fangan select").val();
			search(start,end,routePolicy[i]); 
			function search(start,end,route){ 
				var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true},policy: route});
				driving.search(start,end);
			}
		}
	}
	
</script>
<?php
	include("bottom.php");
?>