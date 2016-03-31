<?php

class Account {
  public $name; //String
  protected $accountID; //int
  protected $userID; //int

  function __construct($name = null, $accountID = null , $userID = null){
    if($name != null) $this->name = $name;
    if ($accountID != null) $this->accountID = $accountID;
    if ($userID != null)  $this->userID = $userID;
  }
}


?>
