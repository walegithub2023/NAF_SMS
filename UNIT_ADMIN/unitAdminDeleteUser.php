<?php
session_start();
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['svcNo'])){
        $svcNo = $_GET['svcNo'];
        $deleteSQL = "DELETE FROM users WHERE SVC_NO = '$svcNo'";

       $deleteResult = mysqli_query($conn, $deleteSQL);

       if($deleteResult == true){

          //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "delete";
                $description = "$userSvcNo"." "." deleted user $svcNo from the database";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminUsers");
                exit();
       }else{
        //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "." tried deleting user $svcNo from the database";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminUsers");
                exit();

       }
       
}

?>
