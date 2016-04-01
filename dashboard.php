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
	    	<button type="button" class="btn btn-default navbar-btn">Upload CSV</button>
	    	<button type="button" class="btn btn-default navbar-btn navbar-right" style="margin-right:0px">Log Out</button>
	    	<p class="navbar-text navbar-right" style="margin-right:10px">Signed in as William GJ Halfond</p>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row" style="margin:100px auto; float:none;padding">
		<div class="col-md-2">
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

		<div class="col-md-6">
			<div class="well" style="background-color:#FFFFFF">
				<h2>Graph goes here</h2>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well" style="background-color:#FFFFFF">
				<table class="table table-bordered table-hover">
					<thead>
						<tr><th colspan="4">Transactions</th></tr>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>Amount</th>
							<th>Type</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
