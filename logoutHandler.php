<?php
	if(!session_id()) {
		session_start();
	}

	require_once("Classes/DataManager.php");

	// unset($_SESSION);
	unset($_SESSION['userID']);
	unset($_SESSION['userFullName']);
	unset($_SESSION['timeout'])
	unset($_SESSION['b'])

	DataManager::getInstance()->logout();
	header('Location: login.php');
	exit();


?>
