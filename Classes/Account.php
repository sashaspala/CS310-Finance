<?php

class Account {
  protected $name; //String
  protected $accountID; //int
  protected $userID; //int

  function __construct($name, $accountID, $userID){
    $this->name = $name;
    $this->accountID = $accountID;
    $this->userID = $userID;
  }
}


?>
