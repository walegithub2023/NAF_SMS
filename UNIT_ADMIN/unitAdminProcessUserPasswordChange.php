<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['userRole']=='UNIT_ADMIN') {
?>
<?php
include('../connection.php');
include('../functions.php');

$svcNo = $_SESSION['svcNo'];

  $userSQL = "SELECT * FROM users WHERE SVC_NO = '$svcNo'";
  $userResult = mysqli_query($conn, $userSQL);

 
while($row = mysqli_fetch_assoc($userResult)){

if(isset($_POST["change_password"])){
$password = $_POST["password"];
$newpassword = $_POST["newpassword"];
$renewpassword = $_POST["renewpassword"];


    //create a function to validate pers input
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
 //validate user's password input
   $newpassword = validate($newpassword);

if($row["PASSWORD"] == $password){

 if($newpassword == $renewpassword){
  

   try{

     $updateSQL = "UPDATE users SET PASSWORD = '$newpassword' WHERE SVC_NO = '$svcNo'";
     
    
    //Check whether record has been updated successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {
                $_SESSION["successMessageForUserPasswordChange"] = '<div class="alert alert-dismissible" style="background-color: #198754; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="UnitAdminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                USER PASSWORD CHANGED SUCCESSFULLY...
                </div>';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "password change";
                $description = "$userSvcNo"." "."changed his/her password";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: UnitAdminUserProfile");
                exit();

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }
  }else{
                $_SESSION["passwordMismatchMessageForUserPasswordChange"] = '<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="UnitAdminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                PASSWORD MISMATCH. YOUR NEW PASSWORD IS NOT THE SAME WITH YOUR CONFIRM PASSWORD.
                </div>';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "." tried changing his/her password. Password mismatch";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: UnitAdminUserProfile");
                exit();
  }
}else{
                $_SESSION["incorrectPasswordMessageForUserPasswordChange"] ='<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="UnitAdminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                THE USER PASSWORD YOU ENTERED IS NOT CORRECT.
                </div>';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "." tried changing his/her password. Incorrect user password";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: UnitAdminUserProfile");
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
