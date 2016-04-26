<?php

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

	 	switch ($budget) {
	 		case 'Food': ?>
	 			<h2>Food</h2>
	 			<h3>Total budget: $300.00</h3>
	 			<?php
	 			break;
	 		case 'Education': ?>
	 			<h2>Education</h2>
	 			<h3>Total budget: $500.00</h3>
	 			<?php
	 			break;
	 		default:
	 			echo 'ERROR!';
	 			break;
	 	}
	}
?>