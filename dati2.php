<?php

  session_start();

  if(!isset($_SESSION['username'])){
	  exit('illegal access!');
  }
  ?>
  <?php
  $id=$_GET['id'];



  $username = $_SESSION['username'];

  include_once "lib/shared/ez_sql_core.php";
  include_once "lib/mysql/ez_sql_mysql.php";
  include_once "db_config.php";

  $db = new ezSQL_mysql($db_user, $db_password, $pb_database, $db_host);
  $db->query("set names 'utf8'");

  $get_user_query = "SELECT * FROM AllScores$id WHERE student_ID = '$username'";
  $Scores = $db->get_row("$get_user_query");
  
  	$get_time="SELECT LimitTime FROM information WHERE ID='$id'";
  	$limit_time_min=($db->get_var("$get_time"));
	$limit_time_s=60 * $limit_time_min;
	//echo $limit_time_s;
  if (!$Scores)
  {
    $now_time=time();


	$remain_time=$limit_time_s;
    $insert_query = "INSERT INTO AllScores$id(start_time,student_ID) VALUES('$now_time','$username')";
    $insert_result = $db->query($insert_query);
  }
  else{
    $remain_time=$Scores->start_time+$limit_time_s-time();        //防止刷新
  }
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>BUPT 2015 SCS Information System</title>

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

<script type="text/javascript">
 
      $(document).ready(function(){	
        $('#submit').click(function(){
         // alert($('#text1').val());
            var answer= new Array();
	
            for (var i=0;i<=$("label").length-1;i++)
            {
                answer[i]= $("[name="+i+"]:radio:checked").val() 
                    
            }
		answer[i]="<?php echo $id?>";
            
             
          // alert(answer);
            answer=answer.join('@')
         //   alert(answer)
           
            $.ajax({
            type:'post',
            url:'competition.php',
            data:{
              answers:answer
            },
            dataType:'json',
            success:function(json){
              alert(json.insert);
              if(json.insert == '提交成功！')
              {
                  alert("success");
				  window.location.href="./submit.php?id=<?php echo $id?>";
              }
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert('登陆失败，请重试或联系管理员');
            }
          });
        });
      });

        //回车时，默认是登陆
       function KeyDown(){
       if(window.event.keyCode == 13){
        if (document.getElementById("submit")!=null){
                           document.getElementById("submit").click();
         }
        }
       }
    
</script>

</head>


<body class="selector">
  <?php
  echo $username .",你好！欢迎答题";
  ?>
  <h1><strong id="RemainM">XX</strong><strong id="RemainS">XX </strong></h1>
  <?php
  $get_user_query = "SELECT * FROM competition$id";
  $questions = $db->get_results("$get_user_query");
  $i=0;

 foreach ( $questions as $question ) { 


?> 
      <label id="question<?php echo $i;?>"><?php echo $question->problem_ID;?> 、<?php echo $question->competition;?></label>
      <br>
      <img src="<?php echo $question->img;?>"></img><br>
       <br>
       A<input type="radio" name="<?php echo $i;?>"value="<?php echo "A";?>"/><?php echo $question->option1;?><br>
       B<input type="radio" name="<?php echo $i;?>"value="<?php echo "B";?>"/><?php echo $question->option2;?><br>
       C<input type="radio" name="<?php echo $i;?>"value="<?php echo "C";?>"/><?php echo $question->option3;?><br>
       D<input type="radio" name="<?php echo $i;?>"value="<?php echo "D";?>"/><?php echo $question->option4;?><br>
       <br>

    <?php
  
  $i=$i+1;
  }


?>   
<button class="btn btn-primary" type="submit" id='submit'>提交</button>

<div class="fgx " style="clear:both;" width="815px">
    <p class="banquan">
        北京邮电大学15级计算机学院
    </p>
</div>

<script language="JavaScript">      
    <!-- //      
    var runtimes = 0;    
      
    function GetRTime(){      
    var nMS = <?=$remain_time?>*1000-runtimes*1000;      
    var nH=Math.floor(nMS/(1000*60*60))%24;      
    var nM=Math.floor(nMS/(1000*60)) % 60;      
    var nS=Math.floor(nMS/1000) % 60;      
    //document.getElementById("RemainH").innerHTML=nH+ "小时";      
    document.getElementById("RemainM").innerHTML=nM+ "分钟";      
    document.getElementById("RemainS").innerHTML=nS+ "秒";      
   // if(nMS>5*59*1000&&nMS<=5*60*1000)      
    //{      
    //  alert("还有最后五分钟！");      
    //}      
    runtimes++;      
    if (nMS<1000) 
    	 setTimeout(document.getElementById("submit").click(),nMS);
    else
       setTimeout("GetRTime()",1000);      
    }      
    window.onload=GetRTime;      

</script>

</body>
</html>
   