<?php

include_once "Transaction.php";

class Account {

	private $accountName;
	private $transactions;
	private $netWorth;

	/*
	private $dateCreated;
	*/

	function __construct($accountName,$arrayOfTransactions){
		$this->accountName = $accountName;
		$this->transactions = array();
		$this->netWorth = 0.00;
		$this->transactions = $arrayOfTransactions;
		$this->calculateNetWorth();
	}

	function calculateNetWorth(){
		$sum = 0.00;
		if(!empty($this->transactions)){
			foreach($this->transactions as $item){
				$sum += $item->getAmount();
			}
			$this->netWorth = $sum;
		}
		else{
			$this->netWorth = $sum;
		}

	}

	function getNetWorth(){
		return $this->netWorth;
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
