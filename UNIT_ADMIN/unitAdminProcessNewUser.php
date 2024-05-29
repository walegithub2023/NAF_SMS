<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');



     //Collect User Data from inputs

     if(isset($_POST['add'])){
          $userRole = $_POST['userRole'];
          $unit = $_POST['unit'];
          $svcNo = $_POST['svcNo'];
          $password = $_POST['password'];
          $confirmPassword = $_POST['confirmPassword'];
      
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
    //validate user input
    $svcNo = validate($svcNo);
    $password = validate($password);
    $confirmPassword = validate($confirmPassword);




//check whether user's password is same with user's retyped password

if($password==$confirmPassword){


     //Insert User Data Into the Database
     $signupSQL = "INSERT INTO users (SVC_NO, USER_ROLE, UNIT_CODE, PASSWORD)
     VALUES ('$svcNo', '$userRole', '$unit', '$password')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($signupSQL) !== TRUE) {
                throw new Exception();
            }else{
                $_SESSION["successMessageForNewUser"] = "<div class='alert alert-dismissible' style='background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminUsers' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                USER($svcNo) HAS BEEN CREATED SUCCESSFULLY...!
                </div>";
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created user $svcNo";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminUsers");
                exit();
            }
        }
    catch(Exception $ex)
            {   
                $_SESSION["alreadyExistsMessageForNewUser"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminUsers' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! USER ($svcNo) ALREADY EXISTS. ENTER A DIFFERENT SVC NO.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating user $svcNo. The User already existed";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminUsers");
                exit();
            }
     }else{
                $_SESSION["passwordsUnmatchedMessageForNewUser"] = "<div class='alert alert-dismissible' style='background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;'>
                <a href='unitAdminUsers' class='close' data-dismiss='alert' aria-label='close' style='color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px'>&times;</a>
                OOPS...! PASSWORDS UNMATCHED.
                </div>";
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating user $svcNo. User passwords unmatched";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: unitAdminUsers");
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

