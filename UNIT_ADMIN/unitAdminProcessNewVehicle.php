<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$name = $_POST['name'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$colour = $_POST['colour'];
$transmission = $_POST['transmission'];
$vin = $_POST['vin'];
$engNo = $_POST['engNo'];
$plateNo = $_POST['plateNo'];
$dtos = $_POST['dtos'];
$mileage = $_POST['mileage'];
$price = $_POST['price'];
$deployment = $_POST['deployment'];
$unit = $_POST['unit'];
$status = $_POST['status'];
$fault = $_POST['fault'];
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
          $name = validate($name);
          $make = validate($make);
          $model = validate($model);
          $colour = validate($colour);
          $transmission = validate($transmission);
          $vin = validate($vin);
          $mileage = validate($mileage);
          $price = validate($price);
          $deployment = validate($deployment);
          $remark = validate($remark);
          $engNo = validate($engNo);
          $plateNo = validate($plateNo);
          $status = validate($status);
          $fault = validate($fault);
          $uniqId = validate($uniqId);
            
      

   //select all vehicles already added to the database
    $account = $_SESSION['account'];
    $vehicleAlreadyAddedSQL = "SELECT * FROM vehicle WHERE VIN = '$vin' AND UNIT_CODE = '$account'";
    $vehicleResult = mysqli_query($conn, $vehicleAlreadyAddedSQL);
    $totalVehicleResultRecords = mysqli_num_rows($vehicleResult);  
 

    //check if a platform is already in the database
    if($totalVehicleResultRecords > 0) {
        // If the record already exists, do not proceed with the insertion
                $_SESSION["alreadyAddedMessageForNewVehicle"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                THE VEHICLE WITH VIN $vin HAS ALREADY BEEN ADDED. ENTER A DIFFERENT VIN.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a vehicle with vin -> $vin to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
    }else {

     //Insert Data Into the Database. 
     $vehicleSQL = "INSERT INTO vehicle (VEHICLE_ID, NAME, MAKE, MODEL, YEAR, COLOUR, TRANSMISSION, VIN, ENG_NO, PLATE_NO, DTOS, MILEAGE, PRICE, DEPLOYMENT, UNIT_CODE, STATUS, FAULT, REMARK )
     VALUES ('$uniqId', '$name', '$make', '$model', '$year', '$colour', '$transmission', '$vin', '$engNo', '$plateNo', '$dtos', '$mileage', '$price', '$deployment', '$unit', '$status', '$fault', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($vehicleSQL) == TRUE) {

                $_SESSION["successMessageForNewVehicle"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center; text-transform:uppercase;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left; text-transform:uppercase;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $name WITH VIN $vin HAS BEEN ADDED TO THE DATABASE.
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added a vehicle with vin -> $vin to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }else{

                $_SESSION["failureMessageForNewVehicle"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $name with vin $vin has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a vehicle with vin -> $vin to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminVehicle");
                exit();
            }
        }
    catch(Exception $e)
            {   
               $_SESSION["failureMessageForNewVehicle"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminVehicle' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $name with vin $vin has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a vehicle with vin -> $vin to the database";
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
