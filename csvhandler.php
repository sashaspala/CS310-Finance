<?php 
	$file= file_get_contents($_FILES[$_POST['fileName']]]["tmp_name"]);
	$data = array_map("str_getcsv",preg_split('/\r*\n+|\r+/',$file));

	$line=0;
	$numOfAccount=$data[line][0];
	$line++;
	for($i = 0; $i <$numOfAccount;$i++){
		$accountName=$data[$line][0];
		$numOfTransactions=$[$data][1];
		$line++;
		//CREATES AN ACCOUNT IN DB
		$account=DBManager.addAccount($accountName,$userID);
		for($j=0;$j<numOfTransactions;$j++){
				$transactionName=$data[$line][0];
				$transactionPrincipal=$data[$line][1];
				$transactionDate=$data[$line][2];
				$transactionAmount$data[$line][3];
				$transactionCategory=$data[$line][4];
				//CREATES A TRANSACTIO IN DB
				$transaction=DBManager.addTransaction($transactionDate, $transactionAmount, $transactionCategory, $transactionName, $transactionPrincipal,  $account.getID(), $userID));
				if(transactionAmount<0){
					//add it to Liabilities Account;
				}else{
					//add it to Assets Account
				}
				$line++;
		}

		$line++;
		// ADD ACCOUNT TO BALLANCESHEET LOCALLY
		$_GLLOBAL['ballanceSheet'].addAccount($account);
	}
	header('Location: dashboard.php');
	exit();
?>