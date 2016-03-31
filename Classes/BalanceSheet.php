<?php

include_once "Account.php";

class BalanceSheet{

	private $assets; //associative Array
	private $liabilities; //associative Array
	private $accounts; // array of accounts

	function __construct(){
		$this->assets = array();
		$this->liabilities = array();
		$this->accounts = array();
	}

	function addAsset($name,$value){
		$this->assets[$name] = $value;
	}

	function addLiabilities($name,$value){
		$this->liabilities[$name] = $value;
	}

	function addAccount($account){
		array_push($this->accounts, $account);
	}

}



?>

