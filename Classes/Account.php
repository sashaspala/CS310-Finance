<?php

class Account {
	private $name; //String
	private $accountID; //int
	private $Users_userID; //int
    private $sum;
    private $transactions;

	function __construct($name = null, $accountID = null , $userID = null){
		if($name != null) $this->name = $name;
		if ($accountID != null) $this->accountID = $accountID;
		if ($userID != null)  $this->Users_userID = $userID;
        $this->transactions = DataManager.getTransactionsForAccount($this->accountID);
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
        $this->transactions = DataManager.getTransactionsForAccount($this->accountID); 
		return $this->transactions;
	}

	function addTransactions($transaction){
		array_push($this->transactions, $transaction);
	}

}

?>
