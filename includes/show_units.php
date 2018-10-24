<?php
	include 'dbconnect.php';
	
	$query1 = "SELECT * from units";
	$results = mysqli_query($DBConnect, $query1);
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data[] = array(
			"unitcode" => $row['unitcode'],
			"unitname" => $row['unitname']
		);
	}
	
	echo json_encode($data);
?>