<?php 
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php"); 
	
	if (!empty($_POST['startDate']) && !empty($_POST['endDate'])) {

		if( is_string($_POST['startDate'])){echo "IT IS STRING"}
		
		$start = strtotime($_POST['startDate']);
		$end = strtotime($_POST['endDate']);

		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );

		//if the difference is < 30 do in days
		// > 30 do in months
		// > 365 do in years

		

	}
	echo "HEUY NP"

	// header('Location: dashboard.php');
	// exit();
?>