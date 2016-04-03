<?php 
	echo "Blae2";
	$myFilePath=$_FILES["csvfilename"]["name"];
	$file= file_get_contents($myFilePath);
	$data = array_map("str_getcsv",preg_split('/\r*\n+|\r+/',$file));
	echo "BLAH";
	$line=0;
	$numOfAccount=$data[line][0];
	$line++;
	for($i = 0; $i <$numOfAccount;$i++){
		$accountName=$data[$line][0];
		$numOfTransactions=$data[$line][1];
		$line++;
	// 	//CREATES AN ACCOUNT IN DB
		$account=DataManager::getInstance()->addAccount($accountName,$userID);
		for($j=0;$j<$numOfTransactions;$j++){
				$transactionName=$data[$line][0];
				$transactionPrincipal=$data[$line][1];
				$transactionDate=$data[$line][2];
				$transactionAmount=$data[$line][3];
				$transactionCategory=$data[$line][4];
				//CREATES A TRANSACTIO IN DB
				$transaction=DataManager::getInstance()->addTransaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrincipal,  $account->getID(), $_SESSION['userID']);
				if($transactionAmount<0){
					//add it to Liabilities Account;
				}else{
					//add it to Assets Account
				}
				$line++;
		}

		$line++;
	// 	// ADD ACCOUNT TO BALLANCESHEET LOCALLY

		$_SESSION['ballanceSheet']->addAccount($account);
	}
	header('Location: dashboard.php');
	exit();
?>