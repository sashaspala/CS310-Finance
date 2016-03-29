<?php

class DataManager() {

  $public currentLoggedInUserID; // ID for the currently logged in user

  /**
  * Add a new user to the database with the given information, and creates an instance of
  * the user class. Also, gives the new User databaseID
  * @param string firstName The first name of the user
  * @param string lastName The last name of the user
  * @param string userName
  * @param string email
  * @param string hashedPassword
  * @return User The new user,
    */
  function addUser($firstName, $lastName, $userName, $email, $hashedPassword) {

  }

  /**
  * Adds an account to the database
  * @param string name The name associated with the account/
  * @param int userID The ID for the user who owns the account
  * @return Account The new account that was created, with the ID specified.
  */

  function addAcount ($name, $userID) {

  }

  function removeAccount ($name, $userID) {

  }

  /**
  * Gets a specific account for the given userID.
  * @param $name The account name to search for
  * @param $userID The user whose accounts should be search. Defaults to the currently logged in
  *                user if no ID is provided
  * @return Account The account, if found, NULL otherwise
  */
  function getAccount ($name, $userID = null) {
    if ($userID == null) {
      $userID = $this->currentLoggedInUserID;
    }
  }

  function getAccountsForUser($name) {

  }

  /**
  * Finds all the transactions for an account
  * @param int $accountID The ID for the account. Note, this is NOT the name
  * @param int $userID The user who owns the acccount
  * @return Transaction[] An array of the transactions for the account. Empty if the account doesn't exist,
  *          or has no transactions
  */
  function getTransactionsForAccount($accountID, $userID) {

  }

  /**
  * Adds a transaction to the database
  * @return Transaction The newly created transaction
  */
  function addTransaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrinciple,  $accountID, $userID) {

  }



}


 ?>
