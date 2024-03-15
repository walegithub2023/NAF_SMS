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
      <h1>PERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Pers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

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

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">ALL PERS</h5>
              <p>
                To see all personnel, click the "CLICK TO VIEW ALL PERS" button.
              </p>


             <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
                CLICK TO VIEW ALL PERS
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
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
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