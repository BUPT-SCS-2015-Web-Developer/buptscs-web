<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit('illegal access!');
	}
?>

<?php
    $student_ID = $_SESSION['username'];
    $DataTime = addslashes($_POST['time']);
	$reason = addslashes($_POST['reason']);
	if($DataTime==""||$reason=="")
	{
		echo "<script> alert('请填写完整信息！');</script>";
		echo "<script language='javascript'>document.location = 'inschool.php';</script>";
		die;
	}
	else{
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
				global $temp;
				global $perm;
				$perm=0;
				break;
			}
		}
		}
		
		if($perm){

			$select_query = "SELECT student_name FROM student WHERE student_ID = '$student_ID'";
			$name = $db->get_var("$select_query");

			$insert_query = "INSERT INTO leave_school(leave_ID,student_ID,DataTime,reason,confirm) VALUES('null','$student_ID','$DataTime','$reason','No')";
			$insert_result = $db->query($insert_query);

			if($insert_result){
				echo "<script language='javascript'>alert('请假成功！'+</br>+'请尽早销假!');</script>";
				echo "<script language='javascript'>document.location = 'outschool.php';</script>";
			}
			else{
				echo "<script language='javascript'>alert('请假失败，请联系管理员！');</script>";
				echo "<script language='javascript'>document.location = 'inschool.php';</script>";

			}
		}
		else
		{
			echo "<script language='javascript'>alert('您有未销假信息！');</script>";
			echo "<script language='javascript'>document.location = 'outschool.php';</script>";
		}
	}
?>
</html>