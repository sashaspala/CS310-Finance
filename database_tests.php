<?php
	
	require_once('Classes/DataManager.php');

	define("TestUserEmail", "test@test.com");
	define("TestUserPassword", "test");
	define("TestUserID", 3);
	define("TestAccountID", 1);

	class DatabaseTests extends PHPUnit_Framework_TestCase
	{

		private $dataManager;

		public function setUp() {
			$this->dataManager = DataManager::getInstance();
		}
	
    	public function testSuccessfulLoginOnCorrectCredentials() {
    		$this->dataManager->loginUser(TestUserEmail, TestUserPassword); 
    		$this->assertEquals(TestUserID, $this->dataManager->currentLoggedInUserID); 
    	}

    	public function testDoesNotPerformLoginOnIncorrectCredentials() {
    		$this->dataManager->loginUser('invalid@email.com', 'invalidPassword'); 
    		$this->assertEquals(null, $this->dataManager->currentLoggedInUserID); 
    	}

    	public function testSuccessfulLogout() {
    		$this->dataManager->logout();
    		$this->assertEquals(null, $this->dataManager->currentLoggedInUserID);

    	}

    	public function testAddNewAccountForUser() {
    		$this->dataManager->addAccount("Checkings", TestUserID);
    		$this->assertNotEquals(null, $this->dataManager->getAccount("Checkings",TestUserID));
    	}

    	public function testGetAccountsForUser() {
    		$this->dataManager->addAccount("Savings", TestUserID);
    		$this->assertEquals(2, count($this->dataManager->getAccountsForUser(TestUserID)));
    	}

    	public function testRemoveAccountForUser() {
    		$this->dataManager->removeAccount("Savings", TestUserID);
    		$this->assertEquals(null, $this->dataManager->getAccount("Savings",TestUserID));
    		$this->assertEquals(1, count($this->dataManager->getAccountsForUser(TestUserID)));
    	}

    	public function testAddTransaction() {
    		$this->dataManager->addTransaction("04-04-2016", -56.49, "Groceries", "Groceries", "Ralphs", TestAccountID, TestUserID);
    		$this->assertEquals(1, $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getTransactionID());
    		$this->assertEquals("04-04-2016", $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getDate());
    		$this->assertEquals(-56.49, $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getAmount());
    		$this->assertEquals("Groceries", $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getCategory());
    		$this->assertEquals("Ralphs", $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getPrincipal());    		
    		$this->assertEquals(TestUserID, $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getUserID());
    		$this->assertEquals(TestAccountID, $this->dataManager->getTransactionsForAccount(TestAccountID, TestUserID)[0]->getAccountID());
    	}



	}

?>
    