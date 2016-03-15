<?php
	session_start();

	if(isset($_SESSION['username'])){

        unset($_SESSION['username']);
		session_destroy();
		$home_url = 'index.html';
        header('Location:'.$home_url);
	}
?>