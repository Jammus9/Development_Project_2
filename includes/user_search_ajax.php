<?php
	include 'dbconnect.php';
	
	$data = json_decode(file_get_contents("php://input"));
	
	$search_username = $data->searchUser;
	
	$query = "SELECT * from user WHERE username='$search_username'";
	$results = mysqli_query($DBConnect, $query);
	
	if($data->searchUser == "") {
		$query = "SELECT * from user";
		$results = mysqli_query($DBConnect, $query);
	}
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data[] = array(
			"username" => $row['username'],
			"fullname" => $row['fullname'],
			"officenumber" => $row['officenumber'],
			"role" => $row['role'],
			"position" => $row['position']
		);
	}
	
	echo json_encode($data);
?>