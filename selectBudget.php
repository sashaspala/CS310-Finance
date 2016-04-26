<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

	 	switch ($budget) {
	 		case 'Food':
	 			echo '<h2>Food</h2>'
	 			echo '<h3>Total budget: $300.00</h3>';
	 			break;
	 		case 'Education':
	 			echo '<h2>Education</h2>'
	 			echo '<h3>Total budget: $500.00</h3>';
	 			break;
	 		default:
	 			echo 'ERROR!';
	 			break;
	 	}
	}
?>