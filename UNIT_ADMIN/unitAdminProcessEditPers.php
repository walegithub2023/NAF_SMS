<?php
session_start();
include('../Connection.php');
include('../functions.php');

if(isset($_POST['update'])){

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
    
    
   
try{

    $updateSQL = "UPDATE pers SET RANK = '$rank', INITIALS = '$initials', SURNAME = '$surname', 
    SPECIALTY_TRADE = '$specialty_trade', PHONE = '$phone', DOB = '$dob', UNIT = '$presentUnit', APPT = '$appt', DTOS = '$dtos', 
    LAST_UNIT = '$lastUnit', STATE = '$state', LGA = '$lga', PERS_TYPE = '$persType', EMAIL = '$email', REMARK = '$remark'
    WHERE SVC_NO = '$svcNo'";
     
    
    //Check whether record has been inserted successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {

        $_SESSION["successMessageForEditPers"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="unitAdminPers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                PERSONNEL RECORD UPDATED SUCCESSFULLY......
                </div>';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "update";
                $description = "$userSvcNo"." "."updated a pers record with svc no->$svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPers");
                exit();

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }

}
?>