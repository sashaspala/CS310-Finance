<?php


require_once("Classes/DataManager.php");
//TODO FIX BALANCESHEET
require_once("Classes/BalanceSheet.php");
require_once("header.php");

session_start();

//LOADS PERSISTENT DATA

$accounts = DataManager::getInstance()->getAccountsForUser($_SESSION['userID']);

//TODO FIX BALANCESHEET
$balanceSheet = new BalanceSheet($accounts);
$_SESSION['balanceSheet'] = $balanceSheet;

?>
<head>
	<link rel="stylesheet"   type="text/css" href="styles.css">
	<script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	 </script>

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
	    	<form action="csvhandler.php" method = "post" enctype="mulipart/form-data">

	    	 <!-- <span class="btn btn-default btn-file"> -->
			    Upload CSV <input type="file" accept=".csv" id="csvUpload" name="csvfilename">
			<!-- </span> -->
			<input type="submit" value= "Upload">
			</form>
	    	<button type="button" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Log Out</button>
	    	<p class="navbar-text navbar-right" style="margin-right:10px">Signed in as </p> <?php $_SESSION['userFullName']?>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row row-margin" style="float:none;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div class="well account-div" style="background-color:#FFFFFF;height:440px">
				<h2>Accounts</h2>
				<table class="table table-hover">
				<?php
					$existingAccounts = $_SESSION['balanceSheet']->getAccounts();
						foreach($existingAccounts as $account){


						echo "<tr>";
						echo "<td>" . $account->getAccountName() . "</td>";
						echo "<td><input type="."checkbox". " name=showAccount"."/></td>";
						echo "</tr>";
						}
				?>
				</table>
				<div class="account-btn">
					<button type="button" class="btn btn-success">Add</button>
					<button type="button" class="btn btn-danger">Remove</button>
				</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
			<div class="well" style="background-color:#FFFFFF">
				<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
			<script src="graph.js"></script>
		</div>
		</div>

		<div class="row" style="margin:0px auto;float:none;">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Transactions</h2>


 				<p> Date: <input type="text" id="datepicker"></p>



				<table id="transactions" class="table table-bordered table-hover sortable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Type</th>
							<th>Amount</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>

					<?php


						//accounts
						$existingAccounts = $_SESSION['balanceSheet']->getAccounts();
						foreach($existingAccounts as $account){
							$existingTransactions = $account->getTransactions();
							foreach($existingTransactions as $transaction){

								echo "<tr>";
								echo "<tr>";
								echo "<td>" . $transaction->getName() . "</td>";
								echo "<td>" . $transaction->getCategory() . "</td>";
								echo "<td>" . $transaction->getAmount() . "</td>";
								echo "<td>" . $transaction->getDate() . "</td>";
								echo "</tr>";
							}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
