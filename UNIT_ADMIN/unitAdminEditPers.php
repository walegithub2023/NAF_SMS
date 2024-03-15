<?php
include('../Connection.php');
include 'unitAdminHeader.php';
include 'unitAdminSideNavBar.php';
include('../functions.php');


    //get user ID and fetch selected user's record and assign them to variables
 
    if(isset($_GET['svcNo'])){
     $svcNo = $_GET['svcNo'];
     $persSQL = "SELECT * FROM pers WHERE SVC_NO = '$svcNo'";
     $persResult = mysqli_query($conn, $persSQL);

 
    while($row = mysqli_fetch_assoc($persResult)){
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
      <h1>EDIT PERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="unitAdminHome">Home</a></li>
          <li class="breadcrumb-item active">Edit Pers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="">
           <div class="card" style="padding:30px;  padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
                <h5 class="card-title">Edit Pers Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="unitAdminProcessEditPers" class="row g-3">
               <div class="col-md-3">
                  <label for="persType" class="form-label">Pers Type:</label>
                  <select id="persType" name="persType" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['PERS_TYPE'];?>"><?php echo $row['PERS_TYPE'];?></option>
                        <option value="OFFR(MALE)">Offr(Male)</option>
                         <option value="OFFR(FEMALE)">Offr(Female)</option>
                        <option value="AIRMAN">Airman</option>
                        <option value="AIRWOMAN">Airwoman</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="svcNo" class="form-label">Svc no:</label>
                  <input type="text" name="svcNo" readonly value="<?php echo $row['SVC_NO'];?>" class="form-control" id="svcNo" placeholder="svcNo" style="border-radius:2px; background-color:#f5f8f9;" required>
                </div>
                 <div class="col-md-3">
                  <label for="rank" class="form-label">Rank:</label>
                   <select id="rank" name="rank" class="form-select" style="border-radius:2px;" required>
                            <option value="<?php echo $row['RANK'];?>"><?php echo $row['RANK'];?></option>
                            <option value="AVM">AVM</option>
                            <option value="AIR CDRE">AIR CDRE</option>
                            <option value="GP CAPT">GP CAPT</option>
                            <option value="WG CDR">WG CDR</option>
                            <option value="SQN LDR">SQN LDR</option>
                            <option value="FLT LT">FLT LT</option>
                            <option value="FG OFFR">FG OFFR</option>
                            <option value="PLT OFFR">PLT OFFR</option>
                            <option value="AWO">AWO</option>
                            <option value="MWO">MWO</option>
                            <option value="WO">WO</option>
                            <option value="FS">FS</option>
                            <option value="SGT">SGT</option>
                            <option value="CPL">CPL</option>
                            <option value="LCPL">LCPL</option>
                            <option value="ACM">ACM</option>
                            <option value="ACW">ACW</option>
                  </select>
                </div>
                 <div class="col-md-3">
                  <label for="initials" class="form-label">Initials:</label>
                  <input type="text" value="<?php echo $row['INITIALS'];?>" name="initials" class="form-control" id="initials" placeholder="initials" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="surname" class="form-label">Surname:</label>
                  <input type="text"  value="<?php echo $row['SURNAME'];?>" name="surname" class="form-control" id="surname" placeholder="surname" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="specialty_trade" class="form-label">Specialty/Trade:</label>
                  <select id="specialty_trade" name="specialty_trade" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['SPECIALTY_TRADE'];?>"><?php echo $row['SPECIALTY_TRADE'];?></option>
                        <option value="COMMS">COMMS</option>
                        <option value="IT">IT</option>
                         <option value="SPACE">SPACE</option>
                         <option value="RADAR">RADAR</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="presentUnit" class="form-label">Present Unit:</label>
                   <select id="presentUnit" name="presentUnit" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['UNIT'];?>"><?php echo $row['UNIT'];?></option>
                  </select>
                  </div>
                  <div class="col-md-3">
                  <label for="dtos" class="form-label">Dtos:</label>
                  <input type="date" value="<?php echo $row['DTOS'];?>" name="dtos" class="form-control" id="dtos" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="appt" class="form-label">Appt:</label>
                  <input type="text" value="<?php echo $row['APPT'];?>" name="appt" class="form-control" id="appt" placeholder="appt" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="state" class="form-label">State:</label>
                  <input type="text" value="<?php echo $row['STATE'];?>" name="state" class="form-control" id="state" placeholder="state" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="dob" class="form-label">Dob:</label>
                  <input type="date" value="<?php echo $row['DOB'];?>" name="dob" class="form-control" id="dob" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="lastUnit" class="form-label">Last Unit:</label>
                   <select id="lastUnit" name="lastUnit" class="form-select" style="border-radius:2px;" required>
                      <option value="<?php echo $row['LAST_UNIT'];?>"><?php echo $row['LAST_UNIT'];?></option>
                         <?php
                              $unitSQL = "SELECT * FROM units";
                              $unitResult = mysqli_query($conn, $unitSQL);
                              $totalRecords = mysqli_num_rows($unitResult); 
                              while($unitFetch=mysqli_fetch_assoc($unitResult))
                              {
                                                              
                                  $unitCode = $unitFetch['UNIT_CODE'];
                                  $unit = $unitFetch['UNIT'];
                                  echo'<option value="'.$unitCode.'">'.$unit.'</option>';
                              }                               
                        ?>  
                  </select>
                  </div>
                <div class="col-md-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" value="<?php echo $row['EMAIL'];?>" name="email" class="form-control" id="email" placeholder="Email" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="lga" class="form-label">Lga:</label>
                  <input type="text" value="<?php echo $row['LGA'];?>" name="lga" class="form-control" id="lga" placeholder="lga" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="phone" class="form-label">Phone:</label>
                  <input type="text" value="<?php echo $row['PHONE'];?>" name="phone" class="form-control" id="phone" placeholder="Phone" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="remark" class="form-label">Remark:</label>
                   <input type="text" value="<?php echo $row['REMARK'];?>" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="submit" name="update" style="border-radius:1px;" class="btn btn-primary">UPDATE</button>
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