<?php
session_start();
unset($_SESSION['success']);
header('Location: ..\manage_user.php'); 
?>