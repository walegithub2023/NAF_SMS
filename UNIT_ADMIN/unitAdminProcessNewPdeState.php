<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$svcNo = $_POST['svcNo'];
$pdeState = $_POST['pdeState'];
$unit = $_POST['unit'];
$date = $_POST['date'];
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
      

   //select all pers already added to today's parade state
    $todaysDate = date("Y-m-d");
    $account = $_SESSION['account'];
    $alreadyAddedToPdeStateSQL = "SELECT * FROM pde_state WHERE SVC_NO = '$svcNo' AND (`DATE`) = '$date' AND UNIT_CODE = '$account'";
    $pdeStateResult = mysqli_query($conn, $alreadyAddedToPdeStateSQL);
    $totalPdeStateResultRecords = mysqli_num_rows($pdeStateResult);  
 

    //check if a pers is already in the pde state 
    if($totalPdeStateResultRecords > 0) {
        // If the record already exists, do not proceed with the insertion
                $_SESSION["alreadyAddedMessageForNewPdeState"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPdeState' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $svcNo HAS ALREADY BEEN ADDED TO PDE STATE. CHOOSE A DIFFERENT SVC_NO.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding $svcNo to pde state";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPdeState");
                exit();
    }else {

     //Insert Data Into the Database. 
     $pdeStateSQL = "INSERT INTO pde_state (ID, SVC_NO, PDE_STATE, UNIT_CODE, DATE, REMARK)
     VALUES ('$uniqId', '$svcNo', '$pdeState', '$unit', '$date', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($pdeStateSQL) == TRUE) {

                $_SESSION["successMessageForNewPdeState"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPdeState' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $svcNo HAS BEEN ADDED TO TODAY'S PDE STATE.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added $svcNo to the pde state";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPdeState");
                exit();
            }else{

                $_SESSION["failureMessageForNewPdeState"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPdeState' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $svcNo has not been added to the pde state. Try again...!
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding $svcNo to pde state";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPdeState");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["failureMessageForNewPdeState"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPdeState' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $svcNo has not been added to the pde state. Try again...!
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding $svcNo to pde state";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPdeState");
                exit();
        }

}
}
?>
<?php 
}else{
    header("Location: ../login");
    exit();
}
?>
