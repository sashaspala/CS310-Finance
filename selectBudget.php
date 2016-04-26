<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

		echo $budget;
	 	switch ($budget) {
	 		case 'Food':
	 			echo 'Total budget: $300.00';
	 			break;
	 		case 'Education':
	 			echo 'Total budget: $500.00';
	 			break;
	 		default:
	 			echo 'ERROR!';
	 			break;
	 	}
	}
?>