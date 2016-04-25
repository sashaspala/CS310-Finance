<?php
	if(!session_id()) {
		session_start();   
	}
			
	require_once("Classes/DataManager.php");


	//unset($_SESSION['email']);
	//unset($_SESSION['userID']);
	//unset($_SESSION['userFullName']);
	DataManager::getInstance()->logout();
	header('Location: login.php');
	exit();


?>