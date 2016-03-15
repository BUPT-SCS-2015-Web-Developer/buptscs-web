<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit('illegal access!');
	}
?>

<?php

	$student_ID = $_SESSION['username'];
    $buiding = addslashes($_POST['building']);
    $room=addslashes($_POST['room']);
    $phone=addslashes($_POST['phone']);
    $Email=addslashes($_POST['Email']);
    $bank=addslashes($_POST['bank']);
    $QQ=addslashes($_POST['QQ']);
    $H_address=addslashes($_POST['H_address']);
    $high=addslashes($_POST['height']);
    $weight=addslashes($_POST['weight']);
    $shoes=addslashes($_POST['shoes']);
    $station=addslashes($_POST['station']);
    $H_phone=addslashes($_POST['H_phone']);
    $father=addslashes($_POST['father']);
    $F_phone=addslashes($_POST['F_phone']);
    $F_work=addslashes($_POST['F_work']);
    $mother=addslashes($_POST['mother']);
    $M_phone=addslashes($_POST['M_phone']);
    $M_work=addslashes($_POST['M_work']);
    $contact=addslashes($_POST['contact']);
    $C_phone=addslashes($_POST['C_phone']);
    $C_address=addslashes($_POST['C_work']);
    $apply=addslashes($_POST['apply']);

  	include_once "lib/shared/ez_sql_core.php";
  	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  	$db->query("set names 'utf8'");

  	$delete_query = "DELETE FROM massage WHERE student_ID = '$student_ID'";
  	$user = $db->get_row("$delete_query");

    $insert_query = "INSERT INTO massage(student_ID,buiding,room,phone,bank,Email,QQ,high,weight,shoes,station,father,F_work,F_phone,mother,M_work,M_phone,H_phone,H_address,contact,C_phone,C_address,apply) 
    VALUES('$student_ID','$buiding','$room','$phone','$bank','$Email','$QQ','$high','$weight','$shoes','$station','$father','$F_work','$F_phone','$mother','$M_work','$M_phone','$H_phone','$H_address','$contact','$C_phone','$C_address','$apply')";
    $insert_result = $db->query($insert_query);

    if($insert_result){
         echo json_encode(array('insert'=>'sucess'));
    }
    else{
         echo json_encode(array('insert'=>'fail'));
    }
?>