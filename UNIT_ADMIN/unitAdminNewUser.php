<?php 
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect User Data from inputs

     if(isset($_POST['add'])){
          $userRole = $_POST['userRole'];
          $unit = $_POST['unit'];
          $svcNo = $_POST['svcNo'];
          $rank = $_POST['rank'];
          $initials = $_POST['initials'];
          $surname = $_POST['surname'];
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
    $initials = validate($initials);
    $surname = validate($surname);
    $password = validate($password);
    $confirmPassword = validate($confirmPassword);


    //Create Unique User ID 
$day = date('D');
$month = date('F');
$year = date('Y');
$fmonth = substr($month, 0, 1);
$fyear = substr($year, 2, 2);
$fday = substr($day, 0, 1);
$uniq = rand();
$funiq = substr($uniq, 0, 2);
$funiq1 = substr($uniq, 0, 1);
$userID =  'ST'.$fmonth.$fday.$funiq1.$fyear.$funiq;

//check whether user's password is same with user's retyped password

if($password==$confirmPassword){


     //Insert User Data Into the Database
     $signupSQL = "INSERT INTO users (SVC_NO, USER_ROLE, UNIT_CODE, PASSWORD, RANK, INITIALS, SURNAME)
     VALUES ('$svcNo', '$userRole', '$unit', '$password', '$rank', '$initials', '$surname')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($signupSQL) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESS! NEW USER CREATED SUCCESSFULLY...';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created user $svcNo";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! USER ALREADY EXISTS. ENTER A DIFFERENT NAF NUMBER.';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating user $svcNo. The User already existed";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
     
            }
     }else{
         $errorMessage = 'OOPS...! PASSWORDS UNMATCHED...';
            //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating user $svcNo. User passwords unmatched";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
     }
}
?>

<main id="main" class="main"
  style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    
"
>
    <div class="pagetitle">
      <h1>NEW USER</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">New User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="">
           <div class="card"  style="padding:30px; border-radius:1px;">
            <div class="card-body">

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: #198754; color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="unitAdminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="unitAdminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="unitAdminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">New User Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="unitAdminNewUser" class="row g-3">
                 <div class="col-md-3">
                  <label for="userRole" class="form-label">User Role</label>
                  <select id="userRole" name="userRole" class="form-select" style="border-radius:1px;" required>
                    <option value="">Choose User Role...</option>
                    <option value="UNIT_ADMIN">Unit_Admin</option>
                    <option value="UNIT_EDITOR">Unit_Editor</option>
                    <option value="UNIT_VIEWER">Unit_Viewer</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="unit" class="form-label">Unit</label>
                  <select id="unit" name="unit" class="form-select" style="border-radius:1px;" required>
                    <?php
                        $account = $_SESSION['account'];
                        $unitSQL = "SELECT * FROM units WHERE UNIT_CODE = '$account'";
                        $unitResult = mysqli_query($conn, $unitSQL);
                        $totalRecords = mysqli_num_rows($unitResult); 
                        while($unitFetch=mysqli_fetch_assoc($unitResult))
                        {
                                                        
                            $unitCode = $unitFetch['UNIT_CODE'];
                            $unit = $unitFetch['UNIT'];
                            echo'<option value="'.$unitCode.'">'.$unit.'</option>';
                        }                               
                    ?>          
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="svcNo" class="form-label">Svc No</label>
                  <input type="text" name="svcNo" class="form-control" id="svcNo" placeholder="Enter svc no" style="border-radius:1px;" required>
                </div>
                <div class="col-md-3">
                  <label for="rank" class="form-label">Rank</label>
                  <select id="rank" name="rank" class="form-select" style="border-radius:1px;" required>
                    <option value="">Choose Rank...</option>
                     <option value="AVM">AVM</option>
                     <option value="AIR CDRE">AIR CDRE</option>
                     <option value="GP CAPT">GP CAPT</option>
                     <option value="WG CDR">WG CDR</option>
                     <option value="SQN LDR">SQN LDR</option>
                     <option value="FLT LT">FLT LT</option>
                     <option value="FG OFFR">FG OFFR</option>
                     <option value="PLT OFFR">PLT OFFR</option>
                     <option value="AWO">AWO</option>
                     <option value="MWO">MWO</option>
                     <option value="WO">WO</option>
                     <option value="FS">FS</option>
                     <option value="SGT">SGT</option>
                     <option value="CPL">CPL</option>
                     <option value="LCPL">LCPL</option>
                     <option value="ACM">ACM</option>
                     <option value="ACW">ACW</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="initials" class="form-label">Initials</label>
                  <input type="text" name="initials" class="form-control" id="initials" placeholder="Enter initials" style="border-radius:1px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="surname" class="form-label">Surname</label>
                  <input type="text" name="surname" class="form-control" id="surname" placeholder="Enter surname" style="border-radius:1px;" required>
                </div>
                <div class="col-md-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" style="border-radius:1px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" style="border-radius:1px;" required>
                </div>
                <div class="">
                  <button type="submit" name="add" class="btn btn-primary" style="border-radius:2px; width:120px; height:50px">CREATE</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'unitAdminFooter.php'; ?>