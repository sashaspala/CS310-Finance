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

		$start = strtotime($_POST['startDate']);
		$end = strtotime($_POST['endDate']);
		echo 'testing'; 
		echo $start; 
		echo $end; 
		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );


		//echo "HELPPPPOPPOPPOPO";
		$accountList=$balanceSheet->getAccounts();
		//echo "121212HELPPPPOPPOPPOPO121212";
		for ($index=0; $index<count($accountList); $index++){

			//echo " hi".$index."\n";
			$accountList[$index]->calculateDataPoint($start, $end, $days);
			//echo "god";
		}
		// var_dump($accountList);

		//echo "Drogon";
		$dataPoints= $accountList[0]->getDataPoints();
		echo 'DATAPOINTS: '; 
		echo json_encode($dataPoints);

		//echo "BallZZZ".count($dataPoints);
		for($i=0;$i<count($dataPoints);$i++){
			echo "BALLSSS".$i;
			$dataPoints[$i];
		}
		// echo json_encode($accountList);
  }


		

		//if the difference is < 30 do in days
		// > 30 do in months
		// > 365 do in years



	//}
	echo "HEUY NP"

	// header('Location: dashboard.php');
	// exit();
?>
