<?php

include_once "Transaction.php";

class Account {

	private $accountName;
	private $transactions;
	private $sum;

	/*
	private $dateCreated;
	*/

	// function __construct(){
	// 	$this->accountName = "";
	// 	$this->transactions = array();
	// 	$this->sum = 0.00;
	// }

	function __construct($accountName,$arrayOfTransactions){
		$this->accountName = $accountName;
		$this->transactions = array();
		$this->sum = 0.00;
		$this->transactions = $arrayOfTransactions;
		$this->calculateNetWorth();
	}

	function calculateTotalSum(){
		$total = 0.00;
		if(!empty($this->transactions)){
			foreach($this->transactions as $item){
				$total += $item->getAmount();
			}
			$this->sum = $total;
		}
		else{
			$this->sum = $total;
		}

	}

	function getSum(){
		return $this->sum;
	}

	function getAccountName(){
		return $this->accountName;
	}

	function setAccountName($name){
		$this->accountName = $name;
	}

	function getTransactions(){
		return $this->transactions;
	}

	function addTransactions($transaction){
		array_push($this->transactions, $transaction);
	}

}



?>
