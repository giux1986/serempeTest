<?php
	session_start();
	include 'includes/autoloader.inc.php';
	include 'functions.php';	
	$_SESSION['idis']="";
	unset($_SESSION['idis']);	
	header("location:".url("user/login"));
?>