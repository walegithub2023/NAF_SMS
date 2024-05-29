<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';

    $account = $_SESSION['account'];
    $auditSQL = "SELECT * 
            FROM audittrail
            INNER JOIN
            users
            ON
            audittrail.SVC_NO = users.SVC_NO
            WHERE users.UNIT_CODE = '$account'";


    $auditResult = mysqli_query($conn, $auditSQL);
    $totalRecords = mysqli_num_rows($auditResult);  
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
      <h1  style="font-weight:normal;">AUDIT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Audit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">AUDIT TRAIL RECORDS - <?php echo $account." "; ?></h5>
              <p>
                Click the button below to see all audit records.
              </p>


             <!-- fullscreen Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                CLICK TO VIEW ALL AUDIT TRAIL RECORDS
              </button>

               <div class="modal fade" id="fullscreenModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-fullscreen" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">AUDIT TRAIL RECORDS - <?php echo $account." "; ?></h5>
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
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:80%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">SERIAL</th>
                    <th scope="col">USER</th>
                    <th scope="col">USER ROLE</th>
                    <th scope="col">ACTION</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">UNIT</th>
                    <th scope="col">DATE & TIME</th>
                  </tr>
                </thead>
                <tbody>
                        <?php 
                    $serial = 1;
                    while($auditFetch=mysqli_fetch_assoc($auditResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:80%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $auditFetch['SVC_NO']?></td>
                 <td><?php echo $auditFetch['USER_ROLE']?></td>
                <td><?php echo $auditFetch['ACTION']?></td>
                <td><?php echo $auditFetch['DESCRIPTION']?></td>
              <td><?php echo $auditFetch['UNIT_CODE']?></td>
                <td><?php echo $auditFetch['DATE_TIME']?></td>
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
              </div><!-- End fullscreen Modal-->


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