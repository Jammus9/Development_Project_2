<?php
	include 'dbconnect.php';
	
	$data = json_decode(file_get_contents("php://input"));
	
	$search_programcode = $data->searchProgram;
	
	$query = "SELECT * from programs WHERE programcode='$search_programcode'";
	$results = mysqli_query($DBConnect, $query);
	
	if($data->searchProgram == "") {
		$query = "SELECT * from programs";
		$results = mysqli_query($DBConnect, $query);
	}
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data[] = array(
			"programcode" => $row['programcode'],
			"programname" => $row['programname']
		);
	}
	
	echo json_encode($data);
?>