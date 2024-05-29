<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$position = $_POST['position'];
$vehicle = $_POST['vehicle'];
$productionDate = $_POST['productionDate'];
$expiryDate = $_POST['expiryDate'];
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
          $position = validate($position);
          $vehicle = validate($vehicle);
          $productionDate = validate($productionDate);
          $expiryDate = validate($expiryDate);
          $remark = validate($remark);
          $uniqId = validate($uniqId);
            
      

   //select all tyre statuses already added to the database
    $account = $_SESSION['account'];
    $tyreStatusAlreadyAddedSQL = "SELECT * FROM vehicle_tyre_status WHERE POSITION = '$position' AND DATE = '$date' AND VEHICLE = '$vehicle' AND UNIT_CODE = '$account'";
    $tyreStatusAlreadyAddedResult = mysqli_query($conn, $tyreStatusAlreadyAddedSQL);
    $totalTyreStatusResultRecords = mysqli_num_rows($tyreStatusAlreadyAddedResult);  
 

    //check if a status is already in the database
    if($totalTyreStatusResultRecords > 0) {
        // If the record already exists, do not proceed with the insertion
                $_SESSION["alreadyAddedMessageForNewTyreStatus"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px; text-tansform:lowercase;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left; text-tansform:lowercase;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                Tyre status for Position=>$position,Vehicle Vin=>$vehicle and Date=>$date has already been added.Enter a different position, vehicle, unit and date.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a tyre status for position->$position, vehicle vin->$vin, date->$date and unit->$unit";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
    }else {

     //Insert Data Into the Database. 
     $tyreStatusSQL = "INSERT INTO vehicle_tyre_status (ID, POSITION, VEHICLE, PRODUCTION_DATE, EXPIRY_DATE, DATE, STATUS, UNIT_CODE, REMARK)
     VALUES ('$uniqId', '$position', '$vehicle', '$productionDate', '$expiryDate', '$date', '$status', '$unit', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($tyreStatusSQL) == TRUE) {

                $_SESSION["successMessageForNewTyreStatus"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center; text-transform:uppercase;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left; text-transform:uppercase;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                THE TYRE STATUS FOR POSITION=>$position, VEHICLE VIN=>$vehicle AND DATE=>$date WAS ADDED SUCCESSFULLY.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added a tyre status for position->$position, vehicle vin->$vin, date->$date and unit->$unit";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }else{
                $_SESSION["failureMessageForNewTyreStatus"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $name with vin $vin has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a tyre status for position->$position, vehicle vin->$vin, date->$date and unit->$unit";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }
        }
    catch(Exception $e)
            {   
               $_SESSION["failureMessageForNewTyreStatus"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $name with vin $vin has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a tyre status for position->$position, vehicle vin->$vin, date->$date and unit->$unit";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
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
