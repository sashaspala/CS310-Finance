<?php
// if(!session_id()) {
   session_start();
// }
require_once("Classes/DataManager.php");
//TODO FIX BALANCESHEET
require_once("Classes/BalanceSheet.php");
require_once("header.php");



//LOADS PERSISTENT DATA

$accounts = DataManager::getInstance()->getAccountsForUser(1);

//TODO FIX BALANCESHEET
//session_write_close();
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
	    	<form action="csvhandler.php" method = "post" enctype="mulipart/form-data" class="navbar-left">
		    	<span class="btn btn-default btn-file">
				    Select CSV <input type="file" accept=".csv" id="csvChooser" name="csvfilename">
				</span>
				<input type="submit" id="csvSubmit" value= "Upload" class="btn btn-default btn-file">
			</form>
			<form action="logoutHandler.php" method = "get" class="navbar-right">
				<p class="navbar-text" style="margin-right:10px">Signed in as <?php echo $_SESSION['userFullName']?> </p>
	    		<button type="submit" id="logout" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Logout</button>
	    	</form>
		</div>
	</nav>

	<form name="removeAccountForm" id="removeAccountForm" action="dashboard.php" method='get'>
	<div class="container-fluid">
		<div class="row row-margin" style="float:none;">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="well account-div" style="background-color:#FFFFFF;height:570px">
				<h2>Accounts</h2>
				<table class="table table-hover" id="AccountsTable">
				<script type="text/javascript">
					function filter(){

						var accountTable = document.getElementById("AccountsTable");
						var checkedAccounts = accountTable.getElementsByTagName("input");
						var getString = "";



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

				</script>
				<?php
					$existingAccounts = DataManager::getInstance()->balanceSheet->getAccounts();

						foreach($existingAccounts as $account){
						echo "<tr>";
						echo "<td headers="."name>" . $account->getAccountName() . "</td>";
						echo "<td><input type="."checkbox". " name=showAccount "."onClick =" ."filter()"." />"."</td>";
						echo "</tr>";
						}
				?>

				<script type="text/javascript">
				function checkboxFilter(){
						var accountTable = document.getElementById("AccountsTable");
						var checkedAccounts = accountTable.getElementsByTagName("input");
						var getString = "";



						var accountFound = false;


						for(var i =0; i<checkedAccounts.length; i++){
							if(checkedAccounts[i].checked){
								//alert("yes");
								 var currentRow = $(checkedAccounts[i]).closest('tr');

								 var accountName = $(currentRow).children()[0].innerText;

								 getString += accountName + "-";
								// array_push($nameArray, $accountName);
							}
						}


						if(getString != ""){
							 $.get("removeAccountHandler.php", {
							 	accounts : getString }).done(function(data) {
								$("#AccountTable").html(data);
								});


						}
					//ajax request


				}
				</script>

				</table>
				<div class="account-btn">
					<button type="button" id="removeAccount" onClick="checkboxFilter()" class="btn btn-danger">Remove</button>
				</div>
			</div>
		</div>
		</form>

		<script type="text/javascript">
			$('#removeAccountForm').submit(function() {
				$.ajax({
					data: $(this).serialize(),
					type: $(this).attr('method'),
					url: $(this).attr('action'),
					success: function(response) {
						$('#AccountsTable').html(response);
					}
				});
				return false;
			});
		</script>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="well" style="background-color:#FFFFFF">
				<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto">






				</div>
				<!-- <form class="form-recalculate-graph" id="form-recalculate-graph" action='dateChangeHandler.php' method='get' accept-charset='UTF-8'> -->
					<p>Start Date: <input type="text" id="datepicker1" name = "StartDate"></p>
					<p>End Date: <input type="text" id="datepicker2" name = "EndDate"></p>
					<!-- <input type="submit" id="dateSubmit" value= "Upload" class="btn btn-default btn-file"> -->
		      		<script type="text/javascript">
					function reCalculate(){

						var StartDate = $( "#datepicker1" ).datepicker( "getDate" );
						var EndDate = $( "#datepicker2" ).datepicker( "getDate" );
					 	$.get("dateChangeHandler.php", {
						 	startDate: StartDate,
						 	endDate: EndDate
						 }).done(function(data) {
							alert(data);
							$('#graph').highcharts({
							        title: {
							            text: 'Finances',
							            x: -20 //center
							        },
							        xAxis: {
							            categories: ['Jan', 'Feb', 'March']
							        },
							        yAxis: {
							            title: {
							                text: 'Amount in $'
							            },
							            plotLines: [{
							                value: 0,
							                width: 1,
							                color: '#808080'
							            }]
							        },
							        tooltip: {
							            valuePrefix: '$'
							        },
							        legend: {
							            layout: 'vertical',
							            align: 'right',
							            verticalAlign: 'middle',
							            borderWidth: 0
							        },
							        series: data; 
							    });


						});
					}
					</script>
					<button  class="btn btn-lg btn-primary btn-block" type="button" onClick="reCalculate()">Recalculate</button>



		      	<!-- </form> -->
			</div>

		</div>
		</div>

		<div class="row" style="margin:0px auto;float:none;">
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
			<div class="well" style="background-color:#FFFFFF">

				<h2>Transactions</h2>
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

					<tbody id=ajaxtable>
					



					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Budgets</h2>
				<form id="create" class="form-select-budget" action='selectBudget.php' method='post' accept-charset='UTF-8'>
					<div class="combo-box">
					<p><font size="3">Select a budget to view:</font>
					<select name="budgets">
						<option selected="selected">Select a budget</option>
					  		<?php
					  			$categories = DataManager::getInstance()->findCategoriesForUser(1);
					    		foreach($categories as $name) { ?>
						      	<option value="<?php echo $name ?>"><?php echo $name ?></option>
						  		<?php
						    } ?>
					</select>
					<select name="months">
						<option selected="selected">Select a month</option>
					  	<option value="January">January</option>
					  	<option value="February">February</option>
					  	<option value="March">March</option>
					  	<option value="April">April</option>
					  	<option value="May">May</option>
					  	<option value="June">June</option>
					  	<option value="July">July</option>
					  	<option value="August">August</option>
					  	<option value="September">September</option>
					  	<option value="October">October</option>
					  	<option value="November">November</option>
					  	<option value="December">December</option>
					</select>
					<input type="submit" id="bugdetSubmit" name="bugdetSubmit" value= "View" class="btn btn btn-warning">
					</p>
					</div>
					<script type="text/javascript">
						$('#create').submit(function() {
						    $.ajax({
						        data: $(this).serialize(),
						        type: $(this).attr('method'),
						        url: $(this).attr('action'),
						        success: function(response) {
						            $('#budgetInfo').html(response);
						        }
						    });
						    return false;
						});
					</script>
					<div id="budgetInfo"></div>
		      	</form>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript">

	$(function () {
    $('#graph').highcharts({
        title: {
            text: 'Finances',
            x: -20 //center
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'March']
        },
        yAxis: {
            title: {
                text: 'Amount in $'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Liabilities',
            data: [7.0, 6.9, 9.5]
        }, {
            name: 'Assets',
            data: [-0.2, 0.8, 5.7]
        }, {
            name: 'Net Worth',
            data: [-0.9, 0.6, 3.5]
        }, {
            name: 'Account 1', //this should update automatically from some function call
            data: [3.9, 4.2, 5.7]
        }]
    });
});

$(function() {
    $( "#datepicker" ).datepicker();
});







	</script>
</body>
</html>
