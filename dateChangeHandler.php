<?php
	// if(!session_id()) {
   		session_start();
	// }
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php");

  $balanceSheet = DataManager::getInstance()->balanceSheet;
  printf "Hyup";
	if (!empty($_GET['startDate']) && !empty($_GET['endDate'])) {
		printf "nope \n";
		//THE PARAMETERS AS PASSED IN AS STRING

		$start = strtotime($_POST['startDate']);
		$end = strtotime($_POST['endDate']);

		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );

		$accountList=$balanceSheet->getAccounts();
		for ($index=0; $index<count($accountList); $index++){
			echo " hi".$index."\n";
			$accountList[$index]->calculateDataPoint($start, $end, $days);
		}



		$dataPoints= $accountList[0]->getDataPoints();
		for($i=0;$i<$i;$i++){
			echo $i."\n";
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
