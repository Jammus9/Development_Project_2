<?php
	include 'dbconnect.php';
	
	if(isset($_POST['originalusername']) && 
	isset($_POST['username']) && 
	isset($_POST['fullname']) && 
	isset($_POST['officenumber']) && 
	isset($_POST['role']) && 
	isset($_POST['position']))
		if(!empty($_POST['originalusername']) && 
		!empty($_POST['username']) && 
		!empty($_POST['fullname']) && 
		!empty($_POST['officenumber']) && 
		!empty($_POST['role']) && 
		!empty($_POST['position'])){
			$originalusername = $_POST['originalusername'];
			$fullname = $_POST['fullname'];
			$username = $_POST['username'];
			$officenumber = $_POST['officenumber'];
			$role = $_POST['role'];
			$position = $_POST['position'];
			$SQLString = "UPDATE user SET username='$username', fullname='$fullname', officenumber='$officenumber', role='$role', position='$position' WHERE username='$originalusername'";
			//echo $SQLString;
			if($DBConnect->query($SQLString) === TRUE)
				echo "Record updated successfully";
			else
				echo "Erro updating record: " . $DBConnect->error;
		}
	$DBConnect->close();
?>