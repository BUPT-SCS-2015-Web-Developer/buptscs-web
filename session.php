<?php

  session_start();

  if(!isset($_SESSION['username'])){
    echo "<script language=javascript>alert('请先登录哦!');</script>";
    $_SESSION['userurl'] = $_SERVER['REQUEST_URI']; 
    echo '<script language=javascript>window.location.href="login.php"</script>';
    return;
  }


  $username = $_SESSION['username'];

  include_once "lib/shared/ez_sql_core.php";
  include_once "lib/mysql/ez_sql_mysql.php";
  include_once "db_config.php";

  $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
  $db->query("set names 'utf8'");

  $get_user_query = "SELECT * FROM massage WHERE student_ID = '$username'";
  $user = $db->get_row("$get_user_query");

?>