<?php
	// if(!session_id()) {
   		session_start();
	// }
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php");

	if (!empty($_GET['startDate']) && !empty($_GET['endDate'])) {

		//THE PARAMETERS AS PASSED IN AS STRING

		$start = strtotime($_GET['startDate']);
		$end = strtotime($_GET['endDate']);

		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );
		if(!is_null($_SESSION['balanceSheet'])){echo "it is okay";}


		// $_SESSION['balanceSheet']->getAccounts();

		// if(is_null($_SESSION['test'])){echo "it is test null";} else {
		// 	echo "it is test correct";
		// }


		// $accountList=$_SESSION['balanceSheet']->getAccounts();


		// for ($index=0; $index<count($accountList); $index++){
		// 	// $accountList[$index]->calculateDataPoint($start, $end, $days);
		// }

		//if the difference is < 30 do in days
		// > 30 do in months
		// > 365 do in years



	}
	echo "HEUY NP"

	// header('Location: dashboard.php');
	// exit();
?>
