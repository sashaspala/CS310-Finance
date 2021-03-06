<?php

require_once "Account.php";

class BalanceSheet{

	private $accounts; // array of accounts
	private $netWorth; 
	private $liabilities;// an account;
	private $assets; // an account


	function __construct($accountsArray){		
		$this->accounts = $accountsArray;
	}

	function addAccount($account){
		array_push($this->accounts, $account);
	}

	function calculateNetWorth(){
		$total = 0.00;
		if(!empty($this->accounts)){
			foreach($this->accounts as $item){
				$item->calculateTotalSum();
				$total += $item->getSum();
			}
			$this->netWorth = $total;
		}
		else{
			$this->netWorth = $total;
		}
	}

	function getNetWorth(){
		return $this->netWorth;
	}

	function getAccounts(){
		return $this->accounts;
	}

}



?>

