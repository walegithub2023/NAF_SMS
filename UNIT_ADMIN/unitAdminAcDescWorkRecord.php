<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


//get today's date
$date = date("Y-m-d");


  $account = $_SESSION['account'];

    $acDescSQL = "SELECT * FROM ac_descrepancy WHERE UNIT_CODE = '$account'";
    $acDescResult = mysqli_query($conn, $acDescSQL);
    $totalRecords = mysqli_num_rows($acDescResult);  
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
      <h1  style="font-weight:normal;">AC DESC</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
                    //MESSAGES FROM successMessageForNewAcDescWorkRecord START HERE
                    // Check if a successMessageForNewAcDescWorkRecord is set in the session
                    if (isset($_SESSION['successMessageForNewAcDescWorkRecord'])) {
                        // Display the successMessageForNewAcDescWorkRecord
                        echo '<div>' . $_SESSION['successMessageForNewAcDescWorkRecord'] . '</div>';

                        // Unset the successMessageForNewAcDescWorkRecord
                        unset($_SESSION['successMessageForNewAcDescWorkRecord']);
            }else

            // Check if a failureMessageForNewAcDescWorkRecord is set in the session
            if (isset($_SESSION['failureMessageForNewAcDescWorkRecord'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewAcDescWorkRecord'] . '</div>';

                        // Unset the failureMessageForNewAcDescWorkRecord
                        unset($_SESSION['failureMessageForNewAcDescWorkRecord']);
            }else
            //MESSAGES FROM failureMessageForNewAcDescWorkRecord ENDS HERE
    ?>

         <?php
                    //MESSAGES FROM successMessageForDeleteAcDescWorkRecord START HERE
                    // Check if a successMessageForDeleteAcDescWorkRecord is set in the session
                    if (isset($_SESSION['successMessageForDeleteAcDescWorkRecord'])) {
                        // Display the successMessageForDeleteAcDescWorkRecord
                        echo '<div>' . $_SESSION['successMessageForDeleteAcDescWorkRecord'] . '</div>';

                        // Unset the successMessageForDeleteAcDescWorkRecord
                        unset($_SESSION['successMessageForDeleteAcDescWorkRecord']);
            }else

            // Check if a failureMessageForDeleteAcDescWorkRecord is set in the session
            if (isset($_SESSION['failureMessageForDeleteAcDescWorkRecord'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteAcDescWorkRecord'] . '</div>';

                        // Unset the failureMessageForDeleteAcDescWorkRecord
                        unset($_SESSION['failureMessageForDeleteAcDescWorkRecord']);
            }
            //MESSAGES FROM failureMessageForDeleteAcDescWorkRecord END HERE
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">AC DESC - <?php echo $account." "; ?></h5>
              <p>
                Click the buttons to see ac desc and work records, and to add new work record.
              </p>


             <!-- fullscreen Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                CLICK TO VIEW ALL DESCREPANCIES
              </button>

               <div class="modal fade" id="fullscreenModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-fullscreen" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">AC DESCREPANCY & WORK RECORDS - <?php echo $account." "; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                zIndex:-1;
                " 
                >
                     <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:80%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Tail No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Maintenance Type</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Snag</th>
                    <th scope="col">Ac System</th>
                    <th scope="col">Defects</th>
                    <th scope="col">Corrective Action</th>
                    <th scope="col">Corrected By</th>
                    <th scope="col">Date Corrected</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                
                    while($acDescFetch=mysqli_fetch_assoc($acDescResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:80%;'>
                <td><?php echo $acDescFetch['TAIL_NO']?></td>
                <td><?php echo $acDescFetch['DATE']?></td>
                <td><?php echo $acDescFetch['MAINTENANCE_TYPE']?></td>
                <td><?php echo $acDescFetch['REPORTED_BY']?></td>
                <td><?php echo $acDescFetch['SNAG']?></td>
                <td><?php echo $acDescFetch['AC_SYSTEM']?></td>
                <td><?php echo $acDescFetch['DEFECTS']?></td>
                <td><?php echo $acDescFetch['CORRECTIVE_ACTION']?></td>
                <td><?php echo $acDescFetch['CORRECTED_BY']?></td>
                <td><?php echo $acDescFetch['DATE_CORRECTED']?></td>
                <td><?php echo $acDescFetch['UNIT_CODE']?></td>
                <td><?php echo $acDescFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeleteAcDescWorkRecord?acDescId=<?php echo $acDescFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
                      <button type="button" style="border-radius:1px;" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                  </div>
                </div>
              </div><!-- End fullscreen Modal-->


             <!-- large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                CLICK TO ADD NEW DESCREPANCY
              </button>
              <div class="modal fade" id="largeModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW DESCREPANCY & WORK RECORD</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      padding-left:40px;
                      padding-right:40px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:80px;
                      "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewAcDescWorkRecord" class="row g-3" style="padding-left:10px; padding-right:10px; padding-top:20px; padding-bottom:20px;">
                <div class="col-md-4">
                  <label for="tailNo" class="form-label">TAIL NO:</label>
                   <select id="tailNo" name="tailNo" class="form-select" style="border-radius:1px;" required>
                    <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];

                        //select all tail nos from platform
                        $tailNoSql = "SELECT TAIL_NO FROM platform WHERE UNIT_CODE = '$account'";
                        $tailNoResult = mysqli_query($conn, $tailNoSql);
                        $totalTailNoRecords = mysqli_num_rows($tailNoResult); 
                        while($tailNoFetch=mysqli_fetch_assoc($tailNoResult))
                        {
                            $tailNo = $tailNoFetch['TAIL_NO'];
                            echo'<option value="'.$tailNo.'">'.$tailNo.'</option>';
                        }                               
                    ?>          
                  </select>
                </div>
                 <div class="col-md-4">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" readonly value="<?php echo $date;?>" name="date" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="maintType" class="form-label">MAINT TYPE:</label>
                   <select id="maintType" name="maintType" class="form-select" style="border-radius:1px;" required>
                    <option value="">choose</option>
                    <option value="SCHEDULED">Scheduled</option> 
                    <option value="UNSCHEDULED">Unscheduled</option>    
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="reportedBy" class="form-label">REPORTED BY:</label>
                   <select id="reportedBy" name="reportedBy" class="form-select" style="border-radius:1px;" required>
                    <option value="">choose</option>
                    <?php

                        //select all pers in the unit
                        $persSql = "SELECT SVC_NO FROM pers WHERE UNIT = '$account'";

                        $persResult = mysqli_query($conn, $persSql);
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
                  <label for="snag" class="form-label">SNAG:</label>
                   <select id="snag" name="snag" class="form-select" style="border-radius:1px;" required>
                    <option value="">choose</option>
                    <option value="AIRBORNE">Airborne</option> 
                    <option value="GROUND">Ground</option>    
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="acSystem" class="form-label">AC SYSTEM:</label>
                   <select id="acSystem" name="acSystem" class="form-select" style="border-radius:1px;" required>
                    <option value="">choose</option>
                    <option value="AIRFRAME">Airframe</option> 
                    <option value="ARMAMENT">Armament</option>
                    <option value="AVIONICS">Avionics</option>
                    <option value="ELECTROMECH">Electromech</option>
                    <option value="ENGINE">Engine</option>  
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                  <input type="text" name="unit" readonly value="<?php echo $_SESSION['account'];?>" class="form-control" id="unit" placeholder="unit" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="correctedBy" class="form-label">CORRECTED BY:</label>
                   <input type="text" name="correctedBy" class="form-control" id="correctedBy" placeholder="corrected by" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="dateCorrected" class="form-label">DATE CORRECTED:</label>
                   <input type="date" name="dateCorrected" class="form-control" id="dateCorrected" value="<?php echo $date;?>" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="defect" class="form-label">DEFECT:</label>
                   <input type="text" name="defect" class="form-control" id="defect" placeholder="defect" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="correctiveAction" class="form-label">CORRECTIVE ACTION:</label>
                   <input type="text" name="correctiveAction" class="form-control" id="correctiveAction" placeholder="corrective action" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End large Modal-->


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