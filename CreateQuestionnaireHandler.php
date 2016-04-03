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
  
  $table_id = uniqid();
  $table_title = $_POST['questionnaireTitle'];
  $table_create_user = $username;
  $table_filled = 0; 
  $insert_query = "INSERT INTO `QuestionnaireInfo` (`ID`, `Title`, `CreateUser`, `CreateDate`, `CloseTime`, `Important`, `Filled`) 
                VALUES ('$table_id', '$table_title', '$table_create_user', now(), CURRENT_TIMESTAMP, '0', '$table_filled')";
  $insert_result = $db->query($insert_query);
  
  //CREATE TABLE `Questionnaire`.`asdfg` ( `gggg` VARCHAR NOT NULL , `sdffg` SET('aaaa','ssss','dddd','ffff','gggg') NOT NULL , `qwerty` ENUM('fff','egg','hah') NOT NULL ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
  $insert_query = "CREATE TABLE `Questionnaire`.`$table_id` ( `User_ID` VARCHAR(10) NOT NULL ,";
  echo $insert_query;
  $question = $_POST['questions'];
  for ($i=1; $i < count($question); $i++) { 
      $colum = $question[$i]['colum'];
      $colum_type = $question[$i]['type'];
      $colum_set = $question[$i]['set'];
      $insert_query .= " `$colum` ";
      if (!strcmp($colum_type,"text")) {
          $insert_query .= "VARCHAR(255) NOT NULL ,";
      } elseif (!strcmp($colum_type,"checkbox")) {
          $insert_query .= "SET($colum_set) NOT NULL ,";
      } elseif (!strcmp($colum_type,"radio")) {
          $insert_query .= "ENUM($colum_set) NOT NULL ,";
      }
  }
  $insert_query = rtrim($insert_query,',');
  $insert_query .= ") ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
  $insert_result = $db->query($insert_query);
  echo json_encode(Sucseeded);
?>