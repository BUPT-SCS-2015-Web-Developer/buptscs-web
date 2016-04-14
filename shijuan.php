<!DOCTYPE html>
<html>
    <head>
<title>
    试卷详情
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->


    
</head>
<body>

<?php
    $id=$_GET['id'];//学生id
	$pro_id=$_GET['numberproblem'];//第几套题
 
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once"db_config.php";
 
    $db=new ezSQL_mysql($db_user,$db_password,$pb_database,$db_host);
    $db->query("set names 'utf8'");
    
    $get_user_query = "SELECT * FROM competition$pro_id";
    $questions = $db->get_results("$get_user_query");
    $i=1;
       
       echo "score:";
       $get_user_score="SELECT score FROM AllScores$pro_id WHERE student_ID=$id";
       $thisscore=$db->get_var("$get_user_score");
       echo $thisscore;
       echo '<br><br><br>';
 

foreach ( $questions as $question ) { 


  
       echo $question->problem_ID;echo '.';echo $question->competition;echo '&nbsp&nbsp';
       echo'(';
       
       $get_user_answer="SELECT answer FROM answer$pro_id WHERE question_ID=$i AND student_ID=$id";
       $thisanswer=$db->get_var("$get_user_answer");
       echo $thisanswer;
       
       echo')';
       echo '<br>';echo '<br>';
       //echo $question->img;
       echo'A';echo $question->option1;echo '<br>';
       echo'B';echo $question->option2;echo '<br>';
       echo'C';echo $question->option3;echo '<br>';
       echo'D';echo $question->option4;echo '<br>';echo'<br><br>';
  
  $i=$i+1;
}
    

?>
</body>
</html>