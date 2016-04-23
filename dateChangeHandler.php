<?php 
	require_once("Classes/DataManager.php");
	require_once("Classes/BalanceSheet.php"); 
	
	if (!empty($_POST['startDate']) && !empty($_POST['endDate'])) {

		echo "HEY";
		$start = strtotime($_POST['startDate']);
		$end = strtotime($_POST['endDate']);

		$difference = $end - $start;
		$days = floor($difference / (60*60*24) );

		

	}
	echo "HEUY NP"

	header('Location: dashboard.php');
	exit();
?>