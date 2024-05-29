<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addNewPers'])) {


$persType = $_POST['persType'];
$svcNo = $_POST['svcNo'];
$rank = $_POST['rank'];
$initials = $_POST['initials'];
$surname = $_POST['surname'];
$specialty_trade = $_POST['specialty_trade'];
$presentUnit = $_POST['presentUnit'];
$dtos = $_POST['dtos'];
$dob = $_POST['dob'];
$lastUnit = $_POST['lastUnit'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$appt = $_POST['appt'];
$state = $_POST['state'];
$lga = $_POST['lga'];
$remark = $_POST['remark'];



                
    
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
          //validate user input
          $svcNo = validate($svcNo);
          $initials = validate($initials);
          $surname = validate($surname);
          $email = validate($email);
          $phone = validate($phone);
          $appt = validate($appt);
          $state = validate($state);
          $lga = validate($lga);
          $remark = validate($remark);
      



     //Insert pers Data Into the Database. 
     $persSQL = "INSERT INTO pers (SVC_NO, RANK, INITIALS, SURNAME, SPECIALTY_TRADE, PHONE, DOB, UNIT, APPT, DTOS, LAST_UNIT, STATE, LGA, PERS_TYPE, EMAIL, REMARK)
     VALUES ('$svcNo', '$rank', '$initials', '$surname', '$specialty_trade', '$phone', '$dob', '$presentUnit', '$appt', '$dtos', '$lastUnit', '$state', '$lga', '$persType', '$email','$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($persSQL) == TRUE) {

                $_SESSION["successMessageForNewPers"] = '<div class="alert alert-dismissible" style="background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="unitAdminPers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                NEW PERSONNEL ('.$svcNo.') CREATED SUCCESSFULLY......
                </div>';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created a new pers of type->$persType and svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPers");
                exit();
            }else{

                $_SESSION["failureMessageForNewPers"] = '<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="unitAdminPers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                OOPS...! IT IS EITHER THIS PERS ALREADY EXISTS OR HE/SHE IS NOT IN THIS UNIT. INPUT A DIFFERENT SVC NO.
                </div>';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a new pers of type->$persType and svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPers");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["errorMessageForNewPers"] = '<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="unitAdminPers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                OOPS...! IT IS EITHER THIS PERS ALREADY EXISTS OR HE/SHE IS NOT IN THIS UNIT. INPUT A DIFFERENT SVC NO.
                </div>';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a new pers of type->$persType and svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPers");
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
