<?php

$account = new Account("Bank Of America2", 1, 1); 
$account->calculateDataPoint('04/01/2016', '04/05/2016', 5); 

class Account {
	private $name; //String
	private $accountID; //int
	private $Users_userID; //int
    private $sum;//
    private $transactions;//array transactions
    private $netValues; //array of ints representing the net value of the account at different times
	private $dataPoints;
	function __construct($name = null, $accountID = null , $userID = null){
		if($name != null)
			$this->name = $name;
		if ($accountID != null)
			$this->accountID = $accountID;
		if ($userID != null)
			$this->Users_userID = $userID;

		//echo 'Constructed Account with ' . $this->name;
        // $this->transactions = DataManager::getInstance()->getTransactionsForAccount($this->accountID);

        $this->dataPoints=array();
		$this->netValues = array();
		if(count($this->transactions)>0){

			//TODO need to fix the below commented code

			array_push($this->netValues, $this->transactions[0]->getAmount());
			for ($index =1; $index<count($this->transactions); $index++){
				//I THINK THIS LINE DOES NOT WORK CURRENTLY BECAUSE OF THE SAMPLE DATA
				// array_push($this->netValues, $this->netValues[$index-1] + $this->transactions[$index]->getAmount();
			}
		}
	}

	function getID(){
		return $this->accountID;
	}

	function calculateTotalSum(){
		$total = 0.00;
		if(!empty($this->transactions)){
			foreach($this->transactions as $item){
				$total += $item->getAmount();
			}
			$this->sum = $total;
		}
		else{
			$this->sum = $total;
		}

	}

	function getSum(){
		return $this->sum;
	}

	function getAccountName(){
		return $this->name;
	}

	function setAccountName($name){
		$this->name = $name;
	}

	function getTransactions(){
        $this->transactions = DataManager::getInstance()->getTransactionsForAccount($this->accountID, $_SESSION['userID']);
        echo count($this->transactions);
		return $this->transactions;
	}

	function addTransactions($transaction){
		array_push($this->transactions, $transaction);
	}

	function getNetValues() {
		return $this->netValues;
	}

	public function calculateDataPoint($startDate, $endDate, $numOfPoints){
		$startIndex=0;
		$endIndex=count($this->transactions);
		for ($index =0; $index<count($this->transactions); $index++){
			if($this->transactions[$index]->getDate()>=$startDate){
				$startIndex=$index;
				break;
			}
		}
		for ($index =0; $index<count($this->transactions); $index++){
			if($this->transactions[$index]->getDate()<=$endDate){
				$endIndex=$index;
				break;
			}
		}
		$netValuesIndex=$startIndex;
		$currDate=$startDate;
		for($index=0; $index<$numOfPoints;$index++){
			if($currDate>$this->transactions[$netValuesIndex]->getDate()){
				$netValuesIndex++;
			}
			array_push($this->dataPoints, $this->netValues[$netValuesIndex]);
			$currDate = strtotime("+1 day", $currDate);


		}
	}
	function getDataPoints(){
		return $this->dataPoints;
	}

}

?>
