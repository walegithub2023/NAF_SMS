<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {


$platform = $_POST['platform'];
$description = $_POST['description'];
$tailNo = $_POST['tailNo'];
$unit = $_POST['unit'];
$status = $_POST['status'];
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
          $platform = validate($platform);
          $status = validate($status);
          $description = validate($description);
          $tailNo = validate($tailNo);
      

   //select all platforms already added to the database
    $account = $_SESSION['account'];
    $platformAlreadyAddedSQL = "SELECT * FROM platform WHERE TAIL_NO = '$tailNo' AND UNIT_CODE = '$account'";
    $platformResult = mysqli_query($conn, $platformAlreadyAddedSQL);
    $totalPlatformResultRecords = mysqli_num_rows($platformResult);  
 

    //check if a platform is already in the database
    if($totalPlatformResultRecords > 0) {
        // If the record already exists, do not proceed with the insertion
                $_SESSION["alreadyAddedMessageForNewPlatform"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $platform WITH TAIL NO=>$tailNo HAS ALREADY BEEN ADDED. ENTER A DIFFERENT PLATFORM (TAIL NO).
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a platform named -> $platform to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
                exit();
    }else {

     //Insert Data Into the Database. 
     $platformSQL = "INSERT INTO platform (PLATFORM_ID, PLATFORM, DESCRIPTION, TAIL_NO, UNIT_CODE, STATUS, REMARK)
     VALUES ('$uniqId', '$platform', '$description', '$tailNo', '$unit', '$status', '$remark')";
    


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($platformSQL) == TRUE) {

                $_SESSION["successMessageForNewPlatform"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $platform WITH TAIL NO=>$tailNo HAS BEEN ADDED TO THE DATABASE SUCCESSFULLY...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "add";
                $description = "$userSvcNo"." "." added a platform named -> $platform to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
                exit();
            }else{

                $_SESSION["failureMessageForNewPlatform"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $platform WITH TAIL NO=>$tailNo has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a platform named -> $platform to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
                exit();
            }
        }
    catch(Exception $e)
            {   
               $_SESSION["failureMessageForNewPlatform"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminPlatform' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                $platform WITH TAIL NO=>$tailNo has not been added. Try again...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried adding a platform named -> $platform to the database";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminPlatform");
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
