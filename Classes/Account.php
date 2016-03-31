<?php

class Account {
	private $name; //String
	private $accountID; //int
	private $Users_userID; //int

	function __construct($name = null, $accountID = null , $userID = null){
		if($name != null) $this->name = $name;
		if ($accountID != null) $this->accountID = $accountID;
		if ($userID != null)  $this->Users_userID = $userID;
	}

	/*=============Accessors============*/
	function getName() {
		return $name;
	}

	function getAccountID() {
		return $accountID;
	}

	function getUserID() {
		return $Users_userID;
	}

	function setName($name) {
		$this->name = $name;
	}

	function setAccountID($accountID) {
		$this->accountID = $accountID;
	}

	function setUserID($userID) {
		$this->Users_userID = $userID;
	}
}


?>
