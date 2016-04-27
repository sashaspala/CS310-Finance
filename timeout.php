<?php
	if(!session_id()) {
		session_start();
	}
	require_once("header.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	echo "timeout ):";
	ob_end_flush();  
    flush(); 
    ob_start(); 

	while ($_SESSION['timeout'] + 5 > time())
	{}

	session_unset();
	session_destroy();
	header("Location: login.php");
?>