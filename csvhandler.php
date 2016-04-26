<?php 
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php"); 
	$myFilePath=$_FILES["csvfilename"]["name"];
	$file= file_get_contents("sampleCSV.csv");
	$data = array_map("str_getcsv",preg_split('/\r*\n+|\r+/',$file));
	$line=0;
	$numOfAccount=$data[$line][0];
	$line++;
	
	for($i = 0; $i < $numOfAccount; $i++){
		$accountName=$data[$line][0];
		$numOfTransactions=$data[$line][1];
		$line++;
	 	// CREATES AN ACCOUNT IN DB
		// DataManager::getInstance()->addTransaction(date('Y-m-d'),99.99,"food","lots gczvxcvzxcvzx of stuff", "Ralphxzcvxcvzxcs",1,2);
		$account=DataManager::getInstance()->addAccount($accountName,1);

		///if($i == 0) echo $numOfAccount;

		for($j = 0; $j < $numOfTransactions; $j++){
			$transactionName=$data[$line][0];
			$transactionPrincipal=$data[$line][1];
			$transactionDate=$data[$line][2];
			$transactionAmount=$data[$line][3];
			$transactionCategory=$data[$line][4];
			//CREATES A TRANSACTION IN DB
			$transaction=DataManager::getInstance()->addTransaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrincipal,  $account->getID(), 1);
			if($transactionAmount<0){
				//add it to Liabilities Account;
			}else{
				//add it to Assets Account
			}
			$line++;
		}
		//$line++;
	 	// ADD ACCOUNT TO BALANCESHEET LOCALLY
		// $_SESSION['balanceSheet']->addAccount($account);
		echo $i;
		echo $numOfAccounts;
	}
	header('Location: dashboard.php');
	exit();
?>
