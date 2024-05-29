<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$tailNo = $_POST['tailNo'];
$date = $_POST['date'];
$maintType = $_POST['maintType'];
$reportedBy = $_POST['reportedBy'];
$snag = $_POST['snag'];
$acSystem = $_POST['acSystem'];
$unit = $_POST['unit'];
$correctedBy = $_POST['correctedBy'];
$dateCorrected = $_POST['dateCorrected'];
$defect = $_POST['defect'];
$correctiveAction = $_POST['correctiveAction'];
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
          $remark = validate($remark);
          $uniqId = validate($uniqId);
          $correctedBy = validate($correctedBy);
          $defect = validate($defect);
          $correctiveAction = validate($correctiveAction);
      


     //Insert Data Into the Database. 
     $acDescSQL = "INSERT INTO ac_descrepancy (ID, TAIL_NO, DATE, MAINTENANCE_TYPE, REPORTED_BY, SNAG, AC_SYSTEM, DEFECTS, 
     CORRECTIVE_ACTION, CORRECTED_BY, DATE_CORRECTED, UNIT_CODE, REMARK)
     VALUES ('$uniqId', '$tailNo', '$date', '$maintType', '$reportedBy', '$snag', '$acSystem', '$defect', '$correctiveAction', '$correctedBy', 
     '$dateCorrected', '$unit', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($acDescSQL) == TRUE) {

                $_SESSION["successMessageForNewAcDescWorkRecord"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminAcDescWorkRecord' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                AC DESCREPANCY AND WORK RECORD FOR $tailNo HAS BEEN ADDED SUCCESSFULLY...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added an ac descrepancy and work record for $tailNo to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminAcDescWorkRecord");
                exit();
            }else{

                $_SESSION["failureMessageForNewAcDescWorkRecord"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminAcDescWorkRecord' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                AC DESCREPANCY AND WORK RECORD FOR $tailNo HAS NOT BEEN ADDED. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding an ac descrepancy and work record for $tailNo to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminAcDescWorkRecord");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["failureMessageForNewAcDescWorkRecord"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminAcDescWorkRecord' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                AC DESCREPANCY AND WORK RECORD FOR $tailNo HAS NOT BEEN ADDED. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding an ac descrepancy and work record for $tailNo to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminAcDescWorkRecord");
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
