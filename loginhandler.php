<?php
	if(!session_id()) {
		session_start();
	}
			

	require_once("Classes/DataManager.php");

	if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$user = DataManager::getInstance()->loginUser($_POST['email'], $_POST['password']);


		echo 'here after login';

		if(is_null($user)) {
			echo '<p class="bg-danger">'.'done'.'</p>';
			header('Location: login.php');
			exit();
		}

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['userID'] = $user->getUserID();

		header('Location: dashboard.php');
		exit();

	} else {
		header('Location: login.php');

		exit();
	}
?>