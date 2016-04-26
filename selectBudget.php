<?php

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

	 	switch ($budget) {
	 		case 'Food': ?>
	 			<h3>Food</h3>
	 			<h4>Total budget: $300.00</h4>
	 			<?php
	 			break;
	 		case 'Education': ?>
	 			<h3>Education</h3>
	 			<h4>Total budget: $500.00</h4>
	 			<?php
	 			break;
	 		default:
	 			echo 'ERROR!';
	 			break;
	 	}
	}
?>