<?php
  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>销假页面</title>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="js/jquery-1.12.2.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

<!-- 时间输入控件 -->
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script src="http://api.map.baidu.com/api?v=1.5&amp;ak=您的密钥" type="text/javascript"></script>

</head>

<body>

<?php
	$student_ID = $_SESSION['username'];
	
	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");
	 
	$check_query="SELECT DataTime FROM leave_school WHERE student_ID = '$student_ID' and confirm = 'NO'";
	$check=$db->get_results("$check_query");
	$returntime="";
	if($check<=0)
	{
		$url = "inschool.php";  
		echo "<script language='javascript' 
			type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "</script>";
	}
	else{
		foreach($check as $temp){
		$returntime = $temp->DataTime;
		echo "<div>归校时间:".$returntime."</div>";
		global $returntime;
		}
	}
?>	
<br/>
<script type="text/javascript">

var myDate = new Date();
var y=myDate.getFullYear();
var m=myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
if(m<=9)
{
	m = "0"+m;
}
var d=myDate.getDate();        //获取当前日(1-31)
if(d<=9)
{
	d = "0"+d;
}
var h=myDate.getHours();       //获取当前小时数(0-23)
if(h<=9)
{
	h = "0"+h;
}
var min=myDate.getMinutes();     //获取当前分钟数(0-59)
if(min<=9)
{
	min = "0"+min;
}
var nowtime = y+"-"+m+"-"+d+" "+h+":"+min;

document.write("<div>当前时间:"+nowtime+"</div>");

</script>

<script>

var returntime = "<?php echo $returntime;?>";

if(nowtime<returntime)
{
	document.write("<p id='demo'>嗯。。我们先需要确认你在不在学校。</p><div id='button'>"
	+"<button onclick='getLocation()' id='button1'>点击这里</button></div>");
}
else
{
	$(document).ready(function(){
		alert("未在预定时间归来，请联系生活委员或者管理员！");
	});
}
var x=document.getElementById("demo");
var nowx,nowy;

function getLocation()
{
	if (navigator.geolocation)
    {
		x.innerHTML="定位中。。请稍后";
		navigator.geolocation.getCurrentPosition(showPosition,showError);
	}
	else
	{
		x.innerHTML="该浏览器不支持获取地理位置。";
	}
}

function showPosition(position)
  {
  nowx = position.coords.latitude;
  nowy = position.coords.longitude;
  document.getElementById("button").innerHTML="<button onclick='myFunction()'>好了，点我销假</button>";
 // alert(nowy);
  }

function showError(error)
  {
    switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="请打开浏览器的定位功能并刷新页面。"
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="嗯。。未能get到定位权限，换ie或者手机试试？"
      break;
    case error.TIMEOUT:
      x.innerHTML="请求超时错误。请刷新页面。"
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="发生未知错误。请联系管理员。"
      break;
    }
  }
function myFunction()
{

var schoolleft  = 116.283,
	schoolright = 116.300,
	schoolup    = 40.150,
	schooldown  = 40.160;
	
if(nowx&nowy)
  {
  if (schoolup<nowx&&nowx<schooldown&&schoolleft<nowy&&nowy<schoolright)
    {
		$.post("changeconfirm.php",
		{
			student_ID:"<?php echo $_SESSION['username'];?>",
		});
	alert("销假成功！");
	$(document).ready(function(){window.location.reload();})
    }
  else
    {
    alert("销假失败，你是不是不在学校？额。。请联系管理员");
    }
  }
else
{
	alert("获取地点失败");
}
}

</script>
<div id="change"></div>
</body>
</html>