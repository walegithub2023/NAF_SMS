<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


    //get item ID and fetch selected item's record and assign them to variables
 
    if(isset($_GET['inventoryItemId'])){
     $inventoryItemId = $_GET['inventoryItemId'];
     $ItemSQL = "SELECT * FROM inventory WHERE ID = '$inventoryItemId'";
     $itemResult = mysqli_query($conn, $ItemSQL);

 
    while($row = mysqli_fetch_assoc($itemResult)){
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
      <h1>EDIT INVENTORY ITEM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Edit Item</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="">
           <div class="card" style="padding:30px;  padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
                <h5 class="card-title">Edit Item</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessEditInventoryItem" class="row g-3" style="">
                <div class="col-md-3">
                  <label for="item" class="form-label">ITEM:</label>
                  <input type="text" name="item" value="<?php echo $row['ITEM'];?>" class="form-control" id="item" placeholder="Enter item" style="border-radius:2px;" required>
                </div> 
              <div class="col-md-3">
                  <label for="type" class="form-label">ITEM TYPE:</label>
                  <select id="type" name="type" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['ITEM_TYPE'];?>"><?php echo $row['ITEM_TYPE'];?></option>
                        <?php
                        $itemTypeSQL = "SELECT * FROM item_type";
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
                  <div class="col-md-3">
                  <label for="qty" class="form-label">QTY:</label>
                    <input type="text" value="<?php echo $row['QTY'];?>" name="qty" class="form-control" id="qty" placeholder="Enter qty" style="border-radius:2px;" required>
                </div>
               
                <div class="col-md-3">
                  <label for="svc" class="form-label">SVC</label>
                  <input type="text" name="svc" value="<?php echo $row['SVC'];?>" class="form-control" id="svc" placeholder="number svc" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="us" class="form-label">U/S:</label>
                  <input type="text" name="us" value="<?php echo $row['US'];?>" class="form-control" id="us" placeholder="number u/s" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="unit" class="form-label">UNIT:</label>
                   <select id="unit" name="unit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $_SESSION['account'];?>"><?php echo $_SESSION['account'];?></option>
                  </select>
                  </div>
                  <div class="col-md-3">
                  <label for="office" class="form-label">OFFICE</label>
                  <input type="text" name="office" value="<?php echo $row['OFFICE'];?>" class="form-control" id="office" placeholder="office" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="model" class="form-label">MODEL</label>
                  <input type="text" name="model" value="<?php echo $row['MODEL'];?>" class="form-control" id="model" placeholder="model" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="deployment" class="form-label">DEPLOYMENT</label>
                  <input type="text" name="deployment" value="<?php echo $row['DEPLOYMENT'];?>" class="form-control" id="deployment" placeholder="deployment" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="location" class="form-label">LOCATION</label>
                  <input type="text" name="location" value="<?php echo $row['LOCATION'];?>" class="form-control" id="location" placeholder="location" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="description" class="form-label">DESCRIPTION:</label>
                  <input type="text" name="description" value="<?php echo $row['DESCRIPTION'];?>" class="form-control" id="description" placeholder="description" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" value="<?php echo $row['REMARK'];?>" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                   <input type="hidden" name="id" value="<?php echo $row['ID'];?>" class="form-control" id="id" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12" style="margin-top:20px;">
                      <button type="submit" name="update" style="border-radius:2px; padding:15px; padding-right:50px; padding-left:50px;" class="btn btn-primary">UPDATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->
            </div>
            
       

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php include 'unitAdminFooter.php'; ?>
 <?php

}}?>