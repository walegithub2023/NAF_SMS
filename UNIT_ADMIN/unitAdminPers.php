<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


  $account = $_SESSION['account'];
    $persSQL = "SELECT * FROM pers WHERE UNIT = '$account'";
    $persResult = mysqli_query($conn, $persSQL);
    $totalRecords = mysqli_num_rows($persResult);  
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
      <h1 style="font-weight:normal;">PERSONNEL</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Pers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
                    //MESSAGES FROM successMessageForNewPers START HERE
                    // Check if a successMessageForNewPers is set in the session
                    if (isset($_SESSION['successMessageForNewPers'])) {
                        // Display the successMessageForDeletePers
                        echo '<div>' . $_SESSION['successMessageForNewPers'] . '</div>';

                        // Unset the successMessageForOffrsNominal
                        unset($_SESSION['successMessageForNewPers']);
            }else

            // Check if a failureMessageForNewPers is set in the session
            if (isset($_SESSION['failureMessageForNewPers'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewPers'] . '</div>';

                        // Unset the failureMessageForNewPers
                        unset($_SESSION['failureMessageForNewPers']);
            }else

                // Check if a errorMessageForNewPers is set in the session
            if (isset($_SESSION['errorMessageForNewPers'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['errorMessageForNewPers'] . '</div>';

                        // Unset the errorMessageForNewPers
                        unset($_SESSION['errorMessageForNewPers']);
            }
            //MESSAGES FROM errorMessageForNewPers END HERE
    ?>

         <?php
                    //MESSAGES FROM unitAdminDeletePers START HERE
                    // Check if a successMessageForDeletePers is set in the session
                    if (isset($_SESSION['successMessageForDeletePers'])) {
                        // Display the successMessageForDeletePers
                        echo '<div>' . $_SESSION['successMessageForDeletePers'] . '</div>';

                        // Unset the successMessageForOffrsNominal
                        unset($_SESSION['successMessageForDeletePers']);
            }else

            // Check if a failureMessageForDeletePers is set in the session
            if (isset($_SESSION['failureMessageForDeletePers'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeletePers'] . '</div>';

                        // Unset the failureMessageForDeletePers
                        unset($_SESSION['failureMessageForDeletePers']);
            }
            //MESSAGES FROM adminProcessOffrsNominal END HERE
    ?>

     <?php
                    //MESSAGES FROM successMessageForEditPers START HERE
                    // Check if a successMessageForEditPers is set in the session
                    if (isset($_SESSION['successMessageForEditPers'])) {
                        // Display the successMessageForEditPers
                        echo '<div>' . $_SESSION['successMessageForEditPers'] . '</div>';

                        // Unset the successMessageForEditPers
                        unset($_SESSION['successMessageForEditPers']);
            }
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">ALL PERS</h5>
              <p>
                To see all personnel, click the "CLICK TO VIEW ALL PERS" button. Click the other button to add new pers.
              </p>


             <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
                CLICK TO VIEW ALL PERSONNEL IN THE DATABASE
              </button>

              <div class="modal fade" id="fullscreenModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">ALL PERS</h5>
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
                    <th scope="col">Rank</th>
                    <th scope="col">Initials</th>
                    <th scope="col">S.name</th>
                    <th scope="col">S/Trade</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Appt</th>
                    <th scope="col">DTOS</th>
                    <th scope="col">L.Unit</th>
                    <th scope="col">SOO</th>
                    <th scope="col">LGA</th>
                    <th scope="col">V</th>
                    <th scope="col">E</th>
                    <th scope="col">D</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($persFetch=mysqli_fetch_assoc($persResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:80%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $persFetch['PERS_TYPE']?></td>
                <td><?php echo $persFetch['SVC_NO']?></td>
                <td><?php echo $persFetch['RANK']?></td>
                <td><?php echo $persFetch['INITIALS']?></td>
                <td><?php echo $persFetch['SURNAME']?></td>
                <td><?php echo $persFetch['SPECIALTY_TRADE']?></td>
                <td><?php echo $persFetch['PHONE']?></td>
                <td><?php echo $persFetch['DOB']?></td>
                <td><?php echo $persFetch['UNIT']?></td>
                <td><?php echo $persFetch['APPT']?></td>
                <td><?php echo $persFetch['DTOS']?></td>
                <td><?php echo $persFetch['LAST_UNIT']?></td>
                <td><?php echo $persFetch['STATE']?></td>
                <td><?php echo $persFetch['LGA']?></td>
                <td><a style="color:black" href='unitAdminViewPers?svcNo=<?php echo $persFetch['SVC_NO'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='unitAdminEditPers?svcNo=<?php echo $persFetch['SVC_NO'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='unitAdminDeletePers?svcNo=<?php echo $persFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS PERS??? DELETING THIS PERS REMOVES THE PERS FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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


              <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                CLICK TO ADD NEW PERSONNEL TO THE DATABASE
              </button>

              <div class="modal fade" id="ExtralargeModal" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">NEW PERSONNEL FORM</h5>
                      <button type="button" style="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                      padding-bottom:50px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      width: 100%;
                      zIndex:-1;
                    ">
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewPers" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-3">
                  <label for="persType" class="form-label">PERS_TYPE:</label>
                  <select id="persType" name="persType" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="OFFR(MALE)">Offr(Male)</option>
                         <option value="OFFR(FEMALE)">Offr(Female)</option>
                        <option value="AIRMAN">Airman</option>
                        <option value="AIRWOMAN">Airwoman</option>
                        <option value="CIVILIAN">Civilian</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="svcNo" class="form-label">SVC NO:</label>
                  <input type="text" name="svcNo" class="form-control" id="svcNo" placeholder="svcNo" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="rank" class="form-label">RANK:</label>
                   <select id="rank" name="rank" class="form-select" style="border-radius:2px;" required>
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
                            <option value="MR">CIVILIAN(MR)</option>
                            <option value="MRS">CIVILIAN(MRS)</option>
                            <option value="MASTER">CIVILIAN(MASTER)</option>
                            <option value="MISS">CIVILIAN(MISS)</option>
                  </select>
                </div>
                 <div class="col-md-3">
                  <label for="initials" class="form-label">INITIALS:</label>
                  <input type="text" name="initials" class="form-control" id="initials" placeholder="initials" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="surname" class="form-label">SURNAME:</label>
                  <input type="text" name="surname" class="form-control" id="surname" placeholder="surname" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="specialty_trade" class="form-label">SPECIALTY/TRADE:</label>
                  <select id="specialty_trade" name="specialty_trade" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="COMMS">COMMS</option>
                        <option value="IT">IT</option>
                         <option value="SPACE">SPACE</option>
                         <option value="RADAR">RADAR</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="presentUnit" class="form-label">PRESENT UNIT:</label>
                   <select id="presentUnit" name="presentUnit" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                  <div class="col-md-3">
                  <label for="dtos" class="form-label">DTOS:</label>
                  <input type="date" name="dtos" class="form-control" id="dtos" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="appt" class="form-label">APPT:</label>
                  <input type="text" name="appt" class="form-control" id="appt" placeholder="appt" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="state" class="form-label">STATE:</label>
                  <input type="text" name="state" class="form-control" id="state" placeholder="state" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="dob" class="form-label">DOB:</label>
                  <input type="date" name="dob" class="form-control" id="dob" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="lastUnit" class="form-label">LAST UNIT:</label>
                   <select id="lastUnit" name="lastUnit" class="form-select" style="border-radius:2px;" required>
                      <option value="">..select..</option>
                         <?php
                              $unitSQL = "SELECT * FROM units";
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
                <div class="col-md-6">
                  <label for="email" class="form-label">EMAIL:</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="lga" class="form-label">LGA:</label>
                  <input type="text" name="lga" class="form-control" id="lga" placeholder="lga" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="phone" class="form-label">PHONE:</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="addNewPers" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
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