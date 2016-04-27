<?php
	if(!session_id()) {
		session_start();
	}
	require_once("header.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	while ($_SESSION['timeout'] + 5 < time())
	{
		echo "";
	}

	$_SESSION['timeout'] = 0;
	$_SESSION['timeout_count'] = 0;
	header("Location: timeout.php");
?>	

timeout ):