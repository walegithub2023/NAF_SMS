<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');



//select all leave and passes
  $account = $_SESSION['account'];
    $leavePassSQL = "SELECT * FROM leave_pass WHERE UNIT_CODE = '$account'";
    $leavePassResult = mysqli_query($conn, $leavePassSQL);
    $totalRecords = mysqli_num_rows($leavePassResult);  
    $remark = "NIL";


//get the current date
$current_date = date('Y-m-d');


//select expired leave and passes
  $account = $_SESSION['account'];
    $expiredLeavePassSQL = "SELECT * FROM leave_pass WHERE UNIT_CODE = '$account' AND END_DATE <= '$current_date'";
    $expiredLeavePassResult = mysqli_query($conn, $expiredLeavePassSQL);
    $totalRecords = mysqli_num_rows($expiredLeavePassResult);  
    $remark = "NIL";


//select all leave and passes that are not expired
  $account = $_SESSION['account'];
    $notExpiredLeavePassSQL = "SELECT * FROM leave_pass WHERE UNIT_CODE = '$account' AND END_DATE >= '$current_date'";
    $notExpiredLeavePassResult = mysqli_query($conn, $notExpiredLeavePassSQL);
    $totalRecords = mysqli_num_rows($notExpiredLeavePassResult);  
    $remark = "NIL";

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
      <h1>LEAVE & PASSES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">L&P</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
                    //MESSAGES FROM successMessageForNewLeaveAndPass START HERE
                    // Check if a successMessageForNewLeaveAndPass is set in the session
                    if (isset($_SESSION['successMessageForNewLeaveAndPass'])) {
                        // Display the successMessageForNewLeaveAndPass
                        echo '<div>' . $_SESSION['successMessageForNewLeaveAndPass'] . '</div>';

                        // Unset the successMessageForNewLeaveAndPass
                        unset($_SESSION['successMessageForNewLeaveAndPass']);
            }else

            // Check if a failureMessageForNewLeaveAndPass is set in the session
            if (isset($_SESSION['failureMessageForNewLeaveAndPass'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewLeaveAndPass'] . '</div>';

                        // Unset the failureMessageForNewLeaveAndPass
                        unset($_SESSION['failureMessageForNewLeaveAndPass']);
            }
            //MESSAGES FROM failureMessageForNewLeaveAndPass END HERE
    ?>

         <?php
                    //MESSAGES FROM successMessageForDeleteLeavePass START HERE
                    // Check if a successMessageForDeleteLeavePass is set in the session
                    if (isset($_SESSION['successMessageForDeleteLeavePass'])) {
                        // Display the successMessageForDeleteLeavePass
                        echo '<div>' . $_SESSION['successMessageForDeleteLeavePass'] . '</div>';

                        // Unset the successMessageForOffrsNominal
                        unset($_SESSION['successMessageForDeleteLeavePass']);
            }else

            // Check if a failureMessageForDeleteLeavePass is set in the session
            if (isset($_SESSION['failureMessageForDeleteLeavePass'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteLeavePass'] . '</div>';

                        // Unset the failureMessageForDeleteLeavePass
                        unset($_SESSION['failureMessageForDeleteLeavePass']);
            }
            //MESSAGES FROM failureMessageForDeleteLeavePass END HERE
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">LEAVE & PASS</h5>
              <p>
                To see all leaves/passes, expired and not expired Leaves or Passes, click the buttons below.
              </p>


             <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
               VIEW ALL LEAVE & PASS HISTORY
              </button>

              <div class="modal fade" id="fullscreenModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">LEAVE & PASSES</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img1.jpg'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                >
                     <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Type</th>
                    <th scope="col">SvcNo</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                    <th scope="col">VIEW</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($leavePassFetch=mysqli_fetch_assoc($leavePassResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $leavePassFetch['TYPE']?></td>
                <td><?php echo $leavePassFetch['SVC_NO']?></td>
                <td><?php echo $leavePassFetch['REASON']?></td>
                <td><?php echo $leavePassFetch['DESTINATION']?></td>
                <td><?php echo $leavePassFetch['START_DATE']?></td>
                <td><?php echo $leavePassFetch['END_DATE']?></td>
                <td><?php echo $leavePassFetch['UNIT_CODE']?></td>
                <td><?php echo $leavePassFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminViewLeavePass?leavePassId=<?php echo $leavePassFetch['ID'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='unitAdminEditLeavePass?leavePassId=<?php echo $leavePassFetch['ID'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td>
                  <a style="color:black" href='unitAdminDeleteLeavePass?leavePassId=<?php echo $leavePassFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
              </tr>
            <?php
            $serial++;
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" style="border-radius:1px;" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->



            <!-- Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                VIEW ALL EXPIRED LEAVE & PASS
              </button>

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="border-radius:1px; text-align:justify;">
                    <div class="modal-header">
                      <h5 class="modal-title">EXPIRED LEAVE AND PASSES</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                                style="
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                    >
                       <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:80%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Type</th>
                    <th scope="col">SvcNo</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Dest</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($ExpiredLeavePassFetch=mysqli_fetch_assoc($expiredLeavePassResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $ExpiredLeavePassFetch['TYPE']?></td>
                <td><?php echo $ExpiredLeavePassFetch['SVC_NO']?></td>
                <td><?php echo $ExpiredLeavePassFetch['REASON']?></td>
                <td><?php echo $ExpiredLeavePassFetch['DESTINATION']?></td>
                <td><?php echo $ExpiredLeavePassFetch['START_DATE']?></td>
                <td><?php echo $ExpiredLeavePassFetch['END_DATE']?></td>
                <td><?php echo $ExpiredLeavePassFetch['UNIT_CODE']?></td>
                <td><?php echo $ExpiredLeavePassFetch['REMARK']?></td>
                </tr>
            <?php
            $serial++;
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->



        <!-- Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal2">
                VIEW ALL NOT EXP LEAVE & PASS
              </button>

              <div class="modal fade" id="largeModal2" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="border-radius:1px; text-align:justify;">
                    <div class="modal-header">
                      <h5 class="modal-title">NOT EXPIRED LEAVE AND PASSES</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                                style="
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                    >
                       <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:80%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Type</th>
                    <th scope="col">SvcNo</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Dest</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($notExpiredLeavePassFetch=mysqli_fetch_assoc($notExpiredLeavePassResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $notExpiredLeavePassFetch['TYPE']?></td>
                <td><?php echo $notExpiredLeavePassFetch['SVC_NO']?></td>
                <td><?php echo $notExpiredLeavePassFetch['REASON']?></td>
                <td><?php echo $notExpiredLeavePassFetch['DESTINATION']?></td>
                <td><?php echo $notExpiredLeavePassFetch['START_DATE']?></td>
                <td><?php echo $notExpiredLeavePassFetch['END_DATE']?></td>
                <td><?php echo $notExpiredLeavePassFetch['UNIT_CODE']?></td>
                <td><?php echo $notExpiredLeavePassFetch['REMARK']?></td>
                </tr>
            <?php
            $serial++;
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->



              <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal2">
                ADD LEAVE / PASS TO DATABASE
              </button>

              <div class="modal fade" id="ExtralargeModal2" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">LEAVE/PASS FORM</h5>
                      <button type="button" style="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                      padding-bottom:80px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
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