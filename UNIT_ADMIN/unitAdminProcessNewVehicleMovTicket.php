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
$date = $_POST['date'];
$unit = $_POST['unit'];
$svcNo = $_POST['svcNo'];
$fuel = $_POST['fuel'];
$destination = $_POST['destination'];
$mileageBefore = $_POST['mileageBefore'];
$mileageAfter = $_POST['mileageAfter'];
$timeOut = $_POST['timeOut'];
$timeIn = $_POST['timeIn'];
$distance = $_POST['distance'];
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
          $fuel = validate($fuel);
          $destination = validate($destination);
          $mileageBefore = validate($mileageBefore);
          $mileageAfter = validate($mileageAfter);
          $timeOut = validate($timeOut);
          $timeIn = validate($timeIn);
          $remark = validate($remark);

            
    


     //Insert Data Into the Database. 
     $vehicleMovTicketSQL = "INSERT INTO vehicle_mov_tickets (ID, VEHICLE, DATE, UNIT_CODE,	SVC_NO,	FUEL_LITRES, 
     DESTINATION, MILEAGE_BEFORE, MILEAGE_AFTER, TIME_OUT, TIME_IN, DISTANCE, REMARK)
     VALUES ('$uniqId', '$vehicle', '$date', '$unit', '$svcNo', '$fuel', '$destination', 
     '$mileageBefore', '$mileageAfter', '$timeOut', '$timeIn', '$distance', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($vehicleMovTicketSQL) == TRUE) {

                $_SESSION["successMessageForNewVehicleMovTicket"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center; text-transform:uppercase;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left; text-transform:uppercase;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                MOVEMENT TICKET FOR VEHICLE (VIN=>$vehicle) WAS ADDED SUCCESSFULLY.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added a movement ticket for a vehicle with vin->$vehicle";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }else{
                $_SESSION["failureMessageForNewVehicleMovTicket"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                MOVEMENT TICKET FOR VEHICLE (VIN=>$vehicle) WAS NOT ADDED TO THE DATABASE. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a movement ticket for a vehicle with vin->$vehicle";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }
        }
    catch(Exception $e)
            {   
                $_SESSION["failureMessageForNewVehicleMovTicket"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                MOVEMENT TICKET FOR VEHICLE (VIN=>$vehicle) WAS NOT ADDED TO THE DATABASE. TRY AGAIN.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a movement ticket for a vehicle with vin->$vehicle";
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
