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
      <h1>AUDIT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Audit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
              <h5 class="card-title">Audit Trail</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="font-size:90%;">
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
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
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
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'unitAdminFooter.php'; ?>
