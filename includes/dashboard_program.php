<?php
	include 'dbconnect.php';
	
	$queryprogram = mysqli_query($DBConnect, "SELECT programcode, COUNT(programcode) as 'programamount' FROM programs");

	while($row = mysqli_fetch_assoc($queryprogram))
		$data = $row['programamount'];
	echo $data;
?>