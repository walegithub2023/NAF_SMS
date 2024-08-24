<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');

//get today's date
$date = date("Y-m-d");
$account = $_SESSION['account'];


   
//get offrs' str in the unit at the time of collecting today's pde ste
$offrsStr = "SELECT * FROM pers WHERE ((PERS_TYPE = 'OFFR(MALE)' OR PERS_TYPE = 'OFFR(FEMALE)') AND UNIT = '$account')";
$offrsStrResult = mysqli_query($conn, $offrsStr);
$totalOffrsStrResult = mysqli_num_rows($offrsStrResult); 

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
      <h1 style="font-weight:normal;">PDE STATE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Pde State</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     
      <?php
                    //MESSAGES FROM successMessageForNewPdeState STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForNewPdeState']);
            }
            else if (isset($_SESSION['failureMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForNewPdeState']);
            }

             else if (isset($_SESSION['failureMessage2ForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessage2ForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessage2ForNewPdeState']);
            }

            else if (isset($_SESSION['alreadyAddedMessageForNewPdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['alreadyAddedMessageForNewPdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['alreadyAddedMessageForNewPdeState']);
            }
    ?>


  <?php
                    //MESSAGES FROM successMessageForDeletePdeState STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForDeletePdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeletePdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeletePdeState']);
            }
            else if (isset($_SESSION['failureMessageForDeletePdeState'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForDeletePdeState'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeletePdeState']);
            }
    ?>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">Parade State</h5>
              <p>
                Click the buttons below to see today's pde state, pde state history, and to add new parade state to the database.
              </p>
              
    

    <!-- Basic Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal4">
              ADD NEW PDE STATE.....
              </button>
              <div class="modal fade" id="basicModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW PDE STATE - <?php echo $date; ?></h5>
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
              <form method="post" action="unitAdminProcessNewPdeState" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px;">
                <div class="col-md-6">
                  <label for="svcNo" class="form-label">SVC NO</label>
                <select id="svcNo" name="svcNo" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];

                        //select all pers that are not on leave or pass
                        $persSql = "SELECT pers.SVC_NO
                        FROM pers
                        LEFT JOIN leave_pass ON pers.SVC_NO = leave_pass.SVC_NO
                        WHERE
                        leave_pass.SVC_NO IS NULL
                        AND
                        pers.UNIT = '$account'";

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

                 <div class="col-md-6">
                  <label for="description" class="form-label">PDE STATE:</label>
                  <select id="pdeState" name="pdeState" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="ON PDE">On pde</option>
                        <option value="LEAVE">Leave</option>
                        <option value="PASS">Pass</option>
                        <option value="CSE">Cse</option>
                        <option value="OPS">Ops</option>
                        <option value="ATT">Att</option>
                        <option value="SICK">Sick</option>
                        <option value="EDN">Edn</option>
                        <option value="AWOL">Awol</option>
                  </select>
                   </div>
            
                  <div class="col-md-6">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
              
                 <div class="col-md-6">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" name="date" readonly value="<?php echo $date;?>" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>

                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
                      <button type="submit" class="btn btn-primary" name="add" style="border-radius:1px;">CREATE</button>
                </div>
              </form>
             
              <!-- End Multi Columns Form -->
                    </div>
                 
                  </div>
                </div>
              </div><!-- End Basic Modal-->




               <!-- Large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal4">
                PARADE STATE-OFFRS....
              </button>
              <div class="modal fade" id="largeModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">OFFRS PARADE STATE - <?php echo $date;?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                padding-right:90px;
                padding-left:90px;
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                zIndex:-1;
                " 
                >
           <?php

            //select all offrs from the unit
            $unitPersOffrs = "SELECT * FROM pers WHERE UNIT = '$account' AND (PERS_TYPE = 'OFFR(MALE)' OR PERS_TYPE = 'OFFR(MALE)')";
            $unitPersResult = mysqli_query($conn, $unitPersOffrs);
            $totalUnitPersOffrs = mysqli_num_rows($unitPersResult);


           //select offrs on pde in today's pde state
            $onPdeSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'ON PDE'";

            $onPdeSqlResult = mysqli_query($conn, $onPdeSQL);
            $onPdeSqlResultRecords = mysqli_num_rows($onPdeSqlResult);  
            $remark = "NIL";
            

            
            //select leave offrs in today's pde state
            $leaveOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'LEAVE'";
            
            $leaveOffrsSqlResult = mysqli_query($conn, $leaveOffrsSQL);
            $totalLeaveOffrsSqlResult = mysqli_num_rows($leaveOffrsSqlResult);  
            $remark = "NIL"; 



            //select pass offrs in today's pde state
            $passOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'PASS'";
            
            $passOffrsSqlResult = mysqli_query($conn, $passOffrsSQL);
            $totalPassOffrsSqlResult = mysqli_num_rows($passOffrsSqlResult);  
            $remark = "NIL";
            
            

             //select course offrs in today's pde state
            $cseOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'CSE'";
            
            $cseOffrsSqlResult = mysqli_query($conn, $cseOffrsSQL);
            $totalCseOffrsSqlResult = mysqli_num_rows($cseOffrsSqlResult);  
            $remark = "NIL";
            
            

            //select ops offrs in today's pde state
            $opsOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'OPS'";
            
            $opsOffrsSqlResult = mysqli_query($conn, $opsOffrsSQL);
            $totalOpsOffrsSqlResult = mysqli_num_rows($opsOffrsSqlResult);  
            $remark = "NIL";
            
            

            //select att offrs in today's pde state
            $attOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'ATT'";
            
            $attOffrsSqlResult = mysqli_query($conn, $attOffrsSQL);
            $totalAttOffrsSqlResult = mysqli_num_rows($attOffrsSqlResult);  
            $remark = "NIL";
            

            //select sick offrs in today's pde state
            $sickOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'SICK'";
            
            $sickOffrsSqlResult = mysqli_query($conn, $sickOffrsSQL);
            $totalSickOffrsSqlResult = mysqli_num_rows($sickOffrsSqlResult);  
            $remark = "NIL";

            

            //select edn offrs in today's pde state
            $ednOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'EDN'";
            
            $ednOffrsSqlResult = mysqli_query($conn, $ednOffrsSQL);
            $totalEdnOffrsSqlResult = mysqli_num_rows($ednOffrsSqlResult);  
            $remark = "NIL";
            
            

            //select awol offrs in today's pde state
            $awolOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'AWOL'";
            
            $awolOffrsSqlResult = mysqli_query($conn, $awolOffrsSQL);
            $totalAwolOffrsSqlResult = mysqli_num_rows($awolOffrsSqlResult);  
            $remark = "NIL";


?>
            <!-- Table  with stripped rows -->
            <div class="table-responsive" style="">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>

    <!--    display another row of headers -->
                <tr>
                    <th scope="col">Str</th>
                    <th scope="col">On pde</th>
                    <th scope="col">Leave</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Cse</th>
                    <th scope="col">Ops</th>
                    <th scope="col">Att</th>
                    <th scope="col">Sick</th>
                    <th scope="col">Edn</th>
                    <th scope="col">Awol</th>
                  </tr>
                </thead>
                <tbody>
                   
              

                <!-- display other totals -->
            <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $totalUnitPersOffrs;?></td>
                <td><?php echo $onPdeSqlResultRecords;?></td>
                <td><?php echo $totalLeaveOffrsSqlResult;?></td>
                <td><?php echo $totalPassOffrsSqlResult;?></td>
                <td><?php echo $totalCseOffrsSqlResult;?></td>
                <td><?php echo $totalOpsOffrsSqlResult;?></td>
                <td><?php echo $totalAttOffrsSqlResult;?></td>
                <td><?php echo $totalSickOffrsSqlResult;?></td>
                <td><?php echo $totalEdnOffrsSqlResult;?></td>
                <td><?php echo $totalAwolOffrsSqlResult;?></td>
            </tr>
    
                </tbody>
              </table>
            <!-- End Table with stripped rows -->   
        </div>
        <!-- End of table div -->
       
      
        
        </div>
    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div><!-- End large Modal-->



     <!-- large Modal 3 -->
     <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal3">
            DETAILS-PDE STE-OFFRS
              </button>
              <div class="modal fade" id="largeModal3" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">DETAILS OF TODAY'S PDE STATE-OFFRS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                                padding-right:50px;
                                padding-left:50px;
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
                    <th scope="col">Svc No</th>
                    <th scope="col">Pde State</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Date</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                       <?php 

                        //select all offrs in today's pde state
            $todaysPdeStateOffrsSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'OFFR(MALE)'
            OR
            pers.PERS_TYPE = 'OFFR(FEMALE)'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            ";
            
            $todaysPdeStateOffrsResult = mysqli_query($conn, $todaysPdeStateOffrsSQL);
            $totalSickOffrsSqlResult = mysqli_num_rows($todaysPdeStateOffrsResult);  
                    
            while($todaysPdeStateOffrsResultFetch=mysqli_fetch_assoc($todaysPdeStateOffrsResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $todaysPdeStateOffrsResultFetch['SVC_NO']?></td>
                <td><?php echo $todaysPdeStateOffrsResultFetch['PDE_STATE']?></td>
                <td><?php echo $todaysPdeStateOffrsResultFetch['UNIT_CODE']?></td>
                <td><?php echo $todaysPdeStateOffrsResultFetch['DATE']?></td>
                <td><?php echo $todaysPdeStateOffrsResultFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeletePdeState?pdeStateId=<?php echo $todaysPdeStateOffrsResultFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div>
    
    <!-- End large Modal 3-->



     <!-- Large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal6">
                PARADE STATE -AIRMEN
              </button>
              <div class="modal fade" id="largeModal6" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">AIRMEN PARADE STATE - <?php echo $date;?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                padding-right:90px;
                padding-left:90px;
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                zIndex:-1;
                " 
                >
           <?php

            //select all airmen and airwomen from the unit
            $unitPersAirmen = "SELECT * FROM pers WHERE UNIT = '$account' AND (PERS_TYPE = 'AIRMAN' OR PERS_TYPE = 'AIRWOMAN')";
            $unitPersAirmenResult = mysqli_query($conn, $unitPersAirmen);
            $totalUnitPersAirmen = mysqli_num_rows($unitPersAirmenResult);


           //select airmen on pde in today's pde state
            $onPdeSQLAirmen = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'ON PDE'";

            $onPdeSqlResultAirmen = mysqli_query($conn, $onPdeSQLAirmen);
            $onPdeSqlResultRecordsAirmen = mysqli_num_rows($onPdeSqlResultAirmen);  
            $remark = "NIL";
            

            
            //select leave airmen in today's pde state
            $leaveAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'LEAVE'";
            
            $leaveAirmenSqlResult = mysqli_query($conn, $leaveAirmenSQL);
            $totalLeaveAirmenSqlResult = mysqli_num_rows($leaveAirmenSqlResult);  
            $remark = "NIL"; 



            //select pass airmen in today's pde state
            $passAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'PASS'";
            
            $passAirmenSqlResult = mysqli_query($conn, $passAirmenSQL);
            $totalPassAirmenSqlResult = mysqli_num_rows($passAirmenSqlResult);  
            $remark = "NIL";
            
            

             //select course airmen in today's pde state
            $cseAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'CSE'";
            
            $cseAirmenSqlResult = mysqli_query($conn, $cseAirmenSQL);
            $totalCseAirmenSqlResult = mysqli_num_rows($cseAirmenSqlResult);  
            $remark = "NIL";
            
            

            //select ops airmen in today's pde state
            $opsAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'OPS'";
            
            $opsAirmenSqlResult = mysqli_query($conn, $opsAirmenSQL);
            $totalOpsAirmenSqlResult = mysqli_num_rows($opsAirmenSqlResult);  
            $remark = "NIL";
            
            

            //select att airmen in today's pde state
            $attAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'ATT'";
            
            $attAirmenSqlResult = mysqli_query($conn, $attAirmenSQL);
            $totalAttAirmenSqlResult = mysqli_num_rows($attAirmenSqlResult);  
            $remark = "NIL";
            

            //select sick airmen in today's pde state
            $sickAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'SICK'";
            
            $sickAirmenSqlResult = mysqli_query($conn, $sickAirmenSQL);
            $totalSickAirmenSqlResult = mysqli_num_rows($sickAirmenSqlResult);  
            $remark = "NIL";

            

            //select edn airmen in today's pde state
            $ednAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'EDN'";
            
            $ednAirmenSqlResult = mysqli_query($conn, $ednAirmenSQL);
            $totalEdnAirmenSqlResult = mysqli_num_rows($ednAirmenSqlResult);  
            $remark = "NIL";
            
            

            //select awol airmen in today's pde state
            $awolAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            AND
            pde_state.PDE_STATE = 'AWOL'";
            
            $awolAirmenSqlResult = mysqli_query($conn, $awolAirmenSQL);
            $totalAwolAirmenSqlResult = mysqli_num_rows($awolAirmenSqlResult);  
            $remark = "NIL";


?>
            <!-- Table  with stripped rows -->
            <div class="table-responsive" style="">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>

    <!--    display another row of headers -->
                <tr>
                    <th scope="col">Str</th>
                    <th scope="col">On pde</th>
                    <th scope="col">Leave</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Cse</th>
                    <th scope="col">Ops</th>
                    <th scope="col">Att</th>
                    <th scope="col">Sick</th>
                    <th scope="col">Edn</th>
                    <th scope="col">Awol</th>
                  </tr>
                </thead>
                <tbody>
                   
              

                <!-- display other totals -->
            <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $totalUnitPersAirmen;?></td>
                <td><?php echo $onPdeSqlResultRecordsAirmen;?></td>
                <td><?php echo $totalLeaveAirmenSqlResult;?></td>
                <td><?php echo $totalPassAirmenSqlResult;?></td>
                <td><?php echo $totalCseAirmenSqlResult;?></td>
                <td><?php echo $totalOpsAirmenSqlResult;?></td>
                <td><?php echo $totalAttAirmenSqlResult;?></td>
                <td><?php echo $totalSickAirmenSqlResult;?></td>
                <td><?php echo $totalEdnAirmenSqlResult;?></td>
                <td><?php echo $totalAwolAirmenSqlResult;?></td>
            </tr>
    
                </tbody>
              </table>
            <!-- End Table with stripped rows -->   
        </div>
        <!-- End of table div -->
       
      
        
        </div>
    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div><!-- End large Modal-->



    <!-- large Modal 3 -->
     <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal8">
            DETLS-PDE STE-AIRMEN
              </button>
              <div class="modal fade" id="largeModal8" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">DETAILS OF TODAY'S PDE STATE-AIRMEN</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                              style="
                                padding-right:50px;
                                padding-left:50px;
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
                    <th scope="col">Svc No</th>
                    <th scope="col">Pde State</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Date</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                       <?php 

                        //select all airmen in today's pde state
            $todaysPdeStateAirmenSQL = "SELECT *
            FROM pers
            JOIN pde_state
            ON pers.SVC_NO = pde_state.SVC_NO
            WHERE
            (
            pers.PERS_TYPE = 'AIRMAN'
            OR
            pers.PERS_TYPE = 'AIRWOMAN'
            )
            AND
            pde_state.DATE = '$date'
            AND
            pde_state.UNIT_CODE = '$account'
            ";
            
            $todaysPdeStateAirmenResult = mysqli_query($conn, $todaysPdeStateAirmenSQL);
            $totalSickSqlResultAirmen = mysqli_num_rows($todaysPdeStateAirmenResult);  
                    
            while($todaysPdeStateAirmenResultFetch=mysqli_fetch_assoc($todaysPdeStateAirmenResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $todaysPdeStateAirmenResultFetch['SVC_NO']?></td>
                <td><?php echo $todaysPdeStateAirmenResultFetch['PDE_STATE']?></td>
                <td><?php echo $todaysPdeStateAirmenResultFetch['UNIT_CODE']?></td>
                <td><?php echo $todaysPdeStateAirmenResultFetch['DATE']?></td>
                <td><?php echo $todaysPdeStateAirmenResultFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeletePdeState?pdeStateId=<?php echo $todaysPdeStateAirmenResultFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
     </div>
    </div>
    </div>
    </div>
    
    <!-- End large Modal -->




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