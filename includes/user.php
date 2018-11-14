<?php
// LOGIN USER
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($DBConnect, $_POST['username']);
	$password = mysqli_real_escape_string($DBConnect, $_POST['password']);

	if (count($errors) == 0) {
		$password = ($password);
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$queryResult = @mysqli_query($DBConnect, $query) or die ("<p>Unable to query the table.</p>"."<p>Error code " .mysqli_errno($DBConnect). ": " .mysqli_error($DBConnect)). "</p>";
		if($row = $queryResult->fetch_assoc()) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['position'] = $row['position'];
			if($row['position'] == "Manager")
				header('location: analytics.php');
			if($row['position'] == "Staff")
				header('location: inventory.php');
		}
		else
			array_push($errors, "Wrong username/password combination");
	}
}
?>