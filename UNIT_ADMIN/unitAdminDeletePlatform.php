<?php
session_start();
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['platformId'])){
        $platformId = $_GET['platformId'];
        $deleteSQL = "DELETE FROM platform WHERE PLATFORM_ID = '$platformId'";

       $deleteResult = mysqli_query($conn, $deleteSQL);

       if($deleteResult == true){
        
                $_SESSION["successMessageForDelete"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                 PLATFORM DELETED SUCCESSFULLY......
                </div>";

          //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "delete";
                $description = "$userSvcNo"." "." deleted a platform from the database";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
                exit();
       }else{

                $_SESSION["failureMessageForDeletePlatform"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                YOUR ATTEMPT TO DELETE THIS PLATFORM HAS FAILED......
                </div>";

        //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "." tried deleting a platform from the database";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
                exit();

       }
       
}

?>
