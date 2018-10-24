<?php
	include 'dbconnect.php';
	
	$queryuser = mysqli_query($DBConnect, "SELECT username, COUNT(username) as 'useramount' FROM user");

	while($row = mysqli_fetch_assoc($queryuser))
		$data = $row['useramount'];
	echo $data;
?>