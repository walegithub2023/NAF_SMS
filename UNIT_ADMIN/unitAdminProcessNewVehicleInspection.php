<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$vehicle = $_POST['vehicle'];
$lastRoutineSvcDate = $_POST['lastRoutineSvcDate'];
$challenge = $_POST['challenge'];
$monthlyMileage = $_POST['monthlyMileage'];
$svcType = $_POST['svcType'];
$svcDate = $_POST['svcDate'];
$kmDueForSvc = $_POST['kmDueForSvc'];
$svcDueDate = $_POST['svcDueDate'];
$litreOfOil = $_POST['litreOfOil'];
$date = $_POST['date'];
$status = $_POST['status'];
$unit = $_POST['unit'];
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
          $challenge = validate($challenge);
          $monthlyMileage = validate($monthlyMileage);
          $svcType = validate($svcType);
          $kmDueForSvc = validate($kmDueForSvc);
          $svcDueDate = validate($svcDueDate);
          $litreOfOil = validate($litreOfOil);
          $remark = validate($remark);

            
    


     //Insert Data Into the Database. 
     $inspectionSQL = "INSERT INTO vehicle_inspection (id, vehicle, lastRoutineSvcDate, challenge, monthlyMileage, 
     svcType, svcDate, kmDueForSvc, svcDueDate, litreOfOil, date, status, unit, remark)
     VALUES ('$uniqId', '$vehicle', '$lastRoutineSvcDate', '$challenge', '$monthlyMileage', '$svcType', '$svcDate', 
     '$kmDueForSvc', '$svcDueDate', '$litreOfOil', '$date', '$status', '$unit', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($inspectionSQL) == TRUE) {

                $_SESSION["successMessageForNewVehicleInspection"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center; text-transform:uppercase;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left; text-transform:uppercase;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                INSPECTION FOR VEHICLE (VIN=>$vehicle) WAS ADDED SUCCESSFULLY.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added an inspection for a vehicle with vin->$vehicle";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }else{
                $_SESSION["failureMessageForNewVehicleInspection"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                VEHICLE INSPECTION FOR VEHICLE WITH VIN->$vehicle IS NOT ADDED TO THE DATABASE. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding an inspection for a vehicle with vin->$vehicle";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }
        }
    catch(Exception $e)
            {   
               $_SESSION["failureMessageForNewVehicleInspection"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                VEHICLE INSPECTION FOR VEHICLE WITH VIN->$vehicle IS NOT ADDED TO THE DATABASE. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding an inspection for a vehicle with vin->$vehicle";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
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
