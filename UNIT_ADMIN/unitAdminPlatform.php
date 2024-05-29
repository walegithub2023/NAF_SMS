<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


  $account = $_SESSION['account'];
    $platformSQL = "SELECT * FROM platform WHERE UNIT_CODE = '$account'";
    $platformResult = mysqli_query($conn, $platformSQL);
    $totalRecords = mysqli_num_rows($platformResult);  
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
      <h1 style="font-weight:normal;">PLATFORM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Platform</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
                    //MESSAGES FROM successMessageForNewPlatform START HERE
                    // Check if a successMessageForNewPlatform is set in the session
                    if (isset($_SESSION['successMessageForNewPlatform'])) {
                        // Display the successMessageForNewPlatform
                        echo '<div>' . $_SESSION['successMessageForNewPlatform'] . '</div>';

                        // Unset the successMessageForNewPlatform
                        unset($_SESSION['successMessageForNewPlatform']);
            }else

            // Check if a failureMessageForNewPlatform is set in the session
            if (isset($_SESSION['failureMessageForNewPlatform'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewPlatform'] . '</div>';

                        // Unset the failureMessageForNewPlatform
                        unset($_SESSION['failureMessageForNewPlatform']);
            }else

                // Check if a alreadyAddedMessageForNewPlatform is set in the session
            if (isset($_SESSION['alreadyAddedMessageForNewPlatform'])) {
                        // Display the alreadyAddedMessageForNewPlatform message
                        echo '<div>' . $_SESSION['alreadyAddedMessageForNewPlatform'] . '</div>';

                        // Unset the alreadyAddedMessageForNewPlatform
                        unset($_SESSION['alreadyAddedMessageForNewPlatform']);
            }
            //MESSAGES FROM alreadyAddedMessageForNewPlatform END HERE
    ?>

         <?php
                    //MESSAGES FROM successMessageForDelete START HERE
                    // Check if a successMessageForDelete is set in the session
                    if (isset($_SESSION['successMessageForDelete'])) {
                        // Display the successMessageForDelete
                        echo '<div>' . $_SESSION['successMessageForDelete'] . '</div>';

                        // Unset the successMessageForDelete
                        unset($_SESSION['successMessageForDelete']);
            }else

            // Check if a failureMessageForDeletePlatform is set in the session
            if (isset($_SESSION['failureMessageForDeletePlatform'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeletePlatform'] . '</div>';

                        // Unset the failureMessageForDeletePlatform
                        unset($_SESSION['failureMessageForDeletePlatform']);
            }
            //MESSAGES FROM failureMessageForDeletePlatform END HERE
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $account." "; ?>PLATFORMS</h5>
              <p>
                Click the first button to see all unit platforms, and the other button to add new platform to the unit.
              </p>


             <!-- large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                CLICK TO VIEW ALL PLATFORMS IN THE UNIT
              </button>

               <div class="modal fade" id="largeModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title"><?php echo $account." "; ?>PLATFORMS</h5>
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
                     <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Description</th>
                    <th scope="col">Tail No</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($platformFetch=mysqli_fetch_assoc($platformResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $platformFetch['PLATFORM']?></td>
                <td><?php echo $platformFetch['DESCRIPTION']?></td>
                <td><?php echo $platformFetch['TAIL_NO']?></td>
                <td><?php echo $platformFetch['UNIT_CODE']?></td>
                <td><?php echo $platformFetch['STATUS']?></td>
                <td><?php echo $platformFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeletePlatform?platformId=<?php echo $platformFetch['PLATFORM_ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS PLATFORM??? DELETING THIS PLATFORM REMOVES THE PLATFORM FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
              </div><!-- End large Modal-->


             <!-- Basic Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal4">
                CLICK TO ADD NEW PLATFORM TO THE UNIT
              </button>
              <div class="modal fade" id="basicModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW PLATFORM</h5>
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
              <form method="post" action="unitAdminProcessNewPlatform" class="row g-3" style="padding-left:10px; padding-right:10px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-6">
                  <label for="platform" class="form-label">PLATFORM:</label>
                  <input type="text" name="platform" class="form-control" id="platform" placeholder="platform" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-6">
                  <label for="description" class="form-label">DESCRIPTION:</label>
                  <input type="text" name="description" class="form-control" id="description" placeholder="description" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="tailNo" class="form-label">TAIL NO:</label>
                  <input type="text" name="tailNo" class="form-control" id="tailNo" placeholder="tail no" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-6">
                  <label for="unit" class="form-label">UNIT:</label>
                   <input type="text" name="unit" readonly value="<?php echo $_SESSION['account'];?>" class="form-control" id="unit" placeholder="unit" style="border-radius:2px;" required>
                  </div>
                  <div class="col-md-6">
                  <label for="status" class="form-label">STATUS:</label>
                   <input type="text" name="status" class="form-control" id="status" placeholder="status" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12" style="margin-top:40px;">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
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