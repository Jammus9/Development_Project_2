<?php
	include 'dbconnect.php';
	
	$programcode = "";
	
	if(isset($_GET['programcode']) && !empty($_GET['programcode']))
		$programcode = $_GET['programcode'];
	
	$query1 = "SELECT * from programs WHERE programcode='$programcode'";
	$results = mysqli_query($DBConnect, $query1);
	
	$data = array();
	
	while ($row = mysqli_fetch_array($results)) {
		$data = array(
			"programcode" => $row['programcode'],
			"programname" => $row['programname']
		);
	}
	
	echo json_encode($data);
?>