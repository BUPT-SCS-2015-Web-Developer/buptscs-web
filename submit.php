<?php
	session_start();

	if(!isset($_SESSION['username'])){
	  exit('illegal access!');
     }

    $username = $_SESSION['username'];

	include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $pb_database, $db_host);
    $db->query("set names 'utf8'");

	$id=$_GET['id'];
    $sub_time=time()-3600;//假设一套题不超过60min？？
    
    $update_query="UPDATE AllScores$id SET start_time = '$sub_time' WHERE student_ID = '$username'";
    $update_result = $db->query($update_query);


	$home_url = "dati.php?id=".$id;
    header('Location:'.$home_url);
	
?>