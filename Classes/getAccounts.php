<?php
 require_once("DataManager.php");


$accountsString = $_GET["accounts"];
$accountsString = substr($accountsString, 0, -1);

$accountList = explode('-', $accountsString);

 $accounts = array();
 $transactions = array();

// //get array of accounts
//

foreach ($accountList as $item) {
	$account = DataManager::getInstance()->getAccount($item, 1);
	array_push($accounts, $account);
	# code...
}

//get transactions
foreach ($accounts as $item) {
	$accountTrans = DataManager::getInstance()->getTransactionsForAccount($item->getID(),1);
	foreach($accountTrans as $accountItem) {
		$transactions[] = $accountItem;
	}
}


//echo transactions
echo "<table id='transactions' class='table table-bordered table-hover sortable'>";

echo "<tbody>";

echo "<thead>";
echo "<tr>";
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


?>
