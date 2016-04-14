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

 // $get_user_query = "SELECT * FROM massage WHERE student_ID = '$username'";
 //$user = $db->get_row("$get_user_query");


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>BUPT 2015 SCS Competition System</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="js/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

</head>

<body class="selector">

<a href="PDashboard.php"><strong>注销</strong></a><br>
   <?php $prob_id=$_GET['id'];?>
  <?php
  echo $username ."你好！";
  ?>
  <br><br>
 <?php

  $get_user_query = "SELECT * FROM AllScores$prob_id WHERE student_ID = '$username'";
  $Scores = $db->get_row("$get_user_query");
if (!$Scores)
 {
    ?>
    <p><a href="dati2.php?id=<?php echo $prob_id?>"><img border="0" src="/competition/img/logo3.jpg" /> </a></p>
     点击图标开始答题。（答题开始后不可暂停！）  
  <?php
  }
  else{
   
    $get_time="SELECT LimitTime FROM information WHERE ID='$prob_id'";
  	$limit_time_min=($db->get_var("$get_time"));
	$limit_time_s=60 * $limit_time_min;
    $start_time=$Scores->start_time+$limit_time_s-time();

    if ($start_time>0)
    {
    ?>
    <p><a href="dati2.php?id=<?php echo $prob_id?>"><img border="0" src="/competition/img/logo3.jpg" /> </a></p>
     点击图标开始答题。（答题开始后不可暂停! )
     <?php

    }else{
        if (!$Scores->score) {
        
        echo "你已经答完题目！你的成绩是0分";
      }else
      {
         echo "你已经答完题目！你的成绩是".$Scores->score."分";
      }

        }
  }
?>