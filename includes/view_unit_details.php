<?php
	include 'dbconnect.php';
	
	$unitcode = "";
	
	if(isset($_GET['unitcode']) && !empty($_GET['unitcode']))
		$unitcode = $_GET['unitcode'];
	
	$query1 = "SELECT * from units WHERE unitcode='$unitcode'";
	$results = mysqli_query($DBConnect, $query1);
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data = array(
			"unitcode" => $row['unitcode'],
			"unitname" => $row['unitname'],
			"aim" => $row['aim']
		);
	}
	
	echo json_encode($data);
?>