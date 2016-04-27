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
		if(count($this->transactions)>0){

			//TODO need to fix the below commented code
			array_push($this->netValues, $this->transactions[0]->getAmount());
			// for ($index =1; $index<count($this->transactions); $index++){
			// 	//I THINK THIS LINE DOES NOT WORK CURRENTLY BECAUSE OF THE SAMPLE DATA
			// 	$prev_Sum= $this->netValues[$index-1]+$this->transactions[$index]->getAmount();
			// 	echo "string "+$prev_Sum+"<br>";
			// 	array_push($this->netValues, $prev_Sum;
			// }
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
		$this->transactions = DataManager::getInstance()->getTransactionsForAccount($this->accountID, 1);
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
		echo 'number of points '. $numOfPoints;
		for($index=0; $index<$numOfPoints;$index++){//because we need that many points
			// echo 'HEY THEREE '.$index;
			// echo "current date is";
			// echo date('d-m-Y',$currDate)."<br>";
			if($currDate>strtotime($this->transactions[$netValuesIndex]->getDate())){
				$netValuesIndex++;
			}
			// array_push($this->dataPoints, 1]);//$this->netValues[$netValuesIndex]);
			$currDate = strtotime("+1 day", $currDate);
			

		}
		echo "HEY THEREE ";//.$this->netValues[0]."<br>";
		for ($index=0; $index<count($this->netValues);$index++){
			echo $this->netValues[$index]."<br>";
		}
		 // echo var_dump($this->netValues);


	}
	function getDataPoints(){
		return $this->dataPoints;
	}

}

?>
