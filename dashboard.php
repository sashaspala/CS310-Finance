<?php

require_once("Classes/DataManager.php");
//TODO FIX BALANCESHEET
require_once("Classes/BalanceSheet.php");
require_once("header.php");


//LOADS PERSISTENT DATA

$accounts = DataManager::getInstance()->getAccountsForUser(1);

//TODO FIX BALANCESHEET
$balanceSheet = new BalanceSheet($accounts);
$_SESSION['balanceSheet'] = $balanceSheet;

?>
<head>
	<link rel="stylesheet"   type="text/css" href="styles.css">
	<!-- Script for date Picker
	datepicker represents start date
	datepicker 2 represents end date
	 -->
	<script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker2" ).datepicker();
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
			<form action="logoutHandler.php" method = "GET">
	    		<button type="submit" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Logout</button>
	    	</form>

	    	<p class="navbar-text navbar-right" style="margin-right:10px">Signed in as </p> <?php echo $_SESSION['userFullName']?>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row row-margin" style="float:none;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div class="well account-div" style="background-color:#FFFFFF;height:440px">
				<h2>Accounts</h2>
				<table class="table table-hover" id="AccountsTable">
				<script type="text/javascript">
					function filter(){
						
						
						var accountTable = document.getElementById("AccountsTable");
						var checkedAccounts = accountTable.getElementsByTagName("input");
						var getString;

						//alert(getString);
						alert(checkedAccounts.length);
					// 	for(var i =0; i<checkedAccounts.length; i++){
					// 		if(checkedAccounts[i].checked){
					// 			var currentRow = $(checkedAccounts[i]).closest('tr');
					// 			var accountName = currentRow.cells[0].innerText;
					// 			getString = getString.concat(accountName,"-");

					// 		}
					// 	}	


					// 	alert(getString);

					// 	if(window.XMLHttpRequest) {
     //       				var	request = new XMLHttpRequest();
					// 	request.onreadystatechange = function() {
			  //           if (request.readyState == 4 && request.status == 200) {
			  //               document.getElementById("transactions").innerHTML = xmlhttp.responseText;
			  //           	}
			  //       	};


			  //       	request.open("GET","getAccounts.php?accounts="+getString,true);
     //    				request.send();
					// }

				}





				</script>
				<?php
// =======
// 				<h2>Accounts</h2>
// 				<table class="table table-hover">
// 					<?php
// >>>>>>> origin
					$existingAccounts = $_SESSION['balanceSheet']->getAccounts();
						foreach($existingAccounts as $account){
						echo "<tr>";
						echo "<td headers="."name>" . $account->getAccountName() . "</td>";
						echo "<td><input type="."checkbox". " name=showAccount "."onClick =" ."filter()"." />"."</td>";
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

		</div>
		</div>

		<div class="row" style="margin:0px auto;float:none;">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			<div class="well" style="background-color:#FFFFFF">
<!-- <<<<<<< HEAD -->
				<!-- <div class="input-group date" data-provide="datepicker">
				    <input type="text" class="form-control">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>








				<h2>Transactions</h2>

				<script>
				  $(function() {
				    $( "#datepicker" ).datepicker();
				  });
				 </script>

 				<p> Date: <input type="text" id="datepicker"></p>
 				<p> asdasda sdasda sdasd as </p> -->


<!--
======= -->
				<h2>Transactions</h2>
				<p>Start Date: <input type="text" id="datepicker" name = "startDate"></p>
				<p>End Date: <input type="text" id="datepicker2" name = "endDate"></p>
<!-- >>>>>>> origin -->
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
					<!-- <tr>
						<td>trying</td>
						<td>2</td>
						<td>4.0</td>
						<td>12/02/2016</td>
					</tr>
					<tr>
						<td>to</td>
						<td>670</td>
						<td>2.1</td>
						<td>05/04/1999</td>
					</tr>
					<tr>
						<td>run</td>
						<td>-6</td>
						<td>-1.5</td>
						<td>06/30/2005</td>
					</tr>
					<tr>
						<td>a test of this</td>
						<td>-7</td>
						<td>7.3</td>
						<td>08/12/1986</td>
					</tr> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
	<script src="graph.js"></script>
</body>
</html>
