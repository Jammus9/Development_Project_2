<?php
	include 'dbconnect.php';
	
	$query1 = "SELECT * from programs";
	$results = mysqli_query($DBConnect, $query1);
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data[] = array(
			"programcode" => $row['programcode'],
			"programname" => $row['programname']
		);
	}
	
	echo json_encode($data);
?>