<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit('illegal access!');
	}
?>

<?php

	  $student_ID = $_SESSION['username'];
    $introduce = addslashes($_POST['introduce']);

  	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");

  	
    $insert_query = "INSERT INTO introduce(introduce_ID,student_ID,introduce) VALUES('null','$student_ID','$introduce')";
    $insert_result = $db->query($insert_query);

    if($insert_result){
         echo json_encode(array('insert'=>'sucess'));
    }
    else{
         echo json_encode(array('insert'=>'fail'));
    }
?>