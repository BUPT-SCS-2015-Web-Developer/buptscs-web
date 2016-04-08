<?php
  /*  session_start();

  if(!isset($_SESSION['username'])){
	  exit('illegal access!');
  }
  $username = $_SESSION['username'];
  */
  $connect_query = mysql_connect("localhost","root","") or die ("数据库连接错误！".mysql_error());
  mysql_select_db("Questionnaire",$connect_query) or die("数据库访问错误!".mysql_error());
  mysql_query("set names utf8");
  $getinfo = "select * from test4";
  $getresult = mysql_query($getinfo);
  
   $answers=$_POST['answer'];
   $answers = addslashes($_POST['answers']); 
   $answer = explode('@',$answers);
   
   $i=0;
   while($questions=mysql_fetch_field($getresult) & $i<=count($answer)-1;){
	     if(i==0){
			 $result=mysql_query("INSERT INTO test4($questions->name) VALUES('$username'");  
		 }
		 else{
             $result=mysql_query("INSERT INTO test4($questions->name) VALUES('$answer[$i]'");  
		 };
         $i++;
   
   }
   if($result ){
         echo json_encode(array('insert'=>'提交成功！'));
    }
    else{
         echo json_encode(array('insert'=>'提交失败'));
  ?>