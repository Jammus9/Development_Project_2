<?php
	include 'dbconnect.php';
	
	if(isset($_POST['originalprogramcode']) && 
	isset($_POST['programcode']) && 
	isset($_POST['programname']))
		if(!empty($_POST['originalprogramcode']) && 
		!empty($_POST['programcode']) && 
		!empty($_POST['programname'])){
			$originalprogramname = $_POST['originalprogramcode'];
			$programcode = $_POST['programcode'];
			$programname = $_POST['programname'];
			$SQLString = "UPDATE programs SET programcode='$programcode', programname='$programname'";
			//echo $SQLString;
			if($DBConnect->query($SQLString) === TRUE)
				$data = "Record updated successfully";
			else
				$data = "Error updating record: " . $DBConnect->error;
		}
	echo json_encode($data);
	$DBConnect->close();
?>