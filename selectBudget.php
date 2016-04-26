<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

		echo $budget;
	 	switch ($budget) {
	 		case "Food":
	 			echo "<h2>Total budget: $300.00</h2>"
	 			break;
	 	// 	case "Education":
	 	// 		echo "<h2>Total budget: $500.00</h2>"
	 	// 		break;
	 		default:
	 			echo "<p>ERROR!</p>";
	 			break;
	 	}
	}
?>