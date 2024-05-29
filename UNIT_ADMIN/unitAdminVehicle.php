<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


    $account = $_SESSION['account'];

    $date = date("Y-m-d");

    $vehicleSQL = "SELECT * FROM vehicle WHERE UNIT_CODE = '$account'";
    $vehicleResult = mysqli_query($conn, $vehicleSQL);
    $vehicleResultTotalRecords = mysqli_num_rows($vehicleResult);  


    $vehicleTyreStatusSQL = "SELECT * FROM vehicle_tyre_status WHERE UNIT_CODE = '$account'";
    $vehicleTyreStatusResult = mysqli_query($conn, $vehicleTyreStatusSQL);
    $vehicleTyreStatusResultTotalRecords = mysqli_num_rows($vehicleTyreStatusResult);
    
    
    $vehicleInspectionSQL = "SELECT * FROM vehicle_inspection WHERE unit = '$account'";
    $vehicleInspectionResult = mysqli_query($conn, $vehicleInspectionSQL);
    $vehicleInspectionResultTotalRecords = mysqli_num_rows($vehicleInspectionResult);
    
    //select all records from vehicle_mov_tickets table
    $vehMovTicketSQL = "SELECT * FROM vehicle_mov_tickets WHERE UNIT_CODE = '$account'";
    $vehMovTicketResult = mysqli_query($conn, $vehMovTicketSQL);
    $vehMovTicketResultTotalRecords = mysqli_num_rows($vehMovTicketResult);  

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
      <h1 style="font-weight:normal;">VEHICLE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Vehicle</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
                    //MESSAGES FROM successMessageForNewVehicle START HERE
                    // Check if a successMessageForNewVehicle is set in the session
                    if (isset($_SESSION['successMessageForNewVehicle'])) {
                        // Display the successMessageForNewVehicle
                        echo '<div>' . $_SESSION['successMessageForNewVehicle'] . '</div>';

                        // Unset the successMessageForNewVehicle
                        unset($_SESSION['successMessageForNewVehicle']);
            }else

            // Check if a failureMessageForNewVehicle is set in the session
            if (isset($_SESSION['failureMessageForNewVehicle'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewVehicle'] . '</div>';

                        // Unset the failureMessageForNewVehicle
                        unset($_SESSION['failureMessageForNewVehicle']);
            }else

                // Check if a alreadyAddedMessageForNewVehicle is set in the session
            if (isset($_SESSION['alreadyAddedMessageForNewVehicle'])) {
                        // Display the alreadyAddedMessageForNewVehicle message
                        echo '<div>' . $_SESSION['alreadyAddedMessageForNewVehicle'] . '</div>';

                        // Unset the alreadyAddedMessageForNewVehicle
                        unset($_SESSION['alreadyAddedMessageForNewVehicle']);
            }
            //MESSAGES FROM alreadyAddedMessageForNewVehicle END HERE
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

            // Check if a failureMessageForNewVehicle is set in the session
            if (isset($_SESSION['failureMessageForNewVehicle'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewVehicle'] . '</div>';

                        // Unset the failureMessageForNewVehicle
                        unset($_SESSION['failureMessageForNewVehicle']);
            }
            //MESSAGES FROM failureMessageForNewVehicle END HERE
    ?>


 <?php
                    //MESSAGES FROM alreadyAddedMessageForNewTyreStatus START HERE
                    // Check if a alreadyAddedMessageForNewTyreStatus is set in the session
                    if (isset($_SESSION['alreadyAddedMessageForNewTyreStatus'])) {
                        // Display the alreadyAddedMessageForNewTyreStatus
                        echo '<div>' . $_SESSION['alreadyAddedMessageForNewTyreStatus'] . '</div>';

                        // Unset the alreadyAddedMessageForNewTyreStatus
                        unset($_SESSION['alreadyAddedMessageForNewTyreStatus']);
            }else

            // Check if a successMessageForNewTyreStatus is set in the session
            if (isset($_SESSION['successMessageForNewTyreStatus'])) {
                        // Display the successMessageForNewTyreStatus message
                        echo '<div>' . $_SESSION['successMessageForNewTyreStatus'] . '</div>';

                        // Unset the successMessageForNewTyreStatus
                        unset($_SESSION['successMessageForNewTyreStatus']);
            }else

            // Check if a failureMessageForNewTyreStatus is set in the session
            if (isset($_SESSION['failureMessageForNewTyreStatus'])) {
                        // Display the failureMessageForNewTyreStatus message
                        echo '<div>' . $_SESSION['failureMessageForNewTyreStatus'] . '</div>';

                        // Unset the failureMessageForNewTyreStatus
                        unset($_SESSION['failureMessageForNewTyreStatus']);
            }else

            // Check if a successMessageForDelete is set in the session
            if (isset($_SESSION['successMessageForDelete'])) {
                        // Display the successMessageForDelete message
                        echo '<div>' . $_SESSION['successMessageForDelete'] . '</div>';

                        // Unset the successMessageForDelete
                        unset($_SESSION['successMessageForDelete']);
            }else

            // Check if a failureMessageForDeleteTyreStatus is set in the session
            if (isset($_SESSION['failureMessageForDeleteTyreStatus'])) {
                        // Display the failureMessageForDeleteTyreStatus message
                        echo '<div>' . $_SESSION['failureMessageForDeleteTyreStatus'] . '</div>';

                        // Unset the failureMessageForDeleteTyreStatus
                        unset($_SESSION['failureMessageForDeleteTyreStatus']);
            }
            //MESSAGES FROM failureMessageForDeleteTyreStatus END HERE
    ?>


<?php
                    //MESSAGES FROM successMessageForNewVehicleInspection START HERE
                    // Check if a successMessageForNewVehicleInspection is set in the session
                    if (isset($_SESSION['successMessageForNewVehicleInspection'])) {
                        // Display the successMessageForNewVehicleInspection
                        echo '<div>' . $_SESSION['successMessageForNewVehicleInspection'] . '</div>';

                        // Unset the successMessageForNewVehicleInspection
                        unset($_SESSION['successMessageForNewVehicleInspection']);
            }else

            // Check if a failureMessageForNewVehicleInspection is set in the session
            if (isset($_SESSION['failureMessageForNewVehicleInspection'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewVehicleInspection'] . '</div>';

                        // Unset the failureMessageForNewVehicleInspection
                        unset($_SESSION['failureMessageForNewVehicleInspection']);
            }
            //MESSAGES FROM failureMessageForNewVehicleInspection END HERE
?>


<?php
                    //MESSAGES FROM successMessageForDeleteVehicleInspection START HERE
                    // Check if a successMessageForDeleteVehicleInspection is set in the session
                    if (isset($_SESSION['successMessageForDeleteVehicleInspection'])) {
                        // Display the successMessageForDeleteVehicleInspection
                        echo '<div>' . $_SESSION['successMessageForDeleteVehicleInspection'] . '</div>';

                        // Unset the successMessageForDeleteVehicleInspection
                        unset($_SESSION['successMessageForDeleteVehicleInspection']);
            }else

            // Check if a failureMessageForDeleteTyreStatus is set in the session
            if (isset($_SESSION['failureMessageForDeleteTyreStatus'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteTyreStatus'] . '</div>';

                        // Unset the failureMessageForDeleteTyreStatus
                        unset($_SESSION['failureMessageForDeleteTyreStatus']);
            }
            //MESSAGES FROM failureMessageForDeleteTyreStatus END HERE
?>


<?php
                    //MESSAGES FROM successMessageForNewVehicleMovTicket START HERE
                    // Check if a successMessageForNewVehicleMovTicket is set in the session
                    if (isset($_SESSION['successMessageForNewVehicleMovTicket'])) {
                        // Display the successMessageForNewVehicleMovTicket
                        echo '<div>' . $_SESSION['successMessageForNewVehicleMovTicket'] . '</div>';

                        // Unset the successMessageForNewVehicleMovTicket
                        unset($_SESSION['successMessageForNewVehicleMovTicket']);
            }else

            // Check if a failureMessageForNewVehicleMovTicket is set in the session
            if (isset($_SESSION['failureMessageForNewVehicleMovTicket'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewVehicleMovTicket'] . '</div>';

                        // Unset the failureMessageForNewVehicleMovTicket
                        unset($_SESSION['failureMessageForNewVehicleMovTicket']);
            }
            //MESSAGES FROM failureMessageForNewVehicleMovTicket END HERE
?>


<?php
                    //MESSAGES FROM successMessageForDeleteVehicleMovTicket START HERE
                    // Check if a successMessageForDeleteVehicleMovTicket is set in the session
                    if (isset($_SESSION['successMessageForDeleteVehicleMovTicket'])) {
                        // Display the successMessageForDeleteVehicleMovTicket
                        echo '<div>' . $_SESSION['successMessageForDeleteVehicleMovTicket'] . '</div>';

                        // Unset the successMessageForDeleteVehicleMovTicket
                        unset($_SESSION['successMessageForDeleteVehicleMovTicket']);
            }else

            // Check if a failureMessageForDeleteVehicleMovTicket is set in the session
            if (isset($_SESSION['failureMessageForDeleteVehicleMovTicket'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteVehicleMovTicket'] . '</div>';

                        // Unset the failureMessageForDeleteVehicleMovTicket
                        unset($_SESSION['failureMessageForDeleteVehicleMovTicket']);
            }
            //MESSAGES FROM failureMessageForDeleteVehicleMovTicket END HERE
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">VEHICLES - <?php echo $account;?></h5>
              <p>
                Click the buttons to see all unit vihicles, add a new vehicle to the unit, view and add vehicle tyre status, etc.
              </p>


            <!-- Full Screen Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                 ALL VEHICLES
              </button>

               <div class="modal fade" id="fullscreenModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-fullscreen" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title"><?php echo $account." "; ?>VEHICLES</h5>
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
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:80%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Name</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Transmission</th>
                    <th scope="col">Vin/Chasis</th>
                    <th scope="col">Eng No</th>
                    <th scope="col">Plate No</th>
                    <th scope="col">Dtos</th>
                    <th scope="col">Mileage</th>
                    <th scope="col">Price</th>
                    <th scope="col">Deployemnt</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Fault</th>
                    <th scope="col">Remark</th>
                    <th scope="col">D</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($vehicleFetch=mysqli_fetch_assoc($vehicleResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:80%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $vehicleFetch['NAME']?></td>
                <td><?php echo $vehicleFetch['MAKE']?></td>
                <td><?php echo $vehicleFetch['MODEL']?></td>
                <td><?php echo $vehicleFetch['YEAR']?></td>
                <td><?php echo $vehicleFetch['COLOUR']?></td>
                <td><?php echo $vehicleFetch['TRANSMISSION']?></td>
                <td><?php echo $vehicleFetch['VIN']?></td>
                <td><?php echo $vehicleFetch['ENG_NO']?></td>
                <td><?php echo $vehicleFetch['PLATE_NO']?></td>
                <td><?php echo $vehicleFetch['DTOS']?></td>
                <td><?php echo $vehicleFetch['MILEAGE']?></td>
                <td><?php echo $vehicleFetch['PRICE']?></td>
                <td><?php echo $vehicleFetch['DEPLOYMENT']?></td>
                <td><?php echo $vehicleFetch['UNIT_CODE']?></td>
                <td><?php echo $vehicleFetch['STATUS']?></td>
                <td><?php echo $vehicleFetch['FAULT']?></td>
                <td><?php echo $vehicleFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeleteVehicle?vehicleId=<?php echo $vehicleFetch['VEHICLE_ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS VEHICLE??? DELETING THIS VEHICLE REMOVES THE VEHICLE FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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


             <!-- Large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal9">
                NEW VEHICLE
              </button>
              <div class="modal fade" id="largeModal9" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW VEHICLE</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      padding-right:35px;
                      padding-left:35px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:100px;
                      "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewVehicle" class="row g-3" style="padding-left:25px; padding-right:25px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-4">
                  <label for="name" class="form-label">NAME:</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="name" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-4">
                  <label for="make" class="form-label">MAKE:</label>
                  <input type="text" name="make" class="form-control" id="make" placeholder="make" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="model" class="form-label">MODEL:</label>
                   <input type="text" name="model" class="form-control" id="model" placeholder="model" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-4">
                  <label for="year" class="form-label">YEAR:</label>
                   <select id="year" name="year" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <?php
                            // Generate options for years from 1990 to 2050
                            for ($i = 1990; $i <= 2050; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                  </select>
                  </div>
                   <div class="col-md-4">
                  <label for="colour" class="form-label">COLOUR:</label>
                   <input type="text" name="colour" class="form-control" id="colour" placeholder="colour" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="transmission" class="form-label">TRANSMISSION:</label>
                   <select id="transmission" name="transmission" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="MANUAL">Manual</option>
                        <option value="AUTOMATIC">Automatic</option>
                  </select>
                  </div>
                  <div class="col-md-4">
                  <label for="vin" class="form-label">VIN:</label>
                   <input type="text" name="vin" class="form-control" id="vin" placeholder="chasis" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="mileage" class="form-label">MILEAGE:</label>
                   <input type="text" name="mileage" class="form-control" id="mileage" placeholder="mileage" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="price" class="form-label">PRICE:</label>
                   <input type="text" name="price" class="form-control" id="price" placeholder="price" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="deployment" class="form-label">DEPLOYMENT:</label>
                   <input type="text" name="deployment" class="form-control" id="deployment" placeholder="deployment" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                  <input type="text" value="<?php echo $_SESSION['account'];?>" name="unit" class="form-control" id="unit" placeholder="unit" style="border-radius:2px;" required>
                  </div>
                  <div class="col-md-4">
                  <label for="engNo" class="form-label">ENG NO:</label>
                   <input type="text" name="engNo" class="form-control" id="engNo" placeholder="engNo" style="border-radius:2px;" required>
                  </div>
                  <div class="col-md-4">
                  <label for="plateNo" class="form-label">PLATE NO:</label>
                   <input type="text" name="plateNo" class="form-control" id="plateNo" placeholder="plateNo" style="border-radius:2px;" required>
                  </div>
                  <div class="col-md-4">
                  <label for="dtos" class="form-label">DTOS:</label>
                   <input type="date" name="dtos" class="form-control" id="dtos" placeholder="dtos" style="border-radius:2px;" required>
                  </div>
                  <div class="col-md-4">
                  <label for="status" class="form-label">STATUS:</label>
                   <select id="status" name="status" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="SERVICEABLE">s</option>
                        <option value="UNSERVICEABLE">u/s</option>
                  </select>
                  </div>
                  <div class="col-md-6">
                  <label for="fault" class="form-label">FAULT:</label>
                   <input type="text" name="fault" class="form-control" id="fault" placeholder="fault" style="border-radius:2px;" required>
                  </div>
                <div class="col-md-6">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Large Modal-->



              <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                TYRE STATUS.
              </button>

              <div class="modal fade" id="ExtralargeModal" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">VEHICLE TYRE STATUS</h5>
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
                   
                    <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; background-color:white;">
                <thead>	
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Tyre Position</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Production Date</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Date</th>
                    <th scope="col">Tyre Status</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>	
                       <?php 
                    $serial = 1;
                    while($vehicleTyreStatusFetch=mysqli_fetch_assoc($vehicleTyreStatusResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $vehicleTyreStatusFetch['POSITION']?></td>
                <td><?php echo $vehicleTyreStatusFetch['VEHICLE']?></td>
                <td><?php echo $vehicleTyreStatusFetch['PRODUCTION_DATE']?></td>
                <td><?php echo $vehicleTyreStatusFetch['EXPIRY_DATE']?></td>
                <td><?php echo $vehicleTyreStatusFetch['DATE']?></td>
                <td><?php echo $vehicleTyreStatusFetch['STATUS']?></td>
                <td><?php echo $vehicleTyreStatusFetch['UNIT_CODE']?></td>
                <td><?php echo $vehicleTyreStatusFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeleteTyreStatus?tyreStatusId=<?php echo $vehicleTyreStatusFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
              </div><!-- End Extra Large Modal-->



              <!-- Basic Modal 5-->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal5">
                NEW STATUS.
              </button>
              <div class="modal fade" id="basicModal5" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW TYRE STATUS</h5>
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
              <form method="post" action="unitAdminProcessNewTyreStatus" class="row g-3" style="padding-left:25px; padding-right:25px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-6">
                  <label for="position" class="form-label">POSITION:</label>
                  <select id="position" name="position" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="Left Front">Left Front</option>
                        <option value="Right Front">Right Front</option>
                        <option value="Left Rear">Left Rear</option>
                        <option value="Right Rear">Right Rear</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="vehicle" class="form-label">VEHICLE:</label>
                  <select id="vehicle" name="vehicle" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <?php
                              $vehicleSQL = "SELECT * FROM vehicle WHERE UNIT_CODE = '$account'";
                              $vehicleResult = mysqli_query($conn, $vehicleSQL);
                              $totalRecords = mysqli_num_rows($vehicleResult); 
                              while($vehicleFetch=mysqli_fetch_assoc($vehicleResult))
                              {
                                                              
                                  $vehicleName = $vehicleFetch['NAME'];
                                  $vehicleMake = $vehicleFetch['MAKE'];
                                  $vehicleModel = $vehicleFetch['MODEL'];
                                  $vehicleVin = $vehicleFetch['VIN'];
                                  echo'<option value="'.$vehicleVin.'">'.$vehicleVin.' '.$vehicleName.' '.$vehicleModel.'</option>';
                              }                               
                        ?>  
                  </select>
                </div>
                  <div class="col-md-6">
                  <label for="productionDate" class="form-label">PDN.DATE:</label>
                  <input type="date" name="productionDate" class="form-control" id="productionDate" placeholder="productionDate" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="expiryDate" class="form-label">EX.DATE:</label>
                   <input type="date" name="expiryDate" class="form-control" id="expiryDate" placeholder="expiryDate" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-6">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" name="date" readonly value="<?php $date= date("Y-m-d"); echo $date;?>" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-6">
                  <label for="status" class="form-label">STATUS:</label>
                  <select id="status" name="status" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="Expired">Expired</option>
                        <option value="Not Expired">Not Expired</option>
                  </select>
                </div>
                  <div class="col-md-6">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                <div class="col-md-6">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Basic Modal 5-->



              <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal2">
                VEH INSPECT.
              </button>

              <div class="modal fade" id="fullscreenModal2" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-fullscreen" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">VEHICLE INSPECTION</h5>
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
                   
                    <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; background-color:white;">
                <thead>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Last Routine Svc Date</th>
                    <th scope="col">Challenge</th>
                    <th scope="col">Monthly Mileage</th>
                    <th scope="col">Svc Type</th>
                    <th scope="col">Svc Date</th>
                    <th scope="col">Due For Svc (km)</th>
                    <th scope="col">Svc Due Date</th>
                    <th scope="col">Litre Of Oil</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                    <th scope="col">D</th>
                  </tr>
                </thead>
                <tbody>				
            <?php 
                    while($vehicleInspectionFetch=mysqli_fetch_assoc($vehicleInspectionResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:75%;'>
                <td><?php echo $vehicleInspectionFetch['vehicle']?></td>
                <td><?php echo $vehicleInspectionFetch['lastRoutineSvcDate']?></td>
                <td><?php echo $vehicleInspectionFetch['challenge']?></td>
                <td><?php echo $vehicleInspectionFetch['monthlyMileage']?></td>
                <td><?php echo $vehicleInspectionFetch['svcType']?></td>
                <td><?php echo $vehicleInspectionFetch['svcDate']?></td>
                <td><?php echo $vehicleInspectionFetch['kmDueForSvc']?></td>
                <td><?php echo $vehicleInspectionFetch['svcDueDate']?></td>
                <td><?php echo $vehicleInspectionFetch['litreOfOil']?></td>
                <td><?php echo $vehicleInspectionFetch['date']?></td>
                <td><?php echo $vehicleInspectionFetch['status']?></td>
                <td><?php echo $vehicleInspectionFetch['unit']?></td>
                <td><?php echo $vehicleInspectionFetch['remark']?></td>
                <td><a style="color:black" href='unitAdminDeleteVehicleInspection?inspectionId=<?php echo $vehicleInspectionFetch['id'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
              </tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->


              <!-- Large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal2">
                NEW INSPECT
              </button>
              <div class="modal fade" id="largeModal2" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW VEH INSPECTION</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      padding-right:30px;
                      padding-left:30px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:100px;
                      "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewVehicleInspection" class="row g-3" style="padding-left:25px; padding-right:25px; padding-top:20px; padding-bottom:20px;">
              <div class="col-md-4">
                  <label for="vehicle" class="form-label">VEHICLE:</label>
                  <select id="vehicle" name="vehicle" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <?php
                              $vehicleSQL = "SELECT * FROM vehicle WHERE UNIT_CODE = '$account'";
                              $vehicleResult = mysqli_query($conn, $vehicleSQL);
                              $totalRecords = mysqli_num_rows($vehicleResult); 
                              while($vehicleFetch=mysqli_fetch_assoc($vehicleResult))
                              {
                                  $vehicleName = $vehicleFetch['NAME'];
                                  $vehicleMake = $vehicleFetch['MAKE'];
                                  $vehicleModel = $vehicleFetch['MODEL'];
                                  $vehicleVin = $vehicleFetch['VIN'];
                                  echo'<option value="'.$vehicleVin.'">'.$vehicleVin.' '.$vehicleName.' '.$vehicleModel.'</option>';
                              }                               
                        ?>  
                  </select>
                </div> 
                <div class="col-md-4">
                  <label for="lastRoutineSvcDate" class="form-label">LAST ROUTINE SVC DATE:</label>
                  <input type="date" name="lastRoutineSvcDate" value="<?php echo $date;?>" class="form-control" id="lastRoutineSvcDate" placeholder="last routine svc date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="challenge" class="form-label">CHALLENGE:</label>
                   <input type="text" name="challenge" class="form-control" id="challenge" placeholder="challenge" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="monthlyMileage" class="form-label">MONTHLY MILEAGE:</label>
                   <input type="text" name="monthlyMileage" class="form-control" id="monthlyMileage" placeholder="monthly mileage" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="svcType" class="form-label">SVC TYPE:</label>
                   <input type="text" name="svcType" class="form-control" id="svcType" placeholder="svc type" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="svcDate" class="form-label">SVC DATE:</label>
                   <input type="date" name="svcDate" class="form-control" id="svcDate" placeholder="svc date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="kmDueForSvc" class="form-label">DUE FOR SVC (KM):</label>
                   <input type="text" name="kmDueForSvc" class="form-control" id="kmDueForSvc" placeholder="due for svc (km)" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="svcDueDate" class="form-label">SVC DUE DATE:</label>
                   <input type="date" name="svcDueDate" class="form-control" id="svcDueDate" placeholder="svc due date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="litreOfOil" class="form-label">OIL LITRE:</label>
                   <input type="text" name="litreOfOil" class="form-control" id="litreOfOil" placeholder="litre of oil" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" name="date" readonly value="<?php $date= date("Y-m-d"); echo $date;?>" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="status" class="form-label">STATUS:</label>
                  <select id="status" name="status" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="serviceable">s</option>
                        <option value="unserviceable">u/s</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Large Modal-->


              <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal3">
                MOV.TICKETS
              </button>

              <div class="modal fade" id="fullscreenModal3" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-fullscreen" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">VEH MOV TICKETS</h5>
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
                   
                    <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; background-color:white;">
                <thead>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Date</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Svc No</th>
                    <th scope="col">Fuel(Ltrs)</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Milieage Before</th>
                    <th scope="col">Milieage After</th>
                    <th scope="col">Litre Of Oil</th>
                    <th scope="col">Time out</th>
                    <th scope="col">Time in</th>
                    <th scope="col">Distance(km)</th>
                    <th scope="col">Remark</th>
                    <th scope="col">D</th>
                  </tr>
                </thead>
                <tbody>				
            <?php 
                    while($vehMovTicketFetch=mysqli_fetch_assoc($vehMovTicketResult))
            {
            ?> 		
                <tr id='userRow' style='text-transform: uppercase; font-size:75%;'>
                <td><?php echo $vehMovTicketFetch['VEHICLE']?></td>
                <td><?php echo $vehMovTicketFetch['DATE']?></td>
                <td><?php echo $vehMovTicketFetch['UNIT_CODE']?></td>
                <td><?php echo $vehMovTicketFetch['SVC_NO']?></td>
                <td><?php echo $vehMovTicketFetch['FUEL_LITRES']?></td>
                <td><?php echo $vehMovTicketFetch['DESTINATION']?></td>
                <td><?php echo $vehMovTicketFetch['MILEAGE_BEFORE']?></td>
                <td><?php echo $vehMovTicketFetch['MILEAGE_AFTER']?></td>
                <td><?php echo $vehMovTicketFetch['FUEL_LITRES']?></td>
                <td><?php echo $vehMovTicketFetch['TIME_OUT']?></td>
                <td><?php echo $vehMovTicketFetch['TIME_IN']?></td>
                <td><?php echo $vehMovTicketFetch['DISTANCE']?></td>
                <td><?php echo $vehMovTicketFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeleteVehicleMovTicket?vehicleMovTicketId=<?php echo $vehMovTicketFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
              </tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->



              <!-- Large Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal4">
                NEW TICKETS
              </button>
              <div class="modal fade" id="largeModal4" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW MOV TICKET</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                      style="
                      padding-right:30px;
                      padding-left:30px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      zIndex:-1;
                      padding-bottom:100px;
                      "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessNewVehicleMovTicket" class="row g-3" style="padding-left:25px; padding-right:25px; padding-top:20px; padding-bottom:20px;">
              <div class="col-md-4">
                  <label for="vehicle" class="form-label">VEHICLE:</label>
                  <select id="vehicle" name="vehicle" class="form-select" style="border-radius:2px;" required>
                        <option value="">choose</option>
                        <?php
                              $vehicleSQL = "SELECT * FROM vehicle WHERE UNIT_CODE = '$account'";
                              $vehicleResult = mysqli_query($conn, $vehicleSQL);
                              $totalRecords = mysqli_num_rows($vehicleResult); 
                              while($vehicleFetch=mysqli_fetch_assoc($vehicleResult))
                              {
                                  $vehicleName = $vehicleFetch['NAME'];
                                  $vehicleMake = $vehicleFetch['MAKE'];
                                  $vehicleModel = $vehicleFetch['MODEL'];
                                  $vehicleVin = $vehicleFetch['VIN'];
                                  echo'<option value="'.$vehicleVin.'">'.$vehicleVin.' '.$vehicleName.' '.$vehicleModel.'</option>';
                              }                               
                        ?>  
                  </select>
                </div> 
                 <div class="col-md-4">
                  <label for="date" class="form-label">DATE:</label>
                   <input type="date" name="date" readonly value="<?php $date= date("Y-m-d"); echo $date;?>" class="form-control" id="date" placeholder="date" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                   <input type="text" name="unit" readonly value="<?php echo $account;?>" class="form-control" id="unit" placeholder="unit" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-4">
                  <label for="svcNo" class="form-label">SVC NO:</label>
                  <select id="svcNo" name="svcNo" class="form-select" style="border-radius:1px;" required>
                  <option value="">choose</option>
                    <?php
                        $account = $_SESSION['account'];
                        $persSQL = "SELECT * FROM pers WHERE UNIT = '$account'";
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
                <div class="col-md-4">
                  <label for="fuel" class="form-label">FUEL:</label>
                   <input type="text" name="fuel" class="form-control" id="fuel" placeholder="fuel" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="destination" class="form-label">DESTINATION:</label>
                   <input type="text" name="destination" class="form-control" id="destination" placeholder="destination" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="mileageBefore" class="form-label">MILEAGE BEFORE:</label>
                   <input type="text" name="mileageBefore" class="form-control" id="mileage before" placeholder="mileage before" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="mileageAfter" class="form-label">MILEAGE AFTER:</label>
                   <input type="text" name="mileageAfter" class="form-control" id="mileage after" placeholder="mileage after" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="timeOut" class="form-label">TIME OUT:</label>
                   <input type="text" name="timeOut" class="form-control" id="timeOut" placeholder="time out" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="timeIn" class="form-label">TIME IN:</label>
                   <input type="text" name="timeIn" class="form-control" id="timeIn" placeholder="time in" style="border-radius:2px;" required>
                </div> 
                <div class="col-md-4">
                  <label for="distance" class="form-label">DISTANCE:</label>
                   <input type="text" name="distance" class="form-control" id="distance" placeholder="distance" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12" style="margin-top:30px;">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="add" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Large Modal-->

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