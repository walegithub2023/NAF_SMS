<?php
include('../Connection.php');
include 'superAdminHeader.php';
include 'superAdminSideNavBar.php';

    $account = $_SESSION['account'];
    $auditSQL = "SELECT * 
            FROM audittrail
            INNER JOIN
            users
            ON
            audittrail.SVC_NO = users.SVC_NO";


    $auditResult = mysqli_query($conn, $auditSQL);
    $totalRecords = mysqli_num_rows($auditResult);  
    $remark = "NIL";

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>AUDIT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="superAdminHome">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
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
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:75%;">
                <thead>
                  <tr>
                    <th scope="col">SERIAL</th>
                    <th scope="col">USER</th>
                    <th scope="col">USER ROLE</th>
                    <th scope="col">ACTION</th>
                    <th scope="col">DESCRIPTION</th>
                   <th scope="col">UNIT</th>
                    <th scope="col">DATE & TIME</th>
                    <th scope="col">Delete</th>
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
                <td><a style="color:black;" href='superAdminDeleteAuditTrail?auditId=<?php echo $auditFetch['AUDIT_ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS AUDIT RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
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

<?php include 'superAdminFooter.php'; ?>
