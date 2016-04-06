<?php
	//check if legal
	if(!isset($_POST['username']) || !isset($_POST['password']))
	{
		echo "<script language=javascript>alert('非法进入!');</script>";
		exit();
	}

	//post data
	$username = addslashes($_POST['username']);
	//$password = MD5($_POST['password']);
	$password = addslashes($_POST['password']);


	//include ezSQL files
	include_once "lib/shared/ez_sql_core.php";
	include_once "lib/mysql/ez_sql_mysql.php";
    include_once "db_config.php";

    $db = new ezSQL_mysql($db_user, $db_password, $db_database, $db_host);
	$db->query("set names 'utf8'");

	$check_query = "SELECT * FROM user WHERE user_ID='$username'";
	$user = $db->get_row($check_query);

	if(!$user){
		echo json_encode(array('msg'=>'请检查学号输入'));
	}
	else{
				$sql_query = "SELECT * FROM user WHERE user_ID='$username' AND user_password='$password'";

				$user = $db->get_row($sql_query);
				$type = $user->user_type;
				
				if($user)
				{
				
					session_start();

					$_SESSION['username'] = $username;
					$_SESSION['type'] = $type;
					if(isset ($_SESSION['userurl']))
						echo json_encode(array('url'=> $_SESSION['userurl']));
					else 
					{
						if ($type == "student")
							echo json_encode(array('url'=>'info.php'));
						else
							echo json_encode(array('url'=>'teacher.php'));
					}
				}
				else
				{
					echo json_encode(array('msg'=>'用户名或密码输入错误，登陆失败'));
				}
		}	
?>