<?php

  session_start();

  if(!isset($_SESSION['username'])){
    exit('illegal access!');
  }


  $username = $_SESSION['username'];

  include_once "lib/shared/ez_sql_core.php";
  include_once "lib/mysql/ez_sql_mysql.php";
  include_once "db_config.php";
  
  $db = new ezSQL_mysql($qs_user, $qs_password, $qs_database, $db_host);
  $db->query("set names 'utf8'");
  
  $questionnaire_query = "SELECT ID, Title FROM QuestionnaireInfo ORDER BY CreateDate DESC";
  $questionnaire_result = $db->get_results($questionnaire_query);
  
  $filled = array();
  $unfilled = array();
  foreach ($questionnaire_result as $questionnaire) {
      $ques_title = $questionnaire->ID;
      $answer_id = $db->get_row("SELECT User_ID FROM `$ques_title`");
      if ($answer_id) {
          array_push($filled, $questionnaire);
      } else {
          array_push($unfilled, $questionnaire);
      }
  }
  $result = array('filled' => $filled,'unfilled' => $unfilled );
  echo json_encode($result);
?>

        