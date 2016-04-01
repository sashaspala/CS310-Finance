<?php
	if(!session_id()) {
		session_start();
	}
	require_once("header.php");
?>	
<head>
    <link href="login.css" rel="stylesheet">
</head>
	<body>
		<div class="container">
			<div class="col-md-4 well" style="margin:40px auto; float:none;background-color: #EFEFEF;">
		    	<form class="form-signin" action='loginhandler.php' method='post' accept-charset='UTF-8'>
		        <h2 class="form-signin-heading">Sign In</h2>
		        <label for="inputEmail" class="sr-only">Email</label>
		        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		        <button class="btn btn-lg btn-primary btn-block" type="submit" name = "login">Sign in</button>
		      	</form>
		    </div>
    	</div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>