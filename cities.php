<?php

	session_start();
	include 'includes/autoloader.inc.php';
	include 'functions.php';			

	$key = $_REQUEST['key'];
	$city = new Cities();


	$city->Query("Select * FROM cities WHERE name LIKE '%".strip_tags($key)."%'");
    $cities= $city-> FetchAll();

    $html="";
	foreach ($cities as $cit) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($cit->name).'" id="'.utf8_encode($cit->id).'" >'.utf8_encode($cit->name).'</a></div>';
    }
	echo $html;
	?>