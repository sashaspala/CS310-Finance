<?php

	require_once("Classes/DataManager.php");

	$food = array(
    	'January' => '300',
    	'February' => '300',
    	'March' => '300',
    	'April' => '300',
    	'May' => '300',
    	'June' => '300',
    	'July' => '300',
    	'August' => '300',
    	'September' => '300',
    	'October' => '300',
    	'November' => '300',
    	'December' => '300',
	);

	$education = array(
    	'January' => '500',
    	'February' => '500',
    	'March' => '500',
    	'April' => '500',
    	'May' => '500',
    	'June' => '500',
    	'July' => '500',
    	'August' => '500',
    	'September' => '500',
    	'October' => '500',
    	'November' => '500',
    	'December' => '500',
	);

	if(isset($_POST['budgets']) && isset($_POST['months'])){
		$budget = $_POST['budgets'];
		$month = $_POST['months'];

		if($budget != 'Select a budget' && $month != 'Select a month') {
			?>
			<form id="setBudget" class="form-set-budget" method='post' accept-charset='UTF-8'>
			<font size="3">Set Budget Amount: $</font>
			<input type="number" name="budgetAmount" min="0" max="9999" style="width:50px;margin-right:10px">
			<input type="submit" id="bugdetSet" name="bugdetSet" value= "Set Budget" class="btn btn-info">
			</form>
			<?php
			if($budget == 'Food') {
				if($_POST['budgetAmount'] != null) $food[$month] = $_POST['budgetAmount'];
			}
			else if($budget == 'Education') {
				if($_POST['budgetAmount'] != null) $education[$month] = $_POST['budgetAmount'];
			}
		}

		if($month != 'Select a month') {
			switch ($budget) {
		 		case 'Select a budget':
		 			break;
		 		case 'Food': ?>
		 			<h3>Food</h3>
		 			<h4>Total budget: $<?php echo $food[$month] ?>.00</h4>
		 			<?php
		 				$transactions = DataManager::getInstance()->getTransactionsForMonth($month);
		 				$total = 0;
			 			// foreach($transactions as $transaction) {
			 			// 	$total += $transaction->getAmount();
			 			// }
			 			// $num_as_int = (int)$food[$month];
			 			// $budget_total = $num_as_int - $total;
			 			// if($budget_total < 0) { ?> <font color = "FF0000"> <?php }
			 			// else { ?> <font color = "00FF00"> }
			 			// <h4>Leftover budget: $<?php echo $budget_total ?>.00</h4></font> <?php
		 			break;
		 		case 'Education': ?>
		 			<h3>Education</h3>
		 			<h4>Total budget: $<?php echo $education[$month] ?>.00</h4>
		 			<?php
		 			break;
		 		default:
		 			echo 'ERROR!';
		 			break;
	 		}
		}
	}
?>