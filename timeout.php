<?php
	if(!session_id()) {
		session_start();
	}
	require_once("header.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	echo "<div 
		style ='
		top:0px;
		left:0px;
		position:absolute;
		z-index:100; 
		height: 100%; 
		width:100%; 
		background-color:rgba(0,5,80,0.8);
		color:white; padding-top:20%; text-align:center;'
		>
		<h1>Sorry, you've logged in unsuccessfully too many times.<br>Try again in 30 seconds.</h2>
		</div>
		";

	ob_end_flush();  
    flush(); 
    
    sleep($_SESSION['timeout'] + 10 - time());
	// while ($_SESSION['timeout'] + 30 > time())
	// {}

	session_unset();
	session_destroy();

	$URL="http://52.11.14.115/CS310-Finance/login.php";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
?>