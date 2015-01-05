<?php
	$dbHost = "localhost";
	$dbLogin ="root";
	$dbPwd  ="";
	$dbName ="form_db";
	
	$con = mysql_connect($dbHost,$dbLogin,$dbPwd);
	if (!$con) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($dbName, $con);
?>