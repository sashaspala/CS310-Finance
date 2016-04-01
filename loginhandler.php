<?php
	require_once("DataManager.php");

	if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$user = DataManager::getInstance()->loginUser($_POST['email'], $_POST['password']);

		if(is_null($user)) {
			header('Location: http://www.reddit.com/');
			exit();
		}

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['userID'] = $user->getUserID();

		header('Location: http://www.google.com/');
		exit();
?>