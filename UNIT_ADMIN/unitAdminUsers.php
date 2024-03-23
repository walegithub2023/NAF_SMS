
<?php include('../Connection.php'); ?>
<?php include 'unitAdminHeader.php'; ?>
<?php include 'unitAdminSideNavBar.php';?>
<?php include('../functions.php');?>

<?php
    $account = $_SESSION['account'];
    $userSQL = "SELECT * FROM users WHERE UNIT_CODE = '$account'";
    $userResult = mysqli_query($conn, $userSQL);
    $totalRecords = mysqli_num_rows($userResult);  
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
      <h1>USERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    
         <?php
                    //MESSAGES FROM successMessageForDeleteUser START HERE
                    // Check if a successMessageForDeleteUser is set in the session
                    if (isset($_SESSION['successMessageForDeleteUser'])) {
                        // Display the successMessageForDeleteUser
                        echo '<div>' . $_SESSION['successMessageForDeleteUser'] . '</div>';

                        // Unset the successMessageForDeleteUser
                        unset($_SESSION['successMessageForDeleteUser']);
            }else

            // Check if a failureMessageForDeleteUser is set in the session
            if (isset($_SESSION['failureMessageForDeleteUser'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteUser'] . '</div>';

                        // Unset the failureMessageForDeleteUser
                        unset($_SESSION['failureMessageForDeleteUser']);
            }
            //MESSAGES FROM failureMessageForDeleteUser END HERE
    ?>


   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:75%;">
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
                <td>
                 
                <!-- Basic Modal -->
                        <a style="color:grey; margin-left:5px; color:black; font-size:;" type="button" data-bs-toggle="modal" data-bs-target="#basicModal"><i class='bi bi-trash' id='deleteButton'></i>
                    
                        <div class="modal fade" id="basicModal" tabindex="-1" style="font-size:100%;">
                          <div class="modal-dialog">
                            <div class="modal-content" style="border-radius:1px; text-align:justify; padding-left:10px; padding-right:10px;">
                              <div class="modal-header">
                                <h5 class="modal-title">UNIT ADMIN DELETE THIS USER</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete this user??? Deleting this user removes him/her from the database.
                                Click "CANCEL" to cancel this action, and "DELETE" to delete.
                              </div>
                              <div class="modal-footer">
                                <a type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</a>
                                <a type="submit" href='unitAdminDeleteUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' name="delete" style="border-radius:1px;" class="btn btn-primary">DELETE</a>
                              </div>
                            </div>
                          </div>
                        </div>
              <!-- End Basic Modal-->
                </td>
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
