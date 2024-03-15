<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');
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
      <h1>NEW L&P</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">New Leave/Pass</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

         <?php
                    //MESSAGES FROM successMessageForNewLeaveAndPass STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForNewLeaveAndPass'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForNewLeaveAndPass'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForNewLeaveAndPass']);
            }else

            // Check if a failure message is set in the session 
            if (isset($_SESSION['failureMessageForNewLeaveAndPass'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewLeaveAndPass'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForNewLeaveAndPass']);
            }
             //MESSAGES FROM successMessageForNewLeaveAndPass ENDS HERE
    ?>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">NEW Leave/Pass</h5>
              <p>
                To add new leave/pass, click the button below. Fill the form completely and submit.
              </p>


            <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                CLICK TO ADD NEW LEAVE/PASS TO THE DATABASE
              </button>

              <div class="modal fade" id="ExtralargeModal" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">LEAVE/PASS FORM</h5>
                      <button type="button" style="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                      padding-bottom:50px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      min-height: 100vh;
                      width: 100%;
                      zIndex:-1;
                    ">
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewLeaveAndPass" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px;">
               <div class="col-md-4">
                  <label for="type" class="form-label">TYPE:</label>
                  <select id="type" name="type" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="LEAVE">Leave</option>
                         <option value="PASS">Pass</option>
                  </select>
                </div>
                  <div class="col-md-4">
                  <label for="svcNo" class="form-label">SVC NO:</label>
                  <select id="svcNo" name="svcNo" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];
                        $persSQL = "SELECT * FROM pers WHERE UNIT = '$account'";
                        $persResult = mysqli_query($conn, $persSQL);
                        $totalRecords = mysqli_num_rows($persResult); 
                        while($persFetch=mysqli_fetch_assoc($persResult))
                        {
                                                        
                            $svcNo = $persFetch['SVC_NO'];
                            echo'<option value="'.$svcNo.'">'.$svcNo.'</option>';
                        }                               
                    ?>          
                  </select>
                </div>
                 <div class="col-md-4">
                  <label for="destination" class="form-label">DESTINATION:</label>
                  <input type="text" name="destination" class="form-control" id="destination" placeholder="destination" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="startDate" class="form-label">START DATE:</label>
                  <input type="date" name="startDate" class="form-control" id="startDate" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="endDate" class="form-label">END DATE:</label>
                  <input type="date" name="endDate" class="form-control" id="endDate" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                  <div class="col-md-12">
                  <label for="reason" class="form-label">REASON:</label>
                  <input type="text" name="reason" class="form-control" id="reason" placeholder="reason" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="create" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->


            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php 
include 'unitAdminFooter.php'; 

/*  //declare or prepare variables for log_event function
$userSvcNo = $_SESSION['svcNo'];
$action = "visit";
$description = "$userSvcNo"." "."visited the adminUsers page";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $userSvcNo, $action, $description, $account); */

?>