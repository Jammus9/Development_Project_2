<?php 
	session_start();
	$errors = array();
	
	// connect to database
	$DBConnect = @mysqli_connect('localhost', 'root', '') or die ('Failed to connect to server');
	@mysqli_select_db($DBConnect, 'dp2') or die ('Database not available');
?>