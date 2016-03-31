<?php


class Transaction {

	protected $date;//String
	protected $amount;//double
	protected $category;//String
	protected $name;//String
	protected $priciple; //The other party involved in the transaction (String)
	protected $ID; //Int
	protected $accountID;
	protected $userID;//git 

	function __construct($date=null,$amount=null,$category=null,$name=null){
		$this->date=$date;
		$this->amount=$amount;
		$this->category=$category;
		$this->name=$name;
	}

	//getters for protected variables
	function getDate(){
		return $this->date;
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

	//setters for protected variables
	function setDate($date){
		$this->date=$date;
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
}

?>
