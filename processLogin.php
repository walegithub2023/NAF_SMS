
<?php
session_start();
include('connection.php');
include('functions.php');


// Validate user input
if(isset($_POST['login'])) {

  // Function to validate input
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    $svcNo = validate($_POST['svcNo']);
    $loginPassword = validate($_POST['loginPassword']);

    // Select, query, and fetch records from the database, and compare with user's username and password
    $loginSQL = "SELECT * FROM users WHERE SVC_NO='$svcNo' && PASSWORD='$loginPassword'";
    $loginResult = mysqli_query($conn, $loginSQL);

    while($loginFetch = mysqli_fetch_array($loginResult)) {

      try{
        if($loginFetch['SVC_NO'] === $svcNo && $loginFetch['PASSWORD'] === $loginPassword) {
            // Set session variables
            $_SESSION['svcNo'] = $loginFetch['SVC_NO'];
            $_SESSION['password'] = $loginFetch['PASSWORD'];
            $_SESSION['account'] = $loginFetch['UNIT_CODE'];
            $_SESSION['userRole'] = $loginFetch['USER_ROLE'];
            $_SESSION['rank'] = $loginFetch['RANK'];
            $_SESSION['initials'] = $loginFetch['INITIALS'];
            $_SESSION['surname'] = $loginFetch['SURNAME'];

              //declare or prepare variables for log_event function
              $svcNo = $_SESSION['svcNo'];
              $action = "Login";
              $description = "$svcNo"." "."Logged in";
              $unitCode = $_SESSION['account'];

            // Redirect to the appropriate page based on user role
             if($loginFetch['USER_ROLE'] === "SUPER_ADMIN") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to superAdminHome page  
              header("Location: SUPER_ADMIN/superAdminHome");
                exit();
            }
            else if($loginFetch['USER_ROLE'] === "SUPER_EDITOR") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to superEditorHome page 
                header("Location: SUPER_EDITOR/superEditorHome");
                exit();
            }
             else if($loginFetch['USER_ROLE'] === "SUPER_VIEWER") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to superViewerHome page 
                header("Location: SUPER_VIEWER/superViewerHome");
                exit();
            }
            else if($loginFetch['USER_ROLE'] === "UNIT_ADMIN") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to unitAdminHome page
                header("Location: UNIT_ADMIN/unitAdminHome");
                exit();
            }
            else if($loginFetch['USER_ROLE'] === "UNIT_EDITOR") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to unitEditorHome page 
                header("Location: UNIT_EDITOR/unitEditorHome");
                exit();
            }
            else if($loginFetch['USER_ROLE'] === "UNIT_VIEWER") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $unitCode);
              //redirect user to unitViewerHome page 
                header("Location: UNIT_VIEWER/unitViewerHome");
                exit();
            }
        } else {
                $_SESSION["failureMessageForLogin"] = '<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="login" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                INVALID LOGIN CREDENTIALS.
                </div>';
                header("Location: login");
                exit();
        }
      }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
}



?>
