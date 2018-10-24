<?php
	include 'dbconnect.php';
	
	if(isset($_POST['programcode']) && 
	isset($_POST['programname']))
		if(!empty($_POST['programcode']) && 
		!empty($_POST['programname'])){
			$programcode = $_POST['programcode'];
			$programname = $_POST['programname'];
			$SQLString = "INSERT INTO programs (programcode, programname) VALUES ('$programcode', '$programname')";
			//echo $SQLString;
			if($DBConnect->query($SQLString) === TRUE)
				$data = "Record updated successfully";
			else
				$data = "Error updating record: " . $DBConnect->error;
		}
	echo json_encode($data);
	$DBConnect->close();
?>