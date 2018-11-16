<?php
	include 'dbconnect.php';

	$PName= $_POST['PName'];
	echo $PName;

	// $var = "Product 1";
	
	// $orders_data = array();
	
	// $query_orders_data_result = mysqli_query($DBConnect, "SELECT productName, SUM(quantity) as sum, date FROM orders WHERE productName = 'Product 1' ORDER BY sum");

	// // $query_orders_data_result = mysqli_query($DBConnect, "SELECT productName, SUM(quantity) as sum, date FROM orders GROUP BY productName ORDER BY sum");
	
	// foreach($query_orders_data_result as $row)
	// 	$orders_data[] = $row;
	
	// echo json_encode($orders_data);
?>