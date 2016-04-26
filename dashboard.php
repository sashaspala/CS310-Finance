<?php

require_once("Classes/DataManager.php");
//TODO FIX BALANCESHEET
require_once("Classes/BalanceSheet.php");
require_once("header.php");

if(!session_id()) {
   session_start();
}

//LOADS PERSISTENT DATA

$accounts = DataManager::getInstance()->getAccountsForUser(1);

//TODO FIX BALANCESHEET
$balanceSheet = new BalanceSheet($accounts);
$_SESSION['balanceSheet'] = $balanceSheet;
$_SESSION['dataManager'] = DataManager::getInstance();

?>
<head>
	<link rel="stylesheet"   type="text/css" href="styles.css">
	<!-- Script for date Picker
	datepicker represents start date
	datepicker 2 represents end date
	 -->
	<script>
	  $(function() {
	    $( "#datepicker1" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker2" ).datepicker();
	  });
  	</script>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar">
		<div class="container-fluid">
	    	<form action="csvhandler.php" method = "post" enctype="mulipart/form-data">
		    	<span class="btn btn-default btn-file">
				    Select CSV <input type="file" accept=".csv" id="csvChooser" name="csvfilename">
				</span>
				<input type="submit" id="csvSubmit" value= "Upload" class="btn btn-default btn-file"> 
				<p class="navbar-text navbar-right" style="margin-right:10px">Signed in as </p> <?php echo $_SESSION['userFullName']?>
			</form>
			<form action="logoutHandler.php" method = "GET">
	    		<button type="submit" id="logout" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Logout</button>
	    	</form>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row row-margin" style="float:none;">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="well account-div" style="background-color:#FFFFFF;height:440px">
				<h2>Accounts</h2>
				<table class="table table-hover" id="AccountsTable">
				<script type="text/javascript">
					function filter(){

						var accountTable = document.getElementById("AccountsTable");
						var checkedAccounts = accountTable.getElementsByTagName("input");
						var getString = "";

						//alert(getString);
						//alert(checkedAccounts.length);

						var accountFound = false;

						for(var i =0; i<checkedAccounts.length; i++){
							if(checkedAccounts[i].checked){
								//alert("yes");
								 var currentRow = $(checkedAccounts[i]).closest('tr');

								 var accountName = $(currentRow).children()[0].innerText;

								 accountFound = true;

								getString += accountName + "-";
								//alert(getString);

							}
						}

// <<<<<<< HEAD
						if(getString != ""){
							 $.get("Classes/getAccounts.php", { accounts : getString }).done(function(data) {
								console.log('finished');
								$("#ajaxtable").html(data);
								});


						}
						else
						{
							$("#ajaxtable").html("<table id='transactions' class='table table-bordered table-hover sortable'><thead><tr><th>Name</th><th>Type</th><th>Amount</th><th>Date</th></tr></thead><tbody></tbody></table>");
						}


					//ajax request

					
				}


// =======
// 						if (!accountFound) {
// 							console.log("nothing checked"); 
// 						}
// 					//ajax request

// 					$.get("Classes/getAccounts.php", { accounts : getString }).done(function(data) {
// 						console.log(data);
// 						$("#ajaxtable").html(data);

// 						// var table = document.getElementById("transactions");
// 						// $(table).html("result");
// 					});

// 				}
// >>>>>>> 25e5ee2e54612e4ba8e4bc3507fba5f6edd98023
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
					<button type="button" id="addAccount" class="btn btn-success">Add</button>
					<button type="button" id="removeAccount" class="btn btn-danger">Remove</button>
				</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="well" style="background-color:#FFFFFF">
				<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto">
					





				</div>
			</div>

		</div>
		</div>

		<div class="row" style="margin:0px auto;float:none;">
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
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
				
				<h2>Transactions</h2>
				<form class="form-recalculate-graph" action='dateChangeHandler.php' method='post' accept-charset='UTF-8'>
					<p>Start Date: <input type="text" id="datepicker1" name = "startDate"></p>
					<p>End Date: <input type="text" id="datepicker2" name = "endDate"></p>
					<!-- <input type="submit" id="dateSubmit" value= "Upload" class="btn btn-default btn-file"> -->
					<button  class="btn btn-lg btn-primary btn-block" type="submit" id="dateButton" name = "dateSubmit">Re-Calculate</button>
		      	</form>
<!-- >>>>>>> origin -->
	<div id=ajaxtable>
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

						<!-- <p>hello</p>
					<tr>
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
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Budgets</h2>
				<form class="form-select-budget" action='selectBudget.php' method='post' accept-charset='UTF-8'>
					<div class="combo-box">
					<p>Select a budget to view:
					<select>
						<option selected="selected">Budgets</option>
					  		<?php
					  			$categories = DataManager::getInstance()->findCategoriesForUser(1);
					  			echo sizeof($categories);
					    		foreach($categories as $name) { ?>
						      	<option value="<?php echo $name['name'] ?>"><?php echo $name['name'] ?></option>
						  		<?php
						    } ?>
					</select>
					</p>
					<input type="submit" id="bugdetSubmit" value= "View" class="btn btn btn-warning">
					</div>
		      	</form>
			</div>
		</div>
	</div>
	</div>
	<script src="graph.js"></script>
</body>
</html>
