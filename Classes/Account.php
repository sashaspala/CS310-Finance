<?php

class Account  {
  protected $name; //String
  protected $ID; //int
  protected $userID //int

  function __construct($name, $ID, $userID){
    $this->name = $name;
    $this->ID = $ID;
    $this->userID = $userID;
  }
}


?>
