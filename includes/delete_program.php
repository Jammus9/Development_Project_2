<?php
	include 'dbconnect.php';
	
	$programcode = $_GET['id'];
	
	$delete = "DELETE from programs WHERE programcode='$programcode'";
	mysqli_query($DBConnect, $delete);
?>