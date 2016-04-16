<?php

require_once("User.php");
require_once("Account.php");
require_once("Transaction.php");

// $testManager = new DataManager();
// $testManager->getInstance()->loginUser('swag@swag.com', 'swag');
// $testManager->addAccount('Credit Card2', 2);
// //$newAccount = $testManager->getAccount('Credit Card2', 2);
// var_dump($testManager->getAccountsForUser(2));
//$testManager->removeAccount('Credit Card', 1); */
//$testManager->addTransaction(date('Y-m-d'), 99.99, "Food", "Lots of groceries", "Ralphs", 1, 2);
//var_dump($testManager->getTransactionsForAccount(1, 2));


class DataManager {

	private static $currentInstance;

	static function getInstance() {
		if (self::$currentInstance == null) {
			self::$currentInstance = new DataManager();
		}

		return self::$currentInstance;
	}
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
			return $newUser;

		} catch(PDOException $e) {
			//echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			echo $e->getMessage();
		}
	}

	/**
	* Adds an account to the database
	* @param string name The name associated with the account
	* @param int userID The ID for the user who owns the account
	* @return Account The new account that was created, with the ID specified if no errors, null otherwise;
	*/

	function addAccount ($name, $userID) {
		//Check if the account name already exists in the database
		$stmt = $this->_db->prepare('SELECT * FROM Accounts WHERE name = :name AND Users_userID = :userID');
		$stmt->execute(array('name'=>$name, 'userID'=>$userID));
		$results = $stmt->fetch();
		if($results[0]) {
			echo "An account of that name already exists in database\n";
			return null;
		}

		$stmt = $this->_db->prepare('INSERT INTO Accounts (name, Users_userID)
										VALUES (:name, :userID)');

		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':userID', $userID);


		if($this->executeStatement($stmt)==true) {
			$accountID = $this->_db->lastInsertId();
			return new Account($name, $accountID, $userID);
		} else {
			return null;
		}

	}

	/**
	* Removes an account to the database
	* @param string name The name associated with the account
	* @param int userID The ID for the user who owns the account
	*/
	function removeAccount ($name, $userID) {
		$statement = $this->_db->prepare('DELETE FROM Accounts WHERE name = :name AND Users_userID = :userID');

		$statement->bindParam(':name', $name);
		$statement->bindParam(':userID', $userID);

		$this->executeStatement($statement);
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

		$stmt = $this->_db->prepare('SELECT * FROM Accounts WHERE name = :name AND Users_userID = :userID');
		$stmt->execute(array('name'=>$name, 'userID'=>$userID));
		$results = $stmt->fetchAll (PDO::FETCH_CLASS, "Account");
		if(count($results) == 1) {
			$newAccount = $results[0];
			return $newAccount;
		}

		else {
			echo "Could not find account for the specified user\n";
			return null;
		}


	}

	function getAccountsForUser($userID = null) {
		if ($userID == null) {
			$userID = $this->currentLoggedInUserID;
		}

		$stmt = $this->_db->prepare('SELECT * FROM Accounts WHERE Users_userID = :userID');
		$stmt->execute(array('userID'=>$userID));
		$results = $stmt->fetchAll (PDO::FETCH_CLASS, "Account");
		return $results;
	}

	/**
	* Finds all the transactions for an account
	* @param int $accountID The ID for the account. Note, this is NOT the name
	* @param int $userID The user who owns the acccount
	* @return Transaction[] An array of the transactions for the account. Empty if the account doesn't exist,
	*          or has no transactions
	*/
	function getTransactionsForAccount($accountID, $userID = null) {
		if ($userID == null) {
			$userID = $this->currentLoggedInUserID;
		}

		$stmt = $this->_db->prepare('SELECT * FROM Transactions WHERE Accounts_accountID = :accountID AND Accounts_Users_userID = :userID');
		$stmt->execute(array('userID' => $userID, 'accountID' => $accountID));
		$results = $stmt->fetchAll (PDO::FETCH_CLASS, "Transaction");
		return $results;
	}

	/**
	* Adds a transaction to the database
	* @return Transaction The newly created transaction
	*/
	function addTransaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrincipal,  $accountID, $userID) {

		$prep = "INSERT INTO Transactions (transactionDate, amount, category, name, principal, Accounts_accountID, Accounts_Users_userID)
							  VALUES (:transactionDate, :amount, :category, :name, :principal, :Accounts_accountID, :Accounts_Users_userID)";

		$stmt = $this->_db->prepare($prep);

		$stmt->bindParam(':transactionDate', $transactionDate);
		$stmt->bindParam(':amount', $transactionAmount);
		$stmt->bindParam(':category', $transactionCategory);
		$stmt->bindParam(':name', $transactionName);
		$stmt->bindParam(':principal', $transactionPrincipal);
		$stmt->bindParam(':Accounts_accountID', $accountID);
		$stmt->bindParam(':Accounts_Users_userID', $userID);

		if($this->executeStatement($stmt)==true) {
			$transactionID = $this->_db->lastInsertId();
			return new Transaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrincipal,
				$transactionID, $accountID, $userID);
		} else {
			return null;
		}
	}


	/**
	* Executes a statement and returns the error string, if any
	* @param Statement The SQL statement to execute. Must have parameters bound to variables
	* @param Bool True if the execute was successful, False otherwise
	*/
	function executeStatement($statement) {
		try {
			$statement->execute();
			echo "Success\n";
			return true;
		} catch(PDOException $error) {
			echo $error->getMessage()."\n";
			return false;
		}
	}
}


?>
