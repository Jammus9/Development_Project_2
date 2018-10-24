<?php
	include 'dbconnect.php';
	
	$data = json_decode(file_get_contents("php://input"));
	
	$search_unitcode = $data->searchUnit;
	
	$query = "SELECT * from units WHERE unitcode='$search_unitcode'";
	$results = mysqli_query($DBConnect, $query);
	
	if($data->searchUnit == "") {
		$query = "SELECT * from units";
		$results = mysqli_query($DBConnect, $query);
	}
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data[] = array(
			"unitcode" => $row['unitcode'],
			"unitname" => $row['unitname']
		);
	}
	
	echo json_encode($data);
?>