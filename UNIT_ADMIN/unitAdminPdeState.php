<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');

//get today's date
$date = date("Y-m-d");
$account = $_SESSION['account'];




//select distinct date from pde_state table
$pdeStateDistinctDate = "SELECT DISTINCT DATE FROM pde_state WHERE UNIT_CODE = '$account'";
$pdeStateDistinctDateResult = mysqli_query($conn, $pdeStateDistinctDate);
$totalPdeStateDistinctDateResultRecords = mysqli_num_rows($pdeStateDistinctDateResult);



//select today's pde state
    $pdeStateSQL = "SELECT * FROM pde_state WHERE DATE = '$date' AND UNIT_CODE = '$account'";
    $pdeStateResult = mysqli_query($conn, $pdeStateSQL);
    $totalPdeStateRecords = mysqli_num_rows($pdeStateResult);  
    $remark = "NIL";


    
//select details of pde state history
    $pdeStateHistorySQL = "SELECT * FROM pde_state WHERE UNIT_CODE = '$account'";
    $pdeStateHistoryResult = mysqli_query($conn, $pdeStateHistorySQL);
    $totalPdeStateHistoryRecords = mysqli_num_rows($pdeStateHistoryResult);  
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
      <h1>PDE STATE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Pde State</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     
      <?php
                    //MESSAGES FROM successMessageForNewPdeState STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForNewPdeState']);
            }
            else if (isset($_SESSION['failureMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForNewPdeState']);
            }

             else if (isset($_SESSION['failureMessage2ForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessage2ForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessage2ForNewPdeState']);
            }

            else if (isset($_SESSION['alreadyAddedMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['alreadyAddedMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['alreadyAddedMessageForNewPdeState']);
            }
    ?>


  <?php
                    //MESSAGES FROM successMessageForDeletePdeState STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForDeletePdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeletePdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeletePdeState']);
            }
            else if (isset($_SESSION['failureMessageForDeletePdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForDeletePdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeletePdeState']);
            }
    ?>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">Parade State</h5>
              <p>
                Click the buttons below to see today's pde state, pde state history, and to add new parade state to the database.
              </p>
              
              
              <!-- large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                CLICK TO VIEW PDE STATE HISTORY
              </button>
              <div class="modal fade" id="largeModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">PARADE STATE HISTORY</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                padding-right:70px;
                padding-left:70px;
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                zIndex:-1;
                " 
                >
 <?php 
        while($pdeStateDistinctDateFetch=mysqli_fetch_assoc($pdeStateDistinctDateResult))
            {
                $pdeStateDate = $pdeStateDistinctDateFetch['DATE'];

                //select all pers from the unit
                $unitPers = "SELECT * FROM pers WHERE UNIT = '$account'";
                $unitPersResult = mysqli_query($conn, $unitPers);
                $totalUnitPersRecords = mysqli_num_rows($unitPersResult);

                  //select all pers on pde for that date
                $unitPersOnPde = "SELECT * FROM pde_state WHERE PDE_STATE = 'ON PDE' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnPdeResult = mysqli_query($conn, $unitPersOnPde);
                $totalUnitPersOnPdeRecords = mysqli_num_rows($unitPersOnPdeResult);

                  //select all pers on leave for that date
                $unitPersOnLeave = "SELECT * FROM pde_state WHERE PDE_STATE = 'LEAVE' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnLeaveResult = mysqli_query($conn, $unitPersOnLeave);
                $totalUnitPersOnLeaveRecords = mysqli_num_rows($unitPersOnLeaveResult);

                  //select all pers on pass for that date
                $unitPersOnPass = "SELECT * FROM pde_state WHERE PDE_STATE = 'PASS' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnPassResult = mysqli_query($conn, $unitPersOnPass);
                $totalUnitPersOnPassRecords = mysqli_num_rows($unitPersOnPassResult);


                //select all pers on course for that date
                $unitPersOnCourse = "SELECT * FROM pde_state WHERE PDE_STATE = 'CSE' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnCourseResult = mysqli_query($conn, $unitPersOnCourse);
                $totalUnitPersOnCourseRecords = mysqli_num_rows($unitPersOnCourseResult);



                //select all pers on operation for that date
                $unitPersOnOps = "SELECT * FROM pde_state WHERE PDE_STATE = 'OPS' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnOpsResult = mysqli_query($conn, $unitPersOnOps);
                $totalUnitPersOnOpsRecords = mysqli_num_rows($unitPersOnOpsResult);

            
                //select all pers on Attachment for that date
                $unitPersOnAtt = "SELECT * FROM pde_state WHERE PDE_STATE = 'ATT' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnAttResult = mysqli_query($conn, $unitPersOnAtt);
                $totalUnitPersOnAttRecords = mysqli_num_rows($unitPersOnAttResult);
            
            
            
                //select all pers that are sick for that date
                $sickUnitPers = "SELECT * FROM pde_state WHERE PDE_STATE = 'SICK' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $sickUnitPersResult = mysqli_query($conn, $sickUnitPers);
                $sickUnitPersRecords = mysqli_num_rows($sickUnitPersResult);

                            
                            
                //select all pers on Edn for that date
                $unitPersOnEdn = "SELECT * FROM pde_state WHERE PDE_STATE = 'EDN' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnEdnResult = mysqli_query($conn, $unitPersOnEdn);
                $totalUnitPersOnEdnRecords = mysqli_num_rows($unitPersOnEdnResult);

                            
                            
                //select all pers on awol for today
                $unitPersOnAwol = "SELECT * FROM pde_state WHERE PDE_STATE = 'AWOL' AND pde_state.DATE = '$pdeStateDate' AND UNIT_CODE = '$account'";
                $unitPersOnAwolResult = mysqli_query($conn, $unitPersOnAwol);
                $totalUnitPersOnAwolRecords = mysqli_num_rows($unitPersOnAwolResult);

?>
            <!-- Table  with stripped rows -->
            <div class="table-responsive" style="">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                    
  <!--  display pde_state date -->
                <tr style="font-weight:bold; text-align:center;"><?php echo $account;?><?php echo " - ";?><?php echo $pdeStateDistinctDateFetch['DATE'];?></tr>

    <!--    display another row of headers -->
                <tr>
                    <th scope="col">Str</th>
                    <th scope="col">On pde</th>
                    <th scope="col">Leave</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Course</th>
                    <th scope="col">Ops</th>
                    <th scope="col">Att</th>
                    <th scope="col">Sick</th>
                    <th scope="col">Edn</th>
                    <th scope="col">Awol</th>
                  </tr>
                </thead>
                <tbody>
                   
              

                <!-- display other totals -->
            <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $totalUnitPersRecords;?></td>
                <td><?php echo $totalUnitPersOnPdeRecords;?></td>
                <td><?php echo $totalUnitPersOnLeaveRecords;?></td>
                <td><?php echo $totalUnitPersOnPassRecords;?></td>
                <td><?php echo $totalUnitPersOnCourseRecords;?></td>
                <td><?php echo $totalUnitPersOnOpsRecords;?></td>
                <td><?php echo $totalUnitPersOnAttRecords;?></td>
                <td><?php echo $sickUnitPersRecords;?></td>
                <td><?php echo $totalUnitPersOnEdnRecords;?></td>
                <td><?php echo $totalUnitPersOnAwolRecords;?></td>
            </tr>
           
                </tbody>
              </table>
            <!-- End Table with stripped rows -->   
        </div>
        <!-- End of table div -->
         <?php
            }
        ?>
        
        </div>
    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div><!-- End large Modal-->




<!-- large Modal 2 -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal2">
                DETAILS OF PDE STATE HISTORY
              </button>
              <div class="modal fade" id="largeModal2" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">DETAILS OF PDE STATE HISTORY</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                                padding-right:50px;
                                padding-left:50px;
                                background-image: url('../IMAGES/img11.png'); 
                                background-size: cover;
                                background-position: center;
                                zIndex:-1;
                                " 
                >

                 <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                <tr>
                    <th scope="col">Svc No</th>
                    <th scope="col">Pde State</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Date</th>
                    <th scope="col">Remark</th>
                </tr>
                </thead>
                <tbody>
                       <?php 
                    while($pdeStateHistoryFetch=mysqli_fetch_assoc($pdeStateHistoryResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $pdeStateHistoryFetch['SVC_NO']?></td>
                <td><?php echo $pdeStateHistoryFetch['PDE_STATE']?></td>
                <td><?php echo $pdeStateHistoryFetch['UNIT_CODE']?></td>
                <td><?php echo $pdeStateHistoryFetch['DATE']?></td>
                <td><?php echo $pdeStateHistoryFetch['REMARK']?></td>
              </tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
        
        </div>
    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div><!-- End large Modal 2-->



     <!-- large Modal 3 -->
     <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal3">
                DETAILS OF TODAY'S PDE STATE
              </button>
              <div class="modal fade" id="largeModal3" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">DETAILS OF TODAY'S PDE STATE</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                                padding-right:50px;
                                padding-left:50px;
                                background-image: url('../IMAGES/img11.png'); 
                                background-size: cover;
                                background-position: center;
                                zIndex:-1;
                                " 
                >

                 <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                <tr>
                    <th scope="col">Svc No</th>
                    <th scope="col">Pde State</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Date</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                       <?php 
                    while($pdeStateFetch=mysqli_fetch_assoc($pdeStateResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $pdeStateFetch['SVC_NO']?></td>
                <td><?php echo $pdeStateFetch['PDE_STATE']?></td>
                <td><?php echo $pdeStateFetch['UNIT_CODE']?></td>
                <td><?php echo $pdeStateFetch['DATE']?></td>
                <td><?php echo $pdeStateFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeletePdeState?pdeStateId=<?php echo $pdeStateFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
              </tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
        
        </div>
    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div>
    
    <!-- End large Modal 3-->





    <!-- Basic Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal4">
                CLICK TO ADD NEW PARADE STATE
              </button>
              <div class="modal fade" id="basicModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW PDE STATE - <?php echo $date; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:100px;
                      "
                    >

                      <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewPdeState" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px;">
                <div class="col-md-6">
                  <label for="svcNo" class="form-label">SVC NO</label>
                <select id="svcNo" name="svcNo" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];

                        //select all pers that are not on leave or pass
                        $persSQL = "SELECT pers.SVC_NO
                        FROM pers
                        LEFT JOIN leave_pass ON pers.SVC_NO = leave_pass.SVC_NO
                        WHERE
                        leave_pass.SVC_NO IS NULL
                        AND
                        pers.UNIT = '$account'";

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

                 <div class="col-md-6">
                  <label for="description" class="form-label">PDE STATE:</label>
                  <select id="pdeState" name="pdeState" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="ON PDE">On pde</option>
                        <option value="LEAVE">Leave</option>
                        <option value="PASS">Pass</option>
                        <option value="CSE">Cse</option>
                        <option value="OPS">Ops</option>
                        <option value="ATT">Att</option>
                        <option value="SICK">Sick</option>
                        <option value="EDN">Edn</option>
                        <option value="AWOL">Awol</option>
                  </select>
                   </div>
            
                  <div class="col-md-6">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
              
                 <div class="col-md-6">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" name="date" readonly value="<?php echo $date;?>" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
                      <button type="submit" class="btn btn-primary" name="add" style="border-radius:1px;">CREATE</button>
                </div>
              </form>
             
              <!-- End Multi Columns Form -->
                    </div>
                 
                  </div>
                </div>
              </div><!-- End Basic Modal-->


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