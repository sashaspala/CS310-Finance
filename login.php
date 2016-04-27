<?php
	if(!session_id()) {
		session_start();
	}

	require_once("header.php");
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	

	if (!isset($_SESSION['timeout']))
	{
		echo "setting timerout";
		$_SESSION['timeout'] = 0;
	}

	if (!isset($_SESSION['timeout_count']))
	{
		$_SESSION['timeout_count'] = 0;
	}

	echo $_SESSION['timeout_count'];

	if ($_SESSION['timeout_count'] > 3)
	{
		echo ">3";
		$_SESSION['timeout'] = time();
		header("Location: timeout.php");
	}
?>	




<head>
    <link href="login.css" rel="stylesheet">
</head>
	<body>
		<div class="timeout" id="timeout">
			<h1>Sorry, you've logged in unsuccessfully too many times.<br>Try again in two minutes.</h1>
		</div>
		<div class="container">
			<div class="col-md-4 well" style="margin:40px auto; float:none;background-color: #EFEFEF;" id="textFields">
		    	<form class="form-signin" action='<?php echo "loginhandler.php" ?>' method='post' accept-charset='UTF-8'>
			        <h2 class="form-signin-heading">Sign In</h2>
			        <label for="inputEmail" class="sr-only">Email</label>
			        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
			        <label for="inputPassword" class="sr-only">Password</label>
			        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			        <button  class="btn btn-lg btn-primary btn-block" type="submit" id="loginButton" name = "login">Sign in</button>
		      	</form>
		    </div>
    	</div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
