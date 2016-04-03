<?php
	session_start();

	require_once("header.php");
?>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
	    	<span class="btn btn-default btn-file">
			    Upload CSV <input type="file" accept=".csv">
			</span>
	    	<button type="button" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Log Out</button>
	    	<p class="navbar-text navbar-right" style="margin-right:10px">Signed in as William GJ Halfond</p>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row" style="margin:100px auto;float:none;padding">
		<div class="col-md-2 col-sm-2">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Accounts</h2> 
				<table class="table table-hover">
					<tr>
						<td>Account 1</td>
						<td><input type="checkbox" name="showAccount"/></td>
					</tr>
					<tr>
						<td>Account 2</td>
						<td><input type="checkbox" name="showAccount"/></td>
					</tr>
					<tr>
						<td>Account 3</td>
						<td><input type="checkbox" name="showAccount"/></td>
					</tr>
					<tr>
						<td>Account 4</td>
						<td><input type="checkbox" name="showAccount"/></td>
					</tr>
				</table>
				<button type="button" class="btn btn-success">Add</button>
				<button type="button" class="btn btn-danger">Remove</button>
			</div>
		</div>

		<div class="col-md-6 col-sm-6">
			<div class="well" style="background-color:#FFFFFF">
				<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Transactions</h2>
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
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
	<script src="graph.js"></script>
</body>
</html>
