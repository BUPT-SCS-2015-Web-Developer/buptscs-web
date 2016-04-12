<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>

<?php
    $student_ID = addslashes($_POST['student_ID']);
		
	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";
	
	$db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
	$db->query("set names 'utf8'");

	if($student_ID=="all")
	{
		$check_query="SELECT * FROM `leave_school` WHERE confirm='No'";
		$check=$db->get_results("$check_query");
		
		foreach($check as $temp)
		{
			mysql_query("UPDATE `scs`.`leave_school` SET `confirm` = 'Yes'");
		}
	}
	else
	{
		mysql_query("UPDATE `scs`.`leave_school` SET `confirm` = 'Yes' WHERE student_ID = '$student_ID'");
		mysql_close($con);
	}
?>
</html>