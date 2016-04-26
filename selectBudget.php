<?php

	require_once("Classes/DataManager.php");

	if(isset($_POST['budgets'])){
		$budget = $_POST['budgets'];

		if($budget != 'Select a budget') {
			?>
			<form id="setBudget" class="form-set-budget" action='setBudget.php' method='post' accept-charset='UTF-8'>
			<font size="3">Set Budget Amount: $</font>
			<input type="number" name="budgetAmount" min="0" max="9999" style="width:50px;margin-right:10px">
			<input type="submit" id="bugdetSubmit" name="bugdetSubmit" value= "Set Budget" class="btn btn-info">
			</form>
			<?php
		}

	 	switch ($budget) {
	 		case 'Select a budget':
	 			break;
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