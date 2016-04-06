<?php
	session_start();

	if(isset($_SESSION['username'])){

        unset($_SESSION['username']);
		session_destroy();
		$home = "index.php";
        header('Location:'.$home);
	}
?>