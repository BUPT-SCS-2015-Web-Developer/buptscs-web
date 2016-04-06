<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit('非法进入!');
	}
?>

<?php

//判断用户是否提交登录表单，如果是则执行如下代码   
    $student_ID = $_SESSION['username'];    
    $DataTime = addslashes($_POST['time']);
	$reason = addslashes($_POST['reason']);
	
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

    if($perm){

  	    $select_query = "SELECT student_name FROM student WHERE student_ID = '$student_ID'";
  	    $name = $db->get_var("$select_query");

        $insert_query = "INSERT INTO leave_school(leave_ID,student_ID,name,DataTime,reason,confirm) VALUES('null','$student_ID','$name','$DataTime','$reason','No')";
        $insert_result = $db->query($insert_query);

	    if($insert_result){
             echo json_encode(array('insert'=>'请假成功~'));
    	}
    	else{
         	 echo json_encode(array('insert'=>'人生好失败！请假也失败0.0'));
    	}
    }
    else{
    	echo json_encode(array('insert'=>'有未销假情况，不能请假！'));
    }
?>

