<?php
	
	require_once('Classes/DataManager.php');

	//DB credentials
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','password');
    define('DBNAME','310Database');

	class UserTests extends PHPUnit_Framework_TestCase
	{

		protected static $databaseManager; 

		public static function setUpDataManager() {
            $this->databaseManager = DataManager->getInstance();
		}
		
    	public function testInitialState()
    	{
    		$this->assertEquals(1, $this->getConnection()->getRowCount('members')); 
    	}

    	public function testSuccessfulLoginOnCorrectCredentials() {
    		$user = new User(self::$db); 
    		$user->login('darvish.kamalia@gmail.com', '123456'); 
    		$this->assertTrue($_SESSION['loggedin']); 
    	}

    	public function testDoesNotPerformLoginOnIncorrectCredentials() {
    		$user = new User(self::$db); 
    		$user->login('invalid@email.com', 'invalidPassword'); 
    		$this->assertArrayNotHasKey('loggedin', $_SESSION); 
    	}

    	public function testAddNewStocksToMember() {
    		$user = new User(self::$db); 
    		$user->add_stock(1, 'TSLA', 100); 
    		$queryTable = $this->getConnection()->createQueryTable (
    			'owned_stocks', 'SELECT * FROM owned_stocks'
    		);

    		$expectedTable = $this->createFlatXMLDataSet("DataSetAdd.xml")->getTable('owned_stocks'); 
    		$this->assertTablesEqual($expectedTable, $queryTable); 

    	}

    	public function testUpdateExistingStockQuantityForUser() {
    		$user = new User(self::$db); 
    		$user->add_stock(1, 'TSLA', 100); 
    		$user->add_stock(1, 'TSLA', 200); 

    		$queryTable = $this->getConnection()->createQueryTable (
    			'owned_stocks', 'SELECT * FROM owned_stocks'
    		);

    		$expectedTable = $this->createFlatXMLDataSet("DataSetAdd2.xml")->getTable('owned_stocks'); 

    		$this->assertTablesEqual($expectedTable, $queryTable); 
    	}

    	public function testBuyStocksUpdatesBalance() {

    		$user = new User(self::$db); 
    		$user->login('darvish.kamalia@gmail.com', '123456'); 
    		$currentBalance = $   ]; 

    		$user->buy_stock(1, 'AAPL', 50, 10); 

    		$expectedBalance = $currentBalance - 500; 
    		$this->assertEquals($expectedBalance, $_SESSION['balance']); 
    	}

    	public function testBuyStocksWithInsufficientBalanceThrowsException() {
    		$this->expectException(Exception::class); 
    		$user = new User(self::$db); 
    		$user->login('darvish.kamalia@gmail.com', '123456'); 
    		$currentBalance = $_SESSION['balance']; 
    		$user->buy_stock(1, 'AAPL', 5000000, 10000000); 
    	}

	}

?>
    