<?php
  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }
?>

<?php

    $student_ID = $_SESSION['username'];
  
    $answer1 = addslashes($_POST['answer1']);
   
    $answer2 = addslashes($_POST['answer2']);
   
    $answer3 = addslashes($_POST['answer3']);

    $answer4 = addslashes($_POST['answer4']);
   
    $answer5 = addslashes($_POST['answer5']);
   
    $answer6 = addslashes($_POST['answer6']);
    
    $answer7 = addslashes($_POST['answer7']);

    $answer8 = addslashes($_POST['answer8']);
   
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
    $db->query("set names 'utf8'");

    
    $insert_query1 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',1,'$answer1')";
    $insert_result1 = $db->query($insert_query1);

    $insert_query2 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',2,'$answer2')";
    $insert_result2 = $db->query($insert_query2);


    $insert_query3 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',3,'$answer3')";
    $insert_result3 = $db->query($insert_query3);


    $insert_query4 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',4,'$answer4')";
    $insert_result4 = $db->query($insert_query4);


    $insert_query5 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',5,'$answer5')";
    $insert_result5 = $db->query($insert_query5);


    $insert_query6 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',6,'$answer6')";
    $insert_result6 = $db->query($insert_query6);

   
    $insert_query7 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',7,'$answer7')";
    $insert_result7 = $db->query($insert_query7);

   $insert_query8 = "INSERT INTO questionnaire(question_ID,student_ID,question,answer) VALUES('NULL','$student_ID',8,'$answer8')";
    $insert_result8 = $db->query($insert_query8);





    if($insert_result1 & $insert_result2 & $insert_result3 & $insert_result4 & $insert_result5){
         echo json_encode(array('insert'=>'sucess'));
    }
    else{
         echo json_encode(array('insert'=>'fail'));
    }
?>