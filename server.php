<?php
    session_start();
    // connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'sales');
	$errors = array();
	
	if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $fname = $_POST['fullname'];
        $onumber = $_POST['onumber'];
        $role = $_POST['role'];
        $position = $_POST['position'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
	

			$sql = "INSERT INTO user (email, fullname, onumber, role, position, password, conpassword) 
            VALUES('{$email}', '{$fname}', '{$onumber}' ,'{$role}' ,'{$position}' ,'{$password}', '{$conpassword}')";
            mysqli_query($con,$sql);
        echo "<script>alert('Registration Successful'); location = 'login.php';</script>";
         
	}

/* 	if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $fname = $_POST['fullname'];
        $onumber = $_POST['onumber'];
        $role = $_POST['role'];
        $position = $_POST['position'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
	

			$sql = "INSERT INTO user (email, fullname, onumber, role, position, password, conpassword) 
            VALUES('{$email}', '{$fname}', '{$onumber}' ,'{$role}' ,'{$position}' ,'{$password}', '{$conpassword}')";
            mysqli_query($con,$sql);
        echo "<script>alert('Registration Successful'); location = 'login.php';</script>";
         
	}
	
if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
			$result = "select * from user where email='$email' AND password='$password'";
            $row = mysqli_query($con,$result);
    
            if( mysqli_num_rows($row) == 1)
            {
                $r = mysqli_fetch_array($row);
                
                if($r['role'] == 'Teaching Staff')
                {
                    echo "<script> location = 'teachingstaff.php';</script>";
                }
                else if($r['role'] == 'Program Leader')
                {
                   
                    echo "<script> location = 'proglead.php';</script>";
                }
                else if($r['role'] == 'System Administrator')
                {
                    echo "<script> location = 'sysadmin.php';</script>";
                }
            }
            else
            {
                echo "No connection";
            }
    
           
           
		} */
?>