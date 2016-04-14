<?php
    
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once"db_config.php";
    $db=new ezSQL_mysql($db_user,$db_password,$pb_database,$db_host);

?>

<?php
    $problem_id=$_GET['id'];
?>

<?php
    $remove_allscores="TRUNCATE TABLE allscores$problem_id";
	$remove_answer="TRUNCATE TABLE answer$problem_id";
//	$remove_competition="TRUNCATE TABLE table_name";
//	$delete_info="DELETE FROM information WHERE ID=$problem_id";
	$query1=$db->query($remove_allscores);
    $query2=$db->query($remove_answer);
	//$query3=$db->query();
	//$query4=$db->query();
?>
<script>
	location.replace('./problems.php');
	</script>