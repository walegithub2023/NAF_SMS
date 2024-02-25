<?php 
include('../Connection.php');
include 'superEditorHeader.php';
include 'superEditorSideNavBar.php';


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect Unit Data from inputs

     if(isset($_POST['add'])){
          $commandCode = $_POST['commandCode'];
          $command = $_POST['command'];
          $remark = $_POST['remark'];
     
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
    //validate user input
    $commandCode = validate($commandCode);
    $command = validate($command);
    $remark = validate($remark);
   


/*     //Create Unique User ID 
$day = date('D');
$month = date('F');
$year = date('Y');
$fmonth = substr($month, 0, 1);
$fyear = substr($year, 2, 2);
$fday = substr($day, 0, 1);
$uniq = rand();
$funiq = substr($uniq, 0, 2);
$funiq1 = substr($uniq, 0, 1);
$userID =  'ST'.$fmonth.$fday.$funiq1.$fyear.$funiq; */

//check whether user's password is same with user's retyped password



     //Insert command Data Into the Database
     $addSQL = "INSERT INTO commands (COMMAND_CODE, COMMAND, REMARK)
     VALUES ('$commandCode', '$command', '$remark')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($addSQL) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESS! NEW COMMAND CREATED SUCCESSFULLY...';
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! COMMAND ALREADY EXISTS. ENTER A DIFFERENT COMMAND CODE.';
     
    }
  
}
?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>NEW COMD</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="superEditorHome">Home</a></li>
          <li class="breadcrumb-item active">New Comd</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="width:99%;">
           <div class="card"  style="padding:30px;">
            <div class="card-body">

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="superEditorNewCommand" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="superEditorNewCommand" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">New Comd Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="superEditorNewCommand" class="row g-3">
                <div class="col-md-12">
                  <label for="commandCode" class="form-label">Command code</label>
                  <input type="text" name="commandCode" class="form-control" id="commandCode" placeholder="Enter command code" required>
                </div>
                <div class="col-md-12">
                  <label for="command" class="form-label">Command</label>
                  <input type="text" name="command" class="form-control" id="command" placeholder="Enter command in full" required>
                </div>
                 <div class="col-md-12">
                  <label for="remark" class="form-label">Remark</label>
                  <input type="text" name="remark" class="form-control" id="remark" placeholder="Enter command remark">
                </div>
                <div class="col-12">
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