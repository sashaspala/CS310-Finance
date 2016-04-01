<?php
	if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

	} else if(empty($_POST['username'])) {
		header('Location: http://www.google.com/');
		exit();
	}
?>