<?php
 require_once("DataManager.php");

$accountsString = "TestAccountName7";
$accountList = explode("-", $accountsString);

$accounts = array();
$transactions = array();

//get array of accounts

echo json_encode($accountList); 
foreach ($accountList as $item) {
	$account = DataManager::getInstance()->getAccount($item, 1);
	array_push($accounts, $account);
	# code...
}

//get transactions
foreach ($accounts as $item) {
	$accountTrans = DataManager::getInstance()->getTransactionsForAccount($item->getID(),1);
	array_merge($transactions, $accountTrans);
	# code...
}

//echo transactions
echo "<table id='transactions' class='table table-bordered table-hover sortable'>
					<thead>
						<tr>
							<th>Name</th>
							<th>Type</th>
							<th>Amount</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>";

echo "<thead>";
echo"<tr>";
echo		"<th>Name</th>";
echo		"<th>Type</th>";
echo	"<th>Amount</th>";
echo "<th>Date</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($transactions as $item) {

	echo "<tr>";
	echo "<td>" . $item->getName() . "</td>";
    echo "<td>" . $item->getCategory(). "</td>";
    echo "<td>" . $item->getAmount() . "</td>";
    echo "<td>" . $item->getDate() . "</td>";
    echo "<tr>";

	# code...
}

echo "</tbody>";

				echo "</table>";



// for (var $accountIndex=0;$accountIndex<count($accountList);$accountIndex++ ){}
// 	for (var $transactionIndex =0; $transactionIndex< count($transactlist) ; $transactionIndex++){
// 		var $tempTransaction = DataManager::getInstance()->getAccountByName($accountList[$accountIndex]);//change account name made
// 		echo "<tr>";
// 			echo "<td>" . $tempTransaction->getName() . "</td>";
// 			echo "<td>" . $tempTransaction->getCategory() . "</td>";
// 			echo "<td>" . $tempTransaction->getAmount() . "</td>";
// 			echo "<td>" . $tempTransaction->getDate() . "</td>";
// 		echo "</tr>";
// 	}
// }
?>
