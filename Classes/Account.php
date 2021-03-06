<?php

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
		$this->netValues=array();
		// if(count($this->transactions)>0){

		// 	//TODO need to fix the below commented code
		// 	array_push($this->netValues, $this->transactions[0]->getAmount());
		// 	// for ($index =1; $index<count($this->transactions); $index++){
		// 	// 	//I THINK THIS LINE DOES NOT WORK CURRENTLY BECAUSE OF THE SAMPLE DATA
		// 	// 	$prev_Sum= $this->netValues[$index-1]+$this->transactions[$index]->getAmount();
		// 	// 	echo "string "+$prev_Sum+"<br>";
		// 	// 	array_push($this->netValues, $prev_Sum;
		// 	// }
		// }
	}

	function getID(){
		return $this->accountID;
	}

	function setTransactions ($transactions) {
		$this->transactions = $transactions;
	}

	function setName ($name) {
		$this->name = $name; 
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
        // echo count($this->transactions);
		return $this->transactions;
	}

	function addTransactions($transaction){
		array_push($this->transactions, $transaction);
	}

	// function getNetValues() {
	// 	return $this->netValues;
	// }

	public function calculateDataPoint($startDate, $endDate, $numOfPoints,$shouldUpdate){
		$startIndex=0;
		if($shouldUpdate){
		$this->transactions = DataManager::getInstance()->getTransactionsForAccount($this->accountID, 1);
		}
		// var_dump($this);
		// echo count($this->transactions).'yeah thats right <br>';
		if(count($this->transactions)>0){
			array_push($this->netValues, $this->transactions[0]->getAmount());
			// echo "net value ". $this->netValues[0].'<br>';
			for ($index =1; $index<count($this->transactions); $index++){
				$prev_Sum= $this->netValues[$index-1]+$this->transactions[$index]->getAmount();
				array_push($this->netValues, $prev_Sum);
				// echo "net value at index ".$index." is equal to " .$this->netValues[$index].'<br>';
			}
		}

		//echo $this->accountID;
		//var_dump($this->transactions);
		//var_dump($this);


		$endIndex=count($this->transactions)-1;
		for ($index =0; $index<count($this->transactions); $index++){
			if(strtotime($this->transactions[$index]->getDate()) >= $startDate){
				$startIndex=$index;
				// echo 'found start'.$index."<br>";
				break;
			}
		}

		unset($index);

		for ($index = 0; $index < count($this->transactions); $index++){
			if(strtotime($this->transactions[$index]->getDate()) > $endDate){
				$endIndex=$index - 1;
				// echo 'found end'.$index."<br>";
				break;
			}
		}

		unset($index);
		// echo 'INDICES';
		// echo $startIndex;
		// echo $endIndex."<br>";
		$netValuesIndex=$startIndex;
		$currDate=$startDate;
		// echo 'number of points/day in time range is '. $numOfPoints.'<br>';
		// echo ' start value'. $this->netValues[$startIndex].'<br>';
		for($index=0; $index<$numOfPoints;$index++){//because we need that many points
			// echo 'Iteration1 '.$index;
			// echo " current date is ";
			// echo date('d-m-Y',$currDate)."<br>";
			if($currDate == strtotime($this->transactions[$netValuesIndex]->getDate()) ){
				// echo 'reached here <br>';
				if ($netValuesIndex < count($this->netValues) - 1) {
					$netValuesIndex++;
				}
			}
			// echo $netValuesIndex;
			array_push($this->dataPoints, $this->netValues[$netValuesIndex]);
			$currDate = strtotime("+1 day", $currDate);
			// echo 'Iteration2 '.$index."<br>";

		}



	}
	function getDataPoints(){
		return $this->dataPoints;
	}

}

?>
