<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {


$type = $_POST['type'];
$svcNo = $_POST['svcNo'];
$destination = $_POST['destination'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$unit = $_POST['unit'];
$reason = $_POST['reason'];
$remark = $_POST['remark'];


$uniqId = uniqid();
    
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
          //validate user input
          $svcNo = validate($svcNo);
          $destination = validate($destination);
          $reason = validate($reason);
          $remark = validate($remark);
          $uniqId = validate($uniqId);
      


if($endDate > $startDate){
     //Insert Data Into the Database. 
     $leavePassSQL = "INSERT INTO leave_pass (ID, SVC_NO, REASON, DESTINATION, START_DATE, END_DATE, UNIT_CODE, TYPE, REMARK)
     VALUES ('$uniqId', '$svcNo', '$reason', '$destination', '$startDate', '$endDate', '$unit', '$type', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($leavePassSQL) == TRUE) {

                $_SESSION["successMessageForNewLeaveAndPass"] = "<div class='alert alert-dismissible' style='background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminNewLeaveAndPass' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                YOUR PERS HAS BEEN SENT ON $type SUCCESSFULLY...
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created a new $type record  for svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminNewLeaveAndPass");
                exit();
            }else{

                $_SESSION["failureMessageForNewLeaveAndPass"] = "<div class='alert alert-dismissible' style='background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminNewLeaveAndPass' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! YOUR CREATION OF $type HAS FAILED.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a new $type for svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminNewLeaveAndPass");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["failureMessageForNewLeaveAndPass"] = "<div class='alert alert-dismissible' style='background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminNewLeaveAndPass' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! YOUR CREATION OF $type HAS FAILED.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a new $type for svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminNewLeaveAndPass");
                exit();
     
            }
        }
            else{
               $_SESSION["failureMessageForNewLeaveAndPass"] = "<div class='alert alert-dismissible' style='background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminNewLeaveAndPass' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! YOUR CREATION OF $type HAS FAILED. YOUR $type END DATE MUST BE GREATER/AFTER THE START DATE.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a new $type for svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminNewLeaveAndPass");
                exit(); 
            }
}
?>
<?php 
}else{
    header("Location: ../login");
    exit();
}
  ?>
