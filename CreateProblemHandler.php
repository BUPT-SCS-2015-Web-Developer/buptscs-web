<?php

  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }


  $username = $_SESSION['username'];

  include_once "lib/shared/ez_sql_core.php";
  include_once "lib/mysql/ez_sql_mysql.php";
  include_once "db_config.php";
  
  $db = new ezSQL_mysql($qs_user, $qs_password, $qs_database, $db_host);//这里应该怎么写啊啊啊
  $db->query("set names 'utf8'");
  
  
  
  
$conn = mysql_connect();
mysql_select_db( 'problem', $conn );
  $ID = uniqid();
  $TestTitle = $_POST['TestTitle'];
  $CreateUser = $username;
  $LimitTime = $_POST['LimitTime'];
  $sql = "INSERT INTO `problem`.`information` (`ID`, `TestTitle`, `CreateUser`, `LimitTime`) 
                VALUES ('$ID', '$TestTitle', '$CreateUser', '$LimitTime')";
  $result = mysql_query($sql,$conn);
	if ($result){
		echo "<script>alert('添加信息成功');</script>";
	}


$sql = "CREATE TABLE competition$ID( ".
       "problem_ID int NOT NULL AUTO_INCREMENT, ".
       "competition varchar(1000), ".
       "option1 varchar(100), ".
	   "option2 varchar(100),".
	   "option3 varchar(100), ".
	   "option4 varchar(100),".          
       "answer varchar(5), ".
	   "score int(5), ".
	   "destination varchar(1000)); ";
$result = mysql_query($sql,$conn);
	if ($result){
		echo "<script>alert('创建题目信息表成功');</script>";
	}


$sql = "CREATE TABLE answer$ID( ".
       "student_ID varchar(15), ".
       "question_ID int, ".
       "answer varchar(15)); ";
$result = mysql_query($sql,$conn);
	if ($result){
		echo "<script>alert('创建学生答案表成功');</script>";
	}


$sql = "CREATE TABLE allscores$ID( ".
       "score int, ".
       "student_ID varchar(15), ".
       "use_time int, ".
	   "start_time  bigint(20),".
       "submit_time date); ";
$result = mysql_query($sql,$conn);
	if ($result){
		echo "<script>alert('创建分数表成功');</script>";
	}

		
			
    $problem = $_POST['problems'];
  
    for ($i=1; $i < count($problem); $i++) { 
		$competition = $problem[$i]['competition'];
		$option1 = $problem[$i]['option1'];
		$option2 = $problem[$i]['option2'];
		$option3 = $problem[$i]['option3'];
		$option4 = $problem[$i]['option4'];
		$answer = $problem[$i]['answer'];
		$score = $problem[$i]['score'];
		$destination = $problem[$i]['destination'];
		$sql = "INSERT INTO `problem`.`competition` (`competition`, `option1`, `option2`, `option3`, `option4`, `answer`, `score`, `destination`) 
                VALUES ('$competition', '$option1', '$option2', '$option3', '$option4', '$answer', '$score', '$destination')";
		$result = mysql_query($sql,$conn);
		if ($result){
			echo "<script>alert('题目信息添加成功');</script>";
		} 
	}
	
    mysql_close($conn);
    echo json_encode("Sucseeded!");
?>