<?php

require_once("User.php");
//require_once("Account.php");
//require_once("Transaction.php");

$testManager = new DataManager();
$testManager->loginUser('swag@swag.com', 'swag');
//var_dump(new User(15, "Kyle", "Tan", "swag@swaggery.com", "moreswaggery"));


class DataManager {

	public $currentLoggedInUserID; // ID for the currently logged in user
	private $_db; //database connection

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

	function __construct() {

		define('DBHOST','localhost');
		define('DBUSER','root');
		define('DBPASS','password');
		define('DBNAME','310Database');

		try {
			//create PDO connection 
			$this->_db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "connected successfully\n";

		} catch(PDOException $e) {
			//show error
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			exit;
		}

	}
	
	function addUser($firstName, $lastName, $email, $hashedPassword) {

	}

	/**
	* Login a user for the current session
	* @param string email The email associated with the account
	* @param string hashedPassword The hashed password associated with the account
	* @return User The instance of the user specified by the parameters if login was successful, null otherwise
	*
	*/
	function loginUser($email, $hashedPassword) {
		try {
			$stmt = $this->_db->prepare('SELECT userID, firstName, lastName, email, hashedPassword FROM Users WHERE email = :email AND hashedPassword= :hashedPassword');
			$stmt->execute(array('email' => $email, 'hashedPassword' => $hashedPassword));

			$results = $stmt->fetchAll (PDO::FETCH_CLASS, "User"); 
			$newUser = $results[0];
			$this->currentLoggedInUserID = $newUser->getUserID(); 
			// $this->currentLoggedInUserID = $results['userID'];
			// echo currentLoggedInUserID;

		} catch(PDOException $e) {
		    //echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			echo $e->getMessage();
		}
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
