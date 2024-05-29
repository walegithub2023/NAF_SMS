<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');

//select all items in the inventory
  $account = $_SESSION['account'];
    $inventorySQL = "SELECT * FROM inventory WHERE UNIT_CODE = '$account'";
    $inventoryResult = mysqli_query($conn, $inventorySQL);
    $totalRecords = mysqli_num_rows($inventoryResult);  
    $remark = "NIL";


    //select all item types in the inventory
  $account = $_SESSION['account'];
    $itemSQL = "SELECT * FROM item_type WHERE UNIT_CODE = '$account'";
    $itemResult = mysqli_query($conn, $itemSQL);
    $totalRecords = mysqli_num_rows($itemResult);  
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
      <h1 style="font-weight:normal;">EQPT & INVENTORY</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Equipment and Inventory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

         <?php
                    //MESSAGES FROM successMessageForItem STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForItem'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForItem'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForItem']);
            }else

            // Check if a failure message is set in the session 
            if (isset($_SESSION['failureMessageForItem'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForItem'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForItem']);
            }
             //MESSAGES FROM failureMessageForItem ENDS HERE
    ?>

     <?php
                    //MESSAGES FROM successMessageForDeleteItem STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForDeleteItem'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeleteItem'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeleteItem']);
            }else

            // Check if a failure message is set in the session 
            if (isset($_SESSION['failureMessageForDeleteItem'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForDeleteItem'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeleteItem']);
            }
             //MESSAGES FROM failureMessageForDeleteItem ENDS HERE
    ?>

    <?php
                    //MESSAGES FROM successMessageForEditInventoryItem STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForEditInventoryItem'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForEditInventoryItem'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForEditInventoryItem']);
            }
    ?>

         <?php
                    //MESSAGES FROM successMessageForItemType STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForItemType'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForItemType'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForItemType']);
            }
            else if (isset($_SESSION['failureMessageForItemType'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForItemType'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForItemType']);
            }
    ?>

      <?php
                    //MESSAGES FROM successMessageForDeleteItemType STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForDeleteItemType'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeleteItemType'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeleteItemType']);
            }
            else if (isset($_SESSION['failureMessageForDeleteItemType'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForDeleteItemType'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeleteItemType']);
            }
    ?>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:80px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">Equipment and Inventory</h5>
              <p>
                Click the buttons below to see all eqpt/inventory, add new eqpt and eqpt type to the inventory.
              </p>
              

                <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
                VIEW EQUIPMENT / INVENTORY
              </button>

              <div class="modal fade" id="fullscreenModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">INVENTORY</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img11.png'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                >
                     <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Item</th>
                    <th scope="col">Item Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Svc</th>
                    <th scope="col">U/S</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Office</th>
                    <th scope="col">Model</th>
                    <th scope="col">Deployment</th>
                    <th scope="col">Location</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($inventoryFetch=mysqli_fetch_assoc($inventoryResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $inventoryFetch['ITEM']?></td>
                <td><?php echo $inventoryFetch['ITEM_TYPE']?></td>
                <td><?php echo $inventoryFetch['DESCRIPTION']?></td>
                <td><?php echo $inventoryFetch['QTY']?></td>
                <td><?php echo $inventoryFetch['SVC']?></td>
                <td><?php echo $inventoryFetch['US']?></td>
                <td><?php echo $inventoryFetch['UNIT_CODE']?></td>
                <td><?php echo $inventoryFetch['OFFICE']?></td>
                <td><?php echo $inventoryFetch['MODEL']?></td>
                <td><?php echo $inventoryFetch['DEPLOYMENT']?></td>
                <td><?php echo $inventoryFetch['LOCATION']?></td>
                <td><?php echo $inventoryFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminViewInventoryItem?inventoryItemId=<?php echo $inventoryFetch['ID'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='unitAdminEditInventoryItem?inventoryItemId=<?php echo $inventoryFetch['ID'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td>
                  <a style="color:black" href='unitAdminDeleteInventoryItem?inventoryItemId=<?php echo $inventoryFetch['ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS ITEM??? DELETING THIS ITEM REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal20">
                ADD NEW ITEM TO INVENTORY
              </button>

              <div class="modal fade" id="largeModal20" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-lg" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">NEW ITEM FORM</h5>
                      <button type="button" style="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                      padding-bottom:100px;
                      background-image: url('../IMAGES/img11.png'); 
                      background-size: cover;
                      background-position: center;
                      width: 100%;
                      zIndex:-1;
                    "
                    >
                   
                    <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessEqptInventory" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px;">
                <div class="col-md-4">
                  <label for="item" class="form-label">ITEM:</label>
                  <input type="text" name="item" class="form-control" id="item" placeholder="Enter item" style="border-radius:2px;" required>
                </div> 
              <div class="col-md-4">
                  <label for="type" class="form-label">ITEM TYPE:</label>
                  <select id="type" name="type" class="form-select" style="border-radius:2px;" required>
                        <option value="">..choose..</option>
                        <?php
                        $itemTypeSQL = "SELECT * FROM item_type WHERE UNIT_CODE = '$account'";
                        $itemTypeResult = mysqli_query($conn, $itemTypeSQL);
                        $totalRecords = mysqli_num_rows($itemTypeResult); 
                        while($itemTypeFetch=mysqli_fetch_assoc($itemTypeResult))
                        {
                                                        
                            $itemType = $itemTypeFetch['ITEM_TYPE'];
                            echo'<option value="'.$itemType.'">'.$itemType.'</option>';
                        }                               
                        ?>          
                  </select>
                </div>
                  <div class="col-md-4">
                  <label for="qty" class="form-label">QTY:</label>
                    <input type="text" name="qty" class="form-control" id="qty" placeholder="Enter qty" style="border-radius:2px;" required>
                </div>
               
                <div class="col-md-4">
                  <label for="svc" class="form-label">SVC</label>
                  <input type="text" name="svc" class="form-control" id="svc" placeholder="number svc" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="us" class="form-label">U/S:</label>
                  <input type="text" name="us" class="form-control" id="us" placeholder="number u/s" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-4">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                  <div class="col-md-4">
                  <label for="office" class="form-label">OFFICE</label>
                  <input type="text" name="office" class="form-control" id="office" placeholder="office" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
                  <label for="model" class="form-label">MODEL</label>
                  <input type="text" name="model" class="form-control" id="model" placeholder="model" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-4">
                  <label for="deployment" class="form-label">DEPLOYMENT</label>
                  <input type="text" name="deployment" class="form-control" id="deployment" placeholder="deployment" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-4">
                  <label for="location" class="form-label">LOCATION</label>
                  <input type="text" name="location" class="form-control" id="location" placeholder="location" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-4">
                  <label for="description" class="form-label">DESCRIPTION:</label>
                  <input type="text" name="description" class="form-control" id="description" placeholder="description" style="border-radius:2px;" required>
                </div>
                <div class="col-md-4">
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
              </div><!-- End  Large Modal-->


              
              <!-- Basic Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                CLICK TO VIEW ALL ITEM TYPES
              </button>
              <div class="modal fade" id="largeModal" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog modal-lg" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">ITEM TYPES</h5>
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
              <table class="table datatable table-striped second table-hover" style="text-transform:; font-size:90%; background-color:white;">
                <thead>
                  <tr>
                    <th scope="col">Ser</th>
                    <th scope="col">Item Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($itemFetch=mysqli_fetch_assoc($itemResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $serial?></td>
                <td><?php echo $itemFetch['ITEM_TYPE']?></td>
                <td><?php echo $itemFetch['DESCRIPTION']?></td>
                <td><?php echo $itemFetch['UNIT_CODE']?></td>
                <td><?php echo $itemFetch['REMARK']?></td>
                <td><a style="color:black" href='unitAdminDeleteItemType?itemTypeId=<?php echo $itemFetch['ITEM_TYPE_ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS ITEM TYPE??? DELETING THIS ITEM TYPE REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->


              <!-- Basic Modal -->
              <button type="button"  style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2">
                CLICK TO ADD NEW ITEM TYPE
              </button>
              <div class="modal fade" id="basicModal2" tabindex="-1" style="border-radius:1px;">
                <div class="modal-dialog" style="border-radius:1px;">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header" style="border-radius:1px;">
                      <h5 class="modal-title">NEW ITEM TYPE</h5>
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
              <form method="post" action="unitAdminProcessItemType" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px;">
                <div class="col-md-12">
                  <label for="type" class="form-label">ITEM TYPE</label>
                  <input type="text" name="type" class="form-control" id="type" placeholder="Enter type" style="border-radius:2px;" required>
                </div> 
            
                  <div class="col-md-12">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
              
                  <div class="col-md-12">
                  <label for="description" class="form-label">DESCRIPTION:</label>
                  <input type="text" name="description" class="form-control" id="description" placeholder="description" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:1px;">Close</button>
                      <button type="submit" class="btn btn-primary" name="create" style="border-radius:1px;">CREATE</button>
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