
<?php include('../Connection.php'); ?>
<?php include 'unitAdminHeader.php'; ?>
<?php include 'unitAdminSideNavBar.php'; ?>

<?php
    $account = $_SESSION['account'];
    $userSQL = "SELECT * FROM users WHERE UNIT_CODE = '$account'";
    $userResult = mysqli_query($conn, $userSQL);
    $totalRecords = mysqli_num_rows($userResult);  
    $remark = "NIL";

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>USERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Svc No</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Initials</th>
                    <th scope="col">Surname</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Unit</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($userFetch=mysqli_fetch_assoc($userResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $userFetch['SVC_NO']?></td>
                <td><?php echo $userFetch['RANK']?></td>
                <td><?php echo $userFetch['INITIALS']?></td>
                <td><?php echo $userFetch['SURNAME']?></td>
                <td><?php echo $userFetch['USER_ROLE']?></td>
                <td><?php echo $userFetch['UNIT_CODE']?></td>
                <td><a style="color:black" href='unitAdminViewUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='unitAdminEditUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='unitAdminDeleteUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS USER??? DELETING THIS USER REMOVES THE USER FROM THE DATA BASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
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
