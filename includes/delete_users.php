<?php
	include 'dbconnect.php';
	
	$username = $_GET['id'];
	
	$delete = "DELETE from user WHERE username='$username'";
	mysqli_query($DBConnect, $delete);
?>