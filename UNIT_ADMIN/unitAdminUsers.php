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
      <h1 style="font-weight:normal;">USERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

          <?php
                          //MESSAGES FROM successMessageForNewUser START HERE
                          // Check if a successMessageForNewUser is set in the session
                          if (isset($_SESSION['successMessageForNewUser'])) {
                              // Display the successMessageForNewUser
                              echo '<div>' . $_SESSION['successMessageForNewUser'] . '</div>';

                              // Unset the successMessageForNewUser
                              unset($_SESSION['successMessageForNewUser']);
                  }else

                  // Check if a alreadyExistsMessageForNewUser is set in the session
                  if (isset($_SESSION['alreadyExistsMessageForNewUser'])) {
                              // Display the alreadyExistsMessageForNewUser message
                              echo '<div>' . $_SESSION['alreadyExistsMessageForNewUser'] . '</div>';

                              // Unset the alreadyExistsMessageForNewUser
                              unset($_SESSION['alreadyExistsMessageForNewUser']);
                  }else

                  // Check if a passwordsUnmatchedMessageForNewUser is set in the session
                  if (isset($_SESSION['passwordsUnmatchedMessageForNewUser'])) {
                              // Display the passwordsUnmatchedMessageForNewUser message
                              echo '<div>' . $_SESSION['passwordsUnmatchedMessageForNewUser'] . '</div>';

                              // Unset the passwordsUnmatchedMessageForNewUser
                              unset($_SESSION['passwordsUnmatchedMessageForNewUser']);
                  }
                  //MESSAGES FROM passwordsUnmatchedMessageForNewUser END HERE
          ?>


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

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">USERS - <?php echo $account." "; ?></h5>
              <p>
                Click the first button to see all  unit users, and the other button to add new user to the unit.
              </p>


             <!-- large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                CLICK TO VIEW ALL USERS IN THE UNIT
              </button>

               <div class="modal fade" id="largeModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">USERS - <?php echo $account." "; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                       padding-left:50px;
                       padding-right:50px;
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
                    <th scope="col">Serial</th>
                    <th scope="col">Svc No</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                       $serial = 1;
                    while($userFetch=mysqli_fetch_assoc($userResult))
            {
            ?>
                <tr id='userRow' style='text-transform:; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $userFetch['SVC_NO']?></td>
                <td><?php echo $userFetch['USER_ROLE']?></td>
                <td><?php echo $userFetch['UNIT_CODE']?></td>   
                <td><a style="color:black;" href='unitAdminDeleteUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS USER??? DELETING THIS USER REMOVES THE USER FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
                CLICK TO ADD NEW USER TO THE UNIT
              </button>
              <div class="modal fade" id="basicModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW USER - <?php echo $account; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      padding-left:25px;
                      padding-right:25px;
                      padding-top:0px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:80px;
                      "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewUser" class="row g-3" style="padding-left:10px; padding-right:10px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-6">
                  <label for="userRole" class="form-label">ROLE:</label>
                  <select id="userRole" name="userRole" class="form-select" style="border-radius:1px;" required>
                    <option value="">Choose</option>
                    <option value="UNIT_ADMIN">Unit_Admin</option>
                    <option value="UNIT_EDITOR">Unit_Editor</option>
                    <option value="UNIT_VIEWER">Unit_Viewer</option>
                  </select>
                </div>
                  <div class="col-md-6">
                  <label for="unit" class="form-label">UNIT:</label>
                  <input type="text" name="unit" readonly value="<?php echo $account;?>" class="form-control" id="unit" placeholder="Enter unit" style="border-radius:1px;" required>
                </div>
                <div class="col-md-12">
                  <label for="svcNo" class="form-label">SVC NO:</label>
                  <select id="svcNo" name="svcNo" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];
                        $persSQL = "SELECT SVC_NO FROM pers WHERE UNIT = '$account'";
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
                  <label for="password" class="form-label">PASSWORD:</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" style="border-radius:1px;" required>
                </div>
                  <div class="col-md-6">
                  <label for="confirmPassword" class="form-label">CONFIRM:</label>
                  <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm" style="border-radius:1px;" required>
                </div>
                <div class="">
                  <button type="submit" name="add" class="btn btn-primary" style="border-radius:2px; width:120px; height:50px">CREATE</button>
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