<?php

	

	define("base_path", "http://localhost/serempe/");
	
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'includes') !== false || strpos($url, 'home') !== false  || strpos($url, 'clients') !== false || strpos($url, 'users') !== false  || strpos($url, 'cities') !== false )
	{
		include_once("../classes/dbh.class.php");
        include_once("../classes/users.class.php");
        include_once("../classes/clients.class.php");
        include_once("../classes/cities.class.php");
	}
	else
	{
		include_once("classes/dbh.class.php");
        include_once("classes/users.class.php");
        include_once("classes/clients.class.php");
        include_once("classes/cities.class.php");
	}
	

	


?>