<?php
	if(!session_id()) {
		session_start();   
	}
			

	require_once("Classes/DataManager.php");


	if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {

		$user = DataManager::getInstance()->loginUser($_POST['email'], md5($_POST['password']));
		$failed_attempts = 4;

		echo '<div class="my_class">';
		echo $failed_attempts;
		echo '</div>';

		// if($failed_attempts > 3) {
		// 	echo "
		// 		<script>
		// 		document.getElementById("timeout").style.display = "block";
		// 		</script>
		// 		";
		// }

		if(is_null($user)) {
			echo '<p class="bg-danger">'.'done'.'</p>';
			header('Location: login.php');
			$failed_attempts += 1;
			exit();
		}
		else if(is_null($user->getUserID())) {
			echo '<p class="bg-danger">'.'done'.'</p>';
			header('Location: login.php');
			$failed_attempts += 1;
			exit();
		} 

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['userID'] = $user->getUserID();
		$_SESSION['userFullName']= $user->getFirstName() ." ". $user->getLastName();
		$_SESSION["blah"]= "goesfromlogin";
		header('Location: dashboard.php');
		exit();

	} else {
		header('Location: login.php');

		exit();
	}
?>
