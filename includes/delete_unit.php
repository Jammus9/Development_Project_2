<?php
	include 'dbconnect.php';
	
	$unitcode = $_GET['id'];
	
	$delete = "DELETE from units WHERE unitcode='$unitcode'";
	mysqli_query($DBConnect, $delete);
?>