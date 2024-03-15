<?php 
include('../Connection.php');
include 'superEditorHeader.php';
include 'superEditorSideNavBar.php';
include '../functions.php';


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect Unit Data from inputs

     if(isset($_POST['add'])){
          $unitCode = $_POST['unitCode'];
          $unit = $_POST['unit'];
          $commandCode = $_POST['commandCode'];
          $remark = $_POST['remark'];
     
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
    //validate user input
    $unitCode = validate($unitCode);
    $remark = validate($remark);
   


     //Insert unit Data Into the Database
     $addSQL = "INSERT INTO units (UNIT_CODE, UNIT, COMMAND_CODE, REMARK)
     VALUES ('$unitCode','$unit','$commandCode','$remark')";
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($addSQL) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESS! NEW UNIT CREATED SUCCESSFULLY...';
                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "." created a unit named $unitCode.";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! UNIT ALREADY EXISTS. ENTER A DIFFERENT UNIT CODE.';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a unit named $unitCode.";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
     
    }
  
}
?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>NEW UNIT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="superEditorHome">Home</a></li>
          <li class="breadcrumb-item active">New Unit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row">
           <div class="card"  style="padding:30px;">
            <div class="card-body">

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="superEditorNewUnit" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="superEditorNewUnit" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">New Unit Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="superEditorNewUnit" class="row g-3">
                <div class="col-md-3">
                  <label for="unitCode" class="form-label">Unit Code</label>
                  <input type="text" style="border-radius:1px;" name="unitCode" class="form-control" id="unitCode" placeholder="Enter unit code" required>
                </div>
                <div class="col-md-3">
                  <label for="unit" class="form-label">Unit</label>
                  <input type="text" style="border-radius:1px;" name="unit" class="form-control" id="unit" placeholder="Enter unit" required>
                </div>
                 <div class="col-md-3">
                  <label for="commandCode" class="form-label">Command</label>
                  <select id="commandCode" style="border-radius:1px;" name="commandCode" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        
                        $commandSQL = "SELECT * FROM commands";
                        $commandResult = mysqli_query($conn, $commandSQL);
                        $totalRecords = mysqli_num_rows($commandResult); 
                        while($commandFetch=mysqli_fetch_assoc($commandResult))
                        {
                                                        
                            $commandCode = $commandFetch['COMMAND_CODE'];
                            $command = $commandFetch['COMMAND'];
                            echo'<option value="'.$commandCode.'">'.$commandCode.'</option>';
                        }                               
                    ?>          
                  </select>
                </div>
                 <div class="col-md-3">
                  <label for="remark" class="form-label">Remark</label>
                  <input type="text" style="border-radius:1px;" name="remark" class="form-control" id="remark" placeholder="Enter command remark">
                </div>
                <div class="col-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
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

  <?php include 'superEditorFooter.php'; ?>