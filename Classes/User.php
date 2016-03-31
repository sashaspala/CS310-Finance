<?php

class User{
	//basic info related to user account
	private $userID; //int
	private $firstName; //String
	private $lastName; //String
	private $email; //String
	private $hashedPassword; //String

	function __construct($userID = null,$firstName = null,$lastName = null ,$email = null ,$hashedPassword = null) {
		if ($userID != null) $this->hashedPassword=$hashedPassword;
		if ($firstName != null) $this->firstName=$firstName;
		if ($lastName != null) $this->lastName=$lastName;
		if ($email != null) $this->email=$email;
		if ($userID != null) $this->userID=$userID;

	}
	//getter functions for private variables

	function getHashedPassword(){
		return $this->hashedPassword;
	}
	function getFirstName(){
		return $this->firstName;
	}
	function getLastName(){
		return $this->lastName;
	}
	function getEmail(){
		return $this->email;
	}
	function getUserId(){
		return $this->userID;
	}

	//Setter Funcitons for private variables

	function setHashedPassword($hashedPassword){
		$this->hashedPassword=$hashedPassword;
	}
	function setFirstName($firstName){
		$this->firstName=$firstName;
	}
	function setLastName($lastName){
		$this->lastName=$lastName;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setUserId($userID){
		$this->userID=$userID;
	}
}



?>
