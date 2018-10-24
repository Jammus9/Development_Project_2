<?php
	include 'dbconnect.php';
	
	if(isset($_POST['unitcode']) && 
	isset($_POST['unitname']) && 
	isset($_POST['aim']))
		if(!empty($_POST['unitcode']) && 
		!empty($_POST['unitname']) && 
		!empty($_POST['aim'])){
			$unitcode = $_POST['unitcode'];
			$unitname = $_POST['unitname'];
			$aim = $_POST['aim'];
			$SQLString = "INSERT INTO units (unitcode, unitname, aim) VALUES ('$unitcode', '$unitname', '$aim')";
			//echo $SQLString;
			if($DBConnect->query($SQLString) === TRUE)
				$data = "Record updated successfully";
			else
				$data = "Error updating record: " . $conn->error;
		}
	echo json_encode($data);
	$DBConnect->close();
?>