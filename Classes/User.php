<?php


class User{
	//basic info related to user account
	private $firstName; //String
	private $lastName; //String
	private $email; //String
	private $userName; //String
	private $hashedPassword; //String
	private $databaseID; //int

	

	function __construct($userName,$hashedPassword,$firstName,$lastName,$email,$databaseID){
		$this->userName=$userName;
		$this->hashedPassword=$hashedPassword;
		$this->firstName=$firstName;
		$this->lastName=$lastName;
		$this->email=$email;
		$this->databaseID=$databaseID;

	}
	//getter functions for private variables
	function getUserName(){
		return $this->userName;
	}
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

	//Setter Funcitons for private variables
	function getDBId(){
		return $this->databaseID;
	}
	function setUserName($userName){
		$this->userName=$userName;
	}
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
	function setDBId($databaseID){
		$this->databaseID=$databaseID;
	}
}



?>