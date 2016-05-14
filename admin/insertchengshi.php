<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台模板</title>

<script type="text/javascript" src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/add.css" type="text/css" media="screen" />
<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
</head>
<body>


<div class="div_from_aoto" style="width: 500px;">
    <form action="savechengshi.php" method="POST">
		<!--实现城市的选择-->
		<div class="control-group">
			<LABEL class="laber_from" >城市名</LABEL>
			<div  class="controls" >
				<input type="text" value="" size="15" id="homecity_name" name="homecity_name" mod="address|notice" mod_address_source="hotel" mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@" mod_address_reference="cityid" mod_notice_tip="中文/拼音" />
				<input id="cityid" name="cityid" type="hidden" value="{$cityid}" />
			</div>
		</div>
		<div id="jsContainer" class="jsContainer" style="height:0">
			<div id="tuna_alert" style="display:none;position:absolute;z-index:999;overflow:hidden;"></div>
			<div id="tuna_jmpinfo" style="visibility:hidden;position:absolute;z-index:120;"></div>
		</div>
		<script type="text/javascript" src="js/fixdiv.js"></script>
		<script type="text/javascript" src="js/address.js"></script>
		
        <div class="control-group">
            <LABEL class="laber_from">城市区域</LABEL>
            <div  class="controls">
                <SELECT name="input_select" style="width:100px;height:30px;cursor:pointer;">
                    <option selected>华北东北</option>
                    <option>华东地区</option>
                    <option>中西地区</option>
                    <option>华南地区</option>
                </SELECT>
            </div>
        </div>
		<div class="control-group">
            <LABEL class="laber_from" >演唱会场数</LABEL>
            <div  class="controls"><input type=text name="input_from" placeholder="0"><P class=help-block></P></div>
        </div>
		
        <div class="control-group">
            <LABEL class="laber_from" ></LABEL>
            <div class="controls" ><button class="btn btn-success" style="width:120px;" >确认</button></div>
        </div>
    </form>
</div>
</body>
</html>