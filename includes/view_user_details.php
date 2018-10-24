<?php
	include 'dbconnect.php';
	
	$username = "";
	
	if(isset($_GET['username']) && !empty($_GET['username']))
		$username = $_GET['username'];
	
	$query1 = "SELECT * from user WHERE username='$username'";
	$results = mysqli_query($DBConnect, $query1);
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data = array(
			"username" => $row['username'],
			"fullname" => $row['fullname'],
			"officenumber" => $row['officenumber'],
			"role" => $row['role'],
			"position" => $row['position']
		);
	}
	
	echo json_encode($data);
?>