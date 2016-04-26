<?php

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

		 switch ($select1) {
		 	case 'Food':
		 		echo "<h2>Total budget: $300.00</h2>"
		 	case 'Education':
		 		echo "<h2>Total budget: $500.00</h2>"
		 	default:
		 		echo "<p>ERROR!</p>";
		 }
	}