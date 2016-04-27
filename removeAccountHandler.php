<?php
	if(!session_id()) {
		session_start();   
	}
	require_once("Classes/DataManager.php");



$accountsString = $_GET["accounts"];
$accountsString = substr($accountsString, 0, -1);

$accountList = explode('-', $accountsString);

header('Location : ' .json_encode($accountList));

foreach ($accountList as $item) {


	#DataManager::removeAccount($item, 1);
	# code...
}

$existingAccounts = DataManager::getInstance()->balanceSheet->getAccounts();

						foreach($existingAccounts as $account){
						echo "<tr>";
						echo "<td headers="."name>" . $account->getAccountName() . "</td>";
						echo "<td><input type="."checkbox". " name=showAccount "."onClick =" ."filter()"." />"."</td>";
						echo "</tr>";
						}
	#get the account you wanted to remove

	
?>