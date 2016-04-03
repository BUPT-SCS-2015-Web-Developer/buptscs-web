<?php
  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>请假界面</title>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="js/jquery-1.11.3.min.js" charset="UTF-8"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

<!-- 时间输入控件 -->
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script language="JavaScript"> 
	javascript:window.history.forward(1); 
</script> 

</head>
<body>


<?php
    $student_ID = $_SESSION['username'];
	
	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");

    $check_query="SELECT confirm FROM leave_school WHERE student_ID = '$student_ID'";
    $check=$db->get_results("$check_query");

    $perm=1;
    if(!empty($check) >= 1)
    {
    foreach($check as $temp){
    	if($temp->confirm == 'No'){
            global $perm;
    		$perm=0;
    		break;
    	}
    }
    }
	if(!$perm)
	{
		echo "<script language='javascript'>document.location = 'outschool.php';</script>";
	}
?>

<form method="post" action="askforleave.php"> 
	<div align="left" class="div controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd hh:00" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:00">
          <p>&nbsp回校时间：</p>
          <input  class="textname" type="text" value="" id ='time' name='time' readonly>
          <span class="add-on"><i class="icon-th"></i></span>
    </div>
	<br/><br/>
	原因：
	<br/>
	<textarea name="reason" cols="65" rows="13"></textarea>
	<br/>
	<input type="submit" name="submit" value="提交"> 
</form>

	<script type="text/javascript">
		$('.form_date').datetimepicker
		({
			language:  'zh',
			weekStart: 1,
			todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 1,
		forceParse: 0
		});
	</script>
</body>
</html>