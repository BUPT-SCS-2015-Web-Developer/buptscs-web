<?php 
//如果还没设置过session
if(!isset($_SESSION))
	session_start();
//设置不同导航
if(!isset($_SESSION['username']))
    include("nav-logout.php");
else
    include("nav-login.php");
?>