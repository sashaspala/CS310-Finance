<?php
	if(!session_id()) {
		session_start();   
	}			

	require_once("Classes/DataManager.php");

	while ($_SESSION['timeout'] + 2 * 60<> time())
	{
		echo "";
	}

	$_SESSION['timeout'] = 0;
	header("login.php")

?>