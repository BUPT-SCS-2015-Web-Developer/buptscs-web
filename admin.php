<?php
	session_start();
	$student_ID = $_SESSION['username'];
	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");
	
	$check_query="SELECT * FROM `user` WHERE `user_type` = 'admin' AND user_ID='$student_ID'";
	$check=$db->get_results("$check_query");
	if($check<=0)
	{
		exit('illegal access!');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type='text/javascript' src='js/jquery-1.11.3.min.js'>
</script>
</head>
<body>

<script language="JavaScript"> 
javascript:window.history.forward(1); 
</script> 

<?php

	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");
	
	$check_query="SELECT * FROM `leave_school` WHERE confirm='No'";
	$check=$db->get_results("$check_query");
	if($check<=0)
	{
		echo "<script>";
		echo "document.write('目前无人请假');";
		echo "</script>";
	}
	else
	{
		foreach($check as $row)
		{
			echo $row->student_ID . "&emsp;" . $row->DataTime . "&emsp;" . $row->reason . "&emsp;";
			echo "<button id=\"".$row->student_ID."\">已归校</button>";
			echo "<script type='text/javascript'>      
			$(document).ready(function(){
				$(\"#".$row->student_ID."\").click(function(){
					$.post(\"changeconfirm.php\",
					{
						student_ID:\"".$row->student_ID."\",
					});
					$(document).ready(function(){window.location.reload();});
				})
			});
				";
			echo "</script><br /><br />";
		}
	}
?>
</body>
</html>