<!DOCTYPE html>
<html>
    <head>
<title>
    查询成绩|search_answer
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--  确保适当的绘制和触屏缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->


    
</head>
<body>
<?php
    
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once"db_config.php";
    $db=new ezSQL_mysql($db_user,$db_password,$db_database,$db_host);
    $db->query("set names 'utf8'");
?>
<?php
    $Problem_id=$_GET['id'];//第几套题
?>    
<script>
function details(){
   x=user_id.value;
//   x=Number(x);

    window.open("./shijuan.php?id="+x+"&numberproblem="+<?php echo $Problem_id?>);
   
	
}
</script>
    
    精确学号查询:<input type="text" name='search_id' id='user_id'></input>
    <input type="submit" value="search" onclick="details()"></input>
    <br><br>
	

<?php
    $get_student_query="SELECT * FROM allscores$Problem_id";
    $infos=$db->get_results("$get_student_query");


    $mark=array();
    $id=array();
	$doing_id=array();
    $i=0;
	$j=0;
	if($infos==NULL){
		echo '还没有同学做完题<br>';
	}
	else{
		/*所有同学的ID从user中读*/
	$get_all_studentID="SELECT user_ID FROM user WHERE user_type='student'";
	$all_ids=$db->get_col("$get_all_studentID");
    $get_finished_id="SELECT student_ID FROM allscores$Problem_id ";//如果score不等于null= =
	$finished_id=$db->get_col("$get_finished_id");
	$results=array_diff($all_ids,$finished_id);//在前面的数组而不在后面所有的数组
 //print_r($results); 
     array_multisort($results);
     if($results==NULL){
	     echo '所有同学都已经答题啦';
     }
    else{
	    echo '这些同学没有答题<br>'; 
	    foreach($results as $result){
		echo $result;
		echo '<br>';
	}
 }
    foreach($infos as $info){
		if($info->score==NULL){
			$doing_id[$j]=$info->student_ID;
			$j=$j+1;
		}
		else{
        $mark[$i]=$info->score;
        $id[$i]=$info->student_ID;
        $i=$i+1;
		}
    }
	}
    $count=$i;
	$count_temp=$j;
   
    if($count_temp==0)   {
		echo '没有同学正在答题<br>';
	}
	else{
    echo'这些同学正在答题或未提交答案就退出了<br>';
	array_multisort($doing_id);
	for($j=0;$j<$count_temp;$j=$j+1)
	{
		echo $doing_id[$j];
		echo '<br>';
	}
	}
	
/*cheng ji jiang xu pai lie*/
if($infos!=NULL)
{ echo '按照成绩降序排列<br>';
    array_multisort($mark, SORT_DESC);
    for($i=0;$i<$count;$i++)
    {
		echo $mark[$i];
        echo '&nbsp&nbsp';
        $match_id_query="SELECT student_ID FROM allscores$Problem_id WHERE score=$mark[$i]";
        if($i==0||($i>=1&&$mark[$i]!=$mark[$i-1]))
        {
        $ids=$db->get_col("$match_id_query");
        $j=$i;
     
	   echo '<a href="./shijuan.php?id='.$ids[0].'&numberproblem='.$Problem_id.'">';//前面是学号后面是第几套题
       echo $ids[0];
       echo '</a>&nbsp&nbsp';
	   echo '<a href="./remove.php?id='.$ids[0].'&numberproblem='.$Problem_id.'">';
	   echo "remove";
	   echo '</a>';
       echo'<br>';
     
   
       }
       else{
    
       echo '<a href="./shijuan.php?id='.$ids[$i-$j].'&numberproblem='.$Problem_id.'">';
       echo $ids[$i-$j];
        echo '</a>&nbsp&nbsp';
	   echo '<a href="./remove.php?id='.$ids[0].'&numberproblem='.$Problem_id.'">';
	   echo "remove";
	   echo '</a>';
       echo'<br>';
     
       
       }
    }
}
?>
</body>
</html>