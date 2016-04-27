<?php
	if(!session_id()) {
		session_start();
	}
	require_once("header.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	flush();

	while ($_SESSION['timeout'] + 5 > time())
	{}

	session_unset();
	session_destroy();
	#$_SESSION['timeout'] = 0;
	header("Location: login.php");
?>