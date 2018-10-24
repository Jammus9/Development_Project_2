<?php
	// REGISTER USER
	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($DBConnect, $_POST['username']);
		$password_1 = mysqli_real_escape_string($DBConnect, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($DBConnect, $_POST['password_2']);
		$fullname = mysqli_real_escape_string($DBConnect, $_POST['fullname']);
		$officenumber = mysqli_real_escape_string($DBConnect, $_POST['officenumber']);
		$role = mysqli_real_escape_string($DBConnect, $_POST['role']);
		$position = mysqli_real_escape_string($DBConnect, $_POST['position']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
		if (empty($officenumber)) { array_push($errors, "Office Number is required"); }
		if (empty($role)) { array_push($errors, "Role is required"); }
		if (empty($position)) { array_push($errors, "Position is required"); }
		
		// form validation: check if username input already exists in database
		$chkusernamequery = "SELECT * FROM user WHERE username='$username'";
		$resultusernamequery = mysqli_query($DBConnect, $chkusernamequery);
		if (mysqli_num_rows($resultusernamequery) == 1) { array_push($errors, "Username already exists, please input different username"); }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO user (username, password, fullname, officenumber, role, position) 
					  VALUES('$username', '$password', '$fullname', '$officenumber', '$role', '$position')";
			mysqli_query($DBConnect, $query);
			$_SESSION['success'] = "User has been successfully registered!";
		}
	}
?>