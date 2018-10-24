<?php
	include 'dbconnect.php';
	
	$queryunit = mysqli_query($DBConnect, "SELECT unitcode, COUNT(unitcode) as 'unitamount' FROM units");

	while($row = mysqli_fetch_assoc($queryunit))
		$data = $row['unitamount'];
	echo $data;
?>