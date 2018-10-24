<?php
	include 'dbconnect.php';
	
	$data = array();
	
	$queryrole = mysqli_query($DBConnect, "SELECT role, COUNT(role) as 'roleamount' FROM user GROUP BY role");

	while($row = mysqli_fetch_assoc($queryrole))
		$data[] = array('role' => $row['role'], 'amount' => $row['roleamount']);
	echo json_encode($data);
?>