<?php


class Transaction {

	protected $date;//String
	protected $amount;//double
	protected $category;//String
	protected $name;//String

	// function __construct(){
	// 	$this->date="00/00/0000";
	// 	$this->amount=0.00;
	// 	$this->category="";
	// 	$this->name="";
	// }

	function __construct($date,$amount,$category,$name){
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