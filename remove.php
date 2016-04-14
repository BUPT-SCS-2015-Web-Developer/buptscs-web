<?php
    
    include_once "lib/shared/ez_sql_core.php";
    include_once "lib/mysql/ez_sql_mysql.php";
    include_once"db_config.php";
    $db=new ezSQL_mysql($db_user,$db_password,$pb_database,$db_host);

?>

<?php
    $student_id=$_GET['id'];

	$problem_id=$_GET['numberproblem'];
?>

<?php
    $remove_query1="DELETE FROM answer$problem_id WHERE student_id=$student_id";
	$remove_query2="DELETE FROM allscores$problem_id WHERE student_id=$student_id";
	$result1=$db->query($remove_query1);
	$result2=$db->query($remove_query2);
	?>
<script>
	location.replace('./search.php?id=<?php echo $problem_id?>');
	</script>