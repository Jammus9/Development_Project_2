<?php
	include 'dbconnect.php';
	
	$productID = $_GET['id'];
	
	$delete = "DELETE from products WHERE productID='$productID'";
	mysqli_query($DBConnect, $delete);
	header('location: ../product_overview.php');
?>