<?php
	include 'dbconnect.php';
	
	$data = array();
	
	$queryposition = mysqli_query($DBConnect, "SELECT position, COUNT(position) as 'positionamount' FROM user GROUP BY position");
	
	while($row = mysqli_fetch_assoc($queryposition))
		$data[] = array('position' => $row['position'], 'amount' => $row['positionamount']);
	echo json_encode($data);

?>