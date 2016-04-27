<?php
	// if(!session_id()) {
   		session_start();
	// }
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php");

  $balanceSheet = DataManager::getInstance()->balanceSheet;
  //echo "Hyup";
	if (!empty($_GET['startDate']) && !empty($_GET['endDate'])) {
		//echo "nope \n";
		//THE PARAMETERS AS PASSED IN AS STRING

		$start = strtotime($_GET['startDate']);
		$end = strtotime($_GET['endDate']);
		echo "1";

		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );
	echo "2";

		//echo "HELPPPPOPPOPPOPO";
		$accountList=$balanceSheet->getAccounts();
		//echo "121212HELPPPPOPPOPPOPO121212";
		for ($index=0; $index<count($accountList); $index++){

			//echo " hi".$index."\n";
			$accountList[$index]->calculateDataPoint($start, $end, $days);
			//echo "god";
		}
			echo "3";
		// var_dump($accountList);
		$returnValue=array();
		for ($index=0; $index<count($accountList);$index++){
			$dataPoints= $accountList[$index]->getDataPoints();
			$temp =[
				"name"=> $accountList[$index]->getName(),
				"data"=> $dataPoints,
			];

			$returnValue[] = $temp; 


		}
			echo "4";
		echo json_encode($dataPoints);
  }


		

		//if the difference is < 30 do in days
		// > 30 do in months
		// > 365 do in years



	//}
	
	// header('Location: dashboard.php');
	// exit();
?>
