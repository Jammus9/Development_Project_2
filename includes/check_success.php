<?php
session_start();
if (isset($_SESSION['success']))
    echo 'success';
?>