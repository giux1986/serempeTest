<?php

	session_start();
	include 'includes/autoloader.inc.php';
	include 'functions.php';			

	if(isset($_SESSION['idis'])){
		header("location:".url("home"));
	}
	
	
	?>