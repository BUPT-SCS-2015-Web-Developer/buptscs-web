<?php
    
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once"db_config.php";
    $db=new ezSQL_mysql($db_user,$db_password,$db_database,$db_host);

?>

<?php
     $get_problems="SELECT * FROM Problems";
	 $problems=$db->get_results("$get_problems");
  
	 foreach($problems as $problem){
		 echo '<a href=search.php?id='.$problem->id.'>';
		 echo $problem->name;
		 echo '</a>';
		 echo '<br>';
	 }
	 
 
?>