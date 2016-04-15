<?php
require_once("Classes/DataManager.php");
session_start();
$accountsString= $_REQUEST["accounts"];
$accountList = explode("-", $accountsString);



for (var $accountIndex=0;$accountIndex<count($accountList);$accountIndex++ ){}
	for (var $transactionIndex =0; $transactionIndex< count($transactlist) ; $transactionIndex++){
		var $tempTransaction = DataManager::getInstance()->getAccountByName($accountList[$accountIndex]);//change account name made 
		echo "<tr>";
			echo "<td>" . $tempTransaction->getName() . "</td>";
			echo "<td>" . $tempTransaction->getCategory() . "</td>";
			echo "<td>" . $tempTransaction->getAmount() . "</td>";
			echo "<td>" . $tempTransaction->getDate() . "</td>";
		echo "</tr>";
	}
}
?>