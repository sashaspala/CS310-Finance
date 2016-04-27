<?php


class Transaction {

	public $transactionDate;//String
	public $amount;//double
	public $category;//String
	public $name;//String
	public $principal; //The other party involved in the transaction (String)
	public $transactionID; //Int
	public $Accounts_accountID;
	public $Accounts_Users_userID;//gits

	function __construct($date=null,$amount=null,$category=null,$name=null, $principal=null,
							$transactionID = null, $accountID = null, $userID = null) {
		if($date != null) $this->transactionDate=$date;
		if($amount != null) $this->amount=$amount;
		if($category != null) $this->category=$category;
		if($name != null) $this->name=$name;
		if($principal != null) $this->principal = $principal;
		if($transactionID != null) $this->transactionID = $transactionID;
		if($accountID != null) $this->accountID = $accountID;
		if($userID != null) $this->userID = $userID;

	}

	//getters for private variables
	function getDate(){
		return $this->transactionDate;
	}

	function getAmount(){
		return $this->amount;
	}

	function getCategory(){
		return $this->category;
	}

	function getName(){
		return $this->name;
	}
	function getPrincipal() {
		return $this->principal;
	}
	function getTransactionID() {
		return $this->transactionID;
	}
	function getAccountID() {
		return $this->Accounts_accountID;
	}
	function getUserID() {
		return $this->Accounts_Users_userID;
	}

	//setters for private variables
	function setDate($date){
		$this->transactionDate=$date;
	}

	function setAmount($amount){
		$this->amount=$amount;
	}

	function setCategory($category){
		$this->category=$category;
	}

	function setName($name){
		$this->name=$name;
	}

	function setPrincipal($principal) {
		$this->principal = $principal;
	}

	function setTransactionID($transactionID) {
		$this->transactionID = $transactionID;
	}

	function setAccountID($accountID) {
		$this->Accounts_accountID = $accountID;
	}

	function setUserID($userID) {
		$this->Accounts_Users_userID = $userID;
	}
}

?>
