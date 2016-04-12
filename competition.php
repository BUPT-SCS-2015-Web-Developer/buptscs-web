<?php
  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }
?>

<?php


    $student_ID = $_SESSION['username'];
  
    $answers = addslashes($_POST['answers']);
   
    $answer = explode('@',$answers);

    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $pb_database, $db_host);
    $db->query("set names 'utf8'");

    $result=True;
    $score=0;
	
	$total=count($answer)-1;
	$id=$answer[$total];

    for( $i=0; $i<count($answer)-1; $i++)
    {   
        $query_answer="SELECT answer FROM competition$id WHERE problem_ID='$i'+1";
		$query_score="SELECT score FROM competition$id WHERE problem_ID='$i'+1";
		$get_answer=$db->get_var($query_answer);
	    $get_score=$db->get_var($query_score);
	    if($answer[$i]==$get_answer)
		$score=$score+$get_score;

        global $result;
   //     $insert_query="INSERT INTO answer$id(question,student_ID,question_ID,answer) VALUES('$i'+1,'$student_ID','$i'+1,'$answer[$i]')";
		$insert_query="INSERT INTO answer$id(question_ID,student_ID,answer) VALUES('$i'+1,'$student_ID','$answer[$i]')";
        $insert_result = $db->query($insert_query);
        $result = $result &  $insert_result;
    }
       
    $update_query="UPDATE allscores$id SET score = '$score' WHERE student_ID = '$student_ID'";
    $update_result = $db->query($update_query);

    if($result ){
         echo json_encode(array('insert'=>'提交成功！'));
    }
    else{
         echo json_encode(array('insert'=>'提交失败'));
    }
?>