<?php
session_start();
include('Connection.php');
include('functions.php');

//declare or prepare variables for log_event function
$svcNo = $_SESSION['svcNo'];
$action = "Logout";
$description = "$svcNo"." "."Logged out";
$unitCode = $_SESSION['account'];

 //call the log_event function
log_event($conn, $svcNo, $action, $description, $unitCode);
            
//unset and destroy session variables
session_unset();
session_destroy();

//redirect user to login page 
header("Location: login");
?>